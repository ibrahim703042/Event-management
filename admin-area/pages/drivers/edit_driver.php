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
                <div class="col-md-12"> 
                    <label for="adresse" class="form-label">Addresse</label> 
                    <input type="text" class="form-control" value="<?= $addresse;?>" name="addresse" id="addresse" placeholder="Entrer addresse">
                </div>
                <!-- <div class="col-md-2"> 
                    <label for="photo" class="form-label text-black-50">Ancien image</label>
                    <div class="">
                        <?php 
                            ?>
                                <img class="rounded" src="assets/img/avatars/drivers/<?= $photo;?>" width="40" height="40">
                                <input class="rounded" type="hidden" name="old_image" value="<?= $photo ?>"> 

                            <?php
                        ?>
                        <input type="hidden" name="old_image" value="<?= $photo ?>">
                    </div>
                </div> -->
                <!-- <div class="col-md-4"> 
                    <label for="photo" class="form-label">Photo</label> 
                    <input type="file" class="form-control" name="photo" id="photo">
                </div> -->
                
                <div class=" text-end"> 
                    <button type="submit" class="btn btn-success" name="driver_update_btn">Modifier</button> 
            </form>
        </div>
    </div>
</section>


<?php 

if(isset($_POST['driver_update_btn'])){

    $nom_complet = $_POST['nom_complet'];
    $numero_telephone = $_POST['telephone'];
    $numero_permis_conduir = $_POST['permis'];
    $addresse = $_POST['addresse'];

    /* $target= $_FILES['photo']['name'];
    $old_image= $_POST["old_image"];

    $newImage = $_FILES['photo']['name'];

    if( $newImage != "" ){
        $target = $newImage;
    }else{
        $target = $old_image;
        redirect('dashboard.php?page=pages/drivers/index','Data Updated Successfully');

    } */
            
    if($driver->update($id,$nom_complet,$numero_telephone,$numero_permis_conduir,$addresse)){

        // move_uploaded_file($_FILES["file"]["tmp_name"],"assets/img/avatars/drivers/".basename($_FILES['photo']['name']));
        redirect('dashboard.php?page=pages/drivers/index','Data Updated Successfully');
    }
    else{
        echo "<script>alert('Operation Failed');</script>";
        $_SESSION['error'] = "Something went wrong"; 
    }

}
   
?>