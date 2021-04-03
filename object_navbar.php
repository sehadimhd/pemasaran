<nav class="navbar navbar-expand-md bg-primary navbar-dark fixed-top shadow">
  <a class="navbar-brand" href="#"><b><?php echo $page_title;?></b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-bars"></i> Menu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="index.php"><i class="fa fa-bars"></i> Main menu</a>
          <a class="dropdown-item" href="ps2_games.php"><i class="fa fa-gamepad"></i> PS2 games</a>
          <?php if ($is_login==1){?>
          <a class="dropdown-item" href="services.php"><i class="fa fa-file-invoice"></i> Services</a>
          <a class="dropdown-item" href="recent_buy.php"><i class="fa fa-file-invoice"></i> Transaction history</a>
          <?php } ?>
          <a class="dropdown-item" href="windows_games.php"><i class="fa fa-gamepad"></i> Windows games</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php"><i class="fa fa-question-circle"></i>  About</a>
      </li>    
      <?php
      if($is_login == 1)
      {
      ?>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-user"></i> <?php echo $_SESSION['user_nickname'];?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" href="logout_process.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
      </li>    
      <?php
      }
      else if($is_login == 0)
      {
      ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user"></i> Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="login.php"><i class="fa fa-sign-in-alt"></i> Login</a>
          <!-- <a class="dropdown-item" href="signup.php"><i class="fa fa-user-plus"></i> Sign up</a> -->
        </div>
      </li>
      <?php
      }
      ?>
    </ul>
  </div> 
</nav>
