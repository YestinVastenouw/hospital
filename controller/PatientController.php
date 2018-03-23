<?php 

require ROOT. "model/PatientModel.php";
function index()
{
	render("patient/index", array(
		"patients" => getPatientData()
	));
}