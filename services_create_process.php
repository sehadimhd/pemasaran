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
$rows = count($services_name);
for($i=0; $i<$rows; $i++)
{
	$each_services_name = $services_name[$i];
	$each_services_description = $services_description[$i];
	$each_services_cost = $services_cost[$i];
	$each_services_income = $services_income[$i];
	$each_services_customer_name = $services_customer_name[$i];
	$each_services_address = $services_address[$i];
	$each_services_start_date = $services_start_date[$i];
	$each_services_estimated_finished_date = $services_estimated_finished_date[$i];
	$each_services_finished_date = $services_finished_date[$i];
	$each_services_status = $services_status[$i];
	$sql_create_services = $connection->prepare("INSERT INTO table_services 
	(services_name, services_description,  services_cost, services_income, services_customer_name, services_address, services_start_date, services_estimated_finished_date, services_finished_date, services_status)
	VALUES
	('$each_services_name', '$each_services_description', '$each_services_cost', '$each_services_income',  '$each_services_customer_name',  '$each_services_address',  '$each_services_start_date',  '$each_services_estimated_finished_date',  '$each_services_finished_date',  '$each_services_status')");
	$sql_create_services->execute();	
}

header('location:services.php');
?>