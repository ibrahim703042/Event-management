
<?php

    // include '../site/images/ok.php';

    $bdd=new PDO('mysql:host=localhost;dbname=event;charset=utf8','root','');
    $conn = mysqli_connect("localhost","root","","event");
    
    include_once 'class/car.php';
    include_once 'class/driver.php';
    include_once 'class/user.php';
    include_once 'class/admin.php';
    
    $admin= new admin($bdd);
    $car= new car($bdd);
    $driver= new driver($bdd);
    $utilisateur= new user($bdd);    

    /*              /__________________________authentification__________________________/        */



    /*              /__________________________Car_Data_Controller__________________________/        */



    

   

    /*              /__________________________Driver_Data_Controller__________________________/        */


    // if(isset($_GET["driver_delete_btn"])){

    //     $id = $_POST['driver_id'];
    //     $query = $driver->delete($id);

    //     if($query){

    //         $_SESSION['message'] = "Data deleted Successfully";
    //         header('Location:dashboard.php?page=pages/drivers/index');

    //     }else{
    //         $_SESSION['error'] = "Something went wrong";            
    //     }
    // }

    
?>