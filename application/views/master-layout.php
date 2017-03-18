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
    <title><?php echo $title;?></title>
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
<?php $this->load->view('partials/header'); ?>

<div class="fc_body">
    <div class="fc_innerwrapper container">
        <div class="row">
            <?php $this->load->view('partials/fcl'); ?>
            <!-- Noi dung cua page -->
            <div class="col-md-6 fcm">
                <?php $this->load-view($subview); ?>
            </div> <!-- /.fcm -->
            <?php $this->load->view('partials/fcr'); ?>
        </div>
    </div> <!-- /.fc_innerwrapper -->
</div> <!-- /.fc_body -->
<?php $this->load->view('partials/footer'); ?>
</body>
</html>