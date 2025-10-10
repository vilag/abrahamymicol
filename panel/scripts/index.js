listar_invitados();
function guardar_invitacion(){
    var nombre = $("#nombre_inv").val();
	var lugares = $("#nombre_inv_cant").val();
	var tipo = $("#tipo_invitacion").val();

	if (nombre!="" && tipo!="") {
		$.post("ajax/index.php?op=guardar_invitacion",{nombre:nombre,lugares:lugares,tipo:tipo},function(data, status)
		{
		data = JSON.parse(data);

			bootbox.alert("Registrado guardado exitosamente");
			listar_invitados();
		});
	}else{
		bootbox.alert("Porfavor captura el nombre y tipo de invitación");
	}

		
}

function suma_invitados(){
		$.post("ajax/index.php?op=suma_invitados",function(data, status)
		{
		data = JSON.parse(data);
			$("#cant_tot_inv").text(data.total);
		});
}

function listar_invitados(){

		$.post("ajax/index.php?op=listar_invitados",function(r){
	    $("#tbl_invitaciones").html(r);

	         suma_invitados();            
	    });
}

async function copiarTexto(idinvitados) {
	
	var textoACopiar = "http://abrahamymicol-wedding.site/index.php?id="+idinvitados;
	console.log(textoACopiar);
	//return;
  try {
    await navigator.clipboard.writeText(textoACopiar);
    console.log('Texto copiado al portapapeles');
	mostrar_confirm();
  } catch (err) {
    console.error('Error al copiar texto: ', err);
  }
}

function mostrar_confirm(){
	
	$("#mensaje_confirm").addClass("slide-in-blurred-top");
	setTimeout(function(){
		document.getElementById("mensaje_confirm").style.display="flex";
	}, 200);
	
	setTimeout(function(){
		document.getElementById("mensaje_confirm").style.display="none";
		$("#slide-in-blurred-top").removeClass("slide-in-blurred-top");
	}, 3000);
}


function abrir_invitacion(idinvitados){
	$("#enlace_inv").attr("href","../index.php?id="+idinvitados);
}

function abrir_registrar(){
	document.getElementById("box_registro").style.display="block";
	document.getElementById("box_busqueda").style.display="none";
}
function abrir_busqueda(){
	document.getElementById("box_registro").style.display="none";
	document.getElementById("box_busqueda").style.display="block";
}

function buscar_nombre_ku(){
	var nombre = $("#nombre_inv_buscar").val();
	$.post("ajax/index.php?op=buscar_nombre_ku&nombre="+nombre,function(r){
	$("#tbl_invitaciones").html(r);

	                     
	});
}

function eliminar(idinvitados){
	bootbox.confirm({
		message: '¿Desea eliminar este registro?',
		buttons: {
			confirm: {
				label: 'Si',
				className: 'btn-success'
			},
			cancel: {
				label: 'No',
				className: 'btn-danger'
			}
		},
		callback: function (result) {
			if (result==true) {
				$.post("ajax/index.php?op=eliminar",{idinvitados:idinvitados},function(data, status)
				{
				data = JSON.parse(data);

					bootbox.alert("Registrado borrado exitosamente");
					listar_invitados();
				});
			}
		}
	});

		
}
var dialog;
function actualizar(idinvitados, nombre, lugares, tipo){

	// prompt('This is the default prompt!', function(result){ 
	// 	console.log(result); 
	// });

	dialog = bootbox.dialog({
		message: '<div>'+
			'<div style="width: 100%; padding: 15px; display: flex; flex-direction: column; justify-content: left;">'+
				'<span>Tipo</span>'+
				'<select name="" id="nuevo_tipo_invitacion" style="height: 40px; margin-top: 5px;">'+
					'<option value="1">Personal</option>'+
					'<option value="2">Familiar</option>'+
				'</select>'+
			'</div>'+
			'<div style="width: 100%; padding: 15px; float: left;">'+
				'<span>Nombre</span>'+
				'<input type="text" value="'+nombre+'" id="nuevo_nombre_invi"></input>'+
			'</div>'+
			'<div style="width: 100%; padding: 15px; float: left;">'+
				'<span>Lugares</span>'+
				'<input type="number" value="'+lugares+'" id="nuevo_nombre_inv_cant"></input>'+
			'</div>'+
			'<div style="width: 100%; padding: 15px; float: left;">'+
				'<button onclick="cancel_update();">Cancelar</button>'+
				'<button onclick="confirm_update('+idinvitados+');">Actualizar</button>'+
			'</div>'+
		'<div>',
		closeButton: false
	});

	setTimeout(() => {
		$("#nuevo_tipo_invitacion").val(tipo);
	}, 500);

	// do something in the background
	

}

function cancel_update(){
	dialog.modal('hide');
}

function confirm_update(idinvitados){
    var nombre = $("#nuevo_nombre_invi").val();
	var lugares = $("#nuevo_nombre_inv_cant").val();
	var tipo = $("#nuevo_tipo_invitacion").val();

	if (nombre!="" && tipo!="") {
		$.post("ajax/index.php?op=update_invitacion",{idinvitados:idinvitados,nombre:nombre,lugares:lugares,tipo:tipo},function(data, status)
		{
		data = JSON.parse(data);

			bootbox.alert("Registrado actualizado exitosamente");
			listar_invitados();
			cancel_update();
		});
	}else{
		bootbox.alert("Porfavor captura el nombre y tipo de invitación");
	}

		
}