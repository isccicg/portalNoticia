// $('#preview').hover(
//     function() {
//         $(this).find('a').fadeIn();
//     }, function() {
//         $(this).find('a').fadeOut();
//     }
// );
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});
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

$(document).on("change","input[type=file]",function() 
{
    var reader = new FileReader();
    var file = (this.files[0].name).toString();
    var tipoArchivo = "";
    tipoArchivo = $(":checked.radioTipoArchivo").val();;
    switch(tipoArchivo)
    {
        case 'Imagen':
            // $('#file-info').text('');
            // $('#file-info').text(file);
            reader.onload = function (e) 
            {
                $('#idCargarImagen').attr('src', e.target.result);
                 
            }
            reader.readAsDataURL(this.files[0]);
            break;
        case 'Video':
            $("#idCargarVideo").attr("poster","app/views/default/efectos/images/Cargando-video.gif");
            $("#idCargarVideo").fadeOut(3000,function()
            {
                $("#idCargarVideo").attr("poster","app/views/default/efectos/images/video.png");
            }).fadeIn("slow");

            break;
    }
    
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
            $("#idLblTxtTitulo").removeClass("hidden");
            $("#idCmbSeccion").removeClass("hidden");
            $("#lblTitulo").removeClass("hidden");
            $("#preview").removeClass("hidden");
            $("#idTxtTitulo").removeClass("hidden");
            $("#idDescripcionNoticiaVideo").removeClass("hidden");
            $("#idContenidoNoticia").removeClass("hidden");
            $("#idRadioTipo").removeClass("col-lg-offset-2");

            $("#idLblTxtTitulo").removeAttr("disabled");
            $("#idCmbSeccion").removeAttr("disabled");
            $("#lblTitulo").removeAttr("disabled");
            $("#preview").removeAttr("disabled");
            $("#idTxtTitulo").removeAttr("disabled");
            $("#idDescripcionNoticiaVideo").removeAttr("disabled"); 
            $("#idContenidoNoticia").removeAttr("disabled");

            $("#preview").attr("class","img-responsive thumbnail");
            $("#preview").attr("style","");
            $("#file").attr("accept","image/jpeg,image/gif,image/png");
            $("#preview").html("<a href='' id='file-select' class='btn btn-success'>Elegir archivo</a><img id='idCargarImagen' src='data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTVhNTFmMTU2ZmMgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNWE1MWYxNTZmYyI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS44MDQ2ODc1IiB5PSIxMDUuMSI+MjQyeDIwMDwvdGV4dD48L2c+PC9nPjwvc3ZnPg=='>");
            $(".agregarBanner").html("");
            break;
        case "Video":
            $("#file").val("");

            $("#idLblTxtTitulo").removeClass("hidden");
            $("#idCmbSeccion").removeClass("hidden");
            $("#lblTitulo").removeClass("hidden");
            $("#preview").removeClass("hidden");
            $("#idTxtTitulo").removeClass("hidden");
            $("#idDescripcionNoticiaVideo").removeClass("hidden");
            $("#idContenidoNoticia").removeClass("hidden");
            $("#idRadioTipo").removeClass("col-lg-offset-2");

            $("#idLblTxtTitulo").removeAttr("disabled");
            $("#idCmbSeccion").removeAttr("disabled");
            $("#lblTitulo").removeAttr("disabled");
            $("#preview").removeAttr("disabled");
            $("#idTxtTitulo").removeAttr("disabled");
            $("#idDescripcionNoticiaVideo").removeAttr("disabled"); 
            $("#idContenidoNoticia").removeAttr("disabled");

            $("#preview").attr("class","img-responsive thumbnail");
            $("#file").attr("accept","video/mp4");
            $("#preview").attr("style","");
            $("#preview").html("<a href='' id='file-select' class='btn btn-success'>Elegir archivo</a><video id='idCargarVideo' width='242px' height='200px' class='img-thumbnail'><source src='' type='video/mp4'>Your browser does not support the video tag.</video>");
            $(".agregarBanner").html("");
            break;
        case "Link":
            $("#file").val("");

            $("#idLblTxtTitulo").removeClass("hidden");
            $("#idCmbSeccion").removeClass("hidden");
            $("#lblTitulo").removeClass("hidden");
            $("#preview").removeClass("hidden");
            $("#idTxtTitulo").removeClass("hidden");
            $("#idDescripcionNoticiaVideo").removeClass("hidden");
            $("#idContenidoNoticia").removeClass("hidden");
            $("#idRadioTipo").removeClass("col-lg-offset-2");

            $("#idLblTxtTitulo").removeAttr("disabled");
            $("#idCmbSeccion").removeAttr("disabled");
            $("#lblTitulo").removeAttr("disabled");
            $("#preview").removeAttr("disabled");
            $("#idTxtTitulo").removeAttr("disabled");
            $("#idDescripcionNoticiaVideo").removeAttr("disabled"); 
            $("#idContenidoNoticia").removeAttr("disabled");

            $("#preview").removeAttr("class","");
            $("#preview").html("<input type='text' name='Datos[linkNoticia]' id='idLinkNoticia' placeholder='Digitar link..'  class='form-control' required>");
            $(".agregarBanner").html("");
            break;
        case "Banner":
            $("#file").val("");

            $("#idLblTxtTitulo").addClass("hidden");
            $("#idCmbSeccion").addClass("hidden");
            $("#lblTitulo").addClass("hidden");
            $("#preview").addClass("hidden");
            $("#idTxtTitulo").addClass("hidden");
            $("#idDescripcionNoticiaVideo").addClass("hidden");
            $("#idContenidoNoticia").addClass("hidden");
            $("#idRadioTipo").addClass("col-lg-offset-2");

            $("#idLblTxtTitulo").attr("disabled", "disabled");
            $("#idCmbSeccion").attr("disabled", "disabled");
            $("#lblTitulo").attr("disabled", "disabled");
            $("#preview").attr("disabled", "disabled");
            $("#idTxtTitulo").attr("disabled", "disabled");
            $("#idDescripcionNoticiaVideo").attr("disabled", "disabled");
            $("#idContenidoNoticia").attr("disabled", "disabled");
            
            $(".agregarBanner").html("<label class='btn btn-default'><input type='checkbox' name='checkSuperior' value='Superior' id='idCheckSuperior'>Superior</label><label class='btn btn-default'><input type='checkbox' name='checkInferior' value='Inferior' id='idCheckInferior'>Inferior</label><label class='btn btn-default'><input type='checkbox' name='checkDerechoSuperior' value='derechoSuperior' id='idCheckDerechoSuperior'>Derecho Sup</label><label class='btn btn-default'><input type='checkbox' name='checkDerechoInferior' value='derechoInferior' id='idCheckDerechoInferior'>Derecho Inf</label><br><br>");
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
$(document).on("click",".idBtnRemove",function()
{
    var idNoticia = $(this).attr("value");
    $.post("app/views/default/sections/s.messages.php",{tipoModal: "eliminarRegistro"},function(data)
    {
        $("#messagges").html(data);
        $("#eliminarRegistro").unbind().modal({ backdrop: 'static', keyboard: false }).one('click', '#eliminar', function (e) 
        {
            $.ajax(
            {
                data:{idNoticia: idNoticia},
                url:   'app/controller/formAltaNoticia.php?accion=eliminarNoticia',
                type:  'post',
                success:  function (data) 
                {
                    if(data){
                        window.location.reload();
                    }
                    else
                        alert(data);
                },
                
            });
        });
    });
});
$(document).on("click",".idBtnEdit",function()
{
    var idNoticia = $(this).attr("value");
    $.ajax(
    {
        data:{idNoticia: idNoticia},
        url:   'app/controller/formAltaNoticia.php?accion=cargarDatosNoticia',
        type:  'post',
        dataType: "json",
        success:  function (datosNoticia) 
        {
            $.post("app/views/default/sections/s.messages.php",{tipoModal: "modificarNoticia", datosNoticia : datosNoticia},function(data)
            {
                $("#messagges").html(data);
                $("#modificarNoticia").modal();
            });
        },
        
    });

});
$(document).on("change","#idCheckSuperior",function(e)
{
    if($(this).is(":checked")) 
    {
        e.preventDefault();
        $("#fileSuperio").click();
        if($("#fileSuperio").val() == "")
            $(".agregarBanner").append("<div class='form-group text-center col-lg-12'><input type='text' name='Datos[linkSuperior]' placeholder='Link Superior' class='form-control' required></div>");
    }
});
$(document).on("change","#idCheckInferior",function(e)
{
    if($(this).is(":checked")) 
    {
        e.preventDefault();
        $("#fileInferior").click();
        if($("#fileInferior").val() == "")
            $(".agregarBanner").append("<div class='form-group text-center col-lg-12'><input type='text' name='Datos[linkInferior]' placeholder='Link Inferior' class='form-control' required></div>");
    }
});
$(document).on("change","#idCheckDerechoSuperior",function(e)
{
    if($(this).is(":checked")) 
    {
        e.preventDefault();
        $("#fileDS").click();
        if($("#fileDS").val() == "")
            $(".agregarBanner").append("<div class='form-group text-center col-lg-12'><input type='text' name='Datos[linkDSuperior]' placeholder='Link Derecho Sup' class='form-control' required></div>");
    }
});
$(document).on("change","#idCheckDerechoInferior",function(e)
{
    if($(this).is(":checked")) 
    {
        e.preventDefault();
        $("#fileDI").click();
        if($("#fileDI").val() == "")
            $(".agregarBanner").append("<div class='form-group text-center col-lg-12'><input type='text' name='Datos[linkDInferior]' placeholder='Link Derecho Inf' class='form-control' required></div>");
    }
});
$(".pagination").rPage();