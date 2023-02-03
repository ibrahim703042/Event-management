

<?php
    $bdd=new PDO('mysql:host=localhost;dbname=event;charset=utf8','root','');
    // if(isset($_POST['car_add_btn'])){

    //     $marque = $_POST['marque'];
    //     $modele = $_POST['modele'];
    //     $plaque = $_POST['plaque'];
    //     $description = $_POST['description'];
    //     $chauffeur = $_POST['chauffeur'];
    //     $status = $_POST['status'];
        
    //     $target="assets/img/drivers_image/".basename($_FILES['photo']['name']);

    //     $sql ="INSERT INTO voitures (nom_marque,modele,photo_vehicule,plaque,description,id_chauffeur,status) 
    //             VALUES(?,?,?,?,?,?)";

    //     $query=$bdd->prepare($sql);
    //     $run_query = $query->execute(array($marque,$modele,$target,$plaque,$description,$chauffeur,$status));

    //     if($run_query){

    //         move_uploaded_file($_FILES["photo"]["tmp_name"],$target);
    //         $_SESSION['message'] = "Data insert Successfully";
    //         header('Location:dashboard.php?page=pages/drivers/index');

    //     }else{

    //         $_SESSION['error'] = "Something went wrong";
    //         header('Location:dashboard.php?page=pages/drivers/add_driver'); 
    //     }

    // }
?>
<div class="pagetitle">
    <h1>Voiture</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php?page=widget">Acceuil</a></li>
            <li class="breadcrumb-item">Voitures</li>
            <li class="breadcrumb-item active">Ajouter</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="card">
        <div class="card-body">
            <form class="row g-3 py-5" method="post" enctype="multipart/form-data">
                <div class="col-md-12"> 
                    <label for="marque" class="form-label">Marque</label>
                    <input type="text" class="form-control" autocomplete="on" name="marque" autocomplete="on" id="marque">
                </div>
                <div class="col-md-6"> 
                    <label for="modele" class="form-label">Modele</label> 
                    <input type="text" class="form-control" autocomplete="on" name="modele" id="modele">
                </div>
                <div class="col-md-6"> 
                    <label for="plaque" class="form-label">Plaque</label> 
                    <input type="text" class="form-control" autocomplete="on" name="plaque" id="plaque">
                </div>
                
                <div class="col-md-6">
                    <label for="chauffeur" class="form-label">Chauffeur</label> 
                    <select class="form-select" autocomplete="on" name="chauffeur" aria-label="Default select example">
                        <option selected disabled>Choisir un chauffeur</option>
                        <?php 
                            $query = "SELECT * FROM chauffeurs";    
                            $car->data($query);
                        ?>
                        
                    </select>
                </div>
                
                <div class="col-md-6"> 
                    <label for="telephone" class="form-label">Telephone WhatsApp</label> 
                    <input type="number" class="form-control" autocomplete="on" name="telephone" id="telephone">
                </div>

                <div class="col-md-6"> 
                    <label for="telephone" class="form-label">Status</label> 
                    <select class="form-select" autocomplete="on" name="status" aria-label="Default select example">
                        <option selected disabled>Choisir un status</option>
                        <option value="Libre">Libre</option>
                        <option value="Occuper">Occuper</option>
                        <option value="Reserver">Reserver</option>
                    </select>
                </div>
                <div class="col-md-6"> 
                    <label for="photo" class="form-label">Photo</label> 
                    <input type="file" class="form-control" name="file" id="photo">
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Description </label>
                        <textarea class="form-control" name="description" placeholder="Description....." id="" rows="3"><?= $description ?></textarea>
                        
                    </div>
                </div>
                
                <div class=" text-end">
                    <input type="submit" value="Enregistrer" class="btn btn-success" name="car_add_btn"> 
            </form>
        </div>
</div>

</section>


<?php 
   /*  if(isset($_POST[''])){

        $marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $target="assets/img/uploads/".basename($_FILES['file']['name']);
        $plaque = $_POST['plaque'];
        $description = $_POST['description'];
        $chauffeur = $_POST['chauffeur'];
        $status = $_POST['status'];
        
        $query = $car->create($marque,$modele,$target,$plaque,$description,$chauffeur,$status);
        if($query){

            move_uploaded_file($_FILES["photo"]["tmp_name"],$target);
            $_SESSION['message'] = "Data insert Successfully";
            header('Location:dashboard.php?page=pages/cars/index');

        }else{

            $_SESSION['error'] = "Something went wrong";           
        }

    } */
?>


<?php

    if(isset($_POST['car_add_btn'])){
        
        $marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $plaque = $_POST['plaque'];
        $descr = $_POST['description'];
        $chauffeur = $_POST['chauffeur'];
        $status = $_POST['status'];

        $target= $_FILES['file']['name'];
        
        $query = $car->create($marque,$modele,$target,$plaque,$descr,$chauffeur,$status);
        if($query){

            move_uploaded_file($_FILES["file"]["tmp_name"],"assets/img/avatars/cars/".basename($_FILES['file']['name']));
            $_SESSION['message'] = "Data insert Successfully";
            header('Location:dashboard.php?page=pages/cars/index');
            header('Location:dashboard.php?page=pages/cars/index');

        }else{
            $_SESSION['error'] = "Something went wrong";            
        }

    }

?>