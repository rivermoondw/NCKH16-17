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
    <title>Đăng ký</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <!-- CSS Bootstrap & Custom -->
    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url();?>plugins/iCheck/square/blue.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="../../index2.html"><b>Đăng ký</b></a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg"></p>

        <?php
        echo isset($_SESSION['auth_message']) ? $_SESSION['auth_message'] : FALSE;
        echo form_open();
        echo form_error('username');
        echo form_error('password');
        ?>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Tên đăng nhập" name="username">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="confirm_password">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> I agree to the <a href="#">terms</a>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit" value="submit">Xác nhận</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <a href="login.html" class="text-center">Tôi đã có tài khoản</a>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->
<!-- JavaScrpit -->
<script src="<?php echo base_url();?>js/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url();?>bootstrap/js/bootstrap.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>