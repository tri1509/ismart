<?php

function construct() {
    load('helper','format');
    load_model('index');
}

function indexAction() {
    
}

function mainAction() {
    $cat_id = (int) $_GET['cat_id'];
    // Lấy thông tin danh mục
    $info_cat = get_info_cat($cat_id);
    $data['info_cat'] = $info_cat;
    //  Lấy danh sách sản phẩm
    $list_item = get_list_product($cat_id);
    $data['list_item'] = $list_item;
    
    load_view('index', $data);
}