

<?php

include 'includes/dbconnect.php';

$select=$bdd->query("SELECT * FROM publications WHERE id_not=".$_GET["id_not"]);
$row=$select->fetch();


if(isset($_POST['submit'])){

$title = $_POST['title'];
$content   = $_POST['content'];

if(  $update=$bdd->EXEC("UPDATE publications SET titre='$title' WHERE id_not=".$_GET["id_not"]."")){
   echo "<script>alert('Publication a été effectué avec succès !')</script>";
 }else{
   echo "<script>alert('Erreur lors de la modification !')</script>";
 }

if($insert->execute(array($title,$content))){
echo "<script>alert('Publication a été ajouté avec succès !')</script>";

Header("Location : index.php?page=pages/notifications/index");

}else{
echo "<script>alert('Erreur lors de l-enregistrement !')</script>";
}

}



?>








<form method="post" action="">


<div class="form-group">
<label for="exampleFormControlInput1">Titre</label>
<input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="<?php echo $row["titre"]?>">
</div>

<div class="form-group">
<label for="exampleFormControlTextarea1">Entre votre message</label>
<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content" ><?php echo $row["content"]?></textarea>
</div> <br/>
<button type="submit" class="btn btn-primary" name="submit" >Publier</button>
</form>