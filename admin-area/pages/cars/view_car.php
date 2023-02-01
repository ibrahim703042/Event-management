

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
<section class="section dashboard">
    <div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-12">
                <div class="card overflow-auto">
                
                    <!-- table responsive -->
                    <div class="card-body py-3">
                    
                        <?php
                     
                            include 'test.php'
                        ?>
                    </div>
                
                <!-- delete confirmation -->
                <div class="card-footer text-end">
                
                    <?php
                        if(isset($_GET['view_id'])){

                            ?>
                            <form method="POST" enctype="multipart/form-data">
                                <!-- <input type="hidden" name="id_chauffeur" value="<?php echo $_GET['view_id']; ?>" /> -->
                                <button type="submit" class="btn btn-danger" name="btn_del">
                                    <!-- <i class="bi bi-trash me-1"></i> -->
                                    OUI
                                </button>
                                <a href="dashboard.php?page=pages/cars/index" class="btn  btn-info text-white">
                                    <!-- <i class="bi bi-chevron-double-left me-1"></i> -->
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
</section>
