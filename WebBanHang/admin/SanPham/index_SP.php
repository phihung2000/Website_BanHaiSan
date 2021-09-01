<?php 
require_once('../../db/dbhelper.php')


?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="sanpham.css">
	<title>Quản Lý Sản Phẩm</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<ul class="nav nav-tabs">
<li class="nav-item">
      <a class="nav-link " href="../index.php">Quản Lý Danh Mục</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="../SanPham/index_SP.php">Quản Lý Sản Phẩm</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../QuanLyDonHang/donhang.php">Quản Lý Đơn Hàng</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../../webbanhang/web/TrangChu.php">Về Trang Chủ</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="../../webbanhang/dangnhap/login.php">Thoát</a>
    </li>
</ul>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Quản Lý Sản Phẩm</h2>
			</div>
			<div class="panel-body">
  <form action="add_SP.php" method="post" enctype="multipart/form-data" >
      <table  style="border-color :white;width :100%">
      <thead>
            <tr>
              <th width="50px"></th>
              <th></th>
              
              <th width="150px">
                <!-- <a href="add_SP.php"> -->
                  <button class ="btn btn-warning" style ="margin-bottom:15px ;background-color:#00CC00;border-radius:10px">
                    Thêm Sản Phẩm
                  </button>
                <!-- </a> -->
              </th>
                
              </tr>
            </thead>
      </table>
    </form>  
                <table class =" table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="50px">STT</th>
                            <th width="150px">Tên Sản Phẩm </th>
                            <th width="120px">Danh Mục</th>
                            <th width="120px">Giá</th>
                            <th width="50px">
                              Hình ảnh
                            </th>
                            <th >Mô Tả</th>
                            <th width="50px"></th>
                            <th width="50px"></th> 
                        </tr>
                    </thead>
                    <tbody>
 <?php
 $page = 1;
 $limit = 5;
 if(isset($_GET['page'])){
  $page = $_GET['page'];
  }
 if($page<=0)
  {
    $page =1;
  }
 $_batdaucuatrangtieptheo = ($page-1)*$limit;
 $sql = 'select a.id_DanhMuc,a.name_DanhMuc,b.id_SP,b.name_SP,b.gia_SP,b.mota_SP,b.image_SP from danhmuc a,sanpham b where a.id_DanhMuc = b.id_DanhMuc LIMIT '.$_batdaucuatrangtieptheo.','.$limit;
 $SPList = executeResult($sql);
 $sql ='select count(id_SP) as total from sanpham';
 $countResult = executeSingleResult($sql);
 $count =$countResult['total'];
 $number = ceil($count/$limit);
 foreach ($SPList as $item){
   $img='uploads/';
   echo'<tr>
            <td>'.($_batdaucuatrangtieptheo++).'</td>
            <td>'.($item['name_SP']).'</td>
            <td>'.($item['name_DanhMuc']).'</td>
            <td>'.($item['gia_SP']).' vnđ</td>
            <td ><img src="'.($img.$item['image_SP']).'" style="width:90px;height:80px;"></td>
            <td style="width:500px;color:black; overflow: hidden;text-overflow: ellipsis;line-height: 29px;
            -webkit-line-clamp: 3;height: 105px;display: -webkit-box;-webkit-box-orient: vertical;" >'.($item['mota_SP']).'</td>
            <td>
              <a href="add_Sp.php?id='.$item['id_SP'].'"> 
              <button class ="btn btn-warning">Sửa</button> 
              </a>
            </td>
            <td>
              <button class ="btn btn-danger" onclick ="deleteSP('.$item['id_SP'].')">Xóa</button>
            </td>
        </tr>';
 }
 ?>
 </table>
 <?php
  if($number >1)
  {
 ?>
 <ul class="pagination">               
<?php 
    if($page > 1)
    {
      echo'<li class="page-item"><a class="page-link" href="?page='.($page-1).'">Previous</a></li>';
    }
                  for($i=0;$i<$number;$i++)
                  {
                    if($page == ($i+1))
                    {
                      echo'<li class="page-item active "><a class="page-link" href="?page='.($i+1).'">'.($i+1).'</a></li>';
                    }
                    else
                    {
                      echo'<li class="page-item"><a class="page-link" href="?page='.($i+1).'">'.($i+1).'</a></li>';
                    }
                  }
    if($page < $number)
    {
      echo'<li class="page-item"><a class="page-link" href="?page='.($page+1).'">Next</a></li>';
    }
                   
?>
<?php
  }
?>
 <script type ="text/javascript">
      function deleteSP(id)
      {
        var option = confirm('Thông báo \n bạn thực sự có muốn xóa sản phẩm này không ??')
        if(!option)
        {
          return;
        }
        console.log(id)
        $.post('ajaxSP.php',{
          'id' :id,
          'action': 'delete'
        },function(data){
          location.reload()
        })
      }
 </script>

</body>
</html>