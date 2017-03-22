<?php
require_once('app/bd/conexion.php');
class mvc_controller 
{  
	protected $acceso;
	protected $conexion;

	public function __construct() 
	{
		$this->acceso = new accesoDB(); 
	 	$this->conexion = $this->acceso->conDB();
	}
   /*Modulos*/


/*Modulo Principal*/
function login(){

$pagina=$this->load_template('');	/*titulo de la pagina */	
		
		$html = $this->load_page('app/views/default/modules/m.login.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$this->view_page($pagina);

/*session_start();*/
/*if(!isset($_SESSION["usuario"]))*/

				$noticias = "Hola mundo desde controler";
			


			$pagina = $this->replace_contenidos('/\#NOTI\#/ms' ,$noticias, $pagina);
	        $this->view_page($pagina);

 
}



function principal()
{
	$pagina=$this->load_template('');	/*titulo de la pagina */	
	$html = $this->load_page('app/views/default/modules/m.principal.php');
	$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
	$datos = array();
   	//$dateNow = date("Y-m-d");

	/*$consulta = "SELECT * FROM tblnoticia n WHERE n.publicacion = '".$dateNow."' AND activo = 1 ORDER BY id DESC"; */

  /* $consulta = "SELECT * FROM tblnoticia n WHERE n.publicacion = '".$elapsedDate."' AND activo = 1 ORDER BY id DESC"; */

   $consulta =  "SELECT *
				FROM tblnoticia
				WHERE publicacion BETWEEN 
				(SELECT DATE_ADD(CURDATE(), INTERVAL -3 DAY)) 
				AND
				(SELECT CURDATE())
				AND activo = 1
				order by id desc";


	$resultado = mysql_query($consulta,$this->conexion) or die (mysql_error());
	if($resultado)
	{
		while ($datosNoticia = mysql_fetch_assoc($resultado)) 
		{
			$datos[] = $datosNoticia;
		}
	}
/*	if(count($datos) > 0)
	{
		foreach ($datos as $value) 
		{
			$noticias .= "<div class='thumbnail' style='width: 712px;height: 188px;'><div class='caption'><h4 class='pull-right'><img src='".$value["direccionnoticia"]."' alt='' style='width: 300px;height: 150px;'></h4><h4><a href='#'>".$value["titulo"]."</a></h4><p>".$value["descripcion"]."<a target='_blank' href='#'> Leer mas:</a></p></div></div>";
			
		}
	} */ 
	$noticias = $this->cargarNoticias($datos);
	$pagina = $this->replace_contenido('/\#NOTICIAS\#/ms' ,$noticias, $pagina); 
	$this->view_page($pagina);
}

   /*1.- Modulo Politica */
function politica()
{
	$pagina=$this->load_template('');	/*titulo de la pagina */	
	$html = $this->load_page('app/views/default/modules/m.politica.php');
	$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
	$datos = array();

  $consulta =  "SELECT *
				FROM tblnoticia
				WHERE publicacion BETWEEN 
				(SELECT DATE_ADD(CURDATE(), INTERVAL -7 DAY)) 
				AND
				(SELECT CURDATE())
				AND SECCION = 'Politica'
				AND activo = 1
				order by id desc";



   /*	$dateNow = date("Y-m-d");
		$consulta = "SELECT * FROM tblnoticia n WHERE n.publicacion = '".$dateNow."' AND n.seccion = 'Politica' AND activo = 1 ORDER BY id DESC"; */
		$resultado = mysql_query($consulta,$this->conexion) or die (mysql_error());
		if($resultado)
		{
			while ($datosNoticia = mysql_fetch_assoc($resultado)) 
			{
				$datos[] = $datosNoticia;
			}
		}
	$noticias = $this->cargarNoticias($datos);
	$pagina = $this->replace_contenido('/\#NOTICIAS\#/ms' ,$noticias, $pagina); 
	$this->view_page($pagina);
}

   /*.-Modulo Economia  NUEVO*/

function economia()
{

	

	$pagina=$this->load_template('');	/*titulo de la pagina */	
	$html = $this->load_page('app/views/default/modules/m.economia.php');
	$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
	//$this->view_page($pagina);
	/* poner nuevo a economia nuevo modulo*/

 $consulta =  "SELECT *
				FROM tblnoticia
				WHERE publicacion BETWEEN 
				(SELECT DATE_ADD(CURDATE(), INTERVAL -7 DAY)) 
				AND
				(SELECT CURDATE())
				AND SECCION = 'Economia'
				AND activo = 1
				order by id desc";

	/*$datos = array();
   	$dateNow = date("Y-m-d");
		$consulta = "SELECT * FROM tblnoticia n WHERE n.publicacion = '".$dateNow."' AND n.seccion = 'Economia' AND activo = 1 ORDER BY id DESC"; */
		$resultado = mysql_query($consulta,$this->conexion) or die (mysql_error());
		if($resultado)
		{
			while ($datosNoticia = mysql_fetch_assoc($resultado)) 
			{
				$datos[] = $datosNoticia;
			}
		}
	$noticias = $this->cargarNoticias($datos);
	$pagina = $this->replace_contenido('/\#NOTICIAS\#/ms' ,$noticias, $pagina); 
	$this->view_page($pagina);
}

   /*2.-Modulo Sociedad */
function sociedad()
{
	$pagina=$this->load_template('');	/*titulo de la pagina */	
	$html = $this->load_page('app/views/default/modules/m.sociedad.php');
	$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
	$datos = array();
	 $consulta =  "SELECT *
				FROM tblnoticia
				WHERE publicacion BETWEEN 
				(SELECT DATE_ADD(CURDATE(), INTERVAL -7 DAY)) 
				AND
				(SELECT CURDATE())
				AND SECCION = 'Sociedad'
				AND activo = 1
				order by id desc";
	/*$dateNow = date("Y-m-d");
	$consulta = "SELECT * FROM tblnoticia n WHERE n.publicacion = '".$dateNow."' AND n.seccion = 'Sociedad' AND activo = 1 ORDER BY id DESC"; */
	$resultado = mysql_query($consulta,$this->conexion) or die (mysql_error());
	if($resultado)
	{
		while ($datosNoticia = mysql_fetch_assoc($resultado)) 
		{
			$datos[] = $datosNoticia;
		}
	}
	$noticias = $this->cargarNoticias($datos);
	$pagina = $this->replace_contenido('/\#NOTICIAS\#/ms' ,$noticias, $pagina);
	$this->view_page($pagina);
}

/*3.1.-Modulo Articulos */
function articulos()
{
	$pagina=$this->load_template('');	/*titulo de la pagina */	
	$html = $this->load_page('app/views/default/modules/m.articulos.php');
	$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
	$datos = array();
	 $consulta =  "SELECT *
				FROM tblnoticia
				WHERE publicacion BETWEEN 
				(SELECT DATE_ADD(CURDATE(), INTERVAL -7 DAY)) 
				AND
				(SELECT CURDATE())
				AND SECCION = 'Articulos'
				AND activo = 1
				order by id desc";
	/*$dateNow = date("Y-m-d");
	$consulta = "SELECT * FROM tblnoticia n WHERE n.publicacion = '".$dateNow."' AND n.seccion = 'Articulos' AND activo = 1 ORDER BY id DESC";*/
	$resultado = mysql_query($consulta,$this->conexion) or die (mysql_error());
	if($resultado)
	{
		while ($datosNoticia = mysql_fetch_assoc($resultado)) 
		{
			$datos[] = $datosNoticia;
		}
	}
	$noticias = $this->cargarNoticias($datos);
	$pagina = $this->replace_contenido('/\#NOTICIAS\#/ms' ,$noticias, $pagina);
	$this->view_page($pagina);
}
/*3.2.-Modulo Columnas */
function columnas()
{
	$pagina=$this->load_template('');	/*titulo de la pagina */	
	$html = $this->load_page('app/views/default/modules/m.columnas.php');
	$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
	$datos = array();
	$dateNow = date("Y-m-d");
	 $consulta =  "SELECT *
				FROM tblnoticia
				WHERE publicacion BETWEEN 
				(SELECT DATE_ADD(CURDATE(), INTERVAL -7 DAY)) 
				AND
				(SELECT CURDATE())
				AND SECCION = 'Columnas'
				AND activo = 1
				order by id desc";
	/*$consulta = "SELECT * FROM tblnoticia n WHERE n.publicacion = '".$dateNow."' AND n.seccion = 'Columnas' AND activo = 1 ORDER BY id DESC"; */
	$resultado = mysql_query($consulta,$this->conexion) or die (mysql_error());
	if($resultado)
	{
		while ($datosNoticia = mysql_fetch_assoc($resultado)) 
		{
			$datos[] = $datosNoticia;
		}
	}
	$noticias = $this->cargarNoticias($datos);
	$pagina = $this->replace_contenido('/\#NOTICIAS\#/ms' ,$noticias, $pagina);
	$this->view_page($pagina);
}

/*4.-Modulo Cultura */
 function cultura()
{
	$pagina=$this->load_template('');	/*titulo de la pagina */	
	$html = $this->load_page('app/views/default/modules/m.cultura.php');
	$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
	$datos = array();
	$dateNow = date("Y-m-d");
	 $consulta =  "SELECT *
				FROM tblnoticia
				WHERE publicacion BETWEEN 
				(SELECT DATE_ADD(CURDATE(), INTERVAL -7 DAY)) 
				AND
				(SELECT CURDATE())
				AND SECCION = 'Cultura'
				AND activo = 1
				order by id desc";
	/*$consulta = "SELECT * FROM tblnoticia n WHERE n.publicacion = '".$dateNow."' AND n.seccion = 'Cultura' AND activo = 1 ORDER BY id DESC";*/
	$resultado = mysql_query($consulta,$this->conexion) or die (mysql_error());
	if($resultado)
	{
		while ($datosNoticia = mysql_fetch_assoc($resultado)) 
		{
			$datos[] = $datosNoticia;
		}
	}
	$noticias = $this->cargarNoticias($datos);
	$pagina = $this->replace_contenido('/\#NOTICIAS\#/ms' ,$noticias, $pagina);
	$this->view_page($pagina);
}

/*5.-Modulo Deportes */
function deportes()
{
	$pagina=$this->load_template('');	/*titulo de la pagina */	
	$html = $this->load_page('app/views/default/modules/m.deportes.php');
	$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
	$datos = array();
	 $consulta =  "SELECT *
				FROM tblnoticia
				WHERE publicacion BETWEEN 
				(SELECT DATE_ADD(CURDATE(), INTERVAL -7 DAY)) 
				AND
				(SELECT CURDATE())
				AND SECCION = 'Deporte'
				AND activo = 1
				order by id desc";
	/*
	$dateNow = date("Y-m-d");
	$consulta = "SELECT * FROM tblnoticia n WHERE n.publicacion = '".$dateNow."' AND n.seccion = 'Deporte' AND activo = 1 ORDER BY id DESC";*/
	$resultado = mysql_query($consulta,$this->conexion) or die (mysql_error());
	if($resultado)
	{
		while ($datosNoticia = mysql_fetch_assoc($resultado)) 
		{
			$datos[] = $datosNoticia;
		}
	}
	$noticias = $this->cargarNoticias($datos);
	$pagina = $this->replace_contenido('/\#NOTICIAS\#/ms' ,$noticias, $pagina);
	$this->view_page($pagina);
}

 /*6.1-Modulo Monitores */
function monitores()
{
	$pagina=$this->load_template('');	/*titulo de la pagina */	
	$html = $this->load_page('app/views/default/modules/m.monitores.php');
	$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
	$datos = array();
	 $consulta =  "SELECT *
				FROM tblnoticia
				WHERE publicacion BETWEEN 
				(SELECT DATE_ADD(CURDATE(), INTERVAL -7 DAY)) 
				AND
				(SELECT CURDATE())
				AND SECCION = 'Monitores'
				AND activo = 1
				order by id desc";
	/*
	$dateNow = date("Y-m-d");
	$consulta = "SELECT * FROM tblnoticia n WHERE n.publicacion = '".$dateNow."' AND n.seccion = 'Monitores' AND activo = 1 ORDER BY id DESC"; */
	$resultado = mysql_query($consulta,$this->conexion) or die (mysql_error());
	if($resultado)
	{
		while ($datosNoticia = mysql_fetch_assoc($resultado)) 
		{
			$datos[] = $datosNoticia;
		}
	}
	$noticias = $this->cargarNoticias($datos);
	$pagina = $this->replace_contenido('/\#NOTICIAS\#/ms' ,$noticias, $pagina);
	$this->view_page($pagina);
}
 /*6.2-Modulo Encuestas */
function encuestas()
{
	$pagina=$this->load_template('');	/*titulo de la pagina */	
	$html = $this->load_page('app/views/default/modules/m.encuestas.php');
	$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
	$datos = array();
	 $consulta =  "SELECT *
				FROM tblnoticia
				WHERE publicacion BETWEEN 
				(SELECT DATE_ADD(CURDATE(), INTERVAL -7 DAY)) 
				AND
				(SELECT CURDATE())
				AND SECCION = 'Encuestas'
				AND activo = 1
				order by id desc";
	/*
	$dateNow = date("Y-m-d");
	$consulta = "SELECT * FROM tblnoticia n WHERE n.publicacion = '".$dateNow."' AND n.seccion = 'Encuestas' AND activo = 1 ORDER BY id DESC";*/
	$resultado = mysql_query($consulta,$this->conexion) or die (mysql_error());
	if($resultado)
	{
		while ($datosNoticia = mysql_fetch_assoc($resultado)) 
		{
			$datos[] = $datosNoticia;
		}
	}
	$noticias = $this->cargarNoticias($datos);
	$pagina = $this->replace_contenido('/\#NOTICIAS\#/ms' ,$noticias, $pagina);
	$this->view_page($pagina);
}
/*7.-Modulo Videos */
function videos()
{
	$pagina=$this->load_template('');	/*titulo de la pagina */	
	$html = $this->load_page('app/views/default/modules/m.videos.php');
	$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
	$datos = array();
	 $consulta =  "SELECT *
				FROM tblnoticia
				WHERE publicacion BETWEEN 
				(SELECT DATE_ADD(CURDATE(), INTERVAL -7 DAY)) 
				AND
				(SELECT CURDATE())
				AND (tipoarchivo = 'Video' OR tipoarchivo = 'Link')
				AND activo = 1
				order by id desc";
	/*$dateNow = date("Y-m-d");
	$consulta = "SELECT * FROM tblnoticia n WHERE n.publicacion = '".$dateNow."' AND (n.tipoarchivo = 'Video' OR n.tipoarchivo = 'Link') AND activo = 1 ORDER BY id DESC";*/
	$resultado = mysql_query($consulta,$this->conexion) or die (mysql_error());
	if($resultado)
	{
		while ($datosNoticia = mysql_fetch_assoc($resultado)) 
		{
			$datos[] = $datosNoticia;
		}
	}
	$noticias = $this->cargarNoticias($datos);
	$pagina = $this->replace_contenido('/\#NOTICIAS\#/ms' ,$noticias, $pagina);
	$this->view_page($pagina);
}

/*8.-Modulo Acerca */
 function acerca()
   {
		$pagina=$this->load_template('');	/*titulo de la pagina */	
		
		$html = $this->load_page('app/views/default/modules/m.acerca.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$this->view_page($pagina);
   }
 function cargarNoticias($datos)
 {
 	session_start();
 	$clave = "STQzba1mggNz";
 	if(count($datos) > 0)
	{
		foreach ($datos as $value) 
		{
			$btnsEdit = "";
			if(isset($_SESSION["idUsuario"]))
			{
				$btnsEdit = "<div class='text-right'>
								<a role='button' class='idBtnEdit' value='".$value["id"]."'>
									<span class='glyphicon glyphicon-pencil'></span>
								</a> 
								<a role='button' class='idBtnRemove' value='".$value["id"]."'>
										<span class='glyphicon glyphicon-remove'></span>
								</a>
							</div>";
			}
			if($value["tipoarchivo"] == "Imagen")
			{
			
				$noticias .= "<div class='row thumbnail'>
								".$btnsEdit."
					  		<div class='col-sm-8 col-md-8'>
								<h4><a href='index.php?action=noticia&noticia=".md5($clave.$value["id"])."-".$value["titulo"]."'>".$value["titulo"]."</a></h4>
						  		<p>".$value["descripcion"]."</p>
						  	</div>
						  	<div class='col-sm-4 col-md-4' aling='center'>
							  <img src='".$value["direccionnoticia"]."' style='width: 100%;height: 27%;'>
						   	</div>
						</div>";
			}
			if($value["tipoarchivo"] == "Video")
			{
				$noticias .= "<div class='row thumbnail'>
								".$btnsEdit."
						  	<div class='col-sm-8 col-md-8'>        
								<h4><a href='index.php?action=noticia&noticia=".md5($clave.$value["id"])."-".$value["titulo"]."'>".$value["titulo"]."</a></h4>
						  		<p>".$value["descripcion"]."</p>
						  	</div>
						  	<div class='col-sm-4 col-md-4'>
							  	<video class='col-sm-2 col-md-8' style='width: 100%;height: auto;'><source src='".$value["direccionnoticia"]."' type='video/mp4' width='250' height='250'>Su navegador no soporta el video
							  	</video>
						   	</div>
						</div>";
			}
			if($value["tipoarchivo"] == "Link")
			{
				$noticias .= "<div class='row thumbnail'>
								".$btnsEdit."
						  	<div class='col-sm-7 col-md-7'>        
								<h4><a href='index.php?action=noticia&noticia=".md5($clave.$value["id"])."-".$value["titulo"]."'>".$value["titulo"]."</a></h4>
						  		<p>".$value["descripcion"]."</p>
						  	</div>
						  	<div class='col-sm-5 col-md-5' aling='center'>
							  	<iframe class='embed-responsive-item' src='".$value["direccionnoticia"]."?controls=0&showinfo=0' style='width: 100%;height: auto;'></iframe>
						   	</div>
						</div>";
			}
			
		}
		return $noticias;
	}
	else
		return "No se ha publicado ninguna noticia por el momento ¡Gracias!";

 }

 /*METODO QUE PASA UNA NOTICIA A OTRA PAGINA*/
 function noticia($idNoticia)
 {

     $pagina=$this->load_template('');	/*titulo de la pagina */			
	 $html = $this->load_page('app/views/default/modules/m.noticia.php');
	 $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);

	$idNoticia = explode("-", $idNoticia);
	$id = mysql_real_escape_string(strip_tags(stripslashes(trim($idNoticia[0]))));
	$consulta = "SELECT * FROM `tblnoticia` WHERE MD5(CONCAT('STQzba1mggNz',id)) = '".$id."'";
	$resultado = mysql_query($consulta) or die (mysql_error());
	if($resultado)
		$datos = mysql_fetch_assoc($resultado);
	else
		$datos = $resultado;

	


         if($datos["seccion"] == "Columnas")
			{
			
				$noticias .= "<div class='row'>
							  <div class='container'>

							   <div class='col-sm-2 col-md-2'> 
   <img src='".$datos["direccionnoticia"]."'>	
							   </div>
								  <div class='col-sm-6 col-md-6'> 

                               							  
								  <h1>
								      ".$datos["titulo"]."
								  </h1>
								  
								  <p class='contenidoNoticia'>
								  ".$datos["contenidoNoticia"]."
								   
								  </p>
								  </div>
								  

							   </div>
							</div>
	
	
	 ";
			}
			else if($datos["seccion"] == "Articulos")
			{
				$noticias .= "<div class='row'>
							  <div class='container'>
								  <div class='col-sm-6 col-md-6'> 

                               							  
								  <h1>
								      ".$datos["titulo"]."
								  </h1>
								  <p class='contenidoNoticia'>
								  ".$datos["contenidoNoticia"]."
								   
								  </p>
								  </div>
								  

							   </div>
							</div>
	
	
	 ";
			}
			else
			{
				$noticias .= "<div class='row'>
							  <div class='container'>
								  <div class='col-sm-6 col-md-6'> 

                                <img src='".$datos["direccionnoticia"]."'>								  
								  <h1>
								      ".$datos["titulo"]."
								  </h1>
								  <p class='contenidoNoticia'>
								  ".$datos["contenidoNoticia"]."
								   
								  </p>
								  </div>
								  

							   </div>
							</div>
	
	
	 ";
			}

	$pagina = $this->replace_contenidos('/\#NOTI\#/ms' ,$noticias, $pagina);
	$this->view_page($pagina);
	   


	
 }

 

	/* METODO QUE CARGA LAS PARTES PRINCIPALES DE LA PAGINA WEB
	INPUT
		$title | titulo en string del header
	OUTPIT
		$pagina | string que contiene toda el cocigo HTML de la plantilla 
	*/
	function load_template($title='Sin Titulo'){
		$pagina = $this->load_page('app/views/default/page.php');
		$head = $this->load_page('app/views/default/sections/s.head.php');
		$messages = $this->load_page('app/views/default/sections/s.messages.php');
		$header = $this->load_page('app/views/default/sections/s.header.php');
		$footer = $this->load_page('app/views/default/sections/s.footer.php');
		$foot = $this->load_page('app/views/default/sections/s.foot.php');
		$pagina = $this->replace_content('/\#HEAD\#/ms' ,$head , $pagina);
		$pagina = $this->replace_content('/\#MESSAGES\#/ms' ,$messages , $pagina);
		$pagina = $this->replace_content('/\#HEADER\#/ms',$header , $pagina);
		$pagina = $this->replace_content('/\#FOOTER\#/ms',$footer , $pagina);
		$pagina = $this->replace_content('/\#FOOT\#/ms',$foot , $pagina);
		$pagina = $this->replace_content('/\#TITLE\#/ms' ,$title , $pagina);
	
		return $pagina;
	}
	
	
	
	/* METODO QUE CARGA UNA PAGINA DE LA SECCION VIEW Y LA MANTIENE EN MEMORIA
		INPUT
		$page | direccion de la pagina 
		OUTPUT
		STRING | devuelve un string con el codigo html cargado
	*/	
	private function load_page($page)
	{
		return file_get_contents($page);
	}
	
	/* METODO QUE ESCRIBE EL CODIGO PARA QUE SEA VISTO POR EL USUARIO
		INPUT
		$html | codigo html
		OUTPUT
		HTML | codigo html		
	*/
	private function view_page($html)
	{
		echo $html;
	}
	
	/* PARSEA LA PAGINA CON LOS NUEVOS DATOS ANTES DE MOSTRARLA AL USUARIO
		INPUT
		$out | es el codigo html con el que sera reemplazada la etiqueta CONTENIDO
		$pagina | es el codigo html de la pagina que contiene la etiqueta CONTENIDO
		OUTPUT
		HTML 	| cuando realiza el reemplazo devuelve el codigo completo de la pagina
	*/
	private function replace_content($in='/\#CONTENIDO\#/ms', $out,$pagina)
	{
		 return preg_replace($in, $out, $pagina);	 	
	}
	private function replace_contenido($in='/\#NOTICIAS\#/ms', $out,$pagina)
	{
		return preg_replace($in, $out, $pagina);	
	}


	private function replace_contenidos($in='/\#NOTI\#/ms', $out,$pagina)
	{
		return preg_replace($in, $out, $pagina);	
	}
	
}
?>