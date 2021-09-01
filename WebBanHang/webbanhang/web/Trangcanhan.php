<?php 
require_once('../../db/dbhelper.php');
session_start();
$username =$_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>ỐC- Hải Sản Tươi Sống</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet"> 
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/TrangChu.css">
	<link rel="stylesheet" type="text/css" href="../css/ThongTinCaNhan.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="topbar header">
		<ul >
			<li>
				<i class="fas fa-mobile-alt"></i>
				Điện thoại: 039 647 6443
			</li>
			<li style="margin-left: 3%">
				<i class="far fa-envelope"></i>
				<a style="color: white;text-decoration: none;" href="mailto:nph.3082000@gmail.com">Email: nph.3082000@gmail.com</a>
			</li>
			<li style="margin-left: 40%">
				<i class="fas fa-user"></i>
				<?php
					if(!empty($username))
					{
						
						 $sql = 'select * from taikhoan where username="'.$username.'"';
						 $query = executeResult($sql);
						 foreach($query as $item)
						 {
							 if($item['username']=='admin')
							 {
								echo'
	
								<a style="color: white" href="../dangnhap/login.php">Xin Chào - '.($item['Ten']).'</a>
								<a style="color: white" href="../../admin/">| Quản Lý |</a>
								<a style="color: white" href="../dangnhap/login.php"> Thoát </a>
								';
							 }
							 else{
								echo'
	
								<a style="color: white" href="../dangnhap/login.php">Xin Chào - '.($item['Ten']).'</a>
								<a style="color: white" href="../dangnhap/login.php">Thoát </a>
								';
							 }	 
					    }
					}
					else
					{
						echo'
	
								<a style="color: white" href="../dangnhap/login.php">Đăng Nhập</a>
							';
					}
				
				?>
			</li>
		</ul>
	</div>

	<div class=" row header_2">
		<div class="col-lg-3 ">
            <img style="width: 75%" src="../imageSP/logo.png">
		</div>

		<div class="col-lg-8 ">
			<div class="col-lg-4 ">
				<div style="width: 40%;">
					<img style="width: 100%;margin-right: -9%"  src="../imageSP/shipper.png">
				</div>
				<div style="width: 60% ;margin-top: 10%">
					<a style="color: black" href="">Miễn phí vận chuyển</a> 
					<label>Bán kính 100km</label>
				</div>
			</div>

			<div class="col-lg-4 ">
				<div style="width: 40%;">
					<img style="width: 100%;margin-right: -9%"  src="../imageSP/email.png">
				</div>
				<div style="width: 60% ;margin-top: 10%">
					<a style="color: black" href="">Hỗ trợ 24/7</a> 
					<label>Hotline: 093 - 39 08 568</label>
				</div>
			</div>

			<div class="col-lg-4 ">
				<div style="width: 40%; margin-right: -9%">
					<img style="width: 100%; "  src="../imageSP/dongho.png">
				</div>
				<div style="width: 60%  ;margin-top: 10%">
					<a style="color: black;" href="">Giờ làm việc</a> 
					<label>T2 - T7 Giờ hành chính</label>
				</div>
			</div>

		</div>
		<div class="col-lg-1  " style="margin-top: 5%">
			<div><a href="GioHang.php"><i class="fa fa-shopping-bag"></i> Giỏ hàng</a></div>
		</div>
	</div>

	<!-- THANH MENU -->
	<div class="menu"> <!-- THANH MENU START -->
		<nav class="navbar navbar-expand-sm">
			<ul class="navbar-nav">
            <li class="nav-item">
					<a class="nav-link" href="TrangChu.php">Trang Chủ</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="HaiSan.php">Hải Sản</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="Oc.php">Các Loại Ốc</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Các Loại Nước</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Giới Thiệu</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="LienHe.php">Liên hệ</a>
				</li>
			</ul>
			
		</nav>
	</div> <!-- THANH MENU END -->

	<!-- MAIN MENU TRÁI -->
	<div class="container row main">
		</div> <!-- MENU TRÁI END -->

		<div class="container-fluid product">
			<!-- SẢN PHẨM BÁN CHẠY -->
			<div class="row title">
			<div class="container"> 
				<div class="container"> 
				<div class="row profile">        
				<div class="col-md-3">          
					<div class="profile-sidebar">                          
					<div class="profile-userpic">                 
						<img src="https://hocwebgiare.com/thiet_ke_web_chuan_demo/bootstrap_user_profile/images/profile_user.jpg" class="img-responsive" alt="Thông tin cá nhân">               
					</div>                                            
					<div class="profile-usertitle">                   
					<div class="profile-usertitle-name">  
					<?php
							$index =1;
							$sql = 'select * from taikhoan where username="'.$username.'"';
							$listthongtin = executeResult($sql);
							foreach( $listthongtin as $item)
							{
								echo
									($item['Ten']);
							}
						?>                            
					</div>                                
					</div>                                                
					<div class="profile-userbuttons">                 
						<button type="button" class="btn btn-success btn-sm">Trang chủ</button>                  
						<button type="button" class="btn btn-danger btn-sm">Thoát ra</button>                
					</div>                                            
					<div class="profile-usermenu">                    
					<ul class="nav">
						<div class="logo_menuchinh" style="float:left; padding-top:5px; padding-left:10px; color:#fff; margin-left:auto; margin-right:auto; text-align=center; line-height:40px; font-size:16px;font-weight:bold;font-family:Arial">
						</div>
						<div class="menu-icon">
						</div>                      
					<li class="active">                         
						<a href="">                         
						<i class="glyphicon glyphicon-info-sign"></i>
						                           Cập nhật thông tin cá nhân </a>                     
					</li>                       
					<li>                            
						<a href="">                         
						<i class="glyphicon glyphicon-heart"></i>                           
						Sản phẩm yêu thích </a>                     
					</li>                       
					<li>                            
						<a href="GioHang.php" target="_blank">                         
						<i class="glyphicon glyphicon-shopping-cart"></i>                           
						Quản lý đơn hàng </a>                       
					</li>                       
					<li>                            
						<a href="">                         
						<i class="glyphicon glyphicon-envelope"></i>                            
						Tin nhắn </a>                       
					</li>                   
					</ul>                
					</div>                            
					</div>     
				</div>      
				<div class="col-md-9"> 
					<div class="profile-content"> 
						<h2 style="text-align:center">THÔNG TIN CÁ NHÂN </h2>
						<?php
							$index =1;
							$sql = 'select * from taikhoan where username="'.$username.'"';
							$listthongtin = executeResult($sql);
							foreach( $listthongtin as $item)
							{
								echo'
									<label> Họ Và tên : '.($item['Ten']).'</label></br>
									<label> Ngày sinh : '.($item['NgaySinh']).'</label></br>
									<label> Địa Chỉ :   '.($item['DiaChi']).'</label></br>
									<label> Email :     '.($item['Email']).'</label>
								';
							}
						?>            
					</div>     
				</div>  
				</div>
				</div> 
				</div>
			</div>
           	
		</div>  <!-- SAN PHAM BAN CHAY END -->

		<!-- TIN  TUC -->
		<div class="container new">
		</div>
		<div class="container ">

		</div>
	</div> <!-- MAIN -->



	<!-- FOOTER -->
	<div class="container-fluid footer">
		<div class="col-lg-5">
			<ul class="list-group list-group-flush">
				<li class="list-group-item">LIÊN HỆ</li>
				<li class="list-group-item"><i class="fas fa-map-marker-alt"></i><a href="">Số 6 , Trần văn Ơn , Phú Hòa , TP.Thủ Dầu Một</a></li>
				<li class="list-group-item"><i class="block_icon fa fa-phone"></i><a href="">039 647 6443</a></li>
				<li class="list-group-item"><i class="block_icon fa fa-envelope"></i><a href="">nph.3082000@gmail.com</a></li>
			</ul>
			
		</div>

		<div class="col-lg-3">
			<ul class="list-group list-group-flush">
				<li class="list-group-item">TIN TỨC MỚI NHẤT</li>
				<li class="list-group-item"><a href="">Mỳ Xào Hải Sản</a></li>
				<li class="list-group-item"><a href="">Ốc rang muối ớt </a></li>
				<li class="list-group-item"><a href="">Nước nha đam nhà làm. Chất lượng và rẻ </a></li>
			</ul>
		</div>

		<div class="col-lg-4">
			<ul class="list-group list-group-flush">
				<li class="list-group-item">SẢN PHẨM BÁN CHẠY NHẤT</li>
				<li class="list-group-item"><a href="">Bạch Tuộc</a></li>
				<li class="list-group-item"><a href="">Ốc Hương</a></li>
				<li class="list-group-item"><a href="">Ốc Bươu</a></li>
				<li class="list-group-item"><a href="">Ốc Mỡ</a></li>
				<li class="list-group-item"><a href="">Ốc len</a></li>
			</ul>
		</div>
	</div> <!-- FOOTER END -->
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>