<?php
session_start();
include 'configs/connection.php';
$user_username = $_POST['user_username'];
$user_password = $_POST['user_password'];
$sql_read_user = $connection->prepare("SELECT * FROM tb_user WHERE user_username = '$user_username' AND user_password = '$user_password'");
$sql_read_user->execute();
$data_read_user = $sql_read_user->fetchAll();
if(count($data_read_user)>0)
{
	foreach($data_read_user as $row_user)
	{
		$_SESSION['user_id']= $row_user['user_id'];	
		$_SESSION['user_username'] = $row_user['user_username'];	
		$_SESSION['user_nickname'] = $row_user['user_nickname'];	
		$_SESSION['user_password'] = $row_user['user_password'];	
	}
	$_SESSION['login_message'] = " Welcome " . $_SESSION['user_nickname'];
	header('location:index.php');
}
else
{
	$_SESSION['login_message'] = "Login failed. Username and Password does not match";
	header('location:login.php');
	exit;
}
?>