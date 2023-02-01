
<?php

    
    if(isset($_GET['view_id'])){
        
        $id = $_GET['view_id'];
        extract($driver->getID($id));	
    }
    //$query = "SELECT * FROM chauffeurs WHERE id_chauffeur = $id "
?>

<div class="pagetitle">
 <h1>Chauffeur</h1>
 <nav>
   <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="dashboard.php?page=widget">Acceuil</a></li>
      <li class="breadcrumb-item">Chauffeurs</li>
      <li class="breadcrumb-item active">Details</li>
    </ol>
 </nav>
</div>

<!-- <section class="section dashboard">
    <div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-12">
                <div class="card overflow-auto">

                    <div class="card-body py-3">
                    
                        <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row"> 
                                    
                                    <div class="col-xxl-4 col-md-6">
                                        <div class="row">
                                        <div class="col-8">
                                            <div class="card w-50">
                                            
                                                <img class="rounded" src="<?= $photo ?>" >

                                            
                                            </div>
                                        </div>
                                        
                                        </div>
                                        <h5 class="card-title">About</h5>
                                        <p class="small fst-italic">
                                            Sunt est soluta temporibus accusantium neque
                                            nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor.
                                            Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. 
                                            Fuga sequi sed ea saepe at unde.
                                        </p>
                                    </div>

                                    <div class="col-xxl-2 col-md-6">

                                        <h5 class="card-title">Profile Details</h5>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">Nom complet</div></div>
                                            <div class="col-lg-9 col-md-8"><?= $nom_complet?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Telephone</div>
                                            <div class="col-lg-9 col-md-8"><?= $numero_telephone?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Permis no</div>
                                            <div class="col-lg-9 col-md-8"><?= $numero_permis_conduir?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Addresse</div>
                                            <div class="col-lg-9 col-md-8"><?= $address?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Date</div>
                                            <div class="col-lg-9 col-md-8"><?= $date_chauffeur?></div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">E-mail</div>
                                            <div class="col-lg-9 col-md-8">
                                                <a href="" class="__cf_email__" data-cfemail="e982c788878d8c9b9a8687a98c91888499858cc78a8684">
                                                    [email&#160;protected]</a>
                                                </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    </div>
                
                     <div class="card-footer text-end">
                
                     <?php
                        if(isset($_GET['view_id'])){

                            ?>
                            <form method="POST" enctype="multipart/form-data">
                                <button type="submit" class="btn btn-danger" name="btn_del">
                                    OUI
                                </button>
                                <a href="dashboard.php?page=pages/cars/index" class="btn  btn-info text-white">
                                    NON
                                </a>
                            </form>  
                            <?php
                        }
                    ?>
                    
                </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</section> -->


<section class="section dashboard">
    
    <div class="card mb-3">
        <div class="row g-0">

            <div class="col-md-4">
                <img src="<?= $photo ?>" class="img-fluid rounded-start" alt="Card title">
            </div>

            <div class="col-md-8">
                <div class="card-body">
                        
                    <h5 class="card-title">Profile Details</h5>
                    <div class="row">
                        <div class="col-md-6 label ">Nom complet</div></div>
                        <div class="col-md-6"><?= $nom_complet?></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Telephone</div>
                        <div class="col-lg-9 col-md-8"><?= $numero_telephone?></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Permis no</div>
                        <div class="col-lg-9 col-md-8"><?= $numero_permis_conduir?></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Addresse</div>
                        <div class="col-lg-9 col-md-8"><?= $address?></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Date</div>
                        <div class="col-lg-9 col-md-8"><?= $date_chauffeur?></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
</section>
