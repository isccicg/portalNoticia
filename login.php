 <?php
session_start();
if(!isset($_SESSION["usuario"])){?>
<li><a id="loginUsuario" href="#">Login</a></li>
<?php
}
else
{
?>
  <li><a id="altaNoticia" href="#">Alta Noticia</a></li>
<?php
}
?> 
<?php
	require 'app/controller/mvc.controller.php';

     //se instancia al controlador 
	$mvc = new mvc_controller();
	error_reporting(0);

	if( $_GET['action'] == 'politica' ) //muestra el modulo del politica
	{	
			$mvc->politica();	
	}
	else 	if( $_GET['action'] == 'economia' ) //muestra  el modulo "sociedad"
	{
			$mvc->economia();	
	}
	else 	if( $_GET['action'] == 'sociedad' ) //muestra  el modulo "sociedad"
	{
			$mvc->sociedad();	
	}
	else 	if( $_GET['action'] == 'articulos' ) //muestra  el modulo "articulos"
	{
			$mvc->articulos();	
	}
	else 	if( $_GET['action'] == 'columnas' ) //muestra  el modulo "columnas"
	{
			$mvc->columnas();	
	}
	else 	if( $_GET['action'] == 'cultura' ) //muestra  el modulo "cultura"
	{
			$mvc->cultura();	
	}
	else 	if( $_GET['action'] == 'deportes' ) //muestra  el modulo "deportes"
	{
			$mvc->deportes();	
	}
	else 	if( $_GET['action'] == 'monitores' ) //muestra  el modulo "monitores"
	{
			$mvc->monitores();	
	}
	else 	if( $_GET['action'] == 'encuestas' ) //muestra  el modulo "encuestas"
	{
			$mvc->encuestas();	
	}
	else 	if( $_GET['action'] == 'videos' ) //muestra  el modulo "videos"
	{
			$mvc->videos();	
	}
	else 	if( $_GET['action'] == 'acerca' ) //muestra  el modulo "Acerca"
	{
			$mvc->acerca();	
	}

	else 	if( $_GET['action'] == 'login' ) //muestra  el modulo "Acerca"
	{
			$mvc->login();	
	}
	else //Si no existe GET o POST -> muestra la pagina principal
	{	
		$mvc->principal();
	}

	

?>