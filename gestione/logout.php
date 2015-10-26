<?php 
session_start();
unset($_SESSION['username_users']);
unset($_SESSION['password_users']);
header("location:../index.php");
?>