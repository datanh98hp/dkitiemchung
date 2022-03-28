<?php
session_start();
if(isset($_GET["actUser"]) && $_GET["actUser"] == "logout"){
  unset($_SESSION['ten']);
  unset($_SESSION['ten_ngdung']);
}
include_once "./config/config.php"; 
$sql = "SELECT vaccine.ten_vaccine, benh.ten_benh,vaccine.anh FROM vaccine INNER JOIN chi_dinh_vaccine ON vaccine.ma_vaccine = chi_dinh_vaccine.ma_vaccine INNER JOIN benh on benh.ma_benh = chi_dinh_vaccine.ma_benh LIMIT 8";
$result = $conn->query($sql);
$vaccine = array();
if($result){
  while($row = mysqli_fetch_assoc($result)){
            $vaccine[] = $row;
        }
    }
  $sql = "SELECT * FROM blog ";
  $result = $conn->query($sql);
$blog = array();
if($result){
  while($row = mysqli_fetch_assoc($result)){
            $blog[] = $row;
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
  <link rel="stylesheet" href="./libs/bootstrap-5.0.2-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <div class="wallpaper">
    <header>
      <div class="top-header">
        <a href="">
          <img src="./images/banner.jpg" alt="">
        </a>
      </div>
      <div class="main-header">
        <div class="container"><div class="row align-items-center">
        <div class="logo col-sm-auto"><img src="./images/logo.jpg" alt="" width="80" height="80">  </div>
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
        <a href="/dkitiemchung/layout/dkitiem/dkitiem.php" class="btn btn-primary" role="button" data-bs-toggle="button">
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
          <a class="nav-link active" aria-current="page" href="#">Tư vấn</a>
        </li>
  
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <?php
                    if(isset($_SESSION['ten'])){

                        ?>
      <ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class=" dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i style='font-size:30px' class='fas'>&#xf2bd;</i> <?php   echo $_SESSION['ten']; ?> </a>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
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
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./images/covid_vaccine_banner_desktop.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./images/COVID-19-Vaccine-Banner-848x290.png" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <div class="container mt-5">

        <div class="text-center d-flex flex-row justify-content-between">
          <div class="col-xs-6">
            <div class="card" style="width: 18rem;">
              <a href="?"><img src="./images/datlichtiem.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Đặt lịch tiêm</p>
                </div>
              </a>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="card" style="width: 18rem;">
              <a href="?"><img src="./images/tracuulichsutiem.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Tra cứu lịch sử tiêm</p>
                </div>
              </a>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="card" style="width: 18rem;">
              <a href="?"><img src="./images/banggia.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Bảng giá</p>
                </div>
              </a>
            </div>
          </div>
        </div>

        <div class="vacxin">
          <div class="container mt-4">
            <div class="row">
              <h2 class="home_dv_title position_re col-xs-12 ">
                <span>Danh mục vacxin</span>
                <a href="" class="position_ab view_all_dmvc hidden-xs"> View all </a>                
              </h2>
              <div class="card-group">
              <?php foreach($vaccine as $item){ ?>
                <div class="card card-category">
                  <a href="?">
                    <img src="<?php echo "./images/vacxin/".$item["anh"]; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text"><?php echo $item["ten_vaccine"]." phòng ".$item["ten_benh"]; ?></p>
                    </div>
                  </a>
                </div>
                <?php } ?>
              </div>

            </div>   
          </div> 
        </div>
          
      </div>
    </div>
  </div>
  <div class="blog">
  <div class="container mt-4">
            <div class="row">
              <h2 class="home_dv_title position_re col-xs-12 ">
                <span>Thông tin hữu ích</span>  
              </h2>
                         
            </div>
            
                <div class="row">
                <?php foreach($blog as $item){ ?>
                
                  <?php 
                  $newString = "";
                  $blogND = explode(" ",$item["noi_dung_blog"]);
                  for ($i = 0; $i < 40; $i++) { 
                    $newString .= $blogND[$i]. " ";
                  }?>
                  <div class="col-sm-3">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $item["tieu_de"]?></h5>
                        <p class="card-text"><?php echo $newString." ...";?></p>
                        <a href="#" class="btn btn-primary">Chi tiết</a>
                      </div>
                    </div>
                  </div>
                <?php } ?>
                <div class="view-more">
                  <a href=""> View all </a>   
                </div>
                
  </div>
  
</div>

  </div>
  </div>
  <!-- Footer -->
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
<!-- Footer -->
  </div>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="./libs/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js""></script>
    <script src=" ../js/main.js""></script>
    <script src="https://kit.fontawesome.com/ebbfd9ff5d.js" crossorigin="anonymous"></script>
</body>

</html>