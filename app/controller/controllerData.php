
<?php

    // include '../site/images/ok.php';

    $bdd=new PDO('mysql:host=localhost;dbname=event;charset=utf8','root','');
    $conn = mysqli_connect("localhost","root","","event");
    
    include_once 'class/car.php';
    include_once 'class/driver.php';
    include_once 'class/user.php';
    include_once 'class/admin.php';
    include_once 'class/participant.php';
    
    $admin= new admin($bdd);
    $car= new car($bdd);
    $driver= new driver($bdd);
    $user= new user($bdd);
    $participant= new participant($bdd);
    
    







    /*              /__________________________authentification______________________________/        */




    /*              /__________________________Registration__________________________________/        */


     

    /*              /__________________________Car_Data_Controller____________________________/        */



    

   

    /*              /__________________________Driver_Data_Controller__________________________/        */


    
    
?>