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
                            Editar Resultados <small>Alcalinidad Total</small>
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
                              foreach ($alcalinidadTotal->result() as $row){
                                $codigoInterno = $row->codigoInterno;
                              }
                              $link = '<a class="ask" href="//localhost/laboratorio/index.php/welcome/verResultado/'.$codigoInterno.'/alcalinidadTotal" target="_blank" onClick="window.open(this.href, this.target, width=300, height=400); return false;">'.$codigoInterno.'</a>';
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
            echo form_open('welcome/actualizarMetales'); 
          ?>

 <div class="row">
  <div class="col-lg-4">
   <?php
     foreach($metales->result() as $row){
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
                  <th><div style="width: 100px;">Metal</th>
                  <th><div style="width: 100px;">Técnica</th>
                  <th><div style="width: 100px;">Cantidad de muestra (g. o ml.)</th>
                  <th><div style="width: 100px;">V (mL) Final</th>
                  <th><div style="width: 100px;">Factor de Dilución</th>
                  <th><div style="width: 100px;">Absorbancia</th>
                  <th><div style="width: 100px;">Concentración leída</th>
                  <th><div style="width: 100px;">Unidades(mg/L ó &#181;g/L)</th>
                  <th><div style="width: 100px;">Concentración corregida</th>
                  <th><div style="width: 100px;">Unidades</th>
                  <th><div style="width: 100px;">Responsable</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="2"> <input value="<?php
                     foreach($metales->result() as $row){
                       $fechaEnsayo = $row->fechaEnsayo;
                      } echo $fechaEnsayo?>" name="fechaEnsayo" id="fechaEnsayo" type="date" class="form-control"></td>
                  <td><input value="<?php
                     foreach($metales->result() as $row){
                       $codigoMuestra = $row->codigoMuestra;
                      } echo $codigoMuestra?>" name="codigoMuestra" id="codigoMuestra" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($metales->result() as $row){
                       $metal = $row->metal;
                      } echo $metal?>" name="metal" id="metal" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($metales->result() as $row){
                       $tecnica = $row->tecnica;
                      } echo $tecnica?>" name="tecnica"  id="tecnica" type="text" class="form-control" ></td>
                  <td><input value="<?php
                     foreach($metales->result() as $row){
                       $cantidadMuestra = $row->cantidadMuestra;
                      } echo $cantidadMuestra?>" name="cantidadMuestra" id="cantidadMuestra" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($metales->result() as $row){
                       $vFinal = $row->vFinal;
                      } echo $vFinal?>" name="vFinal" id="vFinal" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($metales->result() as $row){
                       $factorDilucion = $row->factorDilucion;
                      } echo $factorDilucion?>" name="factorDilucion" id="factorDilucion" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($metales->result() as $row){
                       $absorbancia = $row->absorbancia;
                      } echo $absorbancia?>" name="absorbancia" id="absorbancia" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($metales->result() as $row){
                       $concentracionLeida = $row->concentracionLeida;
                      } echo $concentracionLeida?>" name="concentracionLeida" id="concentracionLeida" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($metales->result() as $row){
                       $concentracionMgUg = $row->concentracionMgUg;
                      } echo $concentracionMgUg?>" name="concentracionMgUg" id="concentracionMgUg" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($metales->result() as $row){
                       $concentracionCorregida = $row->concentracionCorregida;
                      } echo $concentracionCorregida?>" name="concentracionCorregida" id="concentracionCorregida" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($metales->result() as $row){
                       $unidades = $row->unidades;
                      } echo $unidades?>" name="unidades" id="unidades" type="text" class="form-control"></td>
                  <td rowspan="2"><textarea name="responsable" id="responsable" class="form-control" rows="6" ><?php
                     foreach($metales->result() as $row){
                       $responsable = $row->responsable;
                      } echo $responsable?></textarea></td>
                </tr>
                <tr>
                  <td >Solución Carta de Control**</td>
                  <td><input value="<?php
                     foreach($metales->result() as $row){
                       $metalSolucionCartaControl = $row->metalSolucionCartaControl;
                      } echo $metalSolucionCartaControl?>" name="metalSolucionCartaControl" id="metalSolucionCartaControl" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($metales->result() as $row){
                       $tecnicaSolucionCartaControl = $row->tecnicaSolucionCartaControl;
                      } echo $tecnicaSolucionCartaControl?>" name="tecnicaSolucionCartaControl"  id="tecnicaSolucionCartaControl" type="text" class="form-control" ></td>
                  <td><input value="<?php
                     foreach($metales->result() as $row){
                       $cantidadMuestraSolucionCartaControl = $row->cantidadMuestraSolucionCartaControl;
                      } echo $cantidadMuestraSolucionCartaControl?>" name="cantidadMuestraSolucionCartaControl" id="cantidadMuestraSolucionCartaControl" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($metales->result() as $row){
                       $vFinalSolucionCartaControl = $row->vFinalSolucionCartaControl;
                      } echo $vFinalSolucionCartaControl?>" name="vFinalSolucionCartaControl" id="vFinalSolucionCartaControl" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($metales->result() as $row){
                       $factorDilucionSolucionCartaControl = $row->factorDilucionSolucionCartaControl;
                      } echo $factorDilucionSolucionCartaControl?>" name="factorDilucionSolucionCartaControl" id="factorDilucionSolucionCartaControl" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($metales->result() as $row){
                       $absorbanciaSolucionCartaControl = $row->absorbanciaSolucionCartaControl;
                      } echo $absorbanciaSolucionCartaControl?>" name="absorbanciaSolucionCartaControl" id="absorbanciaSolucionCartaControl" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($metales->result() as $row){
                       $concentracionLeidaSolucionCartaControl = $row->concentracionLeidaSolucionCartaControl;
                      } echo $concentracionLeidaSolucionCartaControl?>" name="concentracionLeidaSolucionCartaControl" id="concentracionLeidaSolucionCartaControl" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($metales->result() as $row){
                       $concentracionMgUgSolucionCartaControl = $row->concentracionMgUgSolucionCartaControl;
                      } echo $concentracionMgUgSolucionCartaControl?>" name="concentracionMgUgSolucionCartaControl" id="concentracionMgUgSolucionCartaControl" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($metales->result() as $row){
                       $concentracionCorregidaSolucionCartaControl = $row->concentracionCorregidaSolucionCartaControl;
                      } echo $concentracionCorregidaSolucionCartaControl?>" name="concentracionCorregidaSolucionCartaControl" id="concentracionCorregidaSolucionCartaControl" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($metales->result() as $row){
                       $unidadesSolucionCartaControl = $row->unidadesSolucionCartaControl;
                      } echo $unidadesSolucionCartaControl?>" name="unidadesSolucionCartaControl" id="unidadesSolucionCartaControl" type="text" class="form-control"></td>
                </tr>
                <tr class="active">
                  <td colspan="13" >
                    <div class="row">
                      <div class="col-sm-4"></div>
                      <div class="col-sm-4"><button type="submit" class="btn btn-primary btn-block" >Actualizar</button></div>
                      <div class="col-sm-4"></div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="h4">** La solución para la Carta de control aplica para el análisis de Hierro</div>
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
