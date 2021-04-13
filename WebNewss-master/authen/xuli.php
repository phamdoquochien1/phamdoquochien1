<?php
header('Content-Type: text/html; charset=utf-8');
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('mysql', 'root', 'root', 'Webtintuc') or die('Lỗi kết nối');
mysqli_set_charset($conn, "utf8");

// Dùng isset để kiểm tra Form
if (isset($_POST['reg_submit'])) {
    $username = trim($_POST['email']);
    $password = trim($_POST['password']);
    $repassword = trim($_POST['repassword']);
    // $email = trim($_POST['email']);

    if (empty($username)) {
        array_push($errors, "Email is required");
    }
    // if (empty($email)) {
    // array_push($errors, "Email is required"); 
    // }

    if (empty($password)) {
        array_push($errors, "Two password do not match");
    }
    // so sánh hai pass có trùng nhau k 
    if (strcmp($_POST['password'], $_POST['repassword']) != 0) {
        echo '<script language="javascript">alert("Nhập lại pass!"); </script>';
    }

    // Kiểm tra username hoặc email có bị trùng hay không
    $sql = "SELECT * FROM Users WHERE UserNames = '$username'";

    // Thực thi câu truy vấn
    $result = mysqli_query($conn, $sql);



    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0) {
        echo '<script language="javascript">alert("Bị trùng tên hoặc chưa nhập tên!"); window.location="login.php";</script>';

        // Dừng chương trình
        die();
    } else {
        $sql = "INSERT INTO Users (UserNames, PassWords) VALUES ('$username','$password')";
        $result2 = mysqli_query($conn, $sql);
        if ($result2) {

            echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="/authen/login.php";</script>';
        }
    }
}