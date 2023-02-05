
<?php include '../../../database/db_connect.php';

   $id =  isset($_GET['id']) ? $_GET['id']: '';

   $select=$bdd->query("SELECT * FROM participants WHERE id_participant=".$id);
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
            <img src="assets/img/user.png" alt="Profile" class="rounded-circle">
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
                     <div  class="col-lg-3 col-md-4 label">Hotel</div>
                     <div class="col-lg-9 col-md-8"><?php echo $data["hotel"]?></div>
                  </div>
                  <div class="row">
                     <div  class="col-lg-3 col-md-4 label">Nom Badge</div>
                     <div class="col-lg-9 col-md-8"><?php echo $data["nom_badge"]?></div>
                  </div>

                  <div class="row">
                     <div  class="col-lg-3 col-md-4 label">Email</div>
                     <div class="col-lg-9 col-md-8"><?php echo $data["email"]?></div>
                  </div>
                  <div class="row">
                     <div  class="col-lg-3 col-md-4 label">Téléphone</div>
                     <div class="col-lg-9 col-md-8"><?php echo $data["telephone1"].' ou '.$data["telephone2"]?></div>
                  </div>
                  <div class="row">
                     <div  class="col-lg-3 col-md-4 label">Pays</div>
                     <div class="col-lg-9 col-md-8">
                        <script>
         
                           document.write(countries["<?php echo $data['pays'];?>"]);
                     
                        </script>
                  </div>
                  </div>
                  <div class="row">
                     <div  class="col-lg-3 col-md-4 label">Classification</div>
                     <div class="col-lg-9 col-md-8"><?php echo $data["classification"]?></div>
                  </div>
                  <div class="row">
                     <div  class="col-lg-3 col-md-4 label">Nom Rotary</div>
                     <div class="col-lg-9 col-md-8"><?php echo $data["club"]?></div>
                  </div>
                  <div class="row">
                     <div  class="col-lg-3 col-md-4 label">Activité Choisi</div>
                     <div class="col-lg-9 col-md-8"><?php echo $data["activite_choisie"]?></div>
                  </div>
                  <div class="row">
                     <div  class="col-lg-3 col-md-4 label">Fonction Club</div>
                     <div class="col-lg-9 col-md-8"><?php echo $data["fonction_club"]?></div>
                  </div>
                  <div class="row">
                     <div  class="col-lg-3 col-md-4 label">Fonction District</div>
                     <div class="col-lg-9 col-md-8"><?php echo $data["fonction_district"]?></div>
                  </div>
                  
                  <div class="row">
                     <div  class="col-lg-3 col-md-4 label">Distinction Rotary</div>
                     <div class="col-lg-9 col-md-8"><?php echo $data["distinction_rotary"]?></div>
                  </div>
                  <div class="row">
                     <div  class="col-lg-3 col-md-4 label">invité</div>
                     <div class="col-lg-9 col-md-8"><?php echo $data["invite"]?></div>
                  </div>
                  <div class="row">
                     <div  class="col-lg-3 col-md-4 label">Date d'arrive</div>
                     <div class="col-lg-9 col-md-8"><?php echo $data["date_arrive"]?></div>
                  </div>
                  <div class="row">
                     <div  class="col-lg-3 col-md-4 label">Date Depart</div>
                     <div class="col-lg-9 col-md-8"><?php echo $data["date_depart"]?></div>
                  </div>
                  <div class="row">
                     <div  class="col-lg-3 col-md-4 label">Vol</div>
                     <div class="col-lg-9 col-md-8"><?php echo $data["vol"]?></div>
                  </div>
                  <div class="row">
                     <div  class="col-lg-3 col-md-4 label">Numero Vol</div>
                     <div class="col-lg-9 col-md-8"><?php echo $data["numero_vol"]?></div>
                  </div>
                  <div class="row">
                     <div  class="col-lg-3 col-md-4 label">Groupe Sanguin</div>
                     <div class="col-lg-9 col-md-8"><?php echo $data["groupe_sanguin"]?></div>
                  </div>
                  
                  <div class="row">
                     <div  class="col-lg-3 col-md-4 label">Antécedent medicaux</div>
                     <div class="col-lg-9 col-md-8"><?php echo $data["antecedent_med"]?></div>
                  </div>
                  <div class="row">
                     <div  class="col-lg-3 col-md-4 label">Antecédent chirurgicaux</div>
                     <div class="col-lg-9 col-md-8"><?php echo $data["antecedent_chir"]?></div>
                  </div>
                  <div class="row">
                     <div  class="col-lg-3 col-md-4 label">Particularités culinaires</div>
                     <div class="col-lg-9 col-md-8"><?php echo $data["particularite"]?></div>
                  </div>
                  
                  
                  
               </div>
               <div class="tab-pane fade show profile-edit pt-3" id="profile-edit">
               
               <form method="POST">
                                                   
                     <br>
                     <div class="row">
                  
            </div>
         </div>
      </div>
   </div>
</div>

</section>

      
   