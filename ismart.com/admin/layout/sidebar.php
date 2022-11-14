<div id="sidebar" class="fl-left">
  <div id="main-menu-wp">
    <ul class="list-item">
      <li class="active">
        <a href="?" title="Trang chủ">Trang chủ</a>
      </li>
      <li>
        <a href="gioi-thieu-1.html" title="Giới thiệu">Giới thiệu</a>
      </li>
      <li>
        <a href="lien-he-2.html" title="Liên hệ">Liên hệ</a>
      </li>
      <li>
        <a href="danh-muc/dien-thoai-1.html" title="">Điện thoại</a>
      </li>
      <li>
        <a href="danh-muc/may-tinh-bang-2.html" title="">Máy tính bảng</a>
      </li>
      <li>
        <a href="<?php echo base_url("?mod=users&controller=index") ; ?>" title="" class="text-info">Thành viên</a>
      </li>
      <?php if(is_login()){ ?>
      <li>
        <a href="<?php echo base_url("?mod=users&action=logout") ; ?>" title="Đăng xuất"
          onclick="return confirm('Bạn có muốn đăng xuất không ?')" class="text-danger">
          Đăng xuất
        </a>
      </li>
      <?php }else{ ?>
      <li>
        <a href="<?php echo base_url("?mod=users&action=login") ; ?>" title="đăng nhập" class="text-primary">
          Đăng nhập
        </a>
      </li>
      <li>
        <a href="<?php echo base_url("?mod=users&action=reg") ; ?>" title="đăng nhập" class="text-primary">Đăng ký</a>
      </li>
      <?php } ?>
    </ul>
  </div>
</div>