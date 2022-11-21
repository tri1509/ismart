<?php get_header() ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<style>
#show_list_file {
  width: 200px;
  height: 200px;
  overflow: hidden;
}

#show_list_file img {
  max-width: 100%;
  max-height: 100%;
}
</style>
<div id="main-content-wp" class="add-cat-page">
  <div class="wrap clearfix">
    <?php get_sidebar() ?>
    <div id="content" class="fl-right">
      <div class="section" id="title-page">
        <div class="clearfix">
          <h3 id="index" class="fl-left">Thêm trang</h3>
        </div>
      </div>
      <?php echo form_success('success'); ?>
      <div class="section" id="detail-page">
        <div class="section-detail">
          <form method="POST" id="form-upload-single" action="" enctype="multipart/form-data">
            <label for="title">Tiêu đề</label>
            <?php echo form_error('title'); ?>
            <input type="text" name="title" id="title">
            <label for="title">Slug ( Friendly_url )</label>
            <?php echo form_error('slug'); ?>
            <input type="text" name="slug" id="slug">
            <label for="desc">Mô tả</label>
            <?php echo form_error('desc'); ?>
            <textarea name="desc" id="desc" class="ckeditor"></textarea>
            <label>Hình ảnh</label>
            <?php echo form_error('file'); ?>
            <div id="uploadFile">
              <input type="file" name="file" id="file" data-uri="?mod=page&controller=index">
              <input id="thumbnail_url" type="hidden" name="thumbnail_url" value="" />
              <!-- <input type="submit" name="Upload" value="Upload" id="upload_single_bt"> -->
              <div id="show_list_file">
              </div>
            </div>
            <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer() ?>