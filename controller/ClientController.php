<?php 

require ROOT. "model/ClientModel.php";
function index()
{
	render("client/index", array(
		"clients" => getClientData()
	));
}

function create()
{
	render("client/create");
}

function createSave()
{	
	if (createClient()) 
		header("Location: ". URL. "client/index");
	else {
		require(ROOT . 'controller/ErrorController.php');
		call_user_func('database_interaction_error');
	}
}

function edit($id = null)
{
	if ($id === null)
		header("Location: ". URL. "client/index");

	render("client/edit", array(
		"client" => getClientDataById($id)
	));
}
 
function editSave($id = null)
{
	if ($id === null)
		header("Location: ". URL. "client/index");
	if (saveClientEditById($id))
		header("Location: ". URL. "client/index");
	else {
		require(ROOT . 'controller/ErrorController.php');
		call_user_func('database_interaction_error');
	}
}


function delete($id = null)
{
	if ($id === null)
		header("Location: ". URL. "client/index");
	if (deleteClientById($id))
		header("Location: ". URL. "client/index");
	else {
		require(ROOT . 'controller/ErrorController.php');
		call_user_func('database_interaction_error');
	}

}