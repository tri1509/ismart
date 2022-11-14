<?php get_header(); ?>
<div id="main-content-wp" class="detail-news-page">
  <div class="wp-inner clearfix">
    <?php get_sidebar(); ?>
    <div id="content" class="fl-right">
      <div class="section" id="detail-news-wp">
        <div class="section-head">
          <h3 class="section-title">Danh sách thành viên</h3>
          <a href="<?php echo base_url("?mod=users&action=add") ; ?>">Thêm thành viên</a>
        </div>
        <div class="section-detail">
          <div class="content-news">
            <?php
              // if($num_rows > 0){
            ?>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">stt</th>
                  <th scope="col">ID</th>
                  <th scope="col">Họ và tên</th>
                  <th scope="col">Email</th>
                  <th scope="col">Tên đăng nhập</th>
                  <th scope="col">Giới tính</th>
                  <th scope="col">Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (!empty($list_users)) {
                  $t = 0;
                  foreach ($list_users as $user) {
                      $t ++;
                ?>
                <tr>
                  <th scope="row"><?php echo $t ?></th>
                  <td><?php echo $user['id'] ?></td>
                  <td><?php echo $user['fullname'] ?></td>
                  <td><?php echo $user['email'] ?></td>
                  <td><?php echo $user['username'] ?></td>
                  <td><?php echo $user['gender'] ?></td>
                  <td>
                    <a href="<?php //echo $user['url_update'] ?>">Sửa</a>
                    <i>|</i>
                    <a href="<?php //echo $user['url_delete'] ?>">Xoá</a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <div class="alert alert-info" role="alert">
              có <?php echo db_num_rows("SELECT * FROM `tbl_user`") ?> thành viên trong hệ thống.
            </div>
            <?php //}}else{ ?>
            <!-- <div class="alert alert-danger" role="alert">
              Chưa có danh sách thành viên
            </div> -->
            <?php } ?>
          </div>
        </div>
      </div>
      <?php //get_pagging($num_page, $page, "?mod=user&act=main");?>
    </div>
  </div>
</div>
<?php get_footer(); ?>