$(document).ready(function()
{
  // [start] refresh table info
  function table_info() 
  {
    var table_games_rows_count = $('#table-games tbody tr').length;
    var array_price = [];
    var array_size = [];
    var i=0;
    for(i=0; i<table_games_rows_count; i++)
    {
      array_size[i]=parseFloat( $('#table-games tbody tr:eq('+i+')').find('.td-windows_games-size').text() );
      array_price[i]=parseFloat( $('#table-games tbody tr:eq('+i+')').find('.td-windows_games-price').text() );
    }
    $('#modal-table-info-body').html(
      '<table class="table">'+
      '<thead><tr><th class="text-center" colspan="2"><b>Table Info</b></th></tr></thead>'+
      '<tbody>'+
      '<tr>'+
      '<td><b>Games Count</b></td>'+
      '<td class="text-right">'+accounting.formatMoney(table_games_rows_count, "", 0, ".", ",")+' Games '+'</td>'+
      '</tr>'+
      '<tr>'+
      '<tr>'+
      '<td><b>Min Size</b></td>'+
      '<td class="text-right">'+accounting.formatMoney(math.min(array_size), "", 0, ".", ",")+' MB '+'</td>'+
      '</tr>'+
      '<tr>'+
      '<td><b>Average Size</b></td>'+
      '<td class="text-right">'+accounting.formatMoney(math.mean(array_size), "", 0, ".", ",")+' MB '+'</td>'+
      '</tr>'+
      '<tr>'+
      '<td><b>Max Size</b></td>'+
      '<td class="text-right">'+accounting.formatMoney(math.max(array_size), "", 0, ".", ",")+' MB '+'</td>'+
      '</tr>'+
      '<tr>'+
      '<td><b>Total Size</b></td>'+
      '<td class="text-right">'+accounting.formatMoney(math.sum(array_size), "", 0, ".", ",")+' MB '+'</td>'+
      '</tr>'+
      '<tr>'+
      '<td><b>Min Price</b></td>'+
      '<td class="text-right">'+accounting.formatMoney(math.min(array_price), "Rp ", 0, ".", ",")+'</td>'+
      '</tr>'+
      '<tr>'+
      '<td><b>Average Price</b></td>'+
      '<td class="text-right">'+accounting.formatMoney(math.mean(array_price), "Rp ", 0, ".", ",")+'</td>'+
      '</tr>'+
      '<tr>'+
      '<td><b>Max Price</b></td>'+
      '<td class="text-right">'+accounting.formatMoney(math.max(array_price), "Rp ", 0, ".", ",")+'</td>'+
      '</tr>'+
      '<tr>'+
      '<td><b>Most Prices</b></td>'+
      '<td class="text-right">'+accounting.formatMoney(math.mode(array_price), "Rp ", 0, ".", ",")+'</td>'+
      '</tr>'+
      '<tr>'+
      '<td><b>Total Price</b></td>'+
      '<td class="text-right">'+accounting.formatMoney(math.sum(array_price), "Rp ", 0, ".", ",")+'</td>'+
      '</tr>'+
      '</tbody>'+
      '</table>'
    );
  }

  table_info();
  // [end] refresh table info
  
  // [start] show multi-input windows games
  function ckeditorized()
  {
    for(i=0; i<$('#table-multiinput tbody tr').length; i++)
    {
      $('#table-multiinput tbody tr:eq('+i+') .ckeditor').attr('id', 'ckeditor'+i);
      try
      {
        CKEDITOR.replace('ckeditor'+i)
      }
      catch(e)
      {

      }
    }
  }

  $(document).on('click', '.btn-remove', function()
  {
    this.closest('tr').remove();
  }
  );
  // End Input Add Games

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
            <input class="form-control" type="text" name="windows_games_name[]" required="">\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Version</label>\
          <div class="col-sm-10">\
            <input class="form-control" type="text" name="windows_games_version[]" required="">\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Size (MB)</label>\
          <div class="col-sm-10">\
            <input class="form-control" type="number" name="windows_games_size[]" required="">\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Release Date</label>\
          <div class="col-sm-10">\
            <input class="form-control" type="date" name="windows_games_date[]" required="">\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Description</label>\
          <div class="col-sm-10">\
            <textarea class="ckeditor form-control" name="windows_games_description[]"></textarea>\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Price</label>\
          <div class="col-sm-10">\
            <input class="form-control" type="text" name="windows_games_price[]" value="auto" required>\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Popularity</label>\
          <div class="col-sm-10">\
            <input class="form-control" type="number" name="windows_games_hit[]" value="0" required>\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Source</label>\
          <div class="col-sm-10">\
            <input class="form-control" type="text" name="windows_games_source[]" required>\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Location</label>\
          <div class="col-sm-10">\
            <input class="form-control" type="text" name="windows_games_location[]" required>\
          </div>\
        </div>\
      </td></tr>\
      ');
    ckeditorized();
  }
  );
  // [end] show multi-input windows games
  
  // [start] initialize datatables
  $('.datatables-table-windows-games').DataTable( 
    {
      dom: 'Bfrtip',
      aaSorting: [],
      scrollX: false, 
      scrollY: false,
      info: true,
      responsive: true,
      autoFill: false,
      searching: true,
      stateSave: false,
      ordering: true,
      paging: true,
      pagingType: "numbers",
      pageLength: 10,
      lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']],
      select: false,
      buttons: 
      [
        {
          extend: 'pageLength',
          exportOptions: 
          {
              columns: ':visible'
          }
        },
        {
          extend: 'colvis',
          title: 'Windows Games '+getcurrentdatename1(),
          exportOptions: 
          {
              columns: ':visible'
          }
        },
        {
          extend: 'copy',
          title: 'Windows Games '+getcurrentdatename1(),
          exportOptions: 
          {
              columns: ':visible'
          }
        },
        {
          extend: 'csv',
          title: 'Windows Games '+getcurrentdatename1(),
          exportOptions: 
          {
              columns: ':visible',
          }
        },
        {
          extend: 'excel',
          title: 'Windows Games '+getcurrentdatename1(),
          exportOptions: 
          {
              columns: ':visible'
          }
        },
        {
          extend: 'pdf',
          title: 'Windows Games '+getcurrentdatename1(),
          exportOptions: 
          {
              columns: ':visible'
          }
        },
        {
          extend: 'print',
          title: 'Windows Games '+getcurrentdatename1(),
          exportOptions: 
          {
              columns: ':visible'
          }
        }
      ]
    });
  // [end] nitialize datatables
  
  // [start] get date today
  function getcurrentdatename1()
  {
    var date_today = new Date();
    var date_dd = String(date_today.getDate()).padStart(2, '0');
    var date_mm = String(date_today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var date_yyyy = date_today.getFullYear();
    var date_h = date_today.getHours();
    var date_m = date_today.getMinutes();
    var date_s = date_today.getSeconds();
    date_today = date_yyyy + '-' + date_mm + '-' + date_dd + ' ' + date_h + '-' + date_m + '-' + date_s;
    return date_today;
  }
  // [end] get date today
});

  // $(document).on('click', '.btn-addtocart', function()
  // {
  //   var td_windows_games_name = $(this).closest('tr').find('.td-windows_games-name').text();
  //   var td_windows_games_size = $(this).closest('tr').find('.td-windows_games-size').text();
  //   // var td_windows_games_size_gb = $(this).closest('tr').find('.td-windows_games-size-gb').text();
  //   var td_windows_games_price = $(this).closest('tr').find('.td-windows_games-price').text();
  //   // alert(td_windows_games_name+" "+td_windows_games_price);
  //   $('#table-cart tbody').append('\
  //     <tr>\
  //     <td class="td-cart-nama">'+td_windows_games_name+'</td>\
  //     <td class="td-cart-size text-right">'+td_windows_games_size+'</td>\
  //     <td class="text-right td-cart-harga">'+td_windows_games_price+'</td>\
  //     <td class="text-center"><button class="btn-removefromcart btn btn-danger"><i class="fa fa-minus"></i></button></td>\
  //     </tr>\
  //     ');
  //   calculate_cart();
  //   Swal.fire
  //   ({
  //     toast: false,
  //     showConfirmButton: false,
  //     timerProgressBar: false,
  //     icon: 'success',
  //     text: " Added to cart",
  //     timer: 3000
  //   });
  // }
  // );

  $(document).on('click', '.btn-windows-games-detail', function()
  {
    var windows_games_id = $(this).val();
    $.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "ajax_windows_games_detail.php",
        data: {'windows_games_id': windows_games_id},             
        dataType: "html",   //expect html to be returned                
        success: function(response)
        {                    
          $('#modal-detail-body').html(response);
        }
    });
  });

  $(document).on('click', '.btn-addtocart', function()
  {
    var windows_games_id = $(this).val();
    $.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "windows_games_add_to_cart.php",
        data: {'windows_games_id': windows_games_id},             
        dataType: "html",   //expect html to be returned                
        success: function(response)
        {  
             $('#modal-detail-body').html(response);
             calculate_cart();               
        }
    });
  });

  $(document).on('click', '.btn-removefromcart', function()
  {
    this.closest('tr').remove();
    calculate_cart();
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
  newWin= window.open();
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
  newWin.document.close();
  newWin.focus();
  newWin.print();
  newWin.close();
}

function calculate_cart()
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
  var windows_games_name = $('#txt-custom-windows_games-name').val();
  var windows_games_size = $('#txt-custom-windows_games-size').val();
  var windows_games_price = $('#txt-custom-windows_games-price').val();

  if(windows_games_name == "")
  {
    windows_games_name="Unknown";
  }
  if(windows_games_size == "" || typeof windows_games_size != 'number')
  {
    windows_games_size=0;
  }
  if(windows_games_price == ""  || typeof windows_games_price != 'number')
  {
    windows_games_price=0;
  }
  $('#table-cart tbody').append('\
      <tr>\
      <td class="td-cart-nama">'+windows_games_name+'</td>\
      <td class="td-cart-size text-right">'+windows_games_size+'</td>\
      <td class="text-right td-cart-harga">'+windows_games_price+'</td>\
      <td class="text-center"><button class="btn-removefromcart btn btn-danger"><i class="fa fa-minus"></i></button></td>\
      </tr>\
      ');
    $('#modal-notification-body').html('<br>Name: '+windows_games_name+'<br>Price: '+windows_games_price+'<p class="text-success text-center">Added to cart</p>');
   $('#txt-custom-windows_games-name').val('');
   $('#txt-custom-windows_games-size').val('');
   $('#txt-custom-windows_games-price').val('');
   calculate_cart();
   Swal.fire
    ({
      toast: false,
      showConfirmButton: true,
      timerProgressBar: true,
      icon: 'success',
      text: " Added to cart",
      timer: 3000
    });
});

$('#btn-clear-custom-cart-form').on('click', function()
{
  $('#txt-custom-windows_games-name').val('');
  $('#txt-custom-windows_games-size').val('');
  $('#txt-custom-windows_games-price').val('');
});