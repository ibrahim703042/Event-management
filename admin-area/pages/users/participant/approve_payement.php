
<?php 
    if(isset($_GET['edit_id'])){
        
        $id = $_GET['edit_id'];
        extract($utlisateur->getID($id));	
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

            <form method="POST" action="" enctype="multipart/form-data" class="row g-3 py-5">

                
                <div class="col-md-2"> 
                    <label for="status" class="form-label">Status</label> 
                    <div class="form-check">
                    <label class="form-check-label" for="">
                        Etat de payement
                    </label>
                    <input class="form-check-input" type="checkbox" name="status" name="status" <?= $status == '0' ? '':'checked'?>>
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

        $status = isset($_POST['status']) ? '0':'1' ;
        
        $insert = $utilisateur->update($status);
        if($insert){

            redirect('dashboard.php?page=pages/users/participant/index','Payement approve Successfully');
            
        }else{
            // echo "<script>alert('Operation Failed');</script>";
            error('dashboard.php?page=pages/users/participant//add_user','Something went wrong');
        }
    
    }    
?>