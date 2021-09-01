<?php 
require_once('../../db/dbhelper.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Đơn Hàng</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link " href="../DanhMuc/index.php">Quản Lý Danh Mục</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="../SanPham/index_SP.php">Quản Lý Sản Phẩm</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="../donhang.php">Quản Lý Đơn Hàng</a>
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
          <h2 class="text-center">Quản Lý Đơn Hàng</h2>
        </div>
        <div class="panel-body">
        <table  style="border-color :white;width :100%" >
        <thead>
              <tr>
                <th width="50px"></th>
                <th></th>
                
                <th width="150px">
                  <a href="add.php">
                    <button class ="btn btn-warning" style ="margin-bottom:15px ;background-color:#00CC00;border-radius:10px">Thêm Danh Mục</button>
                  </a>
                </th>
                  
                </tr>
              </thead>
        </table>
        <table class =" table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="50px">STT</th>
                            <th width="150px">Tên Khách Hàng</th>
                            <th width="150px">Tên Sản Phẩm </th>
                            <th width="120px">Danh Mục</th>
                            <th width="120px">Giá</th>
                            <th width="150px">
                              Hình ảnh
                            </th>
                            <th width="100px">Số Lượng</th>
                            <th width="150px" >Tổng Tiền</th>
							
                            <th width="50px"></th> 
                          </tr>
                    </thead>
                    <tbody>
<?php
    // lấy danh sách từ danh mục database
    $limit = 10;
    $page = 1;
    if(isset($_GET['page'])){
      $page = $_GET['page'];
    }
    if($page<=0)
    {
      $page =1;
    }
    $_firtindex =($page -1)*$limit;
    $sql = 'select d.Ten,b.name_SP ,c.name_DanhMuc,b.image_SP,a.gia_SP,a.SoLuong,a.TrangThai ,a.id_HD
    from hoadon a,sanpham b,danhmuc c ,taikhoan d
    where a.TrangThai="Chờ Xác Nhận" AND b.id_SP = a.id_SP AND c.id_DanhMuc = a.id_DanhMuc AND a.id_KhachHang=d.id_KhachHang LIMIT '.$_firtindex.','.$limit;
    $DanhMucList = executeResult($sql);
    $sql ='select count(id_SP) as total from hoadon';
    $countResult = executeSingleResult($sql);
    $count =$countResult['total'];
    $number = ceil($count/$limit);
    foreach ($DanhMucList as $item){
      $gia =$item['gia_SP'];
      $soluong=$item['SoLuong'];
	  $id_HD =$item['id_HD'];
       $path='../../admin/sanpham/uploads/';
        $tongtien = $gia*$soluong;
      echo'
     <form action="" method="post">
          <tr>
               <td>'.($_firtindex++).'</td>
               <td>'.($item['Ten']).'</td>
               <td>'.($item['name_SP']).'</td>
               <td>'.($item['name_DanhMuc']).'</td>
               <td>'.($item['gia_SP']).' vnđ</td>
               <td ><img src="'.($path.$item['image_SP']).'" style="width:100px;height:80px;"></td>
               <td >'.($item['SoLuong']).'</td>
               <td>'.$tongtien.'</td>
               <td>
           			<input type="submit" class="btn btn-success" name="XacNhan" value="Xác Nhận"/>
					
               </td>
           </tr>
     </form>';
	 if(isset($_POST['XacNhan']))
		{
			$sql='update `hoadon` SET `TrangThai` = 'Xác Nhận' WHERE `hoadon`.`id_HD` = '.$id_HD.'';
		}
    }
    ?>
                      </tbody>
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
</ul>
              </div>
      </div>
    </div>
    <script type ="text/javascript">
      function deleteDanhMuc(id)
      {
        var option = confirm('Thông Báo \n'+'Bạn thực sự có muốn xóa tên danh mục này không ? ')
        if(!option){
          return;
        }
        console.log(id)
        $.post('ajax.php',{
          'id': id,
          'action': 'delete'
        },function(data){
            location.reload()
        })

      }
    </script>
</body>
</html>