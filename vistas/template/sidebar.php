<aside class="app-sidebar sticky" id="sidebar">

    <!--input type="hidden" name="iva" id="iva" value='<?php// echo $_SESSION[' iva']; ?>'-->
    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="#" class="header-logo">
            <!--img src="../assets/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo">
            <img src="../assets/images/brand-logos/toggle-logo.png" alt="logo" class="toggle-logo">
            <img src="../assets/images/brand-logos/desktop-dark.png" alt="logo" class="desktop-dark">
            <img src="../assets/images/brand-logos/toggle-dark.png" alt="logo" class="toggle-dark">
            <img src="../assets/images/brand-logos/desktop-white.png" alt="logo" class="desktop-white"-->
            <img src="../assets/images/brand-logos/logo-user.png" alt="logo" style="height: 44px; width: 44px;" class="desktop-dark">
            <img src="../assets/images/brand-logos/logo-user.png" alt="logo" style="height: 44px; width: 44px;" class="toggle-dark">
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">

                <?php
                $Dashboard = 1;
                if (
                    /*$_SESSION['Dashboard'] == 1*/
                    $Dashboard == 1
                    ) {
                    echo '<li class="slide">
                            <a href="escritorio" class="side-menu__item">
                                <i class="bx bx-home side-menu__icon"></i>
                                <span class="side-menu__label">INICIO</span>
                            </a>
                               </li>';
                }
                ?>
                
                
                <?php
                $Dashboard = 1;
                if (
                    /*$_SESSION['Dashboard'] == 1*/
                    $Dashboard == 1
                    ) {

                    echo '
                        <li class="slide__category"><span class="category-name">Gestión</span></li>
                            <li class="slide">
                                <a href="almacen" class="side-menu__item">
                                    <i class="bx bx-box side-menu__icon"></i>
                                    <span class="side-menu__label">Áreas</span>
                                </a>
                            </li>

                            
                            <li class="slide">
                                <a href="usuario" class="side-menu__item">
                                    <i class="bx bx-user side-menu__icon"></i>
                                    <span class="side-menu__label">Usuario</span>
                                </a>
                            </li>

                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <i class="bx bx-package side-menu__icon"></i>
                                    <span class="side-menu__label">Gestión de Alta/Bajas</span>
                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1">
                                    <li class="slide side-menu__label1">
                                        <a href="javascript:void(0)">Registrar Bienes</a>
                                    </li>

                                    <li class="slide">
                                        <a href="compra" class="side-menu__item">Alta de Bienes</a>
                                    </li>
                                    
                                    <li class="slide">
                                        <a href="proveedor" class="side-menu__item">Baja de Bienes</a>
                                    </li>
                                    
                                </ul>
                            </li>

                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <i class="bx bx-package side-menu__icon"></i>
                                    <span class="side-menu__label">Gestión Inventario</span>
                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1">

                                    <li class="slide">
                                        <a href="ingreso" class="side-menu__item">Ingresos de Bienes</a>
                                    </li>

                                    <li class="slide">
                                        <a href="salida" class="side-menu__item">Salidas de Bienes</a>
                                    </li>
                                    
                                    <li class="slide">
                                        <a href="inventario" class="side-menu__item">Actualizar Inventario</a>
                                    </li>
                                    
                                </ul>
                            </li>

                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <i class="bx bx-package side-menu__icon"></i>
                                    <span class="side-menu__label">Gestión Bienes</span>
                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1">

                                    <li class="slide">
                                        <a href="articulo" class="side-menu__item">Registrar Bienes</a>
                                    </li>

                                    <li class="slide">
                                        <a href="categoria" class="side-menu__item">Registrar Categoría</a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <i class="bx bx-package side-menu__icon"></i>
                                    <span class="side-menu__label">Otros Registros</span>
                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1">

                                    <li class="slide">
                                        <a href="articulo" class="side-menu__item">Registrar Marcas</a>
                                    </li>

                                    <li class="slide">
                                        <a href="categoria" class="side-menu__item">Registrar Encargados</a>
                                    </li>
                                    
                                </ul>
                            </li>

                    ';
                }
                ?>
                
                
                

                <!-- Start::slide -->

                <?php
                $Logistica = 1;
                if (
                    /*$_SESSION['Logistica'] == 1*/
                    $Logistica == 1
                    ) {
                    echo '<li class="slide__category"><span class="category-name">Administrativo</span></li>
                            
                                                    <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-folder-open side-menu__icon"></i>
                                <span class="side-menu__label">Requerimientos</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Registrar Requerimiento</a>
                                </li>
                                <li class="slide">
                                    <a href="articulo" class="side-menu__item">Atender Requerimientos</a>
                                </li>
                            </ul>
                        </li>
           
                        <!--li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-home side-menu__icon"></i>
                                <span class="side-menu__label">Compras e Ingresos</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Compras e Ingresos</a>
                                </li>

                                <li class="slide">
                                    <a href="compra" class="side-menu__item">Registrar compras / Ingreso</a>
                                </li>
                                
                                <li class="slide">
                                    <a href="proveedor" class="side-menu__item">Registrar proveedor</a>
                                </li>
                                
                                <li class="slide">
                                    <a href="compralistas" class="side-menu__item">Ver lista de compras</a>
                                </li>
                                
                            </ul>
                        </li>
                        
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-group side-menu__icon"></i>
                                <span class="side-menu__label">Registro</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Clientes</a>
                                </li>
    
                                <li class="slide">
                                    <a href="cliente" class="side-menu__item">Registro de clientes</a>
                                </li>
                             
                            </ul>
                        </li>
        
                        <li class="slide">
                            <a href="stock" class="side-menu__item">
                                <i class="bx bx-dollar side-menu__icon"></i>
                                <span class="side-menu__label">Stock / Precios</span>
                            </a>
                        </li>
                               
 

                        <li class="slide">
                            <a href="registroinventario" class="side-menu__item">
                                <i class="bx bx-bar-chart-alt side-menu__icon"></i>
                                <span class="side-menu__label">Registro inventario</span>
                            </a>
                         </li>                    
                    ';
                }
                ?>


                <?php
                $Ventas = 1;
                if (
                    /*$_SESSION['Ventas'] == 1*/
                    $Ventas == 1
                    ) {
                    echo '<li class="slide__category"><span class="category-name">Gestión de Ventas</span></li>
                            <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-basket side-menu__icon"></i>
                                <span class="side-menu__label">Caja</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Caja</a>
                                </li>
                                <li class="slide">
                                    <a href="cajachica" class="side-menu__item">Caja chica</a>
                                </li>
                                <li class="slide">
                                    <a href="insumos" class="side-menu__item">Gastos/Ingresos</a>
                                </li>
                                <li class="slide">
                                    <a href="ventadiaria" class="side-menu__item">Ingreso diario</a>
                                </li>
                                
                                <li class="slide">
                                <a href="utilidadsemana" class="side-menu__item">Utilidad semanal</a>
                                </li>
                                
                            </ul>
                        </li>

                            <li class="slide">
                            <a href="pos" class="side-menu__item">
                                <i class="bx bx-shape-square side-menu__icon"></i>
                                <span class="side-menu__label">POS</span>
                            </a>
                               </li>
                               
                               <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-credit-card side-menu__icon"></i>
                                <span class="side-menu__label">Realizar venta</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide">
                                    <a href="notapedido" class="side-menu__item">Nota de venta</a>
                                </li>
                                <li class="slide">
                                    <a href="cotizacion" class="side-menu__item">Cotización</a>
                                </li>
                            </ul>
                        </li>

                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-task side-menu__icon"></i>
                                <span class="side-menu__label">Comprobantes</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Comprobantes</a>
                                </li>
                                <li class="slide">
                                    <a href="consultacomprobantes" class="side-menu__item">Estado de envio</a>
                                </li>
                                <li class="slide">
                                    <a href="documentosrelacionados" class="side-menu__item">Anulados</a>
                                </li>
                                <li class="slide">
                                    <a href="validafactura" class="side-menu__item">Validar solo facturas</a>
                                </li>
                                <li class="slide">
                                    <a href="validaboleta" class="side-menu__item">Validar solo boletas</a>
                                </li>
                              
                                
                            </ul>
                        </li>


                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-spreadsheet side-menu__icon"></i>
                                <span class="side-menu__label">Resumen de baja</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Resumen de baja</a>
                                </li>
                                <li class="slide">
                                    <a href="resumend" class="side-menu__item">Anular Boletas</a>
                                </li>
                                <li class="slide">
                                    <a href="cbaja" class="side-menu__item">Anular Facturas</a>
                                </li>
                                <li class="slide">
                                    <a href="bajanc" class="side-menu__item">Anular nota de crédito</a>
                                </li>
                                
                              
                                
                            </ul>
                        </li>
                        
                        <li class="slide">
                            <a href="creditospendiente" class="side-menu__item">
                                <i class="bx bx-credit-card-front side-menu__icon"></i>
                                <span class="side-menu__label">Créditos Pendientes</span>
                            </a>
                        </li>     
                        
                        
                        
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-run side-menu__icon"></i>
                                <span class="side-menu__label">Reportes diarios</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Reportes</a>
                                </li>
                                <li class="slide">
                                    <a href="ventasxdia" class="side-menu__item">Venta y rotacion por día/mes</a>
                                </li>
                            </ul>
                        </li>

                        ';
                }
                ?>


                <?php
                $Contabilidad = 1;
                if (
                    /*$_SESSION['Contabilidad'] == 1*/
                    $Contabilidad == 1
                    ) {
                    echo '<li class="slide__category"><span class="category-name">Contabilidad</span></li>
                            <li class="slide">
                            <a href="kardexArticulo" class="side-menu__item">
                                <i class="bx bx-barcode side-menu__icon"></i>
                                <span class="side-menu__label">Kardex por artículo</span>
                            </a>
                             </li>

                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-run side-menu__icon"></i>
                                <span class="side-menu__label">Reportes Gerencia</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Reportes</a>
                                </li>
                                <li class="slide">
                                    <a href="ventasxdia" class="side-menu__item">Venta día/mes</a>
                                </li>
                                <li class="slide">
                                    <a href="resumentributario" class="side-menu__item">Resumen tributario</a>
                                </li>
                                <li class="slide">
                                    <a href="ventasvendedor" class="side-menu__item">Ventas por vendedor</a>
                                </li>
                                <li class="slide">
                                    <a href="regventas" class="side-menu__item">Ventas agrupados</a>
                                </li>
                                <li class="slide">
                                    <a href="ventasxcliente" class="side-menu__item">Ventas por clientes</a>
                                </li>
                                <li class="slide">
                                <a href="ple" class="side-menu__item">Ple Ventas</a>
                                </li>
                                <li class="slide">
                                <a href="regcompras" class="side-menu__item">Reporte compras</a>
                                </li>
                                
                                <li class="slide">
                                <a href="repmargenganancia" class="side-menu__item">Margen de ganancia</a>
                                </li>

                                <li class="slide">
                                <a href="enviocorreo" class="side-menu__item">Correos enviados</a>
                                </li>
                                
                            </ul>
                             </li>

                            ';
                }
                ?>



                <?php
                $RRHH = 1;
                if (
                    /*$_SESSION['RRHH'] == 1*/
                    $RRHH == 1
                    ) {
                    echo '<li class="slide__category"><span class="category-name">Gestión RRHH</span></li> 
                            <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-group side-menu__icon"></i>
                                <span class="side-menu__label">Administración</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Administración</a>
                                </li>
                                <li class="slide">
                                    <a href="usuario" class="side-menu__item">Registro de usuarios</a>
                                </li>
                                <li class="slide">
                                    <a href="cliente" class="side-menu__item">Registro de clientes</a>
                                </li>
                             
                            </ul>
                             </li>
                             
                             <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-edit side-menu__icon"></i>
                                <span class="side-menu__label">Planilla personal</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Planilla personal</a>
                                </li>
                                <li class="slide">
                                    <a href="empleadoboleta" class="side-menu__item">Registrar trabajador</a>
                                </li>
                                <li class="slide">
                                    <a href="tipoSeguro" class="side-menu__item">Tipos de seguro</a>
                                </li>
                                <li class="slide">
                                    <a href="boletapago" class="side-menu__item">Generar boleta de pago</a>
                                </li>
                                
                            </ul>
                             </li>';
                }
                ?>


                <?php
                $Configuracion = 1;
                if (
                    /*$_SESSION['Configuracion'] == 1*/
                    $Configuracion == 1) {
                    echo '<li class="slide__category"><span class="category-name">Configuracion del sistema</span></li> 

                            <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-bookmark-plus side-menu__icon"></i>
                                <span class="side-menu__label">Configuración Sunat</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Configuración Sunat</a>
                                </li>
                                <li class="slide">
                                    <a href="catalogo5" class="side-menu__item">Tipos de tributos</a>
                                </li>
                                <li class="slide">
                                    <a href="catalogo6" class="side-menu__item">Documentos de identidad</a>
                                </li>
                                <li class="slide">
                                    <a href="tipoafectacionigv" class="side-menu__item">Tipo Afectación IGV</a>
                                </li>
                                <li class="slide">
                                    <a href="cargarcertificado" class="side-menu__item">Cargar Certificado</a>
                                </li>
                                <li class="slide">
                                    <a href="configNum" class="side-menu__item">Correlativo/Numeración</a>
                                </li>
                            </ul>
                             </li>

                             <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-buildings side-menu__icon"></i>
                                <span class="side-menu__label">Empresa</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Empresa</a>
                                </li>
                                <li class="slide">
                                    <a href="empresa" class="side-menu__item">Configuración General</a>
                                </li>
                                <li class="slide">
                                    <a href="correo" class="side-menu__item">SMTP / Envios</a>
                                </li>
                                <li class="slide">
                                    <a href="notificaciones" class="side-menu__item">Notificaciones</a>
                                </li>
                                
                            </ul>
                             </li-->

                            ';
                }
                ?>


            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                    height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>