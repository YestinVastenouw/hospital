<?php

	function getPatientData()
	{
		$db = openDataBaseConnection();
		$query = $db->prepare("SELECT * FROM `patients`");

		$query->execute();
		$db = null;
		return $query->fetchAll();
	}