<?php
get_header();
?>
<style>
.modal_login {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 999999;
  background-color: rgba(0, 0, 0, 0.25);
}

.modal_login-content {
  width: 400px;
  height: 100px;
  background-color: #ffffff;
  position: absolute;
  z-index: 9999999;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #000;
  padding: 10px 20px;
  font-size: 20px;
  border-radius: 10px;
}

.modal_login-content p {
  margin-top: 30px;
}

.close-act {
  position: absolute;
  top: 0;
  right: 0;
  background-color: rgba(0, 0, 0, 0.1);
  background-image: url(https://rubikstore.vn/cdn/themes/metavn/img/cross.png);
  background-repeat: no-repeat;
  background-position: 7px 7px;
  width: 30px;
  height: 30px;
  border-radius: 4px;
  z-index: 1200;
  cursor: pointer;

}

.text-success {
  color: #270;
}
</style>
<div id="main-content-wp" class="change-pass-page">
  <div class="section" id="title-page">
    <div class="clearfix">
      <a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
      <h3 id="index" class="fl-left">Cập nhật tài khoản</h3>
    </div>
  </div>
  <div class="wrap clearfix">
    <?php get_sidebar('users'); ?>
    <div id="content" class="fl-right">
      <div class="section" id="detail-page">
        <div class="section-detail">
          <?php echo form_error('account') ?>
          <form method="POST">
            <label for="pass-old">Mật khẩu cũ</label>
            <input type="password" name="pass-old" id="pass-old">
            <?php echo form_error('pass-old'); ?>
            <label for="pass-new">Mật khẩu mới</label>
            <input type="password" name="pass-new" id="pass-new">
            <?php echo form_error('pass-new'); ?>
            <label for="confirm-pass">Xác nhận mật khẩu</label>
            <input type="password" name="confirm-pass" id="confirm-pass">
            <?php echo form_error('confirm-pass') ;?>
            <button type="submit" name="btn-reset" id="btn-reset">Cập nhật</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
get_footer();
?>
<script>
$(document).ready(function() {
  $("#close-modal").click(function() {
    $(".modal_login").fadeOut(500);
  });
  $("#close-modal").click(function() {
    $(".modal_login-content").fadeOut(500);
  });
})
</script>