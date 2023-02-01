<?php
include("includes/dbconnection.php");
$select=$bdd->query("SELECT * FROM soiree WHERE id_soiree=".$_GET["id"]."");
$data=$select->fetch();
?>
<div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Modifier un événement</h5>
                        <form class="row g-3" method="POST">
                           <div class="col-md-12"> <label for="inputName5" class="form-label">Nom Soirée</label> <input type="text" class="form-control" id="inputName5" name="nom" value="<?php echo $data["nom_soiree"]?>"></div>
                           <div class="col-md-6"> <label for="inputEmail5" class="form-label">Addresse</label> <input type="text" class="form-control" id="inputEmail5" name="address" value="<?php echo $data["address"]?>"></div>
                           <div class="col-md-6"> <label for="inputPassword5" class="form-label">Prix</label> <input type="number" class="form-control" id="inputPassword5" name="price" value="<?php echo $data["prix"]?>"></div>
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
                           <div class="col-md-2"> <label for="inputZip" class="form-label">Date de la soiree</label> <input type="date" class="form-control" id="inputZip" name="date" value="<?php echo $data["date_heure"]?>"></div>
                           <div class="col-md-2"> <label for="inputZip" class="form-label">Whatsapp</label> <input type="text" class="form-control" id="inputZip" name="whatsapp" value="<?php echo $data["whatsapp"]?>"></div>
                          
                           <div class="text-center"> <input type="submit" value="modifier" name="submit" class="btn btn-primary"> <button type="reset" class="btn btn-secondary">Reset</button></div>
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

 if(  $update=$bdd->EXEC("UPDATE soiree SET nom_soiree='$nom_soiree',address='$address',prix='$price',id_utilisateur='$utilisateur',date_heure='$date',whatsapp='$whatsapp' WHERE id_soiree=".$_GET["id"]."")){
   echo "<script>alert('Modification a été effectué avec succès !')</script>";
 }else{
   echo "<script>alert('Erreur lors de la modification !')</script>";
 }

}
?>