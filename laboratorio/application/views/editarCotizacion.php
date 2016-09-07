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
                     <li class="active">
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
                   
                    <li  >
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
                            Editar Cotización <small>Formulario de edición</small>
                        </h1>
                        <ol class="breadcrumb">
                          <li>
                            <i class="fa fa-home"></i>  
                            <a href="<?php echo site_url('welcome/inicio'); ?>">Inicio</a>
                          </li>
                          <li class="active">
                            <i class="fa fa-pencil-square-o"></i> Cotización
                          </li> 
                          <li>
                            <?php
                              foreach ($datosMuestras->result() as $row){
                                $cotizacionNo = $row->cotizacionNo;
                              }
                              $link = '<a href="//localhost/laboratorio/index.php/welcome/verCotizacion/'.$cotizacionNo.'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600 '."'".'); return false;">'.$cotizacionNo.'</a>';
                              echo $link;
                            ?> 
                          </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                          

<style type="text/css">
  table, th, td {
    padding-top: 2px;     
    padding-bottom: 2px;
    padding-left: 4px;
    padding-right: 4px;
  }
</style>


<?php
 
  if (isset($actualizado)){
    echo " 
      <div class='alert alert-info'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        La <strong>Cotización No. ".$actualizado."</strong>
        ha sido actualizada en la base de datos.
      </div> 
    ";
  }         
?>


<div>
  <table border="1" style="width: 310px; color:black ">
    <tr>
      <th style="border:solid black 1.5pt; padding-top: 0px; padding-bottom: 0px; font-size:10.0pt"><strong> &nbsp Laboratorio:</strong></th>
      <th style="border:solid black 1.5pt; padding-top: 0px; padding-bottom: 0px; font-size:10.0pt"><strong>&nbsp Análisis de Aguas y Alimentos</strong></th>
    </tr>
  </table>
</div>

<br> 
<?php 
  echo form_open('welcome/actualizarCotizacion'); 
?>
<div>
  <table border="1" style="width: 720px; color:black">
    <thead>
      <tr>
        <th colspan="4" style="background-color: #D9D9D9; width: 720px; text-align: center; font-size:10.0pt">SOLICITUD REALIZADA A TRAVÉS DE:</div></th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach($cotizacion->result() as $row){
            $metodoSolicitud = $row->metodoSolicitud;
        }
        if($metodoSolicitud == "telefonico"){
          echo '<td style="width: 180px; font-size:10.0pt"><input type="radio" name="metodoSolicitud" value="telefonico" required checked> Telefónico</td>';
          echo '<td style="width: 180px; font-size:10.0pt"><input type="radio" name="metodoSolicitud" value="presencial" > Presencial</td>';
          echo '<td style="width: 180px; font-size:10.0pt"><input type="radio" name="metodoSolicitud" value="email" > Email</td>';
          echo '<td style="width: 180px; font-size:10.0pt"><input type="radio" name="metodoSolicitud" value="correspondencia" > Correspondencia</td>';
        }
        if($metodoSolicitud == "presencial"){
          echo '<td style="width: 180px; font-size:10.0pt"><input type="radio" name="metodoSolicitud" value="telefonico" required> Telefónico</td>';
          echo '<td style="width: 180px; font-size:10.0pt"><input type="radio" name="metodoSolicitud" value="presencial" checked> Presencial</td>';
          echo '<td style="width: 180px; font-size:10.0pt"><input type="radio" name="metodoSolicitud" value="email" > Email</td>';
          echo '<td style="width: 180px; font-size:10.0pt"><input type="radio" name="metodoSolicitud" value="correspondencia" > Correspondencia</td>';
        }
        if($metodoSolicitud == "email"){
          echo '<td style="width: 180px; font-size:10.0pt"><input type="radio" name="metodoSolicitud" value="telefonico" required> Telefónico</td>';
          echo '<td style="width: 180px; font-size:10.0pt"><input type="radio" name="metodoSolicitud" value="presencial" > Presencial</td>';
          echo '<td style="width: 180px; font-size:10.0pt"><input type="radio" name="metodoSolicitud" value="email" checked> Email</td>';
          echo '<td style="width: 180px; font-size:10.0pt"><input type="radio" name="metodoSolicitud" value="correspondencia" > Correspondencia</td>';
        }
        if($metodoSolicitud == "correspondencia"){
          echo '<td style="width: 180px; font-size:10.0pt"><input type="radio" name="metodoSolicitud" value="telefonico" > Telefónico</td>';
          echo '<td style="width: 180px; font-size:10.0pt"><input type="radio" name="metodoSolicitud" value="presencial" > Presencial</td>';
          echo '<td style="width: 180px; font-size:10.0pt"><input type="radio" name="metodoSolicitud" value="email" > Email</td>';
          echo '<td style="width: 180px; font-size:10.0pt"><input type="radio" name="metodoSolicitud" value="correspondencia" checked> Correspondencia</td>';
        }
      ?>
    </tbody>
  </table> 
</div>

<br>

<div>
  <table border="1" style="width: 720px; text-align: center;  color:black; font-size:10.0pt; border-right:solid black 1.5pt; border-left:solid black 1.5pt; border-top:solid black 1.5pt;">
    <tr>
      <th colspan="5" style="background-color: #D9D9D9; text-align: center">Fecha</td>
      <th style=" width: 100px; background-color: #D9D9D9; text-align: center"> Cotización No. </td>
      <td style="width: 450px; text-align: right; " rowspan="3" colspan="8"><IMG SRC="\laboratorio\imagenes\onac.png" WIDTH="100" HEIGHT="50" ></td>
    </tr>
    <tr>
      <th style=" width: 80px; background-color: #D9D9D9; text-align: center">Día</td>
      <th colspan="3" style=" width: 40px; background-color: #D9D9D9; text-align: center">Mes</td>
      <th style=" width: 80px; background-color: #D9D9D9; text-align: center">Año</td>
      <td rowspan="2" style="color:grey;" ><input  readonly style="width: 100px; height: 26px" type="text" name="cotizacionNo" value="<?php
        foreach($cotizacion->result() as $row){
         $cotizacionNo = $row->cotizacionNo;
        }  
          echo $cotizacionNo;
         
      ?>" required></td>
    </tr>
    <tr>
      <td colspan="5" style="width: 100px;"><input  style="width: 240px; height: 26px"  type="date" name="fecha" value="<?php
        foreach($cotizacion->result() as $row){
         $fecha = $row->fecha;
        }  
          echo $fecha;  
      ?>" required></td>
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
          Razón Social: <input type="text" name="razonSocial" style="width: 324px" value = "<?php
        foreach($cotizacion->result() as $row){
         $razonSocial = $row->razonSocial;
        }  
          echo $razonSocial;  
      ?>" required>
        </td>
        <td colspan="6" style="text-align: left; ">    
          Nit o C.C : <input type="text" name="nitCc" style="width: 221px;" value = "<?php
        foreach($cotizacion->result() as $row){
         $nitCc = $row->nitCc;
        }  
          echo $nitCc;  
      ?>" required></td>
      </tr>
      <tr>
        <td colspan="4" style="text-align: left">
          Solicitante: <input type="text" name="solicitante" style="width: 341px" value = "<?php
        foreach($cotizacion->result() as $row){
         $solicitante = $row->solicitante;
        }  
          echo $solicitante;  
      ?>" required>
        </td>
        <td colspan="6" style="text-align: left;">
          Cargo: <input type="text" name="cargo" style="width: 246px" value = "<?php
        foreach($cotizacion->result() as $row){
         $cargo = $row->cargo;
        }  
          echo $cargo;  
      ?>" required>
        </td>
      </tr>
       <tr>
        <td colspan="4" style="text-align: left">Dirección: <input type="text" name="direccion" style="width: 347px" value = "<?php
        foreach($cotizacion->result() as $row){
         $direccion = $row->direccion;
        }  
          echo $direccion;   
      ?>" required></td>
        <td colspan="6" style=" text-align: left; ">Teléfono/Fax: <input type="text" name="telefonoFax" style="width: 205px" value = "<?php
        foreach($cotizacion->result() as $row){
         $telefonoFax = $row->telefonoFax;
        }  
          echo $telefonoFax;   
      ?>" required></td>
      </tr>
      <tr>
        <td colspan="4" style="text-align: left"> Municipio/Departamento: <input type="text" name="municipioDepartamento" style="width: 261px" value = "<?php
        foreach($cotizacion->result() as $row){
         $municipioDepartamento = $row->municipioDepartamento;
        }  
          echo $municipioDepartamento;   
      ?>" required></td>
        <td colspan="6" style="text-align: left; ">Correo electrónico: <input type="text" name="correoElectronico" style="width: 175px" value = "<?php
        foreach($cotizacion->result() as $row){
         $correoElectronico = $row->correoElectronico;
        }  
          echo $correoElectronico;   
      ?>" required></td>
      </tr>
  </table>
</div>
<br>

<!-- Tabla dinámica -->
<script type="text/javascript">
  /* Número de casillas nuevas agregadas con Javascript. Además sirve para asignar id a cada casilla agregada */
  var contador = 0;
  var borrarSoloCasilla = "borrarSoloCasilla";
  var idsMuestrasCreadas = [];
   
  $(document).ready(function(){
    // Agregar fila a la tabla
    $("#agregarFila").click(function(){
      contador++;
      nuevaFila = '<tr id="prueba"><td><input required placeholder="" style="width: 85px;" name="tipoMuestra'+contador+'" id="tipoMuestra" type="text"></td><td><input required style="width: 180px;" name="parametro'+contador+'" id="parametro" type="text"></td><td><input required style="width: 100px;" name="metodo'+contador+'" id="metodo" type="text"></td><td><input required style="width: 100px;" name="precioMuestra'+contador+'" id="precioMuestra" type="text"></td><td><input required style="width: 100px;" name="noMuestras'+contador+'" id="noMuestras" type="text"></td><td><input required style="width: 98px;" name="valorTotal'+contador+'" id="valorTotal" type="text"></td><td style="border-left:solid black 1.5pt; border-right: hidden; border-top: hidden; border-bottom: hidden;"><button style="width: 50px" type="button" class="btn btn-danger" value="X" onclick="borrarFila(this,'+contador+','+borrarSoloCasilla+')"><i class="fa fa-times"></i></button></td>';
      $("#tabla").append(nuevaFila);
      idsMuestrasCreadas.push(contador);
      document.getElementById("idsMuestrasCreadas").value = idsMuestrasCreadas;
    });
  });

  var idsMuestrasBorradas = [];

  function borrarFila(fila, id, operacion) {
    var numeroFilas = document.getElementById("tabla").rows.length;
    /* Garantiza que no se puedan borrar todas las muestras de la cotización. 2 por los nombres de la tabla y la muestra que se garantiza.  */
    if(numeroFilas > 2) {
      var i = fila.parentNode.parentNode.rowIndex;
      document.getElementById("tabla").deleteRow(i);
      /* Entra al if si sólo se desea borrar una casilla que se acaba de agregar. Entra al else si se borra una casilla existente en la base de datos*/
      if (operacion == "borrarSoloCasilla") {
          var index = idsMuestrasCreadas.indexOf(id);
          if (index > -1) {
             idsMuestrasCreadas.splice(index, 1);
          }
        document.getElementById("idsMuestrasCreadas").value = idsMuestrasCreadas;
      }
      else {
        idsMuestrasBorradas.push(id);
        document.getElementById("idsMuestrasBorradas").value = idsMuestrasBorradas;
      }
    }
    else {
      alert("Debe existir almenos un elemento. Si desea eliminar todo, debe eliminar la cotización.")
    }
  }
</script>
 

<form method="post">  
  <table id="tabla" border="1" style="width: 718px; border-left:solid black 1.5pt; border-right:solid black 1.5pt; border-top:solid black 1.5pt; font-size:10.0pt; color:black">
    <tbody>
      <tr style="background-color: #D9D9D9;">
        <th style="text-align: center;">TIPO DE MUESTRA</th>
        <th style="text-align: center;">PARÁMETRO</th>
        <th style="text-align: center;">MÉTODO</th>
        <th style="text-align: center;">Precio por Muestra</th>
        <th style="text-align: center;">No. de Muestras</th>
        <th style="text-align: center; border-right:solid black 1.5pt;">VALOR TOTAL</th>
        <td style="background-color: white; padding-top:2px; padding-bottom:2px; padding-left: 4px; border-left:solid black 1.5pt; border-right: hidden; border-top: hidden; border-bottom: hidden;">
          <button  type="button" id="agregarFila" style="width: 50px" class="btn btn-info"><i class="fa fa-plus"></i></button>
        </td>
      </tr>
      <?php
        foreach($datosMuestras->result() as $row){
          $idsMuestras[] = $row->id;
          echo "<tr>";
            echo '<td><input required style="width: 85px;"  name="tipoMuestraGuardado'.$row->id.'" type="text" value="'.$row->tipoMuestra.'"></input></td>';
            echo '<td><input required style="width: 180px;" name="parametroGuardado'.$row->id.'"  type="text" value="'.$row->parametro.'"></input></td>';
            echo '<td><input required style="width: 100px;" name="metodoGuardado'.$row->id.'"  type="text" value="'.$row->metodo.'"></input></td>';
            echo '<td><input required style="width: 100px;" name="precioMuestraGuardado'.$row->id.'"  type="text" value="'.$row->precioMuestra.'"></input></td>';
            echo '<td><input required style="width: 100px;" name="noMuestrasGuardado'.$row->id.'"  type="text" value="'.$row->noMuestras.'"></input></td>';
            echo '<td><input required style="width: 98px;" name="valorTotalGuardado'.$row->id.'"  type="text" value="'.$row->valorTotal.'"></input></td>';
            echo '<td style="border-left:solid black 1.5pt; border-right: hidden; border-top: hidden; border-bottom: hidden;"><button type="button" style="width: 50px" class="btn btn-danger" id="'.$row->id.'" onclick="borrarFila(this, id)"><i class="fa fa-times"></i></button></td>';
        }    
          echo "</tr>";
      ?>
    </tbody>
   </table>
<?php
   echo '<input type="hidden" name="idsMuestras" id="idsMuestras" value="'.base64_encode(serialize($idsMuestras)).'"></input>';
   echo '<input type="hidden" name="idsMuestrasBorradas" id="idsMuestrasBorradas" ></input>';
   echo '<input type="hidden" name="idsMuestrasCreadas" id="idsMuestrasCreadas" ></input>';
?>
   <table border="1" style="width: 720px; border-top:none; border-left:solid black 1.5pt; border-right:solid black 1.5pt; border-bottom:solid black 1.5pt; font-size:10.0pt; color:black">
     <tr>
       <td style="font-size:10.0pt; " colspan="2"><strong>Observaciones: </strong><input required style="width: 608px;" name="observaciones" id="observaciones" type="text" value="<?php
        foreach($cotizacion->result() as $row){
         $observaciones = $row->observaciones;
        }  
          echo $observaciones;   
      ?>"></td>
     </tr>
     <tr>
       <td style="font-size:10.0pt; width: 700px; border-top:solid black 1.5pt;"><strong>TOTAL A PAGAR</strong></td>
       <td style="font-size:10.0pt;"><strong></strong><input style="width: 100px;" name="totalPagar" id="totalPagar" type="text" value="<?php
        foreach($cotizacion->result() as $row){
         $totalPagar = $row->totalPagar;
        }  
          echo $totalPagar;   
      ?>" required></td>
     </tr>
   </table>


<br>
<div class="col-sm-2">
</div>
<div class="col-sm-4">
  <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
</div>
<div class="col-sm-2">
</div>
 </form> 


<br>

<br>
<br>

<!--  margin-left:5.4pt; Márgen de la izquierda de la tabla con respecto al fondo
<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=723
 style='width:19.0cm;border-collapse:collapse;border:none; color:black'>
 <tr>
  <td width=723 valign=top style='width:19.0cm;border:solid black 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:10.0pt;
  line-height:115%;font-family:"Arial","sans-serif"'>Nota. El laboratorio
  cuenta con recurso humano capacitado y con experiencia en la realización de
  Ensayos. Además trabaja con equipo y sustancias certificadas a fin de cumplir
  con las necesidades del cliente bajo los estándares de calidad.  Los
  procedimientos de Ensayo implementados en el laboratorio están basados en
  normas técnicas y en procedimientos debidamente validados. Lo anterior
  asegura la calidad de los resultados de Ensayo obtenidos en el laboratorio.</span></b></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
  justify;line-height:normal'><b><span style='font-size:10.0pt;font-family:
  "Arial","sans-serif"'>El Laboratorio de Análisis de Aguas y Alimentos-UTP está
  Acreditado por el ONAC, bajo la Norma NTC-ISO/IEC 17025:2005</span></b><b><span
  style='font-size:10.0pt;font-family:"Arial","sans-serif"'> <span lang=ES>en
  los siguientes análisis para  Aguas Potables (envasadas y de consumo) y aguas
  crudas: XXXXXXX</span></span></b></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
  justify;line-height:normal'><b><span lang=ES style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Análisis para bebidas alcohólicas (ron – aguardiente):
  XXXXXX</span></b></p>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:10.0pt;
  line-height:115%;font-family:"Arial","sans-serif"'>El Laboratorio de Análisis
  de Aguas y Alimentos-UTP está autorizado por el Ministerio de la Protección
  Social para realizar análisis Organolépticos, físicos, químicos y
  microbiológicos al agua potable, mediante la Resolución # xxxx del día-mes-año.</span></b></p>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:10.0pt;
  line-height:115%;font-family:"Arial","sans-serif"'>CONDICIONES</span></b></p>
  <ul style='margin-top:0cm' type=disc>
   <li class=MsoNormal style='text-align:justify;line-height:normal'><span
       style='font-size:10.0pt;font-family:"Arial","sans-serif"'>Los métodos
       utilizados en la ejecución de los ensayos para cada uno de los
       parámetros con algunas excepciones han sido tomados del Standard Methods
       for The Examination of Water and Wastewater  22 ND Edition 2012.</span></li>
   <li class=MsoNormal style='text-align:justify;line-height:normal'><span
       style='font-size:10.0pt;font-family:"Arial","sans-serif"'>A partir de la
       recepción de la muestra existe un tiempo estimado de 12 días hábiles
       para la entrega de los Resultados. <b><i>Este puede aumentar
       dependiendo  del número de muestras y los análisis requeridos</i></b>.
       Luego de la entrega del Informe de Resultados, existe un espacio de tiempo
       máximo de 15 días hábiles para la atención de reclamos.</span></li>
   <li class=MsoNormal style='text-align:justify;line-height:normal'><span
       style='font-size:10.0pt;font-family:"Arial","sans-serif"'>El envío de la
       (s) muestra (s) por parte del cliente implica la aceptación de las
       condiciones legales y comerciales establecidas en la cotización.</span></li>
   <li class=MsoNormal style='text-align:justify;line-height:normal'><span
       style='font-size:10.0pt;font-family:"Arial","sans-serif"'>El laboratorio
       no cubrirá gastos por concepto de recolección de muestras, en caso de
       que no se solicite el servicio, por lo tanto es el cliente quien se
       responsabiliza de su recolección. </span></li>
   <li class=MsoNormal style='text-align:justify;line-height:normal'><span
       style='font-size:10.0pt;font-family:"Arial","sans-serif"'>La Universidad
       Tecnológica de Pereira NO ES RESPONSABLE DEL IMPUESTO AL VALOR AGREGADO
       (I.V.A.),  Ley 30 de 1992, Art. 476 Numeral 6. La Universidad
       Tecnológica de Pereira por ser institución oficial, está exenta de
       retención en la fuente y todo tipo de impuestos, tasas y contribuciones.</span></li>
   <li class=MsoNormal style='text-align:justify;line-height:normal'><span
       style='font-size:10.0pt;font-family:"Arial","sans-serif"'>Para el pago
       del trabajo, cancelar el 100 % al traer la muestra consignando en la caja
       de la Universidad Tecnológica de Pereira en el proyecto <b><i>511 – 22 –
       265 – 06</i></b> o si el pago es a través de TRANSFERENCIA ELECTRÓNICA 
       favor consignar a la Cta. Cte. 0733-650540-3 de BANCOLOMBIA y remitir
       copia del comprobante al Fax 321 57 50.  </span></li>
   <li class=MsoNormal style='text-align:justify;line-height:normal'><span
       style='font-size:10.0pt;font-family:"Arial","sans-serif"'>En caso de ser
       necesario el cliente debe enviar una orden de servicio o de compra de
       acuerdo a la cotización aprobada. </span></li>
   <li class=MsoNormal style='text-align:justify;line-height:normal'><span
       style='font-size:10.0pt;font-family:"Arial","sans-serif"'>Si el cliente
       lo requiere se puede generar un contrato por la prestación del servicio.</span></li>
   <li class=MsoNormal style='text-align:justify;line-height:normal'><span
       style='font-size:10.0pt;font-family:"Arial","sans-serif"'>Para coordinar
       el día y la hora de la recepción y hacer las recomendaciones necesarias
       para el volumen y recolección de las muestras,  por favor comuníquese
       con anticipación con el laboratorio al telefax <b>3215750</b> o al
       correo electrónico: <b>labaguas@utp.edu.co</b></span></li>
  </ul>
  <p class=MsoNormal style='margin-left:36.0pt;text-align:justify;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>Cordialmente,</span></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
  justify;line-height:normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>____________________</span></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
  justify;line-height:normal'><b><span style='font-size:10.0pt;font-family:
  "Arial","sans-serif"'>&nbsp;</span></b></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
  justify;line-height:normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>Responsable
  Técnico</span></p>
  <p class=MsoNormal style='text-align:justify'><span style='font-size:10.0pt;
  line-height:115%;font-family:"Arial","sans-serif"'>&nbsp;</span></p>
  <p class=MsoNormal style='text-align:justify'><span style='font-size:10.0pt;
  line-height:115%;font-family:"Arial","sans-serif"'>Elaboró: </span></p>
  </td>
 </tr>
</table>
   -->
   
<br>



   <br>
   
     
   


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
