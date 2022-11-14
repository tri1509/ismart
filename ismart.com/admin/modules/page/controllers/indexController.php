<?php

function construct() {
    load_model('index');
}

function indexAction() {
    load('helper','format');
    load_view('index');
}

function detailAction() {
    load_view('index');
}