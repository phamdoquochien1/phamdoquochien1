<?php
// ket noi database
spl_autoload_register(function ($class_name) {
    $filename = $class_name . '.php';
    $filename = str_replace('\\', '/', $filename);
    if (file_exists($filename)) {
        include_once $filename;
    }
});
// show_source("signin.php");
include_once("core/init.php");

use classes\DB;
use classes\Session;
use classes\Redirect;

// Kết nối database
$db = new DB();
$db->connect();
// var_dump($db);


// neu co POST

if (isset($_POST['user_signin']) && isset($_POST['pass_signin'])) {
    // Xử lý các giá trị 
    $user_signin = trim(htmlspecialchars(addslashes($_POST['user_signin'])));
    $pass_signin = trim(htmlspecialchars(addslashes($_POST['pass_signin'])));
    // Các biến xử lý thông báo
    $show_alert = '<script>$("#formSignin .alert").removeClass("hidden");</script>';
    $hide_alert = '<script>$("#formSignin .alert").addClass("hidden");</script>';
    $success = '<script>$("#formSignin .alert").attr("class", "alert alert-success");</script>';
    // Nếu giá trị rỗng
    if ($user_signin == '' || $pass_signin == '') {
        echo $show_alert . 'Vui lòng điền đầy đủ thông tin.';
    }
    // Ngược lại
    else {
        $sql_check_user_exist = "SELECT Username FROM users WHERE Username = '$user_signin'";
        // Nếu tồn tại Username
        if ($db->num_rows($sql_check_user_exist)) {
            $pass_signin = md5($pass_signin);
            $sql_check_signin = "SELECT Username, Password FROM users WHERE Username = '$user_signin' AND Password = '$pass_signin'";
            if ($db->num_rows($sql_check_signin)) {
                $sql_check_stt = "SELECT Username, Password, Active FROM users WHERE Username = '$user_signin' AND Password = '$pass_signin' AND Active = '0'";
                // Nếu Username và Password khớp và tài khoản không bị khoá (Active = 0)
                if ($db->num_rows($sql_check_stt)) {
                    // Lưu session
                    // $GLOBALS["user_signin"];
                    $session->send($user_signin);
                    // $session = new Session();
                    // $session->send($user_signin);


                    $db->close(); // Giải phóng

                    echo $show_alert . $success . 'Đăng nhập thành công.';

                    echo ("<script>location.href = 'http://localhost:8080/webnewss/';</script>");

                    // new Redirect('http://localhost:8000'); // Trở về trang index

                } else {
                    echo $show_alert . 'Tài khoản của bạn đã bị khoá, vui lòng liên hệ quản trị viện để biết thêm thông tin chi tiết.';
                }
            } else {
                echo $show_alert . 'Mật khẩu không chính xác.';
            }
        }
        // Ngược lại không tồn tại Username
        else {
            echo $show_alert . 'Tên đăng nhập không tồn tại.';
        }
    }
}
// Ngược lại không tồn tại phương thức post
else {
    // new Redirect($_DOMAIN); // Trở về trang index
    echo ("<script>location.href = 'http://localhost:8080/webnewss/';</script>");
}