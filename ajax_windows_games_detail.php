<?php
include 'configs/connection.php';
$windows_games_id = $_POST['windows_games_id'];
$sql_read_windows_games = $connection->prepare("SELECT * FROM table_windows_games WHERE windows_games_id = '$windows_games_id'");
$sql_read_windows_games->execute();
$data_read_windows_games = $sql_read_windows_games->fetchAll();
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
	foreach ($data_read_windows_games as $row_windows_games)
	{
	?>
	<div class="container m-1 p-2">
		<b>Name</b>
		<br>
		<?php echo $row_windows_games['windows_games_name'];?>
	</div>
	<div class="container m-1 p-2">
		<b>Release Date</b>
		<br>
		<?php echo $row_windows_games['windows_games_date'];?>
	</div>
	<div class="container m-1 p-2">
		<b>Version</b>
		<br>
		<?php echo $row_windows_games['windows_games_version'];?>
	</div>
	<div class="container m-1 p-2">
		<b>Size (MB)</b>
		<br>
		<?php echo $row_windows_games['windows_games_size'];?>
	</div>
	<div class="container m-1 p-2">
		<b>Price (Rp)</b>
		<br>
		<?php echo $row_windows_games['windows_games_price'];?>
	</div>
	<div class="container m-1 p-2">
		<b>Source</b>
		<br>
		<?php echo $row_windows_games['windows_games_source'];?>
	</div>
	<div class="container m-1 p-2">
		<b>Location</b>
		<br>
		<?php echo $row_windows_games['windows_games_location'];?>
	</div>
	<div class="container m-1 p-2">
		<b>Description</b>
		<br>
		<?php echo $row_windows_games['windows_games_description'];?>
	</div>
	<?php
	}	
	?>
</div>
</body>
</html>