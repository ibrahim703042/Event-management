<?php

class user{
	
	private $db;
	
	function __construct($DB_con){
		
		$this->db = $DB_con;
	}
	
	public function create($fname,$lname,$email,$phone,$passport,$file,$country,$rotary,$status){
		try
		{
			$query = "INSERT INTO utilisateurs (nom,prenom,email,numero_telephone,passport,photo,pays,rotary,status) VALUES(:fname,:lname,:email,:phone,:passport,:file,:country,:rotary,:status)";
			$stmt = $this->db->prepare($query);
			$stmt->bindParam(':fname',$fname);
            $stmt->bindParam(':lname',$lname);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':phone',$phone);
            $stmt->bindParam(':passport',$passport);
            $stmt->bindParam(':file',$file);
            $stmt->bindParam(':country',$country);
            $stmt->bindParam(':rotary',$rotary);
            $stmt->bindParam(':status',$status);
        
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}		

	}

	public function update($id,$fname,$lname,$email,$phone,$passport,$file,$country,$rotary){

		try
		{
			$query ="UPDATE utilisateurs 
				SET nom=:fname, prenom=:lname, email=:email, numero_telephone=:phone, passport=:passport,
					photo_utilisateur=:file, pays=:country,rotary=:rotary 
				WHERE id_utilisateur=:id_utilisateur ";

			$stmt = $this->db->prepare($query);
			$stmt->bindParam(':fname',$fname);
            $stmt->bindParam(':lname',$lname);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':phone',$phone);
            $stmt->bindParam(':passport',$passport);
            $stmt->bindParam(':file',$file);
            $stmt->bindParam(':country',$country);
            $stmt->bindParam(':rotary',$rotary);
			$stmt->bindparam(":id_utilisateur",$id);
			$stmt->execute();
			
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	public function payement($id,$fname,$lname,$email,$phone,$passport,$file,$country,$rotary,$status,$role,$password){

		try
		{
			$query ="UPDATE utilisateurs 
				SET  status=:status WHERE id_utilisateur=:id_utilisateur ";

			$stmt = $this->db->prepare($query);
            $stmt->bindParam(':status',$status);
			$stmt->bindparam(":id_utilisateur",$id);
			$stmt->execute();
			
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

	public function getID($id){

		$stmt = $this->db->prepare("SELECT * FROM utilisateurs WHERE id_utilisateur=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

	public function get_ID($table,$id){

		$stmt = $this->db->prepare("SELECT * FROM $table WHERE id_utilisateur=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	
	public function delete($id){

		$stmt = $this->db->prepare("DELETE FROM utilisateurs WHERE id_utilisateur=:id");
		$stmt->bindparam(":id",$id);
		//$stmt->execute();
		return true;
	}

	// table
	public function dataview($query){

		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0){
			$count = 1;
			while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
				
				?>
				<tr>
					<td classe="text-center"><?php echo($count);?></td>
					<!-- <td classe="text-center"><?php print($row['ID']);?></td> -->
					<td classe="text-center">
						<img class="" src="assets/img/users_image/<?php print($row['photo']);?>" alt="car-image" height="40" width="40" style="border-radius: 50px;" >
					</td>
					<td classe="text-center"><?php print($row['nom']).' '.print($row['nom']);?></td>
					<!-- <td classe="text-center"><?php print($row['prenom']);?></td> -->
					<!-- <td classe="text-center"><?php print($row['email']);?></td> -->
					<!-- <td classe="text-center"><?php print($row['numero_telephone']);?></td> -->
					<!-- <td classe="text-center"><?php print($row['status_utilisateur']);?></td> -->
					
					<td classe="text-center"><?php print($row['pays']);?></td>
					<!-- <td classe="text-center"><?php print($row['passport']);?></td> -->
					<!-- <td classe="text-center"><?php print($row['rotary']);?></td> -->

					<!-- <td classe="text-center">
						<?=$row['status']  == '1' ? "Actif" : "Inactif";?>
					</td> -->					
					<?php 
						if ($row['status'] == 1 ){
							?>
							<td classe="text-center">
								<span class="badge bg-success">
									<?php echo "OUI"//print($row['status']);?>
								</span>
							</td>
							<?php	
						}
						else{
							?>
							<td classe="text-center">
								<span class="badge bg-warning">
									<?php echo "NON" ?>
								</span>
							</td>
						<?php	
						}
						
					?>

					<td classe="text-center">
						<span class="">
							<?php  print(date("d-m-Y", strtotime($row['date_utilisateur'])));?>
						</span>
					</td>

					<td classe="text-center"> 
						<a class="text-primary me-3" href="dashboard.php?page=pages/users/participant/profile&id=<?php print($row['id_utilisateur']);?>"">
								<i class="bi bi-eye-fill"></i>
						</a>  
						<!-- <a class=" text-info me-3" href="dashboard.php?page=pages/users/edit&edit_user_id=<?php print($row['id_utilisateur']);?>" >
							<i class="bi bi-pencil"></i>
						</a>
						<a class="text-danger me-3" href="dashboard.php?page=pages/users/delete&delete_id=<?php print($row['id_utilisateur']);?>">
								<i class="bi bi-trash"></i>
						</a> -->
					</td>
				</tr>
                <?php $count=$count+1;?>
                <?php
			}
		}
		
		
	}

}
