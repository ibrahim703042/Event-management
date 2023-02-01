<?php 


$con = new mysqli('localhost', 'root' , '' ,'event');

if ($con) {
    echo "connection successfull";
}else {
    die(mysqli_error($con));
}



?>