
<?php

   if(isset($_POST['btn_del'])){

      $id = $_GET['delete_id'];
      // $id = $_POST['id_voiture'];
      $car->delete($id);
      echo "<script>alert('Data Deleted Successfully');</script>";
      echo "<script>window.location.href='dashboard.php?page=pages/cars/index'</script>";
   }
   

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
               <div class="card overflow-auto">
                  
                  <div class="card-header text-center">
                     <h1 class=" card-title fs-3 text-black-50">
                        <i class="bi bi-emoji-frown"></i>
                        Voulez-vous vraiment supprimer
                        <i class="bi bi-question me-1"></i>
                     </h1>
                  </div>
                     <!-- table responsive -->
                  <div class="card-body py-3">
                     
                     <?php
                        if(isset($_GET['delete_id'])){
                           ?>
                              <table class="table table-striped datatable" id="">
                        
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
                                       </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                       $query = "SELECT voitures.*, chauffeurs.* FROM voitures INNER JOIN chauffeurs ON chauffeurs.id_chauffeur=voitures.id_chauffeur WHERE id_voiture=:id";    
                                       $stmt = $dbconnection->prepare($query);
                                       $stmt->execute(array(":id"=>$_GET['delete_id']));
                                       while($row=$stmt->fetch(PDO::FETCH_BOTH)){
                                          ?>
                                             <tr>
                                                <!-- <td classe="text-center"><?php echo($count);?></td> -->
                                                <td classe="text-center"><?php print($row['id_voiture']);?></td>
                                                <td classe="text-center">
                                                   <img class="" src="assets/img/cars_image/<?php print($row['photo_vehicule']);?>" alt="car-image" height="40" width="40" style="border-radius: 50px;" >
                                                </td>
                                                <td classe="text-center"><?php print($row['modele']);?></td>
                                                </td>
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
                                                
                                             </tr>
                                          <?php
                                       }
                                    ?>
                                 </tbody>
                                 
                              </table>
                           <?php
                        }
                     ?>
                  </div>
                  <!-- delete confirmation -->
                  <div class="card-footer text-end">
                  
                     <?php
                        if(isset($_GET['delete_id'])){

                           ?>
                              <form method="POST" enctype="multipart/form-data">
                                 <!-- <input type="hidden" name="id_voiture" value="<?php echo $_GET['delete_id']; ?>" /> -->
                                 <button type="submit" class="btn btn-danger" name="btn_del">
                                    <!-- <i class="bi bi-trash me-1"></i> -->
                                     OUI
                                 </button>
                                 <a href="dashboard.php?page=pages/cars/index" class="btn  btn-info text-white">
                                    <!-- <i class="bi bi-chevron-double-left me-1"></i> -->
                                     NON
                                 </a>
                              </form>  
                           <?php
                        }
                     ?>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
