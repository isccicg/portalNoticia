<!DOCTYPE html>
<html>
	<head>
	  	<meta charset="utf-8">
	  	<title>Alta | Noticia</title>
	  	<link rel="stylesheet" href="../efectos/css/bootstrap.min.css">
	  	<link rel="stylesheet" href="../efectos/css/altaImagen.css">
	</head>
	<body>
		<form action="../../../controller/formAltaNoticia.php?accion=altaNoticia" method="POST" enctype="multipart/form-data">
			<div>
				<select name="Datos[cmbSeccion]" id="idCmbSeccion">
					<option selected disabled>-- Seleccionar --</option>
					<option value="Cultura">Cultura</option>
					<option value="Deporte">Deporte</option>
					<option value="Politica">Politica</option>
					<option value="Sociedad">Sociedad</option>
					<option value="Articulos">Articulos</option>
				</select>
				<br><br>
				<input type="text" name="Datos[tituloNoticiaVideo]" placeholder="Titulo">
			</div>
			<br>
			<div id="preview" class="thumbnail">
				<a href="" id="file-select" class="btn btn-primary">Elegir archivo</a>
				<img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTVhNTFmMTU2ZmMgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNWE1MWYxNTZmYyI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS44MDQ2ODc1IiB5PSIxMDUuMSI+MjQyeDIwMDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==">
			</div>
			<textarea name="Datos[descripcionNoticiaVideo]" id="idDescripcionNoticiaVideo" placeholder="Descripción" style="resize:none;" required></textarea>
			<br><br>
			
				<input type="submit" name="bntSaveIMage" value="Guardar" class="btn btn-primary">
				<input type="file" name="noticia" accept="image/jpeg,image/gif,image/png,video/*" id="file" style="display: none">
		</form>
	<!-- jQuery 2.2.3 -->
    <script src="../efectos/js/jquery.min.js"></script>
    <!-- Alta Imagen js -->
    <script src="../efectos/js/altaImagen.js"></script>
	</body>
</html>