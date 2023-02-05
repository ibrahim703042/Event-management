<?php 

   //$query=$bdd->query("SELECT * FROM utilisateurs ORDER BY id_utilisateur ASC");

?>

<div class="pagetitle">
   <h1>Utilisateur</h1>
   <nav>
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="dashboard.php?page=widget">Acceuil</a>
         <li class="breadcrumb-item ">Utlisateur</li>
         <li class="breadcrumb-item active">Table</li>
      </ol>
   </nav>
</div>
         <br>
<section class="section dashboard">
      <div class="row">
         <div class="col-lg-12">
            <div class="row">
               <div class="col-12">
                  <div class="card recent-sales overflow-auto">
                     <div class="card-heard mx-3 mt-3">
                        <a class="nav-link collapsed btn btn-success float-end text-white" href="dashboard.php?page=pages/users/participant/add_user"> 
                           <i class="bi bi-plus-circle-fill"></i> <span>Ajouter</span> 
                        </a>
                     </div>
                     <div class="filter mt-5">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                           <li class="dropdown-header text-start">
                           <h6>Filter</h6>
                           </li>
                           <li><a class="dropdown-item" href="#">Today</a></li>
                           <li><a class="dropdown-item" href="#">This Month</a></li>
                           <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                     </div>
                        <!-- table responsive -->
                     <div class="card-body">
                        <h5 class="card-title">List des Membres</h5>

                        <table class="table table-striped datatable" id="example">
        
                           <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Pays</th>
                                <th scope="col">Payé</th>
                                <th scope="col">Date</th>
                                <th scope="col" >Action </th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 /* $count = 1;
                                 while($data=$query->fetch()){
                                    
                                    ?>
                                       <tr>
                                          <td classe="text-center"><?php echo($count);?></td>
                                          <!-- <td classe="text-center"><?php echo($data['id_utilisateur']);?></td> -->
                                          <td classe="text-center">
                                             <img class="" src="assets/img/users_image/<?php echo($data['photo']);?>" alt="car-image" height="40" width="40" style="border-radius: 50px;" >
                                          </td>
                                          <td classe="text-center"><?php echo($data['nom'].' '.$data['prenom']);?></td>
                                          
                                          <td classe="text-center"><?php echo($data['pays']);?></td>
                                                      
                                          <?php 
                                             if ($data['status'] == 1){
                                                ?>
                                                <td classe="text-center">
                                                   <span class="badge bg-success">
                                                      <?php echo('OUI');?>
                                                   </span>
                                                </td>
                                                <?php	
                                             }
                                             else {
                                                ?>
                                                <td classe="text-center">
                                                   <span class="badge bg-danger">
                                                      <?php echo('NON');?>
                                                   </span>
                                                </td>
                                             <?php	
                                             }
                                             
                                          ?>

                                          

                                          <td > 
                                          <?php if ($data['status'] == 0){  ?>
                                             <a class="text-danger me-3" onclick="return confirm('Voulez-Vous comfirmer ?')" href="dashboard.php?page=pages/users/index&stat=<?php echo $data["id_utilisateur"]?>"><i class="bi bi-person-check-fill"></i></a>
                                             <?php }?>
                                             <a class="text-primary me-3" href="dashboard.php?page=pages/users/participant/profile&id=<?php echo($data['id_utilisateur']);?>">
                                                   <i class="bi bi-eye-fill"></i>
                                             </a>  
                                             
                                          </td>
                                       </tr>
                                       <?php $count=$count+1;?>
                                 
                           
                                    <?php
                                 } */
                                 $query ="SELECT * FROM utilisateurs";    
                                 $user->dataview($query);
                              ?>
                           </tbody>

                        </table>

                     </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
</section>


<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Voulez-vous vraiment supprimer ?');
}
</script>

<?php

   if(isset($_GET["supp"])){
      $idtodelete=$_GET["supp"];
      $delete=$bdd->EXEC("DELETE FROM utilisateurs WHERE id_utilisateur=$idtodelete");
   }

?>

<?php

   if(isset($_GET["stat"])){
      $id=$_GET["stat"];
      $statut=1;
      $update=$bdd->EXEC("UPDATE utilisateurs SET status='$statut' WHERE id_utilisateur=$id");

      if($update){

      ?>
         <script>
            document.location.reload();
            
         </script>
      <?php
      }
   }

?>