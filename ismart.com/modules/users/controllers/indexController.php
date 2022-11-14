<?php

function construct() {
  load_model('index');
  load('lib','validation');
  load('lib','email');
}

function indexAction() {
  $list_users = get_list_users();
  // show_array($list_users);
  $data['list_users'] = $list_users;
  load_view('index', $data);
}

function regAction() {
  global $error,$username,$password,$email,$fullname;
  if(isset($_POST['btn_reg'])) {
      $error = array();
      // Kiểm tra họ tên
      if(empty($_POST['fullname'])) {
        $error['fullname'] = "Không được để trống họ và tên";
      }else{
        $fullname = $_POST['fullname'];
      }
      // kiểm tra username
      if(empty($_POST['username'])) {
        $error['username'] = "Không được để trống tên đăng nhập";
      }else{
        $pattern = '/^[A-Za-z0-9_\.]{6,32}$/';
        if(!preg_match($pattern,$_POST['username'])){
          $error['username'] = "Tên đăng nhập không đúng định dạng";
        }else{
          $username = $_POST['username'];
        }
      }
      // kiểm tra password
      if(empty($_POST['password'])) {
        $error['password'] = "Không được để trống mật khẩu";
      }else{
        $pattern = '/^[A-Za-z0-9_\.!@#$%^&*()]{6,32}$/';
        if(!preg_match($pattern,$_POST['password'])){
          $error['password'] = "Mật khẩu không đúng định dạng";
        }else{
          $password = md5($_POST['password']);
        }
      }

      if(empty($_POST['email'])) {
        $error['email'] = "Không được để trống email";
      }else{
        $pattern = '/^[A-Za-z0-9_.]{2,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/';
        if(!preg_match($pattern,$_POST['email'])){
          $error['email'] = "email không đúng định dạng";
        }else{
          $email = $_POST['email'];
        }
      }
    // kết luận
      if(empty($error)){
        if(!user_exists($username,$email)){
          $active_token = md5($email.time());
          $data = array(
            'fullname' => $fullname,
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'active_token' => $active_token,
            'reg_date' => time()
          );
          add_user($data);
          $link_active = base_url("?mod=users&action=active&active_token={$active_token}");
          $content = "<p>Chào bạn {$fullname}</p><br>";
          $content .= "<p>bạn vui lòng nhấn <a href='{$link_active}'>vào đây</a>để kích hoạt tài khoản</p><br>";
          $content .= "<p>Nếu không phải bạn đăng ký tài khoản xin hãy bỏ qua email này</p>";
          $content .= "<p>Cảm ơn bạn !</p>";
          send_email("tangminhtri1592000@gmail.com","Tăng Minh Trí","Kích hoạt tài khoản",$content);
          // redirect("?mod=users&action=login");
        }else{
          $error['account'] = "Email hoặc username đã tồn tại trên hệ thống";
        }
      }
    }
  load_view('reg');
}

function loginAction() {
  global $error,$username,$password;
  if(isset($_POST['btn_login'])) {
    $error = array();
    // kiểm tra username
    if(empty($_POST['username'])) {
      $error['username'] = "Không được để trống tên đăng nhập";
    }else{
      $pattern = '/^[A-Za-z0-9_\.]{6,32}$/';
      if(!preg_match($pattern,$_POST['username'])){
        $error['username'] = "Tên đăng nhập không đúng định dạng";
      }else{
        $username = $_POST['username'];
      }
    }
   // kiểm tra password
    if(empty($_POST['password'])) {
      $error['password'] = "Không được để trống mật khẩu";
    }else{
      $pattern = '/^[A-Za-z0-9_\.!@#$%^&*()]{6,32}$/';
      if(!preg_match($pattern,$_POST['password'])){
        $error['password'] = "Mật khẩu không đúng định dạng";
      }else{
        $password = md5($_POST['password']);
      }
    }
  // kết luận
    if(empty($error)){
      // xử lý login
      if(check_login($username, $password)){
        // Lưu trữ phiên đăng nhập
        $_SESSION['is_login'] = true;
        $_SESSION['user_login'] = $username;
  
        // cookie
        if(isset($_POST['remember_me'])){
          $_COOKIE['is_login'] = true;
          $_COOKIE['user_login'] = $username;
        }
        // chuyển hướng vào trong hệ thống
        redirect();
      }else{
        $error['account'] = "Tên đăng nhập hoặc mật khẩu không đúng";
      }
    }
  }
  load_view('login');
}

function activeAction() {
  $active_token = $_GET['active_token'];
  if (check_active_token($active_token)){
    active_user($active_token);
    $link_logon = base_url("?mod=users&action=login");
    echo "<p class='text-success'>Tài khoản đã kích hoạt thành công, vui lòng nhấp <a href='{$link_logon}'>vào link sau</a> để đăng nhập</p>";
  }else{
    echo "<p class='text-danger'>Yêu cầu kích hoạt không hợp lệ hoặc tài khoản của bạn đã được kích hoạt trước đó</p>";
  }
}

function logoutAction(){
  unset($_SESSION['is_login']);
  unset($_SESSION['user_login']);
  redirect("?mod=users&action=login");
}

function resetAction() {
  global $error,$email;
  if(isset($_GET['reset_token'])){
    $reset_token = $_GET['reset_token'];
  }else{
    $reset_token = "";
  }
  if(!empty($reset_token)) {
    if(check_reset_token($reset_token)){
      if(isset($_POST['btn_new_pass'])) {
        $error = array();
        if(empty($_POST['password'])) {
          $error['password'] = "Không được để trống mật khẩu";
        }else{
          $pattern = '/^[A-Za-z0-9_\.!@#$%^&*()]{6,32}$/';
          if(!preg_match($pattern,$_POST['password'])){
            $error['password'] = "Mật khẩu không đúng định dạng";
          }else{
            $password = md5($_POST['password']);
          }
        }
        if(empty($error)){
          $data = array(
            'password' => $password,
          );
          update_pass($data,$reset_token);
          // redirect("?mod=users&action=resetSuccess");
          $login_url = base_url("?mod=users&action=login");
          $modal = "<div class='modal_login'>";
          $modal .= "<div class='modal_login-content'>";
          $modal .= "<p class='text-center text-success align-center'>Đổi mật khẩu thành công</p>";
          $modal .= "<a class='text-center align-center' href='{$login_url}'>Đăng nhập</a>";
          $modal .= "</div></div>";
          echo $modal;
        }
      }
      load_view('newPass');
    }else{
      echo "Yêu cầu không hợp lệ, mời bạn đi tốc độ giùm !";
    }
  }else{
    if(isset($_POST['btn_reset'])) {
      $error = array();
      if(empty($_POST['email'])) {
        $error['email'] = "Không được để trống email";
      }else{
        $pattern = '/^[A-Za-z0-9_.]{2,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/';
        if(!preg_match($pattern,$_POST['email'])){
          $error['email'] = "email không đúng định dạng";
        }else{
          $email = $_POST['email'];
        }
      }
      if(empty($error)){
        if(check_email($email)){
          $reset_token = md5($email.time());
          $data = array(
            'reset_token' => $reset_token,
          );
          // cập nhật mã reset pass cho user cần khôi phục mk
          update_reset_token($data,$email);
          echo "<div class='modal_login'>";
          echo "<div class='modal_login-content'>";
          echo "Bạn vui lòng kiểm tra email để thay đổi mật khẩu";
          echo "</div></div>";
          $link_active = base_url("?mod=users&action=reset&reset_token={$reset_token}");
          $get_fullname = db_fetch_row("SELECT * FROM `tbl_user` WHERE `email` ='{$email}' LIMIT 1 ");
          $fullname = $get_fullname['fullname'];
          // gửi link khôi phục vào email của người dùng
          $content = "<p>Chào bạn {$fullname}</p><br>";
          $content .= "<p>bạn vui lòng nhấn <a href='{$link_active}'>vào đây</a>để thay đổi mật khẩu</p><br>";
          $content .= "<p>Nếu không phải bạn yêu cầu thay đổi mật khẩu xin hãy bỏ qua email này</p>";
          $content .= "<p>Cảm ơn bạn !</p>";
          send_email($email,'','khôi phục mật khẩu',$content);
        }else{
          $error['account'] = "Email không tồn tại trên hệ thống";
        }
      }
    }
    load_view('reset');
  }
}

function resetSuccessAction() {
  load_view('resetSuccess');
}