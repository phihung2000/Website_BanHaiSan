<?php
require_once('../../db/dbhelper.php'); 
session_start();
$username=$id_KhachHang=$id='';
if(isset($_GET['id']))
{
    $id=$_GET['id'];
}
$_SESSION['id_SP']=$id;

if(isset($_POST['dangnhap']))
{
    
    $username =$_SESSION['username'];
    $id_KhachHang=$_SESSION['id_KhachHang'];
    $id = $_SESSION['id_SP'];
}
?>
<!DOCTYPE html> 
<html> 
<head> 
    <title>Đăng Nhập</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
    <link rel="stylesheet" href="styleDangnhap.css"/> 
    <link rel="stylesheet" href="styles.css">
</head> 
<body style="background-image: url(../imageSP/hinhnenoc.png);width:100%"> 
    <div class = "trai">
    </div>
    <div class = "giua">
        <form action='login.php' class="dangnhap" method='POST'> 
            <table>
                <tr>
                    <td colspan="2"><header type='text'>  ĐĂNG NHẬP: </header></td>
                </tr>
                <tr>
                    <td><label type='text'>  Tên đăng nhập : </lablel></td>
                    <td><input type='text' name='username' value ="<?=$username?>" /> </td>
                </tr>
                <tr>
                    <td><label type='text'>Mật khẩu :</label></td>
                    <td><input type='password' name='password' /></td>
                </tr>
                <tr >
                    <td colspan="2"><input type='submit' class="button" name="dangnhap" value='Đăng nhập' /> </td>
                <tr>
                <tr >
                    <td colspan="2"><a href='dangky.php' title='Đăng ký'>Đăng ký</a>
                    <?php require 'xulydangNhap.php';?>  
                    </td>
                <tr>
              
            </table>     
        
        <form>
    <div>
    <div class = "phai">
    <div>
     
</body> 
</html>