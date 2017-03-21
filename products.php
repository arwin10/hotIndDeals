<?php
if(!isset($_SESSION))
{
session_start();
}
?>
<?php require_once('Connections/shop.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_Recordset1 = "-1";
if (isset($_GET['CategoryId'])) {
  $colname_Recordset1 = $_GET['CategoryId'];
  mysql_select_db($database_shop, $shop);
  $query_Recordset6 = sprintf("SELECT CategoryName,Description FROM category_master WHERE CategoryId = %s", GetSQLValueString($colname_Recordset1, "int"));
  $Recordset6 = mysql_query($query_Recordset6, $shop) or die(mysql_error());
  $row_Recordset6 = mysql_fetch_assoc($Recordset6);
}
mysql_select_db($database_shop, $shop);
$query_Recordset1 = sprintf("SELECT ItemName,ItemId,`Description`, `Size`, Image, Price, Discount, Total,AvalibiltyStatus FROM item_master WHERE CategoryId = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $shop) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_shop, $shop);
$query_Recordset2 = "SELECT ItemName,ItemId,`Description`, `Size`, Image, Price, Discount, Total,AvalibiltyStatus FROM item_master";
$Recordset2 = mysql_query($query_Recordset2, $shop) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

mysql_select_db($database_shop, $shop);
$query_Recordset3 = sprintf("SELECT ItemName,ItemId,`Description`, `Size`, Image, Price, Discount, Total,AvalibiltyStatus FROM item_master WHERE CategoryId = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset3 = mysql_query($query_Recordset3, $shop) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

mysql_select_db($database_shop, $shop);
$query_Recordset4 ="SELECT ItemName,ItemId,`Description`, `Size`, Image, Price, Discount, Total,AvalibiltyStatus FROM item_master";
$Recordset4 = mysql_query($query_Recordset4, $shop) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysql_num_rows($Recordset4);

mysql_select_db($database_shop, $shop);
$query_Recordset5 = "SELECT ItemName,ItemId,`Description`,`Size`, Image, Price, Discount, Total FROM item_master where PromotedPrd='Y'";
$Recordset5 = mysql_query($query_Recordset5, $shop) or die(mysql_error());
$row_Recordset5 = mysql_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysql_num_rows($Recordset5);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | HotIndDeals</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>

	<!-- Header -->
	<?php include "Header.php" ?>
	
	<section id="advertisement">
		<div class="container">
			<img src="images/shop/banner.jpg" alt="" />
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
							
							<?php include 'categorylist.php' ?>
							
								
						</div><!--/category-products-->
						<div class="brands_products"><!--brands_products-->
							<h2>Popular Store</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#"> <span class="pull-right">(50)</span>Amazon</a></li>
									<li><a href="#"> <span class="pull-right">(56)</span>FlipKart</a></li>
									<li><a href="#"> <span class="pull-right">(27)</span>Paytm</a></li>
									<li><a href="#"> <span class="pull-right">(32)</span>Snapdeal</a></li>
									<li><a href="#"> <span class="pull-right">(5)</span>Jabong</a></li>
									<li><a href="#"> <span class="pull-right">(9)</span>Myntra</a></li>
									<li><a href="#"> <span class="pull-right">(4)</span>Shopclues</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range" style="display:none"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b>$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/latest-deals-offer-image.jpg" alt="" />
						</div><!--/shipping-->
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Best Offers</h2>
					
						
						<?php
	       if(isset($_GET['CategoryId']))
	       { 
	       do 
	       { 
	      ?>
			
			<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="Products/<?php echo $row_Recordset3['Image']; ?>" alt="" />
										<h2>Rs. <?php echo $row_Recordset3['Total']; ?></h2>
										<p><?php echo $row_Recordset3['ItemName']; ?></p>
										<a href="product_details.php?ItemId=<?php echo $row_Recordset3['ItemId']?>&CategoryId=<?php echo $_GET['CategoryId']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Get Deal</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>Rs. <?php echo $row_Recordset3['Total']; ?></h2>
											<p><?php echo $row_Recordset3['ItemName']; ?></p>
											<a href="product_details.php?ItemId=<?php echo $row_Recordset3['ItemId']?>&CategoryId=<?php echo $_GET['CategoryId']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Get Deal</a>
										</div>
									</div>
								</div>
								<div class="choose" style="display:none">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
			
          <?php } while ($row_Recordset3 = mysql_fetch_assoc($Recordset3));
		 }
		 else
		 { 
		  do 
	      { 
	       ?>		   
		   <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="Products/<?php echo $row_Recordset4['Image']; ?>" alt="" />
										<h2>Rs. <?php echo $row_Recordset4['Total']; ?></h2>
										<p><?php echo $row_Recordset4['ItemName']; ?></p>
										<a href="product_details.php?ItemId=<?php echo $row_Recordset4['ItemId']?>&CategoryId=<?php echo $_GET['CategoryId']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Get Deal</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>Rs. <?php echo $row_Recordset4['Total']; ?></h2>
											<p><?php echo $row_Recordset4['ItemName']; ?></p>
											<a href="product_details.php?ItemId=<?php echo $row_Recordset3['ItemId']?>&CategoryId=<?php echo $_GET['CategoryId']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Get Deal</a>
										</div>
									</div>
								</div>
								<div class="choose" style="display:none">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
           <?php } while ($row_Recordset4 = mysql_fetch_assoc($Recordset4));
		 }
        
         ?>
						
						<ul class="pagination" style="display:none">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	
	<!-- Footer -->
	<?php include "Footer.php" ?>

    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>