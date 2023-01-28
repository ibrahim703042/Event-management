
<?php
   //include 'includes/db_connect.php';
   if(isset($_POST['btn-del']))
   {
      $id = $_GET['view_id'];
      $car->delete($id);
      echo "<script>window.location.href='dashboard.php?page=pages/cars/index'</script>";
      //header("Location: delete.php?deleted");	
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
               <div class="card recent-sales overflow-auto">
                  
               
                     <!-- table responsive -->
                  <div class="card-body py-3">
                     
                     <?php
                        if(isset($_GET['view_id'])){
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
                                       $stmt->execute(array(":id"=>$_GET['view_id']));
                                       while($row=$stmt->fetch(PDO::FETCH_BOTH)){
                                          ?>
                                             <tr>
                                                <!-- <td classe="text-center"><?php echo($count);?></td> -->
                                                <td classe="text-center"><?php print($row['id_voiture']);?></td>
                                                <td classe="text-center">
                                                   <img class="" src="../assets/img/drivers_image/<?php print($row['photo']);?>" alt="car-image" height="40" width="40" style="border-radius: 50px;" >
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
               </div>
            </div>
         </div>
      </div>
   </div>
</section>


<div class="container">
   <p>
      <?php
         if(isset($_GET['view_id'])){

            ?>
               <form method="post">
                  <!-- <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />-->
                  <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
                  <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
               </form>  
            <?php
         }
         else{
            
            ?>
               <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
            <?php
         }
      ?>
   </p>
</div>