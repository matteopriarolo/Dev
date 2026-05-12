<?php 
    require_once 'config.php';

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
?>

<?php
    
?>

<?php include_once("db.php") ?>