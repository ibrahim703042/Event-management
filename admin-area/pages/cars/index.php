
<?php 
   //$query =$bdd->query("SELECT voitures.*, chauffeurs.* FROM voitures INNER JOIN chauffeurs ON chauffeurs.id_chauffeur=voitures.id_chauffeur");
?>
<div class="pagetitle">
    <h1>Voiture</h1>
    <nav>
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="dashboard.php?page=widget">Acceuil</a></li>
         <li class="breadcrumb-item">Voitures</li>
         <li class="breadcrumb-item active">Table</li>
   </ol>
    </nav>
</div>                      
<section class="section dashboard">
   <div class="row">
      <div class="col-lg-12">
         <div class="row">
            <div class="col-12">
               <div class="card recent-sales overflow-auto">
                  <div class="card-heard mx-3 mt-3">
                     <a class="nav-link collapsed btn btn-success float-end text-white" href="dashboard.php?page=pages/cars/add_car"> 
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
                     <h5 class="card-title">List des Chauffeurs</h5>

                     <table class="table table-striped datatable" id="example">
               
                        <thead>
                           <tr>
                              <th scope="col">#</th>
                              <th scope="col">Photo</th>
                              <th scope="col">Model</th>
                              <th scope="col">Marque</th>
                              <th scope="col">Plaque</th>
                              <th scope="col">Chauffeur</th>
                              <th scope="col">Status</th>
                              <th scope="col" >Date </th>
                              <th scope="col" >Action </th>
                              </tr>
                        </thead>

                        <tbody>
                                 <?php
                                    /* $count = 1;
                                    while($row=$query->fetch()){
                                       
                                       ?>
                                       <tr>
                                          <td classe="text-center"><?php echo($count);?></td>
                                          <!-- <td classe="text-center"><?php print($row['id_voiture']);?></td> -->
                                          <td classe="text-center">
                                             <img class="" src="<?= print($row['photo_vehicule']);?>" alt="car-image" height="40" width="40" style="border-radius: 50px;" >
                                          </td>
                                          <td classe="text-center"><?php print($row['modele']);?></td>
                                          <td classe="text-center"><?php print($row['nom_marque']);?></td>
                                          <td classe="text-center"><?php print($row['plaque']);?></td>
                                          <td classe="text-center"><?php print($row['nom_complet']);?></td>
                                          
                                          <?php 
                                             if ($row['status'] == "Libre"){
                                                ?>
                                                <td classe="text-center">
                                                   <span class="badge bg-success">
                                                      <?php print($row['status']);?>
                                                   </span>
                                                </td>
                                                <?php	
                                             }
                                             else if ($row['status'] == "Occuper"){
                                                ?>
                                                <td classe="text-center">
                                                   <span class="badge bg-danger">
                                                      <?php print($row['status']);?>
                                                   </span>
                                                </td>
                                             <?php	
                                             }
                                             else{
                                                ?>
                                                   <td classe="text-center">
                                                      <span class="badge bg-info">
                                                         <?php print($row['status']);?>
                                                      </span>
                                                   </td>
                                                <?php	
                                             } 
                                          ?>
                           
                                          <td classe="text-center">
                                             <span class="">
                                                <?php  print(date("d-m-Y", strtotime($row['date_voiture'])));?>
                                             </span>
                                          </td>

                                          <td classe="text-center"> 
                                             
                                             <a class=" text-info me-3" href="dashboard.php?page=pages/cars/edit_car&car_id=<?php print($row['id_voiture']);?>" >
                                                <i class="bi bi-pencil"></i>
                                             </a>
                                             <!-- <a class=" text-danger me-3" href="dashboard.php?page=pages/cars/index&car_del=<?php echo $row["id_voiture"]?>" 
                                                   onclick="checkDelete()">
                                                   <i class="bi bi-trash"></i>
                                             </a> -->
                                             <button type="button" name="btn_delete" value="<?php echo $row["id_voiture"]?>"
                                                class="text-danger border border-0 bg-transparent me-3 delete-car">
                                                <i class="bi bi-trash"></i>
                                             </button>
                                          </td>
                                       </tr>

                                           <?php $count=$count+1;?>
                                           <?php
                                    } */

                                    $query = "SELECT voitures.*, chauffeurs.* FROM voitures INNER JOIN chauffeurs ON chauffeurs.id_chauffeur=voitures.id_chauffeur";    
                                    $car->dataview($query);
                                 ?>
                           </tbody>
                        <tfoot>
                              <tr>
                                 <th scope="col"></th>
                                 <th scope="col">Photo</th>
                                 <th scope="col">Model</th>
                                 <th scope="col">Marque</th>
                                 <th scope="col">Plaque</th>
                                 <th scope="col">Chauffeur</th>
                                 <th scope="col">Status</th>
                                 <th scope="col" >Date </th>
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




<script language="JavaScript" type="text/javascript">

   $(".delete-car").click(function(e) {
    e.preventDefault();
    alert('hello');
    bootbox.confirm("Are you sure you wish to delete this?", function(confirmed) {
        if(confirmed) {
            return true;
        }
      }); 
   });
</script>

<?php

   if(isset($_GET["driver_del"])){
      
      $id=$_GET["driver_del"];
      $delete=$bdd->EXEC("DELETE FROM voitures WHERE id_voiture=$id");
      
      if($delete){
         ?>
         <script>
            document.location.reload();
         </script>
         <?php
         }
   }
?>
