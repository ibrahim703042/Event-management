<?php 
   include '../app/middleware/middleware.php';
?>

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Acceuil</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
    </div>
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php include './cards.php' ?>

                    <!-- begin table -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="filter">
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
                                <h5 class="card-title">Inscriptions <span>| recentes </span></h5>
                                <table class="table table-striped datatable" id="example">
                
                <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Pays</th>
                                <th scope="col">Payé</th>
                                <th scope="col" >Action </th>
                              </tr>
                </thead>
                <tbody>
                     <?php 
                   
                         /* $query = "SELECT * FROM utilisateurs limit 5";    
                         
                         $utilisateur->dataview($query); */
                     ?>
                </tbody>
                <tfoot>
                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Pays</th>
                                <th scope="col">Payé</th>
                                <th scope="col" >Action </th>
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