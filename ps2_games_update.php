<?php
include 'configs/connection.php';
include 'configs/login_session_checker.php';
$page_title = '<i class="fa fa-gamepad"></i> Update Games';
$ps2_games_id = $_GET['ps2_games_id'];
$sql_read_ps2_games = $connection->prepare("SELECT * FROM table_ps2_games WHERE ps2_games_id = '$ps2_games_id'");
$sql_read_ps2_games->execute();
$data_read_ps2_games = $sql_read_ps2_games->fetchAll();
if($is_login == 1 && $ps2_games_id!=null && count($data_read_ps2_games)>0)
{
  
}
else if($is_login == 0 || $ps2_games_id==null || count($data_read_ps2_games)<1)
{
  header('location:ps2_games.php');
}
foreach($data_read_ps2_games as $row_ps2_games)
{
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ubah Permainan</title>
	<?php include'object_head.php'?>
</head>
<body>

<?php include 'object_navbar.php';?>

<div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">
  <form action="ps2_games_update_process.php?ps2_games_id=<?php echo $row_ps2_games['ps2_games_id'];?>" method="post">
    <div class="form-group">
      <label>Name</label>
      <input class="form-control" type="text" value="<?php echo $row_ps2_games['ps2_games_name'];?>" name="ps2_games_name" required="">
    </div>
    <div class="form-group">
      <label>Size (MB)</label>
      <input class="form-control" type="number" value="<?php echo $row_ps2_games['ps2_games_size'];?>" name="ps2_games_size" required="">
    </div>
    <div class="form-group">
      <label>Price</label>
      <input class="form-control" type="number" name="ps2_games_price" value="<?php echo $row_ps2_games['ps2_games_price'];?>" required>
    </div>
    <button class="btn btn-primary btn-block" type="submit">Simpan</button>
    <a class="btn btn-danger btn-block" href="ps2_games.php">Kembali</a>
  </form>
</div>

</body>
<?php include'object_script.php'?>
<script type="text/javascript">
CKEDITOR.replace
</script>
</html>