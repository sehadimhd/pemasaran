<?php 
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "db_pemasaran";
$connection = new PDO(
	"mysql: host=" . $db_host .";
	dbname=" . $db_name . "",
	$db_username, $db_password
);
?>