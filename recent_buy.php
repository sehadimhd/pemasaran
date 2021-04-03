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
$page_title = '<i class="fa fa-file-invoice"></i> Transaction History';
$user_id = $_SESSION['user_id'];
$sql_read_recent_buy = $connection->prepare("SELECT * FROM table_recent_buy WHERE recent_buy_user_id = '$user_id' ORDER BY recent_buy_name ASC");
$sql_read_recent_buy->execute();
$data_read_recent_buy = $sql_read_recent_buy->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Transaction History</title>
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
        <h5 class="modal-title" id="exampleModalLabel"><b><i class="fa fa-shopping-cart"></i> Cart</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Orderer: </label>
          <input id="txt-atas-nama" type="text" class="form-control" value="Me">
        </div>
        <div class="form-group">
          <label>Total Amount: </label>
          <input id="txt-total-amount" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
          <label>Total Price: </label>
          <input id="txt-total-price" type="text" class="form-control" disabled>
        </div>
        <div id="table-cart-responsive" class="table-responsive">
          <table class="table" id="table-cart">
            <thead>
              <tr>
                <th class="text-left">Name</th>
                <th class="text-left">Condition</th>
                <th class="text-right">Price</th>
                <th class="text-right">Amount</th>
                <th class="text-right">Total</th>
                <th class="text-left">Date</th>
                <th class="text-left">Source</th>
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
        <h5 class="modal-title" id="exampleModalLabel"><b><i class="fa fa-cart-plus"></i> Custom Cart</h5></b>
        <button type="button text-danger" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="custom-modal-notification-body" class="modal-body">
        <div class="form-group">
          <label>Name</label>
          <input id="txt-custom-recent-buy-name" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Condition</label>
          <input id="txt-custom-recent-buy-condition" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Price</label>
          <input id="txt-custom-recent-buy-price" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Amount</label>
          <input id="txt-custom-recent-buy-amount" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Date</label>
          <input id="txt-custom-recent-buy-date" type="date" class="form-control">
        </div>
        <div class="form-group">
          <label>Source</label>
          <input id="txt-custom-recent-buy-source" type="text" class="form-control">
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

<!-- Add Games -->
<div class="modal fade" id="modal-add-windows-games" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Transaction</h5>
        <button type="button text-danger" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="recent_buy_create_process.php" method="post">
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
  <div class="btn-group btn-group-sm">
    <?php if($is_login == 1){ ?>
    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add-windows-games"><i class="fa fa-plus"></i> Transaction</button>
    <?php } ?>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-custom-cart">
    <i class="fa fa-cart-plus"></i> Custom
    </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-cart">
    <i class="fa fa-shopping-cart"></i> Cart
    </button>
  </div>
  <p></p>
	<table id="table-recent-buy" class="table table-bordered table-hover datatables-table1">
		<thead class="thead-light">
			<tr>
        <?php if($is_login == 1){ ?>
        <th class="text-left" data-sortable="true" data-field="games_id">ID</th>
        <?php } ?>
        <th class="text-left">Name</th>
        <th class="text-left">Condition</th>
        <th class="text-right">Price</th>
        <th class="text-right">Ammount</th>
        <th class="text-right">Shipping Cost</th>
        <th class="text-right">Total</th>
        <th class="text-right">Date</th>
        <th class="text-right">Source</th>
        <th class="text-center"><i class="bi bi-list"></i></th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach($data_read_recent_buy as $row_recent_buy)
				{
          $recent_buy_price = $row_recent_buy['recent_buy_price'];
          $recent_buy_amount = $row_recent_buy['recent_buy_amount'];
          $recent_buy_shipping_cost = $row_recent_buy['recent_buy_shipping_cost'];
          $recent_buy_total = ($recent_buy_price*$recent_buy_amount)+$recent_buy_shipping_cost;
				?>
				<tr class="main-tr">
          <?php if($is_login == 1){ ?>
          <td class="td-recent-buy-id text-left"><?php echo $row_recent_buy['recent_buy_id'];?></td>
          <?php } ?>
					<td class="td-recent-buy-name text-left"><?php echo $row_recent_buy['recent_buy_name'];?></td>
          <td class="td-recent-buy-condition text-left"><?php echo $row_recent_buy['recent_buy_condition'];?></td>
          <td class="td-recent-buy-price text-right"><?php echo $recent_buy_price;?></td>
          <td class="td-recent-buy-amount text-right"><?php echo $recent_buy_amount;?></td>
          <td class="td-recent-buy-amount text-right"><?php echo $recent_buy_shipping_cost;?></td>
          <td class="td-recent-buy-total text-right"><?php echo $recent_buy_total;?></td>
          <td class="td-recent-buy-date text-right"><?php echo $row_recent_buy['recent_buy_date'];?></td>
          <td class="td-recent-buy-source text-right"><?php echo $row_recent_buy['recent_buy_source'];?></td>
          <?php
          if($is_login == 1)
          {
          ?>
          <td class="text-center">
            <div class="btn-group btn-group-sm">
              <button class="btn-addtocart btn btn-primary" data-toggle="modal" data-target="#modal-notification"><i class="bi bi-cart-plus"></i></button>
              <a class="btn btn-primary" href="<?php echo "recent_buy_detail.php?recent_buy_id=".$row_recent_buy['recent_buy_id']; ?>"><i class="bi bi-info-square"></i></a>
              <a class="btn btn-primary" href="<?php echo "recent_buy_update.php?recent_buy_id=".$row_recent_buy['recent_buy_id']; ?>"><i class="bi bi-pencil-square"></i></a>
              <a class="btn btn-danger" href="<?php echo "recent_buy_delete_process.php?recent_buy_id=".$row_recent_buy['recent_buy_id']; ?>"><i class="bi bi-trash"></i></a>
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
              <a class="btn btn-primary" href="<?php echo "recent_buy_detail.php?recent_buy_id=".$row_recent_buy['recent_buy_id']; ?>"><i class="bi bi-info-square"></i></a>
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
<?php include'object_script.php'?>
<script type="text/javascript">

  $(document).ready(function()
  {
  });

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
            <input class="form-control" type="text" name="recent_buy_name[]" required="">\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Condition</label>\
          <div class="col-sm-10">\
            <input class="form-control" type="text" name="recent_buy_condition[]" required="">\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Price</label>\
          <div class="col-sm-10">\
            <input class="form-control" type="number" name="recent_buy_price[]" value="0" required="">\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Amount</label>\
          <div class="col-sm-10">\
            <input class="form-control" type="number" name="recent_buy_amount[]" value="0" required>\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Shipping Cost</label>\
          <div class="col-sm-10">\
            <input class="form-control" type="number" name="recent_buy_shipping_cost[]" value="0" required>\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Date</label>\
          <div class="col-sm-10">\
            <input class="form-control" type="date" name="recent_buy_date[]" required="">\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Source</label>\
          <div class="col-sm-10">\
            <input class="form-control" type="text" name="recent_buy_source[]" required="">\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Description</label>\
          <div class="col-sm-10">\
            <textarea class="form-control ckeditor" name="recent_buy_description[]" required=""></textarea>\
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

  $('#btn-back-to-top').on('click', function()
  {
   window.scrollTo(1, 1);
  });

  $(document).on('click', '.btn-addtocart', function()
  {
    var td_recent_buy_name = $(this).closest('tr').find('.td-recent-buy-name').text();
    var td_recent_buy_condition = $(this).closest('tr').find('.td-recent-buy-condition').text();
    var td_recent_buy_price = $(this).closest('tr').find('.td-recent-buy-price').text();
    var td_recent_buy_amount = $(this).closest('tr').find('.td-recent-buy-amount').text();
    var td_recent_buy_total = $(this).closest('tr').find('.td-recent-buy-total').text();
    var td_recent_buy_date = $(this).closest('tr').find('.td-recent-buy-date').text();
    var td_recent_buy_source = $(this).closest('tr').find('.td-recent-buy-source').text();
    $('#table-cart tbody').append('\
      <tr>\
      <td class="td-cart-nama">'+td_recent_buy_name+'</td>\
      <td class="td-cart-condition">'+td_recent_buy_condition+'</td>\
      <td class="td-cart-price text-right">'+td_recent_buy_price+'</td>\
      <td class="td-cart-amount text-right">'+td_recent_buy_amount+'</td>\
      <td class="td-cart-total text-right">'+td_recent_buy_total+'</td>\
      <td class="td-cart-date text-left">'+td_recent_buy_date+'</td>\
      <td class="td-cart-source text-left">'+td_recent_buy_source+'</td>\
      <td class="text-center"><button class="btn-removefromcart btn btn-danger"><i class="fa fa-minus"></i></button></td>\
      </tr>\
      ');
    $('#modal-notification-body').html('<br>Name: '+td_recent_buy_name+'<br>Price: '+td_recent_buy_price+'<p class="text-success text-center">Added to cart</p>');
    hitung_cart();
    Swal.fire
    ({
      toast: true,
      showConfirmButton: false,
      timerProgressBar: true,
      icon: 'success',
      text: "Added to cart",
      timer: 1200
    });
  }
  );

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
   newWin.document.write('<b>Total Size: '+$('#txt-total-amount').val()+' MB</b>');
   newWin.document.write('</td>');
   newWin.document.write('<td class="text-right">');
   newWin.document.write('<b>Total Price: Rp '+$('#txt-total-price').val()+'</b>');
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
  var amount = 0;
  var price = 0;
  for(i=0; i<table_cart_length; i++)
  {
    amount+=parseFloat($('#table-cart tbody').find('.td-cart-amount:eq('+i+')').text());
    price+=parseFloat($('#table-cart tbody').find('.td-cart-total:eq('+i+')').text());
  }
  $('#txt-total-amount').val(amount);
  $('#txt-total-price').val(price);
}

$('#btn-save-custom-cart-form').on('click', function()
{
  var recent_buy_name = $('#txt-custom-recent-buy-name').val();
  var recent_buy_condition = $('#txt-custom-recent-buy-condition').val();
  var recent_buy_price = $('#txt-custom-recent-buy-price').val();
  var recent_buy_amount = $('#txt-custom-recent-buy-amount').val();
  var recent_buy_total = recent_buy_price*recent_buy_amount;
  var recent_buy_date = $('#txt-custom-recent-buy-date').val();
  var recent_buy_source = $('#txt-custom-recent-buy-source').val();
  $('#table-cart tbody').append('\
      <tr>\
      <td class="td-cart-nama">'+recent_buy_name+'</td>\
      <td class="td-cart-condition">'+recent_buy_condition+'</td>\
      <td class="td-cart-price text-right">'+recent_buy_price+'</td>\
      <td class="td-cart-amount text-right">'+recent_buy_amount+'</td>\
      <td class="td-cart-total text-right">'+recent_buy_total+'</td>\
      <td class="td-cart-date text-left">'+recent_buy_date+'</td>\
      <td class="td-cart-source text-left">'+recent_buy_source+'</td>\
      <td class="text-center"><button class="btn-removefromcart btn btn-danger"><i class="fa fa-minus"></i></button></td>\
      </tr>\
      ');
   $('#txt-custom-recent-buy-name').val('');
   $('#txt-custom-recent-buy-condition').val('');
   $('#txt-custom-recent-buy-price').val('');
   $('#txt-custom-recent-buy-amount').val('');
   $('#txt-custom-recent-buy-date').val('');
   $('#txt-custom-recent-buy-source').val('');
   hitung_cart();
});

$('#btn-clear-custom-cart-form').on('click', function()
{
  $('#txt-custom-recent-buy-name').val('');
  $('#txt-custom-recent-buy-condition').val('');
  $('#txt-custom-recent-buy-price').val('');
  $('#txt-custom-recent-buy-amount').val('');
  $('#txt-custom-recent-buy-date').val('');
  $('#txt-custom-recent-buy-source').val('');
});

</script>
</html>