<?php
function get_info_cat($cat_id) {
  $item = db_fetch_array("SELECT * FROM `tbl_category` WHERE `id` = {$cat_id}");
  return $item;
  // global $list_product_cat;
  // if(array_key_exists($cat_id, $list_product_cat)){
  //   $list_product_cat[$cat_id]['url'] = "?mod=product&act=main&cat_id={$cat_id}";
  //   return $list_product_cat[$cat_id];
  // }
}
function show_list_product_cat() {
  $item = db_fetch_array("SELECT * FROM `tbl_category`");
  return $item;
}

function get_list_product($cat_id) {
  $item = db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = {$cat_id}");
  return $item;
  // global $list_product;
  // $result = array(); // mảng chứa danh sách sp theo id
  // foreach($list_product as $item) {
  //   if($item['cat_id'] == $cat_id) {
  //     $item['url'] = "?mod=product&act=detail&id={$item['id']}";
  //     $result[] = $item;
  //   }
  // }
  // return $result;
}