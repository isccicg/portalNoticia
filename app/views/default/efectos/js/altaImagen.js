// $('#preview').hover(
//     function() {
//         $(this).find('a').fadeIn();
//     }, function() {
//         $(this).find('a').fadeOut();
//     }
// );
$(document).on("mouseenter","#preview",function()
{
    $(this).find('a').fadeIn();
});
$(document).on("mouseleave","#preview",function()
{
    $(this).find('a').fadeOut();
});

$(document).on("click","#loginUsuario" ,function()
{
    $.post("app/views/default/sections/s.messages.php",{tipoModal: "login"},function(data)
    {
        $("#messagges").html(data);
        $("#login").modal();
    });
});
$(document).on("click","#file-select",function(e)
{
    e.preventDefault();
    $("#file").click();
});

$(document).on("change","input[type=file]",function() {
    // var file = (this.files[0].name).toString();
    var reader = new FileReader();
    
    // $('#file-info').text('');
    // $('#file-info').text(file);
    
     reader.onload = function (e) 
     {
        $('#preview img').attr('src', e.target.result);
         
	 }
     
     reader.readAsDataURL(this.files[0]);
});
$(document).on("submit","#formLogin",function()
{
    var Datos = {};
    Datos['usuario'] = $("[name='Datos[usuario]']").val();
    Datos['password'] = $("[name='Datos[password]']").val();
    $.ajax(
    {
        url : "app/controller/formAltaNoticia.php?accion=login",
        data : {Datos:Datos},
        type: "POST",
        success: function(data)
        {
            if(data == 1)
            {
                window.location.reload();
            }
            else
                alert("Tiene 3 intentos")
        }
    });

});
$(document).on("click",".radioTipoArchivo",function()
{
    var tipoArchivo = "";
    tipoArchivo = $(this).val();
    switch(tipoArchivo) 
    {
        case "Imagen":
            $("#lblTitulo").removeClass("hidden");
            $("#preview").removeClass("hidden");
            $("#idTxtTitulo").removeClass("hidden");
            $("#idDescripcionNoticiaVideo").removeClass("hidden");
            $("#idContenidoNoticia").removeClass("hidden");
            $("#preview").attr("class","img-responsive thumbnail");
            $("#preview").attr("style","");
            $("#file").attr("accept","image/jpeg,image/gif,image/png");
            $("#preview").html("<a href='' id='file-select' class='btn btn-success'>Elegir archivo</a><img src='data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTVhNTFmMTU2ZmMgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNWE1MWYxNTZmYyI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS44MDQ2ODc1IiB5PSIxMDUuMSI+MjQyeDIwMDwvdGV4dD48L2c+PC9nPjwvc3ZnPg=='>");
            $(".agregarBanner").html("");
            break;
        case "Video":
            $("#file").val("");
            $("#lblTitulo").removeClass("hidden");
            $("#preview").removeClass("hidden");
            $("#idTxtTitulo").removeClass("hidden");
            $("#idDescripcionNoticiaVideo").removeClass("hidden");
            $("#idContenidoNoticia").removeClass("hidden");
            $("#preview").attr("class","img-responsive thumbnail");
            $("#file").attr("accept","video/mp4");
            $("#preview").attr("style","");
            $("#preview").html("<a href='' id='file-select' class='btn btn-success'>Elegir archivo</a><video width='242px' height='200px' class='img-thumbnail' controls><source src='' type='video/mp4'>Your browser does not support the video tag.</video>");
            $(".agregarBanner").html("");
            break;
        case "Link":
            $("#file").val("");
            $("#lblTitulo").removeClass("hidden");
            $("#preview").removeClass("hidden");
            $("#idTxtTitulo").removeClass("hidden");
            $("#idDescripcionNoticiaVideo").removeClass("hidden");
            $("#idContenidoNoticia").removeClass("hidden");
            $("#preview").removeAttr("class","");
            $("#preview").attr("style","height: 40px;");
            $("#preview").html("<input type='text' name='Datos[linkNoticia]' id='idLinkNoticia' placeholder='Digitar link..'  class='form-control' required><div class='embed-responsive embed-responsive-4by3'><iframe class='embed-responsive-item' src=''></iframe></div>");
            $(".agregarBanner").html("");
            break;
        case "Banner":
            $("#file").val("");
            $("#lblTitulo").addClass("hidden");
            $("#preview").addClass("hidden");
            $("#idTxtTitulo").addClass("hidden");
            $("#idDescripcionNoticiaVideo").addClass("hidden");
            $("#idContenidoNoticia").addClass("hidden");
            $(".agregarBanner").html("<label class='btn btn-default'><input type='checkbox' name='checkIzquierdo' value='Izquierdo' id='idCheckIzquierdo'>Izquierdo</label><label class='btn btn-default'><input type='checkbox' name='checkDerecho' value='Derecho' id='idCheckDerecho'>Derecho</label><label class='btn btn-default'><input type='checkbox' name='checkSuperior' value='Superior' id='idCheckSuperior'>Superior</label><label class='btn btn-default'><input type='checkbox' name='checkInferior' value='Inferior' id='idCheckInferior'>Inferior</label>")
            break;
    }

});
$(document).on("click","#altaNoticia",function()
{
    $.post("app/views/default/sections/s.messages.php",{tipoModal: "altaNoticia"},function(data)
    {
        $("#messagges").html(data);
        $("#modalAltaNoticia").modal();
    });
});