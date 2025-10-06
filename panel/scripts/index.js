function guardar_invitacion(){
    var nombre = $("#nombre_inv").val();

    $.post("ajax/index.php?op=guardar_invitacion",{nombre:nombre},function(data, status)
	{
	data = JSON.parse(data);

		

	});
}