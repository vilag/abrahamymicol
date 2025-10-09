listar_invitados();
function guardar_invitacion(){
    var nombre = $("#nombre_inv").val();
	var lugares = $("#nombre_inv_cant").val();

	if (nombre!="") {
		$.post("ajax/index.php?op=guardar_invitacion",{nombre:nombre,lugares:lugares},function(data, status)
		{
		data = JSON.parse(data);

			alert("Registrado guardado exitosamente");
			listar_invitados();
		});
	}else{
		alert("Porfavor captura el nombre de la invitación");
	}

		
}

function listar_invitados(){

		$.post("ajax/index.php?op=listar_invitados",function(r){
	    $("#tbl_invitaciones").html(r);

	                     
	    });
}

async function copiarTexto(idinvitados) {
	var textoACopiar = $("#txt_invitado"+idinvitados).text();
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
	$("#enlace_inv").attr("href","../index.html?id="+idinvitados);
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