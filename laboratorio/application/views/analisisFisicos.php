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
                            Registrar Resultados <small>Análisis Físicos</small>
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
            echo form_open('welcome/registrarAnalisisFisicos'); 
          ?>
          <form class="form-horizontal" novalidate>
            <table class="table table-bordered">
              <thead>
                <tr >
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
                  <td><input name="fechaEnsayo" type="date" class="form-control" autofocus></td>
                  <td  rowspan="2"><input name="codigoMuestra" type="text" class="form-control"></td> 
                  <td><input name="ph1" id="ph1" type="text" class="form-control" onkeyup="sumar(this.name);"></td>
                  <td><input name="temperatura1"  id="temperatura1" type="text" class="form-control"  onkeyup="sumar(this.name);"></td>
                  <td><input name="colorAparente1" id="colorAparente1" type="text" class="form-control" onkeyup="sumar(this.name);"></td>
                  <td><input name="colorVerdadero1" id="colorVerdadero1" type="text" class="form-control" onkeyup="sumar(this.name);"></td>
                  <td><input name="turbiedad1" id="turbiedad1" type="text" class="form-control" onkeyup="sumar(this.name);"></td>
                  <td><input name="sustanciasFlotantes1" id="sustanciasFlotantes1" type="text" class="form-control" onkeyup="sumar(this.name);"></td>
                  <td><input name="olor1" id="olor1" type="text" class="form-control" onkeyup="sumar(this.name);"></td>
                  <td><input name="oxigenoDisuelto1" id="oxigenoDisuelto1" type="text" class="form-control" onkeyup="sumar(this.name);"></td>
                  <td><input name="conductividad1" id="conductividad1" type="text" class="form-control" onkeyup="sumar(this.name);"></td>
                  <td> <input name="temperaturaSegunda1" id="temperaturaSegunda1" type="text" class="form-control" onkeyup="sumar(this.name);"></td>
                  <td> <input name="fluoruros1" id="fluoruros1" type="text" class="form-control" onkeyup="sumar(this.name);"></td>
                </tr>
                <tr>
                  <td  rowspan="3"> </td>
                  <td><input name="ph2" id="ph2" type="text" class="form-control" onkeyup="sumar(this.name);"></td>
                  <td><input name="temperatura2"  id="temperatura2" type="text" class="form-control"  onkeyup="sumar(this.name);"></td>
                  <td><input name="colorAparente2" id="colorAparente2" type="text" class="form-control" onkeyup="sumar(this.name);"></td>
                  <td><input name="colorVerdadero2" id="colorVerdadero2" type="text" class="form-control" onkeyup="sumar(this.name);"></td>
                  <td><input name="turbiedad2" id="turbiedad2" type="text" class="form-control" onkeyup="sumar(this.name);"></td>
                  <td><input name="sustanciasFlotantes2" id="sustanciasFlotantes2" type="text" class="form-control" onkeyup="sumar(this.name);"></td>
                  <td><input name="olor2" id="olor2" type="text" class="form-control" onkeyup="sumar(this.name);"></td>
                  <td><input name="oxigenoDisuelto2" id="oxigenoDisuelto2" type="text" class="form-control" onkeyup="sumar(this.name);"></td>
                  <td><input name="conductividad2" id="conductividad2" type="text" class="form-control" onkeyup="sumar(this.name);"></td>
                  <td> <input name="temperaturaSegunda2" id="temperaturaSegunda2" type="text" class="form-control" onkeyup="sumar(this.name);"></td>
                  <td> <input name="fluoruros2" id="fluoruros2" type="text" class="form-control" onkeyup="sumar(this.name);"></td>
                </tr>
                <tr >
                  <td>Promedio</td>
                  <td><input name="phPromedio" id="phPromedio" type="text" class="form-control" readonly></td>
                  <td><input name="temperaturaPromedio" id="temperaturaPromedio" type="text" class="form-control" readonly></td>
                  <td><input name="colorAparentePromedio" id="colorAparentePromedio" type="text" class="form-control" readonly></td>
                  <td><input name="colorVerdaderoPromedio" id="colorVerdaderoPromedio" type="text" class="form-control" readonly></td>
                  <td><input name="turbiedadPromedio" id="turbiedadPromedio" type="text" class="form-control" readonly></td>
                  <td><input name="sustanciasFlotantesPromedio" id="sustanciasFlotantesPromedio" type="text" class="form-control" readonly></td>
                  <td><input name="olorPromedio" id="olorPromedio" type="text" class="form-control" readonly></td>
                  <td><input name="oxigenoDisueltoPromedio" id="oxigenoDisueltoPromedio" type="text" class="form-control" readonly></td>
                  <td><input name="conductividadPromedio" id="conductividadPromedio" type="text" class="form-control" readonly></td>
                  <td> <input name="temperaturaSegundaPromedio" id="temperaturaSegundaPromedio" type="text" class="form-control" readonly></td>
                  <td> <input name="fluorurosPromedio" id="fluorurosPromedio" type="text" class="form-control" readonly></td>
                </tr>
                <tr>
                  <td >Solución Carta de Control</td>
                  <td><input name="phSolucionCartaControl" type="text" class="form-control"></td>
                  <td class="active"><input name="temperaturaSolucionCartaControl" type="text" class="form-control"></td>
                  <td class="active"><input name="colorAparenteSolucionCartaControl" type="text" class="form-control"></td>
                  <td class="active"><input name="colorVerdaderoSolucionCartaControl" type="text" class="form-control"></td>
                  <td class="active"><input name="turbiedadSolucionCartaControl" type="text" class="form-control"></td>
                  <td class="active"><input name="sustanciasFlotantesSolucionCartaControl" type="text" class="form-control"></td>
                  <td class="active"><input name="olorSolucionCartaControl" type="text" class="form-control"></td>
                  <td class="active"><input name="oxigenoDisueltoSolucionCartaControl" type="text" class="form-control"></td>
                  <td class="active"><input name="conductividadSolucionCartaControl" type="text" class="form-control"></td>
                  <td class="active"> <input name="temperaturaSegundaSolucionCartaControl" type="text" class="form-control"></td>
                  <td class="active"> <input name="fluorurosSolucionCartaControl" type="text" class="form-control"></td>
                </tr>
                <tr>
                 <td colspan="2" class="active">Responsable</td>
                 <td><input name="phResponsable" type="text" class="form-control"></td>
                  <td><input name="temperaturaResponsable" type="text" class="form-control"></td>
                  <td><input name="colorAparenteResponsable" type="text" class="form-control"></td>
                  <td><input name="colorVerdaderoResponsable" type="text" class="form-control"></td>
                  <td><input name="turbiedadResponsable" type="text" class="form-control"></td>
                  <td><input name="sustanciasFlotantesResponsable" type="text" class="form-control"></td>
                  <td><input name="olorResponsable" type="text" class="form-control"></td>
                  <td><input name="oxigenoDisueltoResponsable" type="text" class="form-control"></td>
                  <td><input name="conductividadResponsable" type="text" class="form-control"></td>
                  <td> <input name="temperaturaSegundaResponsable" type="text" class="form-control"></td>
                  <td> <input name="fluorurosResponsable" type="text" class="form-control"></td>
                </tr>
                <tr class="active">
                  <td colspan="13" >
                    <div class="row">
                      <div class="col-sm-4"></div>
                      <div class="col-sm-4"><button type="submit" class="btn btn-primary btn-block" >Registrar</button></div></div>
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
