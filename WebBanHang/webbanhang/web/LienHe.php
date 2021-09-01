<?php 
require_once('../../db/dbhelper.php');
session_start();
$username='';
if(empty($_SESSION['username']))
{
	$username ='';
}
else if(($_SESSION['username']!=''))
{
	$username =$_SESSION['username'];
}
?>
<!DOCTYPE html>
<html>
<head>
		<title>liên hệ</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../css/lienhe.css">
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
					<a class="nav-link" href="#">Liên hệ</a>
				</li>
			</ul>
		</nav>
	</div> <!-- THANH MENU END -->
    <div class="container-fluid product">
        <section class="section-thongtinlienhe">
            <div class="thongtinlienhe">
                <h3>THÔNG TIN LIÊN HỆ</h3>
                <h6 class="text-left text-black-50">Nếu Bạn Ở TP.Thủ Dầu Một</h6><span class="thanhvien">-Shop Linh Kiện Phi hùng :06 Trần Văn Ơn, Phú Hoà ,TP Thủ Dầu Một,Bình Dương<br><br>- Nếu bạn có thắc về vấn đề sản phẩm hay muốn tư vấn về sản phẩm thì hãy gọi hottline : 0396476443<br><br>-Shop hỗ trợ giải đáp thắc mắc 24/7 mọi thắc mắc đều sẽ được giải đáp trong vòng 24h&nbsp;</span>
                <h6
                    class="text-black-50">Làm sao để trở thành thành viên của shop</h6><span class="thanhvien">-Bạn phải mua đồ và tích trữ điểm đủ điểm yêu cầu bạn sẽ được trở thành thành viên của Shop<br>-Tích điểm đổi&nbsp; quà<br>-Shop có rất nhiều khuyễn mãi giành cho các thành viên của shop&nbsp;<br>+Thẻ vip được giảm 40%<br>+Thẻ thành viên được giảm 20%<br></span>
            </div>
        </section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">liên hệ với chúng tôi</h2>
                    <h6 class="section-subheading text-muted" style="color: rgb(150,134,134);">Mọi thắc mắc sẽ được giải đáp trong 24h</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="contactForm" name="contactForm" novalidate="novalidate">
                        <div class="form-row">
                            <div class="col col-md-6">
                                <div class="form-group"><input class="form-control" type="text" id="name" placeholder="Tên của bạn" required=""><small class="form-text text-danger flex-grow-1 help-block lead"></small></div>
                                <div class="form-group"><input class="form-control" type="email" id="email" placeholder="Email của bạn" required=""><small class="form-text text-danger help-block lead"></small></div>
                                <div class="form-group"><input class="form-control" type="tel" id="sdt" placeholder="Số điện thoại" required=""><small class="form-text text-danger help-block lead"></small></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><textarea class="form-control" id="message" placeholder="Đóng góp ý kiến" required=""></textarea></div>
                            </div>
                            <div class="col">
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-lg-12 text-center"><button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">gửi&nbsp;</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
</body>
</html>