
<?php 
    if(isset($_POST['add_car'])){
        $marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $plaque = $_POST['plaque'];
        $chauffeur = $_POST['chauffeur'];
        $status = $_POST['status'];

        $photo=$_FILES["photo"]["name"];
            
        if($car->create($marque,$modele,$plaque,$photo,$chauffeur,$status))
        {
            move_uploaded_file($_FILES["photo"]["tmp_name"],"assets/img/cars_image/".$_FILES["photo"]["name"]);
            
            redirect('index.php','Data insert Successfully');
            // echo "<script>alert('Data insert Successfully');</script>";
            // echo "<script>window.location.href='dashboard.php?page=pages/cars/index'</script>";
        }
        else
        {
            echo "<script>alert('Operation Failed');</script>";
            //echo "<script>window.location.href='dashboard.php?page=pages/cars/add_car'</script>";
            
        }
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
                <div class="col-md-6"> 
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