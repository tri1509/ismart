<?php
get_header();
?>
<link rel="stylesheet" href="public/login.css" />
<div class="site-wrap d-md-flex align-items-stretch">
  <div class="bg-img" style="background-image: url('public/images/img-bg-1.jpg')"></div>
  <div class="form-wrap">
    <div class="form-inner">
      <h1 class="title">Đổi thành công</h1>
      <p class="caption mb-4">Vui lòng đăng nhập lại</p>
      <div class="mb-2">
        <a href="<?php echo base_url("?mod=users&action=login") ; ?>">Đăng nhập</a>
      </div>
    </div>
  </div>
</div>
<?php
get_footer();
?>