<?php 
    include '../Connections/config.php'; 
	include '../Connections/opendb.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

	$ItemId=$_GET['ItemId'];
	$CategoryId=$_GET['CategoryId'];
	
	$sql = "delete from Item_Master where ItemId='".$ItemId."'";
	// execute query
	mysql_query ($sql,$shop);
	
	echo '<script type="text/javascript">alert("Product Deleted Succesfully");window.location=\'Products.php?CategoryId='.$CategoryId.'\';</script>';

?>
 <?php
    include '../Connections/closedb.php';
 ?>
</body>
</html>
