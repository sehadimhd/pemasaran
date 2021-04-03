<?php
include 'configs/connection.php';
include 'configs/login_session_checker.php';
$page_title = '<i class="fa fa-question-circle"></i> About';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>About</title>
	<?php include 'object_head.php';?>
</head>
<body>

<?php include 'object_navbar.php';?>

<div class="container text-center" style="margin-top: 5rem">
  <h5><b>Created By</b></h5>
  Hadi S.
  <p></p>
  <h5><b>Contact</b></h5>
  <b>Phone/WhatsApp/SMS</b><br>
  08974806386<br>
  <b>Email</b><br>
  -
  <p></p>
  <h5><b>Sites</b></h5>
  <a style="color: #FF0000;" href="https://www.youtube.com/channel/UCXBixmgRM3V58GYI0KXxDOQ"><h1><i class="fab fa-youtube"></i></h1></a>
  
</div>

</body>
<?php include 'object_script.php';?>
</html>