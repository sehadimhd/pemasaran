<?php
include 'configs/connection.php';
include 'configs/login_session_checker.php';
if($is_login == 1)
{
  
}
else if($is_login == 0)
{
  header('location:windows_games.php');
}
$windows_games_id = $_GET['windows_games_id'];
$windows_games_name = $_POST['windows_games_name'];
$windows_games_version = $_POST['windows_games_version'];
$windows_games_size = $_POST['windows_games_size'];
$windows_games_date = $_POST['windows_games_date'];
$windows_games_description = $_POST['windows_games_description'];
$windows_games_price = $_POST['windows_games_price'];
$windows_games_hit = $_POST['windows_games_hit'];
$windows_games_source = $_POST['windows_games_source'];
$windows_games_location = $_POST['windows_games_location'];

$sql_update_windows_games = $connection->prepare("UPDATE table_windows_games SET windows_games_name = '$windows_games_name', windows_games_version = '$windows_games_version', windows_games_size = '$windows_games_size', windows_games_date = '$windows_games_date', windows_games_description = '$windows_games_description', windows_games_price = '$windows_games_price', windows_games_hit = '$windows_games_hit', windows_games_source = '$windows_games_source', windows_games_location = '$windows_games_location' WHERE windows_games_id='$windows_games_id'");
$sql_update_windows_games->execute();
header('location:windows_games.php');
?>