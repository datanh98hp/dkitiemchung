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
	if($_SERVER['REQUEST_METHOD'] == "POST")
    {
		if($username == '')
        {
            $error['username'] = 'Username không được để trống '; 
        }
        if($password == '')
        {
            $error['password'] = 'Password không được để trống '; 
        }
		if(empty($error))
        {
			$sql = "SELECT * FROM nguoi_dung WHERE ten_ngdung='$username' and matkhau_nd ='$password'";
			$result = $conn->query($sql);
			if ($result->num_rows == 1) {
				// output data of each row
				$row = $result->fetch_assoc() ;
				$_SESSION['ten_ngdung'] = $row['ten_ngdung'];
				$_SESSION['ten'] = $row['ho_ten'];
				echo "<script>alert(' Đăng Nhập Thành Công');location.href='/dkitiemchung'</script>";
				exit();			
			  }
			  else{
				echo "<script>alert(' Đăng Nhập Thất bại');</script>";	
					
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
					<div class="text-center my-5">
					<img src="../../images/logo.jpg" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Đăng nhập</h1>
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="username">Tài khoản</label>
									<input id="username"  class="form-control" name="username" value="" required autofocus>
                                    <div class="invalid-feedback">
								    	Tài khoản cần được nhập 
							    	</div>
								</div>

								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Mật khẩu</label>
										<a href="forgot.html" class="float-end">
											Quên mật khẩu
										</a>
									</div>
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Mật khẩu cần được nhập
							    	</div>
								</div>

								<div class="d-flex align-items-center">
									<div class="form-check">
										<input type="checkbox" name="remember" id="remember" class="form-check-input">
										<label for="remember" class="form-check-label">Nhớ tôi</label>
									</div>
									<button type="submit" class="btn btn-primary ms-auto">
										Login
									</button>
								</div>
							</form>
						</div>
						
					</div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy; 2017-2021 &mdash; Your Company 
					</div>
				</div>
			</div>
		</div>
	</section>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="../../libs/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js""></script>
    <script src=" ../../js/main.js""></script>
  </body>
</html>