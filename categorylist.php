<?php
              // Establish Connection with Database
              $con = mysql_connect("localhost","root","admin");
              // Select Database
              mysql_select_db("shopping", $con);
              // Specify the query to execute
              $sql = "select * from Category_Master";
              // Execute query
              $result = mysql_query($sql,$con);
              // Loop through each records 
			 
              while($row = mysql_fetch_array($result))
              {
               $Id=$row['CategoryId'];
               $CategoryName=$row['CategoryName'];
               $Description=$row['Description'];
               $Image=$row['Image'];
			   $MainCategoryNext=$row['MainCategoryName'];
            ?>
			
			        <!--   <div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="products.php?CategoryId=<?php echo $Id;?>" target="_blank">
											<span class="badge pull-right"><i class="fa fa-plus" style="display:none"></i></span>
											<?php echo $CategoryName?>
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse" style="display:none">
									<div class="panel-body">
										<ul>
											<li><a href="#">A</a></li>
											<li><a href="#">B</a></li>
											<li><a href="#">C</a></li>
											<li><a href="#">D</a></li>
											<li><a href="#">E</a></li>
										</ul>
									</div>
								</div>
							</div>	-->
							
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
            // Close the connection
            mysql_close($con);
            ?>			