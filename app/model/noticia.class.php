<?php

class noticia
{
	
	public function altaNoticia($datos,$noticia)
	{
		$this->archivos($datos["cmbSeccion"],$noticia);
	}
	public function archivos($seccion,$noticia)
	{
		$seccion = $seccion;
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
		// if(!file_exists($directorio."/videos"))
		// 	mkdir($directorio."/videos");

		if(!empty($noticia))
		{
			$imagen = $directorio."/imagenes/".$noticia["name"];
			if (file_exists(utf8_decode($imagen))) 
			{
			    echo  "La noticia ". $noticia["name"]. " ya existe.\n<br>";
			}
			else
			{
				if (move_uploaded_file($noticia["tmp_name"],$imagen)) 
				{
			        // Laimagen se subio correctamente..
			    }
			    else 
			    {
			    	echo "Error, su archivo no se pudo subir.";
			    }
			}
		}


	}
}
?>