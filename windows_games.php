<?php
include 'configs/connection.php';
include 'configs/login_session_checker.php';
$page_title = '<i class="fa fa-gamepad"></i> Windows Games';
$sql_read_windows_games = $connection->prepare("SELECT * FROM table_windows_games ORDER BY windows_games_name ASC");
$sql_read_windows_games->execute();
$data_read_windows_games = $sql_read_windows_games->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Windows Games</title>
	<?php include 'object_head.php';?>
</head>
<body class="bg-primary">

<?php include 'object_navbar.php';?>

<!-- Cart -->
<div class="modal modal fade" id="modal-cart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel"><b><i class="fa fa-shopping-cart"></i> Cart</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Orderer: </label>
          <input id="txt-atas-nama" type="text" class="form-control" value="Anonymous">
        </div>
        <div class="form-group">
          <label>Total Size (MB): </label>
          <input id="txt-total-size" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
          <label>Total Price: </label>
          <input id="txt-total-harga" type="text" class="form-control" disabled>
        </div>
        <div id="table-cart-responsive" class="table-responsive">
          <table class="table" id="table-cart">
            <thead>
              <tr>
                <th data-sortable="true" data-field="games_name">Name</th>
                <th class="text-right" data-sortable="true" data-field="games_size">Size (MB)</th>
                <th class="text-right" data-sortable="true" data-field="games_price">Price (Rp)</th>
                <th colspan="2" id="" class="text-center"><i class="fa fa-bars"></i></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button id="btn-print" type="button" class="btn btn-primary">Print/Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Custom Cart -->
<div class="modal fade" id="modal-custom-cart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-scrollable modal-md">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel"><b><i class="fa fa-cart-plus"></i> Custom Cart</h5></b>
        <button type="button text-danger" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="custom-modal-notification-body" class="modal-body">
        <div class="form-group">
          <label>Name</label>
          <input id="txt-custom-windows_games-name" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Size (MB)</label>
          <input id="txt-custom-windows_games-size" type="number" class="form-control">
        </div>
        <div class="form-group">
          <label>Price</label>
          <input id="txt-custom-windows_games-price" type="number" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn-save-custom-cart-form" class="btn btn-primary" data-dismiss="modal">Add</button>
        <button type="button" id="btn-clear-custom-cart-form" class="btn btn-secondary">Clear</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Table Info -->
<div class="modal fade" id="modal-table-info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-scrollable modal-md">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-info"></i> Table Info</h5>
        <button type="button text-danger" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modal-table-info-body" class="modal-body">
        Loading...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Detail -->
<div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-scrollable modal-xl">
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

<!-- Add Games -->
<div class="modal fade" id="modal-add-windows-games" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Games</h5>
        <button type="button text-danger" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="windows_games_create_process.php" method="post">
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

<!-- Body Container -->
<div class="container bg-white px-auto py-4 mx-auto shadow" style="margin-top: 5rem; margin-bottom: 1rem;">
  <div class="btn-group btn-group-sm">
    <?php if($is_login == 1){ ?>
    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add-windows-games"><i class="fa fa-plus"></i> Games</button>
    <?php } ?>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-custom-cart">
    <i class="fa fa-cart-plus"></i> Custom
    </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-cart">
    <i class="fa fa-shopping-cart"></i> Cart
    </button>
    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-table-info"><i class="fa fa-info"></i> Info</button>
  </div>
  <p></p>
	<table id="table-games" class="table table-hover table-bordered display datatables-table-windows-games" style="width: 100%;">
		<thead class="thead-light">
			<tr>
        <?php if($is_login == 1){ ?>
        <th class="text-left" data-sortable="true" data-field="games_id">ID</th>
        <?php } ?>
        <th class="text-left" data-sortable="true" data-field="games_name">Name</th>
        <th class="text-right" data-sortable="true" data-field="games_size">Size (MB)</th>
        <th class="text-right" data-sortable="true" data-field="games_price">Price (Rp)</th>
        <th class="text-left" data-sortable="false" data-field="games_version">Version</th>
        <th class="text-left" data-sortable="true" data-field="games_source">Source</th>
        <th class="text-left" data-sortable="true" data-field="games_location">Disk</th>
        <th class="text-center"><i class="fa fa-bars"></i></th>
			</tr>
		</thead>
		<tbody>
			<?php
        $windows_games_no = 0;
				foreach($data_read_windows_games as $row_windows_games)
				{
          $temp_windows_games_year = strtotime( $row_windows_games['windows_games_date'] );
          $windows_games_year = date( '(Y)', $temp_windows_games_year );
				?>
				<tr class="tr-table-windows-games">
          <?php if($is_login == 1){ ?>
          <td class="td-windows_games-id text-left"><?php echo $row_windows_games['windows_games_id'];?></td>
          <?php } ?>
					<td class="td-windows_games-name text-left"><?php echo $row_windows_games['windows_games_name'];?> <b><span class="badge badge-primary float-right"><?php echo $windows_games_year;?></span></b></td>
          <td class="td-windows_games-size text-right"><?php echo $row_windows_games['windows_games_size'];?></td>
          <td class="td-windows_games-price text-right"><?php echo $row_windows_games['windows_games_price'];?></td>
          <td class="td-windows_games-version text-left"><?php echo $row_windows_games['windows_games_version'];?></td>
          <td class="td-windows_games-source text-left"><?php echo $row_windows_games['windows_games_source'];?></td>
          <td class="td-windows_games-location text-left"><?php echo $row_windows_games['windows_games_location'];?></td>
          <?php
          if($is_login == 1)
          {
          ?>
          <td class="text-center">
            <div class="btn-group btn-group-sm">
              <button class="btn-addtocart btn btn-primary" value="<?php echo $row_windows_games['windows_games_id']; ?>"><i class="fa fa-cart-plus"></i></button>
              <button class="btn-windows-games-detail btn btn-primary" data-toggle="modal" data-target="#modal-detail" value="<?php echo $row_windows_games['windows_games_id']; ?>"><i class="fa fa-info-circle"></i></button>
              <a class="btn btn-primary" href="<?php echo "windows_games_update.php?windows_games_id=".$row_windows_games['windows_games_id']; ?>"><i class="fa fa-edit"></i></a>
              <a class="btn btn-danger" href="<?php echo "windows_games_delete_process.php?windows_games_id=".$row_windows_games['windows_games_id']; ?>"><i class="fa fa-trash"></i></a>
            </div>
          </td>
          <?php
          }
          else if($is_login == 0)
          {
          ?>
          <td class="text-center">
            <div class="btn-group">
              <button class="btn-addtocart btn btn-primary"><i class="fa fa-cart-plus"></i></button>
              <button class="btn-windows-games-detail btn btn-primary" data-toggle="modal" data-target="#modal-detail" value="<?php echo $row_windows_games['windows_games_id']; ?>"><i class="fa fa-info-circle"></i></button>
            </div>
          </td>
          <?php
          }
          ?>
				</tr>
				<?php } ?>
		</tbody>
	</table>
</div>

</body>
<?php include 'object_script.php'?>
<script type="text/javascript" src="scripts/windows_games.js"></script>
</html>