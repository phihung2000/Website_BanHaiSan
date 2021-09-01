<?php 
require_once('../../db/dbhelper.php');

$id =$target_dir= $target_file=$imagefileType=$name =$uploadok = $gia =$path= $id_DanhMuc =$name_DanhMuc  = $mota='';
if(isset($_GET['id']))
{
  $id = $_GET['id'];
  $sql = 'select *from sanpham  where   id_SP = '.$id;
  $sanpham = executeSingleResult($sql);
  if($sanpham != null)
  {
    $name = $sanpham['name_SP'];
    $mota = $sanpham['mota_SP'];
    $gia = $sanpham['gia_SP'];
    $path = $sanpham['image_SP'];
    $id_DanhMuc = $sanpham['id_DanhMuc'];
  }
}
if(isset($_POST["luu"]))
  {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadok =1 ;
    $imagefileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]); 

    $path =$_FILES['fileToUpload']['name'];
    $name= $_POST['namesp'];
    $id_DanhMuc= $_POST['id_danhmuc']; 
    $mota= $_POST['content']; 
    $gia= $_POST['gia'];
    if(isset($_POST['id'])){
      $id= $_POST['id'];
    }
      
    
  
     
    if($check !=NULL)
    {
      if($check !== false)
      {
          $uploadok=1;
        }
      else{
            echo " đây không phải file hình ảnh.";
            $uploadok =0 ;
      }
    }


      // Kiểm tra xem tệp đã tồn tại hay chưa
      if(file_exists($target_file))
      {
          echo" xin lỗi file này đã tồn tại";
          $uploadok = 0;
      }
      // kiểm tra dung lụng của file ảnh
      if($_FILES["fileToUpload"]["size"]>5000000)
      {
          echo "xin lỗi file của bạn có dung lượng vượt quá dung lượng cho phép";
          $uploadok =0;
      }
      // cho phép định dạng tệp nhất định
      if($imagefileType !="jpg" && $imagefileType != "png" && $imagefileType != "jpeg"&& $imagefileType != "gif")
      {
          echo " xin lỗi chỉ file có định dạnh JPG PNG JPEG GIF  mới có thể upload";
          $uploadok = 0;
      }
      // kiểm tra xem uploadok có =0
      if($uploadok ==0)
      {
          echo " xin lỗi ,file của bạn upload không thành công ";
      }
      else
      {
          if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file))
          {
            if(!empty($name))
            {
                $creat_at = $update_at = date('Y-m-d H:s:i');
                if($id=='')
                {
                  $sql = 'insert into sanpham(name_SP,id_DanhMuc,gia_SP,image_SP,mota_SP,create_at,update_at)
                  values("'.$name.'","'.$id_DanhMuc.'","'.$gia.'","'.$path.'","'.$mota.'","'.$creat_at.'","'.$update_at.'")'; 
                }
                else
                {
                  $sql ='update sanpham set name_SP ="'.$name.'", id_DanhMuc ="'.$id_DanhMuc.'",
                  gia_SP ="'.$gia.'", image_SP ="'.$path.'", mota_SP ="'.$mota.'" , update_at ="'.$update_at.'" 
                       where sanpham.id_SP ='.$id;
                }
                  execute($sql);
                  header('Location: index_SP.php');
                  die();      
            } 
          }
          else
          {
              echo " sory ,lỗi khi upload file ảnh";
          }
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
    <a class="nav-link" href="../DanhMuc/index.php">Quản Lý Danh Mục</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../SanPham/index_SP.php">Quản Lý Sản Phẩm</a>
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
				<h2 class="text-center">Thêm / Sửa  Sản Phẩm</h2>
			</div>
			<div class="panel-body">
          <form  method="post" enctype="multipart/form-data" >
                <div class ="form-group">
                    <label for="namesp">Tên Sản Phẩm : </label>
                    <input require ="true" type="text" class="form-control" id ="namesp" name="namesp" value="<?=$name?>">
                </div>
                <div class ="form-group">
                    <label for="DanhMuc">chọn Danh Mục : </label>
                    <select class="form-control" name="id_danhmuc" id="id_danhmuc" value="<?=$id_DanhMuc?>">     
                    <option>-- lựa chọn danh mục --</option>              
<?php
  $sql = 'select * from danhmuc';
  $danhmucList = executeResult($sql);
  foreach($danhmucList as $item)
  {
    if($item['id_DanhMuc'] == $id_DanhMuc)
    {
      echo'<option selected value="'.$item['id_DanhMuc'].'">'.$item['name_DanhMuc'].'</option>';
    }
    else{
      echo'<option value="'.$item['id_DanhMuc'].'">'.$item['name_DanhMuc'].'</option>';
    }
  }
?>  
                    </select>
                </div>
                <div class ="form-group">
                    <label for="gia">Giá : </label>
                    <input require ="true" type="text" class="form-control" id ="gia" name="gia" value="<?=$gia?>">
                </div>
                
                <div class ="form-group">
                    <label for="content">Nội Dung : </label>
                    <textarea class ="form-control" rows="5" id ="content" name="content"><?=$mota?></textarea>
                </div>
                <div class ="form-group">
                    <label for="content">Hình Ảnh :</label>
                    <?php
                      $file='uploads/';
                      $linkhinhanh = $file.$path;
                      echo "<img src=\"  $linkhinhanh\"style=\"width:50px;height:50px\" >";
                    ?>
                </div>
                <div class ="form-group" >
                <form  method="post" enctype="multipart/form-data" >
                      Chọn tập tin : <input type="file" name="fileToUpload"  size="20" value="<?=$path?>"/><br/>
                      <input type ="submit" id="luu" class="btn btn-success"  name="luu" value ="Lưu" >

                </form>
                </div>
                
                
          </form>
      </div>
		</div>
	</div>
</body>
</html>