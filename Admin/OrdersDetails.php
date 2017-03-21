<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ARWIN E-Store Complete E-shopping Destination</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
.style9 {font-size: 95%; font-weight: bold; color: #003300; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style10 {color: #FFFFFF}
-->
</style>
</head>
<body>
<div id="wrapper">
  
  <?php
  include "Header.php";
  if (isset($_GET['OrderId'])) {
  $OrderIdNumber = $_GET['OrderId'];
}
  ?>
  
  <div id="content">
    <h2><span style="color:#003300"> Order Details (<?php echo $OrderIdNumber;?>)</span></h2>
	
	<h3><span style="color:#003300">Product Details</span></h3>
    <table width="100%" border="1" bordercolor="#003300" >
      <tr>
	    <td bgcolor="#4B692D" class="style10 style3"><strong>Item Id</strong></td>
        <td bgcolor="#4B692D" class="style10 style3"><strong>Item Name</strong></td>
        <td bgcolor="#4B692D" class="style10 style3"><strong>Quantity</strong></td>
        <td bgcolor="#4B692D" class="style10 style3"><strong>Total Price</strong></td>
		<td bgcolor="#4B692D" class="style10 style3"><strong>Total Price(Discount)</strong></td>
        <td bgcolor="#4B692D" class="style10 style3"><strong>Order Total</strong></td>
		<td bgcolor="#4B692D" class="style10 style3"><strong>Payment Mode</strong></td>
        <td bgcolor="#4B692D" class="style10 style3"><strong>Order Date</strong></td>	
      </tr>
      <?php
	  session_start();
// Establish Connection with Database
$con = mysql_connect("localhost","root","admin");
// Select Database
mysql_select_db("shopping", $con);
// Specify the query to execute
$sql = "SELECT * FROM shopping_cart_final where OrderId='".$OrderIdNumber."'";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 
while($row = mysql_fetch_array($result))
{
$OrderId=$row['OrderId'];
$Id=$row['CustomerId'];
$ItemName=$row['ItemName'];
$ItemId=$row['ItemId'];
$Quantity=$row['Quantity'];
$ItemPrice=$row['Price'];
$ItemTotal=$row['Total'];
$PayMode=$row['PaymentMode'];
$OrderTotal=$row['OrderTotal'];
$OrderDate=$row['OrderDate'];
$RecieverName=$row['RecieverName'];
$Gender=$row['Gender'];
$ContactNum=$row['Mobilenumber'];
$Email=$row['EmailId'];
$ShippingAddress=$row['ShippingAddress'];
$City=$row['City'];
$Pincode=$row['Pincode'];
?>
      <tr>
        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $ItemId;?></strong></div></td>
		<td class="style3"><div align="left" class="style9 style5"><strong><?php echo $ItemName;?></strong></div></td>
		<td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Quantity;?></strong></div></td>
        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $ItemPrice;?></strong></div></td>		
        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $ItemTotal;?></strong></div></td>
		<td class="style3"><div align="left" class="style9 style5"><strong><?php echo $OrderTotal;?></strong></div></td>
        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $PayMode;?></strong></div></td>
		<td class="style3"><div align="left" class="style9 style5"><strong><?php echo $OrderDate;?></strong></div></td>
      </tr>
      <?php
}
// Retrieve Number of records returned
$records = mysql_num_rows($result);
?>

      <?php
// Close the connection
mysql_close($con);
?>
    </table>
	
	<h3><span style="color:#003300">Shipping Details</span></h3>
 <table width="100%" border="0">
<tr>
         <td bgcolor="#BDE0A8"><strong>Reciever Name</strong></td> 
        <td bgcolor="#BDE0A8"><?php echo $RecieverName;?></td></tr>
        <tr>  <td bgcolor="#E3F2DB"><strong>Gender</strong></td>  
        <td bgcolor="#E3F2DB"><?php echo $Gender;?></td></tr>
        <tr> <td bgcolor="#BDE0A8"><strong>Contact Number</strong></td> 
        <td bgcolor="#BDE0A8"><?php echo $ContactNum; ?></td></tr>
       <tr>  <td bgcolor="#E3F2DB"><strong>Email</strong></td> 
       <td bgcolor="#E3F2DB"><?php echo $Email; ?></td></tr>
        <tr> <td bgcolor="#BDE0A8"><strong>Shipping Address</strong></td>  
        <td bgcolor="#BDE0A8"><?php echo $ShippingAddress; ?></td></tr>
        <tr> <td bgcolor="#E3F2DB"><strong>City</strong></td> 
        <td bgcolor="#E3F2DB"><?php echo $City; ?></td>
        </tr>
		<tr> <td bgcolor="#E3F2DB"><strong>PinCode</strong></td> 
        <td bgcolor="#E3F2DB"><?php echo $Pincode; ?></td>
        </tr>
</table>
    <p align="justify">&nbsp;</p>
    <table width="100%" border="0" cellspacing="3" cellpadding="3">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
     <!-- <tr>
        <td><p><img src="img/iphone5s.jpg" alt="box" width="100" height="100" hspace="10" align="left" class="imgleft" title="box" /></p></td>
        <td><p><img src="img/galaxyS7.jpg" alt="box" width="100" height="100" hspace="10" align="left" class="imgleft" title="box" /></p></td>
        <td><p><img src="img/iphone6s.jpg" alt="box" width="100" height="100" hspace="10" align="left" class="imgleft" title="box" /></p></td>
      </tr>
      <tr>
        <td height="26" bgcolor="#BCE0A8"><div align="center" class="style9">Iphone 5s</div></td>
        <td bgcolor="#BCE0A8"><div align="center" class="style9">Galaxy S7</div></td>
        <td bgcolor="#BCE0A8"><div align="center" class="style9">Iphone 6s</div></td>
      </tr>-->
    </table>
    <p>&nbsp;</p>
	<?php
	  include "thumbslider.php";
    ?> 
  </div>
 <?php
 include "Right.php";
 ?>
  <div style="clear:both;"></div>
   <?php
 include "Footer.php";
 ?>
</div>
</body>
</html>
