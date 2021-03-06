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
            echo form_open('welcome/actualizarAlcalinidadTotal'); 
          ?>

          <div class="row">
  <div class="col-lg-4">
   <?php
     foreach($alcalinidadTotal->result() as $row){
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
                  <th><div style="width: 100px;" >Fecha del Ensayo</div></th>
                  <th><div style="width: 100px;">Código de Muestra</div></th>
                  <th><div style="width: 100px;">V (mL) muestra</th>
                  <th><div style="width: 100px;">N H<sub>2</sub>SO<sub>4</sub></th>
                  <th><div style="width: 100px;">V (mL) H<sub>2</sub>SO<sub>4</sub> pH=4,5</th>
                  <th><div style="width: 100px;">pH (Unidades)</th>
                  <th><div style="width: 100px;">Resultado (mg CaCO<sub>3</sub>/L)</th>
                  <th><div style="width: 100px;">Promedio (mg CaCO<sub>3</sub>/L)</th>
                  <th><div style="width: 100px;">Responsable</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $fechaEnsayo = $row->fechaEnsayo;
                      } echo $fechaEnsayo?>" name="fechaEnsayo" type="date" class="form-control"></td>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $codigoMuestra = $row->codigoMuestra;
                      } echo $codigoMuestra?>" name="codigoMuestra" type="text" class="form-control" value="Blanco" readonly></td> 
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $vMuestraBlanco = $row->vMuestraBlanco;
                      } echo $vMuestraBlanco?>" name="vMuestraBlanco" id="vMuestraBlanco" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $nH2SO4Blanco = $row->nH2SO4Blanco;
                      } echo $nH2SO4Blanco?>" name="nH2SO4Blanco"  id="nH2SO4Blanco" type="text" class="form-control"  ></td>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $vH2SO4Blanco = $row->vH2SO4Blanco;
                      } echo $vH2SO4Blanco?>" name="vH2SO4Blanco" id="vH2SO4Blanco" type="text" class="form-control" ></td>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $phBlanco = $row->phBlanco;
                      } echo $phBlanco?>" name="phBlanco" id="phBlanco" type="text" class="form-control" ></td>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $resultadoBlanco = $row->resultadoBlanco;
                      } echo $resultadoBlanco?>" name="resultadoBlanco" id="resultadoBlanco" type="text" class="form-control" ></td>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $promedioBlanco = $row->promedioBlanco;
                      } echo $promedioBlanco?>" name=" promedioBlanco" id=" promedioBlanco" type="text" class="form-control" ></td>
                  <td rowspan="4"><textarea name="responsable" id="responsable" class="form-control" rows="10" ><?php
                     foreach($alcalinidadTotal->result() as $row){
                       $responsable = $row->responsable;
                      } echo $responsable?></textarea></td>
                </tr>
                <tr>
                  <td rowspan="3"> </td>
                  <td rowspan="2"></td>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $vMuestra1 = $row->vMuestra1;
                      } echo $vMuestra1?>" name="vMuestra1" id="vMuestra1" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $nH2SO41 = $row->nH2SO41;
                      } echo $nH2SO41?>" name="nH2SO41"  id="nH2SO41" type="text" class="form-control"  ></td>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $vH2SO41 = $row->vH2SO41;
                      } echo $vH2SO41?>" name="vH2SO41" id="vH2SO41" type="text" class="form-control" ></td>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $ph1 = $row->ph1;
                      } echo $ph1?>" name="ph1" id="ph1" type="text" class="form-control" ></td>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $resultado1 = $row->resultado1;
                      } echo $resultado1?>" name="resultado1" id="resultado1" type="text" class="form-control" ></td>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $promedio1 = $row->promedio1;
                      } echo $promedio1?>" name="promedio1" id=" promedio1" type="text" class="form-control" ></td>
                </tr>
                <tr>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $vMuestra2 = $row->vMuestra2;
                      } echo $vMuestra2?>" name="vMuestra2" id="vMuestra2" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $nH2SO42 = $row->nH2SO42;
                      } echo $nH2SO42?>" name="nH2SO42"  id="nH2SO42" type="text" class="form-control"  ></td>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $vH2SO42 = $row->vH2SO42;
                      } echo $vH2SO42?>" name="vH2SO42" id="vH2SO42" type="text" class="form-control" ></td>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $ph2 = $row->ph2;
                      } echo $ph2?>" name="ph2" id="ph2" type="text" class="form-control" ></td>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $resultado2 = $row->resultado2;
                      } echo $resultado2?>" name="resultado2" id="resultado2" type="text" class="form-control" ></td>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $promedio2 = $row->promedio2;
                      } echo $promedio2?>" name="promedio2" id=" promedio2" type="text" class="form-control" ></td>
                </tr>
                <tr>
                  <td >Solución Carta de Control</td>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $vMuestraSolucionCartaControl = $row->vMuestraSolucionCartaControl;
                      } echo $vMuestraSolucionCartaControl?>" name="vMuestraSolucionCartaControl" id="vMuestraSolucionCartaControl" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $nH2SO4SolucionCartaControl = $row->nH2SO4SolucionCartaControl;
                      } echo $nH2SO4SolucionCartaControl?>" name="nH2SO4SolucionCartaControl"  id="nH2SO4SolucionCartaControl" type="text" class="form-control"  ></td>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $vH2SO4SolucionCartaControl = $row->vH2SO4SolucionCartaControl;
                      } echo $vH2SO4SolucionCartaControl?>" name="vH2SO4SolucionCartaControl" id="vH2SO4SolucionCartaControl" type="text" class="form-control" ></td>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $phSolucionCartaControl = $row->phSolucionCartaControl;
                      } echo $phSolucionCartaControl?>" name="phSolucionCartaControl" id="phSolucionCartaControl" type="text" class="form-control" ></td>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $resultadoSolucionCartaControl = $row->resultadoSolucionCartaControl;
                      } echo $resultadoSolucionCartaControl?>" name="resultadoSolucionCartaControl" id="resultadoSolucionCartaControl" type="text" class="form-control" ></td>
                  <td><input value="<?php
                     foreach($alcalinidadTotal->result() as $row){
                       $promedioSolucionCartaControl = $row->promedioSolucionCartaControl;
                      } echo $promedioSolucionCartaControl?>" name="promedioSolucionCartaControl" id=" promedioSolucionCartaControl" type="text" class="form-control" ></td>
                </tr>
                <tr class="active">
                  <td colspan="9" >
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
