
<?php 
   $bdd=new PDO('mysql:host=localhost;dbname=event;charset=utf8','root','');
   $select=$bdd->query("SELECT * FROM participants WHERE id_participant= 1 ");
   $data=$select->fetch();
?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- bootstrap 5 -->
  <link href="public/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="public/assets/css/bootstrap-icons.css" rel="stylesheet">
  <link href="public/assets/css/boxicons.min.css" rel="stylesheet">
  <link href="public/assets/css/quill.snow.css" rel="stylesheet">
  <link href="public/assets/css/quill.bubble.css" rel="stylesheet">
  <link href="public/assets/css/remixicon.css" rel="stylesheet">
  <link href="public/assets/css/style.css" rel="stylesheet">

</head>

<body class="bg-light">
  
    <main id="" class="container mt-4">

        <section class="section profile min-vh-100">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class=" card-header">
                            <h2 class=" card-title text-center fs-2">Détails de participant CCD-2023</h2>
                        </div>
                        <div class="card-body py-5">
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                   
                                    <div class="row g-3">

                                        <div class="col-md-2">
                                            <div class="d-flex flex-column align-items-center text-center p-3 py-2">
                                                
                                                <img class="rounded-circle mt-2" width="100px"
                                                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">

                                                <span>
                                                    <h5><?php echo $data["nom"]?></h5>
                                                    <h6><?php echo $data["prenom"]?></h6>
                                                    <h6>
                                                        <?php 
                                                            if ($data['status'] == 1){
                                                                ?>
                                                                    <span class="badge bg-success">
                                                                        <?php echo('Payé');?>
                                                                    </span>
                                                                <?php	
                                                            }
                                                            else {
                                                                ?>
                                                                    <span class="badge bg-danger">
                                                                        <?php echo('Pas encore payé');?>
                                                                    </span>
                                                                <?php	
                                                            }
                                                    
                                                        ?>
                                                    </h6>
                                                </span>
                                            </div>
                                        </div>
    
                                        <div class="tab-content pt-2 col-md-5 mt-2 border-right">
                                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                                
                                                <div class="row">
                                                    <div  class="col-lg-3 col-md-4 label">Nom Badge</div>
                                                    <div class="col-lg-9 col-md-8"><?php echo $data["nom_badge"]?></div>
                                                </div>

                                                <div class="row">
                                                    <div  class="col-lg-3 col-md-4 label">Email</div>
                                                    <div class="col-lg-9 col-md-8"><?php echo $data["email"]?></div>
                                                </div>

                                                <div class="row">
                                                    <div  class="col-lg-3 col-md-4 label">Téléphone</div>
                                                    <div class="col-lg-9 col-md-8"><?php echo $data["telephone1"].' ou '.$data["telephone2"]?></div>
                                                </div>

                                                <div class="row">
                                                    <div  class="col-lg-3 col-md-4 label">Pays</div>
                                                    <div class="col-lg-9 col-md-8">
                                                        <script>
                                        
                                                        document.write(countries["<?php echo $data['pays'];?>"]);
                                                    
                                                        </script>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div  class="col-lg-3 col-md-4 label">GP Sanguin</div>
                                                    <div class="col-lg-9 col-md-8"><?php echo $data["groupe_sanguin"]?></div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div  class="col-lg-3 col-md-4 label">A Medicaux</div>
                                                    <div class="col-lg-9 col-md-8"><?php echo $data["antecedent_med"]?></div>
                                                </div>

                                                <div class="row">
                                                    <div  class="col-lg-3 col-md-4 label">A Chirurgicaux</div>
                                                    <div class="col-lg-9 col-md-8"><?php echo $data["antecedent_chir"]?></div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div  class="col-lg-3 col-md-4 label">P Culinaires</div>
                                                    <div class="col-lg-9 col-md-8"><?php echo $data["particularite"]?></div>
                                                </div>

                                                <div class="row">
                                                    <div  class="col-lg-3 col-md-4 label">invité</div>
                                                    <div class="col-lg-9 col-md-8"><?php echo $data["invite"]?></div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div  class="col-lg-3 col-md-4 label">Hotel</div>
                                                    <div class="col-lg-9 col-md-8"><?php echo $data["hotel"]?></div>
                                                </div>
                                                             
                                            </div>
                                        </div>

                                        <div class="tab-content pt-2 col-md-5 mt-2 border-right">
                                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                                
                                                <!-- event -->
                                                
                                                <div class="row">
                                                    <div  class="col-lg-3 col-md-4 label">Nom Rotary</div>
                                                    <div class="col-lg-9 col-md-8"><?php echo $data["club"]?></div>
                                                </div>

                                                <div class="row">
                                                    <div  class="col-lg-3 col-md-4 label">F District</div>
                                                    <div class="col-lg-9 col-md-8"><?php echo $data["fonction_district"]?></div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div  class="col-lg-3 col-md-4 label">D Rotary</div>
                                                    <div class="col-lg-9 col-md-8"><?php echo $data["distinction_rotary"]?></div>
                                                </div>

                                                <div class="row">
                                                    <div  class="col-lg-3 col-md-4 label">Activité Choisi</div>
                                                    <div class="col-lg-9 col-md-8"><?php echo $data["activite_choisie"]?></div>
                                                </div>

                                                <div class="row">
                                                    <div  class="col-lg-3 col-md-4 label">Classification</div>
                                                    <div class="col-lg-9 col-md-8"><?php echo $data["classification"]?></div>
                                                </div>

                                                <div class="row">
                                                    <div  class="col-lg-3 col-md-4 label">F Club</div>
                                                    <div class="col-lg-9 col-md-8"><?php echo $data["fonction_club"]?></div>
                                                </div>

                                                <div class="row">
                                                    <div  class="col-lg-3 col-md-4 label">Date d'arrive</div>
                                                    <div class="col-lg-9 col-md-8"><?php echo $data["date_arrive"]?></div>
                                                </div>

                                                <div class="row">
                                                    <div  class="col-lg-3 col-md-4 label">Date Depart</div>
                                                    <div class="col-lg-9 col-md-8"><?php echo $data["date_depart"]?></div>
                                                </div>

                                                <div class="row">
                                                    <div  class="col-lg-3 col-md-4 label">Vol</div>
                                                    <div class="col-lg-9 col-md-8"><?php echo $data["vol"]?></div>
                                                </div>

                                                <div class="row">
                                                    <div  class="col-lg-3 col-md-4 label">Numero Vol</div>
                                                    <div class="col-lg-9 col-md-8"><?php echo $data["numero_vol"]?></div>
                                                </div>
                                        
                                        
                                                 
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>