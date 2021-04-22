<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url('assets/header/css/style.css'); ?>" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!-- start menu -->     

<link href="<?php echo base_url('assets/header/css/megamenu.css'); ?>" rel="stylesheet" type="text/css" media="all" />
<!-- end menu -->
<!-- top scrolling -->
</head>
<body>
  <div class="header-top">
	 <div class="wrap"> 
		<div class="logo">
			<a href="index.html"><img src="<?php echo base_url('assets/header/images/logo.png'); ?>" alt=""/></a>
	    </div>
	    <div class="cssmenu">
		   <ul>
		   	<?php if($this->session->userdata('username') == 'admin@gmail.com')
		   		echo '<li><a href="'.base_url("index.php/qlnhanvien/index").'">Quản lý nhân viên</a></li> ';
		   	?>
			 <li><a href="<?=base_url("index.php/JobController/index");?>">Quản lý công việc</a></li> 
			 <li><a href="<?php echo base_url('index.php/Home/logout'); ?>">Đăng xuất</a></li> 
		   </ul>
		</div>
		<div class="clear"></div>
 	</div>
   </div>  
</body>
</html>