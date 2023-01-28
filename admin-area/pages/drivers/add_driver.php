<?php 
    if(isset($_POST['submit'])){

        $nom_complet = $_POST['nom_complet'];
        $numero_telephone = $_POST['telephone'];
        $numero_permis_conduir = $_POST['permis'];
        $addresse = $_POST['addresse'];

        $photo=$_FILES["photo"]["name"];
        move_uploaded_file($_FILES["photo"]["tmp_name"],"assets/img/drivers_image/".$_FILES["photo"]["name"]);

            
        if($driver->create($nom_complet,$numero_telephone,$numero_permis_conduir,$photo,$addresse))
        {
            
            echo "<script>alert('Data insert Successfully');</script>";
            echo "<script>window.location.href='dashboard.php?page=pages/drivers/index'</script>";
        }
        else
        {
            echo "<script>alert('Operation Failed');</script>";
            //echo "<script>window.location.href='dashboard.php?page=pages/drivers/add_driver'</script>";
            
        }
    }
?>
<div class="pagetitle">
    <h1>Chauffeur</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Formulaire</a></li>
            <li class="breadcrumb-item active">Ajouter Chauffeur</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" class="row g-3 py-5">
                <div class="col-md-12"> 
                    <label for="nom" class="form-label">Nom complet</label>
                    <input type="text" class="form-control" name="nom_complet" id="nom_complet" placeholder="Entrer nom et prenom">
                </div>
                <div class="col-md-6"> 
                    <label for="telephone" class="form-label">Telephone</label> 
                    <input type="number" class="form-control" name="telephone" id="telephone" placeholder="Entrer numero de telephone">
                </div>
                <div class="col-md-6"> 
                    <label for="permis" class="form-label">Numero de permis de condurie</label> 
                    <input type="text" class="form-control" name="permis" id="permis" placeholder="Entrer Id de permis de conduire">
                </div>
                <div class="col-md-6"> 
                    <label for="adresse" class="form-label">Addresse</label> 
                    <input type="text" class="form-control" name="addresse" id="addresse" placeholder="Entrer addresse">
                </div>
                <div class="col-md-6"> 
                    <label for="photo" class="form-label">Photo</label> 
                    <input type="file" class="form-control" name="photo" id="photo">
                </div>
                
                <div class=" text-end"> 
                    <button type="submit" class="btn btn-success" name="submit">Enregistrer</button> 
            </form>
        </div>
    </div>
</section>
