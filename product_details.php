<?php
if(!isset($_SESSION))
{
session_start();
}
?>
<?php 
    include 'Connections/config.php'; 
	include 'Connections/opendb.php';
?>
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
if (isset($_GET['ItemId'])) {
  $colname_Recordset1 = $_GET['ItemId'];
  
  $query_Recordset6 = sprintf("SELECT * FROM item_master WHERE ItemId = %s and AvalibiltyStatus='Y'", GetSQLValueString($colname_Recordset1, "int"));
  $Recordset6 = mysql_query($query_Recordset6, $shop) or die(mysql_error());
  $row_Recordset6 = mysql_fetch_assoc($Recordset6);
}

$query_Recordset1 = sprintf("SELECT ItemName, `Description`, `Size`, Image, Price, Discount, Total,AvalibiltyStatus FROM item_master WHERE CategoryId = %s and AvalibiltyStatus='Y'", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $shop) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);


$query_Recordset2 = "SELECT ItemName, `Description`, `Size`, Image, Price, Discount, Total,AvalibiltyStatus FROM item_master where AvalibiltyStatus='Y'";
$Recordset2 = mysql_query($query_Recordset2, $shop) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);


$query_Recordset3 = sprintf("SELECT ItemName, `Description`, `Size`, Image, Price, Discount, Total,AvalibiltyStatus FROM item_master WHERE CategoryId = %s and AvalibiltyStatus='Y'", GetSQLValueString($colname_Recordset1, "int"));
$Recordset3 = mysql_query($query_Recordset3, $shop) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);


$query_Recordset4 = sprintf("SELECT ItemName, `Description`, `Size`, Image, Price, Discount, Total,AvalibiltyStatus FROM item_master WHERE CategoryId = %s and AvalibiltyStatus='Y'", GetSQLValueString($colname_Recordset1, "int"));
$Recordset4 = mysql_query($query_Recordset4, $shop) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysql_num_rows($Recordset4);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product Details | HotIndDeals</title>
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
								  <?php include 'popularstoreslist.php' ?>
								</ul>
							</div>
						</div><!--/brands_products-->
						<div class="price-range"style="display:none"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b>Rs.0</b> <b class="pull-right">Rs.600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
						<a href="products.php"><img src="images/home/latest-deals-offer-image.jpg" alt="" /></a>
						</div><!--/shipping-->
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="Products/<?php echo $row_Recordset6['Image']; ?>" alt="" />
								<h3 style="display:none">ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel" style="display:none">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $row_Recordset6['ItemName']; ?> </h2>
								<h5><b><?php echo $row_Recordset6['Description']; ?></b></h3>
								<p>Deal ID: <?php echo $row_Recordset6['ItemId'];?></p>
								<img src="images/product-details/rating.png" alt="" />
								    </br>
									<span><b>Rs.<?php echo $row_Recordset6['Total']; ?></b>(<?php echo round($row_Recordset6['Discount']/$row_Recordset6['Price']*100);?>%off)</span>
									</br><b>Discount Rs.<?php echo $row_Recordset6['Discount']; ?></b>
					                </br><b>MRP Rs.<?php echo $row_Recordset6['Price']; ?></b>
									</br>
									<label>Views:</label>
									<input type="text" value="<?php echo $row_Recordset6['QuantityAvailable'];?>" readonly />
									</br>
									<a href="<?php echo $row_Recordset6['DealLink']; ?>" target="_blank"><button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
									Buy Now
									</button></a>
								</span>
								<?php if($row_Recordset6['AvalibiltyStatus']=='Y') {?>
								<p><b>Availability:</b> Deal Available</p>
								<?php } else{?>
								<p><b>Availability:</b> Deal Expired</p>
								<?php }?>
								<p><b>Condition:</b> <?php echo $row_Recordset6['ItemCondtion']; ?></p>
								<p><b>Brand:</b> <?php echo $row_Recordset6['Brand']; ?></p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab" style="display:none">Details</a></li>
								<li><a href="#companyprofile" data-toggle="tab" style="display:none">Company Profile</a></li>
								<li><a href="#tag" data-toggle="tab" style="display:none">Tag</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Deal Description</a></li>
							</ul>
						</div>
						<div class="tab-content" >
							<div class="tab-pane fade" id="details" style="display:none" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								
							</div>
							
							<div class="tab-pane fade" id="companyprofile" style="display:none" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>

							</div>
							
							<div class="tab-pane fade" id="tag" style="display:none" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div> 
										</div>
									</div>
								</div>
								
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><b>Posted By:</b><a href=""><i class="fa fa-user"></i><?php echo $row_Recordset6['PostedBy']; ?></a></li>
										<li><a href=""><i class="fa fa-clock-o"></i><?php echo $row_Recordset6['ReleaseTime']; ?></a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i><?php echo $row_Recordset6['ReleaseDate']; ?></a></li>
									</ul>
									<p><b><?php echo $row_Recordset6['ItemsFullDescription'];?></b></p>
									<p><b>Deal Link</b></p>
									
									<form action="<?php echo $row_Recordset6['DealLink']; ?>" target="_blank">
										<span>
											<a href="<?php echo $row_Recordset6['DealLink']; ?>" target="_blank"><?php echo $row_Recordset6['DealLink']; ?></a>
											<input type="text" style="color: black; font-size: 20px; background-color: #fe980f" placeholder="<?php echo $row_Recordset6['DealWebsite']; ?>" readonly />
										</span>
										<textarea name="deal_Details" style="color: black; font-size: 20px; background-color: #fe980f" readonly><?php echo $row_Recordset6['DealDescription'];?></textarea>
										<!--<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />-->
										<button type="submit" class="btn btn-default pull-right">
											Buy Now
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Recommended Deals</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
							<div class="item active"> 
									<?php include "recommendedDeals.php" ?>
							</div>
								<div class="item">	
									<?php include "recommendedDeals2.php" ?>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
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
