<?php

class car
{
	private $db;
	
	function __construct($DB_con){
		
		$this->db = $DB_con;
	}
	
	public function create($nom_marque,$modele,$plaque,$photo,$chauffeur,$status){
		try
		{
			$stmt = $this->db->prepare("INSERT INTO voitures (nom_marque,modele,plaque,photo_vehicule,id_chauffeur,status) VALUES(:nom_marque,:modele,:plaque,:photo,:chauffeur,:status)");
			$stmt->bindparam(":nom_marque",$nom_marque);
			$stmt->bindparam(":modele",$modele);
			$stmt->bindparam(":plaque",$plaque);
			$stmt->bindparam(":photo",$photo);
			$stmt->bindparam(":chauffeur",$chauffeur);
			$stmt->bindparam(":status",$status);
			
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

		$stmt = $this->db->prepare("SELECT * FROM voitures WHERE id_voiture=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	
	public function update($id,$nom_marque,$modele,$plaque,$photo,$chauffeur,$status){

		try
		{
			$stmt=$this->db->prepare("UPDATE voitures SET nom_marque=:nom_marque, 
		                                               modele=:modele, 
													   plaque=:plaque, 
													   photo_vehicule=:photo,
													   id_chauffeur=:chauffeur,
													   status=:status
													WHERE id_voiture=:id_voiture ");
			$stmt->bindparam(":nom_marque",$nom_marque);
			$stmt->bindparam(":modele",$modele);
			$stmt->bindparam(":plaque",$plaque);
			$stmt->bindparam(":photo",$photo);
			$stmt->bindparam(":chauffeur",$chauffeur);
			$stmt->bindparam(":status",$status);
			$stmt->bindparam(":id_voiture",$id);
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

		$stmt = $this->db->prepare("DELETE FROM voitures WHERE id_voiture=:id");
		$stmt->bindparam(":id",$id);
		//$stmt->execute();
		return true;
	}

	public function data($query){

		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0){

			while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
				
				?>
					<option value="<?php print($row['id_chauffeur']); ?>"><?php print($row['nom_complet']); ?></option>
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
					<option value="<?php print($row['id_chauffeur']); ?>"><?php print($row['nom_complet']); ?></option>
                <?php
			}
		}
		
		
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
					<!-- <td classe="text-center"><?php print($row['id_voiture']);?></td> -->
					<td classe="text-center">
						<img class="" src="assets/img/cars_image/<?php print($row['photo_vehicule']);?>" alt="car-image" height="40" width="40" style="border-radius: 50px;" >
					</td>
					<td classe="text-center"><?php print($row['modele']);?></td>
					<td classe="text-center"><?php print($row['nom_marque']);?></td>
					<td classe="text-center"><?php print($row['plaque']);?></td>
					<td classe="text-center"><?php print($row['nom_complet']);?></td>
					
					<?php 
						if ($row['status'] == "Libre"){
							?>
							<td classe="text-center">
								<span class="badge bg-success">
									<?php print($row['status']);?>
								</span>
							</td>
							<?php	
						}
						else if ($row['status'] == "Occuper"){
							?>
							<td classe="text-center">
								<span class="badge bg-danger">
									<?php print($row['status']);?>
								</span>
							</td>
						<?php	
						}
						else{
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
							<?php  print(date("d-m-Y", strtotime($row['date_voiture'])));?>
						</span>
					</td>
					<td classe="text-center"> 
						<a class="text-primary me-3" href="dashboard.php&page=pages/drivers/view&view_id=<?php print($row['id_voiture']);?>">
								<i class="bi bi-eye-fill"></i>
						</a>  
						<a class=" text-info me-3" href="dashboard.php?page=pages/cars/edit&$edit_id=<?php print($row['id_chauffeur']);?>" >
							<i class="bi bi-pencil"></i>
						</a>
						<a class="text-danger me-3" href="dashboard.php?page=pages/cars/delete&delete_id=<?php print($row['id_voiture']);?>">
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
