<?php

ini_set("session.cookie_lifetime","28800");
session_start();

if (@!$_SESSION['usuario_Usuario']) {
    header("Location: https://altustours.com/control/");
}

$idusuario = $_SESSION['usuario_ID'];
$usuario = $_SESSION['usuario_Nombre'];
$nivel = $_SESSION['usuario_Nivel'];

//redireccionamos si es Editor
if ($nivel == 'Editor') {
    header('Location: hoteles');
}

$booking = $_POST['booking'];

setlocale(LC_TIME, "es_MX");
$hoy = date('Y-m-d');
$inicio = date('Y-m').'-01';
$fin = date('Y-m').'-31';

//Validamos que se haya enviado el rango de fechas por POST
if ($_POST['antes'] == '' AND $_POST['despues'] == '') {

    //resto 16 día
    $antes = date("Y-m-d",strtotime($hoy."- 16 days"));

    //sumo 16 día
    $despues = date("Y-m-d",strtotime($hoy."+ 35 days"));


}else{

    //Fecha inicial
    $antes = $_POST['antes'];

    //Fecha final
    $despues = $_POST['despues'];

}

require('../backend/cn.php');

if ($nivel == 'Vendedor') {

   if ($booking == '') {

        $sql_reservas = "SELECT * FROM reservas WHERE (reserva_Almacenado BETWEEN '$hoy' AND '$despues' OR reserva_Fecha BETWEEN '$hoy' AND '$despues') AND (reserva_FormaPago = 'Viator' OR reserva_FormaPago = 'Expedia') OR reserva_Usuario = '$idusuario' ORDER BY reserva_Contador ASC";

    }elseif ($_POST['antes'] != '' AND $_POST['despues'] != '') {

        $sql_reservas = "SELECT * FROM reservas WHERE (reserva_Almacenado BETWEEN '$antes' AND '$despues' OR reserva_Fecha BETWEEN '$antes' AND '$despues') AND (reserva_FormaPago = 'Viator' OR reserva_FormaPago = 'Expedia') OR reserva_Usuario = '$idusuario' ORDER BY reserva_Contador ASC";

    }else{

        $sql_reservas = "SELECT * FROM reservas WHERE (reserva_Folio = '$booking' OR reserva_Booking_Reference = '$booking' OR reserva_Confirmacion = '$booking') AND (reserva_FormaPago = 'Viator' OR reserva_FormaPago = 'Expedia') OR reserva_Usuario = '$idusuario' ";
    }

}elseif ($nivel == 'Vendedor Altus') {

    if ($booking == '') {

    	$sql_reservas = "SELECT * FROM reservas WHERE (reserva_Almacenado BETWEEN '$hoy' AND '$despues' OR reserva_Fecha BETWEEN '$hoy' AND '$despues') AND reserva_Usuario = '$idusuario' ORDER BY reserva_Contador ASC";

    }elseif ($_POST['antes'] != '' AND $_POST['despues'] != '') {

        $sql_reservas = "SELECT * FROM reservas WHERE (reserva_Almacenado BETWEEN '$antes' AND '$despues' OR reserva_Fecha BETWEEN '$antes' AND '$despues') AND reserva_Usuario = '$idusuario' ORDER BY reserva_Contador ASC";

    }else{

    	$sql_reservas = "SELECT * FROM reservas WHERE (reserva_Folio = '$booking' OR reserva_Booking_Reference = '$booking' OR reserva_Confirmacion = '$booking') AND reserva_Usuario = '$idusuario' ";

    }

}elseif ($nivel == 'Administrador' OR $nivel == 'Reservas' OR $nivel == 'Auxiliar') {

    if ($booking == '' AND $_POST['antes'] == '' AND $_POST['despues'] == '') {

        $sql_reservas = "SELECT * FROM reservas WHERE reserva_Fecha BETWEEN '$inicio' AND '$fin' ORDER BY reserva_Contador ASC";

    }elseif ($_POST['antes'] != '' AND $_POST['despues'] != '') {

        $sql_reservas = "SELECT * FROM reservas WHERE reserva_Fecha BETWEEN '$antes' AND '$despues' ORDER BY reserva_Contador ASC";

    }else{

        $sql_reservas = "SELECT * FROM reservas WHERE reserva_Folio = '$booking' OR reserva_Booking_Reference = '$booking' OR reserva_Confirmacion = '$booking' ";
    }

}

$query_reservas = mysqli_query($conexion, $sql_reservas);

//Listado de tours
$sql_tours = "SELECT * FROM tours";
$query_tours = mysqli_query($conexion, $sql_tours);

//Para la opción de búsqueda de página/proveedores
//Listado de proveedores
$sql_proveedores = "SELECT * FROM proveedores";
$query_proveedores = mysqli_query($conexion, $sql_proveedores);


?>

<!doctype html>
<html class="no-js" lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Reservaciones de tours - ALTUS TOURS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="https://altustours.com/img/logos/favicon.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <!-- Daterange picker -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- BÚSQUEDA DENTRO DE SELECT -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

</head>

<body>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <?php include 'menus/sidebar.php'; ?>
        <!-- sidebar menu area end -->

        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <?php include 'menus/header.php'; ?>
            <!-- header area end -->

            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="breadcrumbs-area clearfix mt-3">
                            <h4 class="page-title pull-left">Principal</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="/">Reservas</a></li>
                                <li><span>Tours</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 clearfix text-right">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mt-3 mb-3" data-toggle="modal"
                            data-target="#exampleModal">
                            <strong>Buscar por fechas</strong>
                        </button>
                    </div>
                    <div class="col-md-2 clearfix text-right">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mt-3 mb-3" data-toggle="modal"
                            data-target="#busquedafolio">
                            <strong>Folio/Booking/Viator</strong>
                        </button>
                    </div>

                    <?php if ($nivel == 'Administrador' OR $nivel == 'Reservas' OR $nivel == 'Auxiliar') { ?>

                    <div class="col-md-2 clearfix text-right">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mt-3 mb-3" data-toggle="modal"
                            data-target="#generainforme">
                            <strong>Informe en Excel</strong>
                        </button>
                    </div>

                    <div class="col-md-2 clearfix text-right">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mt-3 mb-3" data-toggle="modal"
                            data-target="#paginaproveedor">
                            <strong>Página/Proveedor</strong>
                        </button>
                    </div>

                    <?php }?>

                    <!-- Modal Búsqueda por fecha -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Búsqueda por fecha</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="reservas-tours" method="post">

                                        <h6 class="text-center mb-3">Elije el rango de fechas</h6>

                                        <input id="busqueda_fecha" class="form-control col-md-12 mb-3 text-center"
                                            type="text">

                                        <!-- Datos ocultos -->
                                        <input id="antes" type="hidden" name="antes">
                                        <input id="despues" type="hidden" name="despues">

                                        <center>
                                            <button class="btn btn-success" type="submit">Consultar registros</button>
                                        </center>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal búsqueda por folio -->
                    <div class="modal fade" id="busquedafolio" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Búsqueda por Folio/Booking reference
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="reservas-tours" method="post">

                                        <h6>Ingrese el folio o referencia de OTA</h6>
                                        <input class="form-control mb-3" type="text" name="booking"
                                            placeholder="Escribe aquí">

                                        <button class="btn btn-success" type="submit">Consultar registros</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Genera informe en excel -->
                    <div class="modal fade" id="generainforme" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Generar informe de cupones</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="excel/informe-reservas-custom" method="post">

                                        <center>
                                            <h6 class="mb-3">Selecciona el rango de fechas</h6>
                                            <input id="date_range" class="form-control col-md-12 mb-3 text-center"
                                                type="text" name="fechas">

                                            <!-- Datos ocultos -->
                                            <input id="inicio" type="hidden" name="inicio">
                                            <input id="fin" type="hidden" name="fin">

                                            <select id="tours" name="tour">
                                                <!-- Llamado con Javascript -->
                                            </select>
                                            <br>

                                            <div id="proveedores" class="col-md-12 mt-3">
                                                <label class="form-control">Esperando datos...</label>
                                            </div>
                                            <button class="btn btn-success mt-3" type="submit">Consultar
                                                registros</button>
                                        </center>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Genera informe en excel -->
                    <div class="modal fade" id="paginaproveedor" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Generar informe de cupones</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="excel/informe-reservas-pagina-proveedor" method="post">

                                        <center>
                                            <h6 class="mb-3">Selecciona el rango de fechas</h6>
                                            <input id="date_range1" class="form-control col-md-8 mb-3 text-center"
                                                type="text" name="fechas">

                                            <!-- Datos ocultos -->
                                            <input id="inicio1" type="hidden" name="inicio">
                                            <input id="fin1" type="hidden" name="fin">


                                            <h6 class="mb-3">Elige un proveedor</h6>
                                            <select id="listaproveedores" name="proveedor">

                                            </select>
                                            <br>
                                            <h6 class="mb-3 mt-3">Elige una página</h6>
                                            <select class="form-control col-md-8" name="pagina">
                                                <option value="">Elige una opción</option>
                                                <option value="Altus Tours">Altus Tours</option>
                                                <option value="Cancún City & Tours">Cancún City & Tours</option>
                                                <option value="Náuticos del Caribe">Náuticos del Caribe</option>
                                                <option value="Open Vacations">Open Vacations</option>
                                                <option value="Altus Tours Vallarta">Altus Tours Vallarta</option>
                                                <option value="Altus Tours Los Cabos">Altus Tours Los Cabos</option>
                                            </select>

                                            <button class="btn btn-success mt-3" type="submit">Consultar
                                                registros</button>
                                        </center>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body p-0">
                                <h4 class="header-title mb-3">Registros de la base de datos del último mes</h4>
                                <div class="data-tables table-responsive">
                                    <table id="dataTable" class="text-center" style="width: 100%">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>#</th>
                                                <th>Confirmación</th>
                                                <th>STATUS</th>
                                                <th>Agencia/OTA</th>
                                                <th>CLIENTE</th>
                                                <th>ACTIVIDAD</th>
                                                <th>FECHA</th>
                                                <?php if ($nivel == 'Administrador' OR $nivel == 'Reservas' ) { ?>
                                                <th></th>
                                                <th></th>
                                                <?php }else{?>
                                                <th></th>
                                                <?php }?>
                                                <th>Cupón</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php while($reservas = $query_reservas ->fetch_assoc()) {

                                                $tourID = $reservas['reserva_TourID'];

                                                if($nivel == 'Administrador' OR $nivel == 'Reservas') {

                                                    //Marcamos en tono rojo si un usuario agregó notas
                                                    if ($reservas['reserva_NotasUsuario'] != '' AND $reservas['reserva_NotaStatus'] == 'Vendedor') {
                                                        $estilo = 'style="background-color: #dc3545;color: white;"';
                                                    }else{
                                                        $estilo = '';
                                                    }

                                                }else{

                                                    //Marcamos en tono rojo si un usuario agregó notas
                                                    if ($reservas['reserva_NotasUsuario'] != '' AND $reservas['reserva_NotaStatus'] == 'Administrador') {
                                                        $estilo = 'style="background-color:#007bff; color: white;"';
                                                    }else{
                                                        $estilo = '';
                                                    }

                                                }

                                                //busqueda de tours
                                                $tour = "SELECT * FROM tours WHERE Tour_ID = '$tourID' ";
                                                $query_tour = mysqli_query($conexion, $tour);
                                                $row_tour = mysqli_fetch_array($query_tour);

                                            ?>

                                            <tr <?php echo $estilo; ?> >
                                                <td>
                                                    <?php echo $reservas['reserva_Folio'].'<br>'.$reservas['reserva_Booking_Reference'];?>
                                                </td>
                                                <td>
                                                    <?php echo $reservas['reserva_Confirmacion']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $reservas['reserva_Status'];?>
                                                </td>
                                                <td>
                                                    <?php echo $reservas['reserva_Pagina'].' <br> '.$reservas['reserva_FormaPago'];?>
                                                </td>
                                                <td>
                                                    <?php echo $reservas['reserva_Cliente'];?>
                                                </td>
                                                <td>
                                                    <?php echo $row_tour['Tour_Nombre'];?>
                                                </td>
                                                <td>
                                                    <?php echo date("Y/m/d",strtotime($reservas['reserva_Fecha']));?>
                                                </td>
                                                <?php if ($nivel == 'Administrador' OR $nivel == 'Reservas' ) { ?>
                                                <td>

                                                    <form method="POST" action="modificar-reserva-tours"
                                                        onsubmit="return confirmation1()">
                                                        <input type="hidden" name="id"
                                                            value="<?php echo $reservas['reserva_ID'];?>">
                                                        <button class="btn btn-info" type="submit"
                                                            name="modificar">Modificar</button>
                                                    </form>

                                                </td>
                                                <td>
                                                    <form method="POST" action="backend/eliminar-reserva-tour"
                                                        onsubmit="return confirmation()">
                                                        <input type="hidden" name="id"
                                                            value="<?php echo $reservas['reserva_ID'];?>">
                                                        <button class="btn btn-danger" type="submit"
                                                            name="eliminar">Eliminar</button>
                                                    </form>

                                                </td>
                                                <?php }else{?>

                                                <td>

                                                    <?php if ($row_tour['Tour_ID'] == '121' AND $nivel == 'Vendedor Altus') { ?>

                                                    <form method="POST" action="modificar-reserva-tours"
                                                        onsubmit="return confirmation1()">
                                                        <input type="hidden" name="id"
                                                            value="<?php echo $reservas['reserva_ID'];?>">
                                                        <button class="btn btn-info" type="submit"
                                                            name="modificar">Modificar</button>
                                                    </form>

                                                    <?php }else{ ?>

                                                    <form method="POST" action="ver-datos-reserva"
                                                        onsubmit="return confirmation1()">
                                                        <input type="hidden" name="id"
                                                            value="<?php echo $reservas['reserva_ID'];?>">
                                                        <button class="btn btn-info" type="submit" name="modificar">Ver
                                                            datos</button>
                                                    </form>

                                                    <?php } ?>
                                                </td>

                                                <?php } ?>
                                                <td class="text-center">
                                                    <?php
                                                        if ($nivel == 'Administrador' OR $nivel == 'Reservas' ) {
                                                                    //stristr($reservas['reserva_Pagina'], 'Altus')
                                                                    //$reservas['reserva_Pagina'] !== 'Cancun Pass'  )
                                                            if (  $reservas['reserva_Pagina'] !== ''  ) {
                                                    ?>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                Pase de abordar
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="pase-abordar-eng?id=<?php echo $reservas['reserva_ID']; ?>"
                                                                    target="_blank">INGLÉS</a>
                                                                <a class="dropdown-item"
                                                                    href="pase-abordar-esp?id=<?php echo $reservas['reserva_ID']; ?>"
                                                                    target="_blank">ESPAÑOL</a>
                                                                <a class="dropdown-item"
                                                                    href="pase-abordar-esp?id=<?php echo $reservas['reserva_ID']; ?>&send=proveedor"
                                                                    target="_blank"><strong>PROVEEDOR</strong></a>
                                                            </div>
                                                        </div>
                                                    <?php

                                                        }else{

                                                            if ($reservas['reserva_Confirmacion'] == '') { ?>

                                                            <form method="POST" action="generar-pdf" target="_blank">
                                                                <input type="hidden" name="id"
                                                                    value="<?php echo $reservas['reserva_ID'];?>">
                                                                <button class="btn btn-warning" type="submit"
                                                                    name="generar">PROVEEDOR</button>
                                                            </form>

                                                    <?php
                                                            }else{ ?>

                                                    <form method="POST" action="generar-pdf" target="_blank">
                                                        <input type="hidden" name="id"
                                                            value="<?php echo $reservas['reserva_ID'];?>">
                                                        <button class="btn btn-success" type="submit"
                                                            name="generar">CUPÓN CLIENTE</button>
                                                    </form>
                                                    <?php       }

                                                        }//fin else buscar Altus
                                                ?>


                                                    <?php

                                                    } else { //Fin else nivel de usuario

                                                        if ($reservas['reserva_Confirmacion'] == '') {

                                                            echo "Esperando...";

                                                        }else{

                                                            if ( $reservas['reserva_Pagina'] !== 'Cancun Pass' ) {
                                                ?>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-success dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Pase de abordar
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="pase-abordar-eng?id=<?php echo $reservas['reserva_ID']; ?>"
                                                                target="_blank">INGLÉS</a>
                                                            <a class="dropdown-item"
                                                                href="pase-abordar-esp?id=<?php echo $reservas['reserva_ID']; ?>"
                                                                target="_blank">ESPAÑOL</a>
                                                        </div>
                                                    </div>
                                                    <?php
                                                            }else{
                                                ?>
                                                    <form method="POST" action="generar-pdf" target="_blank">
                                                        <input type="hidden" name="id"
                                                            value="<?php echo $reservas['reserva_ID'];?>">
                                                        <button class="btn btn-success" type="submit"
                                                            name="generar">Descargar</button>
                                                    </form>
                                                    <?php
                                                            } //Reserva página

                                                        }//Reserva confirmación

                                                    } //Else nivel usuario
                                                ?>


                                                </td>
                                            </tr>

                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- data table end -->
                </div>
            </div>
        </div>
        <!-- main content area end -->
    </div>
    <!-- page container area end -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>

    <!-- Daterange picker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js">
    </script>

    <!-- Búsqueda dentro de select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>

    <script>
        function confirmation1()
    {
        if(confirm("¿Seguro que deseas modificarlo?")){
            return true;
        }else{
            return false;
        }
    }

    function confirmation()
    {
        if(confirm("¿Seguro que deseas eliminarlo?")){
            return true;
        }else{
            return false;
        }
    }

    $(function () {

        $('#busqueda_fecha').daterangepicker({
            "locale": {
                "format": "DD-MM-YYYY",
                "separator": " - ",
                "applyLabel": "Guardar",
                "cancelLabel": "Cancelar",
                "fromLabel": "Desde",
                "toLabel": "Hasta",
                "customRangeLabel": "Personalizar",
                "daysOfWeek": [
                    "Do",
                    "Lu",
                    "Ma",
                    "Mi",
                    "Ju",
                    "Vi",
                    "Sa"
                ],
                "monthNames": [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Setiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre"
                ],
                "firstDay": 1
            },
            "opens": "center"
        }, function(start, end, label) {
            $('#antes').val(start.format('YYYY-MM-DD'));
            $('#despues').val(end.format('YYYY-MM-DD'));
        });


        $('#date_range').daterangepicker({
            "locale": {
                "format": "DD-MM-YYYY",
                "separator": " - ",
                "applyLabel": "Guardar",
                "cancelLabel": "Cancelar",
                "fromLabel": "Desde",
                "toLabel": "Hasta",
                "customRangeLabel": "Personalizar",
                "daysOfWeek": [
                    "Do",
                    "Lu",
                    "Ma",
                    "Mi",
                    "Ju",
                    "Vi",
                    "Sa"
                ],
                "monthNames": [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Setiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre"
                ],
                "firstDay": 1
            },
            "opens": "center"
        }, function(start, end, label) {
            $('#inicio').val(start.format('YYYY-MM-DD'));
            $('#fin').val(end.format('YYYY-MM-DD'));
        });

        $('#date_range1').daterangepicker({
            "locale": {
                "format": "DD-MM-YYYY",
                "separator": " - ",
                "applyLabel": "Guardar",
                "cancelLabel": "Cancelar",
                "fromLabel": "Desde",
                "toLabel": "Hasta",
                "customRangeLabel": "Personalizar",
                "daysOfWeek": [
                    "Do",
                    "Lu",
                    "Ma",
                    "Mi",
                    "Ju",
                    "Vi",
                    "Sa"
                ],
                "monthNames": [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Setiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre"
                ],
                "firstDay": 1
            },
            "opens": "center"
        }, function(start, end, label) {
            $('#inicio1').val(start.format('YYYY-MM-DD'));
            $('#fin1').val(end.format('YYYY-MM-DD'));
        });

        var tours = [
            {
                id: 0,
                text: "-- Selecciona un tour --"
            },
            <?php while($row_tour = $query_tours->fetch_assoc()) { ?>

            {
                id: <?php echo $row_tour['Tour_ID']; ?>,
                text: "<?php echo $row_tour['Tour_Nombre']; ?>"
            },
            <?php } ?>
        ];

        /* Imprimimos tours*/
        $('#tours').select2({
            data: tours,
            dropdownParent: $('#generainforme')
        });


        $('#tours').change(function() {
            var tour = $(this).val();

            var url = "ajax/buscar-proveedor-tour.php";
            $.ajax({
                type: "POST",
                url: url,
                data: {'tour': tour},
                success: function(data)
                {
                    $('#proveedores').html(data);

                }
            });

        });

        var proveedores = [
            {
                id: 0,
                text: "-- Selecciona una opción --"
            },
            <?php while($row_proveedores = $query_proveedores->fetch_assoc()) { ?>

            {
                id: <?php echo $row_proveedores['prov_ID']; ?>,
                text: "<?php echo $row_proveedores['prov_nombre']; ?>"
            },
            <?php } ?>
        ];

        /* Imprimimos tours*/
        $('#listaproveedores').select2({
            data: proveedores,
            dropdownParent: $('#paginaproveedor')
        });


    });

    </script>

</body>

</html>
