<div class="row">
    <?php
    foreach ($the_view_content as $key => $val){
    ?>
        <div class="col-md-6">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-white">
              <div class="widget-user-image">
                <img class="img-circle" src="<?php echo base_url();?>images/16904922_1681057578860437_6883583468305233941_o.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?php echo $val['hoten']; ?></h3>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
    <?php
    }
    ?>
</div>