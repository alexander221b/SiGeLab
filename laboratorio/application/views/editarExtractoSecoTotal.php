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
                            Editar Resultados <small>Extracto Seco total</small>
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
                              foreach ($extractoSecoTotal->result() as $row){
                                $codigoInterno = $row->codigoInterno;
                              }
                              $link = '<a class="ask" href="//localhost/laboratorio/index.php/welcome/verResultado/'.$codigoInterno.'/extractoSecoTotal" target="_blank" onClick="window.open(this.href, this.target, width=300, height=400); return false;">'.$codigoInterno.'</a>';
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
            echo form_open('welcome/actualizarExtractoSecoTotal'); 
          ?>

<div class="row">
  <div class="col-lg-4">
   <?php
     foreach($extractoSecoTotal->result() as $row){
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
                  <th><div style="width: 100px;">No. de cápsula</th>
                  <th><div style="width: 100px;">M cápsula vacía (g)</th>
                  <th><div style="width: 100px;">Cantidad muestra (g)</th>
                  <th><div style="width: 100px;">M después del secado 1 (g)</th>
                  <th><div style="width: 100px;">M después del secado 2 (g)</th>
                  <th><div style="width: 100px;">Extracto Seco Total (g/100g)</th>
                  <th><div style="width: 100px;">Promedio E.S.T  (g/100g)</th>
                  <th><div style="width: 100px;">Responsable</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="2"> <input value="<?php
                     foreach($extractoSecoTotal->result() as $row){
                       $fechaEnsayo = $row->fechaEnsayo;
                      } echo $fechaEnsayo?>" name="fechaEnsayo" id="fechaEnsayo" type="date" class="form-control"></td>
                  <td rowspan="2"><input value="<?php
                     foreach($extractoSecoTotal->result() as $row){
                       $codigoMuestra = $row->codigoMuestra;
                      } echo $codigoMuestra?>" name="codigoMuestra" id="codigoMuestra" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($extractoSecoTotal->result() as $row){
                       $NoCapsula1 = $row->NoCapsula1;
                      } echo $NoCapsula1?>" name="NoCapsula1" id="NoCapsula1" type="text" class="form-control"></td>                
                  <td><input value="<?php
                     foreach($extractoSecoTotal->result() as $row){
                       $McapsulaVacia1 = $row->McapsulaVacia1;
                      } echo $McapsulaVacia1?>" name="McapsulaVacia1" id="McapsulaVacia1" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($extractoSecoTotal->result() as $row){
                       $cantidadMuestra1 = $row->cantidadMuestra1;
                      } echo $cantidadMuestra1?>" name="cantidadMuestra1" id="cantidadMuestra1" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($extractoSecoTotal->result() as $row){
                       $mDespuesSecado11 = $row->mDespuesSecado11;
                      } echo $mDespuesSecado11?>" name="mDespuesSecado11" id="mDespuesSecado11" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($extractoSecoTotal->result() as $row){
                       $mdespuesSecado21 = $row->mdespuesSecado21;
                      } echo $mdespuesSecado21?>" name="mdespuesSecado21" id="mdespuesSecado21" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($extractoSecoTotal->result() as $row){
                       $extractoSecoTotal1 = $row->extractoSecoTotal1;
                      } echo $extractoSecoTotal1?>" name="extractoSecoTotal1" id="extractoSecoTotal1" type="text" class="form-control"></td>
                  <td rowspan="2"><textarea name="promedioEst" id="promedio" class="form-control" rows="5" ><?php
                     foreach($extractoSecoTotal->result() as $row){
                       $promedioEst = $row->promedioEst;
                      } echo $promedioEst?></textarea></td>
                  <td rowspan="2"><textarea name="responsable" id="responsable" class="form-control" rows="5" ><?php
                     foreach($extractoSecoTotal->result() as $row){
                       $responsable = $row->responsable;
                      } echo $responsable?></textarea></td>
                </tr>
                <tr>
                  <td><input value="<?php
                     foreach($extractoSecoTotal->result() as $row){
                       $NoCapsula2 = $row->NoCapsula2;
                      } echo $NoCapsula2?>" name="NoCapsula2" id="NoCapsula2" type="text" class="form-control"></td>                  
                  <td ><input value="<?php
                     foreach($extractoSecoTotal->result() as $row){
                       $McapsulaVacia2 = $row->McapsulaVacia2;
                      } echo $McapsulaVacia2?>" name="McapsulaVacia2" id="McapsulaVacia2" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($extractoSecoTotal->result() as $row){
                       $cantidadMuestra2 = $row->cantidadMuestra2;
                      } echo $cantidadMuestra2?>" name="cantidadMuestra2" id="cantidadMuestra2" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($extractoSecoTotal->result() as $row){
                       $mDespuesSecado12 = $row->mDespuesSecado12;
                      } echo $mDespuesSecado12?>" name="mDespuesSecado12" id="mDespuesSecado12" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($extractoSecoTotal->result() as $row){
                       $mdespuesSecado22 = $row->mdespuesSecado22;
                      } echo $mdespuesSecado22?>" name="mdespuesSecado22" id="mdespuesSecado22" type="text" class="form-control"></td>
                  <td><input value="<?php
                     foreach($extractoSecoTotal->result() as $row){
                       $extractoSecoTotal2 = $row->extractoSecoTotal2;
                      } echo $extractoSecoTotal2?>" name="extractoSecoTotal2" id="extractoSecoTotal2" type="text" class="form-control"></td>
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
