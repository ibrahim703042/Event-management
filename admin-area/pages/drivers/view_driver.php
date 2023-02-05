
<?php

if(isset($_GET['view_driver_id'])){
    
    $id = $_GET['view_driver_id'];
    extract($driver->getID($id));	
}
?>


<div class="pagetitle">
<h1>Profile</h1>
<nav>
  <ol class="breadcrumb">
     <li class="breadcrumb-item"><a href="dashboard.php?page=widget">Acceuil</a>
     <li class="breadcrumb-item">Chauffeur</li>
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

           <img src="assets/img/avatars/drivers/<?= $photo?>" alt="<?= $nom_complet?>" class="rounded w-100">
            <div class="social-links mt-2"> 
                    <h2><?= $nom_complet ?></h2>
                    
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
                    <div class="col-lg-3 col-md-4 label">Nom complet</div>
                    <div class="col-lg-9 col-md-8"><?= $nom_complet ?></div>
                 </div>

                 <div class="row">
                    <div class="col-lg-3 col-md-4 label">Numero de telephone</div>
                    <div class="col-lg-9 col-md-8">
                       <a href="/cdn-cgi/l/email-protection">
                          <?= $numero_telephone ?>
                       </a>
                    </div>
                 </div>

                 <div class="row">
                    <div class="col-lg-3 col-md-4 label">Numero de permis</div>
                    <div class="col-lg-9 col-md-8"><?= $numero_permis_conduir ?></div>
                 </div>

                 <div class="row">
                    <div class="col-lg-3 col-md-4 label">Addresse</div>
                    <div class="col-lg-9 col-md-8"><?= $addresse ?></div>
                 </div>
                 
                 <div class="row">
                    <div class="col-lg-3 col-md-4 label">Date</div>
                    <div class="col-lg-9 col-md-8"><?= $date_chauffeur ?></div>
                    
                 </div>

                 <div class="row">

                 <div class="col-lg-3 col-md-4 label">Status</div>
                    <div class="col-lg-4 col-md-4">
                       <?php 
                          if ($status_chauffeur == 0){

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
                          
                        <a href="dashboard.php?page=pages/drivers/edit_driver&edit_id=<?= $id_chauffeur ?>">
                          <button class=" btn btn-sm btn-info border border-0" onClick="return confirm('Do you really want to update');">
                              <i class="bi bi-pencil me-2"></i>Modifier 
                           </button>
                        </a>
                          
                        <a class="  me-3" href="dashboard.php?page=pages/drivers/index&delete_id=<?= $id_chauffeur ?>" >
                           
                           <button class=" btn btn-danger btn-sm border border-0" onClick="return confirm('Do you really want to delete');">
                              <i class="bi bi-trash me-2"></i>Supprimer
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

                          <img src="assets/img/avatars/drivers/<?= $photo?>" alt="Profile">
                          <input type="hidden" value="<?= $photo?>" name="old_image">

                          <div class="pt-2">
                        
                             <span class="" title="Upload new profile image">
                                <input type="file" name="file">
                                <button type="submit" class="btn btn-success" name="update_driver_image_btn">
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

   if(isset($_POST["update_driver_image_btn"])){

      $target= $_FILES['file']['name'];
      
      $old_image= $_POST["old_image"];
   
      $newImage = $_FILES['file']['name'];
   
      if( $newImage != "" ){
         $target = $newImage;
      }else{
         $target = $old_image;
         redirect('dashboard.php?page=pages/drivers/index','Data Updated Successfully');
   
      }

      $query=$bdd->EXEC("UPDATE chauffeurs SET photo='$target' WHERE id_chauffeur=".$_GET["view_driver_id"]."");
      //$query = $admin->update_image($id,$target);

      if($query){

         move_uploaded_file($_FILES["file"]["tmp_name"],"assets/img/avatars/drivers/".basename($_FILES['file']['name']));
         redirect('dashboard.php?page=pages/drivers/index','Data Updated Successfully');

      }else{
         error('dashboard.php?page=pages/driver/index','Something went wrong!');
      }

   }

?>