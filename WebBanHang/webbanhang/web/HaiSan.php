<?php 
require_once('../../db/dbhelper.php');
session_start();
$username=$id_KhachHang ='';
if(empty($_SESSION['username']))
{
	$username ='';
}
else{
	$username =$_SESSION['username'];
}
if(empty($_SESSION['id_KhachHang']))
{
	$username ='';
}
else{
	$username =$_SESSION['id_KhachHang'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/TrangChu.css">
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
			<li style="margin-left: 48%">
				<i class="fas fa-user"></i>
				<?php
					if(!empty($username))
					{
						
						 $sql = 'select * from taikhoan where username="'.$username.'"';
						 $query = executeResult($sql);
						 foreach($query as $item)
						 {
						 	echo'
	
						 		<a style="color: white" href="../dangnhap/Trangcanhan.php">Xin Chào - '.($item['Ten']).'</a>
								 <a style="color: white" href="../dangnhap/login.php">Thoát </a>
						 	';
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
			<div><a ><i class="fa fa-shopping-bag"></i> Giỏ hàng</a></div>
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
			<form class="form-inline"  method="post" enctype="multipart/form-data">
				<div class="input-group" id="search" >
					<input type="text" class="form-control" name="timkiem" placeholder="Tìm kiếm">
					<div class="input-group-prepend"style="height:38px">
						<span style="background-color: white;" class="input-group-text">
							<a style="color:black" href="">
							<input type="submit" name ="search" style="border: none ;height:100%"  value="Tìm Kiếm"></a>
						</span>
					</div>
				</div>
			</form>
		</nav>
	</div> <!-- THANH MENU END -->

	<!-- MAIN MENU TRÁI -->
	<div class="container row main">
		<div class="col-lg-3 left-menu">
			<!-- 
			<div class="row">
				<div class="col">Món Ăn </div>
				<div class="col"></div>
				<div class="col">.col</div>
			</div> -->
		</div>

		<div class="container-fluid product">
			<!-- SẢN PHẨM BÁN CHẠY -->
			<div class="row title">
				<!-- <span>SẢN PHẨM BÁN CHẠY</span>
				<span><a href="">Xem tất cả</a></span> -->
			</div>
            <?php
				if(isset($_POST['search']))
				{
					$tukhoa =$_POST['timkiem'];
					$sql = 'select * FROM sanpham WHERE name_SP LIKE"'.$tukhoa.'%" and id_DanhMuc="1"';
				}
				else
				{
					$sql = 'select * from sanpham where id_DanhMuc="1"';
				}
                $path='../../admin/sanpham/uploads/';
                $query = executeResult($sql);
                foreach($query as $item)
                {
                    echo'
                    <div class="col-lg-3">
                        <div class="card">
                            <img class="card-img-top" src="'.($path.$item['image_SP']).'" style="width:100%;height:200px">
                            <div class="card-body">
                                <a href="#">'.($item['name_SP']).'</a>
                                <p><span>'.($item['gia_SP']).'</span> <span><del>100.000đ</del></span></p>
                            </div>
                        </div>
                        <div class="sale">-40%</div>
                        <div class="buy_hover">
                            <a href="ChitietSP.php?id='.$item['id_SP'].'"><i title="Xem" class="far fa-eye"></i></a>
                            <a href="GioHang.php?id='.$item['id_SP'].'& soluong=1"><i title="Mua" class="fas fa-shopping-bag"></i></a>
                        </div>
                    </div>';
                }
            ?>	
		</div>  <!-- SAN PHAM BAN CHAY END -->

		<!-- TIN  TUC -->
		<div class="container new">
			<a href="">TIN TỨC</a>
		</div>

		<div class="container ">
			<div class="row food_new">
			<div class="col-lg-4">
				<div class="card">
					<img class="card-img-top" src="https://res.cloudinary.com/gokisoft-com/image/upload/v1565082912/27_srepab.jpg" alt="Card image">
					<div class="card-body">
						<a href="" style="color: black; font-weight: bold;">Mì Ý</a>
						<p class="card-text">Nước Ý không chỉ nổi tiếng với những công trình kiến trúc cổ xưa hùng vĩ...</p>
						<a href="#" class="btn">Xem thêm</a>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="card">
					<img class="card-img-top" src="https://res.cloudinary.com/gokisoft-com/image/upload/v1565082275/20_jznnot.webp" alt="Card image">
					<div class="card-body">
						<a href="" style="color: black; font-weight: bold;">ỐC Hương Muối Ớt Thơm Lừng</a>
						<p class="card-text">Được gọi là ốc hương bởi loài ốc này tạo ra mùi hương vô cùng hấp dẫn...</p>
						<a href="#" class="btn">Xem thêm</a>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="card">
					<img class="card-img-top" src="https://res.cloudinary.com/gokisoft-com/image/upload/v1565082220/19_ieipex.jpg" alt="Card image">
					<div class="card-body">
						<a href="" style="color: black; font-weight: bold;">Đậu xanh tăng giá mạnh, người dân Hà thành lao đao</a>
						<p class="card-text">Khoảng một tuần nay do ảnh hưởng của thời tiết mưa lũ kéo dài...</p>
						<a href="#" class="btn">Xem thêm</a>
					</div>
				</div>
			</div>
			</div>
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
</body>
</html>