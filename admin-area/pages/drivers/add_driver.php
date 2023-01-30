

<?php 
    if(isset($_POST['add_driver'])){

        
        $nom = $_POST['nom_complet'];
        $telephone = $_POST['telephone'];
        $permis = $_POST['permis'];
        $addresse = $_POST['addresse'];
        $status = isset($_POST['status']) ? '1':'0' ;

        // $path = "../uploads/";
        // $fileName = basename($_FILES["photo"]["name"]);
        // $targetFilePath = $path . $fileName;
        // $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        $photo=$_FILES["photo"]["name"];

        

        // $image_ext = pathinfo($photo, PATHINFO_EXTENSION);
        // $filename=time().'.'.$image_ext;
            
        if($driver->create($nom,$telephone,$permis,$fileName,$addresse,$status))
        {
            // move_uploaded_file($_FILES["photo"]["tmp_name"],$path.'.'.$filename);
            move_uploaded_file($_FILES["photo"]["tmp_name"],"assets/img/drivers_image/".$_FILES["photo"]["name"]);
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


<?php
    echo "<pre>";
        print_r($_POST);
    echo "</pre>";
?>
<section class="section dashboard">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" class="row g-3 py-5" required>
                <div class="col-md-12"> 
                    <label for="nom" class="form-label">Nom complet</label>
                    <input type="text" class="form-control" required name="nom_complet" id="nom_complet" placeholder="Entrer nom et prenom">
                </div>
                <div class="col-md-6"> 
                    <label for="telephone" class="form-label">Telephone</label> 
                    <input type="number" class="form-control" required name="telephone" id="telephone" placeholder="Entrer numero de telephone">
                </div>
                <div class="col-md-6"> 
                    <label for="permis" class="form-label">Numero de permis de condurie</label> 
                    <input type="text" class="form-control" required name="permis" id="permis" placeholder="Entrer Id de permis de conduire">
                </div>
                <div class="col-md-6"> 
                    <label for="adresse" class="form-label">Addresse</label> 
                    <input type="text" class="form-control" required name="addresse" id="addresse" placeholder="Entrer addresse">
                </div>
                <div class="col-md-2"> 
                    <label for="status" class="form-label">Status</label> 
                    <div class="form-check">
                      <label class="form-check-label" for="">
                        Etat
                      </label>
                      <input class="form-check-input" type="checkbox" name="status" value="" id="">
                    </div>
                </div>

                <div class="col-md-4"> 
                    <label for="photo" class="form-label">Photo</label> 
                    <input type="file" class="form-control" required name="file" id="file">
                </div>
                
                <div class=" text-end"> 
                    <button type="submit" class="btn btn-success" name="submit">Enregistrer</button> 
            </form>
        </div>
    </div>
</section>
