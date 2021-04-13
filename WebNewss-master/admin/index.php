<?php

spl_autoload_register(function ($class_name) {
    $filename = $class_name . '.php';
    $filename = str_replace('\\', '/', $filename);
    if (file_exists($filename)) {
        include_once $filename;
    }
});
// Require database & thông tin chung
require_once 'core/init.php';
// Require header
require_once 'includes/header.php';

// Nếu đăng nhập
if ($user) {

    // Hiển thị sidebar
    require_once 'templates/sidebar.php';

    // Hiển thị sidebar
    require_once 'templates/content.php';
}
// Nếu không đăng nhập
else {
    // Hiển thị form đăng nhập
    require_once 'templates/signin.php';
}

// Require footer
require_once 'includes/footer.php';