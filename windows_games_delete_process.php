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
$sql_delete_windows_games = $connection->prepare("DELETE FROM table_windows_games WHERE windows_games_id='$windows_games_id'");
$sql_delete_windows_games->execute();
header('location:windows_games.php');
?>