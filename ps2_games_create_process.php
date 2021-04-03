<?php
include 'configs/connection.php';
include 'configs/login_session_checker.php';
if($is_login == 1)
{
  
}
else if($is_login == 0)
{
  header('location:ps2_games.php');
}
$ps2_games_name = $_POST['ps2_games_name'];
$ps2_games_size = $_POST['ps2_games_size'];
$ps2_games_price = $_POST['ps2_games_price'];
$rows = count($ps2_games_name);
for($i=0; $i<$rows; $i++)
{
	$each_ps2_games_name = $ps2_games_name[$i];
	$each_ps2_games_size = $ps2_games_size[$i];
	$each_ps2_games_price = $ps2_games_price[$i];
	$sql_create_ps2_games = $connection->prepare("INSERT INTO table_ps2_games (ps2_games_name, ps2_games_size,  ps2_games_price) VALUES ('$each_ps2_games_name', '$each_ps2_games_size', '$each_ps2_games_price')");
	$sql_create_ps2_games->execute();	
}

header('location:ps2_games.php');
?>