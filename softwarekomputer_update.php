<?php
include 'configs/connection.php';
include 'configs/login_session_checker.php';
$page_title = '<i class="fab fa-windows"></i> Ubah Aplikasi';
if($is_login == 1)
{
  
}
else if($is_login == 0)
{
  header('location:softwarekomputer.php');
}
$computersoftware_id = $_GET['computersoftware_id'];
$sql_read_computersoftware = $connection->prepare("SELECT * FROM tb_computersoftware WHERE computersoftware_id = '$computersoftware_id'");
$sql_read_computersoftware->execute();
$data_read_computersoftware = $sql_read_computersoftware->fetchAll();
foreach($data_read_computersoftware as $row_computersoftware)
{
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ubah Aplikasi Komputer</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="plugins/fontawesome/css/all.min.css">
</head>
<body>

<?php include 'object_navbar.php';?>

<div class="container" style="margin-top: 5rem">
  <form action="softwarekomputer_update_process.php?computersoftware_id=<?php echo $row_computersoftware['computersoftware_id'];?>" method="post">
    <div class="form-group">
      <label>Nama Aplikasi</label>
      <input class="form-control" type="text" value="<?php echo $row_computersoftware['computersoftware_name'];?>" name="computersoftware_name" required="">
    </div>
    <button class="btn btn-primary btn-block" type="submit">Simpan</button>
    <a class="btn btn-danger btn-block" href="softwarekomputer.php">Kembali</a>
  </form>
</div>

</body>
<script type="text/javascript" src="plugins/jquery/jquery.js"></script>
<script type="text/javascript" src="plugins/popperjs/popper.js"></script>
<script type="text/javascript" src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="plugins/fontawesome/js/all.min.js"></script>
</html>