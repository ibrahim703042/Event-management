
<?php
    session_start();
    error_reporting(0);
    
    // for authentification
    if(isset($_POST['connexion'])){

        $email=$_POST['email'];
        $mot_passe=$_POST['mot_passe'];

        $sql ="SELECT * FROM utilisateurs WHERE email=:email and mot_de_passe=:mot_passe";
        $query=$dbconnection->prepare($sql);
        $query-> bindParam(':email', $email, PDO::PARAM_STR);
        $query-> bindParam(':mot_passe', $mot_passe, PDO::PARAM_STR);
        $query-> execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
    
       if($query->rowCount() > 0){

            $_SESSION['auth'] = true;
            
            $userdata = $query->fetch(PDO::FETCH_BOTH);
            $username = $userdata['nom'];
            $useremail = $userdata['email'];
            $role_as = $userdata['role'];

            $_SESSION['auth_user'] = [
                'nom' => $username,
                'email' => $useremail
            ];

            //$_SESSION['role_as'] = $role_as;

            /* if($role_as == 1 || $role_as == 2){
                echo "<script>alert('Welcome to dashboard');</script>";
                $_SESSION['message'] = "Welcome to dashboard";
                header('Location:index.php');
            }
            else{
                echo "<script>alert('Logged In Successfully');</script>";
                $_SESSION['message'] = "Logged In Successfully";
                header('Location:index.php');
            } */

            echo "<script>alert('Logged In Successfully');</script>";
            header('Location:admin-area/dashboard.php');
            // header('Location:index.php');
            

        } 
        else{

            echo "<script>alert('Operation Failed');</script>";
            $_SESSION['message'] = "Invalid Credential";
        }

    }

    // Cars

    if(isset($_POST['add_ca'])){
        $marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $plaque = $_POST['plaque'];
        $chauffeur = $_POST['chauffeur'];
        $status = $_POST['status'];

        $photo=$_FILES["photo"]["name"];
        move_uploaded_file($_FILES["photo"]["tmp_name"],"assets/img/cars_image/".$_FILES["photo"]["name"]);

            
        if($car->create($marque,$modele,$plaque,$photo,$chauffeur,$status))
        {
            
            echo "<script>alert('Data insert Successfully');</script>";
            echo "<script>window.location.href='dashboard.php?page=pages/cars/index'</script>";
        }
        else
        {
            echo "<script>alert('Operation Failed');</script>";
            echo "<script>window.location.href='dashboard.php?page=pages/cars/add_car'</script>";
            
        }
    }


?>