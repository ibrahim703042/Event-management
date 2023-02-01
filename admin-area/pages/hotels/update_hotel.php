<?php



$select=$bdd->query("SELECT * FROM hotels WHERE id_hotel=".$_GET["id_hotel"]);
$row=$select->fetch();


if(isset($_POST["submit"])){
  
   $nom=$_POST["nom"];
   $photo=$_FILES["image"]["name"];
   $address=$_POST["address"];
   $link=$_POST["link"];
   $target="assets/img/".basename($_FILES['image']['name']);
   
   if(  $update=$bdd->EXEC("UPDATE hotels SET hotel='$nom' WHERE id_hotel=".$_GET["id_hotel"]."")){
      move_uploaded_file($_FILES["image"]["tmp_name"],$target);
      echo "<script>alert('Modification a été effectué avec succès !')</script>";
    }else{
      echo "<script>alert('Erreur lors de la modification !')</script>";
    }


      
   }
      
      
      
      ?>


<div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Modifier l'hotel</h5>
                        <form class="row g-3"  method = "POST" enctype="multipart/form-data">
                           <div class="col-md-12"> <label for="inputName5" class="form-label">Nom du hotel</label> 
                           <input type="text"  name="nom"class="form-control" id="inputName5"  value="<?php echo $row["hotel"]?>"></div>
                          
                           <div class="col-md-6"> <label for="inputPassword5" class="form-label">Addresse</label>
                            <input type="text" class="form-control" id="inputPassword5" name ="address"  value="<?php echo $row["addresse"]?>"></div>
                           <div class="col-12"> <label for="inputAddress5" class="form-label" >Le lien pour reserver</label>
                            <input type="text" class="form-control" id="inputAddres5s" name ="link" placeholder="1234 Main St"  value="<?php echo $row["link"]?>"></div>
                            <div class="col-md-12"> 
                    <input type="file" name="image" value="<?php echo $row["hotel"]?>">
                </div>
                           <div class="text-center"> 
                              <button type="submit" class="btn btn-primary" name = "submit">Enregistrer</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>

