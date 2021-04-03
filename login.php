<?php
include 'configs/connection.php';
include 'configs/login_session_checker.php';
$page_title = '<i class="fa fa-user"></i> Login';
if($is_login == 1)
{
  header('location:index.php');
}
else if($is_login == 0)
{

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<?php include 'object_head.php';?>
</head>
<body class="bg-primary">

<?php include 'object_navbar.php';?>

<div class="container bg-white px-auto py-4 mx-auto shadow" style="margin-top: 5rem">
  <div class="row">
    <div class="col-md">
      <form action="login_process.php" method="post">
        <div class="form-group">
          <label for="input-text-user-username">Nama Pengguna</label>
          <input id="input-text-user-username" class="form-control" type="text" name="user_username">
        </div>
        <div class="form-group">
          <label for="input-text-user-password">Kata Sandi</label>
          <input id="input-text-user-password" class="form-control" type="password" name="user_password">
        </div>
        <button class="btn btn-primary btn-block" type="submit">Login</button>
      </form>
    </div>
    <div class="col-md">
      Login menggunakan akun situs ini. Apabila belum memiliki akun, 
      silahkan klik tombol 
      <a class="text-decoration-none" href="#">Daftar</a>
    </div>
  </div>
</div>

</body>
<?php 
include 'object_script.php';
if(isset($_SESSION['login_message']))
{
  echo '<script>Swal.fire({toast: false, showConfirmButton: false, timerProgressBar: true, timer: 2000, icon: "error", text: "Login failed. Username and Password does not match"});</script>';
  unset($_SESSION['login_message']);
}
?>
</html>