<?php
include 'configs/connection.php';
include 'configs/login_session_checker.php';
$page_title = '<i class="fab fa-windows"></i> Permainan';
$sql_read_jasa = $connection->prepare("SELECT * FROM tb_jasa ORDER BY jasa_name ASC");
$sql_read_jasa->execute();
$data_read_jasa = $sql_read_jasa->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Jasa</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="plugins/bootstraptable/dist/bootstrap-table.min.css">
  <link rel="stylesheet" type="text/css" href="plugins/fontawesome/css/all.min.css">
</head>
<body>

<?php include 'object_navbar.php';?>

<div class="container" style="margin-top: 5rem">
  <h4><b>Jasa <i class="fa fa-briefcase"></i></b></h4>
  <p></p>
  <?php
  if($is_login == 1)
  {
  ?>
  <a class="btn btn-primary" href="jasa_create.php"><i class="fa fa-plus"></i> Jasa</a>
  <p></p>
  <?php
  }
  ?>
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-prepend">
        <button id="btn-searck-games" class="btn btn-primary"><i class="fa fa-search"></i></button>
      </div>
      <input id="txt-search-games" class="form-control" type="text" placeholder="cari permainan">
      <div class="input-group-append">
        <button id="btn-clearsearch-games" class="btn btn-danger"><i class="fa fa-eraser"></i></button>
      </div>
    </div>
  </div>
	<div class="table-responsive">
		<table id="tbl-games" class="table table-hover table-bordered" data-toggle="table">
			<thead class="bg-primary text-white">
				<tr>
					<th data-sortable="true" data-field="jasa_name">Nama</th>
          <th class="text-right" data-sortable="true" data-field="jasa_cost">Biaya</th>
          <th class="text-center"><i class="fa fa-bars"></i></th>
				</tr>
			</thead>
			<tbody>
				<?php
  				foreach($data_read_jasa as $row_jasa)
  				{
  				?>
  				<tr>
  					<td><?php echo $row_jasa['jasa_name'];?></td>
            <td class="text-right"><?php echo $row_jasa['jasa_cost'];?></td>
            <?php
            if($is_login == 1)
            {
            ?>
            <td class="text-center">
              <div class="btn-group">
                <a class="btn btn-primary" href="<?php echo "jasa_update.php?jasa_id=".$row_jasa['jasa_id']; ?>"><i class="fa fa-edit"></i></a>
                <a class="btn btn-danger" href="<?php echo "jasa_delete_process.php?jasa_id=".$row_jasa['jasa_id']; ?>"><i class="fa fa-trash"></i></a>
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
  $('#btn-clearsearch-games').on('click', function()
  {
   $('#txt-search-games').val("");
   searchgames();
  });

  $('#txt-search-games').on('input change', function()
  {
   searchgames();
  });

  $('#btn-searck-games').on('click', function()
  {
   searchgames();
  });

  function searchgames()
  {
    var i;
    var txt_search_games = $('#txt-search-games').val().toUpperCase();
    var tbl_games_rows_count = $('#tbl-games tbody tr').length;
    for (i=0;i<tbl_games_rows_count;i++)
    {

      if ($('#tbl-games tbody tr:eq('+i+')').find('td:eq(0)').text().toUpperCase().indexOf(txt_search_games)>-1)
      {
        $('#tbl-games tbody tr:eq('+i+')').show();
      }
      else
      {
        $('#tbl-games tbody tr:eq('+i+')').hide();
      }
    }
  }
</script>
</html>