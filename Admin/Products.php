<?php 
    include '../Connections/config.php'; 
	include '../Connections/opendb.php';
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

mysql_select_db($database_shop, $shop);
$query_Recordset1 = "SELECT CategoryId, CategoryName FROM category_master where CategoryId='".$colname_Recordset2."'";
$Recordset1 = mysql_query($query_Recordset1, $shop) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);


mysql_select_db($database_shop, $shop);
$query_Recordset2 = sprintf("SELECT ItemId, ItemName, `Size`, Image, Price, Discount, Total FROM item_master WHERE CategoryId = %s", GetSQLValueString($colname_Recordset2, "int"));
$Recordset2 = mysql_query($query_Recordset2, $shop) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
  
  <div id="content">
    <h2><span style="color:#003300"> Welcome Administrator </span></h2>
	 <h3><span style="color:#003300"> Add Deals(<?php echo $row_Recordset1['CategoryName']; ?>)</span></h3>
    <table width="100%" height="364" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#003300">&nbsp;</td>
      </tr>
      <tr>
        <td><form action="InsertProduct.php?CategoryId=<?php echo $_GET['CategoryId'];?>" method="post" enctype="multipart/form-data" name="form1" id="form2">
          <table width="100%" height="301" border="0" cellpadding="0" cellspacing="0">
            
            <tr>
              <td height="40">*Item Name:</td>
              <td><span id="sprytextfield1">
                <label>
                <input type="text" name="txtName" id="txtName" minlength="2" maxlength="100" required />
                </label>
                <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
            <tr>
              <td height="66">*Description:</td>
              <td><span id="sprytextarea1">
                <label>
                <textarea name="txtDesc" id="txtDesc" cols="35" rows="3" minlength="10" maxlength="3000" required></textarea>
                </label>
                <span class="textareaRequiredMsg">A value is required.</span></span></td>
            </tr>
            <tr>
              <td>*Upload Image<br>(Max size:20Mb):</br></td>
              <td><label>
                <input type="file" name="txtFile" id="txtFile" required />
              </label></td>
            </tr>
			<tr>
            <td>Upload Product Description <br>File(Max Size 20Mb):</br></td>
              <td><label>
                <input type="file" name="txtPrdFile" id="txtPrdFile" required /> 
              </label></td>
            </tr>
            <tr>
              <td>*Value:</td>
              <td><span id="sprytextfield2">
                <label>
                <input type="text" name="txtSize" id="txtSize" minlength="2" maxlength="20" required/>
                </label>
                <span class="textfieldRequiredMsg">A value is required.</span></span>
				</td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			  <tr>
              <td>Featured Product Enable:</td>
              <td><span id="sprytextfield2">
                <select id="txtFrdPrd" name="txtFrdPrd">
                  <option value="Y">Yes</option>
                  <option value="N" selected>No</option>
                  </select>
				</td>
              </tr>
			  
			 <td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			 
			  <tr>
              <td>Latest Product Enable:</td>
              <td><span id="sprytextfield2">
                <select id="txtLatPrd" name="txtLatPrd">
                  <option value="Y" selected>Yes</option>
                  <option value="N">No</option>
                  </select>
				</td>
              </tr>
			  
			 <td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			 
			  <tr>
              <td>Promoted Product Enable:</td>
              <td><span id="sprytextfield2">
                <select id="txtPrmPrd" name="txtPrmPrd">
                  <option value="Y">Yes</option>
                  <option value="N" selected>No</option>
                  </select>
				</td>
              </tr>
            
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
			<td>Availabilty Status:</td>
              <td><span id="sprytextfield2">
                <select id="txtAvlStatus" name="txtAvlStatus">
                  <option value="Y"selected>Yes</option>
                  <option value="N">No</option>
                  </select>
				</td>
             </tr>

            <td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>			 
           
		    <tr>			
			<td>*Quantity Available:</td>
              <td><span id="sprytextfield2">
                <label>
                <input type="digits"  name="txtQntAvl" id="txtQntAvl" maxlength="5" required />
                </label>
                <span class="textfieldRequiredMsg">A numerical value is required.</span></span></td>
				</td>
            </tr>
            
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>			
			<td>*Product full Description:</td>
              <td><span id="sprytextfield2">
                <label>
                <textarea name="txtfulldesc" id="txtfulldesc" cols="35" rows="3" minlength="10" maxlength="3000" required ></textarea>
                </label>
                <span class="textfieldRequiredMsg">A value is required.</span></span></td>
				</td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
			<td>*Brand:</td>
              <td><span id="sprytextfield2">
                <label>
                <input type="text"  name="txtBrand" id="txtBrand" minlength="2" maxlength="30" required />
                </label>
                <span class="textfieldRequiredMsg">A value is required.</span></span></td>
				</td>
            </tr>
			
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
			<td>*Model no:</td>
              <td><span id="sprytextfield2">
                <label>
                <input type="text"  name="txtModel" id="txtModel" minlength="2" maxlength="30" required />
                </label>
                <span class="textfieldRequiredMsg">A value is required.</span></span></td>
				</td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
			<td>*Release Date:</td>
              <td><span id="sprytextfield2">
                <label>
                <input type="text"  name="txtRelDate" id="txtRelDate" minlength="2" maxlength="30" value="<?php echo date("Y-m-d");?>"required />
                </label>
				  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
				</td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
			<td>*Release Time:</td>
              <td><span id="sprytextfield2">
                <label>
                <input type="text"  name="txtRelTime" id="txtRelTime" minlength="2" maxlength="30" value="<?php echo date("h:i:s");?>"required />
                </label>
				  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
				</td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
			<td>*Dimension:</td>
              <td><span id="sprytextfield2">
                <label>
                <input type="text"  name="txtDimension" id="txtDimension" minlength="2" maxlength="30" required />
                </label>
				  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
				</td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
			<td>*Display Size:</td>
              <td><span id="sprytextfield2">
                <label>
                <input type="text"  name="txtDispSize" id="txtDispSize" minlength="2" maxlength="30" required />
				  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </label>
				</td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
              <td height="66">*Product Features:</td>
              <td><span id="sprytextarea1">
                <label>
                <textarea name="txtPrdFeatures" id="txtPrdFeatures" cols="35" rows="3" minlength="10" maxlength="3000" required></textarea>
                </label>
                <span class="textareaRequiredMsg">A value is required.</span></span></td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
              <td height="66">*Product Reviews:</td>
              <td><span id="sprytextarea1">
                <label>
                <textarea name="txtPrdReviews" id="txtPrdReviews" cols="35" rows="3" minlength="10" maxlength="3000" required></textarea>
                </label>
                <span class="textareaRequiredMsg">A value is required.</span></span></td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
              <td height="66">*Deal Description:</td>
              <td><span id="sprytextarea1">
                <label>
                <textarea name="txtDealDescp" id="txtDealDescp" cols="35" rows="3" minlength="10" maxlength="3000" required></textarea>
                </label>
                <span class="textareaRequiredMsg">A value is required.</span></span></td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
			<td>*Deal Link:</td>
              <td><span id="sprytextfield2">
                <label>
                <input type="text"  name="txtDealLink" id="txtDealLink" minlength="2" maxlength="300" required />
				  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </label>
				</td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
			<td>*Deal Website:</td>
              <td><span id="sprytextfield2">
                <label>
                <input type="text"  name="txtDealWebsite" id="txtDealWebsite" minlength="2" maxlength="100" required />
				  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </label>
				</td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
			<td>*Deal Posted By:</td>
              <td><span id="sprytextfield2">
                <label>
                <input type="text"  name="txtPostedBy" id="txtPostedBy" minlength="2" maxlength="50" required />
				  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </label>
				</td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
			<tr>
              <td>*Price:</td>
              <td><span id="sprytextfield3">
                <label>
                <input type="digits" class="txtPrice" name="txtPrice" id="txtPrice"  maxlength="10" required />
                </label>
                <span class="textfieldRequiredMsg">A numerical value is required.</span></span></td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
            <tr>
              <td>*Discount:</td>
              <td><span id="sprytextfield4">
                <label>
                <input type="digits" class="txtDiscount" name="txtDiscount" id="txtDiscount" maxlength="10" required />
                </label>
                <span class="textfieldRequiredMsg">A numerical value is required.</span></span></td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
            <tr>
              <td>Final Price:</td>
              <td><span id="sprytextfield5">
                <label>
                <input type="digits" class="txtFinal "name="txtFinal" id="txtFinal" readonly/>
                </label>
                <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            </tr>
			
			<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
			
            <tr>
              <td>&nbsp;</td>
              <td><label>
                <input type="submit" name="button" id="button" value="Submit" />
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
        <td>&nbsp;
          <table width="100%" border="1" cellpadding="2" cellspacing="2" bordercolor="#003300">
            <tr>
              <td bgcolor="#669900"><span class="style12">ItemId</span></td>
              <td bgcolor="#669900"><span class="style12">ItemName</span></td>
              <td bgcolor="#669900"><span class="style12">Size</span></td>
              <td bgcolor="#669900"><span class="style12">Image</span></td>
              <td bgcolor="#669900"><span class="style12">Price</span></td>
              <td bgcolor="#669900"><span class="style12">Discount</span></td>
              <td bgcolor="#669900"><span class="style12">Total</span></td>
            </tr>
            <?php do { ?>
              <tr>
                <td><?php echo $row_Recordset2['ItemId']; ?></td>
                <td><?php echo $row_Recordset2['ItemName']; ?></td>
                <td><?php echo $row_Recordset2['Size']; ?></td>
                <td><img src="../Products/<?php echo $row_Recordset2['Image']; ?>" height="125px" width="125px"/></td>
                <td><?php echo $row_Recordset2['Price']; ?></td>
                <td><?php echo $row_Recordset2['Discount']; ?></td>
                <td><?php echo $row_Recordset2['Total']; ?></td>
              </tr>
              <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
          </table></td>
      </tr>
    </table>
    <p align="justify">&nbsp;</p>
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
      include '../Connections/closedb.php';
     ?>
	
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
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
