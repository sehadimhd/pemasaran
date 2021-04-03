<?php
include 'configs/connection.php';
include 'configs/login_session_checker.php';
$page_title = '<i class="fab fa-windows"></i> Detail Aplikasi';
$software_id = $_GET['software_id'];
$sql_read_software = $connection->prepare("SELECT * FROM tb_software WHERE software_id = '$software_id'");
$sql_read_software->execute();
$data_read_software = $sql_read_software->fetchAll();
foreach($data_read_software as $row_software)
{
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Detail Aplikasi Komputer</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="plugins/fontawesome/css/all.min.css">
</head>
<body>

<?php include 'object_navbar.php';?>

<div class="container" style="margin-top: 5rem">
  <a class="btn btn-danger" href="softwarekomputer.php"><i class="fa fa-angle-left"></i> Kembali</a>
  <p></p>
  <h5><b>Nama Aplikasi <i class="fab fa-windows"></i></b></h5>
  <?php echo $row_software['software_name'];?>
  <p></p>
  <h5><b>Keterangan Aplikasi</b></h5>
  <?php echo nl2br($row_software['software_description']);?>
</div>

</body>
<script type="text/javascript" src="plugins/jquery/jquery.js"></script>
<script type="text/javascript" src="plugins/popperjs/popper.js"></script>
<script type="text/javascript" src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="plugins/fontawesome/js/all.min.js"></script>
</html>