<div class="col-md-9 content">
    <?php
    spl_autoload_register(function ($class_name) {
        $filename = $class_name . '.php';
        $filename = str_replace('\\', '/', $filename);
        if (file_exists($filename)) {
            include_once $filename;
        }
    });

    // Phân trang content
    // Lấy tham số tab
    if (isset($_GET['tab'])) {
        $tab = trim(addslashes(htmlspecialchars($_GET['tab'])));
    } else {
        $tab = '';
    }

    // Nếu có tham số tab
    if ($tab != '') {
        // Hiển thị template chức năng theo tham số tab
        if ($tab == 'profile') {
            // Hiển thị template hồ sơ cá nhân
            require_once 'admin/templates/profile.php';
        } else if ($tab == 'posts') {
            // Hiển thị template bài viết
            require_once 'admin/templates/posts.php';
        } else if ($tab == 'photos') {
            // Hiển thị template hình ảnh
            require_once 'admin/templates/photos.php';
        } else if ($tab == 'categoriesTL') {
            // Hiển thị template Thể loại & Loại Tin
            require_once 'admin/templates/categoriesTL.php';
        } else if ($tab == 'categoriesLT') {
            // Hiển thị template Thể loại & Loại Tin
            require_once 'admin/templates/categoriesLT.php';
        } else if ($tab == 'setting') {
            // Hiển thị template cài đặt chung
            require_once 'admin/templates/setting.php';
        } else if ($tab == 'signout') {
            // thoát và xoá session
            echo ("<script>location.href = 'http://localhost:8080/webnewss/';</script>");
            session_destroy();
        }
    }
    // Ngược lại không có tham số tab
    else {

        include 'admin/templates/dashboard.php';
    }

    ?>
</div><!-- div.content -->