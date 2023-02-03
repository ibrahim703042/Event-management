<?php 
   
   if(!isset($_SESSION['auth'])){
    
        header('Location:../../../index.php');
    }

?>

<?php 

   $query=$bdd->query("SELECT * FROM admins ORDER BY ID ASC");
   

?>

<div class="pagetitle">
   <h1>Administrateur</h1>
   <nav>
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="dashboard.php?page=widget">Acceuil</a>
         <li class="breadcrumb-item ">Administrateur</li>
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
                        <a class="nav-link collapsed btn btn-success float-end text-white" href="dashboard.php?page=pages/users/admin/add_admin"> 
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
                        <h5 class="card-title">List des Admistrateur</h5>

                        <table class="table table-striped datatable" id="example">
        
                           <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Profile</th>
                                <th scope="col">Nom</th>
                                <!-- <th scope="col">E-mail</th> -->
                                <!-- <th scope="col">Telephone</th> -->
                                <th scope="col">Role</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                                <th scope="col" >Action </th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 $count = 1;
                                 while($data=$query->fetch()){
                                    
                                    ?>
                                       <tr>
                                          <td classe="text-center"><?php echo($count);?></td>
                                          <!-- <td classe="text-center"><?php echo($data['id_utilisateur']);?></td> -->
                                          <td classe="text-center">
                                             <img class="" src="assets/img/users_image/<?php echo($data['profile']);?>" alt="<?php echo($data['profile']);?>" height="40" width="40" style="border-radius: 50px;" >
                                          </td>
                                          <td classe="text-center"><?php echo($data['nom']);?></td>
                                          <!-- <td classe="text-center"><?php echo($data['email']);?></td> -->
                                          <!-- <td classe="text-center"><?php echo($data['telephone']);?></td> -->
                                                   
                                          <?php 
                                             if ($data['role_as'] == 1){
                                                ?>
                                                <td classe="text-center">
                                                   <span class="badge bg-success">
                                                      <?php echo('Super administrateur');?>
                                                   </span>
                                                </td>
                                                <?php	
                                             }
                                             else {
                                                ?>
                                                <td classe="text-center">
                                                   <span class="badge bg-danger">
                                                      <?php echo('Administrateur');?>
                                                   </span>
                                                </td>
                                             <?php	
                                             }
                                             
                                          ?>

                                          <?php 
                                             if ($data['status_admin'] == 1){
                                                ?>
                                                <td classe="text-center">
                                                   <span class="badge bg-success">
                                                      <?php echo('Actif');?>
                                                   </span>
                                                </td>
                                                <?php	
                                             }
                                             else {
                                                ?>
                                                <td classe="text-center">
                                                   <span class="badge bg-danger">
                                                      <?php echo('Inactif');?>
                                                   </span>
                                                </td>
                                             <?php	
                                             }
                                             
                                          ?>
                                          <td classe="text-center"><?php  echo(date("d-m-Y", strtotime($data['date_admin'])));?></td>

                                          <td class="text-center"> 
                                             <?php if ($data['status_admin'] == 0){  ?>
                                                <!-- <a class="text-danger me-3" onclick="return confirm('Voulez-Vous comfirmer ?')" 
                                                      href="dashboard.php?page=pages/users/admin/index&stat=<?php echo $data["ID"]?>">
                                                      <i class="bi bi-person-check-fill"></i>
                                                </a> -->
                                             <?php }?>
                                                <a class="text-primary me-3" 
                                                   href="dashboard.php?page=pages/users/admin/profile&view_id=<?php echo($data['ID']);?>">
                                                      <i class="bi bi-eye-fill"></i>
                                                </a>  
                                             
                                          </td>
                                       </tr>
                                       <?php $count=$count+1;?>
                                 
                           
                                    <?php
                                 }
                              ?>
                           </tbody>

                           <tfoot>
                              <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col">Nom</th>
                                <!-- <th scope="col">E-mail</th> -->
                                <th scope="col">Role</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                                <th scope="col" ></th>
                              </tr>
                           </tfoot>

                        </table>

                     </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
</section>

