

<?php
   session_start();
   error_reporting(0);

   include '../database/db_connect.php';
   include '../app/function/function.php';

   if(isset($_POST) & !empty($_POST)){

      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, $_POST['mot_passe']);
      $encpass = $password;

      $check_email = "SELECT * FROM admins WHERE email = '$email' OR nom = '$email' AND mot_passe='$encpass' AND status_admin = '1' ";
      $res = mysqli_query($conn, $check_email);

         if(mysqli_num_rows($res) > 0){
            
            $_SESSION['auth'] = true;
            
            $userdata = mysqli_fetch_array($res);
            $userID = $userdata['ID'];
            $useremail = $userdata['email'];
            $userpassword = $userdata['mot_passe'];
            $username = $userdata['nom'];
            $status = $userdata['status_admin'];
            $role_as = $userdata['role_as'];

            if(password_verify($password, $userpassword)){

               $_SESSION['auth_user'] = [
                  'ID' => $userID,
                  'nom' => $username,
                  'email' => $useremail,
               ];
   
               $_SESSION['admin_ID'] = $userID;
               $_SESSION['role_as'] = $role_as;
               $_SESSION['status'] = $status;
   
               if($status == 1 ){

                  redirect('../admin-area/dashboard.php','Logged In Successfully');
   
               }else{
                  $_SESSION['error'] = "Your account was disabled Approach Admin";
               }
   
              
            }else{
               $_SESSION['error'] = "Incorrect email or password!";
            }


         }else{
            $_SESSION['error'] = "Your account was disabled Approach Admin";
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
                                    <label for="yourEmail" class="form-label">Nom utilasteur or E-mail</label>
                                    <div class="input-group has-validation">
                                       <input type="text" name="email" class="form-control" id="yourEmail" placeholder="Entrer e-mail" required>
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
                                    <input class="btn btn-primary w-100" type="submit" value="Se connecter" name="login_btn">
                                     
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