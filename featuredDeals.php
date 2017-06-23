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
}
             
			 $query_Recordset1 = sprintf("SELECT ItemName,ItemId,`Description`, `Size`, Image, Price, Discount, Total,DealWebsite FROM item_master WHERE CategoryId = %s and AvalibiltyStatus='Y'", GetSQLValueString($colname_Recordset1, "int"));
			 $Recordset1 = mysql_query($query_Recordset1, $shop) or die(mysql_error());
			 $row_Recordset1 = mysql_fetch_assoc($Recordset1);
			 $totalRows_Recordset1 = mysql_num_rows($Recordset1);
			 
             $query_Recordset2 = "SELECT ItemName,ItemId,`Description`, `Size`, Image, Price, Discount, Total,DealWebsite FROM item_master where FeaturedPrd='Y' and AvalibiltyStatus='Y'";
             $Recordset2 = mysql_query($query_Recordset2, $shop) or die(mysql_error());
             $row_Recordset2 = mysql_fetch_assoc($Recordset2);
             $totalRows_Recordset2 = mysql_num_rows($Recordset2);

         ?>  
	          <?php
	          if(isset($_GET['CategoryId']))
	          { 
	           $fd_counter=1;
		       $fd_deal_start=1;
			   $fd_deal_end=1; 
			   $disp_counter=0;
			
			     if(($totalRows_Recordset2%3)==0)
			     {$disp_counter=$totalRows_Recordset2;}
		         else if(($totalRows_Recordset2%3)==1)
			     {$disp_counter=$totalRows_Recordset2-1;	}
		         else
			    {$disp_counter=$totalRows_Recordset2-2;}
			   
	           do 
	           {   
			     
				 if($fd_counter<=$disp_counter)
			      {
			        if($fd_counter==1){ echo '<div class="item active">';}
					  
					    if(($fd_deal_start+3)==$fd_counter){ echo '<div class="item">';
						  $fd_deal_start=$fd_counter;
						  $fd_deal_end=$fd_deal_start+2;		
						}
					
			      
			  
			   ?>
			    
			 
				
				<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="Products/<?php echo $row_Recordset1['Image']; ?>" alt="" />
										<h2>Rs.<?php echo $row_Recordset1['Total'];?></h2>
										<p><?php echo $row_Recordset1['ItemName']; ?></p>
										<a href="product_details.php?ItemId=<?php echo $row_Recordset1['ItemId']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Get Deal</a>
									</div>
									
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>Rs.<?php echo $row_Recordset1['Total'];?></h2>
											<p><?php echo $row_Recordset1['ItemName']; ?></p>
											<p><b><?php echo $row_Recordset1['DealWebsite']; ?></b></p>
											<a href="product_details.php?ItemId=<?php echo $row_Recordset1['ItemId']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Get Deal</a>
										</div>
									</div>
									
								</div>
							  <div class="choose" style="display:none">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
			    
               <?php 
			        if ($fd_counter==3){ echo '</div>';  
					}
				    if ($fd_deal_end==$fd_counter && $fd_counter!=1){ echo '</div>'; 
					}     
				    $fd_counter=$fd_counter+1;
			   }	
			  
			   }while($row_Recordset1 = mysql_fetch_assoc($Recordset1));
		       
			  }
			  
		     else
		     { 
		       $fd_counter=1;
		       $fd_deal_start=1;
			   $fd_deal_end=1; 
			   $disp_counter=0;
			
			     if(($totalRows_Recordset2%3)==0)
			     {$disp_counter=$totalRows_Recordset2;}
		         else if(($totalRows_Recordset2%3)==1)
			     {$disp_counter=$totalRows_Recordset2-1;	}
		         else
			    {$disp_counter=$totalRows_Recordset2-2;}
			   
	           do 
	           {   
			     
				 if($fd_counter<=$disp_counter)
			      {
			        if($fd_counter==1){ echo '<div class="item active">';}
					  
					    if(($fd_deal_start+3)==$fd_counter){ echo '<div class="item">';
						  $fd_deal_start=$fd_counter;
						  $fd_deal_end=$fd_deal_start+2;		
						}
					
			      
			 ?>
				
              
				
				<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="Products/<?php echo $row_Recordset2['Image']; ?>" alt="" />
										<h2>Rs.<?php echo $row_Recordset2['Total'];?></h2>
										<p><?php echo $row_Recordset2['ItemName']; ?></p>
										<a href="product_details.php?ItemId=<?php echo $row_Recordset2['ItemId']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Get Deal</a>
									</div>
									
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>Rs.<?php echo $row_Recordset2['Total'];?></h2>
											<p><?php echo $row_Recordset2['ItemName']; ?></p>
											<p><b><?php echo $row_Recordset2['DealWebsite']; ?></b></p>
											<a href="product_details.php?ItemId=<?php echo $row_Recordset2['ItemId']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Get Deal</a>
										</div>
									</div>
									
								</div>
								<div class="choose" style="display:none">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
                				
               <?php 
		            if ($fd_counter==3){ echo '</div>';  
					}
				    if ($fd_deal_end==$fd_counter && $fd_counter!=1){ echo '</div>'; 
					}     
				    $fd_counter=$fd_counter+1;
			   }	
			 } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2));
		   }
        
           ?>
			
			  
			 
           <?php
           include 'Connections/closedb.php';
            ?>			 