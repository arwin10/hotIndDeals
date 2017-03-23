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
			  
              // Specify the query to execute
              $sql = "select * from popular_stores where StoreStatus='Y'";
              // Execute query
              $result = mysql_query($sql,$shop);
              // Loop through each records 
			 
              while($row = mysql_fetch_array($result))
              {
               $StoreId=$row['StoreId'];
               $StoreName=$row['StoreName'];
               $Offercount=$row['OffersCount'];
            ?>
			
			     
					<li><a href="products.php?PopStoreId=<?php echo $StoreId;?>"> <span class="pull-right">(<?php echo $Offercount;?>)</span><?php echo $StoreName;?></a></li>
							
          										
			<?php
            }
            // Retrieve Number of records returned
            $records = mysql_num_rows($result);
			
            ?>
            <?php
           include 'Connections/closedb.php';
            ?>			