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
$jasa_name = $_POST['jasa_name'];
$jasa_description = $_POST['jasa_description'];
$jasa_cost = $_POST['jasa_cost'];
$sql_create_jasa = $connection->prepare("INSERT INTO tb_jasa (jasa_name, jasa_description, jasa_cost) VALUES ('$jasa_name', '$jasa_description', '$jasa_cost')");
$sql_create_jasa->execute();
header('location:jasa.php');
?>