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
$ps2_games_id = $_GET['ps2_games_id'];
$ps2_games_name = $_POST['ps2_games_name'];
$ps2_games_size = $_POST['ps2_games_size'];
$ps2_games_price = $_POST['ps2_games_price'];
$sql_update_ps2_games = $connection->prepare("UPDATE table_ps2_games SET ps2_games_name = '$ps2_games_name', ps2_games_size = '$ps2_games_size', ps2_games_price = '$ps2_games_price' WHERE ps2_games_id='$ps2_games_id'");
$sql_update_ps2_games->execute();
header('location:ps2_games.php');
?>