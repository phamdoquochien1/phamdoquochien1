<?php

// Require các thư viện PHP
// require_once "admin/classes/DB.php";
// require "admin/classes/Session.php";
// require "admin/classes/Functions.php";
spl_autoload_register(function ($class_name) {
    $filename = "admin" . '/' . $class_name . '.php';
    $filename = str_replace('\\', '/', $filename);
    if (file_exists($filename)) {
        include_once $filename;
    }
});

use classes\Session;
use classes\Redirect;


use classes\DB;

// Kết nối database
$db = new DB();
$db->connect();

$db->set_char('utf8');

// Thông tin chung
$_DOMAIN = 'http://localhost:8080/webnewss/admin/';

date_default_timezone_set('Asia/Ho_Chi_Minh');
$date_current = '';
$date_current = date("Y-m-d H:i:sa");

// Khởi tạo session
$session = new Session();
$session->start();

// Kiểm tra session
if ($session->get() != '') {
    $user = $session->get();
} else {
    $user = '';
}