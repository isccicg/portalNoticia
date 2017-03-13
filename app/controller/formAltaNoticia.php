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
			if(!isset($_FILES["Datos"]))
				$_FILES["Datos"] = "";
			$resultado = $noticia->altaNoticia($_POST["Datos"],$_FILES["Datos"]);
			header("location:../../index.php");
			break;
		case "eliminarNoticia":
			require_once("../model/noticia.class.php");
			$noticia = new noticia();
			$resultado = $noticia->eliminarNoticia($_POST["idNoticia"]);
			echo $resultado;
			break;
		case "cargarDatosNoticia":
			require_once("../model/noticia.class.php");
			$noticia = new noticia();
			$resultado = $noticia->cargarDatosNoticia($_POST["idNoticia"]);
			echo json_encode($resultado);
			break;
	}
}
?>