<?php 

require ROOT. "model/SpecieModel.php";
function index()
{
	render("specie/index", array(
		"species" => getSpecieData()
	));
}

function create()
{
	render("specie/create");
}

function createSave()
{	
	if (createSpecie()) 
		header("Location: ". URL. "specie/index");
	else 
	{
		require(ROOT . 'controller/ErrorController.php');
		call_user_func('database_interaction_error');
	}
}

function edit($id = null)
{
	if ($id === null)
		header("Location: ". URL. "specie/index");

	render("specie/edit", array(
		"specie" => getSpecieDataById($id)
	));
}
 
function editSave($id = null)
{
	if ($id === null)
		header("Location: ". URL. "specie/index");
	if (saveSpecieEditById($id))
		header("Location: ". URL. "specie/index");
	else {
		require(ROOT . 'controller/ErrorController.php');
		call_user_func('database_interaction_error');
	}
}

function delete($id = null)
{
	if ($id === null)
		header("Location: ". URL. "specie/index");
	if (deleteSpecieById($id))
		header("Location: ". URL. "specie/index");
	else {
		require(ROOT . 'controller/ErrorController.php');
		call_user_func('database_interaction_error');
	}
}