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
	        	$query = "DELETE FROM taikhoan WHERE taikhoan_id=$value LIMIT 1";
	        	$result = mysql_query($query);
	       	}
		}
	}
	//Sua
	if (isset($_POST['submitUpdate'])){
		$taikhoan = $_POST['account'];
		$matkhau = $_POST['password'];
		$email = $_POST['email'];
		$sdt = $_POST['phone'];
		$hoten = $_POST['name'];
		$diachi = $_POST['address'];
		$id = $_POST['id'];
		$query = "UPDATE taikhoan SET taikhoan='$taikhoan',matkhau='$matkhau',email='$email',sdt='$sdt',hoten='$hoten',diachi='$diachi' WHERE taikhoan_id=$id";
		$result = mysql_query($query);
	}
	//Them
	if (isset($_POST['submitInsert'])){
		$taikhoan = $_POST['account'];
		$matkhau = $_POST['password'];
		$email = $_POST['email'];
		$sdt = $_POST['phone'];
		$hoten = $_POST['name'];
		$diachi = $_POST['address'];
		$id = $_POST['id'];
		$query = "INSERT INTO taikhoan (taikhoan,matkhau,email,sdt,hoten,diachi) VALUES ('$taikhoan','$matkhau','$email','$sdt','$hoten','$diachi')";
		$result = mysql_query($query);
	}
?>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý tài khoản
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Quản lý tài khoản</li>
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
							<th>Tài khoản</th>
							<th>Mật khẩu</th>
							<th>Email</th>
							<th>Sdt</th>
							<th>Họ tên</th>
							<th>Địa chỉ</th>
							<th>Thành phố</th>
						</tr>
					</thead>
                  	<tbody>
                  	<?php
                  	$query = "SELECT taikhoan_id, taikhoan, matkhau, email, sdt, hoten, diachi FROM taikhoan ORDER BY taikhoan_id";
                  	$result = mysql_query($query);
                  	while ($row = mysql_fetch_array($result,MYSQL_NUM)){
						echo '<tr>';
						echo '<td><input type="checkbox" name="checkList[]" value="'.$row[0].'" class="listCheck"></td>
		                    <td class="listAccount">'.$row[1].'</td>
		                    <td class="listPassword">'.$row[2].'</td>
		                    <td class="listEmail">'.$row[3].'</td>
		                    <td class="listPhone">'.$row[4].'</td>
		                    <td class="listName">'.$row[5].'</td>
		                    <td class="listAddress">'.$row[6].'</td>
		                    <td></td>';
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
              <h3 class="box-title">Thông tin tài khoản</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <div class="box-body">
              	<input type="text" name="id" value="" hidden id="id">
                <div class="form-group">
                  <label for="account">Tài khoản</label>
                  <input type="text" class="form-control" name="account" id="account" placeholder="Nhập tài khoản">
                </div>
                <div class="form-group">
                  <label for="password">Mật khẩu</label>
                  <input type="text" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Nhập email" name="email">
                </div>
                <div class="form-group">
                  <label for="phone">Số điện thoại</label>
                  <input type="text" class="form-control" id="phone" placeholder="Nhập số điện thoại" name="phone">
                </div>
                <div class="form-group">
                  <label for="name">Họ tên</label>
                  <input type="text" class="form-control" id="name" placeholder="Nhập tên" name="name">
                </div>
                <div class="form-group">
                  <label for="address">Địa chỉ</label>
                  <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ" name="address">
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
			$('#account').val('');
			$('#password').val('');
			$('#email').val('');
			$('#phone').val('');
			$('#name').val('');
			$('#address').val('');
	    });
	    //Copy value
	    $('#update').click(function () {
	    	$('.listCheck').each(function(){
	    		if ($(this).is(':checked')){
	    			$('#id').val($(this).val());
	    			$('#account').val($(this).parent().siblings('.listAccount').text());
	    			$('#password').val($(this).parent().siblings('.listPassword').text());
	    			$('#email').val($(this).parent().siblings('.listEmail').text());
	    			$('#phone').val($(this).parent().siblings('.listPhone').text());
	    			$('#name').val($(this).parent().siblings('.listName').text());
	    			$('#address').val($(this).parent().siblings('.listAddress').text());
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