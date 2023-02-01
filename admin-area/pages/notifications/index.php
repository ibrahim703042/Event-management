<?php 


$select=$bdd->query("SELECT * FROM publications ");

?>



 <div class="pagetitle">
            <h1>Notifications</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="daswhboard.php">Accueil</a></li>
                  <li class="breadcrumb-item active">Notifications</li>
               </ol>
            </nav>
         </div>
          
         <section class="section dashboard">
      <div class="row">
         <div class="col-lg-12">
            <div class="row">
               <div class="col-12">
                  <div class="card recent-sales overflow-auto">
                     <div class="card-heard mx-3 mt-3">
                        <a class="nav-link collapsed btn btn-success float-end text-white" href="dashboard.php?page=pages/notifications/addnot" > 
                           <i class="bi bi-plus-circle-fill"></i> <span>Ajouter</span> 
                        </a>
                     </div>
                     <br>
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
                       
                     <table class="table table-striped datatable" id="example">
 
        <thead>
            
        <tr>
            <th scope="col">#</th>
            <th scope="col">titre</th>
            <th scope="col">Mesage</th>
            <th scope="col">Operations</th>
            
            
        </tr>
        </thead> 



             



        <tbody>

        <?php
            $count = 1;
            while($row=$select->fetch()){
            ?>
        <tr>
            <th scope="row"><a href="#"><?php echo  $count;?></a></th>
            <td><?php echo  $row['titre']; ?></td>
            <td><a href="#" class="text-primary"><?php echo  $row['content']; ?></a></td>
            <td>
            <a class="text-primary me-3"  
            href="dashboard.php?page=pages/notifications/updatenot&id_not=<?php echo  $row['id_not']; ?>" >
                                          <i class="bi bi-pencil"></i>
                                       </a>
            <a class=" text-danger me-3" href="dashboard.php?page=pages/notifications/index&supp=<?php echo $row["id_not"]?>" 
                    onclick="return confirm('Voulez-vous vraiment supprimer?')">
                <i class="bi bi-trash"></i></a>
            </td>
        </td>
           
            </tr>
                <?php $count=$count+1;?>
                
           
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
    </section>

<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Voulez-vous vraiment supprimer ?');
}
</script>

<?php
if(isset($_GET["supp"])){
    $idtodelete=$_GET["supp"];
    $delete=$bdd->EXEC("DELETE FROM publications WHERE id_not=$idtodelete");
}
?>

<?php
if(isset($_GET["stat"])){
    $id=$_GET["stat"];
    
    $update=$bdd->EXEC("UPDATE publications SET titre='$title' WHERE id_not=$id");
    header('location:index.php?page=pages/publications/index');
}
?>