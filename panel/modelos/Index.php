<?php

//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Index
{
	public function __construct()
	{

	}

	public function guardar_invitacion($nombre,$lugares)
	{

		$sql="INSERT INTO invitados (nombre,lugares) VALUES('$nombre','$lugares')";
		return ejecutarConsulta($sql);			
	}

	public function listar_invitados()
	{

		$sql="SELECT * FROM invitados ORDER BY idinvitados DESC";
		return ejecutarConsulta($sql);			
	}

	public function buscar_nombre($sub)
	{

		$sql="SELECT * FROM invitados WHERE idinvitados='$sub'";
		return ejecutarConsultaSimpleFila($sql);			
	}

	public function buscar_nombre_ku($nombre)
	{

		$sql="SELECT * FROM invitados WHERE nombre LIKE '%".$nombre."%' ORDER BY nombre ASC";
		return ejecutarConsulta($sql);			
	}


}
?>