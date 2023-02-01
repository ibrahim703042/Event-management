<?php 
   $bdd=new PDO('mysql:host=localhost;dbname=event;charset=utf8','root','');
   $select=$bdd->query("SELECT * FROM utilisateurs WHERE id_utilisateur=".$_GET["id"]."");
   $data=$select->fetch();
?>

   <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
                  <span class="badge bg-danger">
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
                  <div class="tab-content pt-2">
                     <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <br>
                        
                        
                        <div class="row">
                           <div class="col-lg-3 col-md-4 label">Email</div>
                           <div class="col-lg-9 col-md-8"><?php echo $data["email"]?></div>
                        </div>
                        <div class="row">
                           <div class="col-lg-3 col-md-4 label">Telephone</div>
                           <div class="col-lg-9 col-md-8"><?php echo $data["numero_telephone"]?></div>
                        </div>
                        <div class="row">
                           <div class="col-lg-3 col-md-4 label">N° Passport</div>
                           <div class="col-lg-9 col-md-8"><?php echo $data["passport"]?></div>
                        </div>
                        <div class="row">
                           <div class="col-lg-3 col-md-4 label">Nom Rotary</div>
                           <div class="col-lg-9 col-md-8"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e982c788878d8c9b9a8687a98c91888499858cc78a8684"><?php echo $data["rotary"]?></a></div>
                        </div>
                        <div class="row">
                           <div class="col-lg-3 col-md-4 label">Pays</div>
                           <div class="col-lg-9 col-md-8"><?php echo $data["pays"]?></div>
                        </div>
                        
                     </div>
                     <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                        <form method="POST">
                           <div class="row mb-3">
                              <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                              <div class="col-md-8 col-lg-9">
                                 <img src="assets/img/users_image/<?php echo($data['photo']);?>" alt="Profile">
                                 <div class="pt-2"> <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a> <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a></div>
                              </div>
                           </div>
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
                     <div class="tab-pane fade pt-3" id="profile-settings">
                        <form>
                           <div class="row mb-3">
                              <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                              <div class="col-md-8 col-lg-9">
                                 <div class="form-check"> <input class="form-check-input" type="checkbox" id="changesMade" checked> <label class="form-check-label" for="changesMade"> Changes made to your account </label></div>
                                 <div class="form-check"> <input class="form-check-input" type="checkbox" id="newProducts" checked> <label class="form-check-label" for="newProducts"> Information on new products and services </label></div>
                                 <div class="form-check"> <input class="form-check-input" type="checkbox" id="proOffers"> <label class="form-check-label" for="proOffers"> Marketing and promo offers </label></div>
                                 <div class="form-check"> <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled> <label class="form-check-label" for="securityNotify"> Security alerts </label></div>
                              </div>
                           </div>
                           <div class="text-center"> <button type="submit" class="btn btn-primary">Save Changes</button></div>
                        </form>
                     </div>
                     <div class="tab-pane fade pt-3" id="profile-change-password">
                        <form>
                           <div class="row mb-3">
                              <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                              <div class="col-md-8 col-lg-9"> <input name="password" type="password" class="form-control" id="currentPassword"></div>
                           </div>
                           <div class="row mb-3">
                              <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                              <div class="col-md-8 col-lg-9"> <input name="newpassword" type="password" class="form-control" id="newPassword"></div>
                           </div>
                           <div class="row mb-3">
                              <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                              <div class="col-md-8 col-lg-9"> <input name="renewpassword" type="password" class="form-control" id="renewPassword"></div>
                           </div>
                           <div class="text-center"> <button type="submit" class="btn btn-primary">Change Password</button></div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <section class="section profile">
      <div class="row">
         
         <div class="col-xl-8">
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
         
      }
   ?>