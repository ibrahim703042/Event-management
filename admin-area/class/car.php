<?php

class car
{
	private $db;
	
	function __construct($DB_con){
		
		$this->db = $DB_con;
	}
	
	public function create($marque,$modele,$target,$plaque,$description,$chauffeur,$status){
		try
		{
			$query ="INSERT INTO voitures (nom_marque,modele,photo_vehicule,plaque,description,id_chauffeur,status,date_voiture) VALUES(:nom_marque,:modele,:photo,:plaque,:descr,:chauffeur,:status,Now())";
			
			$stmt = $this->db->prepare($query);
			$stmt->bindparam(":nom_marque",$marque);
			$stmt->bindparam(":modele",$modele);
			$stmt->bindparam(":photo",$target);
			$stmt->bindparam(":plaque",$plaque);
			$stmt->bindparam(":descr",$description);
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

	public function getAllByID($id){

		$stmt = $this->db->prepare("SELECT * FROM voitures,chauffeurs WHERE chauffeurs.id_chauffeur=voitures.id_chauffeur AND id_voiture=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	
	public function update($id,$marque,$modele,$target,$plaque,$description,$chauffeur,$status){

		try
		{
			$stmt=$this->db->prepare("UPDATE voitures SET nom_marque=:nom_marque, 
		                                               modele=:modele, 
													   plaque=:plaque, 
													   photo_vehicule=:photo,
													   description=:descr,
													   id_chauffeur=:chauffeur,
													   status=:status
													WHERE id_voiture=:id_voiture ");
			$stmt->bindparam(":nom_marque",$marque);
			$stmt->bindparam(":modele",$modele);
			$stmt->bindparam(":photo",$target);
			$stmt->bindparam(":plaque",$plaque);
			$stmt->bindparam(":descr",$description);
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

		$stmt = $this->db->prepare("DELETE * FROM voitures WHERE id_voiture=:id");
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
						<img class="" src="assets/img/avatars/cars/<?php print($row['photo_vehicule']);?>" alt="car-image" height="40" width="40" style="border-radius: 50px;" >
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
						<a class="text-primary align-middle justify-content-center me-3" href="dashboard.php?page=pages/cars/view_car&view_car_id=<?php print($row['id_voiture']);?>">
								<i class="bi bi-eye-fill"></i>
						</a>  
						<!-- <a class=" text-info me-3" href="dashboard.php?page=pages/cars/edit_car&car_id=<?php print($row['id_voiture']);?>" >
							<i class="bi bi-pencil"></i>
						</a> -->

						<!-- <a class=" text-info me-3" href="dashboard.php?page=pages/cars/delete&delete_id=<?php print($row['id_chauffeur']);?>" >
							
							<button class=" text-danger border border-0 bg-transparent" onClick="return confirm('Do you really want to delete');">
								<i class="bi bi-trash"></i>
							</button>
						</a> -->
					</td>
				</tr>
                <?php $count=$count+1;?>
                <?php
			}
		}
		
		
	}
}
