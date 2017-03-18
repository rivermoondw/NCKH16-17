<?php $this->load->view('partials/header'); ?>
<div class="fc_body">
    <div class="fc_innerwrapper container">
        <div class="row">
            <?php $this->load->view('partials/fcl'); ?>
            <!-- Noi dung cua page -->
            <div class="col-md-6 fcm">
                <?php echo $the_view_content; ?>
            </div> <!-- /.fcm -->
            <?php $this->load->view('partials/fcr'); ?>
        </div>
    </div> <!-- /.fc_innerwrapper -->
</div> <!-- /.fc_body -->
<?php $this->load->view('partials/footer'); ?>