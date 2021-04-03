<?php
include 'configs/connection.php';
include 'configs/login_session_checker.php';
if($is_login == 1)
{
  
}
else if($is_login == 0)
{
  header('location:softwarekomputer.php');
}
$computersoftware_name = $_POST['computersoftware_name'];
$sql_create_computersoftware = $connection->prepare("INSERT INTO tb_computersoftware (computersoftware_name) VALUES ('$computersoftware_name')");
$sql_create_computersoftware->execute();
header('location:softwarekomputer.php');
?>