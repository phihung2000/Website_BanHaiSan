<?php
require_once('../../db/dbhelper.php');
$name = $email = $ngaysinh =$tk =$mk =$diachi ='';
if(isset($_POST['dangky']))
{
    $name = $_POST['ten'];
    $email = $_POST['email'];
    $ngaysinh =$_POST['ngaysinh'];
    $tk =$_POST['tk'];
    $mk =$_POST['matkhau'];
    $diachi =$_POST['diachi'];
	$sql = 'insert INTO `taikhoan` (`username`, `password`, `Ten`, `Email`, `DiaChi`, `NgaySinh`)
	 VALUES ("'.$tk.'", "'.$mk.'", "'.$name.'","'.$email.'", "'.$diachi.'", "'.$ngaysinh.'")';
	$query = execute($sql);
	header('Location: login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Đăng Ký</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="dangky.css">
</head>
<body>
    <form action='dangky.php' class="dangky" method='POST'> 
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="text-center">Đăng Ký Thành Viên </h2>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="usr">Họ và Tên:</label>
						<input required="true" name ="ten" type="text" class="form-control" id="usr" value="<?=$name?>">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input required="true" name ="email" type="text" class="form-control" id="email" value="<?=$email?>">
					</div>
					<div class="form-group">
						<label for="birthday">Ngày Sinh:</label>
						<input type="date" name="ngaysinh" class="form-control" id="birthday" value="<?=$ngaysinh?>">
					</div>
					<div class="form-group">
						<label for="usr">Tài Khoản Đăng Nhập:</label>
						<input required="true" name ="tk" type="text" class="form-control" id="usr" value="<?=$tk?>">
					</div>
					<div class="form-group">
						<label for="pwd">Mật Khẩu:</label>
						<input required="true" name ="matkhau" type="password" class="form-control" id="pwd" value="<?=$mk?>">
					</div>
					<div class="form-group">
						<label for="confirmation_pwd">Nhập lại Mật Khẩu:</label>
						<input required="true" type="password" class="form-control" id="confirmation_pwd" value="<?=$mk?>">
					</div>
					<div class="form-group">
						<label for="address">Địa Chỉ:</label>
						<input type="text" name ="diachi" class="form-control" id="address" value="<?=$diachi?>">
					</div>
						<input type='submit' class="button" id="dangky" name="dangky" value='Đăng Ký' />
				</div>
			</div>
		</div>
	</form>
</body>
</html>