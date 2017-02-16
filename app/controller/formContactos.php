<?php
if(isset($_GET["accion"]))
{
	switch($_GET["accion"])
	{
		case 'guardarContactos':
			require_once("../model/contactos.class.php");
			$contactos = new contactos();
			$resultado = $contactos->guardarDatosContactos($_POST["datos"]);
			echo $resultado;
			break;
		default:
			header("location:../index.php");
	}
}
?>