<?php

function construct() {  
  load_model('index');
  load('lib','validation');
}

function indexAction() {
  load_view('index');
}

function addAction() {
  global $error,$success;
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $error = array();
    $success = array();
    if(empty($_POST['title'])) {
      $error['title'] = "Không được để trống tiêu đề";
    }else{
      $title = $_POST['title'];
    }
    if(empty($_POST['slug'])) {
      $error['slug'] = "Không được để trống link";
    }else{
      $slug = $_POST['slug'];
    }
    if(empty($_POST['desc'])) {
      $error['desc'] = "Không được để trống mô tả";
    }else{
      $desc = $_POST['desc'];
    }
    $target_dir = "public/images/";
    $target_file = $target_dir . basename($_FILES['file']['name']);
    $name_file = basename($_FILES['file']['name']);
    $type_file = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
    if (!in_array(strtolower($type_file), $type_fileAllow)) {
      $error['file'] = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
    }
    $size_file = $_FILES['file']['size'];
    if ($size_file > 5242880) {
      $error['file'] = "File bạn chọn không được quá 5MB";
    }
    if (file_exists($target_file)) {
      $error['file'] = "File bạn chọn đã tồn tại trên hệ thống";
    }

    if (empty($error)) {
      if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $flag = true;
        // echo json_encode(array('status' => 'ok','file_path' => $target_file));
      } else {
        echo json_encode(array('status' => 'error'));
      }
      $data = array(
        'title' => $title,
        'slug' => $slug,
        'desc_page' => $desc,
        'img' => $name_file,
      );
      // show_array($data);
      add_page($data);
      $success['success'] = "Thêm trang thành công";
    } 
    // else {
    //     echo json_encode(array('status' => 'error'));
    // }
  }
  load_view('add');
}