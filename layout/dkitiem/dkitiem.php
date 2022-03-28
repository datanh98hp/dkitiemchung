<?php
    session_start();
    include_once "../../config/config.php"; 
    $sql = "SELECT `ma_vaccine`, `ten_vaccine`, `anh`, `ngay_sx`, `han_sd`, `xuat_xu`, `don_gia`, `so_luong`, `ma_ncc` FROM `vaccine` WHERE 1";
    $result = $conn->query($sql);
    $vacxin = array();
    if($result){
      while($row = mysqli_fetch_assoc($result)){
                $vacxin[] = $row;
            }
    }
    $sql = "SELECT `ma_dt`, `loai_dt` FROM `doi_tuong` WHERE 1";
    $result = $conn->query($sql);
    $doituong = array();
    if($result){
      while($row = mysqli_fetch_assoc($result)){
                $doituong[] = $row;
            }
    }
    if(isset($_POST["hoten"])){
      $hoten = $_POST['hoten'];
    }
    if(isset($_POST["giamho"])){
      $giamho = $_POST['giamho'];
    }
    if(isset($_POST["moiqh"])){
      $moiqh = $_POST['moiqh'];
    }
    if(isset($_POST["gioitinh"])){
      $gioitinh = $_POST['gioitinh'];
    }
    if(isset($_POST["vacxin"])){
      $vacxinselect = $_POST['vacxin'];
    }
    if(isset($_POST['ngaydkitiem'])){
      $ngaydkitiem = $_POST['ngaydkitiem'];
    }
    if(isset($_POST['ngaysinh'])){
      $ngaysinh = $_POST['ngaysinh'];
    }
    if(isset($_POST['doituong'])){
      $doituongselect = $_POST['doituong'];
    }
    $ngdung = $_SESSION['ten_ngdung'];
    $ngaytao = date('Y-m-d');
    if($_SERVER['REQUEST_METHOD'] == "POST")
    { 
      $sql = "INSERT INTO `phieu_dang_ky`( `ho_ten_tiem`, `gioi_tinh`, `ngay_sinh`, `ngay_tao`, `ngay_dk_tiem`, `ho_ten_ngh`, `moi_qhe`, `trang_thai`, `ma_vaccine`,
      `ten_ngdung`, `ma_dt`) VALUES ('$hoten','$gioitinh','$ngaysinh','$ngaytao','$ngaydkitiem','$giamho','$moiqh',0,'$vacxinselect','$ngdung','$doituongselect')";

      
          if ($conn->query($sql) === TRUE) {
              echo "<script>alert(' Đăng Ký Thành Công');location.href='/dkitiemchung'</script>";
            } else {
              echo "<script>alert(' Đăng Ký Thất bại');</script>";	
            }
 
    }
   
?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="stylesheet" href="../../libs/bootstrap-5.0.2-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/style.css">

</head>

<body>
  <div class="wallpaper">
    <header>
      <div class="top-header">
        <a href="">
          <img src="../../images/banner.jpg" alt="">
        </a>
      </div>
      <div class="main-header">
        <div class="container"><div class="row align-items-center">
        <div class="logo col-sm-auto mt-4 mb-4"><img src="../../images/logo.jpg" alt="" width="80" height="80">  </div>
        <h3 class = "col-sm-auto ">Trung tâm y tế quận Lê Chân</h3>
        <div class="col-sm-auto ">
        <a href="tel:1900636227" class="btn btn-primary" role="button" data-bs-toggle="button">
						<span class="elementor-button-content-wrapper">
						<span class="elementor-button-icon elementor-align-icon-left">
				<i aria-hidden="true" class="fas fa-phone-alt"></i>			</span>
						<span class="elementor-button-text">1900636227</span>
		</span>
					</a>
        </div>
        <div class="col-sm-auto ">
        <a href="#" class="btn btn-primary" role="button" data-bs-toggle="button">
        <span class="elementor-button-icon elementor-align-icon-left">
				<i aria-hidden="true" class="far fa-calendar-alt"></i>			</span>
          Đặt lịch
        </a>
        </div>
        
        </div></div>
          
</div>
            
            
		</span>
					</a>
		</div>
				</div>
				</div>
      </div>
    
      <div class="menu-header">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Giới thiệu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Đăng kí tiêm</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Tư Vấn</a>
        </li>
  
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <!-- <div >
      <a href="http://localhost/dkitiemchung/layout/login/login.php" class="btn btn-outline-success" type="submit">Đăng nhập</a>
      <a class="btn btn-outline-success" type="submit">Đăng kí</a>
      </div> -->
      <?php
                    if(isset($_SESSION['ten'])){

                        ?>
      <ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class=" dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i style='font-size:30px' class='fas'>&#xf2bd;</i> <?php   echo $_SESSION['ten']; ?> </a>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
					 <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
					<li class="divider"></li>
					<li><a  href="/dkitiemchung/index.php?actUser=logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
				</ul>
			</li>
		</ul>
    <?php
                }else{
            
                 ?>
        <ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class=" dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i style='font-size:30px' class='fas'>&#xf2bd;</i> </a>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
					 <li><a class="dropdown-item" href="/dkitiemchung/layout/login/login.php">Đăng nhập</a></li>
    <li><a class="dropdown-item" href="/dkitiemchung/layout/register/register.php">Đăng kí tài khoản</a></li>

		</ul>
       <?php  } ?>

   
     
    </div>
  </div>
</nav>
      </div>
    </header>
<div class="content">
<div class="container">
<form method="post" class="form-dangki">
  <div class="form-group mb-2">
    <label for="exampleInputEmail1">Họ tên</label>
    <input  class="form-control" name = "hoten"  aria-describedby="emailHelp" >
  </div>
  <div class="form-group mb-2">
    <label for="exampleInputEmail1">Người giám hộ</label>
    <input  class="form-control" name = "giamho"  aria-describedby="emailHelp" >
  </div>
  <div class="form-group mb-2">
    <label for="exampleInputEmail1">Mối quan hệ</label>
    <input  class="form-control " name = "moiqh"  aria-describedby="emailHelp" >
  </div>
  <div class="form-group mb-2">
    <label for="startDate">Ngày sinh</label>
    <input id="startDate" class="form-control" type="date" name="ngaysinh" />
    <span id="startDateSelected"></span>
  </div>
    <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Vắc xin</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01" name="vacxin">
            <?php
                foreach($vacxin as $i){  ?>
                    <option value=<?php echo $i["ma_vaccine"] ?>><?php echo $i["ten_vaccine"] ?></option>
            <?php   } ?>
        
            
            </select>
     </div>
     <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Đối tượng</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01" name="doituong">
                <?php foreach($doituong as $i) { ?>
                    <option value=<?php echo $i["ma_dt"] ?> > <?php echo $i["loai_dt"] ?></option>
                <?php } ?>
        </select>
    </div>
    <div class="input-group mb-3 ">
      <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Giới tính</label>
      </div>
      <select class="custom-select" id="inputGroupSelect01" name="gioitinh">
          <option value="1">Nam</option>
          <option value="0">Nữ</option>
      </select>
      </div>
    
    <label for="startDate">Ngày đăng kí</label>
    <input id="startDate" class="form-control" type="date" name="ngaydkitiem" />
    <span id="startDateSelected"></span>
    <button type="submit" class="btn btn-primary mt-4 ">Đăng kí</button>
  
  
</form>

</div>
</div>
<footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section
    class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
  >
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Company name
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">Angular</a>
          </p>
          <p>
            <a href="#!" class="text-reset">React</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Vue</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Laravel</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Contact
          </h6>
          <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@example.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
  </div>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="../../libs/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js""></script>
    <script src=" ../../js/main.js""></script>
    <script src="https://kit.fontawesome.com/ebbfd9ff5d.js" crossorigin="anonymous"></script>
   
</body>

</html>