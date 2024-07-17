<?php

require_once "../modelos/Articulo.php";

$articulo = new Articulo();

/**/
$idarticulo = isset($_POST["idarticulo"]) ? limpiarCadena($_POST["idarticulo"]) : "";
$idalmacen = isset($_POST["idalmacen"]) ? limpiarCadena($_POST["idalmacen"]) : "";
$idfamilia = isset($_POST["idfamilia"]) ? limpiarCadena($_POST["idfamilia"]) : "";

/**/
$umedidacompra = isset($_POST["umedidacompra"]) ? limpiarCadena($_POST["umedidacompra"]) : "";
$unidad_medida = isset($_POST["unidad_medida"]) ? limpiarCadena($_POST["unidad_medida"]) : "";

/**/
$partida_generica = isset($_POST["partida_generica"]) ? limpiarCadena($_POST["partida_generica"]) : "";
$codigo = isset($_POST["codigo"]) ? limpiarCadena($_POST["codigo"]) : "";

/**/
$modelo = isset($_POST["modelo"]) ? limpiarCadena($_POST["modelo"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";
$marca = isset($_POST["marca"]) ? limpiarCadena($_POST["marca"]) : "";
$color = isset($_POST["color"]) ? limpiarCadena($_POST["color"]) : "";
$dimensiones = isset($_POST["dimensiones"]) ? limpiarCadena($_POST["dimensiones"]) : "";
$stock = isset($_POST["stock"]) ? limpiarCadena($_POST["stock"]) : "";
$costo_compra = isset($_POST["costo_compra"]) ? limpiarCadena($_POST["costo_compra"]) : "";
$portador = isset($_POST["portador"]) ? limpiarCadena($_POST["portador"]) : "";
$codigo_proveedor = isset($_POST["codigo_proveedor"]) ? limpiarCadena($_POST["codigo_proveedor"]) : "";
$seriefaccompra = isset($_POST["seriefaccompra"]) ? limpiarCadena($_POST["seriefaccompra"]) : "";
$numerofaccompra = isset($_POST["numerofaccompra"]) ? limpiarCadena($_POST["numerofaccompra"]) : "";
$fechafacturacompra = isset($_POST["fechafacturacompra"]) ? limpiarCadena($_POST["fechafacturacompra"]) : "";

/*----------------------------------------*/
$costoinicial = isset($_POST["costoinicial"]) ? limpiarCadena($_POST["costoinicial"]) : "";
$saldo_iniu = isset($_POST["saldo_iniu"]) ? limpiarCadena($_POST["saldo_iniu"]) : "";
$valor_iniu = isset($_POST["valor_iniu"]) ? limpiarCadena($_POST["valor_iniu"]) : "";
$ventast = isset($_POST["ventast"]) ? limpiarCadena($_POST["ventast"]) : "";
$saldo_finu = isset($_POST["saldo_finu"]) ? limpiarCadena($_POST["saldo_finu"]) : "";
$valor_finu = isset($_POST["valor_finu"]) ? limpiarCadena($_POST["valor_finu"]) : "";
$ano = isset($_POST["ano"]) ? limpiarCadena($_POST["ano"]) : "";



if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = '';
}

if ($action == 'GenerarCodigo') {
	$generatedCode = $articulo->GenerarCodigoCorrelativoAutomatico();

	$results = array(
		"codigo" => $generatedCode
	);

	header('Content-type: application/json');
	echo json_encode($results);
}




require_once "../modelos/Rutas.php";
$rutas = new Rutas();
$Rrutas = $rutas->mostrar2("1");
$Prutas = $Rrutas->fetch_object();
$rutaimagen = $Prutas->rutaarticulos; // ru






switch ($_GET["op"]) {

	case 'guardaryeditar':



		if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {

			$imagen = $_POST["imagenactual"];

		} else {

			$ext = explode(".", $_FILES["imagen"]["name"]);

			if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png") {

				$imagen = round(microtime(true)) . '.' . end($ext);

				//move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/articulos/" . $imagen);
				move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaimagen . $imagen);

			}

		}



		if (empty($idarticulo)) {

			$rspta = $articulo->insertar(
				$idarticulo,
				$idalmacen,
				$idfamilia,
				$umedidacompra,
				$unidad_medida,
				$partida_generica,
				$codigo,
				$modelo,
				html_entity_decode($nombre, ENT_QUOTES | ENT_HTML401, 'UTF-8'),
				$descripcion,
				$marca,
				$color,
				$dimensiones,
				$imagen,
				$stock,
				$costo_compra,
				$portador,
				$codigo_proveedor,
				$seriefaccompra,
				$numerofaccompra,
				$fechafacturacompra,
				/**/
				$costoinicial,
				$saldo_iniu,
				$valor_iniu,
				$ventast,
				$saldo_finu,
				$valor_finu,
				$ano
			);

			echo $rspta ? "Artículo registrado" : "Error";

		} else {

			$rspta = $articulo->editar(
				$idarticulo,//auto incremental
				$idalmacen,
				$idfamilia,
				$umedidacompra,
				$unidad_medida,
				$partida_generica,
				$codigo_proveedor,//partida generica
				$codigo,
				html_entity_decode($nombre, ENT_QUOTES | ENT_HTML401, 'UTF-8'),
				$descripcion,//detalles del producto
				$marca,
				$imagen,
				$stock,
				$costo_compra,
				$valor_venta,
				$proveedor,
				$saldo_iniu,//date secundary
				$valor_iniu,
				$saldo_finu,
				$valor_finu,
				$comprast,
				$ventast,
				$portador,
				$merma,
				$codigosunat,
				$ccontable,
				//$precio2,
				//$precio3,
				$cicbper,
				$nticbperi,
				$ctticbperi,
				$mticbperu,
				//$codigott,
				//$desctt,
				//$codigointtt,
				//$nombrett,
				$lote,
				$fechafabricacion,
				$fechavencimiento,
				$procedencia,
				$fabricante,
				$registrosanitario,
				$fechaingalm,
				$fechafinalma,
				$seriefaccompra,
				$numerofaccompra,
				$fechafacturacompra,
				//$limitestock,
				$factorc
			);

			echo $rspta ? "Artículo actualizado" : "Artículo no se pudo actualizar";

		}

		break;

	case 'editarstockarticulo':

		$idarticuloproduct = isset($_POST["idarticuloproduct"]) ? limpiarCadena($_POST["idarticuloproduct"]) : "";
		$stockproduct = isset($_POST["stockproduct"]) ? limpiarCadena($_POST["stockproduct"]) : "";

		$rspta = $articulo->editarStockArticulo($idarticuloproduct, $stockproduct);

		echo $rspta ? "Stock del artículo actualizado" : "Stock del artículo no se pudo actualizar";

		break;

	case 'guardarnuevoarticulo':

		if (empty($idarticulo)) {
			$rspta = $articulo->insertar(
				$idalmacennarticulo,
				'',
				$codigonarticulonarticulo,
				html_entity_decode($nombrenarticulo, ENT_QUOTES | ENT_HTML401, 'UTF-8'),
				$idfamilianarticulo,
				$umedidanp,
				'',
				$stocknarticulo,
				'',
				$stocknarticulo,
				'',
				$stocknarticulo,
				'',
				'',
				'',
				'',
				$precioventanarticulo,
				'',
				//VA IMAGEN
				'',
				'',
				$precioventanarticulo,
				$precioventanarticulo,
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'0',
				$tipoitemnarticulo,
				$umedidanp,
				'1',
				$descripcionnarticulo

			);
		}

		echo $rspta ? "Artículo registrado" : "Error";
		break;



	case 'desactivar':

		$rspta = $articulo->desactivar($idarticulo);

		echo $rspta ? "Artículo Desactivado" : "Artículo no se puede desactivar";

		break;





	case 'activar':

		$rspta = $articulo->activar($idarticulo);

		echo $rspta ? "Artículo activado" : "Artículo no se puede activar";

		break;


	case 'mostrar':
		$rspta = $articulo->mostrar($idarticulo);
		$codigoExistente = $rspta['codigo']; // Obtén el código existente de la consulta

		// Llama a la función con el código existente
		$generatedCode = $articulo->GenerarCodigoCorrelativoAutomatico($codigoExistente);

		// Otros procesos de mostrar...
		echo json_encode($rspta);
		break;






	case 'mostrarequivalencia':



		require_once "../modelos/Almacen.php";

		$almacen = new Almacen();

		$idmm = $_GET['iduni'];

		$rspta = $almacen->selectunidadid($idmm);

		//Codificar el resultado utilizando json

		echo json_encode($rspta);

		break;







	case 'validarcodigo':





		$coddd = $_GET['cdd'];

		$rspta = $articulo->validarcodigo($coddd);

		//Codificar el resultado utilizando json

		echo json_encode($rspta);

		break;





	case 'articuloBusqueda':

		$codigo = $_GET['codigoa'];

		$rspta = $articulo->articuloBusqueda($codigo);

		//Codificar el resultado utilizando json

		echo json_encode($rspta);

		break;


	case 'listar':

		$idempresa = "1";
		$rspta = $articulo->listar($idempresa);
		$url = '../reportes/printbarcode.php?codigopr=';
		//Vamos a declarar un array

		$data = array();



		while ($reg = $rspta->fetch_object()) {
			$data[] = array(
				"0" => ($reg->estado) ? '<div class="btn-group mb-1">
					<div class="dropdown">
							<button type="button" class="btn btn-wave waves-effect waves-light btn-sm btn-primary-light btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Opciones
							</button>
							<div class="dropdown-menu" style="">
									<a class="dropdown-item" href="' . $url . $reg->partida_generica . '&st=' . $reg->st2 . '&pr=' . $reg->costo_compra . '">Código de barra</a>
									<a class="dropdown-item" onclick="mostrar(' . $reg->idarticulo . ')" >Editar artículo</a>
									<a class="dropdown-item" onclick="desactivar(' . $reg->idarticulo . ')" >Desactivar articulo</a>
							</div>
					</div>
		    </div> ' :

					'
								<div class="btn-group mb-1">
									<div class="dropdown">
											<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Opciones
											</button>
											<div class="dropdown-menu" style="">
													<a class="dropdown-item" href="' . $url . $reg->partida_generica . '&st=' . $reg->st2 . '&pr=' . $reg->costo_compra . '">Código de barra</a>
													<a class="dropdown-item" onclick="mostrar(' . $reg->idarticulo . ')" >Editar artículo</a>
													<a class="dropdown-item" onclick="activar(' . $reg->idarticulo . ')" >Activar articulo</a>
											</div>
									</div>
						    </div> '
				,



				"1" => $reg->nombre,
 				"2" => $reg->marca,
				"3" => $reg->nombreal,
				"4" => $reg->partida_generica,
				"5" => $reg->stock,
				"6" => $reg->costo_compra,
				"7" => $reg->costo_compra,
				"8" => ($reg->imagen == "") ? "<img src='../files/articulos/simagen.png' height='60px' width='60px'>" :
					"<img src='$rutaimagen$reg->imagen' height='60px' width='60px'>",
				"9" => ($reg->estado) ? '<span class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-success-light">A</span>
 				' :
					'<span class="label bg-red">I</span>'
			);

		}

		$results = array(
			"sEcho" => 1,
			//Información para el datatables
			"iTotalRecords" => count($data),
			//enviamos el total registros al datatable
			"iTotalDisplayRecords" => count($data),
			//enviamos el total registros a visualizar
			"aaData" => $data
		);
		echo json_encode($results);

		break;



	case 'listarservicios':

		$idempresa = "1";
		$rspta = $articulo->listarservicios($idempresa);
		$url = '../reportes/printbarcode.php?codigopr=';
		//Vamos a declarar un array

		$data = array();



		while ($reg = $rspta->fetch_object()) {
			$data[] = array(
				"0" => ($reg->estado) ? '<div class="btn-group mb-1">
					<div class="dropdown">
							<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Opciones
							</button>
							<div class="dropdown-menu" style="">
									<a class="dropdown-item" href="' . $url . $reg->codigo . '&st=' . $reg->st2 . '&pr=' . $reg->precio . '">Código de barra</a>
									<a class="dropdown-item" onclick="mostrar(' . $reg->idarticulo . ')" >Editar servicio</a>
									<a class="dropdown-item" onclick="desactivar(' . $reg->idarticulo . ')" >Desactivar servicio</a>
							</div>
					</div>
		    </div>' :

					'
								<div class="btn-group mb-1">
									<div class="dropdown">
											<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Opciones
											</button>
											<div class="dropdown-menu" style="">
													<a class="dropdown-item" href="' . $url . $reg->codigo . '&st=' . $reg->st2 . '&pr=' . $reg->precio . '">Código de barra</a>
													<a class="dropdown-item" onclick="mostrar(' . $reg->idarticulo . ')" >Editar servicio</a>
													<a class="dropdown-item" onclick="desactivar(' . $reg->idarticulo . ')" >Activar servicio</a>
											</div>
									</div>
						    </div>',

				"1" => $reg->nombre,
				"2" => $reg->nombreal,
				"3" => $reg->codigo,
				//"4"=>$reg->stock,
				"4" => $reg->precio,
				//"6"=>$reg->ccontable ,
				// "7"=>($reg->imagen=="")?"<img src='../files/articulos/simagen.png' height='35px' width='35px'>":
				// "<img src='$rutaimagen$reg->imagen' height='35px' width='35px'>",
				"5" => ($reg->estado) ? '<span class="label bg-green">A</span>
 				' :
					'<span class="label bg-red">I</span>'
			);

		}

		$results = array(
			"sEcho" => 1,
			//Información para el datatables
			"iTotalRecords" => count($data),
			//enviamos el total registros al datatable
			"iTotalDisplayRecords" => count($data),
			//enviamos el total registros a visualizar
			"aaData" => $data
		);
		echo json_encode($results);

		break;





	case 'inventarioValorizado':

		$rspta = $articulo->listar();

		//Vamos a declarar un array

		$data = array();



		while ($reg = $rspta->fetch_object()) {

			$data[] = array(

				"0" => ($reg->estado) ? '<button class="btn btn-warning" onclick="mostrar(' . $reg->idarticulo . ')"> <i class="fa fa-pencil"> </i> </button>' .

					' <button class="btn btn-danger" onclick="desactivar(' . $reg->idarticulo . ')">   <i class="fa fa-close"></i>   </button>' :



					'<button class="btn btn-warning" onclick="mostrar(' . $reg->idarticulo . ')">      <i class="fa fa-pencil"></i> </button>' .

					' <button class="btn btn-primary" onclick="activar(' . $reg->idarticulo . ')">     <i class="fa fa-check"></i>   </button>',



				"1" => $reg->codigo_proveedor,

				"2" => $reg->codigo,

				"3" => $reg->familia,

				"4" => $reg->nombre,

				"5" => $reg->stock,

				"6" => $reg->precio,



				"7" => "<img src='../files/articulos/" . $reg->imagen . "' height='60px' width='60px' >",

				"8" => ($reg->estado) ? '<span class="label bg-green">A</span>' :

					'<span class="label bg-red">I</span>'

			);

		}

		$results = array(

			"sEcho" => 1,
			//Información para el datatables

			"iTotalRecords" => count($data),
			//enviamos el total registros al datatable

			"iTotalDisplayRecords" => count($data),
			//enviamos el total registros a visualizar

			"aaData" => $data
		);

		echo json_encode($results);



		break;



	case "selectFamilia":
		require_once "../modelos/Familia.php";
		$familia = new Familia();
		$rspta = $familia->select();

		while ($reg = $rspta->fetch_object()) {
			echo '<option value=' . $reg->idfamilia . '>' . $reg->descripcion . '</option>';
		}
		break;





	case "selectAlmacen":

		require_once "../modelos/Almacen.php";

		$almacen = new Almacen();

		$idempresa = "1";

		$rspta = $almacen->select($idempresa);

		while ($reg = $rspta->fetch_object()) {

			echo '<option value='.$reg->idalmacen.'>' . $reg->nombre . '</option>';

		}

		break;

	case "selectPortador":

		require_once "../modelos/Almacen.php";

		$almacen = new Almacen();

		$rspta = $almacen->selectusuario();

		while ($reg = $rspta->fetch_object()) {

			echo '<option value='.$reg->idusuario.'>' . $reg->nombre . '</option>';

		}

		break;



	case "selectUnidad":

		require_once "../modelos/Almacen.php";

		$almacen = new Almacen();

		$rspta = $almacen->selectunidad();

		while ($reg = $rspta->fetch_object()) {

			echo '<option value=' . $reg->idunidad . '>' . $reg->nombreum . ' | ' . $reg->abre . '</option>';

		}

		break;



	case 'buscararticulo':

		$key = $_POST['key'];

		$rspta = $articulo->buscararticulo($key);

		echo json_encode($rspta); // ? "Cliente ya existe": "Documento valido";

		break;



	case "comboarticulo":
		$anor = $_GET['anor'];
		$alm = $_GET['aml'];
		$rpta = $articulo->comboarticulo($anor, $alm);
		while ($reg = $rpta->fetch_object()) {
			echo '<option value=' . $reg->codigo . '>' . $reg->codigo . ' | ' . $reg->nombre . '     | Año registro: ' . $reg->anoregistro . '</option>';
		}
		break;



	case "comboarticulomg":
		$alm = $_GET['aml'];
		$anor = $_GET['anor'];
		$rpta = $articulo->comboarticulo($anor, $alm);
		while ($reg = $rpta->fetch_object()) {

			echo '<option value=' . $reg->idarticulo . '>' . $reg->codigo . ' | ' . $reg->nombre . '     | Año registro: ' . $reg->anoregistro . '</option>';

		}

		break;


	case "comboarticulokardex":
		//$anor=$_GET['anor'];
		$rpta = $articulo->comboarticuloKardex();
		while ($reg = $rpta->fetch_object()) {
			echo '<option value=' . $reg->codigo . '>' . $reg->codigo . ' | ' . $reg->nombre . '</option>';
		}
		break;



	// case "insertarArticulosMasivo":
	// 	// Recoger los datos del formulario (por ejemplo, desde $_POST)
	// 	$codigo = $_POST['codigo'];
	// 	$familia_descripcion = $_POST['familia_descripcion'];
	// 	$nombre = $_POST['nombre'];
	// 	$marca = $_POST['marca'];
	// 	$descrip = $_POST['descrip'];
	// 	$costo_compra = $_POST['costo_compra'];
	// 	$precio_venta = $_POST['precio_venta'];
	// 	$stock = $_POST['stock'];
	// 	$saldo_iniu = $_POST['saldo_iniu'];
	// 	$valor_iniu = $_POST['valor_iniu'];
	// 	$tipoitem = $_POST['tipoitem'];
	// 	$codigott = $_POST['codigott'];
	// 	$desctt = $_POST['desctt'];
	// 	$codigointtt = $_POST['codigointtt'];
	// 	$nombrett = $_POST['nombrett'];
	// 	$nombre_almacen = $_POST['nombre_almacen'];
	// 	$saldo_finu = $_POST['saldo_finu'];

	// 	// Llama al método del modelo
	// 	$rspta = $articulo->insertarArticulosMasivo(
	// 		$codigo,
	// 		$familia_descripcion,
	// 		$nombre,
	// 		$marca,
	// 		$descrip,
	// 		$costo_compra,
	// 		$precio_venta,
	// 		$stock,
	// 		$saldo_iniu,
	// 		$valor_iniu,
	// 		$tipoitem,
	// 		$codigott,
	// 		$desctt,
	// 		$codigointtt,
	// 		$nombrett,
	// 		$nombre_almacen,
	// 		$saldo_finu
	// 	);

	// 	echo $rspta ? "Artículos insertados exitosamente" : "Error al insertar artículos";
	// 	break;


}

?>