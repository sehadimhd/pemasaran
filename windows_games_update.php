<?php
include 'configs/connection.php';
include 'configs/login_session_checker.php';
$page_title = '<i class="fab fa-windows"></i> Update Games';
if($is_login == 1)
{
  
}
else if($is_login == 0)
{
  header('location:windows_games.php');
}
$windows_games_id = $_GET['windows_games_id'];
$sql_read_windows_games = $connection->prepare("SELECT * FROM table_windows_games WHERE windows_games_id = '$windows_games_id'");
$sql_read_windows_games->execute();
$data_read_windows_games = $sql_read_windows_games->fetchAll();
if($is_login == 1 && $windows_games_id!=null && count($data_read_windows_games)>0)
{
  
}
else if($is_login == 0 || $windows_games_id==null || count($data_read_windows_games)<1)
{
  header('location:windows_games.php');
}
foreach($data_read_windows_games as $row_windows_games)
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
  <form action="windows_games_update_process.php?windows_games_id=<?php echo $row_windows_games['windows_games_id'];?>" method="post">
    <div class="form-group">
      <label>Name</label>
      <input class="form-control" type="text" value="<?php echo $row_windows_games['windows_games_name'];?>" name="windows_games_name" required="">
    </div>
    <div class="form-group">
      <label>Version</label>
      <input class="form-control" type="text" value="<?php echo $row_windows_games['windows_games_version'];?>" name="windows_games_version" required="">
    </div>
    <div class="form-group">
      <label>Size (MB)</label>
      <input class="form-control" type="number" value="<?php echo $row_windows_games['windows_games_size'];?>" name="windows_games_size" required="">
    </div>
     <div class="form-group">
      <label>Release Date</label>
      <input class="form-control" type="date" value="<?php echo $row_windows_games['windows_games_date'];?>" name="windows_games_date" required="">
    </div>
    <div class="form-group">
      <label>Description</label>
      <textarea class="ckeditor form-control" name="windows_games_description"><?php echo $row_windows_games['windows_games_description'];?></textarea>
    </div>
    <div class="form-group">
      <label>Price</label>
      <input class="form-control" type="number" name="windows_games_price" value="<?php echo $row_windows_games['windows_games_price'];?>" required>
    </div>
    <div class="form-group">
      <label>Popularity</label>
      <input class="form-control" type="number" name="windows_games_hit" value="<?php echo $row_windows_games['windows_games_hit'];?>" required>
    </div>
    <div class="form-group">
      <label>Source</label>
      <input class="form-control" type="text" name="windows_games_source" value="<?php echo $row_windows_games['windows_games_source'];?>" required>
    </div>
    <div class="form-group">
      <label>Location</label>
      <input class="form-control" type="text" name="windows_games_location" value="<?php echo $row_windows_games['windows_games_location'];?>" required>
    </div>
    <button class="btn btn-primary btn-block" type="submit">Simpan</button>
    <a class="btn btn-danger btn-block" href="windows_games.php">Kembali</a>
  </form>
</div>

</body>
<?php include'object_script.php'?>
<script type="text/javascript">
CKEDITOR.replace
</script>
</html>