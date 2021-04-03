<?php
include 'configs/connection.php';
include 'configs/login_session_checker.php';
$page_title = '<i class="fa fa-bars"></i> Main Menu';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Menu Utama</title>
  <?php include 'object_head.php';?>
</head>
<body class="bg-primary">

<?php include 'object_navbar.php';?>

<div class="container" style="margin-top: 5rem;">

  <div class="row row-cols-1 row-cols-md-2">

    <div class="col mb-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">
            <a class="stretched-link text-decoration-none"  href="ps2_games.php"><i class="fa fa-gamepad"></i> PS2 Games
            </a>
          </h5>
          <p class="card-text">
            List of ps2 games
          </p>
        </div>
      </div>
    </div>

    <?php if ($is_login==1){?>
    <div class="col mb-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">
            <a class="stretched-link text-decoration-none"  href="services.php"><i class="fa fa-tools"></i> Services
            </a>
          </h5>
          <p class="card-text">
            Services and Reparation
          </p>
        </div>
      </div>
    </div>
    <div class="col mb-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">
            <a class="stretched-link text-decoration-none"  href="recent_buy.php"><i class="fa fa-file-invoice"></i> Transaction History
            </a>
          </h5>
          <p class="card-text">
            My transaction history
          </p>
        </div>
      </div>
    </div>
    <?php }?>

    <div class="col mb-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">
            <a class="stretched-link text-decoration-none"  href="windows_games.php"><i class="fa fa-gamepad"></i> Windows Games
            </a>
          </h5>
          <p class="card-text">
            List of windows games
          </p>
        </div>
      </div>
    </div>

  </div>

</div>

</body>
<?php 
include 'object_script.php';
if(isset($_SESSION['login_message']))
{
  echo '<script>Swal.fire({toast: false, showConfirmButton: false, timerProgressBar: true, timer: 2000, icon: "success", text: "'.$_SESSION['login_message'].'"});</script>';
  unset($_SESSION['login_message']);
}
?>
</html>