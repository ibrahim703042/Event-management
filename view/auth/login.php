
<?php
include 'db_connect.php';
   session_start();
   error_reporting(0);

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
      $_SESSION['email']=$_POST['email'];
      echo "<script >document.location = 'index.php'; </script>";
    } else{
      $error="Invalid Details";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
   <?php include 'includes/head.php' ?>
   <body>
   <main>
         <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
               <div class="container">
                  <div class="row justify-content-center">
                     <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="d-flex justify-content-center py-4"> 
                           <a href="#" class="logo d-flex align-items-center w-auto"> 
                              <img src="assets/img/logo.png" alt=""> 
                              <span class="d-none d-lg-block">Admin</span> 
                           </a>
                        </div>
                        <div class="card mb-3">
                           <div class="card-body">
                              <div class="pt-4 pb-2">
                                 <h5 class="card-title text-center pb-0 fs-4">Connexion</h5>
                                 <p class="text-center small">
                                    Entrer votre e-mail & mot de passe
                                 </p>
                              </div>
                              <form class="row g-3 needs-validation" novalidate  method="post" enctype="multipart/form-data" >
                                 <div class="col-12">
                                    <label for="yourEmail" class="form-label">E-mail</label>
                                    <div class="input-group has-validation">
                                       <!-- <span class="input-group-text" id="inputGroupPrepend">@</span>  -->
                                       <input type="email" name="email" class="form-control" id="yourEmail" placeholder="Entrer e-mail" required>
                                       <div class="invalid-feedback">Svp entrer votre e-mail.</div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <label for="yourPassword" class="form-label">Mot de passe</label> 
                                    <input type="password" name="mot_passe" class="form-control" id="yourPassword" placeholder="Entrer mot de passe" required>
                                    <div class="invalid-feedback">Svp entrer votre mot de passe!</div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-check"> 
                                       <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                       <label class="form-check-label" for="rememberMe">Remember me</label></div>
                                 </div>
                                 <div class="col-12"> 
                                    <input class="btn btn-primary w-100" type="submit" value="Se connecter" name="connexion">
                                       
                                    <!-- <button class="btn btn-primary w-100" type="submit" name="connexion">
                                       Se connecter
                                    </button> -->
                                 </div>
                              </form>
                           </div>
                        </div>
                  
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </main>
      <?php include 'includes/foot.php' ?>
    </body>
</html>