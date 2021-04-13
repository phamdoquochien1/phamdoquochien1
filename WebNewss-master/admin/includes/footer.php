<!-- Liên kết thư viện jQuery Form -->
<link rel=”stylesheet” href=”http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css”>
<link rel=”stylesheet” href=”http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css”>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script> -->

<!-- Liên kết thư viện hàm xử lý form -->
<script src="admin/js/form.js"></script>
</body>
<?php

// Active sidebar
// Lấy tham số tab
if (isset($_GET['tab'])) {
    $tab = trim(addslashes(htmlspecialchars($_GET['tab'])));
} else {
    $tab = '';
}

// Nếu có tham số tab
if ($tab != '') {
    // Tháo active của Bảng điều khiển
    echo '<script>$(".sidebar ul a:eq(1)").removeClass("active");</script>';
    // Active theo giá trị của tham số tab
    if ($tab == 'profile') {
        echo '<script>$(".sidebar ul a:eq(2)").addClass("active");</script>';
    } else if ($tab == 'posts') {
        echo '<script>$(".sidebar ul a:eq(3)").addClass("active");</script>';
    } else if ($tab == 'photos') {
        echo '<script>$(".sidebar ul a:eq(4)").addClass("active");</script>';
    } else if ($tab == 'categories') {
        echo '<script>$(".sidebar ul a:eq(5)").addClass("active");</script>';
    } else if ($tab == 'setting') {
        echo '<script>$(".sidebar ul a:eq(6)").addClass("active");</script>';
    }
}

?>

</html>