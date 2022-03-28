<?php

  include_once "../config/config.php"; 
  $sql = "SELECT
  phieu_dang_ky.ma_pdk,phieu_dang_ky.ho_ten_tiem,phieu_dang_ky.gioi_tinh,phieu_dang_ky.ngay_sinh,phieu_dang_ky.ngay_tao,phieu_dang_ky.ngay_dk_tiem,phieu_dang_ky.ho_ten_ngh, phieu_dang_ky.moi_qhe,phieu_dang_ky.trang_thai,phieu_dang_ky.ten_ngdung,vaccine.ten_vaccine,doi_tuong.loai_dt FROM `phieu_dang_ky` INNER JOIN vaccine on
  phieu_dang_ky.ma_vaccine = vaccine.ma_vaccine INNER JOIN doi_tuong ON doi_tuong.ma_dt = phieu_dang_ky.ma_dt
  ";
  $result = $conn->query($sql);
  $phieudki = array();
  if($result){
    while($row = mysqli_fetch_assoc($result)){
              $phieudki[] = $row;
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
    <link href="../libs/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="../libs/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../libs/font-awesome/css/font-awesome.min.css">
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
            <li class="active"><a ><i class="fa fa-bar-chart-o"></i> Phiếu đăng ký</a></li>
            <li ><a href="/dkitiemchung/admin/module/phieusangloc/phieusangloc.php" ><i class="fa fa-table"></i> Phiếu sàng lọc</a></li>
            <li><a href="/dkitiemchung/admin/module/phieuhen/phieuhen.php"><i class="fa fa-edit"></i> Phiếu hẹn</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['admin_username'];?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
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
              Phiếu đăng ký
            </h1>
            <ol class="breadcrumb">
              <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Bảng điều khiển</a>
              </li>
              <li class="active">
                <i class="fa fa-file"></i>  phiếu đăng ký
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
                          <th>Mã phiếu đăng ký</th>
                          <th>Họ tên người tiêm</th>
                          <th style="width: 151px;">Giới tính</th>
                          <th>Ngày sinh</th>
                          <th>Ngày tạo</th>
                          <th>Ngày đăng ký tiêm</th>
                          <th>Họ tên người giám hộ</th>
                          <th>Mối quan hệ </th>
                          <th>Vắc xin</th>
                          <th>Người dùng</th>
                          <th>Đối tượng</th> 
                          <th>Trạng thái</th>
                          <th>Hành động</th>
                          
                      </tr>
                  </thead>
                  <tbody>
                    <?php foreach($phieudki as $item) { ?>
                      <tr>
                            <td><?php echo $item["ma_pdk"] ?></td>
                            <td><?php echo $item["ho_ten_tiem"] ?></td>
                            <td><?php if($item["gioi_tinh"]) {echo "Nam";} else{echo "Nữ";} ?></td>
                            <td><?php echo $item["ngay_sinh"] ?></td>
                            <td><?php echo $item["ngay_tao"] ?></td>
                            <td><?php echo $item["ngay_dk_tiem"]; ?></td>
                            <td><?php echo $item["ho_ten_ngh"] ?></td>
                            <td><?php echo $item["moi_qhe"] ?></td>
                            <td><?php echo $item["ten_vaccine"] ?></td>
                            <td><?php echo $item["ten_ngdung"] ?></td>
                            <td><?php echo $item["loai_dt"] ?></td>
                            <td><?php if($item["trang_thai"] ==0){echo "Chưa duyệt"; } else{
                              echo "Đã duyệt";
                            } ?></td>
                          <td> <?php if($item["trang_thai"]==0){ ?>  <a href="status.php?id=<?php echo $item['ma_pdk'] ?>" class="btn btn-xs btn-info"> Duyệt đăng kí</a> <?php } ?> <a class="btn btn-xs btn-danger" href="delete.php??id=<?php echo $item['ma_pdk'] ?>"><i class="fa fa-times"></i> Xóa</a> </td>
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
    <script src="../libs/js/morris/chart-data-morris.js"></script>
    <script src="../libs/js/tablesorter/jquery.tablesorter.js"></script>
    <script src="../libs/js/tablesorter/tables.js"></script>

  </body>
</html>


