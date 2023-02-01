
<?php

    // include '../site/images/ok.php';

    $bdd=new PDO('mysql:host=localhost;dbname=event;charset=utf8','root','');
    
    include_once 'class/car.php';
    include_once 'class/driver.php';
    include_once 'class/user.php';
    include_once 'class/admin.php';
    
    $admin= new admin($bdd);
    $car= new car($bdd);
    $driver= new driver($bdd);
    $utilisateur= new user($bdd);    

    /*              /__________________________authentification__________________________/        */

    if(isset($_POST[''])){

        $email=$_POST['email'];
        $mot_passe=md5($_POST['mot_passe']);
        $sql ="SELECT * FROM admins WHERE email=:email OR nom=:email AND mot_passe=:mot_passe";
        $query=$dbconnection->prepare($sql);
        $query-> bindParam(':email', $email, PDO::PARAM_STR);
        $query-> bindParam(':mot_passe', $mot_passe, PDO::PARAM_STR);
        $query-> execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
     
        if($query->rowCount() > 0){
     
           /* $_SESSION['email']=$_POST['email'];
           $_SESSION['id_admin']=$_POST['email']; */
           //$_SESSION['succes'] = "Logged In Succefully";
           
           header('Location:dashboard.php');
           
        }else{
     
           $_SESSION['error'] = "Something went wrong";
           //header('Location:');
        }
         
         
    }

    /*              /__________________________Car_Data_Controller__________________________/        */

    
    if(isset($_POST[''])){

        $marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $plaque = $_POST['plaque'];
        $descr = $_POST['description'];
        $chauffeur = $_POST['chauffeur'];
        $status = $_POST['status'];
        
        $target="assets/img/cars_image/".basename($_FILES['photo']['name']);

        $query = $car->create($marque,$modele,$target,$plaque,$descr,$chauffeur,$status);
        if($query){

            move_uploaded_file($_FILES["photo"]["tmp_name"],$target);
            $_SESSION['message'] = "Data insert Successfully";
            header('Location:dashboard.php?page=pages/cars/index');

        }else{

            $_SESSION['error'] = "Something went wrong";           
        }

    }

    if(isset($_POST['car_update_btn'])){

        $id = $_POST['id_car'];
        $marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $plaque = $_POST['plaque'];
        $descr = $_POST['description'];
        $chauffeur = $_POST['chauffeur'];
        $status = $_POST['status'];

        $target="assets/img/avatars/cars/".basename($_FILES['photo']['name']);
        
        $query = $car->update($id,$marque,$modele,$target,$plaque,$descr,$chauffeur,$status);
        if($query){

            move_uploaded_file($_FILES["photo"]["tmp_name"],$target);

            echo "<script>alert('Data updated Successfully');</script>";
            
            $_SESSION['message'] = "Data updated Successfully";
            header('Location:dashboard.php?page=pages/cars/index');

        }else{
            $_SESSION['error'] = "Something went wrong";            
        }

    }

    if(isset($_GET["car_delete_btn"])){

        $id = $_POST['id_voiture'];
        $query = $car->delete($id);

        if($query){

            $_SESSION['message'] = "Data deleted Successfully";
            header('Location:dashboard.php?page=pages/cars/index');

        }else{
            $_SESSION['error'] = "Something went wrong";            
        }
    }

    /*              /__________________________Driver_Data_Controller__________________________/        */


    
    if(isset($_POST[''])){

        $fullName = $_POST['nom_complet'];
        $phone = $_POST['telephone'];
        $permis = $_POST['permis'];
        $addresse = $_POST['addresse'];
        
        $target="assets/img/drivers_image/".basename($_FILES['photo']['name']);

        $sql ="INSERT INTO chauffeurs (nom_complet,numero_telephone,numero_permis_conduir,photo,addresse,date_chauffeur) 
                VALUES(?,?,?,?,?,Now())";

        $query=$bdd->prepare($sql);
        $run_query = $query->execute(array($fullName,$phone,$permis,$target,$addresse));

        if($run_query){

            move_uploaded_file($_FILES["photo"]["tmp_name"],$target);
            $_SESSION['message'] = "Data insert Successfully";
            echo "<script>alert('Utilisateur a été enregistré avec succès !')</script>";
            //header('Location:dashboard.php?page=pages/drivers/index');

        }else{

            $_SESSION['error'] = "Something went wrong";
            header('Location:dashboard.php?page=pages/drivers/add_driver'); 
        }

    }

    

    if(isset($_GET["driver_delete_btn"])){

        $id = $_POST['id_driver'];
        $query = $driver->delete($id);

        if($query){

            $_SESSION['message'] = "Data deleted Successfully";
            header('Location:dashboard.php?page=pages/drivers/index');

        }else{
            $_SESSION['error'] = "Something went wrong";            
        }
    }

    
?>