<?php
include 'configs/connection.php';
include 'configs/login_session_checker.php';
if($is_login == 1)
{
  
}
else if($is_login == 0)
{
  header('location:recent_buy.php');
}
$recent_buy_id = $_GET['recent_buy_id'];
$sql_delete_recent_buy = $connection->prepare("DELETE FROM table_recent_buy WHERE recent_buy_id='$recent_buy_id'");
$sql_delete_recent_buy->execute();
header('location:recent_buy.php');
?>