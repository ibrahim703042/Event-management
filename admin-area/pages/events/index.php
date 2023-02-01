<?php

$select=$bdd->query("SELECT s.*, u.* FROM soiree s, utilisateurs u WHERE s.id_utilisateur=u.id_utilisateur ORDER BY id_soiree ASC");
?>
<div class="pagetitle">
            <h1>Soirée</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                  <li class="breadcrumb-item active">Soirée</li>
               </ol>
            </nav>
   </div>
   <br>
<section class="section dashboard">
      <div class="row">
         <div class="col-lg-12">
            <div class="row">
               <div class="col-12">
                  <div class="card recent-sales overflow-auto">
                     <div class="card-heard mx-3 mt-3">
                        <a class="nav-link collapsed btn btn-success float-end text-white" href="dashboard.php?page=pages/events/add_event"> 
                           <i class="bi bi-plus-circle-fill"></i> <span>Ajouter</span> 
                        </a>
                     </div>
                     <div class="filter mt-5">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                           <li class="dropdown-header text-start">
                           <h6>Filter</h6>
                           </li>
                           <li><a class="dropdown-item" href="#">Today</a></li>
                           <li><a class="dropdown-item" href="#">This Month</a></li>
                           <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                     </div>
                        <!-- table responsive -->
                     <div class="card-body">
                        <h5 class="card-title">Soirée <span>| Disponible</span></h5>

                        <table class="table table-striped datatable" id="example">

<!-- table responsive -->


    <table class="table table-borderless datatable">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom Soirée</th>
            <th scope="col">Addresse</th>
            <th scope="col">Prix</th>
            <th scope="col">Utilisateur</th>
            <th scope="col">Date</th>
            <th scope="col">Whatsapp</th>
            <th scope="col" colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
            <?php
            while($dataselect=$select->fetch()){
            ?>
        <tr>
            <th scope="row"><a href="#"><?php echo $dataselect["id_soiree"]?></a></th>
            <td><?php echo $dataselect["nom_soiree"]?></td>
            <td><a href="#" class="text-primary"><?php echo $dataselect["address"]?></a></td>
            <td><?php echo $dataselect["prix"]?> fbu</td>
            <td><?php echo $dataselect["nom"]?></td>
            <td><?php echo $dataselect["date_heure"]?></td>
            <td><?php echo $dataselect["whatsapp"]?></td>
            <td><span class=" text-info me-3"><a href="dashboard.php?page=pages/events/update_event&id=<?php echo $dataselect["id_soiree"]?>"><i class="bi bi-pencil"></i></a></span></td>
            <td><span class="text-danger me-3"><a href="dashboard.php?page=pages/events/index&supp=<?php echo $dataselect["id_soiree"]?>" onclick="return confirm('Voulez-vous vraiment supprimer?')"><i class="bi bi-trash"></i></a></span></td>
        </tr>
        <?php
            }
        ?>
      
      </tbody>
    </table>
    </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>

<?php
if(isset($_GET["supp"])){
    $idtodelete=$_GET["supp"];
    $delete=$bdd->EXEC("DELETE FROM soiree WHERE id_soiree=$idtodelete");
}
?>