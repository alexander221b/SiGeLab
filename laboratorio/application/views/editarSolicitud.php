<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Editar Solicitud</title>
  <!-- Bootstrap Core CSS -->
  <link href="\laboratorio\css\bootstrap.min.css" rel="stylesheet">
  <!-- Barra lateral y superior personalizada -->
  <link href="\laboratorio\css\sb-admin.css" rel="stylesheet">
  <!-- Gráficos Morris -->
  <link href="\laboratorio\css\plugins\morris.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="\laboratorio\font-awesome\css\font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Tabla dinámica -->
  <script src="\laboratorio\js\jquery-latest.js"></script>
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
                            <a href="<?php echo site_url('welcome/cerrarSesion'); ?>"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión </a>
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
                    <li class="active">
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
                            <li class="active">
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
      
                    <li>
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
                            Editar Solicitud <small>Formulario de edición</small>
                        </h1>
                        <ol class="breadcrumb">
                          <li>
                            <i class="fa fa-home"></i>  
                            <a href="<?php echo site_url('welcome/inicio'); ?>">Inicio</a>
                          </li>
                          <li class="active">
                            <i class="fa fa-clock-o"></i> Solicitud
                          </li> 
                          <li>
                            <?php
                              foreach ($solicitud->result() as $row){
                                $id = $row->id;
                              }
                              $link = '<a class="ask" href="//localhost/laboratorio/index.php/welcome/verSolicitud/'.$id.'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">'.$id.'</a>';
                              echo $link;
                            ?> 
                          </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                          

<?php
  if (isset($solicitudActualizada)){
    echo " 
      <div class='alert alert-info'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        La <strong>Solicitud No. ".$solicitudActualizada."</strong>
        ha sido actualizada en la base de datos.
      </div> 
    "; 
                }

?>

<style type="text/css">
  table, th, td {
    padding-top: 2px;     
    padding-bottom: 2px;
    padding-left: 4px;
    padding-right: 4px;
  }
  .margenGuia { 
  border: black 0px solid; 
  margin-left: 0px; 
  margin-right: 0px; 
  width: 716px; 
}
</style>
 

<div class="margenGuia">
    <div align=center style="font-size:12.0pt;">
      <font color="grey" face="arial">
        <strong>VICERRECTORÍA DE INVESTIGACIONES, INNOVACIÓN <br> Y EXTENSION<br><br>
        </strong>
      </font>
    </div>
    <div class="col-sm-8">
      <div align=right style="font-size:12.0pt;">
        <font color="grey" face="arial">
          <strong>SOLICITUD DE SERVICIO
          </strong><br><br>
        </font> 
      </div>
    </div>
    <div class="col-sm-2">
      <div align="center" >
        <IMG SRC="\laboratorio\imagenes\gestionCalidad.png" WIDTH="120" HEIGHT="50" >
      </div>
    </div>
    <div class="col-sm-2">
      <div align=left>
        <table border="1" style="text-align: center; font-size:6.0pt; color:grey; border: grey;">
          <tr>
            <td style="padding: 0px;">Código</td>
            <td style="padding: 0px;">123-LAA-F04</td>
          </tr>
          <tr>
            <td style="padding: 0px;">Versión</td>
            <td style="padding: 0px;">1</td>
          </tr>
          <tr>
            <td style="padding: 0px;">Fecha</td>
            <td style="padding: 0px;">21/01/2010</td>
          </tr>
          <tr>
            <td style="padding: 0px;">Página</td>
            <td style="padding: 0px;">1 de 1</td>
          </tr>
        </table>
      </div>
    </div>
    <br>
    <br>
    <br>
    <br> 
    <table border="1" style="width: 310px; color:black; font-size:10.0pt; ">
      <tr>
        <th style="padding-top: 0px; padding-bottom: 0px;"><strong> &nbsp Laboratorio:</strong></th>
        <th style="padding-top: 0px; padding-bottom: 0px;"><strong>&nbsp Análisis de Aguas y Alimentos</strong></th>
      </tr>
    </table>
    <br>
    <?php 
      echo form_open('welcome/actualizarSolicitud'); 
    ?>
    <table border="1" style="width: 720px; text-align: center;  color:black; font-size:10.0pt; border-right:solid black 1.5pt; border-left:solid black 1.5pt; border-top:solid black 1.5pt;">
      <tr>
        <th colspan="5" style="background-color: #D9D9D9; text-align: center">Fecha</td>
        <td colspan="3" style=" width: 100px;"></td>
        <td style="width: 450px; border-left:hidden" rowspan="3" colspan="8"></td>
      </tr>
      <tr>
        <th style=" width: 80px; background-color: #D9D9D9; text-align: center">Día</td>
        <th colspan="3" style=" width: 40px; background-color: #D9D9D9; text-align: center">Mes</td>
        <th style=" width: 80px; background-color: #D9D9D9; text-align: center">Año</td>
        <td style="border-right:hidden; border-top:hidden" rowspan="2" ></td>
      </tr>
      <tr>
        <td colspan="5" style="width: 100px;"><input value="<?php
            foreach($solicitud->result() as $row){
              $fecha = $row->fecha;
            } 
            echo $fecha;   
          ?>"  style="width: 240px; height: 26px"  type="date" name="fecha" required></td>
      </tr>
    </table>
    <table style="width: 720px; text-align: center; color:black; font-size:10.0pt;">
      <tr>
        <th colspan="17" style="padding-top: 8px; padding-bottom: 8px; background-color: #D9D9D9; text-align: center; border-right:solid black 1.5pt; border-left:solid black 1.5pt;">DATOS DE LA EMPRESA</td>
      </tr>
    </table>
    <table border="1" style=" border-left:solid black 1.5pt; border-bottom:solid black 1.5pt; border-right:solid black 1.5pt; width: 720px; text-align: center; color:black; font-size:10.0pt;">
      <tr>
        <td colspan="4" style="text-align: left;">
          Razón Social: <input value="<?php
            foreach($solicitud->result() as $row){
              $razonSocial = $row->razonSocial;
            } 
            echo $razonSocial;   
          ?>" type="text" name="razonSocial" style="width: 324px" required>
        </td>
        <td colspan="6" style="text-align: left; ">    
          Nit o C.C : <input value="<?php
            foreach($solicitud->result() as $row){
              $nitCc = $row->nitCc;
            } 
            echo $nitCc;   
          ?>" type="text" name="nitCc" style="width: 221px;" required></td>
      </tr>
      <tr>
        <td colspan="4" style="text-align: left">
          Solicitante: <input value="<?php
            foreach($solicitud->result() as $row){
              $solicitante = $row->solicitante;
            } 
            echo $solicitante;   
          ?>" type="text" name="solicitante" style="width: 341px" required>
        </td>
        <td colspan="6" style="text-align: left;">
          Cargo: <input value="<?php
            foreach($solicitud->result() as $row){
              $cargo = $row->cargo;
            } 
            echo $cargo;   
          ?>" type="text" name="cargo" style="width: 246px" required>
        </td>
      </tr>
       <tr>
        <td colspan="4" style="text-align: left">Dirección: <input value="<?php
            foreach($solicitud->result() as $row){
              $direccion = $row->direccion;
            } 
            echo $direccion;   
          ?>" type="text" name="direccion" style="width: 347px" required></td>
        <td colspan="6" style=" text-align: left; ">Teléfono/Fax: <input value="<?php
            foreach($solicitud->result() as $row){
              $telefonoFax = $row->telefonoFax;
            } 
            echo $telefonoFax;   
          ?>" type="text" name="telefonoFax" style="width: 205px" required></td>
      </tr>
      <tr>
        <td colspan="4" style="text-align: left"> Municipio/Departamento: <input value="<?php
            foreach($solicitud->result() as $row){
              $municipioDepartamento = $row->municipioDepartamento;
            } 
            echo $municipioDepartamento;   
          ?>" type="text" name="municipioDepartamento" style="width: 261px" required></td>
        <td colspan="6" style="text-align: left; ">Correo electrónico: <input value="<?php
            foreach($solicitud->result() as $row){
              $correoElectronico = $row->correoElectronico;
            } 
            echo $correoElectronico;   
          ?>" type="text" name="correoElectronico" style="width: 175px" required></td>
      </tr>
    </table>
    <br>
    <form method="post">  
      <table id="tabla" border="1" style="width: 720px; border:solid black 1.5pt; color:black">
       <tr>
        <td>
           No. de Muestras <input value="<?php
            foreach($solicitud->result() as $row){
              $numeroMuestras = $row->numeroMuestras;
            } 
            echo $numeroMuestras;   
          ?>" name="numeroMuestras" type="number">
           Tipo de Muestras <input value="<?php
            foreach($solicitud->result() as $row){
              $tipoMuestras = $row->tipoMuestras;
            } 
            echo $tipoMuestras;   
          ?>" name="tipoMuestras" type="text">
           <br><br>
           Parámetros: <br>
           <textarea name="parametros" rows=5 cols=98 spellcheck="true"><?php
            foreach($solicitud->result() as $row){
              $parametros = $row->parametros;
            } 
            echo $parametros;   
          ?></textarea>
         </td>
       </tr>  
        <tr>
        <td>
           <b>OBSERVACIONES:</b>
           <textarea name="observaciones" rows=5 cols=98 spellcheck="true"><?php
            foreach($solicitud->result() as $row){
              $observaciones = $row->observaciones;
            } 
            echo $observaciones;   
          ?></textarea>
        </tr>
        </td>
        <tr>
        <td>
           Cotización Elaborada Por: <input value="<?php
            foreach($solicitud->result() as $row){
              $cotizacionElaboradaPor = $row->cotizacionElaboradaPor;
            } 
            echo $cotizacionElaboradaPor;   
          ?>" name="cotizacionElaboradaPor" type="text">
        </td>
       </tr>
   </table>
</div> 
<!-- Fin margen guía -->
<br>

<input type="hidden" name="id" id="id" value="<?php
            foreach($solicitud->result() as $row){
              $id = $row->id;
            } 
            echo $id;   
          ?>"></input>

<div class="col-sm-2">
  </div>
<div class="col-sm-4">
  <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
</div>
<div class="col-sm-2">
  </div>

 </form> 

<br><br><br><br><br><br><br><br><br>

<?php 
    echo form_close();
?>
 

 

<br><br><br><br>
 
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
