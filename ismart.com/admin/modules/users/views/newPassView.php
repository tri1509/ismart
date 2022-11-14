<?php
get_header();
?>
<link rel="stylesheet" href="public/login.css" />
<div class="site-wrap d-md-flex align-items-stretch">
  <div class="bg-img" style="background-image: url('public/images/img-bg-1.jpg')"></div>
  <div class="form-wrap">
    <div class="form-inner">
      <h1 class="title">Nhập mật khẩu mới</h1>
      <p class="caption mb-4"><?php echo form_error('account'); ?></p>
      <form id="form-login" action="" class="pt-3" method="post">
        <div class="form-floating">
          <input type="password" class="form-control" id="password" placeholder="Password" name="password" />
          <label for="password">Password</label>
          <?php echo form_error('password'); ?>
        </div>
        <div class="d-grid mb-4">
          <input type="submit" class="btn btn-primary" value="Thay đổi" name="btn_new_pass" id="btn_new_pass">
        </div>
        <div class="mb-2">
          <a href="<?php echo base_url("?mod=users&action=reg") ; ?>">Đăng ký</a>
          <i>|</i>
          <a href="<?php echo base_url("?mod=users&action=login") ; ?>">Đăng nhập</a>
        </div>
        <div class="social-account-wrap">
          <h4 class="mb-4"><span>or continue with</span></h4>
          <ul class="list-unstyled social-account d-flex justify-content-between">
            <li>
              <a href="#"><img src="public/images/icon-google.svg" alt="Google logo" /></a>
            </li>
            <li>
              <a href="#"><img src="public/images/icon-facebook.svg" alt="Facebook logo" /></a>
            </li>
            <li>
              <a href="#"><img src="public/images/icon-apple.svg" alt="Apple logo" /></a>
            </li>
            <li>
              <a href="#"><img src="public/images/icon-twitter.svg" alt="Twitter logo" /></a>
            </li>
          </ul>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
get_footer();
?>