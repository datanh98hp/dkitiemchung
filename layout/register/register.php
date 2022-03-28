<?php
	session_start();
	include_once "../../config/config.php"; 
	$error = [];
    if(isset($_POST["username"])){
		$username=$_POST["username"];
	}
	if(isset($_POST["password"])){
		$password=$_POST["password"];
	}
    if(isset($_POST["name"])){
		$name=$_POST["name"];
	}
    if(isset($_POST["email"])){
		$email=$_POST["email"];
	}
    if(isset($_POST["cccd"])){
		$cccd=$_POST["cccd"];
	}
	if(isset($_POST["address"])){
		$address=$_POST["address"];
	}
    if(isset($_POST["phoneNumber"])){
		$phoneNumber=$_POST["phoneNumber"];
	}
	if($_SERVER['REQUEST_METHOD'] == "POST")
    {
		if(empty($error))
        {
			$sql = "INSERT INTO `nguoi_dung`(`ten_ngdung`, `matkhau_nd`, `ho_ten`, `email`, `cccd_nd`, `dia_chi_nd`) VALUES ('$username','$password','$name','$email','$cccd','$address')";
			
            // $sql = "INSERT INTO MyGuests (firstname, lastname, email)
            // VALUES ('John', 'Doe', 'john@example.com')";
            
                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert(' Đăng Ký Thành Công');location.href='/dkitiemchung'</script>";
                  } else {
                    echo "<script>alert(' Đăng Ký Thất bại');</script>";	
                  }
			
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
  <section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-3">
					<img src="../../images/logo.jpg" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Đăng ký</h1>
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="username">Tài khoản</label>
									<input id="username"  class="form-control" name="username" value="" required autofocus>
                                    <div class="invalid-feedback">
								    	Tài khoản cần được nhập 
							    	</div>
								</div>

								<div class="mb-3">
                                <label class="mb-2 text-muted" for="password">Mật khẩu</label>
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Mật khẩu cần được nhập
							    	</div>
								</div>
                                <div class="mb-3">
									<label class="mb-2 text-muted" for="name">Họ tên</label>
									<input id="name"  class="form-control" name="name" value="" required autofocus>
                                    <div class="invalid-feedback">
								    	Họ tên cần được nhập 
							    	</div>
								</div>
                                <div class="mb-3">
									<label class="mb-2 text-muted" for="cmnd"> Số CCCD/CMND</label>
									<input id="cccd"  class="form-control" name="cccd" value="" required autofocus>
                                    <div class="invalid-feedback">
                                    Số CCCD/CMND cần được nhập 
							    	</div>
								</div>
                                <div class="mb-3">
									<label class="mb-2 text-muted" for="email">Email</label>
									<input id="email"  class="form-control" name="email" value="" required autofocus>
                                    <div class="invalid-feedback">
								    	Email cần được nhập 
							    	</div>
								</div>
                                <div class="mb-3">
									<label class="mb-2 text-muted" for="address">Địa chỉ</label>
									<input id="address"  class="form-control" name="address" value="" required autofocus>
                                    <div class="invalid-feedback">
								    	Địa chỉ cần được nhập 
							    	</div>
								</div>
                                <div class="mb-3">
									<label class="mb-2 text-muted" for="phoneNumber">Số điện thoại</label>
									<input id="phoneNumber"  class="form-control" name="phoneNumber" value="" required autofocus>
                                    <div class="invalid-feedback">
								    	Địa chỉ cần được nhập 
							    	</div>
								</div>
                                
                            
								<div class="d-flex align-items-center">
					
									<button type="submit" class="btn btn-primary ms-auto">
										Đăng ký
									</button>
								</div>
							</form>
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</section>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="../../libs/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js""></script>
    <script src=" ../../libs/bootstrap-5.0.2-dist/js/main.js""></script>
  </body>
</html>