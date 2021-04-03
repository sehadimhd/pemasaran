<?php
include 'configs/connection.php';
$windows_games_id = $_POST['windows_games_id'];
$sql_read_windows_games = $connection->prepare("SELECT * FROM table_windows_games WHERE windows_games_id = '$windows_games_id'");
$sql_read_windows_games->execute();
$data_read_windows_games = $sql_read_windows_games->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
foreach ($data_read_windows_games as $row_windows_games)
{
	echo '<div id="atc_windows_games_name">'.$row_windows_games['windows_games_name'].'</div>';
	echo '<div id="atc_windows_games_size">'.$row_windows_games['windows_games_size'].'</div>';
	echo '<div id="atc_windows_games_price">'.$row_windows_games['windows_games_price'].'</div>';
}
?>
</body>
<script type="text/javascript">
	$('#table-cart tbody').append('\
  	<tr>\
  	<td class="td-cart-nama">'+$('#atc_windows_games_name').text()+'</td>\
  	<td class="td-cart-size text-right">'+$('#atc_windows_games_size').text()+'</td>\
  	<td class="text-right td-cart-harga">'+$('#atc_windows_games_price').text()+'</td>\
  	<td class="text-center"><button class="btn-removefromcart btn btn-danger"><i class="fa fa-minus"></i></button></td>\
  	</tr>\
  	');
  	Swal.fire
    ({
      toast: false,
      showConfirmButton: true,
      timerProgressBar: true,
      icon: 'success',
      text: " Added to cart",
      timer: 3000
    });
</script>
</html>