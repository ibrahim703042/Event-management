<?php
    include 'includes/db_connect.php';
    session_start();
    session_destroy();
    //echo "<script>alert('Logged Out');</script>";
    header("location: index.php");
    exit();
?>
