<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Registrar Resultados</title>
  <!-- Bootstrap Core CSS -->
  <link href="\laboratorio\css\bootstrap.min.css" rel="stylesheet">
  <!-- Barra lateral personalizada -->
  <link href="\laboratorio\css\sb-admin.css" rel="stylesheet">
  <!-- Gráficos Morris -->
  <link href="\laboratorio\css\plugins\morris.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="\laboratorio\font-awesome\css\font-awesome.min.css" rel="stylesheet" type="text/css">
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="\laboratorio\js\jquery.js"></script>
  
  <!-- Selectpicker -->
  <script src="\laboratorio\js\bootstrap-select.js"></script>
  <script src="\laboratorio\js\bootstrap-select.min.js"></script>
  <link href="\laboratorio\css\bootstrap-select.css" rel="stylesheet">
  <link href="\laboratorio\css\bootstrap-select.min.css" rel="stylesheet">



</head>
<body>
  <div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('welcome/inicio'); ?>">UTP</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                        
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata('usuario'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      
                        <li>
                            <a href="<?php echo site_url('welcome/cerrarSesion');?>"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?php echo site_url('welcome/inicio'); ?>"><i class="fa fa-fw fa-home"></i> Inicio</a>
                    </li>
                    <li>
   <a id="linkCotizacion" href="javascript:;" data-toggle="collapse" data-target="#solicitudServicio"><i class="fa fa-fw fa-clock-o"></i> Solicitud  <i class="fa fa-fw fa-caret-down"></i></a>
    <ul id="solicitudServicio" class="collapse">
       <li class="active">
          <a href="<?php echo site_url('welcome/cargarRegistrarSolicitud'); ?>" ata-target="#cotizacion">Registrar Solicitud </a>
       </li>
        <li>
           <a href="<?php echo site_url('welcome/cargarConsultarSolicitud'); ?>">Consultar Solicitudes</a>
        </li>
    </ul>
</li>
                     <li>
                        <a id="linkCotizacion" href="javascript:;" data-toggle="collapse" data-target="#cotizacion"><i class="fa fa-fw fa-pencil-square-o"></i> Cotización <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="cotizacion" class="collapse">
                            <li >
                                <a href="<?php echo site_url('welcome/cargarRegistrarCotizacion'); ?>" ata-target="#cotizacion">Registrar Cotización</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('welcome/cargarConsultarCotizaciones'); ?>">Consultar Cotizaciones</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#recepcion"><i class="fa fa-fw fa-download"></i> Recepción <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="recepcion" class="collapse">
                            <li>
                                <a href="<?php echo site_url('welcome/cargarRegistrarRecepcion'); ?>">Registrar Muestra</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('welcome/cargarConsultarRecepciones'); ?>">Consultar Muestras</a>
                            </li>
                        </ul>
                    </li>
      
                    <li class="active">
                        <a href="javascript:;" data-toggle="collapse" data-target="#resultados"><i class="fa fa-fw fa-bar-chart"></i> Resultados <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="resultados" class="collapse">
                            <li>
                                <a href="<?php echo site_url('welcome/cargarRegistrarResultados'); ?>">Registrar Resultado</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('welcome/cargarConsultarResultados'); ?>">Consultar Resultados</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#informe"><i class="fa fa-fw fa-file-text-o"></i> Informe <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="informe" class="collapse">
                            <li>
                                <a href="<?php echo site_url('welcome/cargarRegistrarInforme'); ?>">Registrar Informe</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('welcome/cargarConsultarInformes'); ?>">Consultar Informes</a>
                            </li>
                        </ul>
                    </li> 
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Registrar Resultados <small>Búsqueda de análisis</small>
                        </h1>
                        <ol class="breadcrumb">
                           <li>
                                <i class="fa fa-home"></i>  <a href="<?php echo site_url('welcome/inicio'); ?>">Inicio</a>
                            </li>
      
                            <li class="active">
                                <i class="fa fa-fw fa-bar-chart"></i> Resultados
                            </li>
                        </ol>
                    </div>
                </div>



              <?php 
                /**/
                if (isset($analisisRegistrado)){
                   echo " <div class='alert alert-info'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            ¡Datos del formulario 
                            <strong>".$analisisRegistrado."</strong>
                            registrados en la base de datos!
                          </div> 
                        "; 
                }

                if (isset($error)){
                   echo " <div class='alert alert-danger'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>".$error."</strong>
                          </div> 
                        "; 
                }

                echo form_open('welcome/registrarResultados'); 
              ?>


<div class="row">
    <div class="col-sm-4">
              <form class="form-horizontal" novalidate> 
                <div class="form-group">
                  <p class="h4">Código Interno:</p>
                  <input type="text" name="codigoInterno" id="codigoInterno" class="form-control" required></input>
                </div>
                <div class="form-group">
                  <p class="h4">Fecha de Recepción:</p>   
                  <input type="date" name="fechaRecepcion" id="fechaRecepcion" class="form-control" autofocus required></input>
                </div>
                <div class="form-group">
                  <p class="h4">Análisis: </p>
                  <select data-width="340px" name="analisis" class="selectpicker" data-live-search="true">
                    <option value="analisisFisicos">Análisis Físicos</option>
                    <option value="alcalinidadTotal">Alcalinidad Total</option>
                    <option value="carbonatos">Carbonatos</option>
                    <option value="bicarbonatos">Bicarbonatos</option>
                    <option value="hidroxidos">Hidróxidos</option>
                    <option value="nitritos">Nitritos</option>
                    <option value="nitratos">Nitratos</option>
                    <option value="cloruros">Cloruros</option>
                    <option value="sulfatos">Sulfatos</option>
                    <option value="durezaTotal">Dureza Total</option>
                    <option value="durezaCalcicaMagnesica">Dureza Cálcica y Magnésica</option>
                    <option value="cloroResidual">Cloro Residual</option>
                    <option value="metales">Metales</option>
                    <option value="aluminio">Aluminio (Método Eriocromo Cianina)</option>
                    <option value="acidezTotal">Acidez Total</option>
                    <option value="acidezLibre">Acidez Libre</option>
                    <option value="acidezVolatil">Acidez Volátil</option>
                    <option value="durabilidad">Durabilidad</option>
                    <option value="extractoSecoTotal">Extracto Seco Total</option>
                    <option value="extractoSecoRm">Extracto Seco R.M.</option>
                    <option value="extractoSecoDesengrasado">Extracto Seco Desengrasado</option>
                    <option value="solidosTotales">Sólidos Totales (S.T.)</option>
                    <option value="solidosDisueltosTotales">Sólidos Disueltos Totales (S.D.T.)</option>
                    <option value="solidosDisueltosVolatiles">Sólidos Disueltos Volátiles (S.D.V.)</option>
                    <option value="solidosSuspendidosTotales">Sólidos Suspendidos Totales (S.S.T.)</option>
                    <option value="solidosSuspendidosVolatiles">Sólidos Suspendidos Volátiles (S.S.V.)</option>
                    <option value="solidosSedimentables">Sólidos Sedimentables 10' - 60'</option>
                    <option value="solidosInsolubles">Sólidos Insolubles (S.I.) (Material Mineral)</option>
                    <option value="basicidad">Basicidad (Material Mineral)</option>
                    <option value="dqo">DQO</option>
                    <option value="dbo5">DBO5</option>
                    <option value="extraccionSoxhlet">Grasas y/o Aceites (Extracción Soxhlet)</option>
                    <option value="volumetricoGerberBabcock">Grasas y/o Aceites (Volumétrico de Gerber ó Babcock)</option>
                    <option value="roseGottlie">Grasas y/o aceites (Rose-Gottlie)</option>
                    <option value="hidrocarburos">Hidrocarburos</option>
                    <option value="fosfatos">Fosfatos</option>
                  </select>
                  </div> 
                  <button type="submit" class="btn btn-primary btn-block">Cargar Formulario</button>
                </form>


</div>
  </div>
                <?php 
                  echo form_close();
                ?>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="\laboratorio\js\jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="\laboratorio\js\bootstrap.min.js"></script>

<!-- Gráficos Morris JavaScript -->
<script src="\laboratorio\js\plugins\morris\raphael.min.js"></script>
<script src="\laboratorio\js\plugins\morris\morris.min.js"></script>
<script src="\laboratorio\js\plugins\morris\morris-data.js"></script>

</body>
</html>
