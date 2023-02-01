<?php

class driver
{
	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
	

	public function getID($id){

		$stmt = $this->db->prepare("SELECT * FROM chauffeurs WHERE id_chauffeur=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	
	public function update($id,$fullName,$telephone,$permis,$photo,$addresse){

		try
		{
			$stmt=$this->db->prepare("UPDATE chauffeurs SET nom_complet=:fullName, 
		                                               numero_telephone=:telephone, 
													   numero_permis_conduir=:permis, 
													   photo=:photo,
													   addresse=:addresse

													WHERE id_chauffeur=:id_chauffeur ");
			$stmt->bindparam(":fullName",$fullName);
			$stmt->bindparam(":telephone",$telephone);
			$stmt->bindparam(":permis",$permis);
			$stmt->bindparam(":photo",$photo);
			$stmt->bindparam(":addresse",$addresse);
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
						<img class="" src="<?php print($row['photo']);?>" alt="car-image" height="40" width="40" style="border-radius: 50px;" >
					</td>
					<td classe="text-center"><?php print($row['nom_complet']);?></td>
					
					<td classe="text-center"><?php print($row['numero_telephone']);?></td>
					<td classe="text-center"><?php print($row['numero_permis_conduir']);?></td>
					<td classe="text-center"><?php print($row['addresse']);?></td>
					
					<td classe="text-center">
						<span class="">
							<?php  print(date("d-m-Y", strtotime($row['date_chauffeur'])));?>
						</span>
					</td>
					<td classe="text-center"> 
						<a class=" text-info me-3" href="dashboard.php?page=pages/drivers/view_driver&view_id=<?php print($row['id_chauffeur']);?>" >
							<i class="bi bi-eye-fill"></i>
						</a>
						<a class=" text-info me-3" href="dashboard.php?page=pages/drivers/edit_driver&edit_id=<?php print($row['id_chauffeur']);?>" >
							<i class="bi bi-pencil"></i>
						</a>
						<!-- <a class="text-danger me-3" href="dashboard.php?page=pages/drivers/delete_driver&delete_id=<?php print($row['id_chauffeur']);?>">
								<i class="bi bi-trash"></i>
						</a> -->
						<a class=" text-danger me-3" href="dashboard.php?page=pages/drivers/index&driver_del=<?php echo $row["id_chauffeur"]?>" 
							onclick="checkDelete()">
							<i class="bi bi-trash"></i>
						</a>
						<!-- <button type="button" name="btn_delete" value="<?php echo $row["id_chauffeur"]?>"
								class="text-danger border border-0 bg-transparent me-3 delete-driver">
								<i class="bi bi-trash"></i>
						</button> -->
					</td>
				</tr>
                <?php 
					$count=$count+1;
				?>
                <?php
			}
		}
		
		
	}
}