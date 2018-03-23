<?php

	function getClientData()
	{
		$db = openDataBaseConnection();
		$query = $db->prepare("SELECT * FROM `clients`");

		$query->execute();
		$db = null;
		return $query->fetchAll();
	}

	function createClient()
	{
		$firstname = isset($_POST['firstname']) ? ucfirst(strtolower(strip_tags($_POST['firstname']))) : null;
		$lastname = isset($_POST['lastname']) ? ucfirst(strtolower(strip_tags($_POST['lastname']))) : null;	

		if ($firstname == null || $lastname == null)
			return false;

		$db = openDataBaseConnection();
		$query = $db->prepare(
			"INSERT INTO `clients` (`client_firstname`, `client_lastname`) VALUES (:firstname, :lastname)"
		);

		$db = null;
		if (!$query->execute(array(
			"firstname" => $firstname,
			"lastname" => $lastname
		))) return false; 
		return true;
	}

	function getClientDataById($id)
	{
		$db = openDataBaseConnection();
		$query = $db->prepare(
			"SELECT * FROM `clients` WHERE `client_id` = :id"
		);

		$query->execute(array(
			"id" => $id
		));

		$db = null;
		return $query->fetch(PDO::FETCH_ASSOC);
	}

	function saveClientEditById($id)
	{
		$firstname = isset($_POST['firstname']) ? ucfirst(strtolower(strip_tags($_POST['firstname']))) : null;
		$lastname = isset($_POST['lastname']) ? ucfirst(strtolower(strip_tags($_POST['lastname']))) : null;

		if ($firstname == null || $lastname == null)
			return false;

		$db = openDataBaseConnection();
		$query = $db->prepare(
			"UPDATE `clients` SET `client_firstname` = :firstname, `client_lastname` = :lastname WHERE `client_id` = :id"
		);	

		$db = null;
		if (!$query->execute(array(
			"id" => $id,
			"firstname" => $firstname,
			"lastname" => $lastname
		))) return false; 
		return true;
	}

	function deleteClientById($id)
	{
		$db = openDataBaseConnection();
		$query = $db->prepare(
			 "DELETE FROM `patients` WHERE `client_id` = :id;
			DELETE FROM `clients` WHERE `client_id` = :id"
		);

		$db = null;
		if (!$query->execute(array(
			"id" => $id
		))) return false; 
		return true;
	}