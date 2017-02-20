<?php
	require 'app/controller/mvc.controller.php';

     //se instancia al controlador 
	$mvc = new mvc_controller();
	error_reporting(0);

	if( $_GET['action'] == 'politica' ) //muestra el modulo del politica
	{	
			$mvc->politica();	
	}
	else 	if( $_GET['action'] == 'sociedad' ) //muestra  el modulo "historia de sociedad"
	{
			$mvc->sociedad();	
	}
	else 	if( $_GET['action'] == 'articulos' ) //muestra  el modulo "historia de articulos"
	{
			$mvc->articulos();	
	}
	else 	if( $_GET['action'] == 'columnas' ) //muestra  el modulo "historia de columnas"
	{
			$mvc->columnas();	
	}
	else 	if( $_GET['action'] == 'cultura' ) //muestra  el modulo "historia de cultura"
	{
			$mvc->cultura();	
	}
	else 	if( $_GET['action'] == 'deportes' ) //muestra  el modulo "historia de deportes"
	{
			$mvc->deportes();	
	}
	else 	if( $_GET['action'] == 'videos' ) //muestra  el modulo "historia de videos"
	{
			$mvc->videos();	
	}
	else 	if( $_GET['action'] == 'acerca' ) //muestra  el modulo "historia de videos"
	{
			$mvc->acerca();	
	}
	else //Si no existe GET o POST -> muestra la pagina principal
	{	
		$mvc->principal();
	}

	

?>