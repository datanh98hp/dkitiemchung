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
                <li><a  href="/dkitiemchung/admin/index.php?act=logout"><i class="fa fa-power-off"></i> Log Out</a></li>
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
              Phiếu hẹn
              <a href="add.php" class="btn btn-success">Thêm mới</a>
            </h1>
            <ol class="breadcrumb">
              <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Bảng điều khiển</a>
              </li>
              <li class="active">
                <i class="fa fa-file"></i>  phiếu hẹn
              </li>
            </ol>
          </div>
      </div>
    <div class="row">
          <div class="col-md-12">
                <div class="table-responsive">
              <table class="table table-bordered table-hover">
                  <thead>
                      <tr>
                          <th>Mã hẹn</th>
                          <th>Giờ hẹn</th>
                          <th style="width: 151px;">Ngày hẹn</th>
                          <th>Mã phiếu sàng lọc</th>
                          <th>Hành động</th>
                          
                      </tr>
                  </thead>
                  <tbody>
                    <?php foreach($phieuhen as $item) { ?>
                      <tr>
                            <td><?php echo $item["ma_hen"] ?></td>
                            <td><?php echo $item["gio_hen"] ?></td>
                            <td><?php echo $item["ngay_hen"] ?></td>
                            <td><?php echo $item["ma_psl"] ?></td>
                            <td><a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['ma_hen'] ?>"><i class="fa fa-times"></i> Xóa</a></td>
                        </tr> 
                        <?php }?> 
                  </tbody>
              </table>
            
              </ul>
            </nav>
              </div>
          </div>
          </div>
	  </div>

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


