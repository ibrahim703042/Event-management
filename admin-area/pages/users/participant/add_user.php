
<div class="pagetitle">
    <h1>Administrateur</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php?page=widget">Acceuil</a>
            <li class="breadcrumb-item ">Administrateur</li>
            <li class="breadcrumb-item active">Ajouter</li>
        </ol>
    </nav>
</div>

<?php
    /* echo "<pre>";
        print_r($_POST);
    echo "</pre>"; */
?>

<section class="section dashboard">
    <div class="card rounded-pill border border-warning">
        <div class="card-body ">

            <form method="POST" action="" enctype="multipart/form-data" class=" mt-3 row g-3">

               <div class="col-md-12"> 
                    <label for="username" class="form-label">Nom d'utilisateur</label>
                    <input type="text" class="form-control" autofocus required name="username" id="username" placeholder="Entrer nom utilisateur">
               </div>
                
                <div class="col-md-6"> 
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control"  required name="email" id="email" placeholder="Entrer e-mail">
                </div>

                <div class="col-md-6"> 
                    <label for="phone" class="form-label">Telephone</label> 
                    <input type="number" class="form-control" required name="phone" id="phone" placeholder="Entrer numero de telephone">
                </div>

                <div class="col-md-12"> 
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" required name="password" id="password" placeholder="Entrer mot de passe">
                </div>

                <div class="col-md-6"> 
                    <label for="role" class="form-label">Role</label> 
                    <select class="form-select"   required name="role" aria-label="Default select example">
                        <option selected disabled>Choisir</option>
                        <option value="0">Administrateur</option>
                        <option value="1">Super administrateur</option>
                    </select>
                </div>

                <div class="col-md-6"> 
                    <label for="status" class="form-label">Status</label> 
                    <div class="form-check">
                      <label class="form-check-label" for="">
                        Etat
                      </label>
                      <input class="form-check-input" type="checkbox" name="status" value="" id="">
                    </div>
                </div>

                <div class="col-md-12"> 
                    <label for="file" class="form-label">Photo</label> 
                    <input type="file" class="form-control" required name="file" id="file">
                </div>
                
                
                <div class=" text-end">
                    <!-- <button type="submit" class="btn btn-success " name="add_user_btn">
                       Enregistrer
                    </button> -->
                    <button type="submit" name="add_user_btn" class="btn btn-success">
                        <i class="bi bi-upload me-1"></i>Enregistrer
                    </button> 
            </form>
            
        </div>
    </div>
</section>


<?php
   if(isset($_POST["add_user_btn"])){
   
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $phone = $_POST['phone'];
      $role = $_POST['role'];
      $status = isset($_POST['status']) ? '0':'1' ;
      
      $target="assets/img/uploads".basename($_FILES['file']['name']);
      
      $encpass = md5($password);

      $insert=$bdd->prepare("INSERT INTO admins(nom,email,telephone,profile,role_as,status_admin,mot_passe,date_admin) VALUES(?,?,?,?,?,?,?,Now())");

      if($insert->execute(array($username,$email,$phone,$target,$role,$status,$encpass))){

        move_uploaded_file($_FILES["file"]["tmp_name"],$target);
        $_SESSION['success'] = "Data insert Successfully";
        header('Location:dashboard.php?page=pages/users/participant/index');
  }else{
        $_SESSION['error'] = "Something went wrong";
        //header('Location:dashboard.php?page=pages/users/admin/add_admin');
  }
   }
?>