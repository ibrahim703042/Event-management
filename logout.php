<?php
    session_start();
    include  'includes/db_connect.php';
    session_destroy();
    echo "<script>alert('Logged Out');</script>";
    header("location: login.php");
    //header("location: index.php");
    exit();
?>
