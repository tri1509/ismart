<?php
function  add_page($data) {
  return db_insert('tbl_page',$data);
}