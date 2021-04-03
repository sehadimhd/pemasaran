<?php
include 'configs/connection.php';
include 'configs/login_session_checker.php';
$page_title = '<i class="fab fa-windows"></i> Update Games';
if($is_login == 1)
{
  
}
else if($is_login == 0)
{
  header('location:services.php');
}
$services_id = $_GET['services_id'];
$sql_read_services = $connection->prepare("SELECT * FROM table_services WHERE services_id = '$services_id'");
$sql_read_services->execute();
$data_read_services = $sql_read_services->fetchAll();
if($is_login == 1 && $services_id!=null && count($data_read_services)>0)
{
  
}
else if($is_login == 0 || $services_id==null || count($data_read_services)<1)
{
  header('location:services.php');
}
foreach($data_read_services as $row_services)
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
  <form action="services_update_process.php?services_id=<?php echo $row_services['services_id'];?>" method="post">
    <div class="form-group">
      <label>Name</label>
      <input class="form-control" type="text" value="<?php echo $row_services['services_name'];?>" name="services_name" required="">
    </div>
    <div class="form-group">
      <label>Customer Name</label>
      <input class="form-control" type="text" value="<?php echo $row_services['services_customer_name'];?>" name="services_customer_name" required="">
    </div>
    <div class="form-group">
      <label>Adress</label>
      <textarea class="ckeditor form-control" name="services_address"><?php echo $row_services['services_address'];?></textarea>
    </div>
    <div class="form-group">
      <label>Description</label>
      <textarea class="ckeditor form-control" name="services_description"><?php echo $row_services['services_description'];?></textarea>
    </div>
    <div class="form-group">
      <label>Cost</label>
      <input class="form-control" type="number" value="<?php echo $row_services['services_cost'];?>" name="services_cost" required="">
    </div>
    <div class="form-group">
      <label>Income</label>
      <input class="form-control" type="number" value="<?php echo $row_services['services_income'];?>" name="services_income" required="">
    </div>
    <div class="form-group">
      <label>Start Date</label>
      <input class="form-control" type="date" value="<?php echo $row_services['services_start_date'];?>" name="services_start_date" required="">
    </div>
    <div class="form-group">
      <label>Estimated Finished Date</label>
      <input class="form-control" type="date" value="<?php echo $row_services['services_estimated_finished_date'];?>" name="services_estimated_finished_date" required="">
    </div>
    <div class="form-group">
      <label>Finished Date</label>
      <input class="form-control" type="date" value="<?php echo $row_services['services_finished_date'];?>" name="services_finished_date" required="">
    </div>
    <div class="form-group">
      <label>Status</label>
      <input class="form-control" type="text" name="services_status" value="<?php echo $row_services['services_status'];?>" required>
    </div>
    <button class="btn btn-primary btn-block" type="submit">Simpan</button>
    <a class="btn btn-danger btn-block" href="services.php">Kembali</a>
  </form>
</div>

</body>
<?php include'object_script.php'?>
<script type="text/javascript">
CKEDITOR.replace
</script>
</html>