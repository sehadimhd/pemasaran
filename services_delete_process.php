<?php
include 'configs/connection.php';
include 'configs/login_session_checker.php';
if($is_login == 1)
{
  
}
else if($is_login == 0)
{
  header('location:services.php');
}
$services_id = $_GET['services_id'];
$sql_delete_services = $connection->prepare("DELETE FROM table_services WHERE services_id='$services_id'");
$sql_delete_services->execute();
header('location:services.php');
?>