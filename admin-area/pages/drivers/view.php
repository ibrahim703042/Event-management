
<?php

// if(isset($_POST['btn_del'])){

//    $id = $_GET['view_id'];
//    $car->delete($id);
//    echo "<script>alert('Data Deleted Successfully');</script>";
//    echo "<script>window.location.href='dashboard.php?page=pages/drivers/index'</script>";
// }


?>

<div class="pagetitle">
 <h1>Chauffeur</h1>
 <nav>
   <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="dashboard.php?page=widget">Acceuil</a></li>
      <li class="breadcrumb-item">Chauffeurs</li>
      <li class="breadcrumb-item active">Details</li>
</ol>
 </nav>
</div>                      
<section class="section dashboard">
    <div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-12">
                <div class="card overflow-auto">
                
                    <!-- table responsive -->
                    <div class="card-body py-3">
                    
                        <?php
                            /* if(isset($_GET['view_id'])){
                            ?>
                                <table class="table table-striped datatable" id="">
                            
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Nom complet</th>
                                        <th scope="col">Telephone</th>
                                        <th scope="col">Permis</th>
                                        <th scope="col">Address</th>
                                        <th scope="col" >Date </th>
                                        </tr>
                                    </thead>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $query = "SELECT * FROM chauffeurs  WHERE id_chauffeur=:id";    
                                        $stmt = $dbconnection->prepare($query);
                                        $stmt->execute(array(":id"=>$_GET['view_id']));
                                        while($row=$stmt->fetch(PDO::FETCH_BOTH)){
                                            ?>
                                                <tr>
                                                    
                                                    <td classe="text-center"><?php print($row['id_chauffeur']);?></td>
                                                    <td classe="text-center">
                                                    <img class="" src="assets/img/drivers_image/<?php print($row['photo']);?>" alt="car-image" height="40" width="40" style="border-radius: 50px;" >
                                                    </td>
                                                    <td classe="text-center"><?php print($row['nom_complet']);?></td>
                                                    
                                                    <td classe="text-center"><?php print($row['numero_telephone']);?></td>
                                                    <td classe="text-center"><?php print($row['numero_permis_conduir']);?></td>
                                                    <td classe="text-center"><?php print($row['addresse']);?></td>
                                                    <td classe="text-center">
                                                    <span class="">
                                                        <?php  print(date("d-m-Y", strtotime($row['date_chauffeur'])));?>
                                                    </span>
                                                    </td>
                                                    
                                                </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                    
                                </table>
                            <?php
                            } */
                            include 'test.php'
                        ?>
                    </div>
                
                <!-- delete confirmation -->
                <div class="card-footer text-end">
                
                    <?php
                        if(isset($_GET['view_id'])){

                            ?>
                            <form method="POST" enctype="multipart/form-data">
                                <!-- <input type="hidden" name="id_chauffeur" value="<?php echo $_GET['view_id']; ?>" /> -->
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
