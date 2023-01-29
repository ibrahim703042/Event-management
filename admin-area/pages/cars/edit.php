
<?php 
    if(isset($_POST['submit'])){

        $id = $_GET['edit_id'];
        $nom_marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $plaque = $_POST['plaque'];
        $chauffeur = $_POST['chauffeur'];
        $status = $_POST['status'];

        $photo=$_FILES["photo"]["name"];
        move_uploaded_file($_FILES["photo"]["tmp_name"],"assets/img/cars_image/".$_FILES["photo"]["name"]);

            
        if($car->update($id,$nom_marque,$modele,$plaque,$photo,$chauffeur,$status)){

            echo "<script>alert('Data updated Successfully');</script>";
            echo "<script>window.location.href='dashboard.php?page=pages/cars/index'</script>";
        }
        else{
            echo "<script>alert('Operation Failed');</script>";
            echo "<script>window.location.href='dashboard.php?page=pages/cars/edit'</script>";  
        }
    
    }

    // if(isset($_GET['edit_id'])){
        
    //     $id = $_GET['edit_id'];
    //     extract($car->getID($id));	
    // }
?>

<div class="pagetitle">
    <h1>Voiture</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php?page=widget">Acceuil</a></li></li>
        <li class="breadcrumb-item active">Voiture</li>
        <li class="breadcrumb-item ">Modifier</li>
    </ol>
    </nav>
</div>

<!-- <section class="section dashboard">
    <div class="card">
        <div class="card-body">
            <?php 
                if(isset($_GET['edit_id'])){
        
                    $id = $_GET['edit_id'];
                    extract($car->getID($id));
                    ?>
                    <?php	
                }else{
                    echo 'Error';
                }
            ?>
        </div>
    </div>
</section> -->

<?php 
    if(isset($_GET['edit_id'])){

        // $id = $_GET['edit_id'];
        // extract($car->getID($id));
        ?>
            <section class="section dashboard">
                <div class="card">
                    <div class="card-body">

                        <form class="row g-3 py-5" method="post" enctype="multipart/form-data">
                            <div class="col-md-12"> 
                                <label for="marque" class="form-label">Marque</label>
                                <input type="text" class="form-control" name="marque" id="marque">
                            </div>
                            <div class="col-md-6"> 
                                <label for="modele" class="form-label">Modele</label> 
                                <input type="text" class="form-control" name="modele" id="modele">
                            </div>
                            <div class="col-md-6"> 
                                <label for="plaque" class="form-label">Plaque</label> 
                                <input type="text" class="form-control" name="plaque" id="plaque">
                            </div>
                            
                            <div class="col-md-6">
                                <label for="chauffeur" class="form-label">Chauffeur</label> 
                                <select class="form-select" name="chauffeur" aria-label="Default select example">
                                    <option selected disabled>Choisir un chauffeur</option>
                                    <?php 
                                        $query = "SELECT * FROM chauffeurs";    
                                        $car->data($query);
                                    ?>
                                    
                                </select>
                            </div>
                            
                            <div class="col-md-6"> 
                                <label for="telephone" class="form-label">Telephone WhatsApp</label> 
                                <input type="number" class="form-control" name="telephone" id="telephone">
                            </div>

                            <div class="col-md-6"> 
                                <label for="telephone" class="form-label">Status</label> 
                                <select class="form-select" name="status" aria-label="Default select example">
                                    <option selected disabled>Choisir un status</option>
                                    <option value="Libre">Libre</option>
                                    <option value="Occuper">Occuper</option>
                                    <option value="Reserver">Reserver</option>
                                </select>
                            </div>
                            <div class="col-md-2"> 
                                <label for="photo" class="form-label text-black-50">Ancien image</label>
                                <div class="">
                                    <?php 
                                        /* if($photo=="product_1.jpg"){ 
                                            ?>
                                                <img class="" src="assets/img/drivers_image/product_1.jpg" alt="" width="100" height="100">
                                            <?php } 
                                            else { 
                                                ?>
                                                <img class="rounded" src="assets/img/drivers_image/<?php  echo $photo;?>" width="40" height="40"> 
                                            <?php 
                                        }  */
                                        ?>
                                            <img class="rounded" src="assets/img/drivers_image/<?php  //echo $photo;?>" width="40" height="40"> 
                                        <?php
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-4"> 
                                <label for="photo" class="form-label">Photo</label> 
                                <input type="file" class="form-control" name="photo" id="photo">
                            </div>
                            
                            <div class=" text-end">
                                <input type="submit" value="Enregistrer" class="btn btn-success" name="add_car"> 
                                <!-- <button type="submit" class="btn btn-success" name="btn_save">Enregistrer</button>  -->
                        </form>

                    </div>
                </div>
            </section>
        <?php	
    }else{
        echo 'Not found';
        //include 'error/pages-error-404.php';
    }
?>