<?php
include 'configs/connection.php';
include 'configs/login_session_checker.php';
$page_title = '<i class="fab fa-windows"></i> Aplikasi';
$sql_read_software = $connection->prepare("SELECT * FROM tb_computersoftware ORDER BY computersoftware_name ASC");
$sql_read_software->execute();
$data_read_software = $sql_read_software->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Aplikasi Komputer</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="plugins/bootstraptable/dist/bootstrap-table.min.css">
  <link rel="stylesheet" type="text/css" href="plugins/fontawesome/css/all.min.css">
</head>
<body>

<?php include 'object_navbar.php';?>

<div class="container" style="margin-top: 5rem">
  <h4><b>Aplikasi Komputer <i class="fab fa-windows"></i></b></h4>
  <p></p>
  <?php
  if($is_login == 1)
  {
  ?>
  <a class="btn btn-primary" href="softwarekomputer_insert.php"><i class="fa fa-plus"></i> Aplikasi</a>
  <p></p>
  <?php
  }
  ?>
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-prepend">
        <button id="btn-searck-software" class="btn btn-primary"><i class="fa fa-search"></i></button>
      </div>
      <input id="txt-search-software" class="form-control" type="text" placeholder="cari aplikasi">
      <div class="input-group-append">
        <button id="btn-clearsearch-software" class="btn btn-danger"><i class="fa fa-eraser"></i></button>
      </div>
    </div>
  </div>
	<div class="table-responsive">
		<table id="tbl-software" class="table table-hover table-bordered" data-toggle="table">
			<thead class="bg-primary text-white">
				<tr>
					<th data-sortable="true" data-field="software_name">Nama</th>
          <th></th>
				</tr>
			</thead>
			<tbody>
				<?php
  				foreach($data_read_software as $row_computersoftware)
  				{
  				?>
  				<tr>
  					<td><?php echo $row_computersoftware['computersoftware_name'];?></td>
            <?php
            if($is_login == 1)
            {
            ?>
            <td class="text-center">
              <div class="btn-group">
                <a class="btn btn-primary" href="<?php echo "softwarekomputer_update.php?computersoftware_id=".$row_computersoftware['computersoftware_id']; ?>"><i class="fa fa-edit"></i></a>
                <a class="btn btn-danger" href="<?php echo "softwarekomputer_delete_process.php?computersoftware_id=".$row_computersoftware['computersoftware_id']; ?>"><i class="fa fa-trash"></i></a>
              </div>
            </td>
            <?php
            }
            else if($is_login == 0)
            {
            ?>
            <td></td>
            <?php
            }
            ?>
  				</tr>
  				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

</body>
<script type="text/javascript" src="plugins/jquery/jquery.js"></script>
<script type="text/javascript" src="plugins/popperjs/popper.js"></script>
<script type="text/javascript" src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="plugins/bootstraptable/dist/bootstrap-table.min.js"></script>
<script type="text/javascript" src="plugins/fontawesome/js/all.min.js"></script>
<script type="text/javascript">
  $('#btn-clearsearch-software').on('click', function()
  {
   $('#txt-search-software').val("");
   searchsoftware();
  });

  $('#txt-search-software').on('input change', function()
  {
   searchsoftware();
  });

  $('#btn-searck-software').on('click', function()
  {
   searchsoftware();
  });

  function searchsoftware()
  {
    var i;
    var txt_search_software = $('#txt-search-software').val().toUpperCase();
    var tbl_software_rows_count = $('#tbl-software tbody tr').length;
    for (i=0;i<tbl_software_rows_count;i++)
    {

      if ($('#tbl-software tbody tr:eq('+i+')').find('td:eq(0)').text().toUpperCase().indexOf(txt_search_software)>-1)
      {
        $('#tbl-software tbody tr:eq('+i+')').show();
      }
      else
      {
        $('#tbl-software tbody tr:eq('+i+')').hide();
      }
    }
  }
</script>
</html>