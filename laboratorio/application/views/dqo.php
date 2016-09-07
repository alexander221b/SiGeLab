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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata('usuario'); ?>
<b class="caret"></b></a>
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
                            Registrar Resultados <small>DQO</small>
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
            echo form_open('welcome/registrarDqo'); 
          ?>
          <form class="form-horizontal" novalidate>
            <table class="table table-bordered" >
               <thead>
                <tr>
                  <th class="active"><div style="width: 100px;"></div></th>
                  <th class="active"><div style="width: 100px;">V (ml) alícuota K<sub>2</sub>Cr<sub>2</sub>O<sub>7</sub> 0,1 N</div></th>
                  <th class="active"><div style="width: 100px;">V (ml.) FAS</div></th>
                  <th class="active"><div style="width: 100px;">Normalidad FAS 0,05 N calculada</div></th>
                  <th class="active"><div style="width: 100px;">Normalidad Promedio FAS 0,05 N</div></th>
                  <th class="active"><div style="width: 100px;">V (mL) Consumido Blanco</div></th>
                </tr>
              </thead>
              <tr>
                  <th rowspan="3" class="active"><strong>Estandarización</strong></td>
                  <td><input name="vAlicuota1" id="vAlicuota1" type="text" class="form-control"></td>
                  <td><input name="vFas11" id="vFas11" type="text" class="form-control"></td>                
                  <td><input name="normalidadFas1" id="normalidadFas1" type="text" class="form-control"></td>
                  <td rowspan="2"><input name="normalidadPromedioFas" id="normalidadPromedioFas" type="text" class="form-control"></td>
                  <td><input name="vConsumidoBlanco1" id="vConsumidoBlanco1" type="text" class="form-control"></td>
                </tr>
                <tr>
                  <td><input name="vAlicuota2" id="vAlicuota2" type="text" class="form-control"></td>                  
                  <td ><input name="vFas12" id="vFas12" type="text" class="form-control"></td>
                  <td><input name="normalidadFas2" id="normalidadFas2" type="text" class="form-control"></td>
                  <td><input name="vConsumidoBlanco2" id="vConsumidoBlanco2" type="text" class="form-control"></td>
                </tr>
              <thead>
                <tr>
                  <th class="active"><div style="width: 100px;">Fecha de Análisis</div></th>
                  <th class="active"><div style="width: 100px;">Código de Muestra</div></th>
                  <th class="active"><div style="width: 100px;">V (mL) muestra</div></th>
                  <th class="active"><div style="width: 100px;">Factor de Dilución</div></th>
                  <th class="active"><div style="width: 100px;">V (mL) FAS</div></th>
                  <th class="active"><div style="width: 100px;">Concentración (mg O2/ L)</div></th>
                  <th class="active"><div style="width: 100px;">Concentración Promedio (mg O2/ L)</div></th>
                  <th class="active"><div style="width: 100px;">Responsable</div></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="4"><input name="fechaAnalisis" id="fechaAnalisis" type="date" class="form-control"></td>
                  <td rowspan="3"><input name="codigoMuestra" id="codigoMuestra" type="text" class="form-control"></td>
                  <td rowspan="3"><input name="vMuestra" id="vMuestra" type="text" class="form-control"></td>                
                  <td><input name="factorDilucion1" id="factorDilucion1" type="text" class="form-control"></td>
                  <td><input name="vFas21" id="vFas21" type="text" class="form-control"></td>
                  <td><input name="concentracion1" id="concentracion1" type="text" class="form-control"></td>
                  <td rowspan="3"><input name="concentracionPromedio" id="concentracionPromedio" type="text" class="form-control"></td>
                  <td rowspan="4"><textarea name="responsable" id="responsable" class="form-control" rows="9" ></textarea></td>
                </tr>
                 <tr>
                  <td><input name="factorDilucion2" id="factorDilucion2" type="text" class="form-control"></td>                
                  <td><input name="vFas22" id="vFas" type="text" class="form-control"></td>
                  <td><input name="concentracion2" id="concentracion2" type="text" class="form-control"></td>
                </tr>
                 <tr>                
                  <td><input name="factorDilucion3" id="factorDilucion3" type="text" class="form-control"></td>
                  <td><input name="vFas23" id="vFas23" type="text" class="form-control"></td>
                  <td><input name="concentracion3" id="concentracion3" type="text" class="form-control"></td>
                </tr>
                <tr>
                  <td>Solución Carta de Control</td>                  
                  <td ><input name="vMuestraSolucionCartaControl" id="vMuestraSolucionCartaControl" type="text" class="form-control"></td>
                  <td><input name="factorDilucionSolucionCartaControl" id="factorDilucionSolucionCartaControl" type="text" class="form-control"></td>
                  <td><input name="vFas2SolucionCartaControl" id="vFas2SolucionCartaControl" type="text" class="form-control"></td>
                  <td><input name="concentracionSolucionCartaControl" id="concentracionSolucionCartaControl" type="text" class="form-control"></td>
                  <td><input name="concentracionPromedioSolucionCartaControl" id="concentracionPromedioSolucionCartaControl" type="text" class="form-control"></td>
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
