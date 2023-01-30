<?php

    // $email = "";
    // $name = "";
    $errors = array();

    if(isset($_POST["user_btn"])){

        $fname = $_POST['nom'];
        $lname = $_POST['prenom'];
        $email = $_POST['email'];
        $password = $_POST['mot_passe'];
        $role = $_POST['role'];
        $phone = $_POST['telephone'];
        $country = $_POST['pays'];
        $passport = $_POST['passport'];
        $rotary = $_POST['rotary'];
        $status = isset($_POST['status']) ? '0':'1' ;
        $fileName=$_FILES["file"]["name"];

        $email_check = $user->email_check("utilisateurs",$email);
        if($email_check->rowCount()>0){
			
			while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
				
				$errors['email'] = "Email deja existe!";
			}
		}
        
        if(count($errors) === 0){

            $encpass = password_hash($password, PASSWORD_BCRYPT);
          
            $insert = $user->create_user($fname,$lname,$email,$phone,$passport,$fileName,$country,$rotary,$status,$role,$encpass);
            if($insert){

                move_uploaded_file($_FILES["file"]["tmp_name"],"assets/img/users_image/".$_FILES["file"]["name"]);

                echo "<script>alert('Data insert Successfully');</script>";
                
            }else{
                echo "<script>alert('File upload failed, please try again.');</script>";
            }
        }

    }    
?>


<div class="pagetitle">
    <h1>Utilisateur</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php?page=widget">Acceuil</a></li></li>
            <li class="breadcrumb-item active">Ajouter utilisateur</li>
        </ol>
    </nav>
</div>

<?php
    /* echo "<pre>";
        print_r($_POST);
    echo "</pre>"; */
?>
<section class="section dashboard">
    <div class="card">
        <div class="card-body">

            <form method="POST" action="" enctype="multipart/form-data" class="row g-3 py-5">

                <div class="col-md-6"> 
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control"  required  name="nom" id="nom" placeholder="Entrer nom">
                </div>
                <div class="col-md-6"> 
                    <label for="prenom" class="form-label">Prenom</label>
                    <input type="text" class="form-control" required  name="prenom" id="prenom" placeholder="Entrer prenom">
                </div>

                <div class="col-md-12"> 
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" required  name="email" id="email" placeholder="Entrer e-mail">
                </div>

                <div class="col-md-12"> 
                    <label for="mot_passe" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" required  name="mot_passe" id="mot_passe" placeholder="Entrer mot de passe">
                </div>

                <div class="col-md-12"> 
                    <label for="role" class="form-label">Role</label> 
                    <select class="form-select" required  name="role" aria-label="Default select example">
                        <option selected disabled>Choisir</option>
                        <option value="2">Administrateur</option>
                        <option value="1">Super administrateur</option>
                        <option value="0">Participant</option>
                    </select>
                </div>

                <div class="col-md-12"> 
                    <label for="telephone" class="form-label">Telephone</label> 
                    <input type="number" class="form-control" required  name="telephone" id="telephone" placeholder="Entrer numero de telephone">
                </div>

                <div class="col-md-6"> 
                    <label for="pays" class="form-label">Pays</label> 
                    <select class="form-select" required  name="pays" aria-label="Default select example">
                        <option selected disabled>Choisir</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Congo">Congo</option>
                    </select>
                </div>
                <div class="col-md-6"> 
                    <label for="passport" class="form-label">Numero de passport</label> 
                    <input type="text" class="form-control" required  name="passport" id="passport" placeholder="Entrer numero de passport">
                </div>

                <div class="col-md-12"> 
                    <label for="rotary" class="form-label">Rotary</label> 
                    <input type="text" class="form-control" required  name="rotary" id="rotary" placeholder="Entrer addresse">
                </div>

                <div class="col-md-2"> 
                    <label for="status" class="form-label">Status</label> 
                    <div class="form-check">
                      <label class="form-check-label" for="">
                        Etat
                      </label>
                      <input class="form-check-input" type="checkbox" name="status" value="" id="">
                    </div>
                </div>
                <div class="col-md-10"> 
                    <label for="photo" class="form-label">Photo</label> 
                    <input type="file" class="form-control" required  name="file" id="photo">
                </div>
                
                <div class=" text-end">
                    <button type="submit" class="btn btn-success" required  name="user_btn">
                        Enregistrer
                    </button> 
            </form>
        </div>
    </div>
</section>
