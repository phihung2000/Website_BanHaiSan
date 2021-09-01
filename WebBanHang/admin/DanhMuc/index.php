<?php 
  require_once('../../db/dbhelper.php')
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Danh Mục</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" href="../index.php">Quản Lý Danh Mục</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="../SanPham/index_SP.php">Quản Lý Sản Phẩm</a>
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
          <h2 class="text-center">Quản Lý Danh Mục</h2>
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
                  <table class =" table table-bordered table-hover" action="index.php" method="get" enctype="multipart/form-data" >
                      <thead>
                          <tr>
                              <th width="50px">STT</th>
                              <th>Tên Danh Mục</th>
                              <th width="50px"></th>
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
    $sql ='select * from danhmuc where 1 LIMIT '.$_firtindex.','.$limit;
    $DanhMucList = executeResult($sql);
    $sql ='select count(id_DanhMuc) as total from danhmuc';
    $countResult = executeSingleResult($sql);
    $count =$countResult['total'];
    $number = ceil($count/$limit);
    foreach ($DanhMucList as $item){
        echo' <tr>
                    <td>'.($_firtindex++).'</td>
                    <td>'.($item['name_DanhMuc']).'</td>
                    <td>
                      <a href="add.php?id='.$item['id_DanhMuc'].'"> 
                          <button class ="btn btn-warning">Sửa</button>
                        </a>
                    </td>
                    <td>
                        <button class ="btn btn-danger" onclick="deleteDanhMuc('.$item['id_DanhMuc'].')">Xóa</button>
                    </td>
                </tr>';
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