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
    <title><?php echo $pagetitle;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <!-- CSS Bootstrap & Custom -->
    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url();?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url();?>dist/css/skins/_all-skins.min.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php echo $before_head; ?>
</head>
<body>
<header class="fc_header">
    <div class="fc_innerwraper container">
        <div class="rơw">
            <div class="col-md-3 text-right">
                <img src="<?php echo base_url();?>images/logo.png" />
            </div>
            <div class="col-md-6 search_query">
                <input type="text">
            </div>
            <div class="col-md-3 text-right header_r dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo base_url();?>images/16904922_1681057578860437_6883583468305233941_o.jpg" height="40" width="40" class="img-circle avt_small"/>
                </a>
                <ul class="dropdown-menu">
                    <li class="header"></li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                            <li>
                                <a href="<?php echo base_url().'user/logout' ?>">
                                    <i class="fa fa-users text-aqua"></i> Đăng xuất
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="footer"><a href="#"></a></li>
                </ul>
            </div>
        </div>
    </div> <!-- /.fc_innerwrapper -->
</header> <!-- /header -->
