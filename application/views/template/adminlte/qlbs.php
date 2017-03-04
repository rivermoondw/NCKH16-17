<?php
	include("./layout/topdoc.inc");
	include("./layout/header.inc");
	include("./layout/main-sidebar.inc");
	//Ket noi Database
	DEFINE('DB_USER','root');
	DEFINE('DB_PASSWORD','');
	DEFINE('DB_HOST','localhost');
	DEFINE('DB_NAME','nckhhh');
	$dbc = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) OR
	die('Khong ket noi den MySQL: .'. mysql_error());
	mysql_select_db(DB_NAME) OR die('Khong chon duoc CDSL nay: '. mysql_error());
	//Xoa
	if(isset($_POST['submitDelete'])){
		if (!empty($_POST['checkList'])){
			foreach($_POST['checkList'] as $value) {
	         //Xử lý các phần tử được chọn
	        	$query = "DELETE FROM bacsi WHERE bacsi_id=$value LIMIT 1";
	        	$result = mysql_query($query);
	       	}
		}
	}
	//Sua
	if (isset($_POST['submitUpdate'])){
		$bacsi = $_POST['bacsi'];
		$sdt = $_POST['sdt'];
		$mota = $_POST['mota'];
		$danhgia = $_POST['danhgia'];
		$khoa_id = $_POST['khoa_id'];
		$id = $_POST['id'];
		$query = "UPDATE bacsi SET bacsi='$bacsi',sdt='$sdt',mota='$mota',danhgia='$danhgia',khoa_id='$khoa_id' WHERE bacsi_id=$id";
		$result = mysql_query($query);
	}
	//Them
	if (isset($_POST['submitInsert'])){
		$bacsi = $_POST['bacsi'];
		$sdt = $_POST['sdt'];
		$mota = $_POST['mota'];
		$danhgia = $_POST['danhgia'];
		$khoa_id = $_POST['khoa_id'];
		$id = $_POST['id'];
		$query = "INSERT INTO bacsi (bacsi,sdt,mota,danhgia,khoa_id) VALUES ('$bacsi','$sdt','$mota','$danhgia','$khoa_id')";
		$result = mysql_query($query);
	}
?>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý bác sĩ
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Quản lý bác sĩ</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <div class="btn-group">
                  <button type="submit" class="btn btn-default btn-sm" name="submitDelete">Xóa</button>
                  <button type="button" class="btn btn-default btn-sm toForm"  id="update">Sửa</button>
                  <button type="button" class="btn btn-default btn-sm toForm"  id="insert">Thêm</button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
					<thead>
						<tr>
							<th><input type="checkbox" class="checkAll"></th>
							<th>Tên bác sĩ</th>
							<th>Số điện thoại</th>
							<th>Mô tả</th>
							<th>Đánh giá</th>
							<th>Khoa</th>
						</tr>
					</thead>
                  	<tbody>
                  	<?php
                  	$query = "SELECT bacsi_id, bacsi, sdt, mota, danhgia, khoa_id FROM bacsi ORDER BY bacsi_id";
                  	$result = mysql_query($query);
                  	while ($row = mysql_fetch_array($result,MYSQL_NUM)){
						echo '<tr>';
						echo '<td><input type="checkbox" name="checkList[]" value="'.$row[0].'" class="listCheck"></td>
		                    <td class="listBacsi">'.$row[1].'</td>
		                    <td class="listSdt">'.$row[2].'</td>
		                    <td class="listMota">'.$row[3].'</td>
		                    <td class="listDanhgia">'.$row[4].'</td>
		                    <td class="listKhoa_id">'.$row[5].'</td>';
						echo '</tr>';
					}
                  	?>
                  	</tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages --> 
            </div>
            <!-- /.box-body -->
            </form>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="box box-primary" id="form">
            <div class="box-header with-border">
              <h3 class="box-title">Thông tin bác sĩ</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <div class="box-body">
              	<input type="text" name="id" value="" hidden id="id">
                <div class="form-group">
                  <label for="bacsi">Tên bác sĩ</label>
                  <input type="text" class="form-control" name="bacsi" id="bacsi" placeholder="Nhập tên bác sĩ">
                </div>
                <div class="form-group">
                  <label for="sdt">Số điện thoại</label>
                  <input type="text" class="form-control" name="sdt" id="sdt" placeholder="Nhập số điện thoại">
                </div>
                <div class="form-group">
                  <label for="mota">Mô tả</label>
                  <input type="text" class="form-control" id="mota" placeholder="Nhập mô tả" name="mota">
                </div>
                <div class="form-group">
                  <label for="danhgia">Đánh giá</label>
                  <input type="text" class="form-control" id="danhgia" placeholder="Nhập đánh giá" name="danhgia">
                </div>
                <div class="form-group">
                  <label for="khoa_id">Khoa</label>
                  <input type="text" class="form-control" id="khoa_id" placeholder="Nhập id khoa" name="khoa_id">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary submitUpdate" name="submitUpdate" style="display:none">Xác nhận</button>
				<button type="submit" class="btn btn-primary submitInsert" name="submitInsert"">Xác nhận</button>
              </div>
            </form>
          </div>
    </section>
    <!-- /.content -->
  </div>
<?php
	include("./layout/footer.inc");
?>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- iCheck -->

<!-- Page Script -->
<script>
  	$(document).ready(function () {
	    // Handler for .ready() called.
	    $('.toForm').click(function () {
	        $('html, body').animate({
	            scrollTop: $('#form').offset().top
	        }, 'fast');
	        $('#id').val('');
			$('#bacsi').val('');
			$('#sdt').val('');
			$('#mota').val('');
			$('#danhgia').val('');
			$('#khoa_id').val('');
	    });
	    //Copy value
	    $('#update').click(function () {
	    	$('.listCheck').each(function(){
	    		if ($(this).is(':checked')){
	    			$('#id').val($(this).val());
	    			$('#bacsi').val($(this).parent().siblings('.listBacsi').text());
	    			$('#sdt').val($(this).parent().siblings('.listSdt').text());
	    			$('#mota').val($(this).parent().siblings('.listMota').text());
	    			$('#danhgia').val($(this).parent().siblings('.listDanhgia').text());
	    			$('#khoa_id').val($(this).parent().siblings('.listKhoa_id').text());
	    		}
	    	});
	    });
	    //Check all
	    $('.checkAll').change(function(){
	    	if ($(this).is(':checked')){
		    	$('.listCheck').prop('checked',true);
	    	} else {
	    		$('.listCheck').prop('checked',false);
	    	}
	    });
	    //Button
	    $('#update').click(function(){
	    	$('.submitUpdate').css('display','block');
	    	$('.submitInsert').css('display','none');
	    });
	    $('#insert').click(function(){
	    	$('.submitUpdate').css('display','none');
	    	$('.submitInsert').css('display','block');
	    });
	});
</script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<?php
	include("./layout/botdoc.inc");
?>