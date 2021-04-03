$(document).ready(function()
{

	// [start] initialize datatables
  $('.datatables-table-services').DataTable( 
    {
      dom: 'Bfrtip',
      aaSorting: [],
      scrollX: true, 
      scrollY: true,
      info: true,
      responsive: false,
      autoFill: false,
      searching: true,
      stateSave: false,
      ordering: true,
      paging: true,
      pageLength: 10,
      lengthMenu: [[5, 10, 20], [5, 10, 20]],
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
          title: 'Services '+getcurrentdatename1(),
          exportOptions: 
          {
              columns: ':visible'
          }
        },
        {
          extend: 'copy',
          title: 'Services '+getcurrentdatename1(),
          exportOptions: 
          {
              columns: ':visible'
          }
        },
        {
          extend: 'csv',
          title: 'Services '+getcurrentdatename1(),
          exportOptions: 
          {
              columns: ':visible',
          }
        },
        {
          extend: 'excel',
          title: 'Services '+getcurrentdatename1(),
          exportOptions: 
          {
              columns: ':visible'
          }
        },
        {
          extend: 'pdf',
          title: 'Services '+getcurrentdatename1(),
          exportOptions: 
          {
              columns: ':visible'
          }
        },
        {
          extend: 'print',
          title: 'Services '+getcurrentdatename1(),
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

	$(document).on('click', '.btn-unfinished-services-detail', function()
  	{
    	var services_id = $(this).val();
    	$.ajax({
        type: "POST",
        url: "ajax_finished_services_detail.php",
        data: {'services_id':services_id},             
        dataType: "html",   //expect html to be returned                
        success: function(response)
        {                    
          $('#modal-detail-body').html(response);
        }
   		});
  	});

	$(document).on('click', '.btn-finished-services-detail', function()
  	{
    	var services_id = $(this).val();
    	$.ajax({
        type: "POST",
        url: "ajax_finished_services_detail.php",
        data: {'services_id':services_id},             
        dataType: "html",   //expect html to be returned                
        success: function(response)
        {                    
          $('#modal-detail-body').html(response);
        }
   		});
  	});

  	function ckeditorized()
  {
    for(i=0; i<$('#table-multiinput tbody tr').length; i++)
    {
      $('#table-multiinput tbody tr:eq('+i+') .ckeditor1').attr('id', 'ckeditor1'+i);
      $('#table-multiinput tbody tr:eq('+i+') .ckeditor2').attr('id', 'ckeditor2'+i);
      try
      {
        CKEDITOR.replace('ckeditor1'+i)
        CKEDITOR.replace('ckeditor2'+i)
      }
      catch(e)
      {

      }
    }
  }

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
	            <input class="form-control" type="text" name="services_name[]" required="">\
	          </div>\
	        </div>\
	        <div class="form-group row">\
	          <label class="col-sm-2">Customer Name</label>\
	          <div class="col-sm-10">\
	            <input class="form-control" type="text" name="services_customer_name[]" value="Customer" required="">\
	          </div>\
	        </div>\
	        <div class="form-group row">\
	          <label class="col-sm-2">Address</label>\
	          <div class="col-sm-10">\
	            <textarea class="ckeditor1 form-control" name="services_address[]"></textarea>\
	          </div>\
	        </div>\
	        <div class="form-group row">\
	          <label class="col-sm-2">Description</label>\
	          <div class="col-sm-10">\
	            <textarea class="ckeditor2 form-control" name="services_description[]"></textarea>\
	          </div>\
	        </div>\
	        <div class="form-group row">\
	          <label class="col-sm-2">Cost</label>\
	          <div class="col-sm-10">\
	            <input class="form-control" type="number" name="services_cost[]" value="0" required="">\
	          </div>\
	        </div>\
	        <div class="form-group row">\
	          <label class="col-sm-2">Income</label>\
	          <div class="col-sm-10">\
	            <input class="form-control" type="number" name="services_income[]" value="0" required="">\
	          </div>\
	        </div>\
	        <div class="form-group row">\
	          <label class="col-sm-2">Start Date</label>\
	          <div class="col-sm-10">\
	            <input class="form-control" type="date" name="services_start_date[]" required="">\
	          </div>\
	        </div>\
	        <div class="form-group row">\
	          <label class="col-sm-2">Estimated Finished Date</label>\
	          <div class="col-sm-10">\
	            <input class="form-control" type="date" name="services_estimated_finished_date[]" required="">\
	          </div>\
	        </div>\
	        <div class="form-group row">\
	          <label class="col-sm-2">Finished Date</label>\
	          <div class="col-sm-10">\
	            <input class="form-control" type="date" name="services_finished_date[]" required="">\
	          </div>\
	        </div>\
	        <div class="form-group row">\
	          <label class="col-sm-2">Status</label>\
	          <div class="col-sm-10">\
	            <input class="form-control" type="text" name="services_status[]" value="Unfinished" required>\
	          </div>\
	        </div>\
	      </td></tr>\
	      ');
	    ckeditorized();
	});

	$(document).on('click', '.btn-remove', function()
	{
		this.closest('tr').remove();
	});

});