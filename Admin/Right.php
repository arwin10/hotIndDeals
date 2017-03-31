<?php 
    include '../Connections/config.php'; 
	include '../Connections/opendb.php';
?>
<div id="right-col">
    

    <div class="scroll">
	<b>Add Deals</b>
       <ul class="side">
           <?php

// Specify the query to execute
$sql = "select * from Category_Master where ActiveStatus='Y'";
// Execute query
$result = mysql_query($sql,$shop);
// Loop through each records 
while($row = mysql_fetch_array($result))
{
$Id=$row['CategoryId'];
$CategoryName=$row['CategoryName'];


?>   
     
     <li><a href="Products.php?CategoryId=<?php echo $Id;?>"><?php echo $CategoryName;?></a></li>
    
    <?php
	}
?>
    </ul>
    
  </div>
   
    <ul class="side">
    
    </ul>
   
</div>

 <?php
    include '../Connections/closedb.php';
 ?>	
 