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
                    <ul class="dropdown-menu">
                        
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
                            Editar Resultado <small>Análisis Físicos</small>
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
                              foreach ($analisisFisicos->result() as $row){
                                $codigoInterno = $row->codigoInterno;
                              }
                              $link = '<a class="ask" href="//localhost/laboratorio/index.php/welcome/verResultado/'.$codigoInterno.'/analisisFisicos" target="_blank" onClick="window.open(this.href, this.target, width=300, height=400); return false;">'.$codigoInterno.'</a>';
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
            echo form_open('welcome/actualizarAnalisisFisicos'); 
          ?>

<div class="row">
  <div class="col-lg-4">
   <?php
     foreach($analisisFisicos->result() as $row){
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
            <table border="1">
              <thead>
                <tr style="background-color: #D9D9D9;">
                  <th><div style="width: 100px;" >Fecha del Ensayo</div></th>
                  <th><div style="width: 100px;">Código de Muestra</div></th>
                  <th><div style="width: 100px;">pH (Unidades)</th>
                  <th><div style="width: 100px;">Temperatura (C°)</th>
                  <th><div style="width: 100px;">Color Aparente (UPC)</th>
                  <th><div style="width: 100px;">Color Verdadero (UPC)</th>
                  <th><div style="width: 100px;">Turbiedad (NTU)</th>
                  <th><div style="width: 100px;">Sustancias Flotantes (UPC)</th>
                  <th><div style="width: 100px;">Olor</th>
                  <th><div style="width: 100px;">Oxígeno Disuelto(mg O<sub>2</sub>/L)</th>
                  <th><div style="width: 100px;">Conductividad (&#181;s/cm)</th>
                  <th><div style="width: 100px;">Temperatura (°C)</th>
                  <th><div style="width: 100px;">Fluoruros (mg F<sup>-</sup>/L)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input name="fechaEnsayo" type="date" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $fechaEnsayo = $row->fechaEnsayo;
                      } echo $fechaEnsayo?>"></td>
                  <td  rowspan="2"><input name="codigoMuestra" type="text" class="form-control" readonly value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $codigoMuestra = $row->codigoMuestra;
                      } echo $codigoMuestra?>"></td> 
                  <td><input name="ph1" id="ph1" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $ph1 = $row->ph1;
                      } echo $ph1?>" onkeyup="sumar(this.name);"></td>
                  <td><input name="temperatura1"  id="temperatura1" type="text" class="form-control"  value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $temperatura1 = $row->temperatura1;
                      } echo $temperatura1?>" onkeyup="sumar(this.name);"></td>
                  <td><input name="colorAparente1" id="colorAparente1" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $colorAparente1 = $row->colorAparente1;
                      } echo $colorAparente1?>" onkeyup="sumar(this.name);"></td>
                  <td><input name="colorVerdadero1" id="colorVerdadero1" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $colorVerdadero1 = $row->colorVerdadero1;
                      } echo $colorVerdadero1?>" onkeyup="sumar(this.name);"></td>
                  <td><input name="turbiedad1" id="turbiedad1" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $turbiedad1 = $row->turbiedad1;
                      } echo $turbiedad1?>" onkeyup="sumar(this.name);"></td>
                  <td><input name="sustanciasFlotantes1" id="sustanciasFlotantes1" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $sustanciasFlotantes1 = $row->sustanciasFlotantes1;
                      } echo $sustanciasFlotantes1?>"  onkeyup="sumar(this.name);"></td>
                  <td><input name="olor1" id="olor1" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $olor1 = $row->olor1;
                      } echo $olor1?>" onkeyup="sumar(this.name);"></td>
                  <td><input name="oxigenoDisuelto1" id="oxigenoDisuelto1" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $oxigenoDisuelto1 = $row->oxigenoDisuelto1;
                      } echo $oxigenoDisuelto1?>" onkeyup="sumar(this.name);"></td>
                  <td><input name="conductividad1" id="conductividad1" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $conductividad1 = $row->conductividad1;
                      } echo $conductividad1?>" onkeyup="sumar(this.name);"></td>
                  <td> <input name="temperaturaSegunda1" id="temperaturaSegunda1" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $temperaturaSegunda1 = $row->temperaturaSegunda1;
                      } echo $temperaturaSegunda1?>" onkeyup="sumar(this.name);"></td>
                  <td> <input name="fluoruros1" id="fluoruros1" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $fluoruros1 = $row->fluoruros1;
                      } echo $fluoruros1?>" onkeyup="sumar(this.name);"></td>
                </tr>
                <tr>
                  <td  rowspan="3"> </td>
                  <td><input name="ph2" id="ph2" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $ph2 = $row->ph2;
                      } echo $ph2?>" onkeyup="sumar(this.name);"></td>
                  <td><input name="temperatura2"  id="temperatura2" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $temperatura2 = $row->temperatura2;
                      } echo $temperatura2?>"  onkeyup="sumar(this.name);"></td>
                  <td><input name="colorAparente2" id="colorAparente2" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $colorAparente2 = $row->colorAparente2;
                      } echo $colorAparente2?>" onkeyup="sumar(this.name);"></td>
                  <td><input name="colorVerdadero2" id="colorVerdadero2" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $colorVerdadero2 = $row->colorVerdadero2;
                      } echo $colorVerdadero2?>" onkeyup="sumar(this.name);"></td>
                  <td><input name="turbiedad2" id="turbiedad2" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $turbiedad2 = $row->turbiedad2;
                      } echo $turbiedad2?>" onkeyup="sumar(this.name);"></td>
                  <td><input name="sustanciasFlotantes2" id="sustanciasFlotantes2" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $sustanciasFlotantes2 = $row->sustanciasFlotantes2;
                      } echo $sustanciasFlotantes2?>" onkeyup="sumar(this.name);"></td>
                  <td><input name="olor2" id="olor2" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $olor2 = $row->olor2;
                      } echo $olor2?>" onkeyup="sumar(this.name);"></td>
                  <td><input name="oxigenoDisuelto2" id="oxigenoDisuelto2" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $oxigenoDisuelto2 = $row->oxigenoDisuelto2;
                      } echo $oxigenoDisuelto2?>" onkeyup="sumar(this.name);"></td>
                  <td><input name="conductividad2" id="conductividad2" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $conductividad2 = $row->conductividad2;
                      } echo $conductividad2?>" onkeyup="sumar(this.name);"></td>
                  <td> <input name="temperaturaSegunda2" id="temperaturaSegunda2" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $temperaturaSegunda2 = $row->temperaturaSegunda2;
                      } echo $temperaturaSegunda2?>" onkeyup="sumar(this.name);"></td>
                  <td> <input name="fluoruros2" id="fluoruros2" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $fluoruros2 = $row->fluoruros2;
                      } echo $fluoruros2?>" onkeyup="sumar(this.name);"></td>
                </tr>
                <tr style="background-color: #D9D9D9;">
                  <td>Promedio</td>
                  <td><input name="phPromedio" id="phPromedio" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $phPromedio = $row->phPromedio;
                      } echo $phPromedio?>" readonly></td>
                  <td><input name="temperaturaPromedio" id="temperaturaPromedio" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $temperaturaPromedio = $row->temperaturaPromedio;
                      } echo $temperaturaPromedio?>" readonly></td>
                  <td><input name="colorAparentePromedio" id="colorAparentePromedio" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $colorAparentePromedio = $row->colorAparentePromedio;
                      } echo $colorAparentePromedio?>" readonly></td>
                  <td><input name="colorVerdaderoPromedio" id="colorVerdaderoPromedio" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $colorVerdaderoPromedio = $row->colorVerdaderoPromedio;
                      } echo $colorVerdaderoPromedio?>" readonly></td>
                  <td><input name="turbiedadPromedio" id="turbiedadPromedio" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $turbiedadPromedio = $row->turbiedadPromedio;
                      } echo $turbiedadPromedio?>" readonly></td>
                  <td><input name="sustanciasFlotantesPromedio" id="sustanciasFlotantesPromedio" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $sustanciasFlotantesPromedio = $row->sustanciasFlotantesPromedio;
                      } echo $sustanciasFlotantesPromedio?>" readonly></td>
                  <td><input name="olorPromedio" id="olorPromedio" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $olorPromedio = $row->olorPromedio;
                      } echo $olorPromedio?>" readonly></td>
                  <td><input name="oxigenoDisueltoPromedio" id="oxigenoDisueltoPromedio" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $oxigenoDisueltoPromedio = $row->oxigenoDisueltoPromedio;
                      } echo $oxigenoDisueltoPromedio?>" readonly></td>
                  <td><input name="conductividadPromedio" id="conductividadPromedio" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $conductividadPromedio = $row->conductividadPromedio;
                      } echo $conductividadPromedio?>" readonly></td>
                  <td> <input name="temperaturaSegundaPromedio" id="temperaturaSegundaPromedio" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $temperaturaSegundaPromedio = $row->temperaturaSegundaPromedio;
                      } echo $temperaturaSegundaPromedio?>" readonly></td>
                  <td> <input name="fluorurosPromedio" id="fluorurosPromedio" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $fluorurosPromedio = $row->fluorurosPromedio;
                      } echo $fluorurosPromedio?>" readonly></td>
                </tr>
                <tr>
                  <td >Solución Carta de Control</td>
                  <td><input name="phSolucionCartaControl" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $phSolucionCartaControl = $row->phSolucionCartaControl;
                      } echo $phSolucionCartaControl?>"></td>
                  <td class="active"><input name="temperaturaSolucionCartaControl" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $temperaturaSolucionCartaControl = $row->temperaturaSolucionCartaControl;
                      } echo $temperaturaSolucionCartaControl?>"></td>
                  <td class="active"><input name="colorAparenteSolucionCartaControl" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $colorAparenteSolucionCartaControl = $row->colorAparenteSolucionCartaControl;
                      } echo $colorAparenteSolucionCartaControl?>"></td>
                  <td class="active"><input name="colorVerdaderoSolucionCartaControl" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $colorVerdaderoSolucionCartaControl = $row->colorVerdaderoSolucionCartaControl;
                      } echo $colorVerdaderoSolucionCartaControl?>"></td>
                  <td class="active"><input name="turbiedadSolucionCartaControl" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $turbiedadSolucionCartaControl = $row->turbiedadSolucionCartaControl;
                      } echo $turbiedadSolucionCartaControl?>"></td>
                  <td class="active"><input name="sustanciasFlotantesSolucionCartaControl" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $sustanciasFlotantesSolucionCartaControl = $row->sustanciasFlotantesSolucionCartaControl;
                      } echo $sustanciasFlotantesSolucionCartaControl?>"></td>
                  <td class="active"><input name="olorSolucionCartaControl" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $olorSolucionCartaControl = $row->olorSolucionCartaControl;
                      } echo $olorSolucionCartaControl?>"></td>
                  <td class="active"><input name="oxigenoDisueltoSolucionCartaControl" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $oxigenoDisueltoSolucionCartaControl = $row->oxigenoDisueltoSolucionCartaControl;
                      } echo $oxigenoDisueltoSolucionCartaControl?>"></td>
                  <td class="active"><input name="conductividadSolucionCartaControl" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $conductividadSolucionCartaControl = $row->conductividadSolucionCartaControl;
                      } echo $conductividadSolucionCartaControl?>"></td>
                  <td class="active"> <input name="temperaturaSegundaSolucionCartaControl" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $temperaturaSolucionCartaControl = $row->temperaturaSolucionCartaControl;
                      } echo $temperaturaSolucionCartaControl?>"></td>
                  <td class="active"> <input name="fluorurosSolucionCartaControl" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $fluorurosSolucionCartaControl = $row->fluorurosSolucionCartaControl;
                      } echo $fluorurosSolucionCartaControl?>"></td>
                </tr>
                <tr>
                 <td colspan="2" class="active">Responsable</td>
                 <td><input name="phResponsable" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $phResponsable = $row->phResponsable;
                      } echo $phResponsable?>"></td>
                  <td><input name="temperaturaResponsable" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $temperaturaResponsable = $row->temperaturaResponsable;
                      } echo $temperaturaResponsable?>"></td>
                  <td><input name="colorAparenteResponsable" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $colorAparenteResponsable = $row->colorAparenteResponsable;
                      } echo $colorAparenteResponsable?>"></td>
                  <td><input name="colorVerdaderoResponsable" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $colorVerdaderoResponsable = $row->colorVerdaderoResponsable;
                      } echo $colorVerdaderoResponsable?>"></td>
                  <td><input name="turbiedadResponsable" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $turbiedadResponsable = $row->turbiedadResponsable;
                      } echo $turbiedadResponsable?>"></td>
                  <td><input name="sustanciasFlotantesResponsable" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $sustanciasFlotantesResponsable = $row->sustanciasFlotantesResponsable;
                      } echo $sustanciasFlotantesResponsable?>"></td>
                  <td><input name="olorResponsable" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $olorResponsable = $row->olorResponsable;
                      } echo $olorResponsable?>"></td>
                  <td><input name="oxigenoDisueltoResponsable" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $oxigenoDisueltoResponsable = $row->oxigenoDisueltoResponsable;
                      } echo $oxigenoDisueltoResponsable?>"></td>
                  <td><input name="conductividadResponsable" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $conductividadResponsable = $row->conductividadResponsable;
                      } echo $conductividadResponsable?>"></td>
                  <td> <input name="temperaturaSegundaResponsable" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $temperaturaSegundaResponsable = $row->temperaturaSegundaResponsable;
                      } echo $temperaturaSegundaResponsable?>"></td>
                  <td> <input name="fluorurosResponsable" type="text" class="form-control" value="<?php
                     foreach($analisisFisicos->result() as $row){
                       $fluorurosResponsable = $row->fluorurosResponsable;
                      } echo $fluorurosResponsable?>"></td>
                </tr>
                <tr class="active">
                  <td colspan="13" >
                    <div class="row">
                      <div class="col-sm-4"></div>
                      <div class="col-sm-4"><button type="submit" class="btn btn-primary btn-block" >Actualizar</button></div></div>
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
