<?php
include 'configs/connection.php';
include 'configs/login_session_checker.php';
$page_title = '<i class="fa fa-briefcase"></i> Tambah Jasa';
if($is_login == 1)
{
  
}
else if($is_login == 0)
{
  header('location:softwarekomputer.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Tambah Jasa</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="plugins/ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="plugins/fontawesome/css/all.min.css">
  <!-- <script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script> -->
</head>
<body>

<?php include 'object_navbar.php';?>

<div class="container" style="margin-top: 5rem">
  <form action="jasa_create_process.php" method="post">
    <div class="form-group">
      <label>Nama Jasa</label>
      <input class="form-control" type="text" name="jasa_name" required>
    </div>
    <div class="form-group">
      <label>Deskripsi Jasa</label>
      <textarea id="editor" class="" name="jasa_description"></textarea>
    </div>
    <div class="form-group">
      <label>Biaya Jasa</label>
      <input class="form-control" type="text" name="jasa_cost" required>
    </div>
    <button class="btn btn-primary btn-block" type="submit">Simpan</button>
    <a class="btn btn-danger btn-block" href="jasa.php">Kembali</a>
  </form>
</div>

</body>
<script type="text/javascript" src="plugins/jquery/jquery.js"></script>
<script type="text/javascript" src="plugins/popperjs/popper.js"></script>
<script type="text/javascript" src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="plugins/fontawesome/js/all.min.js"></script>
<script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
ClassicEditor.create(document.querySelector('#editor'));
</script>
</html>