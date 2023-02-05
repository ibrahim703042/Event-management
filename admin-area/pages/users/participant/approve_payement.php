<?php 
  
   if(isset($_GET['payement_id'])){
        
        $id = $_GET['payement_id'];
        extract($user->getID($id));	
    }

?>

<div class="pagetitle">
    <h1>Payement</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php?page=widget">Acceuil</a></li>
        <li class="breadcrumb-item">Utilisateur</li>
        <li class="breadcrumb-item active">Approuver</li>
        </ol>
    </nav>
</div>
   
<section class="section dashboard">
    <div class="card">
        <div class="card-body">
            <div class=" card-header">
                <h1 class=" card-title fs-2">Approver le payement</h1>
            </div>

            <form method="POST" action="" class="row g-3 py-5">

                
                <div class="col-md-12 h1"> 
                    <label for="status" class="form-label">
                        Etat de payement
                        <span class="form-check-label ms-5" for="">
                            <?php 
                                if ($status == 1){
                                    ?>
                                        <span class="badge bg-success">
                                            <?php echo('Le participant a deja Payé');?>
                                        </span>
                                    <?php	
                                }
                                else {
                                ?>
                                    <span class="badge bg-warning">
                                        <?php echo('Pas encore payé');?>
                                    </span>
                                <?php	
                                }
                            ?>
                        </span>
                    </label> 
                    <div class="form-check gap-5 me-5">
                        <input class="form-check-input" type="checkbox" name="status" <?= $status == '0' ? '':'checked'?>>

                    </div>
                </div>
                
                <div class=" text-end">
                    <button type="submit" class="btn btn-success" name="approver_user_btn">
                        Approuver
                    </button> 
            </form>
        </div>
    </div>
</section>



<?php

    if(isset($_POST["approver_user_btn"])){
        
            $payement_status = isset($_POST['status']) ? '1':'0' ;

            $qrcode = rand(999999, 111111);
            $qr_status = "not verified";
        
            $sql=" SELECT * FROM utilisateurs WHERE id_utilisateur = '$id' limit 1";
            $query = $dbconnection->query($sql);
            $data=$query->fetch();

            $status = $data['status'];
            $qrcode_1 = $data['qrcode'];
            $qr_status_1 = $data['qr_status'];
            $qrcode_1 = 0;
            $qr_status_1 = 'No Qrcode still unpaid';

            $receiveremail = $data['email'];

            if($status==0){
                //move_uploaded_file($_FILES["file"]["tmp_name"],"assets/img/users_image/".basename($_FILES['file']['name']));
                
                $subject = "Email Verification QRcode";
                $message = "Your verification code is $code";
                $sender = "From: kwizera.ibrahim529@gmail.com";
                // $info = "We've sent a Qrcode to  email - $email";
                $update = $user->update_payement($id,$payement_status,$qrcode,$qr_status);

                mail($receiveremail, $subject, $message, $sender);
                redirect('dashboard.php?page=pages/users/participant/index','We haveve sent a Qrcode to  email - '.$receiveremail);
        
            }
            else{
                if($status == 1){
                    $update_2 =$dbconnection->EXEC("UPDATE utilisateurs SET status= 0 ,qrcode='$qrcode_1',qr_status='$qr_status_1'");
                    
                    if($update_2){}
                    redirect('dashboard.php?page=pages/users/participant/index','We have remove all payement details');
                    
                }

            }

                // echo "<script>alert('Operation Failed');</script>";
                // error('dashboard.php?page=pages/users/participant//add_user','Something went wrong');      
        }
    
?>