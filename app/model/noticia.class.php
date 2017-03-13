<?php
require_once('../bd/conexion.php');
class noticia
{
	protected $acceso;
	protected $conexion;

	public function __construct() 
	{
		$this->acceso = new accesoDB(); 
	 	$this->conexion = $this->acceso->conDB();
	}
	public function altaNoticia($datos,$noticia)
	{
		$this->archivos($datos,$noticia);
	}
	public function archivos($datos,$noticia)
	{
		
		$bandera = 0;
		$seccion = isset($datos["cmbSeccion"]) ? $datos["cmbSeccion"] : "";
		$anio = date("Y");
		$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio','Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
		$mes = date("m")-1;
		$mes = $arrayMeses[$mes];
		$dia = date("d");
		$directorio = "../noticias/".$seccion;
		if(!file_exists($directorio))
		{
			mkdir($directorio);
		}
		$directorio = "../noticias/".$seccion."/".$anio;
		if(!file_exists($directorio)){
			mkdir($directorio);
		}
		$directorio = "../noticias/".$seccion."/".$anio."/".$mes;
		if(!file_exists($directorio)){
			mkdir($directorio);
		}
		$directorio = "../noticias/".$seccion."/".$anio."/".$mes."/".$dia;
		if(!file_exists($directorio)){
			mkdir($directorio);
		}
		//Crear carpeta de imagenes
		if(!file_exists($directorio."/imagenes"))
			mkdir($directorio."/imagenes");
		//crear Carpeta de videos
		if(!file_exists($directorio."/videos"))
			mkdir($directorio."/videos");

		session_start();
		if(isset($_SESSION["idUsuario"]))
		{
			if(!empty($noticia) || (!empty($datos["linkNoticia"]) && isset($datos["linkNoticia"])))
			{
				switch ($datos["radioTipoArchivo"]) 
				{
					case 'Imagen':
						$imagen = $directorio."/imagenes/".$noticia["name"]["noticia"];
						if (file_exists(utf8_decode($imagen))) 
						{
						    echo  "La noticia ". $noticia["name"]["noticia"]. " ya existe.\n<br>";
						    $bandera = 1;
						}
						else
						{
							if (move_uploaded_file($noticia["tmp_name"]["noticia"],$imagen)) 
							{
						        // Laimagen se subio correctamente..
						        $direccionNoticia = str_replace("..","app",$imagen);
						    }
						    else 
						    {
						    	echo "Error, su archivo no se pudo subir.";
						    }
						}
						break;
					case 'Video':
						$video = $directorio."/videos/".$noticia["name"]["noticia"];
						if (file_exists(utf8_decode($video))) 
						{
						    echo  "La noticia ". $noticia["name"]["noticia"]. " ya existe.\n<br>";
						    $bandera = 1;
						}
						else
						{
							if (move_uploaded_file($noticia["tmp_name"]["noticia"],$video)) 
							{
						        // El video se subio correctamente..
						        $direccionNoticia = str_replace("..","app",$video);
						    }
						    else 
						    {
						    	echo "Error, su archivo no se pudo subir.";
						    }
						}
						break;
					case 'Link':
						$direccionNoticia = str_replace("watch?v=","embed/",$datos["linkNoticia"]);
						break;
					case 'Banner':
						$bandera = 1;
						if(isset($noticia["tmp_name"]["bannerSuperior"]))
							move_uploaded_file($noticia["tmp_name"]["bannerSuperior"],"../banners/Superior.jpg");
						if(isset($noticia["tmp_name"]["bannerInferior"]))
							move_uploaded_file($noticia["tmp_name"]["bannerInferior"],"../banners/Inferior.jpg");
						if(isset($noticia["tmp_name"]["bannerDS"]))
							move_uploaded_file($noticia["tmp_name"]["bannerDS"],"../banners/DSuperior.jpg");
						if(isset($noticia["tmp_name"]["bannerDI"]))
							move_uploaded_file($noticia["tmp_name"]["bannerDI"],"../banners/DInferior.jpg");
						break;
					
					default:
						# code...
						break;
				}
				if($bandera == 0)
				{
					$tituloNoticia = mysql_real_escape_string(strip_tags(stripslashes(trim($datos["tituloNoticia"]))));
			        $descripcionNoticia = mysql_real_escape_string(strip_tags(stripslashes(trim($datos["descripcionNoticia"]))));
			        $contenidoNoticia = mysql_real_escape_string(strip_tags(stripslashes(trim($datos["contenidoNoticia"]))));
			        $tipoArchivo = mysql_real_escape_string(strip_tags(stripslashes(trim($datos["radioTipoArchivo"]))));
			        $fechaPublicacion = date("Y-m-d");
			        $idUsuario = $_SESSION["idUsuario"];
					$consulta = "INSERT INTO tblnoticia(seccion,direccionnoticia,titulo,descripcion,contenidoNoticia,tipoarchivo,publicacion,idusuario) VALUES('".$seccion."','".$direccionNoticia."','".$tituloNoticia."','".$descripcionNoticia."','".$contenidoNoticia."','".$tipoArchivo."','".$fechaPublicacion."',".$idUsuario.");"; 
					mysql_query($consulta,$this->conexion) or die (mysql_error());
				}
			}
		}
		else
			echo "Su session a caducado ingresar de nuevo!!..";


	}
	public function eliminarNoticia($id)
	{
		$id = mysql_real_escape_string(strip_tags(stripslashes(trim($id))));
		$consulta = "UPDATE tblnoticia n SET n.activo = 0 WHERE id  = ".$id;
		$resultado = mysql_query($consulta) or die (mysql_error());
		if($resultado)
			return true;
		else
			return $resultado;
	}
	public function cargarDatosNoticia($id)
	{
		$id = mysql_real_escape_string(strip_tags(stripslashes(trim($id))));
		$consulta = "SELECT * FROM tblnoticia n WHERE n.id = ".$id;
		$resultado = mysql_query($consulta) or die (mysql_error());
		if($resultado)
			$datos = mysql_fetch_assoc($resultado);
		else
			$datos = $resultado;

		return $datos;
	}
}
?>