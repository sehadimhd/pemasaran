<?php
include 'configs/connection.php';
include 'configs/login_session_checker.php';
if($is_login == 1)
{
}
else if($is_login == 0)
{
  header('location:login.php');
}
$services_id = $_POST['services_id'];
$sql_read_finished_services = $connection->prepare("SELECT * FROM table_services WHERE services_id = '$services_id'");
$sql_read_finished_services->execute();
$data_read_finished_services = $sql_read_finished_services->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	</style>
</head>
<body>
<div class="container">
	<?php
	foreach ($data_read_finished_services as $row_finished_services)
	{
	?>
	<div class="container m-1 p-2">
		<b>Name</b>
		<br>
		<?php echo $row_finished_services['services_name'];?>
	</div>
	<div class="container m-1 p-2">
		<b>Customer Name</b>
		<br>
		<?php echo $row_finished_services['services_customer_name'];?>
	</div>
	<div class="container m-1 p-2">
		<b>Description</b>
		<br>
		<?php echo $row_finished_services['services_description'];?>
	</div>
	<div class="container m-1 p-2">
		<b>Cost</b>
		<br>
		<?php echo $row_finished_services['services_cost'];?>
	</div>
	<div class="container m-1 p-2">
		<b>Income</b>
		<br>
		<?php echo $row_finished_services['services_income'];?>
	</div>
	<div class="container m-1 p-2">
		<b>Total Income</b>
		<br>
		<?php echo ($row_finished_services['services_income']-$row_finished_services['services_cost']);?>
	</div>
	<div class="container m-1 p-2">
		<b>Start Date</b>
		<br>
		<?php echo $row_finished_services['services_start_date'];?>
	</div>
	<div class="container m-1 p-2">
		<b>Estimated Finished Date</b>
		<br>
		<?php echo $row_finished_services['services_estimated_finished_date'];?>
	</div>
	<div class="container m-1 p-2">
		<b>Finished Date</b>
		<br>
		<?php echo $row_finished_services['services_finished_date'];?>
	</div>
	<div class="container m-1 p-2">
		<b>Status</b>
		<br>
		<?php echo $row_finished_services['services_status'];?>
	</div>
	<?php
	}	
	?>
</div>
</body>
</html>