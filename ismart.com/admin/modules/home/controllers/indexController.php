<?php

function construct() {  
    load('helper','format');
    load_model('index');
}

function indexAction() {
    $list = show_list_product_cat();
    foreach($list as $item){
        $cat_id = $item['id'];
        $list_item = get_list_product($cat_id);
        $data['list_item'] = $list_item;
    }
    $data['list'] = $list;
    load_view('index',$data);
}