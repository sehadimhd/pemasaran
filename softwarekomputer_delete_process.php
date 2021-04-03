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
$computersoftware_id = $_GET['computersoftware_id'];
$sql_delete_computersoftware = $connection->prepare("DELETE FROM tb_computersoftware WHERE computersoftware_id='$computersoftware_id'");
$sql_delete_computersoftware->execute();
header('location:softwarekomputer.php');
?>