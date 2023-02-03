<?php 


$select=$bdd->query("SELECT * FROM hotels ");

?>

<div class="pagetitle">
    <h1>Hotels</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Acceuil</a></li>
            <li class="breadcrumb-item active">Nos hotels</li>
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
                        <a class="nav-link collapsed btn btn-success float-end text-white" href="dashboard.php?page=pages/hotels/add_hotel"> 
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
                                 <th scope="col">Hotel</th>
                                 <th scope="col">Photo</th>
                                 <th scope="col">Addresse</th>
                                 <th scope="col">Link</th>
                                 <th>Action</th>
                                 
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 $count = 1;
                                 while($row=$select->fetch()){
                                    ?>
                                       <tr>
                                          <td >
                                             <a href="#"><?php echo  $count ;?></a>
                                          </td>
                                          <td>
                                             <?php echo  $row['hotel']; ?>
                                          </td>
                                          <td >
                                             <img class="" src="<?php echo  $row['photo']; ?>" alt="profil" height="40" width="40" style="border-radius: 50px;" >
                                          </td>

                                          <td>
                                             <?php echo  $row['addresse']; ?>
                                          </td>
                                          <td>
                                             <?php echo  $row['link']; ?>
                                          </td>

                                          <td class="text-center">
                                             <a class="text-primary me-3"  href="dashboard.php?page=pages/hotels/update_hotel&id_hotel=<?php echo  $row['id_hotel']; ?>" >
                                                <i class="bi bi-pencil"></i>
                                             </a>
                                             <a class=" text-danger me-3" href="dashboard.php?page=pages/hotels/index&supp=<?php echo $row["id_hotel"]?>" 
                                             onclick="return confirm('Voulez-vous vraiment supprimer?')">
                                             <i class="bi bi-trash"></i></a>
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
    return confirm('Are you sure?');
}
</script>

<?php
if(isset($_GET["supp"])){
    $idtodelete=$_GET["supp"];
    $delete=$bdd->EXEC("DELETE FROM hotels WHERE id_hotel=$idtodelete");
    if($delete){
      ?>
      <script>
         document.location.reload();
         
      </script>
      <?php
      }
}
?>