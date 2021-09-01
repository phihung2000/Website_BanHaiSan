<?php 
require_once('../../db/dbhelper.php');

$id = $name ='';
if(isset($_POST["luu"]))
  {
    
      if(isset($_POST['name'])){
          $name= $_POST['name'];   
      }
      if(isset($_POST['id'])){
        $id= $_POST['id'];   
    }
      if(!empty($name)){
        $creat_at = $update_at = date('Y-m-d H:s:i');

        if($id=='')
        {
          $sql = 'insert into danhmuc(name_DanhMuc,Created_at,update_at)
                  values("'.$name.'","'.$creat_at.'","'.$update_at.'")';     
        }
        else
        {
          $sql ='update danhmuc set name_DanhMuc ="'.$name.'", update_at ="'.$update_at.'" where danhmuc.id_DanhMuc ='.$id;
         
        }
        // lưu vào database
        execute($sql);
        header('Location: index.php');
        die();
      }
      
  }
if(isset($_GET['id']))
{
  $id = $_GET['id'];
  $sql = 'select * from danhmuc where id_DanhMuc = '.$id;
  $danhmuc = executeSingleResult($sql);
  if($danhmuc != null)
  {
    $name = $danhmuc['name_DanhMuc'];
  }
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Thêm Sửa Danh Mục Sản Phẩm</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body><ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="index.php">Quản Lý Danh Mục</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../SanPham/index_SP.php">Quản Lý Sản Phẩm</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>
</ul>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm / Sửa Danh Mục Sản Phẩm</h2>
			</div>
			<div class="panel-body">
          <form method ="POST" >
                <div class ="from-group">
                    <label for="name">Tên Danh Mục : </label>
                    <input type="text" name ="id" value ="<?=$id?>" hidden="true">
                    <input require ="true" type="text" class="form-control" id ="name" name="name" value="<?=$name?>">
                </div>
                <input type ="submit" id="luu" class="btn btn-success" onclick="add()" name="luu" value ="Lưu" >
                </input>
          </form>
      </div>
		</div>
	</div>
</body>
</html>