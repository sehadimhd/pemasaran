<?php
session_start();
$is_login = 0;
if(isset($_SESSION['user_id']) && isset($_SESSION['user_username']) && isset($_SESSION['user_nickname']) && isset($_SESSION['user_password']))
{
	$user_username = $_SESSION['user_username'];
	$user_password = $_SESSION['user_password'];
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
		$is_login = 1;
	}
	else
	{
		unset($_SESSION['user_id']);
		unset($_SESSION['user_username']);
		unset($_SESSION['user_password']);
		unset($_SESSION['user_nickname']);
	}
}
else
{
	$is_login = 0;
}
?>