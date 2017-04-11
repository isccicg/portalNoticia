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

/*function banner($id){
	
$consulta =  " SELECT link FROM tblbanners WHERE id =".$id;


return $id
} */



function banner($id)
{

//$consulta = "SELECT * FROM tblnoticia n WHERE n.publicacion = '".$dateNow."' AND activo = 1 ORDER BY id DESC";

//$id=1;
  $consulta =  " SELECT link FROM tblbanners WHERE id ='".$id."'";
//	$consulta =  "SELECT link FROM tblbanners WHERE id =".$id;

	$resultado = mysql_query($consulta) or die (mysql_error());
	if($resultado)
		$valor = mysql_fetch_assoc($resultado);
	else
		$valor = $resultado;


if($id=='1'){
	return $noticias .= "
								 <a href='".$valor["link"]."'>
								

								 <img class ='slide-image' src='app/banners/Superior.jpg'>

								 </a>          
	
	
	 ";

}
else if ($id=="2") {
	return $noticias .= "
								 <a href='".$valor["link"]."'>
								 

								 <img class ='slide-image' src='app/banners/DInferior.jpg'>

								 </a>          
	
	
	 ";
	# code...
}

else if ($id=="3") {

	return $noticias .= "
								 <a href='".$valor["link"]."'>
								 

								 <img class ='slide-image' src='app/banners/DSuperior.jpg'>

								 </a>          
	
	
	 ";
	# code...
}
else if ($id=="4") {

	return $noticias .= "
								 <a href='".$valor["link"]."'>

								 <img class ='slide-image' src='app/banners/Inferior.jpg'>

								 </a>          
	
	
	 ";
	# code...
}


      


}



function principal($page)
{
	//$banner=$this->banner();
	//echo "Hola el link es".$banner;

	//devolver_referencia();

   // $banner=$this->banner();
	$pagina=$this->load_template('');	/*titulo de la pagina */	
	$html = $this->load_page('app/views/default/modules/m.principal.php');
	$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);	 
	//$pagina = $this->replace_banner('/\#BANNER\#/ms' ,$html , $banner);
	$datos = array();
	$maxNoticias = 8;
	$inicioNoticia = ($page-1)*$maxNoticias;
   	$consulta = "SELECT * FROM tblnoticia WHERE publicacion BETWEEN (SELECT DATE_ADD(CURDATE(), INTERVAL -3 DAY)) AND (SELECT CURDATE()) AND activo = 1 order by id desc";
	$resultado = mysql_query($consulta,$this->conexion) or die (mysql_error());
	$totalNoticias = mysql_num_rows($resultado);
	$noticias = $this->cargarNoticias($consulta,$totalNoticias,$maxNoticias,$inicioNoticia,$page);
	$pagina = $this->replace_contenido('/\#NOTICIAS\#/ms' ,$noticias, $pagina); 

/*habilitar cuando este la tabla arriba*/
	 $banner=$this->banner("1");
	 $pagina = $this->replace_bannerS('/\#BANNERS\#/ms' ,$banner, $pagina); 
     $banner=$this->banner("2");
	 $pagina = $this->replace_bannerDS('/\#BANNERDS\#/ms' ,$banner, $pagina);
	  $banner=$this->banner("3");
	 $pagina = $this->replace_bannerDI('/\#BANNERDI\#/ms' ,$banner, $pagina);
	  $banner=$this->banner("4");
	 $pagina = $this->replace_bannerI('/\#BANNERI\#/ms' ,$banner, $pagina); 

    // $masVisto=$this->masVisto();
//select nombreNoticia,count(*) from masvisto group by nombreNoticia order by count(*) desc limit 7;
// select seccion,count(*) from tblnoticia group by seccion order by count(*) desc limit 7;

     $masVisto = $this->masVisto("SELECT  seccion,count(*)
				FROM tblnoticia
				group by seccion
				order by count(*) desc limit 7");
     $pagina = $this->replace_loMasVisto('/\#LOMASVISTO\#/ms' ,$masVisto, $pagina); 


	 $this->view_page($pagina);
}

   /*1.- Modulo Politica */
function politica($page)
{
	$maxNoticias = 8;
	$inicioNoticia = ($page-1)*$maxNoticias;
	$pagina=$this->load_template('');	/*titulo de la pagina */	
	$html = $this->load_page('app/views/default/modules/m.politica.php');
	$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
	$datos = array();

  	$consulta = "SELECT *
				FROM tblnoticia
				WHERE publicacion BETWEEN 
				(SELECT DATE_ADD(CURDATE(), INTERVAL -7 DAY)) 
				AND
				(SELECT CURDATE())
				AND SECCION = 'Politica'
				AND activo = 1
				order by id desc";
	$resultado = mysql_query($consulta,$this->conexion) or die (mysql_error());
	$totalNoticias = mysql_num_rows($resultado);
	$noticias = $this->cargarNoticias($consulta,$totalNoticias,$maxNoticias,$inicioNoticia,$page,"&action=politica");
	$pagina = $this->replace_contenido('/\#NOTICIAS\#/ms' ,$noticias, $pagina); 

	 
     $banner=$this->banner("2");
	 $pagina = $this->replace_bannerDS('/\#BANNERDS\#/ms' ,$banner, $pagina);
	  $banner=$this->banner("3");
	 $pagina = $this->replace_bannerDI('/\#BANNERDI\#/ms' ,$banner, $pagina);
	

	$this->view_page($pagina);
}

   /*.-Modulo Economia  NUEVO*/

function economia($page)
{
	$maxNoticias = 8;
	$inicioNoticia = ($page-1)*$maxNoticias;
	$pagina=$this->load_template('');	/*titulo de la pagina */	
	$html = $this->load_page('app/views/default/modules/m.economia.php');
	$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
	//$this->view_page($pagina);
	/* poner nuevo a economia nuevo modulo*/

 	$consulta = "SELECT *
				FROM tblnoticia
				WHERE publicacion BETWEEN 
				(SELECT DATE_ADD(CURDATE(), INTERVAL -7 DAY)) 
				AND
				(SELECT CURDATE())
				AND SECCION = 'Economia'
				AND activo = 1
				order by id desc";
	$resultado = mysql_query($consulta,$this->conexion) or die (mysql_error());
	$totalNoticias = mysql_num_rows($resultado);
	$noticias = $this->cargarNoticias($consulta,$totalNoticias,$maxNoticias,$inicioNoticia,$page,"&action=economia");
	$pagina = $this->replace_contenido('/\#NOTICIAS\#/ms' ,$noticias, $pagina); 

	$banner=$this->banner("2");
	$pagina = $this->replace_bannerDS('/\#BANNERDS\#/ms' ,$banner, $pagina);
	$banner=$this->banner("3");
	$pagina = $this->replace_bannerDI('/\#BANNERDI\#/ms' ,$banner, $pagina);

	$this->view_page($pagina);
}

   /*2.-Modulo Sociedad */
function sociedad($page)
{
	$maxNoticias = 8;
	$inicioNoticia = ($page-1)*$maxNoticias;
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
	$totalNoticias = mysql_num_rows($resultado);
	$noticias = $this->cargarNoticias($consulta,$totalNoticias,$maxNoticias,$inicioNoticia,$page,"&action=sociedad");
	$pagina = $this->replace_contenido('/\#NOTICIAS\#/ms' ,$noticias, $pagina);
	$banner=$this->banner("2");
	$pagina = $this->replace_bannerDS('/\#BANNERDS\#/ms' ,$banner, $pagina);
	$banner=$this->banner("3");
	$pagina = $this->replace_bannerDI('/\#BANNERDI\#/ms' ,$banner, $pagina);
	$this->view_page($pagina);
}

/*3.1.-Modulo Articulos */
function articulos($page)
{
	$maxNoticias = 8;
	$inicioNoticia = ($page-1)*$maxNoticias;
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
	$totalNoticias = mysql_num_rows($resultado);
	$noticias = $this->cargarNoticias($consulta,$totalNoticias,$maxNoticias,$inicioNoticia,$page,"&action=articulos");
	$pagina = $this->replace_contenido('/\#NOTICIAS\#/ms' ,$noticias, $pagina);
	$banner=$this->banner("2");
	$pagina = $this->replace_bannerDS('/\#BANNERDS\#/ms' ,$banner, $pagina);
	$banner=$this->banner("3");
	$pagina = $this->replace_bannerDI('/\#BANNERDI\#/ms' ,$banner, $pagina);
	$this->view_page($pagina);
}
/*3.2.-Modulo Columnas */
function columnas($page)
{
	$maxNoticias = 8;
	$inicioNoticia = ($page-1)*$maxNoticias;
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
	$totalNoticias = mysql_num_rows($resultado);
	$noticias = $this->cargarNoticias($consulta,$totalNoticias,$maxNoticias,$inicioNoticia,$page,"&action=columnas");
	$pagina = $this->replace_contenido('/\#NOTICIAS\#/ms' ,$noticias, $pagina);
	$banner=$this->banner("2");
	$pagina = $this->replace_bannerDS('/\#BANNERDS\#/ms' ,$banner, $pagina);
	$banner=$this->banner("3");
	$pagina = $this->replace_bannerDI('/\#BANNERDI\#/ms' ,$banner, $pagina);
	$this->view_page($pagina);
}

/*4.-Modulo Cultura */
 function cultura($page)
{
	$maxNoticias = 8;
	$inicioNoticia = ($page-1)*$maxNoticias;
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
	$resultado = mysql_query($consulta,$this->conexion) or die (mysql_error());
	$totalNoticias = mysql_num_rows($resultado);
	$noticias = $this->cargarNoticias($consulta,$totalNoticias,$maxNoticias,$inicioNoticia,$page,"&action=cultura");
	$pagina = $this->replace_contenido('/\#NOTICIAS\#/ms' ,$noticias, $pagina);
	$banner=$this->banner("2");
	$pagina = $this->replace_bannerDS('/\#BANNERDS\#/ms' ,$banner, $pagina);
	$banner=$this->banner("3");
	$pagina = $this->replace_bannerDI('/\#BANNERDI\#/ms' ,$banner, $pagina);
	$this->view_page($pagina);
}

/*5.-Modulo Deportes */
function deportes($page)
{
	$maxNoticias = 8;
	$inicioNoticia = ($page-1)*$maxNoticias;
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
	$resultado = mysql_query($consulta,$this->conexion) or die (mysql_error());
	$totalNoticias = mysql_num_rows($resultado);
	$noticias = $this->cargarNoticias($consulta,$totalNoticias,$maxNoticias,$inicioNoticia,$page,"&action=deportes");
	$pagina = $this->replace_contenido('/\#NOTICIAS\#/ms' ,$noticias, $pagina);
	$banner=$this->banner("2");
	$pagina = $this->replace_bannerDS('/\#BANNERDS\#/ms' ,$banner, $pagina);
	$banner=$this->banner("3");
	$pagina = $this->replace_bannerDI('/\#BANNERDI\#/ms' ,$banner, $pagina);
	$this->view_page($pagina);
}

 /*6.1-Modulo Monitores */
function monitores($page)
{
	$maxNoticias = 8;
	$inicioNoticia = ($page-1)*$maxNoticias;
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
	$resultado = mysql_query($consulta,$this->conexion) or die (mysql_error());
	$totalNoticias = mysql_num_rows($resultado);
	$noticias = $this->cargarNoticias($consulta,$totalNoticias,$maxNoticias,$inicioNoticia,$page,"&action=monitores");
	$pagina = $this->replace_contenido('/\#NOTICIAS\#/ms' ,$noticias, $pagina);
	$banner=$this->banner("2");
	$pagina = $this->replace_bannerDS('/\#BANNERDS\#/ms' ,$banner, $pagina);
	$banner=$this->banner("3");
	$pagina = $this->replace_bannerDI('/\#BANNERDI\#/ms' ,$banner, $pagina);
	$this->view_page($pagina);
}
 /*6.2-Modulo Encuestas */
function encuestas($page)
{
	$maxNoticias = 8;
	$inicioNoticia = ($page-1)*$maxNoticias;
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
	$resultado = mysql_query($consulta,$this->conexion) or die (mysql_error());
	$totalNoticias = mysql_num_rows($resultado);
	$noticias = $this->cargarNoticias($consulta,$totalNoticias,$maxNoticias,$inicioNoticia,$page,"&action=encuestas");
	$pagina = $this->replace_contenido('/\#NOTICIAS\#/ms' ,$noticias, $pagina);
	$banner=$this->banner("2");
	$pagina = $this->replace_bannerDS('/\#BANNERDS\#/ms' ,$banner, $pagina);
	$banner=$this->banner("3");
	$pagina = $this->replace_bannerDI('/\#BANNERDI\#/ms' ,$banner, $pagina);
	$this->view_page($pagina);
}
/*7.-Modulo Videos */
function videos($page)
{
	$maxNoticias = 8;
	$inicioNoticia = ($page-1)*$maxNoticias;
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
	$resultado = mysql_query($consulta,$this->conexion) or die (mysql_error());
	$totalNoticias = mysql_num_rows($resultado);
	$noticias = $this->cargarNoticias($consulta,$totalNoticias,$maxNoticias,$inicioNoticia,$page,"&action=videos");
	$pagina = $this->replace_contenido('/\#NOTICIAS\#/ms' ,$noticias, $pagina);
	$banner=$this->banner("2");
	$pagina = $this->replace_bannerDS('/\#BANNERDS\#/ms' ,$banner, $pagina);
	$banner=$this->banner("3");
	$pagina = $this->replace_bannerDI('/\#BANNERDI\#/ms' ,$banner, $pagina);
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
 function cargarNoticias($consulta,$totalNoticias,$maxNoticias,$inicioNoticia,$page,$link)
 {
 	$consulta .= " LIMIT ".$inicioNoticia.",".$maxNoticias;
 	$resultado = mysql_query($consulta,$this->conexion) or die (mysql_error());
 	if($resultado)
	{
		while ($datosNoticia = mysql_fetch_assoc($resultado)) 
		{
			$datos[] = $datosNoticia;
		}
	}
 	session_start();
 	$noticias = "";
 	$htmlPagination = "<nav aria-label='Page navigation example'><ul class='pagination justify-content-end'>";
 	$htmlPagination .= ($page > 1) ? "<li class='pagination-prev'><a href='index.php?page=".($page-1).$link."'>&laquo;</a></li>": "";
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
		if($totalNoticias >  0)
		{
			$numPage = ceil($totalNoticias/$maxNoticias);
			for($i = 1 ; $i <= $numPage ; $i++)
			{
				$classActive = ($page == $i) ? "active":"";
				$htmlPagination .= "<li class='".$classActive."'><a href='index.php?page=".$i.$link."'>".$i."</a></li>"; 
			}
		}
		$htmlPagination .= ($page < $numPage) ? "<li class='pagination-nex'><a href='index.php?page=".($page+1).$link."'>&raquo;</a></li></ul></nav>":"";
		return $noticias.$htmlPagination;
	}
	else
		return "No se ha publicado ninguna noticia por el momento ¡Gracias!";

 }

/**/


function masVisto($consulta)
 {
 	##$consulta .= " LIMIT ".$inicioNoticia.",".$maxNoticias;
 	//echo "".$consulta;
 	$resultado = mysql_query($consulta) or die (mysql_error());
 	if($resultado)
	{
		while ($datosNoticia = mysql_fetch_assoc($resultado)) 
		{
			$datos[] = $datosNoticia;
		}
	}
 	session_start();
 	$noticias = "";
 	
 	$clave = "STQzba1mggNz";
 	if(count($datos) > 0)
	{
		foreach ($datos as $value) 
		{
			
			

            
			    



				$noticias .= "<tr>
							
					  		
						   <td> ".$value["seccion"]." </td>
						   <td> ".$value["count(*)"]." </td>
						  	   
						</tr>";
			
			
		
			
		}
		
		return $noticias;
	}
	else
		return "No se ha publicado ¡Gracias!";

 }


/**/





 /*METODO QUE PASA UNA NOTICIA A OTRA PAGINA*/


 function dameURL(){
$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
return $url;
}
 function noticia($idNoticia)
 {

//echo "".$url=$this->dameURL();


                    
                   



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

	
                  /* $tituloNoticia = mysql_real_escape_string(strip_tags(stripslashes(trim($datos["titulo"]))));
			        $linkNoticia = mysql_real_escape_string(strip_tags(stripslashes(trim($url=$this->dameURL()))));			     
					$consulta2 = "INSERT INTO masVisto(nombreNoticia,link) VALUES('".$tituloNoticia."','".$linkNoticia.");"; 
					mysql_query($consulta2) or die (mysql_error());   */



         if($datos["seccion"] == "Columnas")
			{
			
				$noticias .= "<div class='rows thumbnail'>
							  <div class='container'>

							   <div class='col-sm-2 col-md-2'> 
							   <br>
   <img src='".$datos["direccionnoticia"]."'>	
							   </div>
								  <div class='col-sm-4 col-md-4'> 

                               							  
								  <h1>
								      ".$datos["titulo"]."
								  </h1>
								  
								  <p class='contenidoNoticia'>
								  ".$datos["contenidoNoticia"]."
								   
								  </p>
								  <div class='fb-share-button' data-href='".$url=$this->dameURL()."'data-type='button_count'></div>
								  </div>
								  

							   </div>
							</div>
	
	
	 ";
			}
			else if($datos["seccion"] == "Articulos")
			{
				$noticias .= "<div class='row thumbnail'>
							  <div class='container'>
								  <div class='col-sm-6 col-md-6'> 

                               							  
								  <h1>
								      ".$datos["titulo"]."
								  </h1>
								  <p class='contenidoNoticia'>
								  ".$datos["contenidoNoticia"]."
								   
								  </p>

								  <div class='fb-share-button' data-href='".$url=$this->dameURL()."'data-type='button_count'></div>
								  </div>
								  

							   </div>
							</div>
	
	
	 ";
			}

			else if($datos["tipoarchivo"] == "Link")
			{
				$noticias .= "<div class='row thumbnail'>
							  <div class='container'>
								  <div class='col-sm-6 col-md-6'> 
								   <h1>
								      ".$datos["titulo"]."
								  </h1>

								  	<iframe class='embed-responsive-item' src='".$datos["direccionnoticia"]."?controls=0&showinfo=0' ></iframe>

                               					  
								 
								  <p class='contenidoNoticia'>
								  ".$datos["contenidoNoticia"]."
								   
								  </p>
								  <div class='fb-share-button' data-href='".$url=$this->dameURL()."'data-type='button_count'></div>
             

								  </div>
								  

							   </div>
							</div>
	
	
	 ";
			}
			else
			{

				
				$noticias .= "<div class='row thumbnail'>
							  <div class='container'>
								  <div class='col-sm-6 col-md-6'> 
								   <h1>
								      ".$datos["titulo"]."
								  </h1>

                                <img src='".$datos["direccionnoticia"]."'>								  
								 
								  <p class='contenidoNoticia'>
								  ".$datos["contenidoNoticia"]."
								   
								  </p>
								  <div class='fb-share-button' data-href='".$url=$this->dameURL()."'data-type='button_count'></div>
								  </div>
								  

							   </div>
							</div>
	
	
	 ";
			}


			     


	$pagina = $this->replace_contenidos('/\#NOTI\#/ms' ,$noticias, $pagina);
	$banner=$this->banner("2");
	$pagina = $this->replace_bannerDS('/\#BANNERDS\#/ms' ,$banner, $pagina);
	$banner=$this->banner("3");
	$pagina = $this->replace_bannerDI('/\#BANNERDI\#/ms' ,$banner, $pagina);
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

	private function replace_bannerS($in='/\#BANNERS\#/ms', $out,$pagina)
	{
		return preg_replace($in, $out, $pagina);	
	}

	private function replace_bannerDS($in='/\#BANNERDS\#/ms', $out,$pagina)
	{
		return preg_replace($in, $out, $pagina);	
	}
	private function replace_bannerDI($in='/\#BANNERDI\#/ms', $out,$pagina)
	{
		return preg_replace($in, $out, $pagina);	
	}
	private function replace_bannerI($in='/\#BANNERI\#/ms', $out,$pagina)
	{
		return preg_replace($in, $out, $pagina);	
	}
	
	private function replace_loMasVisto($in='/\#LOMASVISTO\#/ms', $out,$pagina)
	{
		return preg_replace($in, $out, $pagina);	
	}

}
?>