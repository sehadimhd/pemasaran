<?php
include 'configs/connection.php';
include 'configs/login_session_checker.php';
$page_title = '<i class="fab fa-windows"></i> Insert Game';
if($is_login == 1)
{
  
}
else if($is_login == 0)
{
  header('location:gameskomputer.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Tambah Permainan</title>
	<?php include 'object_head.php';?>
</head>
<body>

<?php include 'object_navbar.php';?>

<!-- <div class="container" style="margin-top: 5rem">
  <form action="gameskomputer_insert_process.php" method="post">
    <div class="form-group">
      <label>Name</label>
      <input class="form-control" type="text" name="computergame_name" required="">
    </div>
    <div class="form-group">
      <label>Size (MB)</label>
      <input class="form-control" type="text" name="computergame_size" required="">
    </div>
    <div class="form-group">
      <label>Release Date</label>
      <input class="form-control" type="date" name="computergame_date" required="">
    </div>
    <div class="form-group">
      <label>Description</label>
      <textarea id="editor" class="form-control" name="computergame_description"></textarea>
    </div>
    <div class="form-group">
      <label>Price</label>
      <input class="form-control" type="text" name="computergame_price" required>
    </div>
    <div class="form-group">
      <label>Popularity</label>
      <input class="form-control" type="text" name="computergame_hit" value="0" required>
    </div>
    <div class="form-group">
      <label>Location</label>
      <input class="form-control" type="text" name="computergame_location" required>
    </div>
    <button class="btn btn-primary btn-block" type="submit">Simpan</button>
    <a class="btn btn-danger btn-block" href="gameskomputer.php">Kembali</a>
  </form>
</div> -->
<div class="container-sm" style="margin-top: 5rem; margin-bottom: 5rem">
  <a class="btn btn-danger" href="gameskomputer.php"><i class="fa fa-arrow-left"></i> Back</a>
  <p></p>
  <button type="button" id="btn-add-multiinput-form" class="btn btn-primary"><i class="fa fa-plus"></i> Form</button>
  <p></p>
  <form action="gameskomputer_insert_process.php" method="post">
    <div class="table-responsive">
      <table class="table table-bordered" id="tbl-multiinput" style="border: 2px solid #007BFF;">
        <thead class="bg-primary text-light">
          <th>Multi-Input</th>
        </thead>
        <tbody>
          
        </tbody>
      </table>
    </div>
    <p></p>
    <input type="submit" class="btn btn-primary btn-block" value="Save">
  </form>
</div>

</body>
<?php include'object_script.php'?>
<script type="text/javascript">
  
  $('#btn-add-multiinput-form').on('click', function()
  {
    $('#tbl-multiinput tbody').append('\
      <tr style="border-bottom: 4px solid #007BFF;border-left: 2px solid #007BFF;border-right: 2px solid #007BFF;"><td>\
      <div class="form-group row">\
          <label class="col-sm-2"></label>\
          <div class="col-sm-10">\
            <button type="button" class="btn-remove btn btn-danger float-right"><i class="fa fa-times"></i></button>\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Name</label>\
          <div class="col-sm-10">\
            <input class="form-control" type="text" name="computergame_name[]" required="">\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Size (MB)</label>\
          <div class="col-sm-10">\
            <input class="form-control" type="text" name="computergame_size[]" required="">\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Release Date</label>\
          <div class="col-sm-10">\
            <input class="form-control" type="date" name="computergame_date[]" required="">\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Description</label>\
          <div class="col-sm-10">\
            <textarea class="ckeditor form-control" name="computergame_description[]"></textarea>\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Price</label>\
          <div class="col-sm-10">\
            <input class="form-control" type="text" name="computergame_price[]" value="auto" required>\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Popularity</label>\
          <div class="col-sm-10">\
            <input class="form-control" type="text" name="computergame_hit[]" value="0" required>\
          </div>\
        </div>\
        <div class="form-group row">\
          <label class="col-sm-2">Location</label>\
          <div class="col-sm-10">\
            <input class="form-control" type="text" name="computergame_location[]" required>\
          </div>\
        </div>\
      </td></tr>\
      ');
    ckeditorized();
  }
  );

  function ckeditorized()
  {
    for(i=0; i<$('#tbl-multiinput tbody tr').length; i++)
    {
      $('#tbl-multiinput tbody tr:eq('+i+') .ckeditor').attr('id', 'ckeditor'+i);
      CKEDITOR.replace('ckeditor'+i)
    }
  }

  $(document).on('click', '.btn-remove', function()
  {
    this.closest('tr').remove();
  }
  );
</script>
</html>