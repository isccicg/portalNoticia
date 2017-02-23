<div class="modal fade" id="login" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ingresar datos de noticia</h4>
                </div>
                <div class="modal-body col-lg-12">
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="idTxtTitulo">Sección</label>
                            <select name="Datos[cmbSeccion]" id="idCmbSeccion" class="form-control">
                                <option selected disabled>-- Seleccionar --</option>
                                <option value="Cultura">Cultura</option>
                                <option value="Deporte">Deporte</option>
                                <option value="Politica">Politica</option>
                                <option value="Sociedad">Sociedad</option>
                                <option value="Articulos">Articulos</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <input type="radio" name="radioTipoArchivo">Imagen
                            <input type="radio" name="radioTipoArchivo">Video
                            <input type="radio" name="radioTipoArchivo">Link
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="idTxtTitulo">Titulo</label>
                            <input type="text" name="Datos[tituloNoticia]" placeholder="Titulo" id="idTxtTitulo" class="form-control">
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div id="preview" class="thumbnail">
                                <a href="" id="file-select" class="btn btn-primary">Elegir archivo</a>
                                <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTVhNTFmMTU2ZmMgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNWE1MWYxNTZmYyI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS44MDQ2ODc1IiB5PSIxMDUuMSI+MjQyeDIwMDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                    <textarea name="Datos[descripcionNoticiaVideo]" id="idDescripcionNoticiaVideo" placeholder="Descripción" style="resize:none;" class="form-control" required></textarea>
                    </div>
                    <input type="file" name="noticia" accept="image/jpeg,image/gif,image/png,video/*" id="file" style="display: none">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

     <!-- Modal -->
    <!-- <div class="modal fade" id="login" role="dialog">
        <div class="modal-dialog modal-sm"> -->
            <!-- Modal content-->
            <!-- <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ingresar datos de usuario</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputUsuario">Usuario</label>
                        <input type="text" placeholder="Usuario" id="inputUsuario" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputContraseña">Contraseña</label>
                        <input type="password" placeholder="Password" id="inputContraseña" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Aceptar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> --> 