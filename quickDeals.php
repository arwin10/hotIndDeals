<?php 
    include 'Connections/config.php'; 
	include 'Connections/opendb.php';
?>
<?php
			  
              // Specify the query to execute
              $sql = "select * from Category_Master where ActiveStatus='Y'";
              // Execute query
              $result = mysql_query($sql,$shop);
              // Loop through each records 
			  $i=1;
              while($row = mysql_fetch_array($result))
              {
               $Id=$row['CategoryId'];
               $CategoryName=$row['CategoryName'];
               $Description=$row['Description'];
               $Image=$row['Image'];
			   $MainCategoryNext=$row['MainCategoryName'];
			   if($i<=5)
			   {
            ?>
						
				<li><a href="products.php?CategoryId=<?php echo $Id;?>"><?php echo $CategoryName?></a></li>
																
			<?php
			   }
			   $i=$i+1;
            }
            // Retrieve Number of records returned
            $records = mysql_num_rows($result);
			
            ?>
            <?php
           include 'Connections/closedb.php';
            ?>			