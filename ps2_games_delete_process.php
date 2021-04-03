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
$sql_delete_ps2_games = $connection->prepare("DELETE FROM table_ps2_games WHERE ps2_games_id='$ps2_games_id'");
$sql_delete_ps2_games->execute();
header('location:ps2_games.php');
?>