<?php

class driver
{
	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
	
	public function create($nom,$telephone,$permis,$photo,$addresse,$status){

		try
		{
			$stmt = $this->db->prepare("INSERT INTO chauffeurs (nom_complet,numero_telephone,numero_permis_conduir,photo,addresse,status_chauffeur) VALUES(:nom,:telephone,:permis,:photo,:addresse,:status)");
			$stmt->bindParam(':nom',$nom);
            $stmt->bindParam(':telephone',$telephone);
            $stmt->bindParam(':permis',$permis);
            $stmt->bindParam(':photo',$photo);
            $stmt->bindParam(':addresse',$addresse);
            $stmt->bindParam(':status',$status);
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

		$stmt = $this->db->prepare("SELECT * FROM chauffeurs WHERE id_chauffeur=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	
	public function update($id,$nom,$telephone,$permis,$photo,$addresse,$status){

		try
		{
			$stmt=$this->db->prepare("UPDATE chauffeurs SET nom_complet=:nom, 
		                                               numero_telephone=:telephone, 
													   numero_permis_conduir=:permis, 
													   photo=:photo,
													   addresse=:addresse,
													   status_chauffeur=:status

													WHERE id_chauffeur=:id_chauffeur ");
			$stmt->bindParam(':nom',$nom);
            $stmt->bindParam(':telephone',$telephone);
            $stmt->bindParam(':permis',$permis);
            $stmt->bindParam(':photo',$photo);
            $stmt->bindParam(':addresse',$addresse);
            $stmt->bindParam(':status',$status);
			$stmt->bindparam(":id_chauffeur",$id);
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

		$stmt = $this->db->prepare("DELETE FROM chauffeurs WHERE id_chauffeur=:id");
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
					<!-- <td classe="text-center"><?php print($row['id_chauffeur']);?></td> -->
					<td classe="text-center">
						<!-- <img class="" src="assets/img/drivers_image/<?php print($row['photo']);?>" alt="car-image" height="40" width="40" style="border-radius: 50px;" > -->
						<img class="" src="../uploads/<?php print($row['photo']);?>" alt="car-image" height="40" width="40" style="border-radius: 50px;" >
					</td>
					<td classe="text-center"><?php print($row['nom_complet']);?></td>
					
					<td classe="text-center"><?php print($row['numero_telephone']);?></td>
					<td classe="text-center"><?php print($row['numero_permis_conduir']);?></td>
					<td classe="text-center">
						<?=$row['status_chauffeur']  == '1' ? "Libre" : "Occuper";?>
					</td>
					<?php 
						/* if ($row['status_voiture'] == 1){
							?>
							<td classe="text-center">
								<span class="badge bg-success">
									<?php print($row['Libre']);?>
								</span>
							</td>
							<?php	
						}
						else{
							?>
								<td classe="text-center">
									<span class="badge bg-info">
										<?php print($row['Occuper']);?>
									</span>
								</td>
							<?php	
						}  */
					?>
				
					<td classe="text-center"><?php print($row['addresse']);?></td>
					
					<td classe="text-center">
						<span class="">
							<?php  print(date("d-m-Y", strtotime($row['date_chauffeur'])));?>
						</span>
					</td>
					<td classe="text-center"> 
						<a class=" text-info me-3" href="dashboard.php?page=pages/drivers/view&$view_id=<?php print($row['id_chauffeur']);?>" >
							<i class="bi bi-eye-fill"></i>
						</a>
						<a class=" text-info me-3" href="dashboard.php?page=pages/drivers/edit&$edit_id=<?php print($row['id_chauffeur']);?>" >
							<i class="bi bi-pencil"></i>
						</a>
						<a class="text-danger me-3" href="dashboard.php?page=pages/drivers/delete&delete_id=<?php print($row['id_chauffeur']);?>">
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
