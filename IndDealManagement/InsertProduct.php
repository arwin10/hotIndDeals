<?php 
    include '../Connections/config.php'; 
	include '../Connections/opendb.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dealslooter Admin Management</title>
 
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
	$ItemCondition=$_POST['txtItemCond'];
	$QntAvl=$_POST['txtQntAvl'];
	$PrdfullDesc=$_POST['txtfulldesc'];
	$Brand=$_POST['txtBrand'];
	$Modelno=$_POST['txtModel'];
	$Dimension=$_POST['txtDimension'];
	
	$DispSize=$_POST['txtDispSize'];
	$PrdFeatures=$_POST['txtPrdFeatures'];
	$PrdReviews=$_POST['txtPrdReviews'];
	
	$PostedBy=$_POST['txtPostedBy'];
	$ReleaseDate=$_POST['txtRelDate'];
	$ReleaseTime=$_POST['txtRelTime'];
	$DealDescp=$_POST['txtDealDescp'];
	$DealLink=$_POST['txtDealLink'];
	$StoreId=$_POST['txtDealWebsite'];
	$StoreName='@'.$_POST['txtStoreName'];
	
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

	// Specify the query to Insert Record
	$sql = "insert into Item_Master	(CategoryId,ItemName,Description,Size,Image,PrdDescFile,Price,Discount,Total,FeaturedPrd,LatestPrd,PromotedPrd,ItemCondtion,AvalibiltyStatus,QuantityAvailable,ItemsFullDescription,Brand,ModelNo,ReleaseDate,DisplaySize,PrdFeatures,PrdReviews,PostedBy,ReleaseTime,DealDescription,DealLink,StoreId,PrdDimension,DealWebsite) values(".$cmbCategory.",'".$txtName."','".$txtDesc."','".$txtSize."','".$path1."','".$path2."',".$txtPrice.",".$txtDiscount.",".$txtFinal.",'".$frdStatus."','".$LatestStatus."','".$PrmStatus."','".$ItemCondition."','".$AvlStatus."',".$QntAvl.",'".$PrdfullDesc."','".$Brand."','".$Modelno."','".$ReleaseDate."','".$DispSize."','".$PrdFeatures."','".$PrdReviews."','".$PostedBy."','".$ReleaseTime."','".$DealDescp."','".$DealLink."',".$StoreId.",'".$Dimension."','".$StoreName."')";
	// execute query
	$status=mysql_query ($sql,$shop) or die(mysql_error());
	
	if($status==true)
	echo '<script type="text/javascript">alert("Products Inserted Succesfully");window.location=\'Products.php?CategoryId='.$cmbCategory.'\';</script>';
    else
	echo '<script type="text/javascript">alert("Products didnt Inserted Succesfully");window.location=\'Products.php?CategoryId='.$cmbCategory.'\';</script>';	
	//header("location:Products.php?CategoryId=".$cmbCategory."")

?>
<?php
   include '../Connections/closedb.php';
?>
</body>
</html>
