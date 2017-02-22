<?php
if(isset($_GET["accion"]))
{
	switch($_GET["accion"])
	{
		case "altaNoticia":
			require_once("../model/noticia.class.php");
			$noticia = new noticia();
			if(!isset($_FILES["noticia"]))
				$_FILES["noticia"] = "";
			print_r($_POST["Datos"]);
			$resultado = $noticia->altaNoticia($_POST["Datos"],$_FILES["noticia"]);
		break;
	}
}
?>