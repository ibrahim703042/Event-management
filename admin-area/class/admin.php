<?php

class admin{
	
	private $db;
	
	function __construct($DB_con){
		
		$this->db = $DB_con;
	}
	
	public function create($username,$email,$phone,$target,$role,$status,$password){
		try
		{
			$query = "INSERT INTO admins (nom,email,telephone,profile,role_as,status,mot_passe,date_admin) 
			VALUES(:username,:email,:phone,:file,:role,:status,:password,NOW())";
			$stmt = $this->db->prepare($query);
			
			$stmt->bindParam(':username',$username);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':phone',$phone);
            $stmt->bindParam(':file',$target);
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
	
	public function getByID($table,$id){

		$stmt = $this->db->prepare("SELECT * FROM $table WHERE ID=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

	public function get_role_ByID($table,$id){

		$stmt = $this->db->prepare("SELECT role_as FROM $table WHERE ID=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

	public function getID($id){

		$stmt = $this->db->prepare("SELECT * FROM admins WHERE ID=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

	public function update_profile($id,$username,$email,$phone,$role,$status){

		try
		{
			$query ="UPDATE admins 
				SET nom=:username, email=:email, telephone=:phone,status_admin=:status, role_as=:role
				WHERE ID=:id_admin ";

			$stmt = $this->db->prepare($query);
			$stmt->bindParam(':username',$username);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':phone',$phone);
            $stmt->bindParam(':role',$role);
            $stmt->bindParam(':status',$status);
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

	public function update_image($id,$target){

		try
		{
			$query ="UPDATE admins 
				SET profile=:file WHERE ID=:id_admin ";

			$stmt = $this->db->prepare($query);
            $stmt->bindParam(':file',$target);
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
	
	public function update_Password($id,$password){

		try
		{
			$query ="UPDATE admins SET password=:password WHERE ID=:id_admin ";

			$stmt = $this->db->prepare($query);
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
		$stmt->execute();
		return true;
	}

	public function dataview($query){

		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0){
			$count = 1;
			while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
				
				?>
				<tr>
					<td classe="text-center"><?php echo($count);?></td>
					<td classe="text-center">
						<img class="" src="assets/img/drivers_image/<?php print($row['profile']);?>" alt="car-image" height="40" width="40" style="border-radius: 50px;" >
					</td>
					<td classe="text-center"><?php print($row['nom']);?></td>
					<td classe="text-center"><?php print($row['email']);?></td>
					<td classe="text-center"><?php print($row['role_as']);?></td>
					<td classe="text-center"><?php print($row['status_admin']);?></td>
					
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
}
