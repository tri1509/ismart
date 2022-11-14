<?php
// hàm lấy dữ liệu page theo id

function get_page_by_id($id) {
  $item = db_fetch_row("SELECT * FROM `tbl_page` WHERE `id` = {$id}");
  return $item;
}