<?php 
    if(isset($_POST['edit_driver'])){

        $hidden_id = $_POST['hidden_id'];
        $nom = $_POST['nom_complet'];
        $telephone = $_POST['telephone'];
        $permis = $_POST['permis'];
        $addresse = $_POST['addresse'];
        $status = isset($_POST['status']) ? '1':'0' ;

        $new_photo=$_FILES["photo"]["name"];
        $old_photo=$_POST["old_photo"];

        if( $new_photo != ""){
            $update_image = $new_photo;
        }else{
            $update_image = $old_photo;
        }
            
        if($driver->update($hidden_id,$nom,$telephone,$permis,$update_image,$addresse,$status)){

            if($_FILES["photo"]["name"] != ""){

                move_uploaded_file($_FILES["photo"]["tmp_name"],"assets/img/drivers_image/".$_FILES["photo"]["name"]);
                if(file_exists("assets/img/drivers_image/".$old_photo)){
                    unlink("assets/img/drivers_image/".$old_photo);
                }
                echo "<script>alert('Data updated Successfully');</script>";
                echo "<script>window.location.href='dashboard.php?page=pages/drivers/index'</script>";
            }
            
        }
        else{
            echo "<script>alert('Operation Failed');</script>";
            //echo "<script>window.location.href='dashboard.php?page=pages/drivers/edit'</script>";  
        }
    
    }

    if(isset($_GET['$edit_id'])){
        
        $id = $_GET['$edit_id'];
        extract($driver->getID($id));
        ?>
    

            <div class="pagetitle">
                <h1>Chauffeur</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Modifier</a></li>
                        <li class="breadcrumb-item active">Edit Chauffeur</li>
                    </ol>
                </nav>
            </div>

            <section class="section dashboard">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="" class="row g-3 py-5">
                            <div class="col-md-12">
                                <input type="hidden" name="hidden_id" value="<?php echo $id;?>"> 
                                <label for="nom" class="form-label">Nom complet</label>
                                <input type="text" class="form-control" value="<?php echo $nom_complet;?>" name="nom_complet" id="nom_complet" placeholder="Entrer nom et prenom">
                            </div>
                            <div class="col-md-6"> 
                                <label for="telephone" class="form-label">Telephone</label> 
                                <input type="number" class="form-control" value="<?php echo $numero_telephone;?>" name="telephone" id="telephone" placeholder="Entrer numero de telephone">
                            </div>
                            
                            <div class="col-md-6"> 
                                <label for="permis" class="form-label">Numero de permis de condurie</label> 
                                <input type="text" class="form-control" value="<?php echo $numero_permis_conduir;?>" name="permis" id="permis" placeholder="Entrer Id de permis de conduire">
                            </div>
                            <div class="col-md-6"> 
                                <label for="adresse" class="form-label">Addresse</label> 
                                <input type="text" class="form-control" value="<?php echo $addresse;?>" name="addresse" id="addresse" placeholder="Entrer addresse">
                            </div>
                            <div class="col-md-2"> 
                                <label for="status" class="form-label">Status</label> 
                                <div class="form-check">
                                <label class="form-check-label" for="">
                                    Etat
                                </label>
                                <input class="form-check-input" type="checkbox" name="status"<?= $status_chauffeur == '0' ? '':'checked'?>  value="" id="">
                                </div>
                            </div>
                            <div class="col-md-2"> 
                                <label for="photo" class="form-label text-black-50">Ancien image</label>
                                <div class="">
                                    <?php 
                                        ?>
                                            <img class="rounded" src="assets/img/drivers_image/<?php  echo $photo;?>" width="40" height="40">
                                            <input type="hidden" name="old_photo" value="<?php  echo $photo;?>"> 
                                        <?php
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-2"> 
                                <label for="photo" class="form-label">Photo</label> 
                                <input type="file" class="form-control" name="photo" id="photo">
                            </div>
                            
                            <div class=" text-end"> 
                                <button type="submit" class="btn btn-success" name="edit_driver">Modifier</button> 
                        </form>
                    </div>
                </div>
            </section>
        <?php	
    }else{
        echo 'not found';
    }
?>




