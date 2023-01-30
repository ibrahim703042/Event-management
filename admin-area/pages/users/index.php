
<div class="pagetitle">
   <h1>Utilisateur</h1>
   <nav>
      <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php?page=widget">Acceuil</a></li>
            <li class="breadcrumb-item">utilisateurs</li>
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
                  <a class="nav-link collapsed btn btn-success float-end text-white" href="dashboard.php?page=pages/users/add_user"> 
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
                  <h5 class="card-title">List des Utilisateurs</h5>

                  <table class="table table-striped datatable" id="example">
            
                     <thead>
                        <tr>
                           <th scope="col">#</th>
                           <th scope="col">Photo</th>
                           <th scope="col">Nom</th>
                           <!-- <th scope="col">Prenom</th> -->
                           <!-- <th scope="col">E-mail</th> -->
                           <!-- <th scope="col">Telephone</th> -->
                           <th scope="col">Pays</th>
                           <th scope="col">Passport</th>
                           <th scope="col">Rotary</th>
                           <th scope="col">Status</th>
                           <th scope="col" >Date </th>
                           <th scope="col" >Action </th>
                        </tr>
                     </thead>
                     <tbody>
                           <?php 
                        
                              $query = "SELECT * FROM utilisateurs";    
                              
                              $user->dataview($query);
                           ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <th scope="col"></th>
                           <th scope="col"></th>
                           <th scope="col">Nom</th>
                           <!-- <th scope="col">Prenom</th> -->
                           <!-- <th scope="col">E-mail</th> -->
                           <!-- <th scope="col">Telephone</th> -->
                           <th scope="col">Pays</th>
                           <th scope="col">Passport</th>
                           <th scope="col">Rotary</th>
                           <th scope="col">Status</th>
                           <th scope="col" >Date </th>
                           <th scope="col" ></th>
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