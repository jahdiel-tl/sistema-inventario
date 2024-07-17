<?php
//Activamos el almacenamiento del Buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"])) {
  header("Location: ../vistas/login.php");
} else {
  require 'header.php';

  if ($_SESSION['Logistica'] == 1) {

    ?>
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> -->
        <div class="content-start transition">
              <div class="container-fluid dashboard">
                <div class="content-header">
                  <h1>Inventario anual 
                    <button class="btn btn-primary btn-sm" onclick="mostrarform(true)" data-bs-toggle="modal" data-bs-target="#agregarinventario"> Agregar</button>
                    <button class="btn btn-danger btn-sm" type="button" id="btn_rptExportarInventario" data-toggle="tooltip" title="Exportar a PDF"> Exportar a PDF</button>
                    
                    <div class="searchBox" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Almacen">
                        <label for="almacenlista" class="form-label">Almacen:</label>
                        <select name="almacenlista" id="almacenlista" class="form-select">
                        </select>
                    </div>
                    
                  </h1>
                </div>

                <div class="row">

                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-body">

                        <div class="table-responsive">
                          <table id="tbllistado" class="table table-striped" style="width: 100% !important;">
                            <thead>
                              <tr>
                                    <th>OPCIONES</th>
                                    <th>AÑO</th>
                                    <th>CODIGO</th>
                                    <th>DENOMINACION</th>
                                    <th>COSTO INICIAL</th>
                                    <th>SALDO INICIAL</th>
                                    <th>VALOR INICIAL</th>
                                    <th>COMPRAS</th>
                                    <th>VENTAS</th>
                                    <th>SALFO FINAL</th>
                                    <th>COSTO</th>
                                    <th>VALOR FINAL</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>

                              </tr>
                            </tbody>
                          </table>

                        </div>
                      </div>
                    </div>
                  </div>



                </div><!-- /.row -->


              </div><!-- End Container-->
            </div><!-- End Content-->


            <div class="modal fade text-left" id="agregarinventario" tabindex="-1" role="dialog" aria-labelledby="agregarinventario" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="agregarinventario">Agregar inventario anual</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form name="formulario" id="formulario" method="POST">
                      <div class="row">
                      <div class="mb-3 col-lg-3">
                          <label for="message-text" class="col-form-label">Año:</label>
                          <input type="hidden" name="idregistro" id="idregistro">
                          <input type="ano" id="ano" name="ano" class="form-control">
                        </div>

                        <div class="mb-3 col-lg-3">
                          <label for="message-text" class="col-form-label">Codigo:</label>
                          <input type="text" class="form-control" name="codigo" id="codigo">
                        </div>

                        <div class="mb-3 col-lg-3">
                          <label for="recipient-name" class="col-form-label">Descripcion:</label>
                          <input type="text" class="form-control" name="denominacion" id="denominacion">
                        </div>
                        <div class="mb-3 col-lg-3">
                          <label for="message-text" class="col-form-label">Costo inicial:</label>
                          <input type="text" class="form-control" name="costoinicial" id="costoinicial">
                        </div>
               

                        <div class="mb-3 col-lg-3">
                          <label for="message-text" class="col-form-label">Saldo inicial:</label>
                          <input type="text" class="form-control" name="saldoinicial" id="saldoinicial">
                        </div>

                        <div class="mb-3 col-lg-3">
                          <label for="message-text" class="col-form-label">Valor inicial:</label>
                          <input type="text" class="form-control" name="valorinicial" id="valorinicial">
                        </div>

                        <div class="mb-3 col-lg-3">
                          <label for="message-text" class="col-form-label">Compras:</label>
                          <input type="text" class="form-control" name="compras" id="compras">
                        </div>

                        <div class="mb-3 col-lg-3">
                          <label for="message-text" class="col-form-label">Ventas:</label>
                          <input type="text" class="form-control" name="ventas" id="ventas">
                        </div>

                        <div class="mb-3 col-lg-3">
                          <label for="message-text" class="col-form-label">Saldo Final:</label>
                          <input type="text" class="form-control" name="saldofinal" id="saldofinal">
                        </div>

                        <div class="mb-3 col-lg-3">
                          <label for="message-text" class="col-form-label">Costo:</label>
                          <input type="text" class="form-control" name="costo" id="costo">
                        </div>

                        <div class="mb-3 col-lg-3">
                          <label for="message-text" class="col-form-label">Valor final:</label>
                          <input type="text" class="form-control" name="valorfinal" id="valorfinal">
                        </div>

                
    

                      </div>           
                          

                  </div>
                  <div class="modal-footer">
                    <button onclick="cancelarform()" type="button" class="btn btn-danger" data-bs-dismiss="modal">
                      <i class="bx bx-x d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Cancelar</span>
                    </button>
                    <button id="btnGuardar" type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                      <i class="bx bx-check d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Agregar</span>
                    </button>
                  </div>
                  </form>
                </div>
              </div>
            </div>


        <?php
  } else {
    require 'noacceso.php';
  }

  require 'footer.php';
  ?>
    <script type="text/javascript" src="scripts/registroinventario.js"></script>
    <script>
      $(document).ready(function () {
          
        $("#btn_rptExportarInventario").on("click", function () {
            var url = "../ajax/ajaxReporteInventario.php?action=ListarReporteInventario";

            var settings = {
              "url": url,
              "method": "GET",
              "timeout": 0,
            };

            // Define un array para almacenar las filas de la tabla
            var rows = [];

            $.ajax(settings).done(function (response) {
              var data = response.aaData;

              // Inicializa variables para calcular las sumas
 
              var sumvalorfinal = 0;

              // Define la estructura del documento PDF con una tabla
              var docDefinition = {
                //pageOrientation: 'landscape',
                pageOrientation: 'Portrait',
                content: [
                  { text: 'Reporte de Inventario y Valorizado', style: 'header' },
                  {
                    style: 'tableExample',
                    table: {
                      headerRows: 1,
                      //body: [['Año', 'codigo', 'denominacion', 'costoinicial', 'saldoinicial', 'valorinicial', 'compras', 'ventas', 'saldofinal', 'costo', 'valorfinal']],
                      body: [['Año', 'codigo', 'denominacion','costo',  'saldoinicial', 'saldofinal', 'Almacen' ]],
                    },
                    layout: 'lightHorizontalLines',
                    fontSize: 7,
                  },
                ],
                styles: {
                  header: {
                    fontSize: 14,
                    bold: true,
                  },
                  tableExample: {
                    margin: [0, 5, 0, 15],
                    width: 'auto',
                  },
                },
              };
              // Establece el ancho de las columnas
              //docDefinition.content[1].table.widths = ['auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto'];
              docDefinition.content[1].table.widths = ['auto', 'auto', 'auto', 'auto', 'auto', 'auto','auto'];
              // Agregar filas de datos al informe
              data.forEach(function (record) {
                var ano = record.ano;
                var codigo = record.codigo;
                var denominacion = record.denominacion;
                var costoinicial = record.costoinicial;
                var saldoinicial = record.saldoinicial;
                var valorinicial = record.valorinicial;
                var compras = record.compras;
                var ventas = record.ventas;
                var saldofinal = record.saldofinal;
                var costo = record.costo;
                var valorfinal = record.valorfinal;
                var almacen = record.nombre;
                // Agrega los valores a las sumas respectivas
 
                sumvalorfinal += parseFloat(record.valorfinal);

                // Agregar una fila de datos al cuerpo de la tabla
                docDefinition.content[1].table.body.push([
                  //ano, codigo, denominacion, costoinicial, saldoinicial, valorinicial,  compras, ventas, saldofinal, costo, valorfinal,
                  ano, codigo, denominacion, costo, saldoinicial,saldofinal,almacen,
                ]);
              });

              //var totalRow = ['Total', '', '', '', '', '', '', '', '', '',  sumvalorfinal.toFixed(2)];
              var totalRow = ['---', '', '', '', '', '',''];
              docDefinition.content[1].table.body.push(totalRow);

              var currentDate = new Date();
              var mesActual = currentDate.getMonth() + 1; // Suma 1 ya que los meses se indexan desde 0
              var anoActual = currentDate.getFullYear();

              // Formatear el mes actual y el año actual con ceros iniciales si es necesario
              var mesActualStr = mesActual < 10 ? "0" + mesActual : mesActual;
              var nombreArchivo = `reporte_${mesActualStr}_${anoActual}_de_inventario.pdf`;

              // Generar el PDF y obtener un Blob
              var pdfDoc = pdfMake.createPdf(docDefinition);
              pdfDoc.getDataUrl((dataUrl) => {
                var downloadLink = document.createElement('a');
                downloadLink.href = dataUrl;
                downloadLink.download = nombreArchivo; // Usar el nombre de archivo personalizado
                downloadLink.click();
              });


            });
          //} else {
          //  alert("Por favor, seleccione ambas fechas.");
          //}

        });
      });


    </script>
    
    <?php
}
ob_end_flush();
?>