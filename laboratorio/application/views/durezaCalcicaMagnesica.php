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
  
  <!-- Custom Fonts -->
  <link href="\laboratorio\font-awesome\css\font-awesome.min.css" rel="stylesheet" type="text/css">
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="\laboratorio\js\jquery.js"></script>
  <script src="\laboratorio\js\promedioAnalisisFisicos.js"></script>

<style type="text/css">
  table, th {
    text-align: center;
  }
  </style>


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
                            <a href="<?php echo site_url('welcome/cerrarSesion');?>"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión </a>
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
                     <li >
                        <a id="linkCotizacion" href="javascript:;" data-toggle="collapse" data-target="#cotizacion"><i class="fa fa-fw fa-pencil-square-o"></i> Cotización <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="cotizacion" class="collapse">
                            <li>
                                <a href="<?php echo site_url('welcome/cargarRegistrarCotizacion'); ?>" ata-target="#cotizacion">Registrar Cotización</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('welcome/cargarConsultarCotizaciones'); ?>">Consultar Cotizaciones</a>
                            </li>
                        </ul>
                    </li>
                    <li >
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
                            Registrar Resultados <small>Dureza Cálcica y Magnésica</small>
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
            /*Muestra error si el usuario no está registrado*/
            if (isset($noExisteUsuario)){
              echo "<label style = color:red>".$noExisteUsuario."</label>";
            }
            /*Envía los datos del formulario de logueo a la función "autorizarLogueo" en el controlador "welcome.php"*/
            echo form_open('welcome/registrarDurezaCalcicaMagnesica'); 
          ?>
          <form class="form-horizontal" novalidate>
            <table class="table table-bordered" >
              <thead>
                <tr class="active">
                  <th><div style="width: 100px;" >Fecha del Ensayo</div></th>
                  <th><div style="width: 100px;">Código de Muestra</div></th>
                  <th><div style="width: 100px;">V (mL) muestra</th>
                  <th><div style="width: 100px;">V (mL) final</th>
                  <th><div style="width: 100px;">Concentración EDTA (M)</th>
                  <th><div style="width: 100px;">V (mL) EDTA</th>
                  <th><div style="width: 100px;">Concentración (mg CaCO3/L) Dureza Cálcica</th>
                  <th><div style="width: 100px;">Concentración (mg CaCO3/L) Dureza Magnésica</th>
                  <th><div style="width: 100px;">Responsable</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input name="fechaEnsayo" type="date" class="form-control" autofocus></td>
                  <td><input name="codigoMuestra" type="text" class="form-control" value="Blanco" readonly></td> 
                  <td><input name="vMuestraBlanco" id="vMuestraBlanco" type="text" class="form-control"></td>
                  <td><input name="vFinalBlanco"  id="vFinalBlanco" type="text" class="form-control" ></td>
                  <td><input name="concentracionEdtaBlanco" id="concentracionEdtaBlanco" type="text" class="form-control"></td>
                  <td><input name="vEdtaBlanco" id="vEdtaBlanco" type="text" class="form-control"></td>
                  <td><input name="durezaCalcicaBlanco" id="durezaCalcicaBlanco" type="text" class="form-control"></td>
                  <td><input name="durezaMagnesicaBlanco" id="durezaMagnesicaBlanco" type="text" class="form-control"></td>                  
                  <td rowspan="4"><textarea name="responsable" id="responsable" class="form-control" rows="10" ></textarea></td>
                </tr>
                <tr>
                  <td rowspan="3"> </td>
                  <td><input name="codigoMuestra1" id="codigoMuestra1" type="text" class="form-control"></td>
                  <td><input name="vMuestra1" id="vMuestra1" type="text" class="form-control"></td>
                  <td><input name="vFinal1"  id="vFinal1" type="text" class="form-control" ></td>
                  <td><input name="concentracionEdta1" id="concentracionEdta1" type="text" class="form-control"></td>
                  <td><input name="vEdta1" id="vEdta1" type="text" class="form-control"></td>
                  <td rowspan="2"><textarea name="durezaCalcica" id="durezaCalcica" type="text" class="form-control" rows="5"></textarea></td>
                  <td rowspan="2"><textarea name="durezaMagnesica" id="durezaMagnesica" type="text" class="form-control" rows="5"></textarea></td>
                </tr>
                <tr>
                  <td><input name="codigoMuestra2" id="codigoMuestra2" type="text" class="form-control"></td>
                  <td><input name="vMuestra2" id="vMuestra2" type="text" class="form-control"></td>
                  <td><input name="vFinal2"  id="vFinal2" type="text" class="form-control" ></td>
                  <td><input name="concentracionEdta2" id="concentracionEdta2" type="text" class="form-control"></td>
                  <td><input name="vEdta2" id="vEdta2" type="text" class="form-control"></td>
                </tr>
                <tr>
                  <td >Solución Carta de Control</td>
                  <td><input name="vMuestraSolucionCartaControl" id="vMuestraSolucionCartaControl" type="text" class="form-control"></td>
                  <td><input name="vFinalSolucionCartaControl"  id="vFinalSolucionCartaControl" type="text" class="form-control" ></td>
                  <td><input name="concentracionEdtaSolucionCartaControl" id="concentracionEdtaSolucionCartaControl" type="text" class="form-control"></td>
                  <td><input name="vEdtaSolucionCartaControl" id="vEdtaSolucionCartaControl" type="text" class="form-control"></td>
                  <td><input name="durezaCalcicaSolucionCartaControl" id="durezaCalcicaSolucionCartaControl" type="text" class="form-control"></td>
                  <td><input name="durezaMagnesicaSolucionCartaControl" id="durezaMagnesicaSolucionCartaControl" type="text" class="form-control"></td>                  
                </tr>
                <tr class="active">
                  <td colspan="9" >
                    <div class="row">
                      <div class="col-sm-4"></div>
                      <div class="col-sm-4"><button type="submit" class="btn btn-primary btn-block" >Registrar</button></div>
                      <div class="col-sm-4"></div>
                    </div>
                  </td>
                </tr>
                <?php
                  echo '<input type="hidden" name="codigoInterno" value="'.$codigoInterno.'"></input>';
                  echo '<input type="hidden" name="analisis" value="'.$analisis.'"></input>';
                  echo '<input type="hidden" name="fechaRecepcion" value="'.$fechaRecepcion.'"></input>';
                ?>
              </tbody>
            </table>
          </form>
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
