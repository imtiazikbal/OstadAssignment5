<?php 
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.php");
}
if($_SESSION['role'] == 'admin'){
    header('location:dashboard.php');
}
if($_SESSION['role'] == 'user'){
    header("Location: user.php");
}
if($_SESSION['role'] == 'manager'){
    header("Location: manager.php");
}
?>