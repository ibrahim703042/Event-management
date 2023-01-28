
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

    if(isset($_GET['edit_id'])){
        
        $id = $_GET['edit_id'];
        extract($car->getID($id));	
    }
?>

<div class="pagetitle">
    <h1>Voiture</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php?page=widget">Acceuil</a></li>
            <li class="breadcrumb-item">Voitures</li>
            <li class="breadcrumb-item active">Formulaire</li>
    </ol>
    </nav>
    </div>
    <section class="section dashboard">
    <div class="card">
        <div class="card-body">
            <form class="row g-3 py-5" method="post" enctype="multipart/form-data">
                <div class="col-md-12"> 
                    <label for="marque" class="form-label">Marque</label>
                    <input type="text" class="form-control" value="<?php echo $nom_marque; ?>" name="marque" id="marque">
                </div>
                <div class="col-md-6"> 
                    <label for="modele" class="form-label">Modele</label> 
                    <input type="text" class="form-control" value="<?php //echo $modele; ?>" name="modele" id="modele">
                </div>
                <div class="col-md-6"> 
                    <label for="plaque" class="form-label">Plaque</label> 
                    <input type="text" class="form-control" value="<?php //echo $plaque; ?>" name="plaque" id="plaque">
                </div>
                
                <div class="col-md-6">
                    <label for="chauffeur" class="form-label">Chauffeur</label> 
                    <select class="form-select" name="chauffeur" aria-label="Default select example">
                        <?php 
                            $query = "SELECT voitures.*, chauffeurs.* FROM voitures INNER JOIN chauffeurs ON chauffeurs.id_chauffeur=voitures.id_chauffeur WHERE id_voiture = $id";    
                            $car->data_selected($query);
                        ?>
                        <option disabled>Choisir un chauffeur</option>
                        <?php 
                            $query = "SELECT * FROM chauffeurs";    
                            $car->data($query);
                        ?>
                        <?php 
                            /* $sql ="SELECT * FROM chauffeurs";
                            $query= $dbconnection -> prepare($sql);
                            $query-> execute();
                            $results = $query -> fetchAll(PDO::FETCH_OBJ);
                            $count = 1;
                            if($query -> rowCount() > 0)
                            {
                            foreach($results as $result)
                            {
                            ?>
                                <option value="<?php echo htmlentities($result->id_chauffeur);?>">
                                    <?php echo htmlentities($result->nom_complet);?>
                                </option>
                            <?php   } } */ 
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
                        <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                        <option disabled>Choisir un status</option>
                        <option value="Libre">Libre</option>
                        <option value="Occuper">Occuper</option>
                        <option value="Reserver">Reserver</option>
                    </select>
                </div>

                <div class="col-md-2"> 
                    <label for="photo" class="form-label text-black-50">Ancien image</label>
                    <div class="">
                        <?php 
                            if($photo=="product_1.jpg"){ 
                                ?>
                                    <img class="" src="assets/img/cars_image/product_1.jpg" alt="" width="40" height="40">
                                <?php } 
                                else { 
                                    ?>
                                    <img class="rounded" src="assets/img/cars_image/<?php  echo $photo;?>" width="40" height="40"> 
                                <?php 
                            } 
                        ?>
                    </div>
                </div>
                <div class="col-md-4"> 
                    <label for="photo" class="form-label">Photo</label> 
                    <input type="file" class="form-control" name="photo" id="photo">
                </div>
                
                <div class=" text-end">
                    <button type="submit" class="btn btn-success" name="submit">Modifier</button> 
            </form>
        </div>
</div>
    </section>