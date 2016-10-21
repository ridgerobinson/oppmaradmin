<?php

// Connect to MySQL
$db_host = 'localhost';
$db_name = 'oppmar_dev';
$db_user = 'root';
$db_pass = 'reccos01R';

//Database credentials
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PWD", "reccos01R");
define("DB_NAME", "oppmar_dev");
define("MASTER_DB_NAME", "oppmar_dev_master");

// Create MySQLi Object
// $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Create MySQLi Object
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);

// Error Handler
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}
/*=====================*/

define("APP_NAME", "OppMar Web Admin");
define("ROOT_URL","http://".$_SERVER['SERVER_NAME']);
define("ROOT_PATH",dirname(__FILE__));
define("COCONUT_API_KEY","k-15f6a873e7841f1762d1f56d4c7bae91");
define("FTP_SERVER","52.8.108.201");
define("FTP_USER_ID","oppmar");
define("FTP_PWD","%Opp4Market%");
define("DEST_PATH","/apps/dev/public_html/feeds/media/alt/");
define("PUSH_APP_ID","6f45679a-4244-48e3-b011-b942aecf8c9a");
define("PUSH_REST_KEY","ZWM1OGNmMzktM2ZhNy00MzkxLTllYTMtOTE4ODQxY2VkMjE3");
?>