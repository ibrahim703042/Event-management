
<?php

    if(isset($_GET['view_id'])){
        
        $id = $_GET['view_id'];
        extract($admin->getID($id));	
    }
?>


<div class="pagetitle">
   <h1>Profile</h1>
   <nav>
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="dashboard.php?page=widget">Acceuil</a>
         <li class="breadcrumb-item">Administrateur</li>
         <li class="breadcrumb-item active">Profile</li>
      </ol>
   </nav>
</div>

<section class="section profile">
   <div class="row">

      <!-- profile only -->
      <div class="col-xl-4">

         <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

               <img src="<?= $profile?>" alt="<?= $nom?>" class="rounded-circle">
               
               <h2><?= $nom ?></h2>
               <h3><?= $email ?></h3>

               <div class="social-links mt-2"> 
                  
                  <?php 
                     if ($role_as == 1){

                        ?>
                           <td classe="text-center">
                              <span class="badge bg-success">
                                 <?=('Super administrateur');?>
                              </span>
                           </td>
                        <?php	

                     }
                     else {
                        ?>
                           <td classe="text-center">
                              <span class="badge bg-danger">
                                 <?=('Administrateur');?>
                              </span>
                           </td>
                        <?php	
                     }
                  ?>

               </div>

            </div>
         </div>

      </div>

      <!-- start scrollable id -->
      <div class="col-xl-8">
         <div class="card">
            <div class="card-body pt-3">

               <ul class="nav nav-tabs nav-tabs-bordered">

                  <li class="nav-item"> 
                     <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">
                        Overview
                     </button>
                  </li>
                  <li class="nav-item"> 
                     <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">
                        Modifier
                     </button>
                  </li>
                  <li class="nav-item"> 
                     <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">
                        Changer mot de passe
                     </button>
                  </li>

               </ul>
               
               <!-- start scrollable of content id -->
               <div class="tab-content pt-2">

                  <!-- ooverview  -->

                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                     <br>
                     <div class="row">
                        <div class="col-lg-3 col-md-4 label">Nom d'utilisateur</div>
                        <div class="col-lg-9 col-md-8"><?= $nom ?></div>
                     </div>

                     <div class="row">
                        <div class="col-lg-3 col-md-4 label">Email</div>
                        <div class="col-lg-9 col-md-8">
                           <a href="/cdn-cgi/l/email-protection">
                              <?= $email ?>
                           </a>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-lg-3 col-md-4 label">Telephone</div>
                        <div class="col-lg-9 col-md-8"><?= $telephone ?></div>
                     </div>
                     
                     <div class="row">
                        <div class="col-lg-3 col-md-4 label">Date</div>
                        <div class="col-lg-9 col-md-8"><?= $date_admin ?></div>
                        
                     </div>

                     <div class="row">

                     <div class="col-lg-3 col-md-4 label">Status</div>
                        <div class="col-lg-4 col-md-4">
                           <?php 
                              if ($status_admin == 1){

                                 ?>
                                    <td classe="text-center">
                                       <span class="badge bg-success">
                                          <?=('Actif');?>
                                       </span>
                                    </td>
                                 <?php	

                              }
                              else {
                                 ?>
                                    <td classe="text-center">
                                       <span class="badge bg-danger">
                                          <?=('Inactif');?>
                                       </span>
                                    </td>
                                 <?php	
                              }
                           ?>
                        </div>
                        <div class="col-lg-5 col-md-5">
                           <a href="dashboard.php?page=pages/users/admin/edit_admin&edit_id=<?= $ID ?>">
                              Modifier le status
                           </a>
                        </div>

                     </div>
                     
                  </div>
                  
                  <!-- update form profile detail -->

                  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                     <!-- start form of update profile detail -->
                     <form method="POST" enctype="multipart/form-data">

                        <div class="row mb-3">

                           <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                           <div class="col-md-8 col-lg-9">

                              <img src="<?= $profile?>" alt="Profile">
                              <input type="hidden" value="<?= $profile?>" name="old_image">

                              <div class="pt-2">
                            
                                 <span class="" title="Upload new profile image">
                                    <input type="file" name="file">
                                    <button type="submit" class="btn btn-success" name="update_image_btn">
                                       <i class="bi bi-upload"></i>
                                    </button>
                                 </span>
                                 
                                 <!-- <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image">
                                    <i class="bi bi-trash"></i>
                                 </a> -->
                              </div>

                           </div>

                        </div>

                     </form>

                     <form method="POST" >
                        <div class="row mb-3">
                           <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom d'utilisateur</label>
                           <div class="col-md-8 col-lg-9"> 
                              <input name="nom" type="text" class="form-control" id="fullName" value="<?= $nom?>">
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="Job" class="col-md-4 col-lg-3 col-form-label">Email</label>
                           <div class="col-md-8 col-lg-9"> 
                              <input name="mail" type="text" class="form-control" id="Job" value="<?= $email?>">
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="Country" class="col-md-4 col-lg-3 col-form-label">Telephone</label>
                           <div class="col-md-8 col-lg-9"> 
                              <input name="phone" type="text" class="form-control" id="Country" value="<?= $telephone?>">
                           </div>
                        </div>

                        <!-- role -->
                        <div class="row mb-3">

                           <label for="role" class="col-md-4 col-lg-3 col-form-label">Role</label>
                           <div class="col-md-8 col-lg-9">
                              <select class="form-select" name="role" aria-label="Default select example">

                                 <option selected value="<?= $role_as?>">
                                    <?php 
                                       if ($role_as == 1){

                                          ?>
                                             
                                             <?=('Super administrateur');?>
                                                
                                          <?php	

                                       }
                                       else {
                                          ?>
                                             <?=('Administrateur');?>
                                                
                                          <?php	
                                       }
                                    ?>
                                 </option>
                                 
                                 <option disabled>Choisir</option>
                                 <option value="0">Administrateur</option>
                                 <option value="1">Super administrateur</option>
                              </select> 
                           </div>

                        </div>

                        <!-- status -->
                        <div class="row mb-3">

                           <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Status</label>
                           <div class="col-md-8 col-lg-9">
                              
                              <div class="form-check">
                                 <label class="form-check-label" for="">
                                    Etat
                                 </label>
                                 <input class="form-check-input" type="checkbox" name="status" <?= $status_admin == '0' ? '':'checked'?>  value="" id="">
                              </div>
                           </div>
                        </div>
                        
                        <div class="text-end"> 
                           <input type="submit" name="update_profil_btn" value="Modifier" class="btn btn-primary">
                        </div>

                     </form>

                  </div>

                  <!-- change Password -->
                  <div class="tab-pane fade pt-3" id="profile-change-password">

                     <!-- start form update password -->
                     <form method="POST">

                        <div class="row mb-3">
                           <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Ancien mot de passe</label>
                           <div class="col-md-8 col-lg-9"> 
                              <input name="password" type="password" class="form-control"  id="currentPassword" placeholder="Entrer ancien mot de passe">
                              <input name="old_password" type="hidden" class="form-control" value="<?= $mot_passe ?>"  id="currentPassword" placeholder="Entrer ancien mot de passe">
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nouveau mot de passe</label>
                           <div class="col-md-8 col-lg-9"> 
                              <input name="newpassword" type="password" class="form-control" id="newPassword" placeholder="Entrer nouvelle mot de passe">
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirmer votre mot de passe </label>
                           <div class="col-md-8 col-lg-9"> 
                              <input name="renewpassword" type="password" class="form-control" id="renewPassword" placeholder="Entrer confirmer mot de passe">
                           </div>
                        </div>

                        <div class="text-end"> 
                           <button type="update_password_btn" class="btn btn-primary">
                              Confirmer
                           </button>
                        </div>
                     </form>

                  </div>

               </div>

            </div>
         </div>
      </div>

   </div>
</section>


<?php

   if(isset($_POST['update_image_btn'])){


      $target="assets/img/avatars/profile/".basename($_FILES['file']['name']);
      
      $query = $admin->update_image($id,$target);

      if($query){

         move_uploaded_file($_FILES["file"]["tmp_name"],$target);
         redirect('dashboard.php?page=pages/users/admin/profile&','Data Updated Successfully');

      }else{
         error('dashboard.php?page=pages/users/admin/profile','Something went wrong!');            
      }

   }

   if(isset($_POST['update_profil_btn'])){

   $username = $_POST['nom'];
   $email = $_POST['mail'];
   //$password = $_POST['password'];
   $phone = $_POST['phone'];
   $role = $_POST['role'];
   $status = isset($_POST['status']) ? '0':'1' ;

      
      $query = $admin->update_profile($id,$username,$email,$phone,$role,$status);

      if($query){

         //move_uploaded_file($_FILES["file"]["tmp_name"],$target);
         redirect('dashboard.php?page=pages/users/admin/profile','Data Updated Successfully');

      }else{
         error('dashboard.php?page=pages/users/admin/profile','Something went wrong!');            
      }

   }

   if(isset($_POST['update_password_btn'])){

      $old_password = $_POST['old_password'];
      $password = $_POST['password'];
      $new_password = $_POST['newpassword'];
      $confrm_password = $_POST['renewpassword'];

      $enc_old_pass = password_hash($password, PASSWORD_BCRYPT);

      if($old_password != $enc_old_pass ){
         echo "<script>alert('Enregistrement a échoué !')</script>";
         error('dashboard.php?page=pages/users/admin/profile','Your old password is incorrect!');  
      }else{

         if($new_password == $confrm_password ){

            $encpass = password_hash($new_password, PASSWORD_BCRYPT);
            $query = $admin->update_password($id,$encpass);

            if($query){

                  redirect('dashboard.php?page=pages/users/admin/profile','Password Updated Successfully');

            }else{
                  error('dashboard.php?page=pages/users/admin/profile','Password does not match!');            
            }
         }

      }

   }

?>