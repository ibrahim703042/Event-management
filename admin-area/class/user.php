<?php

class user
{
	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
	
	public function create($nom_complet,$telephone,$permis,$photo,$addresse){

		try
		{
			$stmt = $this->db->prepare("INSERT INTO utilisateurs (nom_complet,numero_telephone,numero_permis_conduir,photo,addresse) VALUES(:nom_complet,:telephone,:permis,:photo,:addresse)");
			$stmt->bindParam(':nom_complet',$nom_complet);
            $stmt->bindParam(':telephone',$telephone);
            $stmt->bindParam(':permis',$permis);
            $stmt->bindParam(':photo',$photo);
            $stmt->bindParam(':addresse',$addresse);
            $stmt -> execute();
			
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
	
	public function update($id,$nom_complet,$telephone,$permis,$photo,$addresse){

		try
		{
			$stmt=$this->db->prepare("UPDATE utilisateurs SET nom_complet=:nom_complet, 
		                                               numero_telephone=:telephone, 
													   numero_permis_conduir=:permis, 
													   photo=:photo,
													   addresse=:addresse

													WHERE id_utilisateur=:id_utilisateur ");
			$stmt->bindparam(":nom_complet",$nom_complet);
			$stmt->bindparam(":telephone",$telephone);
			$stmt->bindparam(":permis",$permis);
			$stmt->bindparam(":photo",$photo);
			$stmt->bindparam(":addresse",$addresse);
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
					<!-- <td classe="text-center"><?php print($row['id_utilisateur']);?></td> -->
					<td classe="text-center">
						<img class="" src="assets/img/users_image/<?php print($row['photo']);?>" alt="car-image" height="40" width="40" style="border-radius: 50px;" >
					</td>
					<td classe="text-center"><?php print($row['nom']);?></td>
					<!-- <td classe="text-center"><?php print($row['prenom']);?></td> -->
					<!-- <td classe="text-center"><?php print($row['email']);?></td> -->
					<!-- <td classe="text-center"><?php print($row['numero_telephone']);?></td> -->
					<td classe="text-center"><?php print($row['pays']);?></td>
					<td classe="text-center"><?php print($row['passport']);?></td>
					<td classe="text-center"><?php print($row['rotary']);?></td>					
					<?php 
						if ($row['status'] == "Super administrateur"){
							?>
							<td classe="text-center">
								<span class="badge bg-success">
									<?php print($row['status']);?>
								</span>
							</td>
							<?php	
						}
						else if ($row['status'] == "Administrateur"){
							?>
							<td classe="text-center">
								<span class="badge bg-black">
									<?php print($row['status']);?>
								</span>
							</td>
						<?php	
						}
						else if ($row['status'] == "Participant"){
							?>
								<td classe="text-center">
									<span class="badge bg-info">
										<?php print($row['status']);?>
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
						<a class="text-primary me-3" href="dashboard.php?page=pages/users/view&view_id=<?php print($row['id_utilisateur']);?>"">
								<i class="bi bi-eye-fill"></i>
						</a>  
						<a class=" text-info me-3" href="dashboard.php?page=pages/users/edit&edit_id=<?php print($row['id_utilisateur']);?>" >
							<i class="bi bi-pencil"></i>
						</a>
						<a class="text-danger me-3" href="dashboard.php?page=pages/users/delete&delete_id=<?php print($row['id_utilisateur']);?>">
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
