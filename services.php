<?php
include 'configs/connection.php';
include 'configs/login_session_checker.php';
if($is_login == 1)
{
}
else if($is_login == 0)
{
  header('location:login.php');
}
$page_title = '<i class="fa fa-tools"></i> Services';
$sql_read_finished_services = $connection->prepare("SELECT * FROM table_services WHERE services_status = 'Finished' ORDER BY services_finished_date DESC");
$sql_read_finished_services->execute();
$data_read_finished_services = $sql_read_finished_services->fetchAll();

$sql_read_unfinished_services = $connection->prepare("SELECT * FROM table_services WHERE services_status = 'Unfinished' ORDER BY services_finished_date DESC");
$sql_read_unfinished_services->execute();
$data_read_unfinished_services = $sql_read_unfinished_services->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Services</title>
	<?php include 'object_head.php';?>
</head>
<body class="bg-primary">
<?php include 'object_navbar.php';?>

<!-- Add Services -->
<div class="modal fade" id="modal-add-services" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Services</h5>
        <button type="button text-danger" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="services_create_process.php" method="post">
        <div id="modal-add-windows-games-body" class="modal-body">
          <button type="button" id="btn-add-multiinput-form" class="btn btn-primary"><i class="fa fa-plus"></i> Form</button>
          <p></p>
          <div class="table-responsive">
            <table class="table table-bordered" id="table-multiinput">
              <thead class="bg-primary text-light">
                <th style="border: 2px solid #007BFF;">Multi-Input</th>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Save">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Detail -->
<div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-info-circle"></i> Detail</h5>
        <button type="button text-danger" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modal-detail-body" class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="container bg-white px-auto py-4 mx-auto shadow" style="margin-top: 5rem">
  <div class="btn-group btn-group-sm">
    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add-services"><i class="fa fa-plus"></i> Add Services</button>
  </div>
  <p></p>
  <b>Unfinished Services</b>
  <p></p>
  <table id="table-unfinished-services" class="table table-bordered table-hover table-bordered display nowrap datatables-table-services" style="width: 100%;">
    <thead class="thead-light">
      <tr>
        <th class="text-left" data-sortable="true" data-field="services_id">ID</th>
        <th class="text-left" data-sortable="true" data-field="servies_name">Name</th>
        <th class="text-left" data-sortable="false" data-field="services_customer_name">Customer Name</th>
        <th class="text-right" data-sortable="true" data-field="services_cost">Cost</th>
        <th class="text-right" data-sortable="true" data-field="services_start_date">Start Date</th>
        <th class="text-right" data-sortable="true" data-field="services_estimated_finished_date">Estimate Finished Date</th>
        <th class="text-center"><i class="fa fa-bars"></i></th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach($data_read_unfinished_services as $row_unfinished_services)
        {
        ?>
        <tr>
          <td class="td-services-id text-left"><?php echo $row_unfinished_services['services_id'];?></td>
          <td class="td-services-name text-left"><?php echo $row_unfinished_services['services_name'];?></td>
          <td class="td-services-version text-left"><?php echo $row_unfinished_services['services_customer_name'];?></td>
          <td class="td-services-size text-right"><?php echo $row_unfinished_services['services_cost'];?></td>
          <td class="td-services-price text-right"><?php echo $row_unfinished_services['services_start_date'];?></td>
          <td class="td-services-price text-right"><?php echo $row_unfinished_services['services_estimated_finished_date'];?></td>
          <td class="text-center">
            <div class="btn-group btn-group-sm">
              <button class="btn-unfinished-services-detail btn btn-primary" data-toggle="modal" data-target="#modal-detail" value="<?php echo $row_unfinished_services['services_id']; ?>"><i class="fa fa-info-circle"></i></button>
              <a class="btn btn-primary" href="<?php echo "services_update.php?services_id=".$row_unfinished_services['services_id']; ?>"><i class="fa fa-edit"></i></a>
              <a class="btn btn-danger" href="<?php echo "services_delete_process.php?services_id=".$row_unfinished_services['services_id']; ?>"><i class="fa fa-trash"></i></a>
            </div>
          </td>
        </tr>
        <?php } ?>
    </tbody>
  </table>
</div>
<div class="container bg-white px-auto py-4 mx-auto shadow" style="margin-top: 1rem; margin-bottom: 1rem;">
  <b>Finished Services</b>
  <p></p>
	<table id="table-finished-services" class="table table-bordered table-hover display nowrap datatables-table-services" style="width: 100%;">
		<thead class="thead-light">
			<tr>
        <th class="text-left" data-sortable="true" data-field="services_id">ID</th>
        <th class="text-left" data-sortable="true" data-field="servies_name">Name</th>
        <th class="text-left" data-sortable="false" data-field="services_customer_name">Customer Name</th>
        <th class="text-right" data-sortable="true" data-field="services_cost">Cost</th>
        <th class="text-right" data-sortable="true" data-field="services_income">Income</th>
        <th class="text-right" data-sortable="true" data-field="services_finished_date">Finished Date</th>
        <th class="text-center"><i class="fa fa-bars"></i></th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach($data_read_finished_services as $row_finished_services)
				{
				?>
				<tr>
          <td class="td-services-id text-left"><?php echo $row_finished_services['services_id'];?></td>
					<td class="td-services-name text-left"><?php echo $row_finished_services['services_name'];?></td>
          <td class="td-services-version text-left"><?php echo $row_finished_services['services_customer_name'];?></td>
          <td class="td-services-size text-right"><?php echo $row_finished_services['services_cost'];?></td>
          <td class="td-services-price text-right"><?php echo $row_finished_services['services_income'];?></td>
          <td class="td-services-price text-right"><?php echo $row_finished_services['services_finished_date'];?></td>
          <td class="text-center">
            <div class="btn-group btn-group-sm">
              <button class="btn-finished-services-detail btn btn-primary" data-toggle="modal" data-target="#modal-detail" value="<?php echo $row_finished_services['services_id']; ?>"><i class="fa fa-info-circle"></i></button>
              <a class="btn btn-primary" href="<?php echo "services_update.php?services_id=".$row_finished_services['services_id']; ?>"><i class="fa fa-edit"></i></a>
              <a class="btn btn-danger" href="<?php echo "services_delete_process.php?services_id=".$row_finished_services['services_id']; ?>"><i class="fa fa-trash"></i></a>
            </div>
          </td>
        </tr>
				<?php } ?>
		</tbody>
	</table>
</div>
</body>
<?php include 'object_script.php'?>
<script type="text/javascript" src="scripts/services.js"></script>
</html>