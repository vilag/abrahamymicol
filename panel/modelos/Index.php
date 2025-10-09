<?php

//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

Class Index
{
	public function __construct()
	{

	}

	public function guardar_invitacion($nombre,$lugares,$tipo)
	{

		$sql="INSERT INTO invitados (nombre,lugares,tipo) VALUES('$nombre','$lugares','$tipo')";
		return ejecutarConsulta($sql);			
	}

	public function listar_invitados()
	{

		$sql="SELECT * FROM invitados ORDER BY idinvitados DESC";
		return ejecutarConsulta($sql);			
	}

	public function suma_invitados()
	{

		$sql="SELECT sum(lugares) as total FROM invitados";
		return ejecutarConsultaSimpleFila($sql);			
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

	public function eliminar($idinvitados)
	{

		$sql="DELETE FROM invitados WHERE idinvitados='$idinvitados'";
		return ejecutarConsulta($sql);			
	}

	public function update_invitacion($idinvitados,$nombre,$lugares,$tipo)
	{

		$sql="UPDATE invitados SET nombre='$nombre', lugares='$lugares', tipo='$tipo' WHERE idinvitados='$idinvitados'";
		return ejecutarConsulta($sql);			
	}

}
?>