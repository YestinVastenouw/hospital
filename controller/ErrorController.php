<?php

function error_404()
{
	echo("<b>DEBUG::</b> Controller name is incorrect and/ or action is missing/ incorrect.");
}

function database_interaction_error()
{
	echo("<b>DEBUG::</b> Something went wrong while interacting with the database.");
}