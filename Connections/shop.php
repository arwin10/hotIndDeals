<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

//$hostname_shop = parse_url(getenv("CLEARDB_DATABASE_URL"));
//$server = $url["host"];
//$username_shop = $url["user"];
//$password_shop = $url["pass"];
//$database_shop = substr($url["path"], 1);

//$config = array(
//    'host' => $server ,
//    'user' => $username_shop ,
//    'pw' => $password_shop,
//    'db' => $database_shop 
//);

$hostname_shop = "us-cdbr-iron-east-03.cleardb.net";
$database_shop = "heroku_813d276cc465e94";
$username_shop = "b1162df0501833";
$password_shop = "6423989b";

$shop = mysql_pconnect($hostname_shop, $username_shop, $password_shop) or trigger_error(mysql_error(),E_USER_ERROR); 

//$hostname_shop = "localhost";
//$database_shop = "hotinddeals_db";
//$username_shop = "root";
//$password_shop = "admin";
//$shop = mysql_pconnect($hostname_shop, $username_shop, $password_shop) or trigger_error(mysql_error(),E_USER_ERROR); 
?>