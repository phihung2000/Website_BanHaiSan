<?php 
require_once('../../db/dbhelper.php');
session_start();
$username =$_SESSION['username'];
$id_KhachHang = $_SESSION['id_KhachHang'];
$path='../../admin/sanpham/uploads/';
$id=$thongbao=$id_HD='';
$soluong=$_SESSION['soluong'];
if(isset($_GET['soluong']))
{
	$soluong =$_GET['soluong'];
}
else if(!isset($_GET['soluong']))
{
	if(!empty($_GET['soluong']))
	{
		$soluong =$_SESSION['soluong'];
	}
	
}

if(isset($_GET['id']))
{
	$id =$_GET['id'];
}
else if(!isset($_GET['id']))
{
	if(empty($_GET['id']))
	{
		$id='';
	}
	else if(!empty($_GET['id']))
	{
		$id =$_SESSION['id'];
	}
}
if(!empty($id))
{
	$sql = 'select * from sanpham where id_SP ='.$id;
	$sanpham = executeSingleResult($sql);
	if($sanpham !=null)
	{
		$name = $sanpham['name_SP'];
		$gia = $sanpham['gia_SP'];
		$hinhanh = $sanpham['image_SP'];
		$mota = $sanpham['mota_SP'];
		$id_DanhMuc = $sanpham['id_DanhMuc'];
	}
}
if(isset($_POST['Mua']))
{
	
	$update_at = date('Y-m-d H:s:i');
	$sql = 'select count(id_SP) as total from hoadon where id_SP="'.$id.'"';
	$dieukien = executeSingleResult($sql);
	$count =$dieukien['total'];
	$sql1 = 'select * from hoadon where id_SP ="'.$id.'" and id_KhachHang="'.$id_KhachHang.'"';
	$list_idHD = executeSingleResult($sql1);
	if($count>0)
	{
		$id_HD = $list_idHD['id_HD'];
		$SumSoLuong = $soluong +$list_idHD['SoLuong'];
		$sql='update hoadon SET SoLuong ="'.$SumSoLuong.'" WHERE hoadon.id_HD ='.$id_HD.'';
	}
	else if($count==0)
	{
		$sql = 'insert into hoadon(id_SP,id_DanhMuc,id_KhachHang,gia_SP,SoLuong,update_at)
		values("'.$id.'","'.$id_DanhMuc.'","'.$id_KhachHang.'","'.$gia.'","'.$soluong.'","'.$update_at.'")'; 
	}
	// $sql = 'insert into hoadon(id_SP,id_DanhMuc,id_KhachHang,gia_SP,SoLuong,update_at)
	// 	values("'.$id.'","'.$id_DanhMuc.'","'.$id_KhachHang.'","'.$gia.'","'.$soluong.'","'.$update_at.'")'; 
    execute($sql);
    $thongbao='Thêm vào giỏ hàng thành công';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/Chitiet.css">
	<link rel="stylesheet" type="text/css" href="../css/giohang.css">
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
					<a class="nav-link" href="LieHe.php">Giới Thiệu</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Liên hệ</a>
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
	<div class="container row main" id="giohangcuaban">
		<div class="container-fluid product">
			<div class="foodhaven">
				<label class="giohangcuaban">GIỎ HÀNG CỦA BẠN </label>
				<img src="../imageSP/foodhaven.png">
			</div>
			
        <table class =" table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="50px">STT</th>
                            <th width="150px">Tên Sản Phẩm </th>
                            <th width="120px">Danh Mục</th>
                            <th width="120px">Giá</th>
                            <th width="150px">
                              Hình ảnh
                            </th>
                            <th width="100px">Số Lượng</th>
                            <th width="150px" >Tổng Tiền</th>
							
                            <th width="50px">
								
							</th> 
						
                        </tr>
                    </thead>
                    <tbody>
 <?php
 $sql = 'select a.id_DanhMuc,a.name_DanhMuc,b.id_SP,b.name_SP,b.gia_SP,b.mota_SP,b.image_SP from danhmuc a,sanpham b where b.id_SP="'.$id.'" and a.id_DanhMuc = b.id_DanhMuc';
 $SPList = executeResult($sql);
 $index=1;
 foreach ($SPList as $item){
    $path='../../admin/sanpham/uploads/';
	$tongtien = $gia*$soluong;
   echo'
	<form action="" method="post">
   		<tr>
            <td>'.($index++).'</td>
            <td>'.($item['name_SP']).'</td>
            <td>'.($item['name_DanhMuc']).'</td>
            <td>'.($item['gia_SP']).' vnđ</td>
            <td ><img src="'.($path.$item['image_SP']).'" style="width:100px;height:80px;"></td>
            <td >'.$soluong.'</td>
            <td>'.$tongtien.'</td>
            <td>
				<input type="submit" class="btn btn-success" name="Mua" value="Mua"/>
            </td>
        </tr>
	</form>';
 }
 ?>
 </table>
 <label class="ThongBao">
<?php
	if($thongbao=='')
	{
		echo'';
	}
	else 
	{
		echo $thongbao;
	}
?>
 </label>
		</div>
	</div> 
<!-- bảng hiện các sản phẩm đã mua -->
	<div class="container row main" id="giohangcuaban"> 
		<div class="container-fluid product">
			<div class="foodhaven">
				<label class="giohangcuaban">SẢN PHẨM ĐÃ MUA </label>
				<img src="../imageSP/foodhaven.png">
			</div>
			
        <table class =" table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="50px">STT</th>
                            <th width="150px">Tên Sản Phẩm </th>
                            <th width="120px">Danh Mục</th>
                            <th width="120px">Giá</th>
                            <th width="150px">
                              Hình ảnh
                            </th>
                            <th width="100px">Số Lượng</th>
                            <th width="150px" >Tổng Tiền</th>
                            <th width="50px"></th>
                            <th width="150px"></th> 
                        </tr>
                    </thead>
                    <tbody>
 <?php
 $sql = 'select a.name_DanhMuc,b.name_SP,c.id_SP,b.gia_SP,b.image_SP,c.SoLuong,c.id_HD,c.TrangThai from `danhmuc` a,`sanpham` b,`hoadon` c,`taikhoan`d 
 where d.id_KhachHang ='.$id_KhachHang.' and c.id_KhachHang=d.id_KhachHang and c.id_DanhMuc =a.id_DanhMuc and c.id_Sp = b.id_SP';
 $SPList = executeResult($sql);
 $index =1;
 $tongtien=0;
 $TongChiPhi=0;
 foreach ($SPList as $item){
    $path='../../admin/sanpham/uploads/';
	$tongtien = $item['gia_SP']*$item['SoLuong'];
	$TongChiPhi = $TongChiPhi + $tongtien;
   echo'<tr>
            <td>'.($index++).'</td>
            <td>'.($item['name_SP']).'</td>
            <td>'.($item['name_DanhMuc']).'</td>
            <td>'.($item['gia_SP']).' vnđ</td>
            <td ><img src="'.($path.$item['image_SP']).'" style="width:100px;height:80px;"></td>
            <td >'.($item['SoLuong']).'</td>
            <td>'.$tongtien.'</td>
            <td>
				<button class ="btn btn-danger" onclick ="deleteHD('.$item['id_HD'].')">Xóa</button>
            </td>
            <td>
                <button type="button" class="btn btn-success">Thanh Toán</button>
            </td>
        </tr>';
 }
 ?>
  <script type ="text/javascript">
      function deleteHD(id_HD)
      {
        var option = confirm('Thông báo \n bạn thực sự có muốn xóa sản phẩm này không ??')
        if(!option)
        {
          return;
        }
        console.log(id_HD)
        $.post('usecase_GioHang.php',{
          'id_HD' :id_HD,
          'action': 'delete'
        },function(data){
          location.reload()
        })
      }
 </script>
 
 </table>
 <label class="TongTien">Tổng số tiền :<?=$TongChiPhi?> <label>
		</div>
	</div>
	 <!-- SAN PHAM BAN CHAY END -->

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