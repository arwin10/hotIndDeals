<?php 
    include '../Connections/config.php'; 
	include '../Connections/opendb.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
$query_Recordset3 = "select * from popular_stores where StoreStatus='Y'";
$Recordset3 = mysql_query($query_Recordset3, $shop) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Dealslooter Admin Management</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
.style9 {font-size: 95%; font-weight: bold; color: #003300; font-family: Verdana, Arial, Helvetica, sans-serif; }
-->
</style>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/jquery.validate.js"></script>
<!--
.style12 {color: #FFFFFF; font-weight: bold; }
-->
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
 $(document).ready(function()
 {  
    $('#txtPrice').keyup(function() {  
    updateTotal();
    });

    $('#txtDiscount').keyup(function() {  
    updateTotal();
   });

  var updateTotal = function () {
  var input1 = parseInt($('#txtPrice').val());
  var input2 = parseInt($('#txtDiscount').val());
  if (isNaN(input1) || isNaN(input2)) {
    $('#txtFinal').val('Both inputs must be numbers');
  } else {          
    $('#txtFinal').val(input1 - input2);
  }
  };
 });
 </script>
</head>
<body>
<div id="wrapper">
  
  <?php
  include "Header.php";
  ?>
  
    <?php
    $Id=$_GET['ItemId'];
    // Specify the query to execute
    $sql = "select * from Item_Master where ItemId=".$Id."";
    // Execute query
    $result = mysql_query($sql,$shop);
    // Loop through each records 
    while($row = mysql_fetch_array($result))
    {
	$cmbCategory=$row['CategoryId'];
	$txtName=$row['ItemName'];
	$txtDesc=$row['Description'];
	$txtSize=$row['Size'];
	
	$txtPrdImgFile=$row['Image'];
	$txtPrdDescfile=$row['PrdDescFile'];
	
	$frdStatus=$row['FeaturedPrd'];
	$LatestStatus=$row['LatestPrd'];
	$PrmStatus=$row['PromotedPrd'];
	$ItemCondition=$row['ItemCondtion'];
	$AvlStatus=$row['AvalibiltyStatus'];
	$QntAvl=$row['QuantityAvailable'];
	$PrdfullDesc=$row['ItemsFullDescription'];
	$Brand=$row['Brand'];
	$Modelno=$row['ModelNo'];
	$Dimension=$row['PrdDimension'];
	
	$DispSize=$row['DisplaySize'];
	$PrdFeatures=$row['PrdFeatures'];
	$PrdReviews=$row['PrdReviews'];
	
	$PostedBy=$row['PostedBy'];
	$ReleaseDate=$row['ReleaseDate'];
	$ReleaseTime=$row['ReleaseTime'];
	$DealDescp=$row['DealDescription'];
	$DealLink=$row['DealLink'];
	$StoreId=$row['StoreId'];
	$StoreName=$row['DealWebsite'];
	
	$txtPrice=$row['Price'];
	$txtDiscount=$row['Discount'];
	$txtFinal=$row['Total'];
	} 
	?>
 
 <div id="content">
   <h2><span style="color:#003300"> Welcome Administrator </span></h2>
   <table width="100%" height="364" border="0" cellpadding="0" cellspacing="0">
    <tr>
    <td height="33" bgcolor="#003300"><span class="style10 style11 style12">Edit Product Details</span></td>
    </tr>

      <tr>
       <td>
	   <form action="UpdateProduct.php?ItemId=<?php echo $Id;?>&CategoryId=<?php echo $cmbCategory;?>" method="post" enctype="multipart/form-data" name="form1" id="form2">
          <table width="100%" border="0">
            
            <tr>
              <td height="40">*Item Name:</td>
              <td><span id="sprytextfield1">
                <label>
                <input type="text" name="txtName" id="txtName" minlength="2" maxlength="100" value="<?php echo $txtName; ?>" required />
                </label>
                <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
            <tr>
              <td height="66">*Description:</td>
              <td><span id="sprytextarea1">
                <label>
                <textarea name="txtDesc" id="txtDesc" cols="35" rows="3" minlength="10" maxlength="3000" required><?php echo $txtDesc; ?></textarea>
                </label>
                <span class="textareaRequiredMsg">A value is required.</span></span></td>
            </tr>
			
            <tr>
              <td>*Upload Image<br>(Max size:20Mb):</br></td>
              <td><label>
                <input type="file" name="txtFile" id="txtFile" required />
              </label><?php echo $txtPrdImgFile; ?></td>
            </tr>
			
			<tr>		
            <td>Upload Product Description <br>File(Max Size 20Mb):</br></td>
              <td><label>
                <input type="file" name="txtPrdFile" id="txtPrdFile" required /> 
              </label><?php echo $txtPrdDescfile; ?></td>  
            </tr>
			
            <tr>
              <td>*Value:</td>
              <td><span id="sprytextfield2">
                <label>
                <input type="text" name="txtSize" id="txtSize" minlength="2" maxlength="20" value="<?php echo $txtSize; ?>" required/>
                </label>
                <span class="textfieldRequiredMsg">A value is required.</span></span>
				</td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			  <tr>
              <td>Featured Product Enable:</td>
              <td><span id="sprytextfield2">
                <select id="txtFrdPrd" name="txtFrdPrd">
                  <?php if($frdStatus=='Y'){?>
                  <option value="Y"selected>Yes</option>
                  <option value="N">No</option>
				<?php }else{?>
				  <option value="Y">Yes</option>
                  <option value="N"selected>No</option>
				<?php }?> 
                  </select>
				</td>
              </tr>
			  
			 <td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			 
			  <tr>
              <td>Latest Product Enable:</td>
              <td><span id="sprytextfield2">
                <select id="txtLatPrd" name="txtLatPrd">
                <?php if($LatestStatus=='Y'){?>
                  <option value="Y"selected>Yes</option>
                  <option value="N">No</option>
				<?php }else{?>
				  <option value="Y">Yes</option>
                  <option value="N"selected>No</option>
				<?php }?> 
                  </select>
				</td>
              </tr>
			  
			 <td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			 
			  <tr>
              <td>Promoted Product Enable:</td>
              <td><span id="sprytextfield2">
                <select id="txtPrmPrd" name="txtPrmPrd">
                  <?php if($PrmStatus=='Y'){?>
                  <option value="Y"selected>Yes</option>
                  <option value="N">No</option>
				<?php }else{?>
				  <option value="Y">Yes</option>
                  <option value="N"selected>No</option>
				<?php }?> 
                  </select>
				</td>
              </tr>
            
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
			<td>Availabilty Status:</td>
              <td><span id="sprytextfield2">
                <select id="txtAvlStatus" name="txtAvlStatus">
                 <?php if($AvlStatus=='Y'){?>
                  <option value="Y"selected>Yes</option>
                  <option value="N">No</option>
				<?php }else{?>
				  <option value="Y">Yes</option>
                  <option value="N"selected>No</option>
				<?php }?> 
                  </select>
				</td>
             </tr>
			 
			 <td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>			 
           
		    <tr>			
			<td>*Item Condition:</td>
              <td><span id="sprytextfield2">
                <label>
                <input name="txtItemCond" id="txtItemCond" maxlength="5" value="<?php echo $ItemCondition;?>"required />
                </label>
                <span class="textfieldRequiredMsg">A value is required.</span></span></td>
				</td>
            </tr> 

            <td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>			 
           
		    <tr>			
			<td>*Quantity Available/Views:</td>
              <td><span id="sprytextfield2">
                <label>
                <input type="digits"  name="txtQntAvl" id="txtQntAvl" maxlength="5" value="<?php echo $QntAvl; ?>" required />
                </label>
                <span class="textfieldRequiredMsg">A numerical value is required.</span></span></td>
				<td></td>
            </tr>
            
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>			
			<td>*Product full Description:</td>
              <td><span id="sprytextfield2">
                <label>
                <textarea name="txtfulldesc" id="txtfulldesc" cols="35" rows="3" minlength="10" maxlength="3000"  required ><?php echo $PrdfullDesc; ?></textarea>
                </label>
                <span class="textfieldRequiredMsg">A value is required.</span></span></td>
				<td></td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
			<td>*Brand:</td>
              <td><span id="sprytextfield2">
                <label>
                <input type="text"  name="txtBrand" id="txtBrand" minlength="2" maxlength="30" value="<?php echo $Brand; ?>" required />
                </label>
                <span class="textfieldRequiredMsg">A value is required.</span></span></td>
				<td></td>
            </tr>
			
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
			<td>*Model no:</td>
              <td><span id="sprytextfield2">
                <label>
                <input type="text"  name="txtModel" id="txtModel" minlength="2" maxlength="30" value="<?php echo $Modelno; ?>" required />
                </label>
                <span class="textfieldRequiredMsg">A value is required.</span></span></td>
				<td></td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
			<td>*Release Date:</td>
              <td><span id="sprytextfield2">
                <label>
                <input type="text"  name="txtRelDate" id="txtRelDate" minlength="2" maxlength="30" value="<?php echo date("Y-m-d");?>" required />
                </label>
				  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
				<td></td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
			<td>*Release Time:</td>
              <td><span id="sprytextfield2">
                <label>
                <input type="text"  name="txtRelTime" id="txtRelTime" minlength="2" maxlength="30" value="<?php echo date("h:i:s");?>"required />
                </label>
				  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
				<td></td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
			<td>*Dimension:</td>
              <td><span id="sprytextfield2">
                <label>
                <input type="text"  name="txtDimension" id="txtDimension" minlength="2" maxlength="30" value="<?php echo $Dimension; ?>" required />
                </label>
				  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
				<td></td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
			<td>*Display Size:</td>
              <td><span id="sprytextfield2">
                <label>
                <input type="text"  name="txtDispSize" id="txtDispSize" minlength="2" maxlength="30" value="<?php echo $DispSize; ?>" required />
				  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </label>
				<td></td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
              <td height="66">*Product Features:</td>
              <td><span id="sprytextarea1">
                <label>
                <textarea name="txtPrdFeatures" id="txtPrdFeatures" cols="35" rows="3" minlength="10" maxlength="3000" required><?php echo $PrdFeatures; ?></textarea>
                </label>
                <span class="textareaRequiredMsg">A value is required.</span></span></td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
              <td height="66">*Product Reviews:</td>
              <td><span id="sprytextarea1">
                <label>
                <textarea name="txtPrdReviews" id="txtPrdReviews" cols="35" rows="3" minlength="10" maxlength="3000" required><?php echo $PrdReviews; ?></textarea>
                </label>
                <span class="textareaRequiredMsg">A value is required.</span></span></td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
              <td height="66">*Deal Description:</td>
              <td><span id="sprytextarea1">
                <label>
                <textarea name="txtDealDescp" id="txtDealDescp" cols="35" rows="3" minlength="10" maxlength="3000" required><?php echo $DealDescp; ?></textarea>
                </label>
                <span class="textareaRequiredMsg">A value is required.</span></span></td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
			<td>*Deal Link:</td>
              <td><span id="sprytextfield2">
                <label>
                <input type="text"  name="txtDealLink" id="txtDealLink" minlength="2" maxlength="300" value="<?php echo $DealLink; ?>" required />
				  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </label>
				<td></td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
			<td>*Deal Website:</td>
             <td><span id="sprytextfield2">
                <select id="txtDealWebsite" name="txtDealWebsite" onchange="document.getElementById('txtStoreName').value=this.options[this.selectedIndex].text">
				    <?php 
				         do {  
                          
						  if(strpos($StoreName,$row_Recordset3['StoreName'])){
							 
				    ?>    
                      <option value="<?php echo $row_Recordset3['StoreId'];?>" selected><?php echo $row_Recordset3['StoreName']; ?></option>           				  
					<?php
				     }
					 else
					 { 
				    ?>
					  <option value="<?php echo $row_Recordset3['StoreId'];?>"><?php echo $row_Recordset3['StoreName']; ?></option>           
				    <?php
					  }
					 } while ($row_Recordset3= mysql_fetch_assoc($Recordset3)); 
					?>
                </select>
				</td>
            </tr>
			<input type="hidden" name="txtStoreName" id="txtStoreName" value="" />
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
			<td>*Deal Posted By:</td>
              <td><span id="sprytextfield2">
                <label>
                <input type="text"  name="txtPostedBy" id="txtPostedBy" minlength="2" maxlength="50" value="<?php echo $PostedBy; ?>" required />
				  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </label>
				<td></td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
              <td>*Price:</td>
              <td><span id="sprytextfield3">
                <label>
                <input type="digits" class="txtPrice" name="txtPrice" id="txtPrice"  maxlength="10" value="<?php echo $txtPrice; ?>" required />
                </label>
                <span class="textfieldRequiredMsg">A numerical value is required.</span></span></td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
            <tr>
              <td>*Discount:</td>
              <td><span id="sprytextfield4">
                <label>
                <input type="digits" class="txtDiscount" name="txtDiscount" id="txtDiscount" maxlength="10" value="<?php echo $txtDiscount; ?>" required />
                </label>
                <span class="textfieldRequiredMsg">A numerical value is required.</span></span></td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
            <tr>
              <td>Final Price:</td>
              <td><span id="sprytextfield5">
                <label>
                <input type="digits" class="txtFinal "name="txtFinal" id="txtFinal" value="<?php echo $txtFinal; ?>" />
                </label>
                <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
            <tr>
              <td>&nbsp;</td>
              <td><label>
                <input type="submit" name="button" id="button" value="Update" />
              </label></td>
            </tr>
          </table>
        </form>
      <script>
	  $("#form2").validate();
	  </script>
     </td>
    </tr>
	 
	 <tr>
     <td height="27" bgcolor="#003300">&nbsp;</td>
     </tr>
     <tr>
     <td>&nbsp;</td>
     </tr>
	 
    </table>
<?php
    include '../Connections/closedb.php';
 ?>	
            

    <p align="justify">&nbsp;</p>
    <h2>&nbsp;</h2>
    <table width="100%" border="0" cellspacing="3" cellpadding="3">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
     <!--  <tr>
        <td><p><img src="img/iphone5s.jpg" alt="box" width="100" height="100" hspace="10" align="left" class="imgleft" title="box" /></p></td>
        <td><p><img src="img/galaxyS7.jpg" alt="box" width="100" height="100" hspace="10" align="left" class="imgleft" title="box" /></p></td>
        <td><p><img src="img/iphone6s.jpg" alt="box" width="100" height="100" hspace="10" align="left" class="imgleft" title="box" /></p></td>
      </tr>
      <tr>
        <td height="26" bgcolor="#BCE0A8"><div align="center" class="style9">Iphone 5s</div></td>
        <td bgcolor="#BCE0A8"><div align="center" class="style9">Galaxy S7</div></td>
        <td bgcolor="#BCE0A8"><div align="center" class="style9">Iphone 6s</div></td>
      </tr>-->
    </table>
    <p>&nbsp;</p>
	<?php
	  include "thumbslider.php";
    ?> 
  </div>
 <?php
 include "Right.php";
 ?>
  <div style="clear:both;"></div>
   <?php
 include "Footer.php";
 ?>
</div>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
//-->
</script>
</body>
</html>
