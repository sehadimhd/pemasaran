<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['user_username']);
unset($_SESSION['user_nickname']);
header('location:index.php');
?>