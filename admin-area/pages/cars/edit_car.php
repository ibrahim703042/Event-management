
<?php

    if(isset($_GET['car_id'])){
        
        $id = $_GET['car_id'];
        extract($car->getID($id));	
    }
?>

<div class="pagetitle">
    <h1>Voiture</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php?page=widget">Acceuil</a></li>
            <li class="breadcrumb-item">Voitures</li>
            <li class="breadcrumb-item active">Mofifier</li>
    </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="card">
        <div class="card-body">
            <form class="row g-3 py-5" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_car" value="<?php echo $id_voiture; ?>">
                <div class="col-md-12"> 
                    <label for="marque" class="form-label">Marque</label>
                    <input type="text" class="form-control" value="<?php echo $nom_marque; ?>" name="marque" id="marque">
                </div>
                <div class="col-md-6"> 
                    <label for="modele" class="form-label">Modele</label> 
                    <input type="text" class="form-control" value="<?php echo $modele; ?>" name="modele" id="modele">
                </div>
                <div class="col-md-6"> 
                    <label for="plaque" class="form-label">Plaque</label> 
                    <input type="text" class="form-control" value="<?php echo $plaque; ?>" name="plaque" id="plaque">
                </div>
                
                <div class="col-md-6">
                    <label for="chauffeur" class="form-label">Chauffeur</label> 
                    <select class="form-select" name="chauffeur" aria-label="Default select example">
                        <?php

                            $query = "SELECT voitures.*, chauffeurs.* 
                            FROM voitures 
                            INNER JOIN chauffeurs 
                            ON chauffeurs.id_chauffeur=voitures.id_chauffeur 
                            WHERE id_voiture = $id";

                            $car->data_selected($query);
                        ?>
                        <option disabled>Choisir un chauffeur</option>
                        <?php 
                            $query = "SELECT * FROM chauffeurs ";    
                            $car->data($query);
                        ?>
                        
                    
                    </select>
                </div>
                
                <div class="col-md-6"> 
                    <label for="telephone" class="form-label">Telephone WhatsApp</label> 
                    <input type="number" class="form-control" disabled value="<?php echo $whatsapp_number; ?>" name="telephone" id="telephone">
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
                        
                            ?>
                                <img class="rounded" src="<?php  echo $photo_vehicule;?>" width="40" height="40"> 
                            <?php 
                            
                        ?>
                    </div>
                </div>
                <div class="col-md-4"> 
                    <label for="photo" class="form-label">Photo</label> 
                    <input type="file" class="form-control" name="photo" id="photo">
                </div>

                <div class="col-md-12">
                    <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Description du vehicule</h5>
                        <div class="quill-editor-full">
                    
                            <textarea name="description" class="quill-editor-full form-control fs-6" placeholder="Description........."  id="" cols="" rows="3">
                                <?= $description ?>
                            </textarea>

                        </div>

                     </div>
                  </div>
                </div>
                <div class=" text-end">
                    <button type="submit" class="btn btn-success" name="car_update_btn">Modifier</button>
                </div> 
            </form>
        </div>
    </div>
</section>