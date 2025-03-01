<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

class Usuario
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nombre, $apellidos, $tipo_documento, $num_documento, $direccion, $telefono, $email, $cargo, $login, $clave, $imagen, $permisos, $series, $empresa)
{
    $sql="insert into usuario (nombre, apellidos, tipo_documento, num_documento, direccion, telefono, email, cargo, login, clave, imagen,idalmacen)
          values ('$nombre','$apellidos', '$tipo_documento', '$num_documento', '$direccion', '$telefono', '$email','$cargo', '$login', '$clave', '$imagen','1')";

    $idusuarionew = ejecutarConsulta_retornarID($sql);

    // Insertar en vendedorsitio SOLO si cargo es igual a 1 (Ventas)
    if ($cargo == 1) {
        $sql_vendedor="insert into vendedorsitio(nombre, estado, idinstitucion) values ('$nombre', 1, 1)";
        ejecutarConsulta($sql_vendedor);
    }

    $num_elementos = 0;
    $num_elementos2 = 0;
    $num_elementos3 = 0;

    $sw = true;

    /*while ($num_elementos < count($permisos)) {
        $sql_detalle = "insert into usuario_permiso(idusuario, idpermiso) values ('$idusuarionew', '$permisos[$num_elementos]')";
        ejecutarConsulta($sql_detalle) or $sw = false;
        $num_elementos = $num_elementos + 1;
    }

    while ($num_elementos2 < count($series)) {
        $sql_detalle_series = "insert into detalle_usuario_numeracion(idusuario, idnumeracion) values ('$idusuarionew', '$series[$num_elementos2]')";
        ejecutarConsulta($sql_detalle_series) or $sw = false;
        $num_elementos2 = $num_elementos2 + 1;
    }

    while ($num_elementos3 < count($empresa)) {
        $sql_usuario_empresa = "insert into usuario_institucion(idusuario, idinstitucion) values ('$idusuarionew', '$empresa[$num_elementos3]')";
        ejecutarConsulta($sql_usuario_empresa) or $sw = false;
        $num_elementos3 = $num_elementos3 + 1;
    }*/

    return $sw;
}




	//Implementamos un método para editar registros
	public function editar($idusuario, $nombre, $apellidos, $tipo_documento, $num_documento, $direccion, $telefono, $email, $cargo, $login, $clave, $imagen, $permisos, $series, $empresa)
	{
		$sql = "update
		 usuario 
		 set 
		 nombre='$nombre', apellidos='$apellidos',tipo_documento='$tipo_documento', num_documento='$num_documento', direccion='$direccion', telefono='$telefono', email='$email', cargo='$cargo' , login='$login' , clave='$clave', imagen='$imagen' where idusuario='$idusuario'";
		ejecutarConsulta($sql);

		//Eliminar todos los permisos asignados para volverlos a registrar
		$sqldel = "delete from usuario_permiso where 	idusuario='$idusuario'";
		ejecutarConsulta($sqldel);

		$sqldelSeries = "delete from detalle_usuario_numeracion where idusuario='$idusuario'";
		ejecutarConsulta($sqldelSeries);

		$sqldelEmpresa = "delete from usuario_institucion where idusuario='$idusuario'";
		ejecutarConsulta($sqldelEmpresa);

		$num_elementos = 0;
		$num_elementos2 = 0;
		$num_elementos3 = 0;

		$sw = true;

		while ($num_elementos < count($permisos)) {
			$sql_detalle = "insert into usuario_permiso(idusuario, idpermiso) values ('$idusuario', '$permisos[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos = $num_elementos + 1;
		}

		while ($num_elementos2 < count($series)) {
			$sql_detalleSeries = "insert into detalle_usuario_numeracion(idusuario, idnumeracion) values ('$idusuario', '$series[$num_elementos2]')";
			ejecutarConsulta($sql_detalleSeries) or $sw = false;
			$num_elementos2 = $num_elementos2 + 1;
		}

		while ($num_elementos3 < count($empresa)) {
			$sql_Usuario_emresa = "insert into usuario_institucion(idusuario, idinstitucion) values ('$idusuario', '$empresa[$num_elementos3]')";
			ejecutarConsulta($sql_Usuario_emresa) or $sw = false;
			$num_elementos3 = $num_elementos3 + 1;
		}
		return $sw;
	}

	//Implementamos un método para desactivar usuario
	public function desactivar($idusuario)
	{
		$sql = "update usuario set condicion='0' where idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar usuario
	public function activar($idusuario)
	{
		$sql = "update usuario set condicion='1' where idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idusuario)
	{
		$sql = "select 
        		u.idusuario, 
        		u.nombre, 
        		u.apellidos,
        		u.tipo_documento, 
        		u.num_documento, 
        		u.telefono, 
        		u.email, 
        		u.cargo, 
        		u.imagen, 
        		u.login, 
        		u.idalmacen,
        		u.direccion,
        		e.nombre_razon_social, 
        		e.idinstitucion, 
        		e.nombre_comercial,
        		e.numero_ruc,
        		e.domicilio_fiscal,
        		al.nombre as alnombre,
        		u.condicion
        		from 
        		usuario u inner join almacen al on al.idalmacen=u.idalmacen
                inner join  institucion e on al.idempresa=e.idinstitucion
        		where u.idusuario='$idusuario'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql = "select 
        		u.idusuario, 
        		u.nombre, 
        		u.apellidos, 
        		u.tipo_documento, 
        		u.num_documento, 
        		u.telefono, 
        		u.email, 
        		u.cargo, 
        		u.imagen, 
        		u.login, 
        		u.idalmacen,
        		e.nombre_razon_social, 
        		e.idinstitucion, 
        		e.nombre_comercial,
        		e.numero_ruc,
        		e.domicilio_fiscal,
        		al.nombre as alnombre,
        		u.condicion
        		from 
        		usuario u inner join almacen al on al.idalmacen=u.idalmacen
                inner join  institucion e on al.idempresa=e.idinstitucion;";
		return ejecutarConsulta($sql);
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql = "select * from usuario where condicion=1";
		return ejecutarConsulta($sql);
	}

	//Implementar un metodo para listar los permisos marcados
	public function listarmarcados($idusuario)
	{
		$sql = "select * from usuario_permiso where idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}

	public function listarmarcadosEmpresa($idusuario)
	{
		$sql = "select * from usuario_institucion where idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}

	public function listarmarcadosEmpresaTodos()
	{
		$sql = "select * from usuario_institucion ";
		return ejecutarConsulta($sql);
	}

	public function listarmarcadosNumeracion($idusuario)
	{
		$sql = "select * from detalle_usuario_numeracion where idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}

	//Funcion para verificar el acceso al sistema
	public function verificar($login, $clave, $empresa)
	{
		$sql = "select 
		u.idusuario, 
		u.nombre, 
		u.tipo_documento, 
		u.num_documento, 
		u.telefono, 
		u.email, 
		u.cargo, 
		u.imagen, 
		u.login, 
		u.clave,
		u.idalmacen,
		e.nombre_razon_social, 
		e.idinstitucion, 
		e.nombre_comercial,
		e.numero_ruc,
		e.domicilio_fiscal,
		al.nombre as alnombre
		from 
		usuario u inner join almacen al on al.idalmacen=u.idalmacen
        inner join  institucion e on al.idempresa=e.idinstitucion
		where u.login='$login' and u.clave='$clave' and u.condicion='1'";

		return ejecutarConsulta($sql);
	}
		/*usuario u inner join usuario_institucion ue on u.idusuario=ue.idusuario 
		inner join institucion e on ue.idinstitucion=e.idinstitucion 
		inner join almacen al on al.idalmacen=u.idalmacen*/

	/*public function onoffTempo($st)
	{
		$sql = "update temporizador set estado='$st' where id='1' ";
		return ejecutarConsulta($sql);
	}


	public function consultatemporizador()
	{
		$sql = "select id as idtempo, tiempo, estado from temporizador where id='1' ";
		return ejecutarConsulta($sql);
	}*/


	public function savedetalsesion($idusuario)
	{
		$sql = "insert into detalle_usuario_sesion (idusuario, tcomprobante, idcomprobante, fechahora) 
      values 
      ('$idusuario', '','', now())";
		return ejecutarConsulta($sql);
	}


}

?>