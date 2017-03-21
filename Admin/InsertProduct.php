<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
 
</head>

<body>
<?php

	$cmbCategory=$_GET['CategoryId'];
	$txtName=$_POST['txtName'];
	$txtDesc=$_POST['txtDesc'];
	$txtSize=$_POST['txtSize'];
	
	$frdStatus=$_POST['txtFrdPrd'];
	$LatestStatus=$_POST['txtLatPrd'];
	$PrmStatus=$_POST['txtPrmPrd'];
	$AvlStatus=$_POST['txtAvlStatus'];
	$QntAvl=$_POST['txtQntAvl'];
	$PrdfullDesc=$_POST['txtfulldesc'];
	$Brand=$_POST['txtBrand'];
	$Modelno=$_POST['txtModel'];
	$ReleaseDate=$_POST['txtRelDate'];
	$Dimension=$_POST['txtDimension'];
	$DispSize=$_POST['txtDispSize'];
	$PrdFeatures=$_POST['txtPrdFeatures'];
	$PrdReviews=$_POST['txtPrdReviews'];
	
	$txtPrice=$_POST['txtPrice'];
	$txtDiscount=$_POST['txtDiscount'];
	$txtFinal=$_POST['txtFinal'];
	
	$filea = $_FILES['txtFile'];
	$path1= $filea['name'];
	//echo $path1;
	move_uploaded_file($filea['tmp_name'], '../Products/'.$filea['name']);
    $fileb = $_FILES['txtPrdFile'];
	$path2= $fileb['name'];
	//echo $path2;
	move_uploaded_file($fileb['tmp_name'], '../Products/'.$fileb['name']);
	// Establish Connection with MYSQL
	$con = mysql_connect ("localhost","root","admin");
	// Select Database
	mysql_select_db("shopping", $con);
	// Specify the query to Insert Record
	$sql = "insert into Item_Master	(CategoryId,ItemName,Description,Size,Image,PrdDescFile,Price,Discount,Total,FeaturedPrd,LatestPrd,PromotedPrd,AvalibiltyStatus,QuantityAvailable,ItemsFullDescription,Brand,ModelNo,ReleaseDate,PrdDimension,DisplaySize,PrdFeatures,PrdReviews) values(".$cmbCategory.",'".$txtName."','".$txtDesc."','".$txtSize."','".$path1."','".$path2."',".$txtPrice.",".$txtDiscount.",".$txtFinal.",'".$frdStatus."','".$LatestStatus."','".$PrmStatus."','".$AvlStatus."',".$QntAvl.",'".$PrdfullDesc."','".$Brand."','".$Modelno."','".$ReleaseDate."','".$Dimension."','".$DispSize."','".$PrdFeatures."','".$PrdReviews."')";
	// execute query
	$status=mysql_query ($sql,$con) or die(mysql_error());
	// Close The Connection
	mysql_close ($con);
	if($status==true)
	echo '<script type="text/javascript">alert("Products Inserted Succesfully");window.location=\'Products.php?CategoryId='.$cmbCategory.'\';</script>';
    else
	echo '<script type="text/javascript">alert("Products didnt Inserted Succesfully");window.location=\'Products.php?CategoryId='.$cmbCategory.'\';</script>';	
	//header("location:Products.php?CategoryId=".$cmbCategory."")

?>
</body>
</html>
