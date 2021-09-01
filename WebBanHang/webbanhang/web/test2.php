<?php 
$soluong =$_POST['soluong'];
if(isset($_GET['id']))
{
	$id=$_GET['id'];
}
?>
<html>
<body>

Welcome <?php echo $soluong; ?><br>
Your email address is: <?php echo $_POST["email"]; ?>
Welcome <?php echo $id; ?><br>
</body>
</html>