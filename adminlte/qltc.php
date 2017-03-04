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
	        	$query = "DELETE FROM trieuchung WHERE trieuchung_id=$value LIMIT 1";
	        	$result = mysql_query($query);
	       	}
		}
	}
	//Sua
	if (isset($_POST['submitUpdate'])){
		$trieuchung = $_POST['trieuchung'];
		$mota = $_POST['mota'];
		$id = $_POST['id'];
		$query = "UPDATE trieuchung SET trieuchung='$trieuchung',mota='$mota' WHERE trieuchung_id=$id";
		$result = mysql_query($query);
	}
	//Them
	if (isset($_POST['submitInsert'])){
		$trieuchung = $_POST['trieuchung'];
		$mota = $_POST['mota'];
		$benhvien_id = $_POST['benhvien_id'];
		$id = $_POST['id'];
		$query = "INSERT INTO trieuchung (trieuchung,mota) VALUES ('$trieuchung','$mota')";
		$result = mysql_query($query);
	}
?>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý triệu chứng
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Quản lý triệu chứng</li>
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
							<th>Tên triệu chứng</th>
							<th>Mô tả</th>
						</tr>
					</thead>
                  	<tbody>
                  	<?php
                  	$query = "SELECT trieuchung_id, trieuchung, mota FROM trieuchung ORDER BY trieuchung_id";
                  	$result = mysql_query($query);
                  	while ($row = mysql_fetch_array($result,MYSQL_NUM)){
						echo '<tr>';
						echo '<td><input type="checkbox" name="checkList[]" value="'.$row[0].'" class="listCheck"></td>
		                    <td class="listTrieuchung">'.$row[1].'</td>
		                    <td class="listMota">'.$row[2].'</td>';
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
              <h3 class="box-title">Thông tin triệu chứng</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <div class="box-body">
              	<input type="text" name="id" value="" hidden id="id">
                <div class="form-group">
                  <label for="trieuchung">Tên triệu</label>
                  <input type="text" class="form-control" name="trieuchung" id="trieuchung" placeholder="Nhập tên triệu chứng">
                </div>
                <div class="form-group">
                  <label for="mota">Mô tả</label>
                  <input type="text" class="form-control" name="mota" id="mota" placeholder="Nhập mô tả">
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
			$('#trieuchung').val('');
			$('#mota').val('');
	    });
	    //Copy value
	    $('#update').click(function () {
	    	$('.listCheck').each(function(){
	    		if ($(this).is(':checked')){
	    			$('#id').val($(this).val());
	    			$('#trieuchung').val($(this).parent().siblings('.listTrieuchung').text());
	    			$('#mota').val($(this).parent().siblings('.listMota').text());
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