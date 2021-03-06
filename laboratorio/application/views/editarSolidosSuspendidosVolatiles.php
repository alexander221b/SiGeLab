<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Editar Resultados</title>
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
                    <ul class="dropdown-menu message-dropdown">
                    
                        <li>
                            <a href="<?php echo site_url('welcome/cerrarSesion');?>
"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión </a>
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
                   
                    <li  class="active">
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
                            Editar Resultados <small>Sólidos Suspendidos Volátiles</small>
                        </h1>
                        <ol class="breadcrumb">
                           <li>
                                <i class="fa fa-home"></i>  <a href="<?php echo site_url('welcome/inicio'); ?>">Inicio</a>
                            </li>
      
                            <li class="active">
                                <i class="fa fa-fw fa-bar-chart"></i> Resultados
                            </li>
                            <li>
                            <?php
                              foreach ($solidosSuspendidosVolatiles->result() as $row){
                                $codigoInterno = $row->codigoInterno;
                              }
                              $link = '<a class="ask" href="//localhost/laboratorio/index.php/welcome/verResultado/'.$codigoInterno.'/solidosSuspendidosVolatiles" target="_blank" onClick="window.open(this.href, this.target, width=300, height=400); return false;">'.$codigoInterno.'</a>';
                              echo $link;
                            ?> 
                          </li>
                        </ol>
                    </div>
                </div>




          <?php 
            if (isset($analisisActualizado)){
                   echo " <div class='alert alert-info'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            ¡Datos del formulario 
                            <strong>".$analisisActualizado."</strong>
                            actualizados en la base de datos!
                          </div> 
                        "; 
                }
            /*Envía los datos del formulario de logueo a la función "autorizarLogueo" en el controlador "welcome.php"*/
            echo form_open('welcome/actualizarSolidosSuspendidosVolatiles'); 
          ?>

          <div class="row">
  <div class="col-lg-4">
   <?php
     foreach($solidosSuspendidosVolatiles->result() as $row){
       $codigoInterno = $row->codigoInterno;
       $fechaRecepcion = $row->fechaRecepcion;
      } 
      echo '<p class="h4">Código Interno:</p>';
      echo '<input type="text" class="form-control"name="codigoInterno" value="'.$codigoInterno.'" readonly></input>';
      echo '<p class="h4">Fecha de Recepción:</p>';
      echo '<input type="date" class="form-control" name="fechaRecepcion" value="'.$fechaRecepcion.'"></input>';
   ?>
  <br>
</div>
</div>
          <form class="form-horizontal" novalidate>
            <table class="table table-bordered" >
              <thead>
                <tr class="active">
                  <th><div style="width: 100px;">Fecha del Ensayo</div></th>
                  <th><div style="width: 100px;">Código de Muestra</div></th>
                  <th><div style="width: 100px;">V (mL) Muestra Filtrada</th>
                  <th><div style="width: 100px;">No. de Crisol</th>
                  <th><div style="width: 100px;">Crisol vacío</th>
                  <th><div style="width: 100px;">Crisol + muestra (105ºC)</th>
                  <th><div style="width: 100px;">Crisol + muestra (550ºC)</th>
                  <th><div style="width: 100px;">Concentración S.S.V (mg/L)</th>
                  <th><div style="width: 100px;">Concentración Promedio S.S.V (mg / L)</th>
                  <th><div style="width: 100px;">Responsable</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="2"> <input value="<?php
                     foreach($solidosSuspendidosVolatiles->result() as $row){
                       $fechaEnsayo = $row->fechaEnsayo;
                      } echo $fechaEnsayo?>" name="fechaEnsayo" id="fechaEnsayo" type="date" class="form-control"></td>
                  <td rowspan="2"><input <input value="<?php
                     foreach($solidosSuspendidosVolatiles->result() as $row){
                       $codigoMuestra = $row->codigoMuestra;
                      } echo $codigoMuestra?>" name="codigoMuestra" id="codigoMuestra" type="text" class="form-control"></td>
                  <td><input <input value="<?php
                     foreach($solidosSuspendidosVolatiles->result() as $row){
                       $vMuestraFiltrada1 = $row->vMuestraFiltrada1;
                      } echo $vMuestraFiltrada1?>" name="vMuestraFiltrada1" id="vMuestraFiltrada1" type="text" class="form-control"></td>                
                  <td><input <input value="<?php
                     foreach($solidosSuspendidosVolatiles->result() as $row){
                       $noCrisol1 = $row->noCrisol1;
                      } echo $noCrisol1?>" name="noCrisol1" id="noCrisol1" type="text" class="form-control"></td>
                  <td><input <input value="<?php
                     foreach($solidosSuspendidosVolatiles->result() as $row){
                       $crisolVacio1 = $row->crisolVacio1;
                      } echo $crisolVacio1?>" name="crisolVacio1" id="crisolVacio1" type="text" class="form-control"></td>
                  <td><input <input value="<?php
                     foreach($solidosSuspendidosVolatiles->result() as $row){
                       $crisolMuestra1051 = $row->crisolMuestra1051;
                      } echo $crisolMuestra1051?>" name="crisolMuestra1051" id="crisolMuestra1051" type="text" class="form-control"></td>
                  <td><input <input value="<?php
                     foreach($solidosSuspendidosVolatiles->result() as $row){
                       $crisolMuestra5501 = $row->crisolMuestra5501;
                      } echo $crisolMuestra5501?>" name="crisolMuestra5501" id="crisolMuestra5501" type="text" class="form-control"></td>
                  <td><input <input value="<?php
                     foreach($solidosSuspendidosVolatiles->result() as $row){
                       $concentracionSsv1 = $row->concentracionSsv1;
                      } echo $concentracionSsv1?>" name="concentracionSsv1" id="concentracionSsv1" type="text" class="form-control"></td>
                  <td rowspan="2"><textarea name="concentracionPromedioSsv" id="concentracionPromedioSsv" class="form-control" rows="5" ><?php
                     foreach($solidosSuspendidosVolatiles->result() as $row){
                       $concentracionPromedioSsv = $row->concentracionPromedioSsv;
                      } echo $concentracionPromedioSsv?></textarea></td>
                  <td rowspan="2"><textarea name="responsable" id="responsable" class="form-control" rows="5" ><?php
                     foreach($solidosSuspendidosVolatiles->result() as $row){
                       $responsable = $row->responsable;
                      } echo $responsable?></textarea></td>
                </tr>
                <tr>
                  <td><input <input value="<?php
                     foreach($solidosSuspendidosVolatiles->result() as $row){
                       $vMuestraFiltrada2 = $row->vMuestraFiltrada2;
                      } echo $vMuestraFiltrada2?>" name="vMuestraFiltrada2" id="vMuestraFiltrada2" type="text" class="form-control"></td>                  
                  <td ><input <input value="<?php
                     foreach($solidosSuspendidosVolatiles->result() as $row){
                       $noCrisol2 = $row->noCrisol2;
                      } echo $noCrisol2?>" name="noCrisol2" id="noCrisol2" type="text" class="form-control"></td>
                  <td><input <input value="<?php
                     foreach($solidosSuspendidosVolatiles->result() as $row){
                       $crisolVacio2 = $row->crisolVacio2;
                      } echo $crisolVacio2?>" name="crisolVacio2" id="crisolVacio2" type="text" class="form-control"></td>
                  <td><input <input value="<?php
                     foreach($solidosSuspendidosVolatiles->result() as $row){
                       $crisolMuestra1052 = $row->crisolMuestra1052;
                      } echo $crisolMuestra1052?>" name="crisolMuestra1052" id="crisolMuestra1052" type="text" class="form-control"></td>
                  <td><input <input value="<?php
                     foreach($solidosSuspendidosVolatiles->result() as $row){
                       $crisolMuestra5502 = $row->crisolMuestra5502;
                      } echo $crisolMuestra5502?>" name="crisolMuestra5502" id="crisolMuestra5502" type="text" class="form-control"></td>
                  <td><input <input value="<?php
                     foreach($solidosSuspendidosVolatiles->result() as $row){
                       $concentracionSsv2 = $row->concentracionSsv2;
                      } echo $concentracionSsv2?>" name="concentracionSsv2" id="concentracionSsv2" type="text" class="form-control"></td>
                </tr>
                <tr class="active">
                  <td colspan="10" >
                    <div class="row">
                      <div class="col-sm-4"></div>
                      <div class="col-sm-4"><button type="submit" class="btn btn-primary btn-block" >Actualizar</button></div>
                      <div class="col-sm-4"></div>
                    </div>
                  </td>
                </tr>
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
