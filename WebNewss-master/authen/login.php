<!DOCTYPE>
<html>

<head>
    <meta charset="UTF-8">
    <title>Express</title>
    <link href="/assets/css/style-login.css" rel="stylesheet">
    <script language="javascript" src="/assets/js/Effect-PopupLogin.js"></script>
</head>

<body>



    <button onclick="togglePopup()">Đăng nhập</button>

    <section class="popup" id="popup-1">
        <section class="overlay"></section>
        <section class="content">
            <section class="close-btn" onclick="togglePopup()">&times;</section>

            <section class="tabs">
                <button class="tablinks" onclick="openUser(event,'login')">Đăng Nhập</button>
                <button class="tablinks" onclick="openUser(event,'regis')">Tạo tài khoản</button>
            </section>

            <section id="login" class="tabcontent">
                <p>Đăng nhập với Email</p>
                <form class="btn-list" method="POST">
                    <input type="text" name="email" value="" placeholder=" Email" class="box-input"><br>
                    <input type="password" name="password" value="" placeholder=" Mật Khẩu" class="box-input"><br>
                    <input type="submit" value="Đăng nhập" name="submit" class="logo-login">
                </form>
                <button class="reset-pass" onclick="repassPopup()">Lấy lại mật khẩu<button>
            </section>
            <section id="regis" class="tabcontent ">
                <p>Tạo tài khoản với</p>
                <!-- <button class="box-link">Facebook</button><br> -->
                <!-- <button class="box-link gg">Google</button> -->
                <form class="btn-list" method="POST" action="/authen/xuli.php">
                    <input type="text" name="email" value="" placeholder=" Email" class="box-input"><br>
                    <input type="password" name="password" value="" placeholder=" Mật Khẩu" class="box-input"><br>
                    <input type="password" name="repassword" value="" placeholder=" Nhập lại mật khẩu" class="box-input"><br>

                    <input type="submit" value="Đăng Ký" name="reg_submit" class="logo-login">
                </form>
            </section>
        </section>
    </section>

    <section class="popup" id="popup-2">
        <section class="overlay"></section>
        <section class="content">
            <section class="close-btn" onclick="repassPopup()">&times;</section>

            <section id="login" class="tabcontent">
                <h2 style="border-bottom: 1px solid #BDBDBD;">Lấy lại mật khẩu</h2>
                <p style="margin-top: 10px;">Nhập email của bạn để lấy lại mật khẩu</p>
                <form class="btn-list">
                    <input type="text" value="" placeholder=" Nhập email" class="box-input"><br>
                    <input type="submit" value="Lấy lại mật khẩu" class="logo-login">
                </form>
            </section>
            <section id="regis" class="tabcontent tabnone">
                <p>Tạo tài khoản với</p>
                <button class="box-link">Facebook</button><br>
                <button class="box-link gg">Google</button>

            </section>
        </section>
    </section>
</body>

</html>