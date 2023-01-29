
<?php
    session_start();
    error_reporting(0);
    
    // for authentification
    if(isset($_POST['connexion'])){

        $email=$_POST['email'];
        //$mot_passe=md5($_POST['mot_passe']);
        $mot_passe=$_POST['mot_passe'];

        $sql ="SELECT * FROM utilisateurs WHERE email=:email and mot_de_passe=:mot_passe";
        $query=$dbconnection->prepare($sql);
        $query-> bindParam(':email', $email, PDO::PARAM_STR);
        $query-> bindParam(':mot_passe', $mot_passe, PDO::PARAM_STR);
        $query-> execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
    
       if($query->rowCount() > 0){

        //   $_SESSION['email']=$_POST['email'];
        //   $_SESSION['message'] = "Login successfully";

            foreach ($results as $result) {

                $_SESSION['user_id'] = $result->id_utlisateur;
                $_SESSION['login'] = $result->nom;
                $_SESSION['permission'] = $result->role;
                $role_as = $result->Status;
                $status = $result->Status;
            }

            // checking permission

            /* $id= $_SESSION['user_id'];
            $sql="SELECT * FROM utilisateurs WHERE id_utilisateur=:id";
            $query = $dbh -> prepare($sql);
            $query->bindParam(':id',$id,PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);

            if($query->rowCount() > 0) {

                foreach($results as $row){

                    if($row->role=="1"){

                        header('Location:index.php');

                    } 
                    else{ 
                        echo "<script>
                        alert('Your account was disabled Approach Admin');document.location ='index.php';
                        </script>";
                    }
                } 
            } */

            $_SESSION['auth'] = true;

            /* $userdata = $query->fetch(PDO::FETCH_ASSOC);
            
            /* $userdata = $query->fetch(PDO::FETCH_ASSOC);
            $username = $userdata['nom'];
            $useremail = $userdata['email'];
            $role_as = $userdata['role']; */

            /* $_SESSION['auth_user'] = [
                'nom' => $username,
                'email' => $useremail
            ]; */

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


        /* if(isset($_POST[''])){

            $email = $_POST['email'];
            $password = $_POST['mot_passe'];

            $sql = "SELECT * FROM utilisateurs WHERE email=$email and mot_de_passe=$password";
            $query = mysqli_query($conn, $sql);

            if(mysqli_num_rows($query) > 0){

                $_SESSION['auth'] = true;
                
                $userdata = mysqli_fetch_array($query);
                $username = $userdata['nom'];
                $useremail = $userdata['email'];

                $_SESSION['auth_user'] = [
                    'nom' => $username,
                    'email' => $useremail
                ];

                echo "<script>alert('Logged In Successfully');</script>";
                header('Location:index.php');
            }
            else{

                echo "<script>alert('Operation Failed');</script>";
                $_SESSION['message'] = "Invalid Credential";
            }
        } */

}

?>