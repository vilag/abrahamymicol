<?php

//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Index
{
	public function __construct()
	{

	}

	public function guardar_invitacion()
	{

		$sql="SELECT * FROM saldos WHERE estatus=1 ORDER BY idsaldos DESC";
		return ejecutarConsulta($sql);			
	}


}
?>