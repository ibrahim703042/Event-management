<?php 
include '../database/db_connect.php';
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
                        <tbody id="">
                              
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



<?php 
        if(isset($_REQUEST['delete_id'])){
            //Get row id
            $uid=intval($_GET['delete_id']);
            // $uid=intval($id);
        
            //Qyery for deletion
            $sql = "delete from chauffeurs WHERE  id_chauffeur=:id";
            // Prepare query for execution
            $query = $dbconnection->prepare($sql);
            // bind the parameters
            $query-> bindParam(':id',$uid, PDO::PARAM_STR);
            // Query Execution
            $query -> execute();
            // Mesage after updation

            if($query){
               ?>
               <!-- <script>document.location.reload();</script> -->
               <script>window.location.href='dashboard.php?page=pages/driver/index'</script>
               <?php
               }
            //echo "<script>alert('Record Delete successfully');</script>";
            //redirect('dashboard.php?page=pages/driver/index','Record Delete successfully');
            // Code for redirection
            //echo "<script>window.location.href='dashboard.php?page=pages/driver/index'</script>";
        }
?>

