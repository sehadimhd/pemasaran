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
$windows_games_name = $_POST['windows_games_name'];
$windows_games_version = $_POST['windows_games_version'];
$windows_games_size = $_POST['windows_games_size'];
$windows_games_date = $_POST['windows_games_date'];
$windows_games_description = $_POST['windows_games_description'];
$windows_games_price = $_POST['windows_games_price'];
$windows_games_hit = $_POST['windows_games_hit'];
$windows_games_source = $_POST['windows_games_source'];
$windows_games_location = $_POST['windows_games_location'];
$rows = count($windows_games_name);
for($i=0; $i<$rows; $i++)
{
	$each_windows_games_name = $windows_games_name[$i];
	$each_windows_games_version = $windows_games_version[$i];
	$each_windows_games_size = $windows_games_size[$i];
	$each_windows_games_date = $windows_games_date[$i];
	$each_windows_games_description = $windows_games_description[$i];
	$each_windows_games_price = $windows_games_price[$i];
	$each_windows_games_hit = $windows_games_hit[$i];
	$each_windows_games_source = $windows_games_source[$i];
	$each_windows_games_location = $windows_games_location[$i];
	if($each_windows_games_price=="auto" || is_string($each_windows_games_price))
	{
		if($each_windows_games_size>=0 && $each_windows_games_size<=1000)
		{
			$each_windows_games_price = 5000;
		}
		else if($each_windows_games_size>1000 && $each_windows_games_size<=10000)
		{
			$each_windows_games_price = 10000;
		}
		else if($each_windows_games_size>10000 && $each_windows_games_size<=15000)
		{
			$each_windows_games_price = 15000;
		}
		else if($each_windows_games_size>15000 && $each_windows_games_size<=20000)
		{
			$each_windows_games_price = 20000;
		}
		else if($each_windows_games_size>20000 && $each_windows_games_size<=25000)
		{
			$each_windows_games_price = 25000;
		}
		else if($each_windows_games_size>25000 && $each_windows_games_size<=30000)
		{
			$each_windows_games_price = 30000;
		}
		else if($each_windows_games_size>30000 && $each_windows_games_size<=35000)
		{
			$each_windows_games_price = 35000;
		}
		else if($each_windows_games_size>35000 && $each_windows_games_size<=40000)
		{
			$each_windows_games_price = 40000;
		}
		else if($each_windows_games_size>40000 && $each_windows_games_size<=45000)
		{
			$each_windows_games_price = 45000;
		}
		else if($each_windows_games_size>45000 && $each_windows_games_size<=50000)
		{
			$each_windows_games_price = 50000;
		}
		else if($each_windows_games_size>50000 && $each_windows_games_size<=55000)
		{
			$each_windows_games_price = 55000;
		}
		else if($each_windows_games_size>55000 && $each_windows_games_size<=60000)
		{
			$each_windows_games_price = 60000;
		}
		else if($each_windows_games_size>60000 && $each_windows_games_size<=65000)
		{
			$each_windows_games_price = 65000;
		}
		else if($each_windows_games_size>65000 && $each_windows_games_size<=70000)
		{
			$each_windows_games_price = 70000;
		}
		else if($each_windows_games_size>70000 && $each_windows_games_size<=75000)
		{
			$each_windows_games_price = 75000;
		}
		else if($each_windows_games_size>75000 && $each_windows_games_size<=80000)
		{
			$each_windows_games_price = 80000;
		}
		else
		{
			$each_windows_games_price = 0;
		}
	}
	else
	{

	}
	$sql_create_windows_games = $connection->prepare("INSERT INTO table_windows_games (windows_games_name, windows_games_version, windows_games_size, windows_games_date, windows_games_description, windows_games_price, windows_games_hit, windows_games_source, windows_games_location) VALUES ('$each_windows_games_name', '$each_windows_games_version', '$each_windows_games_size', '$each_windows_games_date', '$each_windows_games_description', '$each_windows_games_price', '$each_windows_games_hit', '$each_windows_games_source', '$each_windows_games_location')");
	$sql_create_windows_games->execute();	
}

header('location:windows_games.php');
?>