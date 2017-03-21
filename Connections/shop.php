<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_shop = "localhost";
$database_shop = "hotinddeals_db";
$username_shop = "root";
$password_shop = "admin";
$shop = mysql_pconnect($hostname_shop, $username_shop, $password_shop) or trigger_error(mysql_error(),E_USER_ERROR); 
?>