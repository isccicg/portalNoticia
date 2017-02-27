<?php
require_once('../bd/conexion.php');
class usuario
{
	protected $acceso;
	protected $conexion;

	public function __construct() 
	{
		$this->acceso = new accesoDB(); 
	 	$this->conexion = $this->acceso->conDB();
	}
	public function validarUsuario($datos)
	{
		$usuario = mysql_real_escape_string(strip_tags(stripslashes(trim($datos["usuario"]))));
		$password = mysql_real_escape_string(strip_tags(stripslashes(trim($datos["password"]))));
		$consulta = "SELECT usuario FROM tblusuario WHERE usuario = '".$usuario."' AND password = '".$password."'";
		$resultado = mysql_query($consulta,$this->conexion) or die (mysql_error());
		$datosUsuario = mysql_fetch_assoc($resultado);
		$usuario = mysql_num_rows($resultado) or die (mysql_error()."");
		if($resultado)
		{
			if($usuario > 0)
			{
				session_start();
				$_SESSION["usuario"] =  $datosUsuario["usuario"];
				$confirmacion = true;
			}
			else
				$confirmacion = false;
		}
		else
			$confirmacion = false;
		return $confirmacion;
	}
	
}
?>