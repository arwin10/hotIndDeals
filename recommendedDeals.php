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

$colname_Recordset2 = "-1";
if (isset($_GET['CategoryId'])) {
  $colname_Recordset2 = $_GET['CategoryId'];
}

             $query_Recordset3 = sprintf("SELECT ItemName,ItemId,`Description`, `Size`, Image, Price, Discount, Total FROM item_master WHERE CategoryId = %s and AvalibiltyStatus='Y'", GetSQLValueString($colname_Recordset2, "int"));
             $Recordset3= mysql_query($query_Recordset3, $shop) or die(mysql_error());
             $row_Recordset3 = mysql_fetch_assoc($Recordset3);
             $totalRows_Recordset3 = mysql_num_rows($Recordset3);

			$query_Recordset4 = "SELECT ItemName,ItemId,`Description`, `Size`, Image, Price, Discount, Total,AvalibiltyStatus FROM item_master where AvalibiltyStatus='Y'";
			$Recordset4 = mysql_query($query_Recordset4, $shop) or die(mysql_error());
			$row_Recordset4 = mysql_fetch_assoc($Recordset4);
			$totalRows_Recordset4 = mysql_num_rows($Recordset4);

         ?>


<?php    
          
	       if(isset($_GET['CategoryId']))
	       {  $rec_counter=1;
		      $rec_deal_start=1;
		      $rec_deal_end=1;
			  $disp_counter=0;
			
			if(($totalRows_Recordset3%3)==0)
			{$disp_counter=$totalRows_Recordset3;}
		    else if(($totalRows_Recordset3%3)==1)
			{$disp_counter=$totalRows_Recordset3-1;	}
		    else
			{$disp_counter=$totalRows_Recordset3-2;}
			  
	        do 
	        { 
		       if($rec_counter<=$disp_counter)
			    {  
		          if($rec_counter==1){ echo '<div class="item active">';}
					  
					    if(($rec_deal_start+3)==$rec_counter){ echo '<div class="item">';
						  $rec_deal_start=$rec_counter;
						  $rec_deal_end=$rec_deal_start+2;		
						}	      
		   ?>
		    
									
									<div class="col-sm-4">
										<a href="product_details.php?ItemId=<?php echo $row_Recordset3['ItemId']?>">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?php echo $row_Recordset3['Image']; ?>" alt="" />
													<h2>Rs. <?php echo $row_Recordset3['Total']; ?></h2>
													<p><?php echo $row_Recordset3['ItemName']; ?></p>
													<a href="product_details.php?ItemId=<?php echo $row_Recordset3['ItemId']?>"><button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Get Deal</button></a>
												</div>
											</div>
										</div>
										</a>
									</div>
								
			
			
			
             <?php 
		          if ($rec_counter==3)
				  { echo '</div>';  
					}
				  if ($rec_deal_end==$rec_counter && $rec_counter!=1)
				  { echo '</div>'; 
				  }     
				  $rec_counter=$rec_counter+1;
					
			}		
		  } while ($row_Recordset3 = mysql_fetch_assoc($Recordset3));
		 }
		 else
		 { 
	        $rec_counter=1;
		    $rec_deal_start=1;
		    $rec_deal_end=1;
			$disp_counter=0;
			
			if(($totalRows_Recordset4%3)==0)
			{$disp_counter=$totalRows_Recordset4;}
		    else if(($totalRows_Recordset4%3)==1)
			{$disp_counter=$totalRows_Recordset4-1;	}
		    else
			{$disp_counter=$totalRows_Recordset4-2;}
		  do 
	      {  
	          if($rec_counter<=$disp_counter)
			   {
		          if($rec_counter==1){ echo '<div class="item active">';}
					  
					    if(($rec_deal_start+3)==$rec_counter){ echo '<div class="item">';
						  $rec_deal_start=$rec_counter;
						  $rec_deal_end=$rec_deal_start+2;		
						}
			?>         
									<div class="col-sm-4">
									    <a href="product_details.php?ItemId=<?php echo $row_Recordset4['ItemId']?>">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?php echo $row_Recordset4['Image']; ?>" alt="" />
													<h2>Rs. <?php echo $row_Recordset4['Total']; ?></h2>
													<p><?php echo $row_Recordset4['ItemName']; ?></p>
													<a href="product_details.php?ItemId=<?php echo $row_Recordset4['ItemId']?>"><button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Get Deal</button></a>
												</div>
											</div>
										</div>
										</a>
									</div>
           <?php 
		       if ($rec_counter==3){ echo '</div>';  
					}
				    if ($rec_deal_end==$rec_counter && $rec_counter!=1){ echo '</div>'; 
					}     
				    $rec_counter=$rec_counter+1;
			  }
		   } while ($row_Recordset4 = mysql_fetch_assoc($Recordset4) );
		 }
        
         ?>
		 
		  <?php
           include 'Connections/closedb.php';
            ?>			 