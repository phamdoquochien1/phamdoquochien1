<div class="col-md-3 sidebar">
    <ul class="list-group">
        <li class="list-group-item">
            <?php
            // echo $session->get();
            // echo $user_signin; 
            ?>
            <div class="media">
                <a class="pull-left">
                    <img class="media-object" src="
                    <?php
                    // URL ảnh đại diện tài khoản
                    spl_autoload_register(function ($class_name) {
                        $filename = $class_name . '.php';
                        $filename = str_replace('\\', '/', $filename);
                        if (file_exists($filename)) {
                            include_once $filename;
                        }
                    });
                    // require_once "admin/core/init.php";

                    use classes\Session;
                    use classes\DB;

                    $getuser = $session->get();
                    $sql = "SELECT HoTen, idGroup,Active, url_avatar FROM users WHERE Username = '$getuser'";
                    $type = 0; // luoi nen code vay
                    $db = new DB;

                    // echo $session->get();
                    // ;
                    // if ($this->cn) {
                    $query = mysqli_query($db->connect(), $sql);
                    // echo 123;
                    // $data_user = array();
                    // var_dump($query);
                    // var_dump(mysqli_fetch_assoc($query));
                    if ($query) {
                        if ($type == 0) {
                            // Lấy nhiều dữ liệu gán vào mảng
                            $data_user = mysqli_fetch_assoc($query);
                        }
                    }

                    // var_dump($data_user);

                    // }
                    if ($data_user['url_avatar'] == '') {
                        echo $_DOMAIN . 'images/profile.png';
                    } else {
                        echo $data_user['url_avatar'];
                    }
                    ?>
                    " alt="Ảnh đại diện của <?php echo $data_user['HoTen']; ?>" width="64" height="64">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo $data_user['HoTen']; ?></h4>
                    <?php

                    // Hiển thị cấp bậc tài khoản
                    // Nếu tài khoản là admin
                    if ($data_user['idGroup'] == '1') {
                        echo '<span class="label label-primary">Quản trị viên</span>';
                    }
                    // Ngược lại tài khoản là tác giả
                    else {
                        echo '<span class="label label-success">Tác giả</span>';
                    }
                    ?>
                </div>
            </div>
        </li>
        <a class="list-group-item" href="<?php echo $_DOMAIN; ?>">
            <span class="glyphicon glyphicon-dashboard"></span> Bảng điều khiển
        </a>
        <a class="list-group-item" href="<?php echo $_DOMAIN; ?>profile">
            <span class="glyphicon glyphicon-user"></span> Hồ sơ cá nhân
        </a>
        <a class="list-group-item" href="<?php echo $_DOMAIN; ?>posts">
            <span class="glyphicon glyphicon-edit"></span> Bài viết
        </a>
        <a class="list-group-item" href="<?php echo $_DOMAIN;  ?>photos">
            <span class="glyphicon glyphicon-picture"></span> Hình ảnh
        </a>
        <?php

        // Phân quyền sidebar
        // Nếu tài khoản là admin
        if ($data_user['idGroup'] == '1') {
            echo
            '
                <a class="list-group-item" href="' . $_DOMAIN . 'categoriesTL">
                    <span class="glyphicon glyphicon-tag"></span> Thể loại 
                </a>
                <a class="list-group-item" href="' . $_DOMAIN . 'categoriesLT">
                    <span class="glyphicon glyphicon-tag"></span> Loại Tin
                </a>
                <a class="list-group-item" href="' . $_DOMAIN . 'setting">
                    <span class="glyphicon glyphicon-cog"></span> Cài đặt chung
                </a>  
            ';
        }

        ?>
        <a class="list-group-item" href="<?php echo $_DOMAIN; ?>signout">
            <span class="glyphicon glyphicon-off"></span> Thoát
        </a>
    </ul><!-- ul.list-group -->
</div><!-- div.sidebar -->