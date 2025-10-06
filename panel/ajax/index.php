<?php
require_once "../modelos/Index.php";

$index=new Index();

switch ($_GET["op"])
	{

		case 'guardar_invitacion':
			$nombre = $_POST['nombre'];

			$rspta=$index->guardar_invitacion($nombre);
	 		echo json_encode($rspta);
		break;
		

	}

?>