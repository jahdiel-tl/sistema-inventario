<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Almacen
{
	
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	public function insertaralmacen($nombre, $direc, $idempresa)
	{
		$sql="insert into almacen (nombre, direccion, idempresa)
		values ('$nombre', '$direc', '$idempresa')";
		return ejecutarConsulta($sql);
	}





	//Implementamos un método para editar registros
	public function editar($idalmacen,$nombre, $direccion)
	{
		$sql="update almacen set nombre='$nombre', direccion='$direccion' where idalmacen='$idalmacen'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar almacens
	public function desactivar($idalmacen)
	{
		$sql="update almacen SET estado='0' where idalmacen='$idalmacen'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idalmacen)
	{
		$sql="update almacen SET estado='1' where idalmacen='$idalmacen'";
		return ejecutarConsulta($sql);
	}


	//validar duplicado
	public function validarAlmacen($nombre)
	{
		$sql="select * from almacen where nombre='$nombre'";
		return ejecutarConsultaSimpleFila($sql);
	}
	
	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idalmacen)
	{
		$sql="select * from almacen where idalmacen='$idalmacen'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="select * from almacen order by idalmacen";
		return ejecutarConsulta($sql);
	}

	
	//Implementar un método para listar los registros y mostrar en el select
	// public function select()
	// {
	// 	$sql="select * from almacen where estado=1 and not idalmacen='1'  order by idalmacen desc ";
	// 	return ejecutarConsulta($sql);
	// }

			//Implementar un método para listar los registros y mostrar en el select
		public function select($idempresa)
		{
			$sql="select * from almacen a inner join institucion e on a.idempresa=e.idinstitucion  where  e.idinstitucion='1' and a.estado='1' order by idalmacen";
			return ejecutarConsulta($sql);
		}

		public function selectunidad()
		{
			$sql="select * 
			from umedida 
			where estado='1'
			order by 
				case when idunidad = 58 then 0 else 1 end,
				idunidad desc;
			";
			return ejecutarConsulta($sql);
		}

		public function selectusuario()
		{
			$sql="select * from usuario where condicion='1' order by idusuario";
			return ejecutarConsulta($sql);
		}

		    public function almacenlista()
    		{

    		$sql="select * from almacen where not idalmacen='1' order by idalmacen";
   			 return ejecutarConsulta($sql);
    		}

}

?>
