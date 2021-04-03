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
$services_name = $_POST['services_name'];
$services_description = $_POST['services_description'];
$services_cost = $_POST['services_cost'];
$services_income = $_POST['services_income'];
$services_customer_name = $_POST['services_customer_name'];
$services_address = $_POST['services_address'];
$services_start_date = $_POST['services_start_date'];
$services_estimated_finished_date = $_POST['services_estimated_finished_date'];
$services_finished_date = $_POST['services_finished_date'];
$services_status = $_POST['services_status'];

$sql_update_services = $connection->prepare("UPDATE table_services SET services_name = '$services_name', services_description = '$services_description', services_cost = '$services_cost', services_income = '$services_income', services_customer_name = '$services_customer_name', services_address = '$services_address', services_start_date = '$services_start_date', services_estimated_finished_date = '$services_estimated_finished_date', services_finished_date = '$services_finished_date', services_status = '$services_status' WHERE services_id='$services_id'");
$sql_update_services->execute();
header('location:services.php');
?>