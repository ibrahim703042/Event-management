<?php

?>

<div class="pagetitle">
            <h1>Soirée</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                  <li class="breadcrumb-item active">Ajouter une Soirée </li>
               </ol>
            </nav>
         </div>
         <br>

<div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Ajouter un événement</h5>
                        <form class="row g-3" method="POST">
                           <div class="col-md-12"> <label for="inputName5" class="form-label">Nom Soirée</label> <input type="text" class="form-control" id="inputName5" name="nom"></div>
                           <div class="col-md-6"> <label for="inputEmail5" class="form-label">Addresse</label> <input type="text" class="form-control" id="inputEmail5" name="address"></div>
                           <div class="col-md-6"> <label for="inputPassword5" class="form-label">Prix</label> <input type="number" class="form-control" id="inputPassword5" name="price"></div>
                           <div class="col-md-6"> <label for="inputCity" class="form-label">Utilisateur</label> 
                            <select id="inputState" class="form-select" name="utilisateur">
                              <?php
                              $select=$bdd->query("SELECT * FROM utilisateurs ORDER BY id_utilisateur")
                              ?>
                                 <option selected>Choisir...</option>
                                 
                                 <?php
                                 while($dataselect=$select->fetch()){
                                 ?>
                                    <option value="<?php echo $dataselect["id_utilisateur"]?>" ><?php echo $dataselect["nom"]?></option>
                                 <?php
                                 }
                                 ?>
                              </select>
                           <!-- <input type="text" class="form-control" id="inputCity" name="utilisateur"> -->
                        </div>
                           <div class="col-md-2"> <label for="inputZip" class="form-label">Date de la soiree</label> <input type="date" class="form-control" id="inputZip" name="date"></div>
                           <div class="col-md-2"> <label for="inputZip" class="form-label">Whatsapp</label> <input type="text" class="form-control" id="inputZip" name="whatsapp"></div>
                          
                           <div class="text-center"> <input type="submit" value="submit" name="submit" class="btn btn-primary"> <button type="reset" class="btn btn-secondary">Reset</button></div>
                        </form>
                     </div>
                  </div>

<?php
if(isset($_POST["submit"])){
   $nom_soiree=$_POST["nom"];
   $address=$_POST["address"];
   $price=$_POST["price"];
   $utilisateur=$_POST["utilisateur"];
   $date=$_POST["date"];
   $whatsapp=$_POST["whatsapp"];
   
   $insert=$bdd->prepare("INSERT INTO soiree(nom_soiree,address,prix,id_utilisateur,date_heure,whatsapp)VALUES(?,?,?,?,?,?)");

   if($insert->execute(array($nom_soiree,$address,$price,$utilisateur,$date,$whatsapp))){
      echo "<script>alert('Soirée a été ajouté avec succès !')</script>";
   }else{
      echo "<script>alert('Erreur lors de l-enregistrement !')</script>";
   }

}
?>