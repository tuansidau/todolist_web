<html lang="en">
  <head>
  	<title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url('assets/login/css/style.css'); ?>">
  
	</head>
	<body class="img js-fullheight" style="background-image: url(<?php echo base_url('assets/login/images/bg.jpg'); ?>)">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center" >
				<div class="col-md-6 text-center mb-5" >
					<h2 class="heading-section">Đăng nhập</h2>
				</div>
			</div>
			<?php  
              	echo '<h2 class="text-center text-danger">'.$this->session->flashdata("error").'</h2>';  
			?>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<form action="<?= base_url() ?>index.php/Home/login"  method="post" class="signin-form">
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="email" placeholder="Email" required>
		      		</div>
	            <div class="form-group">
	              <input name="pass" id="passw" type="password" class="form-control" placeholder="Mật khẩu" required>
	              <span toggle="#passw" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3"  style="width:auto; margin-left: 32%;">Đăng nhập</button>
	            </div>
	          </form>
	          
				</div>
			</div>
		</div>
	</section>

  <script src="<?php echo base_url('assets/login/js/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/login/js/popper.js'); ?>"></script>
  <script src="<?php echo base_url('assets/login/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/login/js/main.js'); ?>"></script>

	</body>
</html>
