<?php
    
    if(isset($_GET['edit_id'])){
        
        $id = $_GET['edit_id'];
        extract($driver->getID($id));	
    }
?>


<div class="pagetitle">
    <h1>Chauffeur</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Acceuil</a></li>
            <li class="breadcrumb-item ">Chauffeur</li>
            <li class="breadcrumb-item active">Modifier</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="" class="row g-3 py-5">
                <div class="col-md-12"> 
                    <label for="nom" class="form-label">Nom complet</label>
                    <input type="text" class="form-control" value="<?= $nom_complet;?>" name="nom_complet" id="nom_complet" placeholder="Entrer nom et prenom">
                </div>
                <div class="col-md-6"> 
                    <label for="telephone" class="form-label">Telephone</label> 
                    <input type="number" class="form-control" value="<?= $numero_telephone;?>" name="telephone" id="telephone" placeholder="Entrer numero de telephone">
                </div>
                
                <div class="col-md-6"> 
                    <label for="permis" class="form-label">Numero de permis de condurie</label> 
                    <input type="text" class="form-control" value="<?= $numero_permis_conduir;?>" name="permis" id="permis" placeholder="Entrer Id de permis de conduire">
                </div>
                <div class="col-md-6"> 
                    <label for="adresse" class="form-label">Addresse</label> 
                    <input type="text" class="form-control" value="<?= $addresse;?>" name="addresse" id="addresse" placeholder="Entrer addresse">
                </div>
                <div class="col-md-2"> 
                    <label for="photo" class="form-label text-black-50">Ancien image</label>
                    <div class="">
                        <?php 
                            ?>
                                <img class="rounded" src="<?= $photo;?>" width="40" height="40"> 
                            <?php
                        ?>
                        <input type="hidden" name="old_image" value="<?= $photo ?>">
                        <input type="hidden" name="id_driver" value="<?= $id_chauffeur ?>">
                    </div>
                </div>
                <div class="col-md-4"> 
                    <label for="photo" class="form-label">Photo</label> 
                    <input type="file" class="form-control" name="photo" id="photo">
                </div>
                
                <div class=" text-end"> 
                    <button type="submit" class="btn btn-success" name="driver_update_btn">Modifier</button> 
            </form>
        </div>
    </div>
</section>


<?php 

if(isset($_POST['driver_update_btn'])){

    $id = $_POST['id_driver'];
    $nom_complet = $_POST['nom_complet'];
    $numero_telephone = $_POST['telephone'];
    $numero_permis_conduir = $_POST['permis'];
    $addresse = $_POST['addresse'];

    $target="assets/img/avatars/drivers/".basename($_FILES['photo']['name']);
    
        
    if($driver->update($id,$nom_complet,$numero_telephone,$numero_permis_conduir,$photo,$addresse)){

        move_uploaded_file($_FILES["photo"]["tmp_name"],$target);
        $_SESSION['message'] = "Data updated Successfully";

        header('Location:dashboard.php?page=pages/drivers/index');
    }
    else{
        echo "<script>alert('Operation Failed');</script>";
        $_SESSION['error'] = "Something went wrong"; 
    }

}
   
?>