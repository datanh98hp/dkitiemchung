<?php
session_start();
  include_once "../../../config/config.php"; 
  $sql = "SELECT `ma_hen`, `gio_hen`, `ngay_hen`, `ma_psl` FROM `phieu_hen_tiem` WHERE 1";
  $result = $conn->query($sql);
  $phieuhen = array();
  if($result){
    while($row = mysqli_fetch_assoc($result)){
              $phieuhen[] = $row;
          }
      }
      $sql = "SELECT * FROM `phieu_sang_loc` WHERE 1";
      $result = $conn->query($sql);
      $sangloc = array();
      if($result){
        while($row = mysqli_fetch_assoc($result)){
                  $sangloc[] = $row;
              }
          }
          if ($_SERVER["REQUEST_METHOD"] == "POST") 
          {
              $maphieu = $_POST['maphieu'];
        $ngayhen = $_POST['ngayhen'];
        $giohen = $_POST['giohen'];
        $maphieusl = $_POST['ma_psl'];
              $sql = " INSERT INTO `phieu_hen_tiem`(`ma_hen`, `gio_hen`, `ngay_hen`, `ma_psl`) VALUES ('$maphieu','$giohen','$ngayhen','$maphieusl')";
  
        
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert(' Đăng Ký Thành Công');location.href='/dkitiemchung/admin/module/phieuhen/phieuhen.php'</script>";
              } else {
                echo "<script>alert(' Đăng Ký Thất bại');</script>";	
              }
          }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard </title>

    <!-- Bootstrap core CSS -->
    <link href="../../../libs/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="../../../libs/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../libs/font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">Trang quản trị</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
          <li ><a href="/dkitiemchung/admin/module/phieudangky/phieudangky.php"<i class="fa fa-bar-chart-o"></i> Phiếu đăng ký</a></li>
            <li ><a href="/dkitiemchung/admin/module/phieusangloc/phieusangloc.php" ><i class="fa fa-table"></i> Phiếu sàng lọc</a></li>
            <li><a href="/dkitiemchung/admin/module/phieuhen/phieuhen.php"><i class="fa fa-edit"></i> Phiếu hẹn</a></li>
            
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">

            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['admin_username'];?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
        
                <li class="divider"></li>
                <li><a  href="index.php?act=logout"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
      <!-- Body -->
 <div id="page-wrapper">
 <div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">
	           
	             Thêm mới
	        </h1>
	        <ol class="breadcrumb">
	            <li>
	                <i class="fa fa-dashboard"></i>  <a href="">Bảng điều khiển</a>
	            </li>
	            <li>
	                <i></i>  <a href="">Phiếu hẹn</a>
	            </li>
	            <li class="active">
	                <i class="fa fa-file"></i> Thêm mới
	            </li>
	        </ol>
	        <div class="clearfix"></div>
		        <?php if(isset($_SESSION['error'])) : ?>
		        	<div class="alert alert-danger">
		                 <?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
		            </div>
		        <?php endif ; ?>
	    </div>
	</div>
 <div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

				<div class="form-group col-sm-8">
			        <label for="exampleInputEmail1">Mã phiếu hẹn</label>
			        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Mã phiếu hẹn" name="maphieu">
			        <?php if(isset($error['tensp'])): ?>
			        	<p class="text-danger"> <?php echo $error['tensp'] ?> </p>	
			        <?php endif?>
			        
			    </div>
                <div class="form-group col-sm-8">
                                <label for="startDate">Ngày hẹn</label>
                    <input id="startDate" class="form-control" type="date" name="ngayhen" />
                    <span id="startDateSelected"></span>
			        
			    </div>
                <div class="form-group col-sm-8">
                <div class="cs-form">
                <label >Giờ hẹn</label>
                <input type="time" class="form-control" value="10:05 AM" name="giohen" />
                </div>
			        
			    </div>
                <div class="form-group col-sm-8">
			        <label for="exampleInputEmail1">Mã phiếu sàng lọc</label>
			        <select class="form-control col-md-8" name="ma_psl" id="">
			        	<?php foreach ($sangloc as $item): ?>
			        		<option value="<?php echo $item['ma_psl'] ?>"><?php echo $item['ma_psl'] ?></option>
			        	<?php endforeach ?>
			        </select>
			        <?php if(isset($error['maloai'])): ?>
			        	<p class="text-danger"> <?php echo $error['maloai'] ?> </p>	
			        <?php endif?>
			        
			    </div>
				


			        <div class="form-group col-sm-8">
			        	<button type="submit" class="btn btn-primary">Lưu</button>
			        </div>
			    
			</form>
    

    </div>


     <!-- /#page-wrapper -->

  </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="../../../libs/js/jquery-1.10.2.js"></script>
    <script src="../../../libs/js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="../../../libs/js/morris/chart-data-morris.js"></script>
    <script src="../../../libs/js/tablesorter/jquery.tablesorter.js"></script>
    <script src="../../../libs/js/tablesorter/tables.js"></script>

  </body>
</html>


