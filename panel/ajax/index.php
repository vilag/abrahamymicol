<?php
require_once "../modelos/Index.php";

$index=new Index();

switch ($_GET["op"])
	{

		case 'guardar_invitacion':
			$nombre = $_POST['nombre'];
			$lugares = $_POST['lugares'];
			$tipo = $_POST['tipo'];

			$rspta=$index->guardar_invitacion($nombre,$lugares,$tipo);
	 		echo json_encode($rspta);
		break;

		case 'buscar_nombre':
			$sub = $_POST['sub'];

			$rspta=$index->buscar_nombre($sub);
	 		echo json_encode($rspta);
		break;

		case 'suma_invitados':
	

			$rspta=$index->suma_invitados();
	 		echo json_encode($rspta);
		break;

		case 'listar_invitados':

			$rspta = $index->listar_invitados();			

			while ($reg = $rspta->fetch_object())
					{
						if ($reg->tipo==1) {
							$tipo = "Personal";
						}
						if ($reg->tipo==2) {
							$tipo = "Familiar";
						}
						if ($reg->tipo==3) {
							$tipo = "Pareja";
						}

						echo '
							
							<div style="width: 100%; padding: 10px; border: #ccc 1px solid; height: 220px; margin: 0px; overflow: scroll; font-size: 12px;">
								<div style="width: 100%; float: left; height: 90px; overflow-y: scroll;">
									Tipo: <b id="txt_tipo'.$reg->idinvitados.'">'.$tipo.'</b><br><br>
									Nombre: <b id="txt_invitado'.$reg->idinvitados.'">'.$reg->nombre.'</b><br><br>
									Lugares: <b id="txt_lugares'.$reg->idinvitados.'">'.$reg->lugares.'</b>
								</div>
								<div style="width: 100%; float: left; display: flex; justify-content: center; align-items: center;">
									<a href="" id="enlace_inv" onclick="copiarTexto('.$reg->idinvitados.');" target="_blank">
										<button style="margin: 5px; background-color: #085454ff; border: none; border-radius: 10px; padding: 5px 25px; color: #fbfaf7; border: #ead8c4 1px solid; text-transform: uppercase;" onclick="abrir_invitacion('.$reg->idinvitados.');">Ver invitación</button>
									</a>	
									<button style="margin: 5px; background-color: #404463ff; border: none; border-radius: 10px; padding: 5px 25px; color: #fbfaf7; border: #ead8c4 1px solid; text-transform: uppercase;" onclick="copiarTexto('.$reg->idinvitados.');">Copiar link</button><br>
									
								</div>
								<div style="width: 100%; float: left; display: flex; justify-content: center; align-items: center;">
									<button style="margin: 5px; background-color: #122558ff; border: none; border-radius: 10px; padding: 5px 25px; color: #fbfaf7; border: #ead8c4 1px solid; text-transform: uppercase;" onclick="actualizar('.$reg->idinvitados.',\''.$reg->nombre.'\',\''.$reg->lugares.'\',\''.$reg->tipo.'\');">Actualizar</button>
									<button style="margin: 5px; background-color: #820202ff; border: none; border-radius: 10px; padding: 5px 25px; color: #fbfaf7; border: #ead8c4 1px solid; text-transform: uppercase;" onclick="eliminar('.$reg->idinvitados.');">Eliminar</button>
								</div>
							</div>
								
						
						';
											
					}

		break;

		case 'buscar_nombre_ku':

			$nombre = $_GET['nombre'];

			$rspta = $index->buscar_nombre_ku($nombre);			

			while ($reg = $rspta->fetch_object())
					{
						if ($reg->tipo==1) {
							$tipo = "Personal";
						}
						if ($reg->tipo==2) {
							$tipo = "Familiar";
						}

						echo '
							
							<div style="width: 100%; padding: 10px; border: #ccc 1px solid; height: 220px; margin: 0px; overflow: scroll; font-size: 12px;">
								<div style="width: 100%; float: left; height: 90px; overflow-y: scroll;">
									Tipo: <b id="txt_tipo'.$reg->idinvitados.'">'.$tipo.'</b><br><br>
									Nombre: <b id="txt_invitado'.$reg->idinvitados.'">'.$reg->nombre.'</b><br><br>
									Lugares: <b id="txt_lugares'.$reg->idinvitados.'">'.$reg->lugares.'</b>
								</div>
								<div style="width: 100%; float: left; display: flex; justify-content: center; align-items: center;">
									<a href="" id="enlace_inv" onclick="copiarTexto('.$reg->idinvitados.');" target="_blank">
										<button style="margin: 5px; background-color: #085454ff; border: none; border-radius: 10px; padding: 5px 25px; color: #fbfaf7; border: #ead8c4 1px solid; text-transform: uppercase;" onclick="abrir_invitacion('.$reg->idinvitados.');">Ver invitación</button>
									</a>	
									<button style="margin: 5px; background-color: #404463ff; border: none; border-radius: 10px; padding: 5px 25px; color: #fbfaf7; border: #ead8c4 1px solid; text-transform: uppercase;" onclick="copiarTexto('.$reg->idinvitados.');">Copiar link</button><br>
									
								</div>
								<div style="width: 100%; float: left; display: flex; justify-content: center; align-items: center;">
									<button style="margin: 5px; background-color: #122558ff; border: none; border-radius: 10px; padding: 5px 25px; color: #fbfaf7; border: #ead8c4 1px solid; text-transform: uppercase;" onclick="actualizar('.$reg->idinvitados.',\''.$reg->nombre.'\',\''.$reg->lugares.'\',\''.$reg->tipo.'\');">Actualizar</button>
									<button style="margin: 5px; background-color: #820202ff; border: none; border-radius: 10px; padding: 5px 25px; color: #fbfaf7; border: #ead8c4 1px solid; text-transform: uppercase;" onclick="eliminar('.$reg->idinvitados.');">Eliminar</button>
								</div>
							</div>
								
						
						';
											
					}

		break;

		case 'eliminar':
			$idinvitados = $_POST['idinvitados'];

			$rspta=$index->eliminar($idinvitados);
	 		echo json_encode($rspta);
		break;
		
		case 'update_invitacion':
			$idinvitados = $_POST['idinvitados'];
			$nombre = $_POST['nombre'];
			$lugares = $_POST['lugares'];
			$tipo = $_POST['tipo'];

			$rspta=$index->update_invitacion($idinvitados,$nombre,$lugares,$tipo);
	 		echo json_encode($rspta);
		break;

	}

?>