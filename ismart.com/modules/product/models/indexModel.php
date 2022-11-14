<?php
function get_info_cat($cat_id) {
  $item = db_fetch_row("SELECT * FROM `tbl_category` WHERE `id` = {$cat_id}");
  return $item;
  // global $list_product_cat;
  // if(array_key_exists($cat_id, $list_product_cat)){
  //   $list_product_cat[$cat_id]['url'] = "?mod=product&act=main&cat_id={$cat_id}";
  //   return $list_product_cat[$cat_id];
  // }
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

function get_product_by_id($id) {
  global $list_product;
  if(array_key_exists($id, $list_product)){
    $list_product[$id]['url_add_cart'] = "?mod=cart&act=add&id={$id}";
    $list_product[$id]['url'] = "?mod=product&act=detail&id={$id}";
    return $list_product[$id];
  }
  return false;
}

function get_product($start = 1,$num_per_page = 6, $where = "") {
  if(!empty($where)){
    $where = "WHERE {$where}";
  }
  $list_product = db_fetch_array("SELECT * FROM `tbl_product` {$where} ORDER BY id DESC LIMIT $start,$num_per_page");
  return $list_product;
}