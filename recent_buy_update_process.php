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
$user_id = $_SESSION['user_id'];
$recent_buy_id = $_GET['recent_buy_id'];
$recent_buy_name = $_POST['recent_buy_name'];
$recent_buy_condition = $_POST['recent_buy_condition'];
$recent_buy_price = $_POST['recent_buy_price'];
$recent_buy_amount = $_POST['recent_buy_amount'];
$recent_buy_date = $_POST['recent_buy_date'];
$recent_buy_source = $_POST['recent_buy_source'];
$sql_update_recent_buy = $connection->prepare("UPDATE table_recent_buy SET recent_buy_name = '$recent_buy_name', recent_buy_condition = '$recent_buy_condition', recent_buy_price = '$recent_buy_price', recent_buy_amount = '$recent_buy_amount', recent_buy_date = '$recent_buy_date', recent_buy_source = '$recent_buy_source' WHERE recent_buy_id='$recent_buy_id' AND recent_buy_user_id='$user_id'");
$sql_update_recent_buy->execute();
header('location:recent_buy.php');
?>