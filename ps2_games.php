<?php
include 'configs/connection.php';
include 'configs/login_session_checker.php';
$page_title = '<i class="fa fa-gamepad"></i> PS2 Games';
$sql_read_ps2_games = $connection->prepare("SELECT * FROM table_ps2_games ORDER BY ps2_games_name ASC");
$sql_read_ps2_games->execute();
$data_read_ps2_games = $sql_read_ps2_games->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>PS2 Games</title>
	<?php include 'object_head.php';?>
</head>
<body>

<?php include 'object_navbar.php';?>

<div class="container-fluid fixed-bottom bg-primary text-white text-center" style="user-select: none;">
  <div class="row">
    <div class="col" id="btn-back-to-top">
      <i class="bi bi-caret-up"></i> Scroll Top 
    </div>
    <div class="col" id="btn-scroll-to-bottom">
      <i class="bi bi-caret-down"></i> Scroll Bottom
    </div>
  </div>
</div>

<!-- Cart -->
<div class="modal modal fade" id="modal-cart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel"><b><i class="bi bi-cart4"></i> Cart</b></h5>
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
                <th colspan="2" id="" class="text-center"><i class="bi bi-list"></i></th>
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
  <div class="modal-dialog modal-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel"><b><i class="bi bi-cart-plus"></i> Custom Cart</h5></b>
        <button type="button text-danger" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="custom-modal-notification-body" class="modal-body">
        <div class="form-group">
          <label>Name</label>
          <input id="txt-custom-ps2_games-name" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Size (MB)</label>
          <input id="txt-custom-ps2_games-size" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Price</label>
          <input id="txt-custom-ps2_games-price" type="text" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn-save-custom-cart-form" data-toggle="modal" data-target="#modal-notification" class="btn btn-primary" data-dismiss="modal">Add</button>
        <button type="button" id="btn-clear-custom-cart-form" class="btn btn-secondary">Clear</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Notification -->
<div class="modal fade" id="modal-notification" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-chat-square"></i> Message</h5>
        <button type="button text-danger" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modal-notification-body" class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Detail -->
<div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-info"></i> Detail</h5>
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

<!-- Table Info -->
<div class="modal fade" id="modal-table-info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-info-square"></i> Table Info</h5>
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

<!-- Add Games -->
<div class="modal fade" id="modal-add-windows-games" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Games</h5>
        <button type="button text-danger" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="ps2_games_create_process.php" method="post">
        <div id="modal-add-windows-games-body" class="modal-body">
          <button type="button" id="btn-add-multiinput-form" class="btn btn-primary"><i class="fa fa-plus"></i> Form</button>
          <p></p>
          <div class="table-responsive">
            <table class="table table-bordered" id="table-multiinput" style="border: 2px solid #007BFF;">
              <thead class="bg-primary text-light">
                <th>Multi-Input</th>
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
<div class="container" style="margin-top: 5rem; margin-bottom: 5rem">
  <p></p>
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
    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-table-info"><i class="bi bi-info-square"></i> Info</button>
  </div>
  <p></p>
		<table id="table-ps2-games" class="table display nowrap datatables-table1" style="width: 100%;">
			<thead class="thead-light">
				<tr>
          <?php if($is_login == 1){ ?>
          <th class="text-left" data-sortable="true" data-field="games_id">ID</th>
          <?php } ?>
          <th class="text-left" data-sortable="true" data-field="games_name">Name</th>
          <th class="text-right" data-sortable="true" data-field="games_size">Size (MB)</th>
          <th class="text-right" data-sortable="true" data-field="games_price">Price (Rp)</th>
          <th class="text-center"><i class="bi bi-list"></i></th>
				</tr>
			</thead>
			<tbody>
				<?php
  				foreach($data_read_ps2_games as $row_ps2_games)
  				{
  				?>
  				<tr>
            <?php if($is_login == 1){ ?>
            <td class="td-ps2_games-id text-left"><?php echo $row_ps2_games['ps2_games_id'];?></td>
            <?php } ?>
  					<td class="td-ps2_games-name text-left"><?php echo $row_ps2_games['ps2_games_name'];?></td>
            <td class="td-ps2_games-size text-right"><?php echo $row_ps2_games['ps2_games_size'];?></td>
            <td class="td-ps2_games-price text-right"><?php echo $row_ps2_games['ps2_games_price'];?></td>
            <?php
            if($is_login == 1)
            {
            ?>
            <td class="text-center">
              <div class="btn-group btn-group-sm">
                <button class="btn-addtocart btn btn-primary" data-toggle="modal" data-target="#modal-notification"><i class="bi bi-cart-plus"></i></button>
                <button class="btn-ps2-games-detail btn btn-primary" data-toggle="modal" data-target="#modal-detail" value="<?php echo $row_ps2_games['ps2_games_id']; ?>"><i class="bi bi-info-square"></i></button>
                <a class="btn btn-primary" href="<?php echo "ps2_games_update.php?ps2_games_id=".$row_ps2_games['ps2_games_id']; ?>"><i class="bi bi-pencil-square"></i></a>
                <a class="btn btn-danger" href="<?php echo "ps2_games_delete_process.php?ps2_games_id=".$row_ps2_games['ps2_games_id']; ?>"><i class="bi bi-trash"></i></a>
              </div>
            </td>
            <?php
            }
            else if($is_login == 0)
            {
            ?>
            <td class="text-center">
              <div class="btn-group">
                <button class="btn-addtocart btn btn-primary" data-toggle="modal" data-target="#modal-notification"><i class="bi bi-cart-plus"></i></button>
                <button class="btn-ps2-games-detail btn btn-primary" data-toggle="modal" data-target="#modal-detail" value="<?php echo $row_ps2_games['ps2_games_id']; ?>"><i class="bi bi-info-square"></i></button>
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
</div>

</body>
<?php include'object_script.php'?>
<script type="text/javascript">
  var i=0;
  var global_table_ps2_length = 0;
  var global_array_table_ps2_size = [];
  var global_array_table_ps2_price = [];

  function refresh_global_variable()
  {
    global_table_ps2_length = $('#table-ps2-games tbody tr').length;
    for(i=0; i<global_table_ps2_length; i++)
    {
      global_array_table_ps2_size[i]=parseFloat( $('#table-ps2-games tbody tr:eq('+i+')').find('.td-ps2_games-size').text() );
      global_array_table_ps2_price[i]=parseFloat( $('#table-ps2-games tbody tr:eq('+i+')').find('.td-ps2_games-price').text() );
    }
  }

  function refresh_table_info()
  {
    $('#modal-table-info-body').html(
      '<table class="table">'+
      '<thead><tr><th class="text-center" colspan="2"><b>Table Info</b></th></tr></thead>'+
      '<tbody>'+
      '<tr>'+
      '<td><b>Games Count</b></td>'+
      '<td class="text-right">'+accounting.formatMoney(global_table_ps2_length, "", 0, ".", ",")+' Games '+'</td>'+
      '</tr>'+
      '<tr>'+
      '<tr>'+
      '<td><b>Min Size</b></td>'+
      '<td class="text-right">'+accounting.formatMoney(math.min(global_array_table_ps2_size), "", 0, ".", ",")+' MB '+'</td>'+
      '</tr>'+
      '<tr>'+
      '<td><b>Average Size</b></td>'+
      '<td class="text-right">'+accounting.formatMoney(math.mean(global_array_table_ps2_size), "", 0, ".", ",")+' MB '+'</td>'+
      '</tr>'+
      '<tr>'+
      '<td><b>Max Size</b></td>'+
      '<td class="text-right">'+accounting.formatMoney(math.max(global_array_table_ps2_size), "", 0, ".", ",")+' MB '+'</td>'+
      '</tr>'+
      '<tr>'+
      '<td><b>Total Size</b></td>'+
      '<td class="text-right">'+accounting.formatMoney(math.sum(global_array_table_ps2_size), "", 0, ".", ",")+' MB '+'</td>'+
      '</tr>'+
      '<tr>'+
      '<td><b>Min Price</b></td>'+
      '<td class="text-right">'+accounting.formatMoney(math.min(global_array_table_ps2_price), "Rp ", 0, ".", ",")+'</td>'+
      '</tr>'+
      '<tr>'+
      '<td><b>Average Price</b></td>'+
      '<td class="text-right">'+accounting.formatMoney(math.mean(global_array_table_ps2_price), "Rp ", 0, ".", ",")+'</td>'+
      '</tr>'+
      '<tr>'+
      '<td><b>Max Price</b></td>'+
      '<td class="text-right">'+accounting.formatMoney(math.max(global_array_table_ps2_price), "Rp ", 0, ".", ",")+'</td>'+
      '</tr>'+
      '<tr>'+
      '<td><b>Most Prices</b></td>'+
      '<td class="text-right">'+accounting.formatMoney(math.mode(global_array_table_ps2_price), "Rp ", 0, ".", ",")+'</td>'+
      '</tr>'+
      '<tr>'+
      '<td><b>Total Price</b></td>'+
      '<td class="text-right">'+accounting.formatMoney(math.sum(global_array_table_ps2_price), "Rp ", 0, ".", ",")+'</td>'+
      '</tr>'+
      '</tbody>'+
      '</table>'
    );
  }

  $(document).ready(function()
  {
    refresh_global_variable();
    refresh_table_info();
    refresh_print_preview();
    showprintpreview();
  }
  );

  function refresh_print_preview()
  {
    $('#table-print-preview tbody').html("");
    for(i=0;i<global_table_ps2_length;i++)
    {
      game_name = $('#table-ps2-games tbody tr:eq('+i+')').find('.td-ps2_games-name').text();
      game_size = $('#table-ps2-games tbody tr:eq('+i+')').find('.td-ps2_games-size').text();
      game_price = $('#table-ps2-games tbody tr:eq('+i+')').find('.td-ps2_games-price').text();
      $('#table-print-preview tbody').append('<tr><td class="text-left">'+(i+1)+'</td><td class="text-left">'+game_name+'</td><td class="text-right">'+accounting.formatMoney(game_size, "", 0, ".", ",")+' MB</td><td class="text-right">'+accounting.formatMoney(game_price, "Rp ", 0, ".", ",")+'</td></tr>')
    }
    $('#table-print-preview').DataTable( {
        dom: 'Bfrtip',
        aaSorting: [],
        paging: false,
        buttons: 
        ['copy', 'csv', 'excel', 'pdf', 'print']
    } );
  }

  function showprintpreview()
  {
    var date_today = new Date();
    var date_dd = String(date_today.getDate()).padStart(2, '0');
    var date_mm = String(date_today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var date_yyyy = date_today.getFullYear();
    var date_h = date_today.getHours();
    var date_m = date_today.getMinutes();
    var date_s = date_today.getSeconds();
    date_today = date_yyyy + '' + date_mm + '' + date_dd + ', ' + date_h + '' + date_m + '' + date_s;   
  }  
  

  // Start Input Add Games
  $('#btn-add-multiinput-form').on('click', function()
  {
    $('#table-multiinput tbody').append('\
      <tr style="border-top: solid 1px #007BFF; border-bottom: 4px solid #007BFF;border-left: 2px solid #007BFF;border-right: 2px solid #007BFF;"><td>\
      <div class="form-group row">\
          <label class="col-sm-2"></label>\
          <div class="col-sm-10">\
            <button type="button" class="btn-remove btn btn-danger float-right"><i class="fa fa-times"></i></button>\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Name</label>\
          <div class="col-sm-10">\
            <input class="form-control" type="text" name="ps2_games_name[]" required="">\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Size (MB)</label>\
          <div class="col-sm-10">\
            <input class="form-control" type="number" name="ps2_games_size[]" required="">\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Price</label>\
          <div class="col-sm-10">\
            <input class="form-control" type="number" name="ps2_games_price[]" value="5000" required>\
          </div>\
        </div>\
      </td></tr>\
      ');
    ckeditorized();
  }
  );

  function ckeditorized()
  {
    for(i=0; i<$('#table-multiinput tbody tr').length; i++)
    {
      $('#table-multiinput tbody tr:eq('+i+') .ckeditor').attr('id', 'ckeditor'+i);
      CKEDITOR.replace('ckeditor'+i)
    }
  }

  $(document).on('click', '.btn-remove', function()
  {
    this.closest('tr').remove();
  }
  );
  // End Input Add Games

  $(window).on('scroll', function()
  {
    var page_ps2_games_lastscroll_x = window.scrollX;
    var page_ps2_games_lastscroll_y = window.scrollY;
    sessionStorage.setItem('page_ps2_games_lastscroll_x', page_ps2_games_lastscroll_x);
    sessionStorage.setItem('page_ps2_games_lastscroll_y', page_ps2_games_lastscroll_y);
  });

  $('#btn-back-to-top').on('click', function()
  {
   window.scrollTo(1, 1);
  });

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
    var global_table_ps2_length = $('#table-ps2-games tbody tr').length;
    for (i=0;i<global_table_ps2_length;i++)
    {

      if ($('#table-ps2-games tbody tr:eq('+i+')').find('td:eq(0)').text().toUpperCase().indexOf(txt_search_games)>-1)
      {
        $('#table-ps2-games tbody tr:eq('+i+')').show();
      }
      else
      {
        $('#table-ps2-games tbody tr:eq('+i+')').hide();
      }
    }
  }

  $(document).on('click', '.btn-addtocart', function()
  {
    var td_ps2_games_name = $(this).closest('tr').find('.td-ps2_games-name').text();
    var td_ps2_games_size = $(this).closest('tr').find('.td-ps2_games-size').text();
    // var td_ps2_games_size_gb = $(this).closest('tr').find('.td-ps2_games-size-gb').text();
    var td_ps2_games_price = $(this).closest('tr').find('.td-ps2_games-price').text();
    // alert(td_ps2_games_name+" "+td_ps2_games_price);
    $('#table-cart tbody').append('\
      <tr>\
      <td class="td-cart-nama">'+td_ps2_games_name+'</td>\
      <td class="td-cart-size text-right">'+td_ps2_games_size+'</td>\
      <td class="text-right td-cart-harga">'+td_ps2_games_price+'</td>\
      <td class="text-center"><button class="btn-removefromcart btn btn-danger"><i class="fa fa-minus"></i></button></td>\
      </tr>\
      ');
    $('#modal-notification-body').html('<br>Name: '+td_ps2_games_name+'<br>Price: '+td_ps2_games_price+'<p class="text-success text-center">Added to cart</p>');
    hitung_cart();
  }
  );

  $(document).on('click', '.btn-ps2-games-detail', function()
  {
    var ps2_games_id = $(this).val();
    $.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "ps2_games_detail.php",
        data: {'ps2_games_id': ps2_games_id},             
        dataType: "html",   //expect html to be returned                
        success: function(response)
        {                    
          $('#modal-detail-body').html(response);
        }
    });
  });

  $(document).on('click', '.btn-removefromcart', function()
  {
    this.closest('tr').remove();
    hitung_cart();
  }
  );


$('#btn-print').on('click', function(){
  printData();
});

function printData()
{
  var date_today = new Date();
  var date_dd = String(date_today.getDate()).padStart(2, '0');
  var date_mm = String(date_today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var date_yyyy = date_today.getFullYear();
  var date_h = date_today.getHours();
  var date_m = date_today.getMinutes();
  var date_s = date_today.getSeconds();
  date_today = date_mm + '/' + date_dd + '/' + date_yyyy + ' | ' + date_h + ':' + date_m + ':' + date_s;
  date_today2 = date_mm + '-' + date_dd + '-' + date_yyyy + '_' + date_h + '-' + date_m + '-' + date_s;
  var atas_nama = $('#txt-atas-nama').val();
  var table_cart_length = $('#table-cart tbody tr').length;
   var divToPrint=document.getElementById("table-cart-responsive");
   newWin= window.open("");
   // newWin.document.write(divToPrint.outerHTML);
   newWin.document.write('<html>');
   newWin.document.write('<head>');
   newWin.document.write('<title>');
   newWin.document.write(atas_nama+'_'+ date_today2);
   newWin.document.write('</title>');
   newWin.document.write('<meta charset="utf-8">');
   newWin.document.write('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">');
   newWin.document.write('<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.min.css">');
   newWin.document.write('</head>');
   newWin.document.write('<body>');
   newWin.document.write('<div id="print-format" class="container">');

   newWin.document.write('<table class="table table-bordeless">');
   newWin.document.write('<tbody>');
   newWin.document.write('<tr>');
   newWin.document.write('<td class="text-center" colspan="2">');
   newWin.document.write('<h2><b>TeraTronik</b></h2>');
   newWin.document.write('</td>');
   newWin.document.write('</tr>');
   newWin.document.write('<tr>');
   newWin.document.write('<td class="text-left">');
   newWin.document.write('<b>Orderer</b>');
   newWin.document.write('</td>');
   newWin.document.write('<td class="text-right">');
   newWin.document.write(atas_nama);
   newWin.document.write('</td>');
   newWin.document.write('</tr>');
   newWin.document.write('<tr>');
   newWin.document.write('<td class="text-left">');
   newWin.document.write('<b>Order Date</b>');
   newWin.document.write('</td>');
   newWin.document.write('<td class="text-right">');
   newWin.document.write(date_today);
   newWin.document.write('</td>');
   newWin.document.write('</tr>');
   newWin.document.write('</tbody>');
   newWin.document.write('</table>');

   newWin.document.write('<p>');
   newWin.document.write('<p>');
   newWin.document.write('<table class="table table-bordered">');
   newWin.document.write('<thead>');
   newWin.document.write('<tr>');
   newWin.document.write('<th class="text-left">');
   newWin.document.write('Name');
   newWin.document.write('</th>');
   newWin.document.write('<th class="text-right">');
   newWin.document.write('Size (MB)');
   newWin.document.write('</th>');
   newWin.document.write('<th class="text-right">');
   newWin.document.write('Price');
   newWin.document.write('</th>');
   newWin.document.write('</tr>');
   newWin.document.write('</thead>');
   newWin.document.write('<tbody>');
   for(i=0; i<table_cart_length; i++)
   {
    newWin.document.write('<tr>');
    newWin.document.write('<td class="text-left">');
    newWin.document.write($('#table-cart tbody').find('.td-cart-nama:eq('+i+')').text());
    newWin.document.write('</td>');
    newWin.document.write('<td class="text-right">');
    newWin.document.write($('#table-cart tbody').find('.td-cart-size:eq('+i+')').text()+' MB');
    newWin.document.write('</td>');
    newWin.document.write('<td class="text-right">');
    newWin.document.write('Rp '+$('#table-cart tbody').find('.td-cart-harga:eq('+i+')').text());
    newWin.document.write('</td>');
    newWin.document.write('</tr>');
   }
   newWin.document.write('<tr>');
   newWin.document.write('<td>');
   newWin.document.write('</td>');
   newWin.document.write('<td class="text-right">');
   newWin.document.write('<b>Total Size: '+$('#txt-total-size').val()+' MB</b>');
   newWin.document.write('</td>');
   newWin.document.write('<td class="text-right">');
   newWin.document.write('<b>Total Price: Rp '+$('#txt-total-harga').val()+'</b>');
   newWin.document.write('</td>');
   newWin.document.write('</tr>');
   newWin.document.write('</tbody>');
   newWin.document.write('</table>');
   newWin.document.write('</div>');
   newWin.document.write('</body>');
   newWin.document.write('</html>');
   setTimeout(
   function() 
   {
    newWin.print();
   }, 1000);
}

function hitung_cart()
{
  var table_cart_length = $('#table-cart tbody tr').length;
  var harga = 0;
  var size = 0;
  for(i=0; i<table_cart_length; i++)
  {
    size+=parseFloat($('#table-cart tbody').find('.td-cart-size:eq('+i+')').text());
    harga+=parseFloat($('#table-cart tbody').find('.td-cart-harga:eq('+i+')').text());
  }
  $('#txt-total-size').val(size);
  $('#txt-total-harga').val(harga);
}

$('#btn-save-custom-cart-form').on('click', function()
{
  var ps2_games_name = $('#txt-custom-ps2_games-name').val();
  var ps2_games_size = $('#txt-custom-ps2_games-size').val();
  var ps2_games_price = $('#txt-custom-ps2_games-price').val();
  $('#table-cart tbody').append('\
      <tr>\
      <td class="td-cart-nama">'+ps2_games_name+'</td>\
      <td class="td-cart-size text-right">'+ps2_games_size+'</td>\
      <td class="text-right td-cart-harga">'+ps2_games_price+'</td>\
      <td class="text-center"><button class="btn-removefromcart btn btn-danger"><i class="fa fa-minus"></i></button></td>\
      </tr>\
      ');
    $('#modal-notification-body').html('<br>Name: '+ps2_games_name+'<br>Price: '+ps2_games_price+'<p class="text-success text-center">Added to cart</p>');
   $('#txt-custom-ps2_games-name').val('');
   $('#txt-custom-ps2_games-size').val('');
   $('#txt-custom-ps2_games-price').val('');
   hitung_cart();
});

$('#btn-clear-custom-cart-form').on('click', function()
{
   $('#txt-custom-ps2_games-name').val('');
   $('#txt-custom-ps2_games-size').val('');
   $('#txt-custom-ps2_games-price').val('');
});

</script>
</html>