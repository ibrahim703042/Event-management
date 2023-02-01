


<div class="pagetitle">
            <h1>Hotel</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                  <li class="breadcrumb-item active">hotel</li>
               </ol>
            </nav>
         </div>

         <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">ajouter l'hotel</h5>
                        <form class="row g-3"  method = "POST" enctype="multipart/form-data">
                           <div class="col-md-12"> <label for="inputName5" class="form-label">Nom du hotel</label> 
                           <input type="text"  name="nom"class="form-control" id="inputName5"></div>
                          
                           <div class="col-md-6"> <label for="inputPassword5" class="form-label">Addresse</label>
                            <input type="text" class="form-control" id="inputPassword5" name ="address"></div>
                           <div class="col-12"> <label for="inputAddress5" class="form-label" >Le lien pour reserver</label>
                            <input type="text" class="form-control" id="inputAddres5s" name ="link" placeholder="1234 Main St"></div>
                            <div class="col-md-12"> 
                    <input type="file" name="image" id="">
                </div>
                           <div class="text-center"> 
                              <button type="submit" class="btn btn-primary" name = "submit">Ajouter</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
<?php
   if(isset($_POST["submit"])){
  
   $nom=$_POST["nom"];
   $photo=$_FILES["image"]["name"];
   $address=$_POST["address"];
   $link=$_POST["link"];
   
   $target="assets/img/".basename($_FILES['image']['name']);
   


   $insert=$bdd->prepare("INSERT INTO hotels(hotel,photo,addresse,link) VALUES(?,?,?,?)");

   if($insert->execute(array($nom,$target,$address,$link))){
      move_uploaded_file($_FILES["image"]["tmp_name"],$target);
        echo "<script>alert('Utilisateur a été enregistré avec succès !')</script>";
   }else{
      echo "<script>alert('Enregistrement a échoué !')</script>";
   }
}
?>