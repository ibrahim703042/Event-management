

<?php

/* if(isset($_GET['delete_id'])){
    
    $id = $_GET['delete_id'];
    extract($car->getID($id));	
} */

if(isset($_GET['delete_id'])){
   $id = $_GET['delete_id'];
?>

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
                        
                           ?>
                              <table class="table table-striped datatable" id="">
                  
                                 <tbody>
                                    <?php 
                                       $query = "SELECT voitures.*, chauffeurs.* FROM voitures INNER JOIN chauffeurs ON chauffeurs.id_chauffeur=voitures.id_chauffeur WHERE id_voiture=:id";    
                                       $stmt = $dbconnection->prepare($query);
                                       $stmt->execute(array(":id"=>$id));
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
                           ?>

                              <!-- delete confirmation -->
                              <div class="card-footer text-end">
                                 <input type="text" value="<?php print($row['id_voiture']);?>">
                                 <a class="  text-info me-3" href="dashboard.php?page=pages/cars/delete&delete_id=<?php print($row['id_voiture']);?>" >
                                    
                                    <button class=" btn  btn-danger border border-0" onClick="return confirm('Do you really want to delete');">
                                       OUI
                                    </button>
                                    <a href="dashboard.php?page=pages/cars/index" class="btn  btn-info text-white">
                                       NON
                                    </a>
                                 </a>
            
                              </div>
                            <?php
                        }
                     ?>
                       </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>



<?php

if(isset($_POST["car_delete"])){

      $id_car = $id;
      $query = $car->delete($id_car);

      if($query){

          /* header('Location:dashboard.php?page=pages/cars/index');
          $_SESSION['message'] = "Data deleted Successfully"; */
          //exit(0);
          redirect('dashboard.php?page=pages/cars/index','Data deleted Successfully');
      }
}

?>
