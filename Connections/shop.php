<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

/***************Prod DB Details ***************************/

//$hostname_shop = "us-cdbr-iron-east-03.cleardb.net";
//$database_shop = "heroku_813d276cc465e94";
//$username_shop = "b1162df0501833";
//$password_shop = "6423989b";

//$shop = mysql_pconnect($hostname_shop, $username_shop, $password_shop) or trigger_error(mysql_error(),E_USER_ERROR); 

/********************Dev DB Details ********************************/
$hostname_shop = "localhost";
$database_shop = "hotinddeals_db";
$username_shop = "root";
$password_shop = "admin";

$shop = mysql_pconnect($hostname_shop, $username_shop, $password_shop) or trigger_error(mysql_error(),E_USER_ERROR); 


//$shop = mysql_connect($hostname_shop, $username_shop, $password_shop);
?>