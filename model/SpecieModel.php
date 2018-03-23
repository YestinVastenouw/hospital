<?php
	
	function getSpecieData()
	{
		$db = openDataBaseConnection();
		$query = $db->prepare("SELECT * FROM `species`");

		$query->execute();
		$db = null;
		return $query->fetchAll();
	}

	function createSpecie()
	{
		$description = isset($_POST['description']) ? ucfirst(strtolower(strip_tags($_POST['description']))) : null;

		if ($description == null)
			return false;

		$db = openDataBaseConnection();
		$query = $db->prepare(
			"SELECT `species_id` FROM `species` WHERE `species_description` = :description"
		);

		$query->execute(array(
			"description" => $description
		));

		$result = $query->fetchAll();
		if (!count($result) > 0) 
		{
			$query = $db->prepare(
				"INSERT INTO `species` (`species_description`) VALUES (:description)"
			);

			$db = null;
			if (!$query->execute(array(
				"description" => $description
			))) return false;
		} 
		return true;
	}

	function getSpecieDataById($id)
	{
		$db = openDataBaseConnection();
		$query = $db->prepare(
			"SELECT * FROM `species` WHERE `species_id` = :id"
		);

		$query->execute(array(
			"id" => $id
		));

		$db = null;
		return $query->fetch(PDO::FETCH_ASSOC);
	}

	function saveSpecieEditById($id)
	{
		$description = isset($_POST['description']) ? strip_tags($_POST['description']) : null;

		if ($description == null)
			return false;

		$db = openDataBaseConnection();
		$query = $db->prepare(
			"UPDATE `species` SET `species_description` = :description WHERE `species_id` = :id"
		);	

		$db = null;
		if (!$query->execute(array(
			"id" => $id,
			"description" => $description
		))) return false; 
		return true;
	}

	function deleteSpecieById($id)
	{
		$db = openDataBaseConnection();
		$query = $db->prepare(
			 "DELETE FROM `patients` WHERE `species_id` = :id;
			DELETE FROM `species` WHERE `species_id` = :id"
		);

		$db = null;
		if (!$query->execute(array(
			"id" => $id
		))) return false; 
		return true;
	}