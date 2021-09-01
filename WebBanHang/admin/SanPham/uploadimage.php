<?php
require_once('../../db/dbhelper.php');


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadok =1 ;
$imagefileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// kiểm tra xem có phải file hình ảnh hay không
if(isset($_POST['luu'])){
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    
    if($check !=NULL)
    {
        if($check !== false){
            echo " file là file hình ảnh -".$check["mime"].".";
            
            $uploadok=1;
        }
        else{
            echo " đây không phải file hình ảnh.";
            $uploadok =0 ;
        }
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
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file)){

    }
    else{
        echo " sory ,lỗi khi upload file ảnh";
    }
}
?>