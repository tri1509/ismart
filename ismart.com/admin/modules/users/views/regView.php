<?php get_header(); ?>
<link rel="stylesheet" href="public/login.css">
<div class="site-wrap d-md-flex align-items-stretch">
  <div class="bg-img" style="background-image: url('public/images/img-bg-2.jpg')"></div>
  <div class="form-wrap">
    <div class="form-inner">
      <h1 class="title">Sign up</h1>
      <p class="caption mb-4"><?php echo form_error('account'); ?></p>
      <p class="caption mb-4">Create your account in seconds.</p>
      <form action="" class="pt-3" method="post">
        <div class="form-floating">
          <input type="text" class="form-control" id="name" placeholder="Full Name" name="fullname"
            value="<?php echo set_value('fullname'); ?>" />
          <label for="name">Full Name</label>
          <?php echo form_error('fullname'); ?>
        </div>

        <div class="form-floating">
          <input type="text" class="form-control" id="name" placeholder="Full Name" name="username"
            value="<?php echo set_value('username');?>" />
          <label for="name">User Name</label>
          <?php echo form_error('username'); ?>
        </div>

        <div class="form-floating">
          <input type="email" class="form-control" id="email" placeholder="info@example.com" name="email"
            value="<?php echo set_value('email'); ?>" />
          <label for="email">Email Address</label>
          <?php echo form_error('email'); ?>
        </div>

        <div class="form-floating">
          <span class="password-show-toggle js-password-show-toggle"><span class="uil"></span></span>
          <input type="password" class="form-control" id="password" placeholder="Password" name="password" />
          <label for="password">Password</label>
          <?php echo form_error('password'); ?>
        </div>

        <div class="d-flex justify-content-between">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="remember" />
            <label for="remember" class="form-check-label">I agree to the <a href="#">Terms of Service</a> and
              <a href="#">Privacy Policy</a></label>
          </div>
        </div>

        <div class="d-grid mb-4">
          <input type="submit" class="btn btn-primary" value="Đăng Ký" name="btn_reg">
        </div>

        <div class="mb-2">
          Already a member? <a href="<?php echo base_url("?mod=users&action=login") ; ?>">Log in</a>
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
<?php get_footer(); ?>