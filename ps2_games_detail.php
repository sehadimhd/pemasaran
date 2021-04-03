<?php
include 'configs/connection.php';
$ps2_games_id = $_POST['ps2_games_id'];
$sql_read_ps2_games = $connection->prepare("SELECT * FROM table_ps2_games WHERE ps2_games_id = '$ps2_games_id'");
$sql_read_ps2_games->execute();
$data_read_ps2_games = $sql_read_ps2_games->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="container">
	<?php
	foreach ($data_read_ps2_games as $row_ps2_games)
	{
	?>
	<div class="container m-1 p-2">
		<b>Name</b>
		<br>
		<?php echo $row_ps2_games['ps2_games_name'];?>
	</div>
	<div class="container m-1 p-2">
		<b>Size (GB)</b>
		<br>
		<?php echo $row_ps2_games['ps2_games_size'];?>
	</div>
	<div class="container m-1 p-2">
		<b>Price (Rp)</b>
		<br>
		<?php echo $row_ps2_games['ps2_games_price'];?>
	</div>
	<?php
	}	
	?>
</div>
</body>
</html>