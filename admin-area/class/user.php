<?php

class user{
	
	private $db;
	
	function __construct($DB_con){
		
		$this->db = $DB_con;
	}
	
	public function create($username,$email,$phone,$file,$status,$role,$password){
		try
		{
			$query = "INSERT INTO admins (nom,email,telephone,profile,role_as,status,mot_passe,date_admin) 
			VALUES(:username,:email,:phone,:file,:role,:status,:password,NOW())";
			$stmt = $this->db->prepare($query);
			
			$stmt->bindParam(':username',$username);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':phone',$phone);
            $stmt->bindParam(':file',$file);
            $stmt->bindParam(':status',$status);
            $stmt->bindParam(':role',$role);
            $stmt->bindParam(':password',$password);
        
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

		$stmt = $this->db->prepare("SELECT * FROM admins WHERE ID=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

	public function getID_admin($id){

		$stmt = $this->db->prepare("SELECT * FROM admins WHERE ID=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

	public function update($id,$username,$email,$phone,$file,$status,$role,$password){

		try
		{
			$query ="UPDATE admins 
				SET nom=:username, email=:email, telephone=:phone,
					profile=:file, status=:status, role_as=:role, password=:password 
				WHERE ID=:id_admin ";

			$stmt = $this->db->prepare($query);
			$stmt->bindParam(':username',$username);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':phone',$phone);
            $stmt->bindParam(':file',$file);
            $stmt->bindParam(':status',$status);
            $stmt->bindParam(':role',$role);
            $stmt->bindParam(':password',$password);
			$stmt->bindparam(":id_admin",$id);
			$stmt->execute();
			
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	public function delete($id){

		$stmt = $this->db->prepare("DELETE FROM admins WHERE ID=:id");
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
						<img class="" src="assets/img/users_image/<?php print($row['photo_utilisateur']);?>" alt="car-image" height="40" width="40" style="border-radius: 50px;" >
					</td>
					<td classe="text-center"><?php print($row['nom']);?></td>
					<!-- <td classe="text-center"><?php print($row['prenom']);?></td> -->
					<!-- <td classe="text-center"><?php print($row['email']);?></td> -->
					<!-- <td classe="text-center"><?php print($row['numero_telephone']);?></td> -->
					<!-- <td classe="text-center"><?php print($row['status_utilisateur']);?></td> -->
					
					<td classe="text-center"><?php print($row['pays']);?></td>
					<td classe="text-center"><?php print($row['passport']);?></td>
					<td classe="text-center"><?php print($row['rotary']);?></td>

					<!-- <td classe="text-center">
						<?=$row['status_utilisateur']  == '1' ? "Actif" : "Inactif";?>
					</td> -->					
					<?php 
						if ($row['role_as'] == 1 ){
							?>
							<td classe="text-center">
								<span class="badge bg-success">
									<?php echo "Super administrateur"//print($row['status']);?>
								</span>
							</td>
							<?php	
						}
						else if ($row['role_as'] == 2){
							?>
							<td classe="text-center">
								<span class="badge bg-black">
									<?php echo "Administrateur"//print($row['role_as']);?>
								</span>
							</td>
						<?php	
						}
						else if ($row['role_as'] == 0){
							?>
								<td classe="text-center">
									<span class="badge bg-info">
										<?php "Participant"//print($row['role_as']);?>
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
						<a class="text-primary me-3" href="dashboard.php?page=pages/users/view&view_id=<?php print($row['ID']);?>"">
								<i class="bi bi-eye-fill"></i>
						</a>  
						<a class=" text-info me-3" href="dashboard.php?page=pages/users/edit&edit_user_id=<?php print($row['ID']);?>" >
							<i class="bi bi-pencil"></i>
						</a>
						<a class="text-danger me-3" href="dashboard.php?page=pages/users/delete&delete_id=<?php print($row['ID']);?>">
								<i class="bi bi-trash"></i>
						</a>
					</td>
				</tr>
                <?php $count=$count+1;?>
                <?php
			}
		}
		
		
	}

	public function data_selected($query){

		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0){
			
			while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
				
				?>
					<option value="<?php print($row['id_chauffeur']); ?>"><?php print($row['username']); ?></option>
                <?php
			}
		}
		
		
	}
}
