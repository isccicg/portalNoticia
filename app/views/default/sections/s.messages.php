 <?php 
 if($_POST["tipoModal"] == "login")
 {
?>
 <!-- Modal -->
<div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">¡Solo personal autorizado!</h4>
            </div>
            <form id="formLogin" onsubmit="return false;">
                <div class="modal-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" name="Datos[usuario]" placeholder="Usuario" id="idTxtUsuario" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" name="Datos[password]" placeholder="Password" id="idTxtPassword" class="form-control" required>
                            </div>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div> 
<?php
}
if($_POST["tipoModal"] == "altaNoticia")
{
?>
<div class="modal fade" id="modalAltaNoticia" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ingresar datos de noticia</h4>
            </div>
            <form action="app/controller/formAltaNoticia.php?accion=altaNoticia" method="POST" enctype="multipart/form-data">
                <div class="modal-body col-lg-12">
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="idTxtTitulo">Sección</label>
                            <select name="Datos[cmbSeccion]" id="idCmbSeccion" class="form-control" required>
                                <option value="" selected disabled>-- Seleccionar --</option>
                                <option value="Cultura">Cultura</option>
                                <option value="Deporte">Deporte</option>
                                <option value="Politica">Politica</option>
                                <option value="Sociedad">Sociedad</option>
                                <option value="Articulos">Articulos</option>
                                <option value="Columnas">Columnas</option>
                                <option value="Monitores">Monitores</option>
                                <option value="Encuestas">Encuestas</option>
                            </select>
                        </div>
                        <br><br>
                        <div class="text-center">
                            <div class="form-group col-lg-2">
                                <label class="radio-inline"><input type="radio" name="Datos[radioTipoArchivo]" value="Imagen" class="radioTipoArchivo" checked>Imagen</label>
                            </div>
                            <div class="form-group col-lg-2">
                                <label class="radio-inline"><input type="radio" name="Datos[radioTipoArchivo]" value="Video" class="radioTipoArchivo">Video</label>
                            </div>
                            <div class="form-group col-lg-2">
                                <label class="radio-inline"><input type="radio" name="Datos[radioTipoArchivo]" value="Link" class="radioTipoArchivo">Link</label>
                            </div>
                            <div class="form-group col-lg-2">
                                <label class="radio-inline"><input type="radio" name="Datos[radioTipoArchivo]" value="Banner" class="radioTipoArchivo">Banner</label>
                            </div>
                        </div>
                    </div>
                    <div class="agregarBanner text-center" data-toggle='buttons'>
                        
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="idTxtTitulo" id="lblTitulo">Titulo</label>
                            <input type="text" name="Datos[tituloNoticia]" placeholder="Titulo" id="idTxtTitulo" class="form-control" required>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="preview" class="img-responsive thumbnail">
                                <a href="" id="file-select" class="btn btn-success">Elegir archivo</a>
                                <img id='idCargarImagen' src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTVhNTFmMTU2ZmMgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNWE1MWYxNTZmYyI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS44MDQ2ODc1IiB5PSIxMDUuMSI+MjQyeDIwMDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <input type="text" name="Datos[descripcionNoticia]" id="idDescripcionNoticiaVideo" placeholder="Descripción"  class="form-control" required>
                        </div>
                        <br>
                        <div class="row">
                            <textarea name="Datos[contenidoNoticia]" id="idContenidoNoticia" placeholder="Escribir contenido de noticia." class="form-control" style="resize:none;" required></textarea>
                        </div>
                    </div>
                    <input type="file" name="noticia" accept="image/jpeg,image/gif,image/png" id="file" style="display: none">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
}
?>