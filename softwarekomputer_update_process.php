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
$computersoftware_name = $_POST['computersoftware_name'];
$sql_update_computersoftware = $connection->prepare("UPDATE tb_computersoftware SET computersoftware_name='$computersoftware_name' WHERE computersoftware_id='$computersoftware_id'");
$sql_update_computersoftware->execute();
header('location:softwarekomputer.php');
?>