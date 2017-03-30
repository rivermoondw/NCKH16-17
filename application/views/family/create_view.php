<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Thêm gia đình</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <?php
    $att = array('role'=>'form');
    echo form_open('',$att);
    ?>
        <div class="box-body">
            <?php
            echo form_error('giadinh');
            ?>
            <div class="form-group">
                <label for="giadinh">Tên gia đình</label>
                <input type="text" class="form-control" id="giadinh" placeholder="Tên gia đình" name="giadinh">
            </div>
            <div class="form-group">
                <label for="mota">Mô tả</label>
                <textarea class="form-control" rows="3" placeholder="Mô tả" name="mota" id="mota"></textarea>
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Xác nhận</button>
        </div>
    <?php echo form_close(); ?>
</div>
<!-- /.box -->