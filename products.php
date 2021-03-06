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
if (isset($_GET['CategoryId'])) {
  $colname_Recordset1 = $_GET['CategoryId'];
  $query_Recordset6 = sprintf("SELECT CategoryName,Description FROM category_master WHERE CategoryId = %s", GetSQLValueString($colname_Recordset1, "int"));
  $Recordset6 = mysql_query($query_Recordset6, $shop) or die(mysql_error());
  $row_Recordset6 = mysql_fetch_assoc($Recordset6);
}

if (isset($_GET['PopStoreId'])) {
  $colname_Recordset2 = $_GET['PopStoreId'];
  $query_Recordset7 = sprintf("SELECT ItemName,ItemId,CategoryId,DealWebsite,`Description`, `Size`, Image, Price, Discount, Total,AvalibiltyStatus FROM item_master WHERE StoreId = %s and AvalibiltyStatus='Y' ORDER BY item_master.ItemId DESC", GetSQLValueString($colname_Recordset2, "int"));
  $Recordset7 = mysql_query($query_Recordset7, $shop) or die(mysql_error());
  $row_Recordset7 = mysql_fetch_assoc($Recordset7);
}

$query_Recordset1 = sprintf("SELECT ItemName,ItemId,`Description`, `Size`, Image, Price, Discount, Total,AvalibiltyStatus FROM item_master WHERE CategoryId = %s and AvalibiltyStatus='Y' ORDER BY item_master.ItemId DESC", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $shop) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);


$query_Recordset2 = "SELECT ItemName,ItemId,`Description`, `Size`, Image, Price, Discount, Total,AvalibiltyStatus FROM item_master where AvalibiltyStatus='Y' ORDER BY item_master.ItemId DESC";
$Recordset2 = mysql_query($query_Recordset2, $shop) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);


$query_Recordset3 = sprintf("SELECT ItemName,ItemId,`Description`, `Size`, Image, Price, Discount, Total,AvalibiltyStatus FROM item_master WHERE CategoryId = %s and AvalibiltyStatus='Y' ORDER BY item_master.ItemId DESC", GetSQLValueString($colname_Recordset1, "int"));
$Recordset3 = mysql_query($query_Recordset3, $shop) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);


$query_Recordset4 ="SELECT ItemName,ItemId,CategoryId,`Description`, `Size`, Image, Price, Discount, Total,AvalibiltyStatus FROM item_master where AvalibiltyStatus='Y' ORDER BY item_master.ItemId DESC";
$Recordset4 = mysql_query($query_Recordset4, $shop) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysql_num_rows($Recordset4);


$query_Recordset5 = "SELECT ItemName,ItemId,`Description`,`Size`, Image, Price, Discount, Total FROM item_master where PromotedPrd='Y' and AvalibiltyStatus='Y' ORDER BY item_master.ItemId DESC";
$Recordset5 = mysql_query($query_Recordset5, $shop) or die(mysql_error());
$row_Recordset5 = mysql_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysql_num_rows($Recordset5);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="arwin@Softech Enterprise">
	<meta name="description" content="Find Easily Best Online Deals, Offers,discounts & promo codes for all online shopping websites & Save your Money with FreekaaMaals.com"> 
	<meta content='best deals,best offers,top website for deals,loot deals,loot offers,loot coupons, loot,Online shopping, online shopping India, best deals, online deals, shopping deals, coupons, coupons india, discount offers, shopping online, shopping deals online,freekaamaals,freekaamaal' name='keywords'> 
    <meta property="og:title" content="India's Best website for Best Online Deals, Offers, Coupons" /> 
	<meta property="og:description" content="Find Easily Best Online Deals, Offers,discounts & promo codes for all online shopping websites & Save your Money with FreekaaMaals.com" /> 
	<meta property="og:type" content="deals" /> <meta property="og:url" content="http://freekaamaals.com/" />
    <title>Home | Freekaamaals.com</title>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
     $(document).ready(function(){
	  $(".pagination li:gt(10):not(:last-child)").hide();
      $('.next').click(function(){
      $(".pagination li:gt(10)").show();
      });	  
	 });
	
    </script>

</head><!--/head-->


<body>

	<!-- Header -->
	<?php include "Header.php" ?>
	
	<section id="advertisement">
		<div class="container">
			<img src="http://martjackstorage.azureedge.net/in-resources/e0af9c17-737e-4a5e-9202-38a44fb838d3/Images/userimages/Home%20Banner/offerbannernwe.jpg" alt="" />
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
									<?php include 'popularstoreslist.php' ?>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range" style="display:none"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b>Rs.0</b> <b class="pull-right">Rs.600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<a href="products.php"><img src="http://dailyshopper.bargains/wp-content/uploads/2015/05/dailydeals.png" alt="" /></a>
						</div><!--/shipping-->
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
				
									
		  <?php
	       if(isset($_GET['CategoryId']))
	       { 
	         echo "<div class='features_items'>";
			 echo "<h2 class='title text-center'>Best Offers</h2>";
	   
	        //DB Connection
			include 'Connections/opendb.php';
         
			$limit = 15;  
            if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
            $start_from = ($page-1) * $limit;  
  
            $sql = "SELECT ItemName,ItemId,`Description`, `Size`, Image, Price, Discount, Total,AvalibiltyStatus FROM item_master where CategoryId='".$_GET['CategoryId']."' and AvalibiltyStatus='Y' ORDER BY item_master.ItemId DESC LIMIT ".$start_from.",".$limit;
            $rs_result = mysql_query ($sql); 
			
	       while ($row = mysql_fetch_assoc($rs_result))  {
	      ?>
			
			<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo $row['Image']; ?>" alt=""   />
										<h2>Rs. <?php echo $row['Total']; ?></h2>
										<p><?php echo $row['ItemName']; ?></p>
										<a href="product_details.php?ItemId=<?php echo $row['ItemId']?>&CategoryId=<?php echo $_GET['CategoryId']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Get Deal</a>
									</div>
									<a href="product_details.php?ItemId=<?php echo $row['ItemId']?>&CategoryId=<?php echo $_GET['CategoryId']?>">
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>Rs. <?php echo $row['Total']; ?></h2>
											<p><?php echo $row['ItemName']; ?></p>
											<a href="product_details.php?ItemId=<?php echo $row['ItemId']?>&CategoryId=<?php echo $_GET['CategoryId']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Get Deal</a>
										</div>
									</div></a>
								</div>
								<div class="choose" style="display:none">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
			
          <?php }
		  
		  echo "</div><!--features_items-->";
		  
		  if(!isset($_GET['page']))
		  {
			  $_GET['page']=1;
			
		  }
		
		  $sql = "SELECT COUNT(ItemId) FROM Item_Master where AvalibiltyStatus='Y' and CategoryId='".$_GET['CategoryId']."'";  
          $rs_result = mysql_query($sql);  
          $row= mysql_fetch_row($rs_result);  
          $total_records = $row[0];  
          $total_pages = ceil($total_records / $limit);  
		
          echo "<ul class='pagination'>";  
           
		  if($_GET['page']>1 && $_GET['page']<=$total_pages)
		  {
			echo "<li><a href = 'products.php?page=".($_GET['page'] - 1)."&CategoryId=".$_GET['CategoryId']."'> Prev </a></li>";  
		  }
		  
		  if($_GET['page']<=$total_pages){
		   for ($i=1; $i<=$total_pages; $i++) {  
		     if($i==$_GET['page'])
             echo "<li class='active'><a href='products.php?page=".$i."&CategoryId=".$_GET['CategoryId']."'>".$i."</a></li>";
             else
             echo "<li><a href='products.php?page=".$i."&CategoryId=".$_GET['CategoryId']."'>".$i."</a></li>";			 
            }
		  }	
			
		   if(($_GET['page']!=1 || $_GET['page']>=1) && $_GET['page']<$total_pages)
		  {
			echo "<li class='next'><a href = 'products.php?page=".($_GET['page'] + 1)."&CategoryId=".$_GET['CategoryId']."'> Next </a></li>";  
		  }
          echo "</ul>"; 
		  
		  include '/Connections/closedb.php';
		    
		 }
		  elseif(isset($_GET['PopStoreId']))
	       { 
		     echo "<div class='features_items'>";
			 echo '<h2 class="title text-center">'.$row_Recordset7['DealWebsite'].'</h2>';
	   
	        //DB Connection
			include 'Connections/opendb.php';
         
			$limit = 15;  
            if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
            $start_from = ($page-1) * $limit;  
  
            $sql = "SELECT ItemName,ItemId,`Description`, `Size`, Image, Price, Discount, Total,AvalibiltyStatus,CategoryId FROM item_master where StoreId='".$_GET['PopStoreId']."' and AvalibiltyStatus='Y' ORDER BY item_master.ItemId DESC LIMIT ".$start_from.",".$limit;
            $rs_result = mysql_query ($sql); 
			
	       while ($row = mysql_fetch_assoc($rs_result))  { 
	      ?>
			
			<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo $row['Image']; ?>" alt=""   />
										<h2>Rs. <?php echo $row['Total']; ?></h2>
										<p><?php echo $row['ItemName']; ?></p>
										<a href="product_details.php?ItemId=<?php echo $row['ItemId']?>&CategoryId=<?php echo $row['CategoryId']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Get Deal</a>
									</div>
									<a href="product_details.php?ItemId=<?php echo $row['ItemId']?>&CategoryId=<?php echo $row['CategoryId']?>">
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>Rs. <?php echo $row['Total']; ?></h2>
											<p><?php echo $row['ItemName']; ?></p>
											<a href="product_details.php?ItemId=<?php echo $row['ItemId']?>&CategoryId=<?php echo $row['CategoryId']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Get Deal</a>
										</div>
									</div>
									</a>
								</div>
								<div class="choose" style="display:none">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
			
          <?php } 
		  
		    echo "</div><!--features_items-->";
		  
		  if(!isset($_GET['page']))
		  {
			  $_GET['page']=1;
			
		  }
		
		  $sql = "SELECT COUNT(ItemId) FROM Item_Master where AvalibiltyStatus='Y' and StoreId='".$_GET['PopStoreId']."'";  
          $rs_result = mysql_query($sql);  
          $row= mysql_fetch_row($rs_result);  
          $total_records = $row[0];  
          $total_pages = ceil($total_records / $limit);  
		
          echo "<ul class='pagination'>";  
           
		  if($_GET['page']>1 && $_GET['page']<=$total_pages)
		  {
			echo "<li><a href = 'products.php?page=".($_GET['page'] - 1)."&PopStoreId=".$_GET['PopStoreId']."'> Prev </a></li>";  
		  }
		  
		  if($_GET['page']<=$total_pages){
		   for ($i=1; $i<=$total_pages; $i++) {  
		     if($i==$_GET['page'])
             echo "<li class='active'><a href='products.php?page=".$i."&PopStoreId=".$_GET['PopStoreId']."'>".$i."</a></li>";
             else
             echo "<li><a href='products.php?page=".$i."&PopStoreId=".$_GET['PopStoreId']."'>".$i."</a></li>";			 
            }
		  }	
			
		   if(($_GET['page']!=1 || $_GET['page']>=1) && $_GET['page']<$total_pages)
		  {
			echo "<li class='next'><a href = 'products.php?page=".($_GET['page'] + 1)."&PopStoreId=".$_GET['PopStoreId']."'> Next </a></li>";  
		  }
          echo "</ul>"; 
		  
		  include '/Connections/closedb.php';
		    
		  
		 }
		 
		 else
		 { 
		     echo "<div class='features_items'>";
			 echo '<h2 class="title text-center">Latest Offers</h2>';
	   
	        //DB Connection
			include 'Connections/opendb.php';
         
			$limit = 15;  
            if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
            $start_from = ($page-1) * $limit;  
  
            $sql = "SELECT ItemName,ItemId,`Description`, `Size`, Image, Price, Discount, Total,AvalibiltyStatus,CategoryId FROM item_master where AvalibiltyStatus='Y' ORDER BY item_master.ItemId DESC LIMIT ".$start_from.",".$limit;
            $rs_result = mysql_query ($sql); 
			
	       while ($row = mysql_fetch_assoc($rs_result))  { 
	       ?>		   
		   <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo $row['Image']; ?>" alt=""  />
										<h2>Rs. <?php echo $row['Total']; ?></h2>
										<p><?php echo $row['ItemName']; ?></p>
										<a href="product_details.php?ItemId=<?php echo $row['ItemId']?>&CategoryId=<?php echo $row['CategoryId']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Get Deal</a>
									</div>
									<a href="product_details.php?ItemId=<?php echo $row['ItemId']?>&CategoryId=<?php echo $row['CategoryId']?>">
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>Rs. <?php echo $row['Total']; ?></h2>
											<p><?php echo $row['ItemName']; ?></p>
											<a href="product_details.php?ItemId=<?php echo $row['ItemId']?>&CategoryId=<?php echo $row['CategoryId']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Get Deal</a>
										</div>
									</div>
									</a>
								</div>
								<div class="choose" style="display:none">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
           <?php }
		   
		   		echo "</div><!--features_items-->";
		  
		       if(!isset($_GET['page']))
		       {
			    $_GET['page']=1;
			
		       }
		
		      $sql = "SELECT COUNT(ItemId) FROM Item_Master where AvalibiltyStatus='Y'";  
              $rs_result = mysql_query($sql);  
              $row= mysql_fetch_row($rs_result);  
              $total_records = $row[0];  
              $total_pages = ceil($total_records / $limit);  
		
              echo "<ul class='pagination'>";  
           
		      if($_GET['page']>1 && $_GET['page']<=$total_pages)
		      {
			   echo "<li><a href = 'products.php?page=".($_GET['page'] - 1)."'> Prev </a></li>";  
		      }
		  
		     if($_GET['page']<=$total_pages){
		     for ($i=1; $i<=$total_pages; $i++) {  
		     if($i==$_GET['page'])
             echo "<li class='active'><a href='products.php?page=".$i."'>".$i."</a></li>";
             else
             echo "<li><a href='products.php?page=".$i."'>".$i."</a></li>";			 
            }
		   }	
			
		    if(($_GET['page']!=1 || $_GET['page']>=1) && $_GET['page']<$total_pages)
		    {
			 echo "<li class='next'><a href = 'products.php?page=".($_GET['page'] + 1)."'> Next </a></li>";  
			 //echo "<li class='seemore'>Show more</li>";
		    }
            echo "</ul>"; 
		  
		    include '/Connections/closedb.php';
		 }
          
         ?>
					
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

