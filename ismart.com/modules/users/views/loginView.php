<?php
get_header();
?>
<link rel="stylesheet" href="public/login.css" />
<div class="site-wrap d-md-flex align-items-stretch">
  <div class="bg-img" style="background-image: url('public/images/img-bg-1.jpg')"></div>
  <div class="form-wrap">
    <div class="form-inner">
      <h1 class="title">Đăng nhập</h1>
      <p class="caption mb-4"><?php echo form_error('account'); ?></p>
      <form id="form-login" action="" class="pt-3" method="post">
        <div class="form-floating">
          <input type="text" class="form-control" name="username" id="username" placeholder="info@example.com"
            value="<?php echo set_value('username') ; ?>" />
          <label for="username">Tên đăng nhập</label>
          <?php echo form_error('username'); ?>
        </div>

        <div class="form-floating">
          <span class="password-show-toggle js-password-show-toggle"><span class="uil"></span></span>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
          <label for="password">Password</label>
          <?php echo form_error('passwword'); ?>
        </div>

        <div class="d-flex justify-content-between">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember_me" />
            <label for="remember" class="form-check-label">Ghi nhớ mập khẩu</label>
          </div>
          <div><a href="<?php echo base_url("?mod=users&action=reset") ; ?>">Quên mật khẩu ?</a></div>
        </div>

        <div class="d-grid mb-4">
          <input type="submit" class="btn btn-primary" value="Đăng nhập" name="btn_login" id="btn_login">
        </div>
        <div class="mb-2">
          Bạn chưa có tài khoản? <a href="<?php echo base_url("?mod=users&action=reg") ; ?>">Đăng ký</a>
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