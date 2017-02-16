$("#contact-form").submit(function()
{
	var datos = {};
	datos["nombre"] = $(".name-field").val();
	datos["email"] = $(".mail-field").val();
	datos["msj"] = $(".msj").val();
	$.ajax(
	{
		data:{datos: datos},
        url:   'app/controller/formContactos.php?accion=guardarContactos',
        type:  'post',
        success: function(data)
        {
        	alert(data);
        }
	});
});