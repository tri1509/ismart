<?php

function construct() {
  load_model('index');
  load('lib','validation');
  load('lib','email');
}

function indexAction() {

}

function resetAction(){
  global $error,$pass_old,$pass_new,$confirm_pass ;
  if(isset($_POST['btn-reset'])) {
    $error = array();
    $alert = array();
    if(empty($_POST['pass-old'])) {
      $error['pass-old'] = "Không được để trống mật khẩu cũ";
    }else{
      $pattern = '/^[A-Za-z0-9_\.!@#$%^&*()]{6,32}$/';
      if(!preg_match($pattern,$_POST['pass-old'])){
        $error['pass-old'] = "Mật khẩu không đúng định dạng";
      }else{
        $pass_old = md5($_POST['pass-old']);
      }
    }
    if(empty($_POST['pass-new'])) {
      $error['pass-new'] = "Không được để trống mật khẩu mới";
    }else{
      $pattern = '/^[A-Za-z0-9_\.!@#$%^&*()]{6,32}$/';
      if(!preg_match($pattern,$_POST['pass-new'])){
        $error['pass-new'] = "Mật khẩu không đúng định dạng";
      }else{
        $pass_new = md5($_POST['pass-new']);
      }
    }
    if(empty($_POST['confirm-pass'])) {
      $error['confirm-pass'] = "Không được để trống mật khẩu";
    }else{
      $pattern = '/^[A-Za-z0-9_\.!@#$%^&*()]{6,32}$/';
      if(!preg_match($pattern,$_POST['confirm-pass'])){
        $error['confirm-pass'] = "Mật khẩu không đúng định dạng";
      }else{
        $confirm_pass = md5($_POST['confirm-pass']);
      }
    }

    if(empty($error)){
      if(check_pass($pass_old,user_login()) && $confirm_pass == $pass_new && $confirm_pass != $pass_old){
        $data = array(
          'password' => $confirm_pass,
        );
        update_pass(user_login(),$data);
        $ok = "Đã cập nhật mật khẩu thành công";
        $success = "<div class='modal_login'>";
        $success .= "<div class='modal_login-content'>";
        $success .= "<div class='close-act' id='close-modal'></div><p class='text-success'>";
        $success .= $ok;
        $success .= "</p></div></div>";
        echo $success;
      }else{
        $error['account'] = "Mật khẩu không khớp";
      }
    }
  }
  load_view('reset');
}

function loginAction() {
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

function updateAction() {
  if(isset($_POST['btn-update'])) {
      $error = array();
      if(empty($_POST['fullname'])) {
        $error['fullname'] = "Không được để trống họ và tên";
      }else{
        $fullname = $_POST['fullname'];
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

      if(empty($_POST['phone_number'])) {
        $error['phone_number'] = "Không được để trống số điện thoại";
      }else{
          $phone_number = $_POST['phone_number'];
      }

      if(empty($_POST['address'])) {
        $error['address'] = "Không được để trống địa chỉ";
      }else{
          $address = $_POST['address'];
      }
    // kết luận
      if(empty($error)){
          $data = array(
            'fullname' => $fullname,
            'phone_number' => $phone_number,
            'address' => $address,
            'email' => $email
          );
          update_user_login(user_login(),$data);
        }
    }
  $info_user = get_user_by_username(user_login());
  $data['info_user'] = $info_user;
  load_view('update',$data);
}