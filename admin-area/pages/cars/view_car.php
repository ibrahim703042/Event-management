
<?php

if(isset($_SESSION['auth'])){


   if(isset($_SESSION['admin_ID'])){

      if(isset($_REQUEST['view_car_id'])){
         
         $id = $_GET['view_car_id'];
         extract($car->getAllByID($id));	
         ?>

            <div class="pagetitle">
               <h1>Voiture</h1>
               <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php?page=widget">Acceuil</a>
                  <li class="breadcrumb-item">Voiture</li>
                  <li class="breadcrumb-item active">Detail</li>
               </ol>
               </nav>
            </div>

            <section class="section profile">
               <div class="row">

               <!-- profile only -->
               <div class="col-xl-4">

                  <div class="card">
                     <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="assets/img/avatars/cars/<?= $photo_vehicule?>" alt="<?= $nom_complet?>" class="rounded w-100">
                           <div class="social-links mt-2"> 
                                 <h2><?= $nom_marque ?></h2>
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
                                 Changer image
                              </button>
                           </li>
                           
                        </ul>
                        
                        <!-- start scrollable of content id -->
                        <div class="tab-content pt-2">

                           <!-- profile-overview  -->

                           <div class="tab-pane fade show active profile-overview" id="profile-overview">
                              <br>
                              <div class="row">
                                 <div class="col-lg-3 col-md-4 label">Marque</div>
                                 <div class="col-lg-9 col-md-8"><?= $nom_marque ?></div>
                              </div>

                              <div class="row">
                                 <div class="col-lg-3 col-md-4 label">Modele</div>
                                 <div class="col-lg-9 col-md-8">
                                    <a href="/cdn-cgi/l/email-protection">
                                       <?= $modele ?>
                                    </a>
                                 </div>
                              </div>

                              <div class="row">
                                 <div class="col-lg-3 col-md-4 label">Numero de plaque</div>
                                 <div class="col-lg-9 col-md-8"><?= $plaque ?></div>
                              </div>

                                 <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Chauffeur</div>
                                    <div class="col-lg-9 col-md-8"><?= $numero_telephone ?></div>
                                 </div>
                                 
                                 <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Date</div>
                                    <div class="col-lg-9 col-md-8"><?= $date_voiture ?></div>
                                    
                                 </div>

                              <div class="row">

                                 <!-- <div class="col-lg-3 col-md-4 label">Status</div>
                                    <div class="col-lg-4 col-md-4">
                                       <?php 
                                          if ($status_driver == 1){

                                             ?>
                                                <td classe="text-center">
                                                   <span class="badge bg-success">
                                                      <?=('Libre');?>
                                                   </span>
                                                </td>
                                             <?php	

                                          }
                                          else {
                                             ?>
                                                <td classe="text-center">
                                                   <span class="badge bg-danger">
                                                      <?=('Occuper');?>
                                                   </span>
                                                </td>
                                             <?php	
                                          }
                                       ?>
                                    </div>
                                 
                                       <div class="col-lg-5 col-md-5">
                                          
                                          <a href="dashboard.php?page=pages/driver/edit_driver&profil_driver_id=<?= $id_chauffeur ?>">
                                          <button class=" btn  btn-danger border border-0" onClick="return confirm('Do you really want to update');">
                                                Modifier 
                                             </button>
                                          </a>

                                          <a class="  text-info me-3" href="dashboard.php?page=pages/drivers/delete&delete_id=<?= $id_chauffeur ?>" >
                                             
                                             <button class=" btn  btn-danger border border-0" onClick="return confirm('Do you really want to delete');">
                                                Supprimer
                                             </button>
                                             
                                          </a>
                                    
                                       </div>
                                 
                                 </div> -->

                                 <div class="col-lg-5 col-md-5">
                                  
                                    <a href="dashboard.php?page=pages/cars/edit_car&predir_car_id=<?= $id_voiture ?>">
                                    <button class=" btn  btn-danger border border-0" onClick="return confirm('Do you really want to update');">
                                          Modifier 
                                       </button>
                                    </a>

                                    <a class="  text-info me-3" href="dashboard.php?page=pages/cars/delete&delete_id=<?= $id_voiture ?>" >
                                       
                                       <button class=" btn  btn-danger border border-0" onClick="return confirm('Do you really want to delete');">
                                          Supprimer
                                       </button>
                                       
                                    </a>
                              
                                 </div>

                              </div>
                           </div>
                           <!-- update form profile detail -->

                           <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                              <!-- change profile -->
                              <form method="POST" enctype="multipart/form-data">

                                 <div class="row mb-3">

                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                    <div class="col-md-8 col-lg-9">

                                       <img src="assets/img/avatars/cars/<?= $photo_vehicule?>" alt="Profile">
                                       <input type="hidden" value="<?= $photo_vehicule?>" name="old_image">

                                       <div class="pt-2">
                                       
                                          <span class="" title="Upload new profile image">
                                             <input type="file" name="file">
                                             <button type="submit" class="btn btn-success" name="update_cars_image_btn">
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

                           </div>

                        </div>

                     </div>
                  </div>
               </div>

               </div>
            </section>
         
         <?php
      }

   }
}
    
?>


<?php 

if(isset($_POST["update_cars_image_btn"])){
            
   $old_image= $_POST["old_image"];

   $newImage = $_FILES['file']['name'];

   if( $newImage != "" ){
      $target = $newImage;
   }else{
      $target = $old_image;
      redirect('dashboard.php?page=pages/cars/index','Data Updated Successfully');

   }

      
      $query = $admin->update_image($id,$target);

      if($query){

         move_uploaded_file($_FILES["file"]["tmp_name"],"assets/img/avatars/cars/".basename($_FILES['file']['name']));

         // move_uploaded_file($_FILES["file"]["tmp_name"],"assets/img/cars_image/".basename($_FILES['file']['name']));
         redirect('dashboard.php?page=pages/cars/index','Data Updated Successfully');

      }else{
         error('dashboard.php?page=pages/carsadmin','Something went wrong!');            
      }
   
   /* $update=$bdd->EXEC("UPDATE utilisateurs SET photo='$target' WHERE id_utilisateur=".$_GET["id"]."");
   redirect('dashboard.php?page=pages/users/participant/index','Profile updated Successfully'); */
}

?>