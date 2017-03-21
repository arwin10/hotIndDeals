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
  ?>
  
  <div id="content">
    <h2><span style="color:#003300"> Welcome Administrator </span></h2>
    <table width="100%" border="1" bordercolor="#003300" >
      <tr>
	    <td bgcolor="#4B692D" class="style10 style3"><strong>Order ID</strong></td>
        <td bgcolor="#4B692D" class="style10 style3"><strong>Customer ID</strong></td>
        <td bgcolor="#4B692D" class="style10 style3"><strong>Customer Name</strong></td>
       <!-- <td bgcolor="#4B692D" class="style10 style3"><strong>Item Name</strong></td>-->
       
       <!-- <td bgcolor="#4B692D" class="style10 style3"><strong>Quantity</strong></td>-->
       <!-- <td bgcolor="#4B692D" class="style10 style3"><strong>Price</strong></td>-->
        <td bgcolor="#4B692D" class="style10 style3"><strong>Order Total</strong></td>
        <td bgcolor="#4B692D" class="style10 style3"><strong>Order Date</strong></td>
       <!-- <td bgcolor="#4B692D" class="style10 style3"><strong>Shipping Address</strong></td>-->
		<td bgcolor="#4B692D" class="style10 style3"><strong>Customer Description</strong></td>
      </tr>
      <?php
	  session_start();
// Establish Connection with Database
$con = mysql_connect("localhost","root","admin");
// Select Database
mysql_select_db("shopping", $con);
// Specify the query to execute
$sql = "SELECT customer_registration.CustomerId, customer_registration.CustomerName, shopping_cart_final.ItemName, shopping_cart_final.Quantity, shopping_cart_final.Price, shopping_cart_final.Total,shopping_cart_final.OrderDate, shopping_cart_final.ShippingAddress,shopping_cart_final.OrderId,shopping_cart_final.OrderTotal
FROM customer_registration, shopping_cart_final
WHERE customer_registration.CustomerId=shopping_cart_final.CustomerId AND shopping_cart_final.OrderId IS NOT NULL GROUP BY shopping_cart_final.OrderId";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 
while($row = mysql_fetch_array($result))
{
$Id=$row['CustomerId'];
$CustomerName=$row['CustomerName'];
$ItemName=$row['ItemName'];
$Quantity=$row['Quantity'];
$Price=$row['Price'];
$Total=$row['Total'];
$OrderDate=$row['OrderDate'];
$ShippingAddress=$row['ShippingAddress'];
$OrderId=$row['OrderId'];
$OrderTotal=$row['OrderTotal'];
?>
      <tr>
	    <td class="style3"><div align="left" class="style9 style5"><strong><a href="OrdersDetails.php?OrderId=<?php echo $OrderId;?>"><?php echo $OrderId;?></a></strong></div></td>
        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Id;?></strong></div></td>
        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $CustomerName;?></strong></div></td>
        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $OrderTotal;?></strong></div></td>
        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $OrderDate;?></strong></div></td>
        <td class="style3"><a href="Detail.php?CustomerId=<?php echo $Id;?>">Customer Details</a></td>
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
