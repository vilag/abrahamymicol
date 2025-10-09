<?php
require_once "../modelos/Index.php";

$index=new Index();

switch ($_GET["op"])
	{

		case 'guardar_invitacion':
			$nombre = $_POST['nombre'];
			$lugares = $_POST['lugares'];

			$rspta=$index->guardar_invitacion($nombre,$lugares);
	 		echo json_encode($rspta);
		break;

		case 'buscar_nombre':
			$sub = $_POST['sub'];

			$rspta=$index->buscar_nombre($sub);
	 		echo json_encode($rspta);
		break;

		case 'listar_invitados':

			$rspta = $index->listar_invitados();			

			while ($reg = $rspta->fetch_object())
					{

						echo '
							
							<div style="width: 100%; padding: 10px; border: #ccc 1px solid; height: 100px; margin: 0px;">
								<div style="width: 100%; float: left; height: 50px; overflow-y: scroll;">
									<b id="txt_invitado'.$reg->idinvitados.'">'.$reg->nombre.'</b>
								</div>
								<div style="width: 100%; float: left; display: flex; justify-content: center; align-items: center;">
									<a href="" id="enlace_inv" onclick="copiarTexto('.$reg->idinvitados.');" target="_blank">
										<button style="background-color: #846f4f; border: none; border-radius: 10px; padding: 5px 25px; color: #fbfaf7; border: #ead8c4 1px solid; text-transform: uppercase;" onclick="abrir_invitacion('.$reg->idinvitados.');">Ver invitación</button>
									</a>	
									<button style="background-color: #404463ff; border: none; border-radius: 10px; padding: 5px 25px; color: #fbfaf7; border: #ead8c4 1px solid; text-transform: uppercase;" onclick="copiarTexto('.$reg->idinvitados.');">Copiar link</button>
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

						echo '
							
							<div style="width: 100%; padding: 10px; border: #ccc 1px solid; height: 100px; margin: 0px;">
								<div style="width: 100%; float: left; height: 50px; overflow-y: scroll;">
									<b id="txt_invitado'.$reg->idinvitados.'">'.$reg->nombre.'</b>
								</div>
								<div style="width: 100%; float: left; display: flex; justify-content: center; align-items: center;">
									<a href="" id="enlace_inv" onclick="copiarTexto('.$reg->idinvitados.');" target="_blank">
										<button style="background-color: #846f4f; border: none; border-radius: 10px; padding: 5px 25px; color: #fbfaf7; border: #ead8c4 1px solid; text-transform: uppercase;" onclick="abrir_invitacion('.$reg->idinvitados.');">Ver invitación</button>
									</a>	
									<button style="background-color: #404463ff; border: none; border-radius: 10px; padding: 5px 25px; color: #fbfaf7; border: #ead8c4 1px solid; text-transform: uppercase;" onclick="copiarTexto('.$reg->idinvitados.');">Copiar link</button>
								</div>
							</div>
								
						
						';
											
					}

		break;
		

	}

?>