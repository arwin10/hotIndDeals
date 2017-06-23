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

             $query_Recordset3 = sprintf("SELECT ItemName,Itemid,`Description`, `Size`, Image, Price, Discount, Total,DealWebsite FROM item_master WHERE CategoryId = %s and AvalibiltyStatus='Y'", GetSQLValueString($colname_Recordset1, "int"));
             $Recordset3= mysql_query($query_Recordset3, $shop) or die(mysql_error());
             $row_Recordset3 = mysql_fetch_assoc($Recordset3);
             $totalRows_Recordset3 = mysql_num_rows($Recordset3);

	
			$query_Recordset4 = "SELECT ItemName,ItemId,`Description`, `Size`, Image, Price, Discount,Total,DealWebsite FROM item_master where LatestPrd='Y' and AvalibiltyStatus='Y'";
			$Recordset4 = mysql_query($query_Recordset4, $shop) or die(mysql_error());
			$row_Recordset4 = mysql_fetch_assoc($Recordset4);
			$totalRows_Recordset4 = mysql_num_rows($Recordset4);

         ?>  
 
 <?php
	          if(isset($_GET['CategoryId']))
	          { 
		  
		          $counter=1;
		          $deal_start=1;
				  $deal_end=1;
				  
				  $disp_counter=0;
			
			     if(($totalRows_Recordset3%3)==0)
			     {$disp_counter=$totalRows_Recordset3;}
		         else if(($totalRows_Recordset3%3)==1)
			     {$disp_counter=$totalRows_Recordset3-1;	}
		         else
			    {$disp_counter=$totalRows_Recordset3-2;}
				  
		         do 
	             {  
					if($counter<=$disp_counter)
			        { 
					   if($counter==1){ echo '<div class="item active">';}
					  
					    if(($deal_start+3)==$counter){ echo '<div class="item">';
						  $deal_start=$counter;
						  $deal_end=$deal_start+2;		
						}
					 
	          ?>
				
				<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="Products/<?php echo $row_Recordset3['Image']; ?>" alt="" />
													<h2>Rs.<?php echo $row_Recordset3['Total'];?></h2>
													<p><?php echo $row_Recordset3['ItemName']; ?></p></br>
													<p><b><?php echo $row_Recordset3['DealWebsite']; ?></b></p>
													<a href="product_details.php?ItemId=<?php echo $row_Recordset3['ItemId']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Get Deal</a>
												</div>
												
												 <div class="product-overlay">
										          <div class="overlay-content">
											       <h2>Rs.<?php echo $row_Recordset3['Total'];?></h2>
											       <p><?php echo $row_Recordset3['ItemName']; ?></p>
											       <p><b><?php echo $row_Recordset3['DealWebsite']; ?></b></p>
											       <a href="product_details.php?ItemId=<?php echo $row_Recordset4['ItemId']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Get Deal</a>
										          </div>
							                     </div>
												
											</div>
										</div>
									</div>
			  
                <?php 
			        if ($counter==3){ echo '</div>';  
					}
				       if ($deal_end==$counter && $counter!=1){ echo '</div>'; 
					   }     
				   $counter=$counter+1;
				  }
				 }while ($row_Recordset3 = mysql_fetch_assoc($Recordset3));
		       }
		       else
		       {  $counter=1;
		          $deal_start=1;
				  $deal_end=1;
				  
				  $disp_counter=0;
			
			     if(($totalRows_Recordset4%3)==0)
			     {$disp_counter=$totalRows_Recordset4;}
		         else if(($totalRows_Recordset4%3)==1)
			     {$disp_counter=$totalRows_Recordset4-1;	}
		         else
			     {$disp_counter=$totalRows_Recordset4-2;}
				  
		         do 
	             {  
					if($counter<=$disp_counter)
			        { 
					   if($counter==1){ echo '<div class="item active">';}
					  
					    if(($deal_start+3)==$counter){ echo '<div class="item">';
						  $deal_start=$counter;
						  $deal_end=$deal_start+2;		
						}
					
					  
				?>
                
				
				<div class="col-sm-4">
				   <div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="Products/<?php echo $row_Recordset4['Image']; ?>" alt="" />
								<h2>Rs.<?php echo $row_Recordset4['Total']?></h2>
								<p><?php echo $row_Recordset4['ItemName']; ?></p>
								<p><b><?php echo $row_Recordset4['DealWebsite']; ?></b></p>
								<a href="product_details.php?ItemId=<?php echo $row_Recordset4['ItemId']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Get Deal</a>
						    </div>
                            <div class="product-overlay">
										<div class="overlay-content">
											<h2>Rs.<?php echo $row_Recordset4['Total'];?></h2>
											<p><?php echo $row_Recordset4['ItemName']; ?></p>
											<p><b><?php echo $row_Recordset4['DealWebsite']; ?></b></p>
											<a href="product_details.php?ItemId=<?php echo $row_Recordset4['ItemId']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Get Deal</a>
										</div>
							</div>
							
						 </div>
					</div>
				</div>
				
              <?php	    
				    if ($counter==3){ echo '</div>';  
					}
				       if ($deal_end==$counter && $counter!=1){ echo '</div>'; 
					   }     
				  $counter=$counter+1;
				}
		       } while ($row_Recordset4 = mysql_fetch_assoc($Recordset4));
		   }
        
           ?>
            <?php
            include 'Connections/closedb.php';
            ?>			 		   
		   