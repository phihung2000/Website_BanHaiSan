<?php 
require_once('../../db/dbhelper.php');
session_start();
if(empty($_SESSION['username']))
{
	$username='';
}
else if(!empty($_SESSION['username']))
{
	$username =$_SESSION['username'];
}
if(empty($_SESSION['id_KhachHang']))
{
	$id_KhachHang='';
}
else if(!empty($_SESSION['id_KhachHang']))
{
	$id_KhachHang =$_SESSION['id_KhachHang'];
}
$path='../../admin/sanpham/uploads/';
$id='';
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$_SESSION['id']=$id;
	$sql = 'select * from sanpham where id_SP ='.$id;
	$sanpham = executeSingleResult($sql);
	if($sanpham !=null)
	{
		$name = $sanpham['name_SP'];
		$gia = $sanpham['gia_SP'];
		$hinhanh = $sanpham['image_SP'];
		$mota = $sanpham['mota_SP'];
	}
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
	// LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
	$quantity = $_POST['quantity'];
	$_SESSION['soluong']=$quantity;
	if($username=='')
	{
		header('Location:../dangnhap/login.php?id='.$id.'');
	}
	else{
		header('Location:GioHang.php?id='.$id.'');
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/Chitiet.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<from action="ChitietSP.php" method="get">
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
	
						 		<a style="color: white" href="../dangnhap/login.php">Xin Chào - '.($item['Ten']).'</a>
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
					<a class="nav-link" href="LienHe.php">Liên hệ</a>
				</li>
			</ul>
			<form class="form-inline" action="/action_page.php">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Tìm kiếm">
					<div class="input-group-prepend">
						<span style="background-color: white;" class="input-group-text"><a style="color:black" href=""><i style="border: none" class="fas fa-search"></i></a></span>
					</div>
				</div>
			</form>
		</nav>
	</div> <!-- THANH MENU END -->
	
	<!-- MAIN MENU TRÁI -->
	<div class="container row main">
		<div class="container-fluid product">
		<section class="ten_op">
			<div class="div_tenop" style="margin-top:-6%;margin-bottom:-2%">
				<h3><br><?=$name?><br><br></h3>
			</div>
    	</section>	
    	<section class="setion_slide"><div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  			<div class="carousel-inner">
    			<div class="carousel-item active">
     				 <img  src="<?=$path.$hinhanh?>"style="height: auto; width: 100%;margin-left:-10%">
				</div>	
			</div>
</section>

    <section class="section_text">
		<form action="" method="post">
			<div class="div_tien"><strong>&nbsp;<?=$gia?> vnđ</strong></div>
			<div class="div_soluong"><span>Số lượng :</span>
				<input type="number" id="soluong" min="0" max="100" name="quantity" value="1">
				<input type="submit" class="muangay" name="submit" value="Mua ngay"/></div>
		</form>
        <div class="div_lydochoncuahang"><span class="span_why">Vì sao chọn chúng tôi?<br>
			</span><i class="fa fa-check-circle"></i>
			<span>Sản phẩm chính hãng 100%<br>
			</span><i class="fa fa-check-circle"></i>
			<span>Bảo hàng 30 ngày<br></span>
			<i class="fa fa-check-circle"></i>
			<span>Giao hàng tận nơi trên toàn quốc<br></span>
            <i class="fa fa-check-circle"></i>
			<span>Free ship cho tất cả các đơn hàng trên 200k trong TP.Thủ Dầu Một</span></div>
    </section>				
		</div>  <!-- SAN PHAM BAN CHAY END -->
	</div>	<!-- TIN  TUC -->
	<div class="container-fluid product">
			<!-- SẢN PHẨM BÁN CHẠY -->
			<div class="row title">
				<span>Mô Tả</span>
			</div>
			<div class="mota">
            	<?=$mota?>	
			</div>
		</div>  <!-- SAN PHAM BAN CHAY END -->

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
</from>
</body>
</html>