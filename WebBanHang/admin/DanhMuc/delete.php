<?php 
require_once('../../db/dbhelper.php');
if(!empty($_POST))
  {
    $name ='';
      if(isset($_POST['name'])){
          $name= $_POST['name'];   
      }
      if(!empty($name)){
        $creat_at = $update_at = date('Y-m-d H:s:i');
        // lưu vào database
        $sql = 'insert into danhmuc(name_DanhMuc,Created_at,update_at)
                  values("'.$name.'","'.$creat_at.'","'.$update_at.'")';
        execute($sql);  
        header('Location: index.php');
        die();
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
    <a class="nav-link" href="#">Quản Lý Sản Phẩm</a>
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
          <form method ="post">
                <div class ="from-group">
                    <label for="name">Tên Danh Mục : </label>
                    <input require ="true" type="text" class="form-control" id ="name" name="name">
                </div>
                <button class="btn btn-success">Lưu </button>
          </form>
      </div>
		</div>
	</div>
</body>
</html>