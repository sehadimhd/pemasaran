<?php
include 'configs/connection.php';
include 'configs/login_session_checker.php';
$page_title = '<i class="fa fa-gamepad"></i> Update Games';
$recent_buy_id = $_GET['recent_buy_id'];
$sql_read_recent_buy = $connection->prepare("SELECT * FROM table_recent_buy WHERE recent_buy_id = '$recent_buy_id'");
$sql_read_recent_buy->execute();
$data_read_recent_buy = $sql_read_recent_buy->fetchAll();
if($is_login == 1 && $recent_buy_id!=null && count($data_read_recent_buy)>0)
{
  
}
else if($is_login == 0 || $recent_buy_id==null || count($data_read_recent_buy)<1)
{
  header('location:recent_buy.php');
}
foreach($data_read_recent_buy as $row_recent_buy)
{
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Update Transaction History</title>
	<?php include'object_head.php'?>
</head>
<body>

<?php include 'object_navbar.php';?>

<div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">
  <form action="recent_buy_update_process.php?recent_buy_id=<?php echo $row_recent_buy['recent_buy_id'];?>" method="post">
    <div class="form-group">
      <label>Name</label>
      <input class="form-control" type="text" value="<?php echo $row_recent_buy['recent_buy_name'];?>" name="recent_buy_name" required="">
    </div>
    <div class="form-group">
      <label>Condition</label>
      <input class="form-control" type="text" value="<?php echo $row_recent_buy['recent_buy_condition'];?>" name="recent_buy_condition" required="">
    </div>
    <div class="form-group">
      <label>Price</label>
      <input class="form-control" type="number" value="<?php echo $row_recent_buy['recent_buy_price'];?>" name="recent_buy_price" required="">
    </div>
    <div class="form-group">
      <label>Amount</label>
      <input class="form-control" type="number" name="recent_buy_amount" value="<?php echo $row_recent_buy['recent_buy_amount'];?>" required>
    </div>
    <div class="form-group">
      <label>Date</label>
      <input class="form-control" type="date" value="<?php echo $row_recent_buy['recent_buy_date'];?>" name="recent_buy_date" required="">
    </div>
    <div class="form-group">
      <label>Source</label>
      <input class="form-control" type="text" value="<?php echo $row_recent_buy['recent_buy_source'];?>" name="recent_buy_source" required="">
    </div>
    <button class="btn btn-primary btn-block" type="submit">Save</button>
    <a class="btn btn-danger btn-block" href="recent_buy.php">Back</a>
  </form>
</div>

</body>
<?php include'object_script.php'?>
<script type="text/javascript">
CKEDITOR.replace
</script>
</html>