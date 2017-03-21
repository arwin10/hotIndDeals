
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
    
	$Name='AE';
	$Address='AE';
	$City='AE';
	$State='AE';
	$Country='AE';
	$Pincode=000000;
	
	$Email='AE';
	$Mobile=9999999999;
	$Gender='AE';
	$BirthDate='AE';
	
	$UserName=$_POST['txtUserName'];
	$Password=$_POST['txtPassword'];
	$UsrType=$_POST['txtUsrType'];
	
	// Establish Connection with MYSQL
	$con = mysql_connect ("localhost","root","admin");
	// Select Database
	mysql_select_db("shopping", $con);
	// Specify the query to Insert Record
	$sql = "insert into customer_registration(CustomerName,Address,City,Email,Mobile,Gender,BirthDate,UserName,Password,State,Country,Pincode,UserType) values('".$Name."','".$Address."','".$City."','".$Email."',".$Mobile.",'".$Gender."','".$BirthDate."','".$UserName."','".$Password."','".$State."','".$Country."','".$Pincode."','".$UsrType."')";
	// execute query
	mysql_query ($sql,$con) or die(mysql_error());
	// Close The Connection
	mysql_close ($con);
	echo '<script type="text/javascript">alert("User Inserted Succesfully");window.location=\'User.php\';</script>';

?>
</body>
</html>
