<?php 

//DB Connection

$shop = mysql_pconnect($hostname_shop, $username_shop, $password_shop) or trigger_error(mysql_error(),E_USER_ERROR); 

// Select Database
mysql_select_db($database_shop, $shop);

?>