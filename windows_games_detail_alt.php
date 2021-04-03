<?php
include 'configs/connection.php';
include 'configs/login_session_checker.php';
$page_title = '<i class="fab fa-windows"></i> Detail Permainan';
$computergame_id = $_GET['computergame_id'];
$sql_read_computergame = $connection->prepare("SELECT * FROM tb_computergame WHERE computergame_id = '$computergame_id'");
$sql_read_computergame->execute();
$data_read_computergame = $sql_read_computergame->fetchAll();
foreach($data_read_computergame as $row_computergame)
{
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Detail Permainan</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="plugins/fontawesome/css/all.min.css">
</head>
<body>

<?php include 'object_navbar.php';?>

<div class="container" style="margin-top: 5rem">
  <a class="btn btn-danger" href="gameskomputer.php"><i class="fa fa-angle-left"></i> Kembali</a>
  <p></p>
  <h5><b>Nama Permainan</b></h5>
  <?php echo $row_computergame['computergame_name'];?>
  <p></p>
  <h5><b>Ukuran Permainan</b></h5>
  <?php echo $row_computergame['computergame_size'];?>
  <p></p>
  <h5><b>Harga Permainan</b></h5>
  <?php echo $row_computergame['computergame_price'];?>
  <p></p>
  <h5><b>Keterangan Permainan</b></h5>
  <?php echo nl2br($row_computergame['computergame_description']);?>
</div>

</body>
<script type="text/javascript" src="plugins/jquery/jquery.js"></script>
<script type="text/javascript" src="plugins/popperjs/popper.js"></script>
<script type="text/javascript" src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="plugins/bootstraptable/dist/bootstrap-table.min.js"></script>
<script type="text/javascript" src="plugins/fontawesome/js/all.min.js"></script>
</html>