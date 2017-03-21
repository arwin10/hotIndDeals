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


			  // Establish Connection with Database
              $shop = mysql_connect("localhost","root","admin");
              // Select Database
             mysql_select_db("shopping", $shop);
             $query_Recordset3 = sprintf("SELECT ItemName,Itemid,`Description`, `Size`, Image, Price, Discount, Total FROM item_master WHERE CategoryId = %s", GetSQLValueString($colname_Recordset1, "int"));
             $Recordset3= mysql_query($query_Recordset3, $shop) or die(mysql_error());
             $row_Recordset3 = mysql_fetch_assoc($Recordset3);
             $totalRows_Recordset3 = mysql_num_rows($Recordset3);

			mysql_select_db($database_shop, $shop); 
			$query_Recordset4 = "SELECT ItemName,ItemId,`Description`, `Size`, Image, Price, Discount, Total FROM item_master where LatestPrd='Y'";
			$Recordset4 = mysql_query($query_Recordset4, $shop) or die(mysql_error());
			$row_Recordset4 = mysql_fetch_assoc($Recordset4);
			$totalRows_Recordset4 = mysql_num_rows($Recordset4);

         ?>  
 
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
													<h2>Rs.<?php echo $row_Recordset3['Total'];?></h2>
													<p><?php echo $row_Recordset3['ItemName']; ?></p>
													<a href="product_details.php?ItemId=<?php echo $row_Recordset3['ItemId']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Get Deal</a>
												</div>
												
											</div>
										</div>
									</div>
			  
               <?php } while ($row_Recordset3 = mysql_fetch_assoc($Recordset3));
		       }
		       else
		       {  $i=0;
		         do 
	             {  
				   
				if($i<9)
				   {
				?>
             
				
				<div class="col-sm-4">
				   <div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="Products/<?php echo $row_Recordset4['Image']; ?>" alt="" />
								<h2>Rs.<?php echo $row_Recordset4['Total'];?></h2>
								<p><?php echo $row_Recordset4['ItemName']; ?></p>
								<a href="product_details.php?ItemId=<?php echo $row_Recordset4['ItemId']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Get Deal</a>
						    </div>		
						 </div>
					</div>
				</div>
				
           <?php	    
				   } 		
  
				  $i=$i+1;
		        } while ($row_Recordset4 = mysql_fetch_assoc($Recordset4));
		   }
        
           ?>
            <?php
            // Close the connection
            mysql_close($shop);
            ?>			 		   
		   