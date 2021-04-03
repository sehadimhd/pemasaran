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
$recent_buy_name = $_POST['recent_buy_name'];
$recent_buy_condition = $_POST['recent_buy_condition'];
$recent_buy_price = $_POST['recent_buy_price'];
$recent_buy_amount = $_POST['recent_buy_amount'];
$recent_buy_shipping_cost = $_POST['recent_buy_shipping_cost'];
$recent_buy_date = $_POST['recent_buy_date'];
$recent_buy_source = $_POST['recent_buy_source'];
$recent_buy_description = $_POST['recent_buy_description'];
$rows = count($recent_buy_name);
for($i=0; $i<$rows; $i++)
{
	$each_recent_buy_name = $recent_buy_name[$i];
	$each_recent_buy_condition = $recent_buy_condition[$i];
	$each_recent_buy_price = $recent_buy_price[$i];
	$each_recent_buy_amount = $recent_buy_amount[$i];
	$each_recent_buy_shipping_cost = $recent_buy_shipping_cost[$i];
	$each_recent_buy_date = $recent_buy_date[$i];
	$each_recent_buy_source = $recent_buy_source[$i];
	$each_recent_buy_description = $recent_buy_description[$i];
	$sql_create_recent_buy = $connection->prepare("INSERT INTO table_recent_buy (recent_buy_user_id, recent_buy_name, recent_buy_condition, recent_buy_price, recent_buy_amount, recent_buy_shipping_cost, recent_buy_date, recent_buy_source, recent_buy_description) VALUES ('$user_id', '$each_recent_buy_name', '$each_recent_buy_condition', '$each_recent_buy_price', '$each_recent_buy_amount', '$each_recent_buy_shipping_cost', '$each_recent_buy_date','$each_recent_buy_source', '$each_recent_buy_description')");
	$sql_create_recent_buy->execute();	
}

header('location:recent_buy.php');
?>