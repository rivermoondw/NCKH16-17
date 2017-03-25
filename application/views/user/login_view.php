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
<div class="wrapper">
    <div class="container ">
        <div class="row">
            <div class="col-md-7 fclogin_right">
                <p>Nội dung giới thiệu</p>
            </div>
            <div class="col-md-5 fclogin_left">
                <h1 class="fclogin_heading">Đăng nhập</h1>
                <div class="login_form">
                    <?php
                    echo isset($_SESSION['auth_message']) ? $_SESSION['auth_message'] : FALSE;
                    echo form_open();
                    echo form_error('taikhoan');
                    $tk = array(
                        'name' => 'taikhoan',
                        'placeholder' => 'Tên đăng nhập',
                        'class' => 'form-control',
                    );
                    echo form_input($tk).'<br/>';
                    $mk = array(
                        'name' => 'matkhau',
                        'placeholder' => 'Mật khẩu',
                        'class' => 'form-control'
                    );
                    echo form_error('matkhau');
                    echo form_password($mk).'<br/>';
                    echo form_checkbox('remember','1',FALSE).' Ghi nhớ<br/>';
                    $sm = array(
                        'name' => 'submit',
                        'value' => 'Đăng nhập',
                        'class' => 'btn btn-primary'
                    );
                    echo form_submit($sm);
                    echo form_close();
                    ?>
                </div>
                <div class="register_form">

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>