<?php

class permission{
	
	private $db;
	
	function __construct($DB_con){
		
		$this->db = $DB_con;
	}
	
	public function create($permission,$view,$createuser,$deleteuser,$createByID,$updsteByID){
		try
		{
			$query = "INSERT INTO permissions (permission,view,create,delete,createByID,updsteByID,date_admin) 
			VALUES(:permission,:view,:createuser,:createByID,:updsteByID,NOW())";
			$stmt = $this->db->prepare($query);
			
			$stmt->bindParam(':permission',$permission);
            $stmt->bindParam(':view',$view);
            $stmt->bindParam(':createuser',$createuser);
            $stmt->bindParam(':file',$deleteuser);
            $stmt->bindParam(':updsteByID',$updsteByID);
            $stmt->bindParam(':createByID',$createByID);
        
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

		$stmt = $this->db->prepare("SELECT * FROM permissions WHERE id=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

	public function update($id,$permission,$view,$createuser,$deleteuser,$createByID,$updsteByID){

		try
		{
			$query ="UPDATE permissions 
				SET permission=:permission, view=:view, create=:createuser,delete=:file, updsteByID=:updsteByID, createByID=:createByID
				WHERE id=:id_permission ";

			$stmt = $this->db->prepare($query);
			$stmt->bindParam(':permission',$permission);
            $stmt->bindParam(':view',$view);
            $stmt->bindParam(':createuser',$createuser);
            $stmt->bindParam(':file',$deleteuser);
            $stmt->bindParam(':createByID',$createByID);
            $stmt->bindParam(':updsteByID',$updsteByID);
			$stmt->bindparam(":id_permission",$id);
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

		$stmt = $this->db->prepare("DELETE FROM permissions WHERE id=:id");
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
					<td classe="text-center"><?php print($row['permission']);?></td>
					<td classe="text-center"><?php print($row['view']);?></td>
					<td classe="text-center"><?php print($row['create']);?></td>
					<td classe="text-center"><?php print($row['delete']);?></td>
					<td classe="text-center"><?php print($row['createByID']);?></td>
					<td classe="text-center"><?php print($row['updateByID_admin']);?></td>

					<td classe="text-center">
						<span class="">
							<?php  print(date("d-m-Y", strtotime($row['date_utilisateur'])));?>
						</span>
					</td>

					<td classe="text-center"> 
						<!-- <a class="text-primary me-3" href="dashboard.php?page=pages/users/view&view_id=<?php print($row['ID']);?>"">
								<i class="bi bi-eye-fill"></i>
						</a>   -->
						<a class=" text-info me-3" href="dashboard.php?page=pages/users/edit&edit_id=<?php print($row['ID']);?>" >
							<i class="bi bi-pencil"></i>
						</a>
						<!-- <a class="text-danger me-3" href="dashboard.php?page=pages/users/delete&delete_id=<?php print($row['ID']);?>">
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
