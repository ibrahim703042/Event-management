<?php 
   $bdd=new PDO('mysql:host=localhost;dbname=event;charset=utf8','root','');
   $select=$bdd->query("SELECT * FROM utilisateurs WHERE id_utilisateur=".$_GET["id"]."");
   $data=$select->fetch();
?>

   <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php?page=widget">Acceuil</a></li>
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item active">Profile</li>
         </ol>
      </nav>
   </div>
   <section class="section profile">
      <div class="row">
         <div class="col-xl-4">
            <div class="card">
               <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                  <img src="assets/img/users_image/<?php echo($data['photo']);?>" alt="Profile" class="rounded-circle">
                  <h2><?php echo $data["nom"]?></h2>
                  <h3><?php echo $data["prenom"]?></h3>
                  <div class="social-links mt-2"> 
                     
                        <?php 
                           if ($data['status'] == 1){
                              ?>
                              <td classe="text-center">
                                 <span class="badge bg-success">
                                    <?php echo('Payé');?>
                                 </span>
                              </td>
                              <?php	
                           }
                           else {
                              ?>
                              <td classe="text-center">
                                 <span class="badge bg-warning">
                                    <?php echo('Pas encore payé');?>
                                 </span>
                              </td>
                           <?php	
                           }
                  
                        ?>

                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-8">
            <div class="card">
               <div class="card-body pt-3">
                  <ul class="nav nav-tabs nav-tabs-bordered">
                     <li class="nav-item"> <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button></li>
                     <li class="nav-item"> <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Modifier</button></li>
                  </ul>


               <!-- start scrollable of content id -->
               <div class="tab-content pt-2">

                  <!-- ooverview  -->

                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                     <br>
                     <div class="row">
                        <div class="col-lg-3 col-md-4 label">Nom</div>
                        <div class="col-lg-9 col-md-8"><?php echo $data["nom"]?> </div>
                     </div>

                     <div class="row">
                        <div class="col-lg-3 col-md-4 label">Prenom</div>
                        <div class="col-lg-9 col-md-8"><?php echo $data["prenom"]?> </div>
                     </div>

                     <div class="row">
                        <div class="col-lg-3 col-md-4 label">Email</div>
                        <div class="col-lg-9 col-md-8">
                           <a href="#">
                              <?php echo $data["email"]?>
                           </a>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-lg-3 col-md-4 label">Telephone</div>
                        <div class="col-lg-9 col-md-8">
                           <a href="#">
                              <?php echo $data["numero_telephone"]?>
                           </a>
                        </div>
                     </div>

                     <div class="row">
                           <div class="col-lg-3 col-md-4 label">N° Passport</div>
                           <div class="col-lg-9 col-md-8"><?php echo $data["passport"]?></div>
                     </div>
                     
                     <div class="row">
                        <div class="col-lg-3 col-md-4 label">Date</div>
                        <div class="col-lg-9 col-md-8"><?=  $data['date_utilisateur'] ?></div>
                        
                     </div>

                     <div class="row">

                        <div class="col-lg-3 col-md-4 label"> Status de payement</div>
                           <div class="col-lg-4 col-md-4">
                              <?php 
                                 if ($data['status'] == 1){
                                    ?>
                                    <td classe="text-center">
                                       <span class="badge bg-success">
                                          <?php echo('Payé');?>
                                       </span>
                                    </td>
                                    <?php	
                                 }
                                 else {
                                    ?>
                                    <td classe="text-center">
                                       <span class="badge bg-warning">
                                          <?php echo('Pas encore payé');?>
                                       </span>
                                    </td>
                                 <?php	
                                 }
                              ?>
                           </div>
                           <div class="col-lg-5 col-md-5">

                              <a href="dashboard.php?page=pages/users/participant/approve_payement&edit_id=<?= $id_utilisateur ?>">
                                 <button class=" btn btn-sm btn-info border border-0" onClick="return confirm('Do you really want to update');">
                                    <i class="bi bi-pencil me-2"></i>Approuver le payement
                                 </button>
                              </a>
                              <!-- <a class="  me-3" href="dashboard.php?page=pages/users/admin/delete&delete_id=<?= $_GET["id"] ?>" >
                                    
                                    <button class=" btn btn-danger btn-sm border border-0" onClick="return confirm('Do you really want to delete');">
                                       <i class="bi bi-trash me-2"></i>Supprimer
                                    </button>
                                    
                              </a> -->

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

                                 <img src="assets/img/users_image/<?php echo($data['photo']);?>" alt="Profile">
                                 <input type="hidden" value="<? echo($data['photo']);?>" name="old_image">

                                 <div class="pt-2">
                              
                                    <span class="" title="Upload new profile image">
                                       <input type="file" name="file">
                                       <button type="submit" class="btn btn-success" name="update_user_image_btn">
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

                        <form method="POST">
                           <div class="row mb-3">
                              <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom</label>
                              <div class="col-md-8 col-lg-9"> <input name="nom" type="text" class="form-control" id="fullName" value="<?php echo $data["nom"]?>"></div>
                           </div>
                           
                           <div class="row mb-3">
                              <label for="company" class="col-md-4 col-lg-3 col-form-label">Prenom</label>
                              <div class="col-md-8 col-lg-9"> <input name="prenom" type="text" class="form-control" id="company" value="<?php echo $data["prenom"]?>"></div>
                           </div>
                           <div class="row mb-3">
                              <label for="Job" class="col-md-4 col-lg-3 col-form-label">Email</label>
                              <div class="col-md-8 col-lg-9"> <input name="mail" type="text" class="form-control" id="Job" value="<?php echo $data["email"]?>"></div>
                           </div>
                           <div class="row mb-3">
                              <label for="Country" class="col-md-4 col-lg-3 col-form-label">Telephone</label>
                              <div class="col-md-8 col-lg-9"> <input name="phone" type="text" class="form-control" id="Country" value="<?php echo $data["numero_telephone"]?>"></div>
                           </div>
                           <div class="row mb-3">
                              <label for="Address" class="col-md-4 col-lg-3 col-form-label">N° Passport</label>
                              <div class="col-md-8 col-lg-9"> <input name="passport" type="text" class="form-control" id="Address" value="<?php echo $data["passport"]?>"></div>
                           </div>
                           <div class="row mb-3">
                              <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Pays</label>
                              <div class="col-md-8 col-lg-9"> <input name="pays" type="text" class="form-control" id="Address" value="<?php echo $data["pays"]?>"></div>
                           </div>
                           <div class="row mb-3">
                              <label for="Email" class="col-md-4 col-lg-3 col-form-label">Nom Rotary</label>
                              <div class="col-md-8 col-lg-9"> <input name="rotary" type="text" class="form-control" id="Email" value="<?php echo $data["rotary"]?>"></div>
                           </div>
                           <div class="text-center"> <input type="submit" name="submit" value="modifier" class="btn btn-primary"></div>
                        </form>

                     </div>

                  </div>
                  


               </div>

            </div>
         </div>
      </div>
   </section>

   <!-- Event session -->

   <section class="section profile">
      <div class="row">
         
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body pt-3">
                  <ul class="nav nav-tabs nav-tabs-bordered">
                     <li class="nav-item"> <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Soirees</button></li>
                     </ul>
                  <div class="tab-content pt-2">
                     <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <br>
                        
                        <?php 
                        $select=$bdd->query("SELECT * FROM utilisateurs u, soiree s WHERE u.id_utilisateur= s.id_utilisateur AND u.id_utilisateur=".$_GET["id"]."");
                        while($data=$select->fetch()){
                        ?>
                        <div class="row">
                           <div class="col-lg-3 col-md-4 label">Nom Soiree</div>
                           <div class="col-lg-9 col-md-8"><?php echo $data["nom_soiree"]?></div>
                        </div>
                        
                        
                        <?php } ?>
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- <script src="//cdn.tutorialjinni.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="//cdn.tutorialjinni.com/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
   <script src="//g.tutorialjinni.com/mojoaxel/bootstrap-select-country/dist/js/bootstrap-select-country.min.js"></script> -->
   
   <?php
      if(isset($_POST["submit"])){
         $nom=$_POST["nom"];
         $prenom=$_POST["prenom"];
         $mail=$_POST["mail"];
         $telephone=$_POST["phone"];
         $passport=$_POST["passport"];
         $pays=$_POST["pays"];
         $rotary=$_POST["rotary"];

         $update=$bdd->EXEC("UPDATE utilisateurs SET nom='$nom',prenom='$prenom',email='$mail',numero_telephone='$telephone',passport='$passport',pays='$pays',rotary='$rotary' WHERE id_utilisateur=".$_GET["id"]."");
         redirect('dashboard.php?page=pages/users/participant/index','Data updated Successfully');
      }

      if(isset($_POST["update_user_image_btn"])){
         
         $old_image= $_POST["old_image"];

         $newImage = $_FILES['file']['name'];
    
         if( $newImage != "" ){
            $target = $newImage;
         }else{
            $target = $old_image;
            redirect('dashboard.php?page=pages/users/admin/index','Profile updated Successfully');

         }
         
         move_uploaded_file($_FILES["file"]["tmp_name"],"assets/img/users_image/".basename($_FILES['file']['name']));
         $update=$bdd->EXEC("UPDATE utilisateurs SET photo='$target' WHERE id_utilisateur=".$_GET["id"]."");
         redirect('dashboard.php?page=pages/users/participant/index','Profile updated Successfully');
      }
   ?>
   