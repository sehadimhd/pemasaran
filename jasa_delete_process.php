<?php
include 'configs/connection.php';
include 'configs/login_session_checker.php';
if($is_login == 1)
{
  
}
else if($is_login == 0)
{
  header('location:jasa.php');
}
$jasa_id = $_GET['jasa_id'];
$sql_delete_jasa = $connection->prepare("DELETE FROM tb_jasa WHERE jasa_id='$jasa_id'");
$sql_delete_jasa->execute();
header('location:jasa.php');
?>