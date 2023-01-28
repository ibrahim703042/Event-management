<?php 
include  'includes/db_connect.php';
?>

    <div class="pagetitle">
        <h1>Chauffeur</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php?page=widget">Acceuil</a></li>
                <li class="breadcrumb-item">Chauffeurs</li>
                <li class="breadcrumb-item active">Table</li>
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
                        <a class="nav-link collapsed btn btn-success float-end text-white" href="dashboard.php?page=pages/drivers/add_driver"> 
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
                        <h5 class="card-title">List des Chauffeurs</h5>

                        <table class="table table-striped datatable" id="example">
                
                           <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Nom complet</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Permis</th>
                                <th scope="col">Address</th>
                                <th scope="col" >Date </th>
                                <th scope="col" >Action </th>
                              </tr>
                           </thead>
                           <tbody>
                                <?php 
                                    /* $sql ="SELECT * FROM chauffeurs";
                                    $query= $dbconnection -> prepare($sql);
                                    $query-> execute();
                                    $results = $query -> fetchAll(PDO::FETCH_OBJ);
                                    $count = 1;
                                    if($query -> rowCount() > 0)
                                    {
                                    foreach($results as $result)
                                    {
                                    ?>
                                        <tr>
                                            <td classe="text-center"><?php echo($count);?></td>
                                            <td classe="text-center">
                                                <img class="" src="assets/img/drivers_image/<?php echo htmlentities($result->photo);?>" alt="profil" height="40" width="40" style="border-radius: 50px;" >
                                            </td>
                                            </td>
                                            <td classe="text-center"><?php echo htmlentities($result->nom_complet);?></td>
                                            <td classe="text-center"><?php echo htmlentities($result->numero_telephone);?></td>
                                            <td classe="text-center"><?php echo htmlentities($result->numero_permis_conduir);?></td>
                                            <td classe="text-center"><?php echo htmlentities($result->addresse);?></td>
                                            <td classe="text-center">
                                                <span class="">
                                                    <?php  echo htmlentities(date("d-m-Y", strtotime($result->date)));?>
                                                </span>
                                            </td>
                                            <td classe="text-center">  
                                                <!-- <a href="dashboard.php&page=pages/drivers/view"> -->
                                                    <!-- <button class="btn btn-info"> -->
                                                    <button type="button" class="btn btn-primary" 
                                                        data-bs-toggle="modal" data-bs-target="#modalDialogScrollable">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </button>
                                                    <?php include 'view.php' ?>
                                                <!-- </a>   -->
                                                <a href="dashboard.php?page=pages/drivers/edit&id=<?php echo htmlentities($result->id_chauffeur);?>">
                                                    <button class="btn btn-info">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                </a>  
                                                <a href="dashboard.php?page=pages/drivers/delete&del=<?php echo htmlentities($result->id_chauffeur);?>">
                                                    <button class="btn btn-danger" onClick="return confirm('Do you really want to delete');">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php  $count=$count+1; } }  */
                                ?>
                                <?php 
                              
                                    $query = "SELECT * FROM chauffeurs";    
                                    
                                    $driver->dataview($query);
                                ?>
                           </tbody>
                           <tfoot>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Nom complet</th>
                                    <th scope="col">Telephone</th>
                                    <th scope="col">Permis</th>
                                    <th scope="col">Address</th>
                                    <th scope="col" >Date</th>
                                </tr>
                            </tfoot>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </section>