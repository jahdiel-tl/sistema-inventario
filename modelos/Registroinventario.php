<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Registroinv
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($ano, $codigo, $denominacion, $costoinicial, $saldoinicial, $valorinicial, $compras, $ventas, $saldofinal, $costo, $valorfinal)
	{
		$sql="insert into reginventariosanos (ano, codigo, denominacion, costoinicial, saldoinicial, valorinicial, compras, ventas, saldofinal, costo, valorfinal) 
		values
		 ('$ano', '$codigo', '$denominacion', '$costoinicial', '$saldoinicial', '$valorinicial', '$compras', '$ventas',  '$saldofinal', '$costo', '$valorfinal')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idregistro, $ano, $codigo, $denominacion, $costoinicial, $saldoinicial, $valorinicial, $compras, $ventas, $saldofinal, $costo, $valorfinal)
	{
		$sql="update reginventariosanos set 
		codigo='$codigo', 
		denominacion='$denominacion', 
		costoinicial='$costoinicial', 
		saldoinicial='$saldoinicial', 
		valorinicial='$valorinicial', 
		compras='$compras',
		ventas='$ventas', 
		saldofinal='$saldofinal',
		costo='$costo', 
		valorfinal='$valorfinal', 
		ano='$ano'  
		where idregistro='$idregistro'";
		return ejecutarConsulta($sql);
	}



	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idarticulo)
	{
		$sql="select 
		ri.idregistro,
		ri.codigo, 
		ri.denominacion, 
		ri.costoinicial, 
		ri.saldoinicial, 
		ri.valorinicial, 
		ri.compras, 
		ri.ventas, 
		ri.saldofinal, 
		ri.costo, 
		ri.valorfinal, 
		ri.ano 
		from 
		reginventariosanos ri  where ri.idregistro='$idarticulo'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros    //
	public function listar($almacen)
	{
		$sql="select 
            reg.idregistro, 
            reg.codigo, 
            reg.denominacion, 
            reg.costoinicial, 
            reg.saldoinicial, 
            reg.valorinicial, 
            reg.compras, 
            reg.ventas, 
            reg.saldofinal, 
            reg.costo, 
            reg.valorfinal, 
            reg.ano,
            alm.nombre
            from reginventariosanos  reg
            inner join articulo ar on ar.codigo=reg.codigo
            inner join almacen alm on alm.idalmacen=ar.idalmacen
            where alm.nombre='$almacen'
            order by alm.nombre, reg.ano,reg.denominacion,reg.codigo";
		return ejecutarConsulta($sql);		
	}

	public function listarAll()
	{
		$sql="select 
            reg.idregistro, 
            reg.codigo, 
            reg.denominacion, 
            reg.costoinicial, 
            reg.saldoinicial, 
            reg.valorinicial, 
            reg.compras, 
            reg.ventas, 
            reg.saldofinal, 
            reg.costo, 
            reg.valorfinal, 
            reg.ano,
            alm.nombre
            from reginventariosanos  reg
            inner join articulo ar on ar.codigo=reg.codigo
            inner join almacen alm on alm.idalmacen=ar.idalmacen
            order by alm.nombre, reg.ano,reg.denominacion,reg.codigo";
		return ejecutarConsulta($sql);		
	}
	
	public function listar_inventarioDiario($fecha_desde, $fecha_hasta, $idempresa, $tmon)
	{
		$sql="SELECT codigo,producto,stock, SUM(ingreso) AS ingreso,  SUM(salida) AS salida, (stock+SUM(salida)-SUM(ingreso))as stock_ini
        FROM (
      
  			SELECT 
            ar.codigo, 
            ar.nombre as producto, 
      		ar.stock as stock,
            0 AS ingreso,
            0 as salida 
            FROM articulo ar
      		
      		UNION
      
  			SELECT 
            ar.codigo, 
            ar.nombre as producto, 
      		ar.stock as stock,
            SUM(dc.cantidad) AS ingreso,
            0 as salida 
            FROM detalle_compra_producto dc 
            inner join articulo ar on ar.idarticulo=dc.idarticulo 
            inner join compra c on c.idcompra=dc.idcompra 
            where date_format(c.fecha, '%Y-%m-%d') between '$fecha_desde' and '$fecha_hasta'
            group by ar.codigo, ar.nombre ,ar.stock

            union
      
			select 	
                a.codigo as codigo,	
                a.nombre as producto,	
      			a.stock as stock, 
                0 as ingreso,
                sum(dnpp.cantidad_item_12) as salida 
                from  notapedido np 
                inner join persona p on np.idcliente = p.idpersona 	
                inner join empresa e on np.idempresa = e.idempresa 	
                inner join detalle_notapedido_producto dnpp on np.idboleta = dnpp.idboleta 	
                inner join articulo a on dnpp.idarticulo = a.idarticulo
            where 
              date_format(np.fecha_emision_01, '%Y-%m-%d') between '$fecha_desde' and '$fecha_hasta'
              and p.tipo_persona = 'cliente' 
              and np.estado in ('5', '3', '0', '6', '1', '4')  
              and e.idempresa = '$idempresa'
              and np.tipo_moneda_24 = '$tmon'
            group by                 
                a.codigo,	
                a.nombre,
      			a.stock
        ) AS union_result
        GROUP BY codigo,producto
        order by producto;";
		return ejecutarConsulta($sql);		
	}
	

	public function eliminar($idregistro)
	{
		$sql="delete from reginventariosanos where idregistro='$idregistro'";
		return ejecutarConsulta($sql);		
	}



}

?>