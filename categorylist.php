<?php 
    include 'Connections/config.php'; 
	include 'Connections/opendb.php';

?>
<?php
              // Establish Connection with Database
              //$shop = mysql_connect("localhost","root","admin");
              // Select Database
              //mysql_select_db($database_shop, $shop);
              // Specify the query to execute
              $sql = "select * from Category_Master";
              // Execute query
              $result = mysql_query($sql,$shop);
              // Loop through each records 
			 
              while($row = mysql_fetch_array($result))
              {
               $Id=$row['CategoryId'];
               $CategoryName=$row['CategoryName'];
               $Description=$row['Description'];
               $Image=$row['Image'];
			   $MainCategoryNext=$row['MainCategoryName'];
            ?>
			
			     
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="products.php?CategoryId=<?php echo $Id;?>"><?php echo $CategoryName?></a></h4>
								</div>
							</div>
							
          										
			<?php
            }
            // Retrieve Number of records returned
            $records = mysql_num_rows($result);
			
            ?>
            <?php
           include 'Connections/closedb.php';
            ?>			