<?php

require_once('../../db/dbhelper.php');
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
//Xử lý đăng nhập
$username = $password ='';
if (isset($_POST['dangnhap']))
{ 
        $username = $_POST['username'];
        $password = $_POST['password'];
        
}

$_SESSION['username'] = $username;
$sql = 'select * from taikhoan where username="'.$username.'"';
$listKhachHang = executeSingleResult($sql);
if($listKhachHang !=null)
{
    $_SESSION['id_KhachHang'] = $listKhachHang['id_KhachHang'];
}
//Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (empty($username)) {
        echo "Vui lòng nhập tên đăng nhập ";
        exit;
    }
    else if ( empty($password)) {
        echo "Vui lòng nhập mật khẩu";
        exit;
    }
    else if (!empty($username) && !empty($password))
    {
            // mã hóa pasword
        //$password = md5($password);
        
        //Kiểm tra tên đăng nhập có tồn tại không
        $sql ='select count(id_KhachHang) as dem from taikhoan where username="'.$username.'" ';
        $countResult = executeSingleResult($sql);
        $count = $countResult['dem'];
        if ( $count == 0) {
            echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. ";
            exit;
        }
        else{
            $sql = 'select * FROM taikhoan WHERE username="'.$username.'"';
            $query = executeResult($sql);
            foreach ($query as $item){
                $pass = $item['password'];
            }
            //So sánh 2 mật khẩu có trùng khớp hay không
            if ($password != $pass) {
                echo "Mật khẩu không đúng. Vui lòng nhập lại.";
                exit;
            }
            else{
                //Lưu tên đăng nhập
                if($username=='admin' && $password =='admin')
                {
                    header('Location:../../admin/index.php');
                }
                else {
                    if($_SESSION['id_SP']!='')
                    {
                        header('Location:../web/ChitietSP.php?id='.$_SESSION['id_SP'].'');
                        die();
                    }
                    if($_SESSION['id_SP']=='')
                    {
                        header('Location:../web/TrangChu.php');
                        die();
                    }
                    
                }
                
            }
            
        }
        
    }
    

?>