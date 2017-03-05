<?php
if(isset($_GET["accion"]))
{
	switch($_GET["accion"])
	{
		case "login":
			require_once("../model/usuario.class.php");
			$usuario = new usuario();
			$resultado = $usuario->validarUsuario($_POST["Datos"]);
			echo $resultado;
			break;
		case "altaNoticia":
			require_once("../model/noticia.class.php");
			$noticia = new noticia();
			if(!isset($_FILES["noticia"]))
				$_FILES["noticia"] = "";
			$resultado = $noticia->altaNoticia($_POST["Datos"],$_FILES["noticia"]);
			// header("location:../../index.php");
		break;
	}
}
?>