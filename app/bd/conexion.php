<?php 
	class accesoDB
	{
		
	//Conecta la base principal de la base de datos llamada eds
	    function conDB()
		{
			$servidor = "localhost";
			$usuario = "root";
			$contrasena = "";
			$bd = "eds";
			$conexion = mysql_connect($servidor,$usuario,$contrasena)or die("Problemas con el servidor de BD. ");
			mysql_select_db($bd,$conexion)or die("Problema al conectar con la BD.");
			mysql_query("set names 'utf8'",$conexion);
			return $conexion;
		}
	}
?>