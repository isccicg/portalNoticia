<?php

/*require 'app/model/universitario.class.php';*/

class mvc_controller {  
	
   /*Modulos*/
   function principal()
   {
		$pagina=$this->load_template('');	/*titulo de la pagina */	
		
		$html = $this->load_page('app/views/default/modules/m.principal.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$this->view_page($pagina);
   }

   /*1.- Modulo Politica */
 function politica()
   {
		$pagina=$this->load_template('');	/*titulo de la pagina */	
		
		$html = $this->load_page('app/views/default/modules/m.politica.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$this->view_page($pagina);
   }

   /*2.-Modulo Sociedad */
 function sociedad()
   {
		$pagina=$this->load_template('');	/*titulo de la pagina */	
		
		$html = $this->load_page('app/views/default/modules/m.sociedad.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$this->view_page($pagina);
   }

/*3.1.-Modulo Articulos */
 function articulos()
   {
		$pagina=$this->load_template('');	/*titulo de la pagina */	
		
		$html = $this->load_page('app/views/default/modules/m.articulos.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$this->view_page($pagina);
   }
/*3.1.-Modulo Columnas */
 function columnas()
   {
		$pagina=$this->load_template('');	/*titulo de la pagina */	
		
		$html = $this->load_page('app/views/default/modules/m.columnas.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$this->view_page($pagina);
   }

/*4.-Modulo Cultura */
 function cultura()
   {
		$pagina=$this->load_template('');	/*titulo de la pagina */	
		
		$html = $this->load_page('app/views/default/modules/m.cultura.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$this->view_page($pagina);
   }

/*5.-Modulo Deportes */
 function deportes()
   {
		$pagina=$this->load_template('');	/*titulo de la pagina */	
		
		$html = $this->load_page('app/views/default/modules/m.deportes.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$this->view_page($pagina);
   }

 /*6.-Modulo Estudios */
 function estudios()
   {
		$pagina=$this->load_template('');	/*titulo de la pagina */	
		
		$html = $this->load_page('app/views/default/modules/m.deportes.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$this->view_page($pagina);
   }
/*7.-Modulo Videos */
 function videos()
   {
		$pagina=$this->load_template('');	/*titulo de la pagina */	
		
		$html = $this->load_page('app/views/default/modules/m.videos.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
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
		$header = $this->load_page('app/views/default/sections/s.header.php');
		$foot = $this->load_page('app/views/default/sections/s.foot.php');
		$pagina = $this->replace_content('/\#HEAD\#/ms' ,$head , $pagina);
		$pagina = $this->replace_content('/\#HEADER\#/ms',$header , $pagina);
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
	
}
?>