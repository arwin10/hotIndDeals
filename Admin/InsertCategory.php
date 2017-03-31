<?php
if(!isset($_SESSION))
{
session_start();
}
?>
<?php 
    include '../Connections/config.php'; 
	include '../Connections/opendb.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert Category</title>
</head>

<body>
<?php

	$Name=$_POST['txtName'];
	echo $Name;
	$MainName=$_POST['txtMainName'];
	$Desc=$_POST['txtDesc'];
	$ActiveStatus=$_POST['txtAvlStatus'];
	//echo $Desc;
	$path1 = $_FILES["txtFile"]["name"];
	echo $path1;
	move_uploaded_file($_FILES["txtFile"]["tmp_name"],"../Products/"  .$_FILES["txtFile"]["name"]);

	// Specify the query to Insert Record
	$sql = "insert into Category_Master	(CategoryName,Description,Image,MainCategoryName,ActiveStatus) values('".$Name."','".$Desc."','".$path1."','".$MainName."','".$ActiveStatus."')";
	// execute query
	$status=mysql_query ($sql,$shop) or die(mysql_error());
	
	if($status==true)
	echo '<script type="text/javascript">alert("Category Inserted Succesfully");window.location=\'Category.php\';</script>';
    else
	echo '<script type="text/javascript">alert("Category didnt Inserted Succesfully");window.location=\'Category.php\';</script>';
?>
 <?php
    include '../Connections/closedb.php';
 ?>	
</body>

</html>
