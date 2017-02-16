<?php
require_once('../bd/conexion.php');

class contactos
{
	protected $acceso;
 	protected $conexion;

	public function __construct()
	{
		$this->acceso = new accesoDB(); 
 		$this->conexion = $this->acceso->conDB();
	}
	public function guardarDatosContactos($datos)
	{
		$nombre = mysql_real_escape_string(strip_tags(stripcslashes(trim($datos["nombre"]))));
		$email = mysql_real_escape_string(strip_tags(stripcslashes(trim($datos["email"]))));
		$mensaje = mysql_real_escape_string(strip_tags(stripcslashes(trim($datos["msj"]))));
		$consulta = "INSERT INTO contactos(Nombre,Email,Mensaje) VALUES ('".$nombre."','".$email."','".$mensaje."')";
		$resultado= mysql_query($consulta,$this->conexion) or die (mysql_error());
   		if($resultado)
   			$msj = "Su información se guardo correctamente. ¡Gracias!";
   		else
   			$msj = "Su información no se guardo, reintentar más tarde. ¡Gracias!";
   		return $msj;
	}
	public function __destruct() 
	{
		mysql_close($this->conexion);
	}
}
?>