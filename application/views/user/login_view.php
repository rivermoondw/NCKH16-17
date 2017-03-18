<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en">
<![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang="en">
<![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html> <!--<![endif]-->
<head>
    <title>Family Caretaker</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <!-- CSS Bootstrap & Custom -->
    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">

    <!-- JavaScrpit -->
    <script src="<?php echo base_url();?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url();?>bootstrap/js/bootstrap.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-7">
            Nội dung giới thiệu
        </div>
        <div class="col-md-5">
            <div class="login_form">
                <?php
                echo isset($_SESSION['auth_message']) ? $_SESSION['auth_message'] : FALSE;
                echo form_open();
                echo form_label('Tài khoản:','taikhoan').'<br/>';
                echo form_error('taikhoan');
                echo form_input('taikhoan').'<br/>';
                echo form_label('Mật khẩu:','matkhau').'<br/>';
                echo form_error('matkhau');
                echo form_password('matkhau').'<br/>';
                echo form_checkbox('remember','1',FALSE).' Ghi nhớ<br/>';
                echo form_submit('submit','Đăng nhập');
                echo form_close();
                ?>
            </div>
            <div class="register_form">

            </div>
        </div>
    </div>
</div>
</body>
</html>