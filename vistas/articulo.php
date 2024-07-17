<?php
/*ob_start();
session_start();
if (!isset($_SESSION["nombre"])) {
   header("Location: ../vistas/login.php");
} else {*/
   require 'header.php';
   /*if ($_SESSION['Logistica'] == 1) {*/
      ?>
                    <!-- Custom CSS -->
                    <!-- <link rel="stylesheet" href="../public/css/main.css" > -->
                    <!-- html5tooltips Styles & animations -->
                    <link href="../public/css/html5tooltips.css" rel="stylesheet">
                    <link href="../public/css/html5tooltips.animation.css" rel="stylesheet">
                    <!--Content Start-->
                    <div class="">
                       <div class="">
                          <div class="content-header">
                             <h1>Bienes <button class="btn btn-primary btn-sm" onclick="mostrarform(true)" data-bs-toggle="modal"
                                data-bs-target="#modalAgregarProducto">Agregar</button>  <button class="btn btn-success btn-sm" id="importarDatos" data-bs-toggle="modal" data-bs-target="#importararticulos">Importar Artículos</button>
                                <label style="position:relative;top: 3px; float: right;" class="toggle-switch" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Activar generador código de barra correlativamente automático">
                                <input id="generar-cod-correlativo" class="cod-correlativo" type="checkbox" checked="checked">
                                <span class="slider"></span>
                                </label>
                             </h1>
                             <button hidden class="btn btn-success btn-sm" id="refrescartabla" onclick="refrescartabla()">Refrescar tabla</button>
                          </div>
                          <div class="row">
                             <div class="col-md-12">
                                <div class="card custom-card">
                                   <div class="card-body">
                                      <div class="table-responsive">
                                         <table id="tbllistado" class="table table-striped"
                                            style="width: 100% !important;text-align: center;">
                                            <thead>
                                               <th>Opciones</th>
                                               <th>Descripción</th>
                                               <th>Marca</th>
                                               <th>Almacen</th>
                                               <th>Cod. interno</th>
                                               <th>Stock</th>
                                               <th>Precio venta</th>
                                               <th>Precio compra</th>
                                               <!-- <th>Cta. contable</th> -->
                                               <th>Imagen</th>
                                               <th>Estado</th>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                         </table>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                          <!-- /.row -->
                       </div>
                       <!-- End Container-->
                    </div>
                    <!-- End Content-->
                    <style>
                       @media (min-width: 992px) {
                       .modal-lg,
                       .modal-xl {
                       max-width: 1200px;
                       }
                       }
                       .value_fijos[readonly]{
                             color: red;
                             font-weight: bold;
                             background-color: white;
                             cursor: not-allowed;
                         }
                    </style>
                    <div class="modal fade text-left" id="modalAgregarProducto" role="dialog" aria-labelledby="myModalLabel1"
                       aria-hidden="true">
                       <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                          <div class="modal-content">
                             <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel1">Añade nuevo Bien</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                             </div>
                             <div class="modal-body">
                                <form name="formulario" id="formulario" method="POST">
                                   <div class="row">
                                      <div class="mb-3 col-lg-3">
                                         <label for="recipient-name" class="col-form-label">Ubicación Física:</label>
                                         <input type="hidden" name="idarticulo" id="idarticulo">
                                         <input type="hidden" name="idempresa" id="idempresa"
                                            value="1">
                                            <!--input type="hidden" name="idempresa" id="idempresa"
                                            value="1<?php/* echo $_SESSION['idempresa'];*/ ?>"-->
                                         <select class="form-control" name="idalmacen" id="idalmacen" required
                                            onchange="focusfamil()">
                                         </select>
                                      </div>

                                      <div class="mb-3 col-lg-3">
                                         <label for="recipient-name" class="col-form-label">Categoria:</label>
                                         <select class="form-control" name="idfamilia" id="idfamilia" required>
                                         </select>
                                      </div>

                                      <div class="mb-3 col-lg-3">
                                         <label for="recipient-name" class="col-form-label">Tipo:</label>
                                         <select class="form-control" name="tipoitem" id="tipoitem" onchange="focuscodprov()">
                                            <option value="productos"> PRODUCTO
                                            </option>
                                            <!-- <option value="servicios"  <%=selectedValue==="productos" ? "selected" : "" %>SERVICIO</option> -->
                                         </select>
                                      </div>
                                      <div class="mb-3 col-lg-3">
                                         <label for="recipient-name" class="col-form-label">U. medida:</label>
                                         <select class="form-control" name="umedidacompra" id="umedidacompra" required
                                            onchange="cinicial()">
                                         </select>
                                      </div>
                                      <div class="mb-3 col-lg-3">
                                         <label for="recipient-name" class="col-form-label">U. medida Salidas:</label>
                                         <select class="form-control" name="unidad_medida" id="unidad_medida" required
                                            onchange="costoco()">
                                         </select>
                                      </div>
                                      
                                      <!------------------------------------------------------------------------------------->
                                       <div class="mb-3 col-lg-2">
                                         <label for="recipient-name" class="col-form-label">Partida Genérica:</label>
                                         <input type="text" class="form-control" name="partida_generica" id="partida_generica"
                                            placeholder="Partida Genérica" required="true" onkeyup="mayus(this);">
                                      </div>

                                      <div class="mb-3 col-lg-2">
                                         <label for="recipient-name" class="col-form-label">Código Interno:</label>
                                         <input type="text" class="form-control" name="codigo" id="codigo"
                                            placeholder="Código Barras" required="true" onkeyup="mayus(this);" onchange="validarcodigo()">
                                      </div>
                                      
                                      <div class="mb-3 col-lg-4">
                                         <label for="recipient-name" class="col-form-label">Modelo Serie:</label>
                                         <input type="text" class="form-control" name="modelo" id="modelo" maxlength="500"
                                            placeholder="Modelo Serie" required="true" onkeyup="mayus(this);"
                                            onkeypress=" return limitestockf(event, this)">
                                      </div>
                                      <div class="mb-3 col-lg-4">
                                         <label for="recipient-name" class="col-form-label">Nombre / Descripción:</label>
                                         <input type="text" class="form-control" name="nombre" id="nombre" maxlength="500"
                                            placeholder="Nombre" required="true" onkeyup="mayus(this);">
                                      </div>
                                      <div class="mb-3 col-lg-3">
                                         <label for="recipient-name" class="col-form-label">Detalles del Producto:</label>
                                         <textarea placeholder="Detalles del Producto" class="form-control" id="descripcion" name="descripcion" rows="1" cols="70"
                                            onkeyup="mayus(this)">
                                         </textarea>
                                      </div>
                                      <div class="mb-3 col-lg-3">
                                               <label for="recipient-name" class="col-form-label">Marca:</label>
                                               <input placeholder="Marca" type="text" name="marca" id="marca" class="form-control" onkeyup="mayus(this);">
                                      </div>
                                      <div class="mb- col-lg-3">
                                               <label for="recipient-name" class="col-form-label">Color:</label>
                                               <input placeholder="Color" type="text" name="color" id="color" class="form-control" onkeyup="mayus(this);">
                                      </div>
                                      <div class="mb- col-lg-3">
                                               <label for="recipient-name" class="col-form-label">Dimensiones:</label>
                                               <input placeholder="Dimensiones" type="text" name="dimensiones" id="dimensiones" class="form-control" onkeyup="mayus(this);">
                                      </div>
                                      
                                      <div class="mb-3 col-lg-4">
                                         <label for="recipient-name" class="col-form-label">Imagen del Bien:</label>
                                         <input type="file" class="form-control" name="imagen" id="imagen" value="">
                                         <input type="hidden" name="imagenactual" id="imagenactual">
                                         <img src="" width="150px" height="120px" id="imagenmuestra">
                                         <hr>
                                         <div class="" id="preview">
                                         </div>
                                      </div>

                                      <div class="mb-3 col-lg-2">
                                         <label for="recipient-name" class="col-form-label">Cantidad de Stock:</label>
                                         <input type="text" class="form-control value_fijos" name="stock_señuelo" id="stock_señuelo" maxlength="500" value="1" readonly placeholder="1" required="true" data-tooltip="Información de este campo"
                                           data-tooltip-more="El stock sera igual al saldo final y saldo inicial (stock = saldo final = saldo inicial)."
                                           data-tooltip-stickto="top" data-tooltip-maxwidth="500"
                                           data-tooltip-animate-function="foldin" data-tooltip-color="green" style="background-color: #f8f898;">

                                         <input hidden type="text" class="form-control value_fijos" name="stock" id="stock" maxlength="500" value="1" readonly
                                           placeholder="1" required="true" data-tooltip="Información de este campo"
                                           data-tooltip-more="El stock sera igual al saldo final y saldo inicial (stock = saldo final = saldo inicial)."
                                           data-tooltip-stickto="top" data-tooltip-maxwidth="500"
                                           data-tooltip-animate-function="foldin" data-tooltip-color="green" style="background-color: #f8f898;">
                                      </div>

                                      <div class="mb-3 col-lg-2">
                                         <label for="recipient-name" class="col-form-label">Valor del Bien(Costo S/.):</label>
                                         <input type="text" class="form-control" name="costo_compra" id="costo_compra"
                                            maxlength="500" onkeypress="return focussaldoi(event, this)" style="background-color: #f8f898;" required>
                                      </div>

                                      <div class="mb-3 col-lg-3">
                                         <label for="recipient-name" class="col-form-label">Usuario Encargado del Bien:</label>
                                         <select class="form-control" name="portador" id="portador" >
                                         </select>
                                      </div>


                                      <div class="row" style="margin: 0 auto;">
                                         <div class="mb-3 col-lg-4">
                                            <input type="checkbox" id="agregarCompra" name="" value="">
                                            <label for="" style="position: relative; bottom: 5px;">Adjuntar detalles ingreso de Bien</label>
                                         </div>
                                         <div class="mb-3 col-lg-4">
                                            <input type="checkbox" id="agregarOtrosCampos" name="" value="">
                                            <label for="" style="position: relative; bottom: 5px;">Más opciones de item</label>
                                         </div>
                                       </div>

                                      <div class="row" id="mostrarCompra" style="margin: 0 auto; display: none;">
                                         <div style="margin: 0 auto;" class="row">

                                            <div class="mb-3 col-lg-4">
                                               <label for="recipient-name" class="col-form-label">Proveedor:</label>
                                               <input type="text" name="proveedor" id="proveedor" class="form-control"  onkeyup="mayus(this);">
                                            </div>

                                            <div class="mb-3 col-lg-4">
                                               <label for="recipient-name" class="col-form-label">RUC proveedor:</label>
                                               <input type="text" class="form-control" name="codigo_proveedor"
                                                  id="codigo_proveedor" placeholder="RUC de proveedor" required="" value="-"
                                                  onkeyup="mayus(this)">
                                            </div>

                                            <div class="mb-3 col-lg-2">
                                               <label for="recipient-name" class="col-form-label">Serie fac. compra:</label>
                                               <input type="text" name="seriefaccompra" id="seriefaccompra" class="form-control">
                                            </div>

                                            <div class="mb-3 col-lg-2">
                                               <label for="recipient-name" class="col-form-label">Número fac. compra:</label>
                                               <input type="text" name="numerofaccompra" id="numerofaccompra" class="form-control">
                                            </div>

                                            <div class="mb-3 col-lg-4">
                                               <label for="recipient-name" class="col-form-label">Fecha fac. compra:</label>
                                               <input type="date" name="fechafacturacompra" id="fechafacturacompra"
                                                  class="form-control" style="color:blue;">
                                            </div>

                                            <!-- <div class="mb-3 col-lg-4">
                           <label for="recipient-name" class="col-form-label">U. medida compra:</label>
                           <select class="form-control" name="umedidacompra" id="umedidacompra" required
                               onchange="cinicial()">
                           </select>
                           </div> -->
                                         </div>
                                      </div>
                                      <div class="mb-3 col-lg-4" hidden>
                                         <label for="recipient-name" class="col-form-label">Factor conversión:</label>
                                         <input type="text" class="form-control" name="factorc" id="factorc"
                                            onkeypress=" return umventa(event, this)">
                                      </div>
                                      <div class="mb-3 col-lg-4" hidden>
                                         <label for="recipient-name" class="col-form-label">Saldo inicial (S/.):</label>
                                         <input type="text" class="form-control" name="saldo_iniu" id="saldo_iniu" maxlength="500"
                                            placeholder="Saldo inicial" onBlur="calcula_valor_ini()" required="true"
                                            onkeypress="return valori(event, this)" data-tooltip="Información de este campo"
                                            data-tooltip-more="Si es la primera vez que llena este campo poner el saldo final de su inventario físico. "
                                            data-tooltip-stickto="top" data-tooltip-maxwidth="500"
                                            data-tooltip-animate-function="foldin" data-tooltip-color="green">
                                      </div>
                                      <div class="mb-3 col-lg-4" hidden>
                                         <label for="recipient-name" class="col-form-label">Valor inicial (S/.):</label>
                                         <input value="0" type="text" class="form-control" name="valor_iniu" id="valor_iniu"
                                            maxlength="500" placeholder="Valor inicial" required="true"
                                            onkeypress="return saldof(event, this)" data-tooltip="Información de este campo"
                                            data-tooltip-more="El valor inicial es el costo compra x saldo inicial."
                                            data-tooltip-stickto="top" data-tooltip-maxwidth="500"
                                            data-tooltip-animate-function="foldin" data-tooltip-color="green">
                                      </div>
                                      <div class="mb-3 col-lg-4" hidden>
                                         <label for="recipient-name" class="col-form-label">Saldo final (mts):</label>
                                         <input type="text" class="form-control" name="saldo_finu" id="saldo_finu" maxlength="500"
                                            placeholder="Saldo final" required="true" onkeypress="return valorf(event, this)"
                                            onBlur="sfinalstock()" data-tooltip="Información de este campo"
                                            data-tooltip-more="La primera vez en el registro será igual a saldo inicial (saldofinal=saldo inicial)."
                                            data-tooltip-stickto="top" data-tooltip-maxwidth="500"
                                            data-tooltip-animate-function="foldin" data-tooltip-color="green">
                                      </div>
                                      <div class="mb-3 col-lg-4" hidden>
                                         <label for="recipient-name" class="col-form-label">Valor final (S/.):</label>
                                         <input type="text" class="form-control" name="valor_finu" id="valor_finu" maxlength="500"
                                            placeholder="Valor Final" required="true" onkeypress="return st(event, this)"
                                            data-tooltip="Información de este campo"
                                            data-tooltip-more="El valor final es igual al valor incial (valor final=valor inicial)."
                                            data-tooltip-stickto="top" data-tooltip-maxwidth="500"
                                            data-tooltip-animate-function="foldin" data-tooltip-color="green">
                                      </div>
                                      <div class="mb-3 col-lg-4" hidden>
                                         <label for="recipient-name" class="col-form-label">Conversión um venta:</label>
                                         <input type="text" class="form-control" name="fconversion" id="fconversion"
                                            data-tooltip="Cantidad según factor de conversión por stock actual."
                                            data-tooltip-stickto="top" data-tooltip-maxwidth="500"
                                            data-tooltip-animate-function="foldin" data-tooltip-color="green" readonly>
                                      </div>
                                      <div class="mb-3 col-lg-4" hidden>
                                         <label for="recipient-name" class="col-form-label">Total compras (mts):</label>
                                         <input type="text" class="form-control" name="comprast" id="comprast"
                                            onkeypress="return totalv(event, this)" placeholder="No se llena" readonly
                                            data-tooltip="Información de este campo" data-tooltip-more="Este campo no se llena."
                                            data-tooltip-stickto="top" data-tooltip-maxwidth="500"
                                            data-tooltip-animate-function="foldin" data-tooltip-color="green">
                                      </div>
                                      <div class="mb-3 col-lg-4" hidden>
                                         <label for="recipient-name" class="col-form-label">Total ventas (mts):</label>
                                         <input type="text" class="form-control" name="ventast" id="ventast"
                                            onkeypress="return porta(event, this)" placeholder="No se llena" readonly
                                            data-tooltip="Información de este campo" data-tooltip-more="Este campo no se llena."
                                            data-tooltip-stickto="top" data-tooltip-maxwidth="500"
                                            data-tooltip-animate-function="foldin" data-tooltip-color="green">
                                      </div>
                                      <div class="row" id="mostraOtroscampos" style="margin: 0 auto; display: none;">
                                            
                                      </div>
                                   </div>
                             </div>
                             <div class="eventoCodigoBarra" hidden>
                             <button class="btn btn-success btn-sm" type="button" onclick="generarbarcode()">Mostrar codigo de
                             barra</button>
                             <button class="btn btn-success btn-sm" type="button" onclick="generarcodigonarti()">Asignar codigo
                             automático</button>
                             <button class="btn btn-info btn-sm" type="button" onclick="imprimir()"> <i class="fa fa-print"></i>
                             Imprimir codigos</button>
                             <input type="hidden" name="stockprint" id="stockprint">
                             <input type="hidden" name="codigoprint" id="codigoprint">
                             <input type="hidden" name="precioprint" id="precioprint">
                             <div id="print">
                             <svg id="barcode"></svg>
                             </div>
                             </div>
                             <div class="modal-footer">
                             <button onclick="cancelarform()" type="button" class="btn btn-danger" data-bs-dismiss="modal">
                             <i class="bx bx-x d-block d-sm-none"></i>
                             <span class="d-none d-sm-block">Cancelar</span>
                             </button>
                             <button id="btnGuardar" type="submit" class="btn btn-primary ml-1">
                             <i class="bx bx-check d-block d-sm-none"></i>
                             <span class="d-none d-sm-block">Agregar</span>
                             </button>
                             </div>
                             </form>
                          </div>
                       </div>
                    </div>
                    <!-- Importación de Productos -->
                    <div class="modal fade text-left" id="importararticulos" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                       <div class="modal-dialog modal-dialog-scrollable" role="document">
                          <div class="modal-content">
                             <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel1">Importar Bienes</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                             </div>
                             <div class="modal-body">
                                <form class="form" name="formularioImportar" id="formularioImportar" method="POST" action="importar.php" enctype="multipart/form-data">
                                   <div class="row">
                                      <label class="form__container" id="upload-container">
                                      <input class="form-control" id="upload-files" name="dataArticulo" type="file" style="position: relative;max-width: 420px;width: 100%; ">
                                      </label>         
                                      <div id="files-list-container"></div>
                                   </div>
                                   <div class="modal-footer">
                                      <button onclick="cancelarform()" type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                      <i class="bx bx-x d-block d-sm-none"></i>
                                      <span class="d-none d-sm-block">Cancelar</span>
                                      </button>
                                      <button id="btnGuardarImportacion" type="submit" class="btn btn-primary ml-1">
                                      <i class="bx bx-check d-block d-sm-none"></i>
                                      <span class="d-none d-sm-block">Agregar</span>
                                      </button>
                                   </div>
                                </form>
                             </div>
                          </div>
                       </div>
                    </div>
                    <script>
                       // const multipleEvents = (element, eventNames, listener) => {
                       //     const events = eventNames.split(' ');
   
                       //     events.forEach(event => {
                       //         element.addEventListener(event, listener, false);
                       //     });
                       // };
   
                       // const fileUpload = () => {
                       //     const INPUT_FILE = document.querySelector('#upload-files');
                       //     const INPUT_CONTAINER = document.querySelector('#upload-container');
   
                       //     multipleEvents(INPUT_FILE, 'click dragstart dragover', () => {
                       //         INPUT_CONTAINER.classList.add('active');
                       //     });
   
                       //     multipleEvents(INPUT_FILE, 'dragleave dragend drop change', () => {
                       //         INPUT_CONTAINER.classList.remove('active');
                       //     });
   
                       //     INPUT_FILE.addEventListener('change', () => {
                       //         const files = [...INPUT_FILE.files];
   
                       //         if (files.length > 0) {
                       //             const file = files[0];
                       //             const fileName = file.name;
                       //             const fileExtension = fileName.split(".").pop().toLowerCase();
   
                       //             // Verifica las extensiones
                       //             if (['xls', 'xlsx', 'xlsm', 'csv'].includes(fileExtension)) {
                       //                 INPUT_CONTAINER.textContent = "";
                       //                 const iconHTML = `<img src="../files/iconos/excel.png" alt="Icono Excel" class="icon-excel">`;
                       //                 const content = `
                       //                     <div class="form__files-container">
                       //                         ${iconHTML}
                       //                         <span class="form__text">${fileName}</span>
                       //                         <div class="barra-cargado"></div>
                       //                     </div>
                       //                 `;
   
                       //                 INPUT_CONTAINER.insertAdjacentHTML('beforeEnd', content);
                       //             } else {
                       //                 // Usamos Swal.fire en lugar de alert
                       //                 Swal.fire({
                       //                     icon: 'error',
                       //                     title: 'Error',
                       //                     text: 'Por favor, selecciona un archivo válido de tipo Excel.'
                       //                 });
                       //                 INPUT_FILE.value = '';
                       //             }
                       //         } else {
                       //             INPUT_CONTAINER.textContent = "Elija o Arrastre su Archivo";
                       //         }
                       //     });
                       // };
   
                       // fileUpload();
   
                   
                    </script>
                    <?php
   /*} else {
      require 'noacceso.php';
   }*/
   require 'footer.php';
   ?>
          <!-- <script type="text/javascript" src="../public/js/JsBarcode.all.min.js"></script> -->
          <script>
              document.getElementById('formularioImportar').addEventListener('submit', function (e) {
        e.preventDefault();

        const data = new FormData(this);

        fetch(this.action, {
          method: 'POST',
          body: data
        })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: 'Los datos se han importado correctamente.',
                showConfirmButton: false,
                timer: 1500
              });
              tabla.ajax.reload();
              listar();
              $('#importararticulos').modal('hide');
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: data.message || 'Ocurrió un error al importar los datos.'
              });
            }
          })
          .catch(err => {
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'Ocurrió un error al enviar el archivo.'
            });
          });
      });

      $('#importararticulos').on('hidden.bs.modal', function () {
        $('#upload-files').val('');  // Limpiar el input del archivo
      });


      $('button[data-bs-dismiss="modal"]').click(function () {
        $('#upload-files').val('');  // Limpiar el input del archivo
      });


      // Obtenemos el input
      var inputFile = document.getElementById("upload-files");
      // Definimos las extensiones permitidas
      var allowedExtensions = ["xls", "xlsx", "xlsm", "csv"];

      // Agregamos un evento de cambio al input
      inputFile.addEventListener("change", function () {
        // Obtenemos el archivo seleccionado
        var file = this.files[0];
        // Validamos la extensión del archivo
        if (!allowedExtensions.includes(file.name.split(".").pop())) {
          // Mostramos un swal de error
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Por favor, selecciona un archivo válido de tipo Excel.",
          });
          // Eliminamos el archivo del input
          inputFile.value = null;
        }
      });

          </script>
          <script type="text/javascript" src="../public/js/jquery.PrintArea.js"></script>
          <script type="text/javascript" src="scripts/articulo.js"></script>
          <script src="../public/js/html5tooltips.js"></script>
          <?php
/*}
ob_end_flush();*/
?>
