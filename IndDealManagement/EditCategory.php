<?php 
    include '../Connections/config.php'; 
	include '../Connections/opendb.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>DealsLooter Admin Management</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
.style9 {font-size: 95%; font-weight: bold; color: #003300; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style10 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: small; font-weight: bold; color: #FFFFFF; }
.style11 {color: #192666}
.style8 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: small; font-weight: bold; }
-->
</style>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style12 {color: #FFFFFF}
-->
</style>
</head>
<body>
<div id="wrapper">
  
  <?php
  include "Header.php";
  ?>
  
  <div id="content">
    <h2><span style="color:#003300"> Welcome Administrator </span></h2>
    <table width="100%" height="209" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="33" bgcolor="#003300"><span class="style10 style11 style12">Edit Category Details</span></td>
      </tr>
      <tr>
        <td><?php
$Id=$_GET['CatId'];

// Specify the query to execute
$sql = "select * from Category_Master where CategoryId=".$Id."";
// Execute query
$result = mysql_query($sql,$shop);
// Loop through each records 
while($row = mysql_fetch_array($result))
{
$Id=$row['CategoryId'];
$Name=$row['CategoryName'];
$MainName=$row['MainCategoryName'];
$Description=$row['Description'];
$ActStatus=$row['ActiveStatus'];
}
?>
            <form method="post" action="UpdateCategory.php">
              <table width="100%" border="0">
                <tr>
                  <td height="32"><span class="style8">Category Id:</span></td>
                  <td><span id="sprytextfield1">
                    <label>
                    <input name="txtId" type="text" id="txtId" value="<?php echo $Id;?>" />
                    </label>
                    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </tr>
                <tr>
                  <td height="36"><span class="style8">Category Name:</span></td>
                  <td><span id="sprytextfield2">
                    <label>
                    <input name="txtName" type="text" id="txtName" value="<?php echo $Name;?>" />
                    </label>
                    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </tr>
				<tr>
                  <td height="36"><span class="style8">Main Category Name:</span></td>
                  <td><span id="sprytextfield2">
                    <label>
                    <input name="txtMainName" type="text" id="txtMainName" value="<?php echo $MainName;?>" />
                    </label>
                    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </tr>
                <tr>
                  <td height="36"><span class="style8">Description:</span></td>
                  <td><span id="sprytextfield3">
                    <label>
                    <textarea name="txtDesc" id="txtDesc" cols="45" rows="3" ><?php echo $Description;?></textarea>
                  
                    </label>
                    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </tr>
				  <tr>
			 <td height="36"><span class="style8">Active Status:</span></td>
              <td><span id="sprydropdown1">
                <select id="txtAvlStatus" name="txtAvlStatus">
				<?php if($ActStatus=='Y'){?>
                  <option value="Y"selected>Yes</option>
                  <option value="N">No</option>
				<?php }else{?>
				  <option value="Y">Yes</option>
                  <option value="N"selected>No</option>
				<?php }?> 
                  </select>
				</td>
             </tr> 
				
                <tr>
                  <td></td>
                  <td><input type="submit" name="submit" value="Update Record" /></td>
                </tr>
</table>
            </form>
<?php
    include '../Connections/closedb.php';
 ?>	
            </td>
      </tr>
      <tr>
        <td></td>
      </tr>
    </table>
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
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
//-->
</script>
</body>
</html>
