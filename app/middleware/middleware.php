<?php

    //include '../../database/db_connect.php';

    if(isset($_SESSION['auth'])){

        if($_SESSION['status'] != 1 ){

            //$_SESSION['error'] = "Your account was disabled Approach Admin";

        }
        else{
            //header('Location:../admin-area/index.php');
        }
        

    }else{
        header('Location:index.php');
    }

?>


<?php 
    /* if(isset($_SESSION['auth'])){

        if($_SESSION['status'] == 0 ){

            echo "<script>alert('Your account was disabled Approach Admin');</script>";
            error('index.php','Your account was disabled Approach Admin');

        }else if($_SESSION['status'] == 1 ){

            // echo "<script>alert('Logged In Successfully');</script>";
            // $_SESSION['message'] = "Logged In Successfully";
            // header('Location:dashboard.php?page=widget');

        }else{
            echo "<script>alert('You are a hacker');</script>";
            error('index.php','You are a hacker');
        }

    }else{
        $_SESSION['message'] = "Logged In To Continue";
        header('Location:index.php');
    } */

?>