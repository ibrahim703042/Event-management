

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

            echo "<script>alert('Record Delete successfully');</script>";
            //redirect('dashboard.php?page=pages/driver/index','Record Delete successfully');
            // Code for redirection
           echo "<script>window.location.href='dashboard.php?page=pages/driver/index'</script>";
        }
?>