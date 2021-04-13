$_DOMAIN = 'http://localhost:8080/Webnewss/';
// Đăng nhập
$('#formSignin button').on('click', function () {
    $this = $('#formSignin button');
    $this.html('Đang tải nhoé...');
    // Gán các giá trị trong các biến
    $user_signin = $('#formSignin #user_signin').val();
    $pass_signin = $('#formSignin #pass_signin').val();
    // Nếu các giá trị rỗng
    if ($user_signin == '' || $pass_signin == '') {
        $('#formSignin .alert').removeClass('hidden');
        $('#formSignin .alert').html('Vui lòng điền đầy đủ thông tin.');
        $this.html('Đăng nhập');
    }
    // Ngược lại
    else {
        $.ajax({
            url: '/webnewss/admin/signin.php',
            type: 'POST',
            data: {
                user_signin: $user_signin,
                pass_signin: $pass_signin
            }, success: function (data) {
                $('#formSignin .alert').removeClass('hidden');
                $('#formSignin .alert').html(data);
                $this.html('Đăng nhập');
            }, error: function () {
                $('#formSignin .alert').removeClass('hidden');
                $('#formSignin .alert').html('Không thể đăng nhập vào lúc này, hãy thử lại sau.');
                $this.html('Đăng nhập');
            }
        });
    }
});
// Tự động tạo slug
function ChangeToSlug() {
    var title, slug;
    title = $('.title').val();
    slug = title.toLowerCase();

    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    slug = slug.replace(/ /gi, "-");
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    $('.slug').val(slug);
}

$('.slug').on('click', function () {
    ChangeToSlug();
});
// Tải Loai tin cha ở chức năng thêm Loai tin
$('#formAddCate input[type="radio"]').on('click', function() {
    if ($('#formAddCate .type-add-cate-1:checked').prop("checked") == true) 
    {
        $('.parent-add-cate').addClass('hidden');
        $('.parent-add-cate select').html('');
    }
    else if ($('#formAddCate .type-add-cate-2:checked').prop("checked") == true) 
    {
        $type_add_cate = $('#formAddCate .type-add-cate-2').val();
 
        $.ajax({
            type : 'POST',
            url : $_DOMAIN + 'categories.php',
            data : {
                action : 'load_add_parent_cate',
                type_add_cate : $type_add_cate
            }, success : function(data) {
                $('.parent-add-cate').removeClass('hidden');
                $('.parent-add-cate select').html(data);
            }, error : function() {
                $('.parent-add-cate').removeClass('hidden');
                $('.parent-add-cate').html('Đã có lỗi xảy ra, hãy thử lại sau.');
            }
        });
    } 
    else if ($('#formAddCate .type-add-cate-3:checked').prop("checked") == true) 
    {
        $type_add_cate = $('#formAddCate .type-add-cate-3').val();
        $.ajax({
            type : 'POST',
            url : $_DOMAIN + 'categories.php',
            data : {
                action : 'load_add_parent_cate',
                type_add_cate : $type_add_cate
            }, success : function(data) {
                $('.parent-add-cate').removeClass('hidden');
                $('.parent-add-cate select').html(data);
            }, error : function() {
                $('.parent-add-cate').removeClass('hidden');
                $('.parent-add-cate').html('Đã có lỗi xảy ra, hãy thử lại sau.');
            }
        });
    }
});
// Thêm Loai tin
$('#formAddCate button').on('click', function() {
    $this = $('#formAddCate button');
    $this.html('Đang tải ...');
 
    // Gán các giá trị trong các biến
    $label_add_cate = $('#formAddCate #label_add_cate').val();
    $url_add_cate = $('#formAddCate #url_add_cate').val();
    $type_add_cate = $('#formAddCate input[name="type_add_cate"]:radio:checked').val();
    $parent_add_cate = $('#formAddCate #parent_add_cate').val();
    $sort_add_cate = $('#formAddCate #sort_add_cate').val();
 
    // Nếu các giá trị rỗng
    if ($label_add_cate == '' || $url_add_cate == '' || $type_add_cate == '' || $sort_add_cate == '')
    {
        $('#formAddCate .alert').removeClass('hidden');
        $('#formAddCate .alert').html('Vui lòng điền đầy đủ thông tin.');
        $this.html('Tạo');
    }
    // Ngược lại
    else
    {
        $.ajax({
            url : $_DOMAIN + 'categories.php',
            type : 'POST',
            data : {
                label_add_cate : $label_add_cate,
                url_add_cate : $url_add_cate,
                type_add_cate : $type_add_cate,
                parent_add_cate : $parent_add_cate,
                sort_add_cate : $sort_add_cate,
                action : 'add_cate'
            }, success : function(data) {
                $('#formAddCate .alert').removeClass('hidden');
                $('#formAddCate .alert').html(data);
                $this.html('Tạo');
            }, error : function() {
                $('#formAddCate .alert').removeClass('hidden');
                $('#formAddCate .alert').html('Không thể tạo Loai tin vào lúc này, hãy thử lại sau.');
                $this.html('Tạo');
            }
        });
    }
});

// Tải Loai tin cha ở chức năng chỉnh sửa loai tin
$('#formEditCate input[type="radio"]').on('click', function() {
    $id_edit_cate = $('#formEditCate').attr('data-id');
    if ($('#formEditCate .type-edit-cate-1:checked').prop("checked") == true) 
    {
        $('.parent-edit-cate').addClass('hidden');
        $('.parent-edit-cate select').html('');
    }
    else if ($('#formEditCate .type-edit-cate-2:checked').prop("checked") == true) 
    {
        $type_edit_cate = $('#formEditCate .type-edit-cate-2').val();
 
        $.ajax({
            type : 'POST',
            url : $_DOMAIN + 'categories.php',
            data : {
                action : 'load_edit_parent_cate',
                type_edit_cate : $type_edit_cate,
                id_edit_cate : $id_edit_cate
            }, success : function(data) {
                $('.parent-edit-cate').removeClass('hidden');
                $('.parent-edit-cate select').html(data);
            }, error : function() {
                $('.parent-edit-cate').removeClass('hidden');
                $('.parent-edit-cate').html('Đã có lỗi xảy ra, hãy thử lại sau.');
            }
        });
    } 
    else if ($('#formEditCate .type-edit-cate-3:checked').prop("checked") == true) 
    {
        $type_edit_cate = $('#formEditCate .type-edit-cate-3').val();
        $.ajax({
            type : 'POST',
            url : $_DOMAIN + 'categories.php',
            data : {
                action : 'load_edit_parent_cate',
                type_edit_cate : $type_edit_cate,
                id_edit_cate : $id_edit_cate
            }, success : function(data) {
                $('.parent-edit-cate').removeClass('hidden');
                $('.parent-edit-cate select').html(data);
            }, error : function() {
                $('.parent-edit-cate').removeClass('hidden');
                $('.parent-edit-cate').html('Đã có lỗi xảy ra, hãy thử lại sau.');
            }
        });
    }
});
// Chỉnh sửa Loai tin
$('#formEditCate button').on('click', function() {
    $this = $('#formEditCate button');
    $this.html('Đang tải ...');
 
    // Gán các giá trị trong các biến
    $label_edit_cate = $('#formEditCate #label_edit_cate').val();
    $url_edit_cate = $('#formEditCate #url_edit_cate').val();
    $type_edit_cate = $('#formEditCate input[name="type_edit_cate"]:radio:checked').val();
    $parent_edit_cate = $('#formEditCate #parent_edit_cate').val();
    $sort_edit_cate = $('#formEditCate #sort_edit_cate').val();
    $id_edit_cate = $('#formEditCate').attr('data-id');
 
    // Nếu các giá trị rỗng
    if ($label_edit_cate == '' || $url_edit_cate == '' || $type_edit_cate == '' || $sort_edit_cate == '')
    {
        $('#formEditCate .alert').removeClass('hidden');
        $('#formEditCate .alert').html('Vui lòng điền đầy đủ thông tin.');
        $this.html('Lưu thay đổi');
    }
    // Ngược lại
    else
    {
        $.ajax({
            url : $_DOMAIN + 'categories.php',
            type : 'POST',
            data : {
                label_edit_cate : $label_edit_cate,
                url_edit_cate : $url_edit_cate,
                type_edit_cate : $type_edit_cate,
                parent_edit_cate : $parent_edit_cate,
                sort_edit_cate : $sort_edit_cate,
                id_edit_cate : $id_edit_cate,
                action : 'edit_cate'
            }, success : function(data) {
                $('#formEditCate .alert').removeClass('hidden');
                $('#formEditCate .alert').html(data);
                $this.html('Lưu thay đổi');
            }, error : function() {
                $('#formEditCate .alert').removeClass('hidden');
                $('#formEditCate .alert').html('Không thể chỉnh sửa chuyên mục vào lúc này, hãy thử lại sau.');
                $this.html('Lưu thay đổi');
            }
        });
    }
});