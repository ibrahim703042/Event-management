

<?php



      if(isset($_POST['submit'])){

         $title = $_POST['title'];
         $content   = $_POST['content'];
         
   
   $insert=$bdd->prepare("INSERT INTO publications(titre,content)VALUES(?,?)");

   if($insert->execute(array($title,$content))){
      echo "<script>alert('Publication a été ajouté avec succès !')</script>";
   }else{
      echo "<script>alert('Erreur lors de l-enregistrement !')</script>";
   }

}
?>



      




<form method="post" action="">
  <div class="form-group">
    <label for="exampleFormControlInput1">Titre</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Entre votre message</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
  </div> <br/>
  <button type="submit" class="btn btn-primary" name="submit" >Publier</button>
</form>