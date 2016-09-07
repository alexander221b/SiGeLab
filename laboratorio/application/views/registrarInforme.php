<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Registrar Informe</title>
  <!-- Bootstrap Core CSS -->
  <link href="\laboratorio\css\bootstrap.min.css" rel="stylesheet">
  <!-- Barra lateral personalizada -->
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
                     <li>
                        <a id="linkCotizacion" href="javascript:;" data-toggle="collapse" data-target="#cotizacion"><i class="fa fa-fw fa-pencil-square-o"></i> Cotización <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="cotizacion" class="collapse">
                            <li >
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
                    <li class="active">
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
                            Registrar Resultados <small>Formulario de Informe</small>
                        </h1>
                        <ol class="breadcrumb">
                           <li>
                                <i class="fa fa-home"></i>  <a href="<?php echo site_url('welcome/inicio'); ?>">Inicio</a>
                            </li>
      
                            <li class="active">
                                <i class="fa fa-fw fa-file-text"></i> Informe
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<?php
  if (isset($informeRegistrado)){
    echo " 
      <div class='alert alert-info'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        El informe con <strong>Cotización No. ".$informeRegistrado."</strong>
        ha sido registrado en la base de datos.
      </div> 
    "; 
                }
  if (isset($existeInforme)){
    echo "
      <div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        El informe con la <strong>Cotización No. ".$existeInforme."</strong> ya existe en la base de datos.
      </div> 
    "; 
  }
?>

<style type="text/css">
  table, th, td {
    padding-top: 1px;     
    padding-bottom: 1px;
    padding-left: 2px;
    padding-right: 2px;
  }
  .margenGuia { 
  border: black 0px solid; 
  margin-left: 0px; 
  margin-right: 0px; 
  width: 716px; 
}
</style>

<!-- Margen guía -->
<div class="margenGuia"> 


  <!-- Tabla dinámica -->
  <script type="text/javascript">
    /* Número de casillas nuevas agregadas con Javascript. Además sirve para asignar id a cada casilla agregada */
    var contador = 1;
    var idsMuestrasCreadas = [];
    idsMuestrasCreadas.push(contador);
   
    $(document).ready(function(){
      // Agregar fila a la tabla
      $("#agregarFila").click(function(){
        contador++;
        nuevaFila = '<tr><td><textarea style="width:136.75pt;"  name="descripcion'+contador+'" id="descripcion"></textarea></td><td><input style="width:81.3pt;"  name="tipo'+contador+'" id="tipo'+contador+'" type="text"/></td><td><input style="width:100pt;"  name="fechaToma'+contador+'" id="fechaToma'+contador+'" type="date" /><input style="width:100pt;"  name="horaToma'+contador+'" id="horaToma'+contador+'" type="time" /></td><td><input style="width:100pt;"  name="fechaHoraRecepcion'+contador+'" id="fechaHoraRecepcion'+contador+'" type="date" /></td><td><input style="width:67.1pt;"  name="codigoInterno'+contador+'" id="codigoInterno'+contador+'" type="text" /></td><td><textarea style="width:6.45cm;"  name="observaciones'+contador+'" id="observaciones'+contador+'"></textarea></td><td style="padding-top:2px; padding-bottom:2px; padding-left: 4px; border-left:solid black 1.5pt; border-right: hidden; border-top: hidden; border-bottom: hidden;"><button type="button" style="width: 50px" class="btn btn-danger" onclick="borrarFila(this, 1)"><i class="fa fa-times"></i></button></td></tr>';
        $("#tabla").append(nuevaFila);
        idsMuestrasCreadas.push(contador);
        document.getElementById("idsMuestrasCreadas").value = idsMuestrasCreadas;
      });
    });

    function borrarFila(fila, id) {
      var numeroFilas = document.getElementById("tabla").rows.length;
      /* Garantiza que no se puedan borrar todas las muestras de la cotización. 2 por los nombres de la tabla y la muestra que se garantiza.  */
      if(numeroFilas > 3) {
        var i = fila.parentNode.parentNode.rowIndex;
        document.getElementById("tabla").deleteRow(i);
        var index = idsMuestrasCreadas.indexOf(id);
        if (index > -1) {
          idsMuestrasCreadas.splice(index, 1);
        }
        document.getElementById("idsMuestrasCreadas").value = idsMuestrasCreadas;
      }
      else {
        alert("Debe existir almenos un elemento.")
      }
    }
  </script>
  <!-- Fin tabla dinámica -->
  
  <!-- Tabla dinámica 2 -->
    <script type="text/javascript">
    /* Número de casillas nuevas agregadas con Javascript. Además sirve para asignar id a cada casilla agregada */
    var contador2 = 1;
    var idsMuestrasCreadas2 = [];
    idsMuestrasCreadas2.push(contador2);
   
    $(document).ready(function(){
      // Agregar fila a la tabla
      $("#agregarFila2").click(function(){
        contador2++;
        nuevaFila2 ='<tr><td style="border:1px solid black"><input style="width:100pt;"  name="fechaEnsayo'+contador2+'" id="fechaEnsayo'+contador2+'" type="date" /></td><td align= center style="border:1px solid black"><input style="width:100pt;"  name="ensayo'+contador2+'" id="ensayo'+contador2+'" type="text" /></td><td align= center style="border:1px solid black"><input style="width:92.15pt;"  name="metodoUtilizado'+contador2+'" id="metodoUtilizado'+contador2+'" type="text" /></td><td align= center style="border:1px solid black"><input style="width:65.75pt;"  name="rangoPermitido'+contador2+'" id="rangoPermitido'+contador2+'" type="text" /></td><td align= center style="border:1px solid black"><input style="width:2.0cm;"  name="unidades'+contador2+'" id="unidades'+contador2+'" type="text" /></td><td align= center style="border:1px solid black"><input style="width:49.65pt;"  name="xxxXx'+contador2+'" id="xxxXx'+contador2+'" type="text" /></td><td align= center style="border:1px solid black"><input style="width:49.65pt;"  name="uExpa'+contador2+'" id="uExpa'+contador2+'" type="text" /></td><td align= center style="border:1px solid black"><input style="width:49.65pt;"  name="xxxXx1'+contador2+'" id="xxxXx1'+contador2+'" type="text" /></td><td align= center style="border:1px solid black"><input style="width:49.65pt;"  name="uExpa1'+contador2+'" id="uExpa1'+contador2+'" type="text" /></td><td align= center style="border:1px solid black"><input style="width:49.65pt;"  name="xxxXx11'+contador2+'" id="xxxXx11'+contador2+'" type="text" /></td><td align= center style="border:1px solid black"><input style="width:49.65pt;"  name="uExpa11'+contador2+'" id="uExpa11'+contador2+'" type="text" /></td><td style="padding-top:2px; padding-bottom:2px; padding-left: 4px; border-left:solid black 1.5pt; border-right: hidden; border-top: hidden; border-bottom: hidden;"><button type="button" style="width: 50px" class="btn btn-danger" onclick="borrarFila2(this, 1)"><i class="fa fa-times"></i></button></td></tr> ';
        $("#tabla2").append(nuevaFila2);
        idsMuestrasCreadas2.push(contador2);
        document.getElementById("idsMuestrasCreadas2").value = idsMuestrasCreadas2;
      });
    });

    function borrarFila2(fila2, id2) {
      var numeroFilas2 = document.getElementById("tabla2").rows.length;
      /* Garantiza que no se puedan borrar todas las muestras de la cotización. 2 por los nombres de la tabla y la muestra que se garantiza.  */
      if(numeroFilas2 > 4) {
        var i2 = fila2.parentNode.parentNode.rowIndex;
        document.getElementById("tabla2").deleteRow(i2);
        var index2 = idsMuestrasCreadas2.indexOf(id2);
        if (index2 > -1) {
          idsMuestrasCreadas2.splice(index2, 1);
        }
        document.getElementById("idsMuestrasCreadas2").value = idsMuestrasCreadas2;
       }
      else {
        alert("Debe existir almenos un elemento.")
      }
    }
  </script>
  <!-- Fin tabla dinámica 2 -->

  <?php 
    echo form_open('welcome/registrarInforme'); 
  ?>
  
  <form method="post">  
    <table style="width: 310px; color:black ">
      <tr>
        <th style="border:solid black 1.5pt; padding-top: 0px; padding-bottom: 0px; font-size:10.0pt"><strong> &nbsp Laboratorio:</strong></th>
        <th style="border:solid black 1.5pt; padding-top: 0px; padding-bottom: 0px; font-size:10.0pt"><strong>&nbsp Analisis de Aguas y Alimentos</strong>  </th>
      </tr>
  </table>

  <br> 

  <table border="1px" style="width:23.0cm; color:black">

    <tr>
      <td colspan=3 style='width:134.65pt;border:1px solid black;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>Fecha Edicion</span></b></p>
      </td>
      <td colspan=3 style='width:106.2pt;border:1px solid black;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>COTIZACION No.</span></b></p>
      </td>
      <td width=113 style='width:84.9pt;border:1px solid black;
      background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>No. de Paginas</span></b></p>
      </td>
      <td width=232 colspan=3 style='width:174.3pt;border:none;
      padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal align=center style='text-align:center'><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
      </td>
      <td width=203 colspan=2 style='width:152.0pt;border:none'>
        <p class=MsoNormal align=center style='text-align:center'><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
      </td>
    </tr>

    <tr>
      <td width=50 style='width:37.5pt;border:1px solid black;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>Dia</span></b></p>
      </td>
      <td width=62 style='width:46.25pt;border:1px solid black;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>Mes</span></b></p>
      </td>
      <td width=68 style='width:50.9pt;border:1px solid black;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>Ano</span></b></p>
      </td>
      <td align=center width=142 rowspan=2 colspan=3 style='width:106.2pt;border:1px solid black'>    
        <input  value="<?php
                     if(isset($informe)){foreach($informe->result() as $row){
                       $cotizacionNo = $row->cotizacionNo;
                      } echo $cotizacionNo;}?>" style="width: 100px; height: 26px" type="text" name="cotizacionNo" id="cotizacionNo"  required>
      </td>
      <td align=center width=142 rowspan=2 style='width:106.2pt;border:1px solid black'>    
        <input  style="width: 100px; height: 26px" type="number" name="noPaginas" id="noPaginas"  required>
      </td>
      <td width=232 colspan=3 style='width:174.3pt;border:none'>
        <p class=MsoNormal align=center style='text-align:center'><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
      </td>
      <td width=203 colspan=2 style='width:152.0pt;border:none'>
        <p class=MsoNormal align=center style='text-align:center'><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
      </td>
    </tr>

    <tr>  
      <td colspan="3" style="width: 100px;">
        <input  style="width: 240px; height: 26px"  type="date" name="fecha" required>
      </td>
      <td width=232 colspan=3 style='width:174.3pt;border:none'>
        <p class=MsoNormal align=center style='text-align:center'><span lang=ES
      style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
      </td>
      <td width=203 colspan=2 style='width:152.0pt;border:none'>
        <p class=MsoNormal align=center style='text-align:center'><span lang=ES
      style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
      </td>           
    </tr>

    <tr>
      <td align=center width=869 colspan=12 valign=top style='width:23.0cm;border:1px solid black;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>DATOS DE LA
        EMPRESA</span></p>
      </td>
    </tr>

    <tr>      
      <td colspan=6>Razon Social:
        <input value="<?php
                     if(isset($informe)){foreach($informe->result() as $row){
                       $razonSocial = $row->razonSocial;
                      } echo $razonSocial;}?>"  style="width: 100%" type="text" name="razonSocial" id="razonSocial"  required>
      </td>
      <td colspan=6>NIT o CC:
        <input value="<?php
                     if(isset($informe)){foreach($informe->result() as $row){
                       $nitCc = $row->nitCc;
                      } echo $nitCc;}?>"  style="width: 100%" type="text" name="nitCc" id="nitCc"  required>
      </td> 
    </tr>

    <tr>      
      <td colspan=6>Solicitante:
        <input value="<?php
                     if(isset($informe)){foreach($informe->result() as $row){
                       $solicitante = $row->solicitante;
                      } echo $solicitante;}?>"  style="width: 100%" type="text" name="solicitante" id="solicitante"  required>
      </td>
      <td colspan=6>Cargo:
        <input value="<?php
                     if(isset($informe)){foreach($informe->result() as $row){
                       $cargo = $row->cargo;
                      } echo $cargo;}?>"  style="width: 100%" type="text" name="cargo" id="cargo"  required>
      </td> 
    </tr>

    <tr>      
      <td colspan=6>Direccion:
        <input value="<?php
                     if(isset($informe)){foreach($informe->result() as $row){
                       $direccion = $row->direccion;
                      } echo $direccion;}?>"  style="width: 100%" type="text" name="direccion" id="direccion"  required>
      </td>
      <td colspan=6>Telefono/Fax:
        <input value="<?php
                     if(isset($informe)){foreach($informe->result() as $row){
                       $telefonoFax = $row->telefonoFax;
                      } echo $telefonoFax;}?>"  style="width: 100%" type="text" name="telefonoFax" id="telefonoFax"  required>
      </td> 
    </tr>

    <tr>      
      <td colspan=6>Municipio/Departamento:
        <input value="<?php
                     if(isset($informe)){foreach($informe->result() as $row){
                       $municipioDpto = $row->municipioDepartamento;
                      } echo $municipioDpto;}?>"  style="width: 100%" type="text" name="municipioDpto" id="municipioDpto"  required>
      </td>
      <td colspan=6>Correo electronico:
        <input value="<?php
                     if(isset($informe)){foreach($informe->result() as $row){
                       $correoElectronico = $row->correoElectronico;
                      } echo $correoElectronico;}?>"  style="width: 100%" type="text" name="correoElectronico" id="correoElectronico"  required>
      </td> 
    </tr>

    <tr>      
      <td colspan=6>Lugar de toma de muestra:
        <input  style="width: 100%" type="text" name="lugarTomaMuestra" id="lugarTomaMuestra"  required>
      </td>
      <td colspan=6>Fecha de toma de muestra:
        <input  style="width: 100%" type="date" name="fechaTomaMuestra" id="fechaTomaMuestra"  required>
      </td> 
    </tr>

      <tr>      
      <td colspan=6>Muestras tomadas por:
        <input  style="width: 100%" type="text" name="muestraTomadaPor" id="muestraTomadaPor"  required>
      </td>
      <td colspan=6>Fecha de recepcion de las muestras:
        <?php
        if(isset($recepcion)){

    foreach($recepcion->result() as $row){
       $fechaRecepcion=$row->fecha;
    }

        echo '<input  value='.$fechaRecepcion.' style="width: 100%" type="date" name="fechaRecepcionMuestra" id="fechaRecepcionMuestra"  required>';

  }else{
        echo '<input  style="width: 100%" type="date" name="fechaRecepcionMuestra" id="fechaRecepcionMuestra"  required>';


  }
         ?>
      </td> 
    </tr>

    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>

    <br>

    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
  </table>

  <br>

  <table border="1px" style="color:black" id="tabla">

    <tr>
      <td width=858 colspan=6 style='width:643.3pt;border:solid black 1pt'>
        <p class=MsoBodyText2 align=center style='margin-bottom:0cm;margin-bottom:
        .0001pt;text-align:center;line-height:normal'><b><span lang=ES
        style='font-size:14.0pt;font-family:"Calibri","sans-serif"'>CARACTERISTICAS
        DE LA(S) MUESTRA (S):</span></b>
        </p>
        </td>
    </tr>

    <tr style='height:20.0pt'>
      <th width=182 style='width:136.75pt;border:solid black 1px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>DESCRIPCION</span></b></p>
        </th>
      <th width=108 style='width:81.3pt;border:solid black 1px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>TIPO</span></b></p>
        </th>
      <th width=118 style='width:90.8pt;border:solid black 1px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>FECHA Y HORA DE
          TOMA</span></b></p>
      </th>
      <th width=95 style='width:60.9pt;border:solid black 1px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>FECHA DE
          RECEPCION</span></b></p>
      </th>
      <th width=89 style='width:67.1pt;border:solid black 1px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>CODIGO INTERNO</span></b></p>
      </th>
      <th width=250 style='width:6.45cm;border:solid black 1px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>OBSERVACIONES</span></b></p>
      </th>
      <td style="padding-top:2px; padding-bottom:2px; padding-left: 4px; border-left:solid black 1.5pt; border-right: hidden; border-top: hidden; border-bottom: hidden;">
        <button type="button" id="agregarFila" style="width: 50px" class="btn btn-info"><i class="fa fa-plus"></i></button>
      </td>
    </tr>


<?php 


echo
    '<tr>
          <td>
            <textarea style="width:136.75pt;"  name="descripcion1" id="descripcion1"></textarea>
          </td>
          <td>
            <input style="width:81.3pt;"  name="tipo1" id="tipo1" type="text" />
          </td>
          <td>
            <input style="width:100pt;"  name="fechaToma1" id="fechaToma1" type="date" />
            <input style="width:100pt;"  name="horaToma1" id="horaToma1" type="time" />
          </td>
          <td>
            <input style="width:100pt;"  name="fechaHoraRecepcion1" id="fechaHoraRecepcion1" type="date" />
          </td>
          <td>
            <input style="width:67.1pt;"  name="codigoInterno1" id="codigoInterno1" type="text" />
          </td>
          <td>
            <textarea style="width:6.45cm;"  name="observaciones1" id="observaciones1"></textarea>
          </td>
          <td style="padding-top:2px; padding-bottom:2px; padding-left: 4px; border-left:solid black 1.5pt; border-right: hidden; border-top: hidden; border-bottom: hidden;">
            <button type="button" style="width: 50px" class="btn btn-danger" onclick="borrarFila(this, 1)"><i class="fa fa-times"></i></button>
          </td> 
        </tr>';



        ?>

  </table>

  <br>

  <table  id="tabla2">
     <tr style='page-break-inside:avoid;height:22.15pt'>
      <td width=885 colspan=11 style='width:660.2pt;border:solid black 1px'>
        <p class=MsoBodyText2 align=center style='margin-bottom:0cm;margin-bottom:
        .0001pt;text-align:center;line-height:normal'><b><span style='font-size:16.0pt;
        font-family:"Calibri","sans-serif"'>RESULTADOS</span></b>
        </p>
      </td>
    </tr>

    <tr>
      <th width=85 rowspan=2 valign=top style='width:100pt;border:solid black 1px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>FECHA DEL ENSAYO</span></b></p>
      </th>
      <th width=123 rowspan=2 valign=top style='width:92.15pt;border:solid black 1px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>ENSAYO</span></b></p>
      </th>
      <th width=123 rowspan=2 valign=top style='width:92.15pt;border:solid black 1px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>METODO UTILIZADO</span></b></p>
      </th>
      <th width=85 rowspan=2 valign=top style='width:63.75pt;border:solid black 1px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>RANGO PERMITIDO</span></b></p>
      </th>
      <th width=76 rowspan=2 valign=top style='width:2.0cm;border:solid black 1px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>UNIDADES</span></b></p>
      </th>
      <th width=400 colspan=6 valign=top style='width:300pt;border:solid black 2px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>CODIGO INTERNO</span></b></p>
      </th>
      
    </tr> 

    <tr>
      <th width=66 style='width:49.65pt;border-left:solid black 2px;border-top:solid black 2px;border-bottom:solid black 2px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>XXX-XX</span></b></p>
      </th>
      <th width=66 style='width:49.6pt;border-right:solid black 2px;border-top:solid black 2px;border-bottom:solid black 2px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>U expa</span></b></p>
      </th>
      <th width=66 style='width:49.6pt;border-left:solid black 2px;border-top:solid black 2px;border-bottom:solid black 2px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>XXX-XX</span></b></p>
      </th>
      <th width=66 style='width:49.6pt;border-right:solid black 2px;border-top:solid black 2px;border-bottom:solid black 2px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>U expa</span></b></p>
      </th>
      <th width=66 style='width:49.6pt;border-left:solid black 2px;border-top:solid black 2px;border-bottom:solid black 2px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>XXX-XX</span></b></p>
      </th>
      <th width=66 style='width:49.6pt;border-right:solid black 2px;border-top:solid black 2px;border-bottom:solid black 2px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>U expa</span></b></p>
      </th>
      <td style="padding-top:2px; padding-bottom:2px; padding-left: 4px; border-left:solid black 1.5pt; border-right: hidden; border-top: hidden; border-bottom: hidden;">
        <button type="button" id="agregarFila2" style="width: 50px" class="btn btn-info"><i class="fa fa-plus"></i></button>
      </td>
    </tr>

  <?php 
 
echo
    '<tr>
          <td style="border:1px solid black">
            <input style="width:100pt;"  name="fechaEnsayo1" id="fechaEnsayo1" type="date" />
          </td>
          <td align= center style="border:1px solid black">
            <input style="width:100pt;"  name="ensayo1" id="ensayo1" type="text" />
          </td>
          <td align= center style="border:1px solid black">
            <input style="width:92.15pt;"  name="metodoUtilizado1" id="metodoUtilizado1" type="text" />
          </td>
          <td align= center style="border:1px solid black">
            <input style="width:65.75pt;"  name="rangoPermitido1" id="rangoPermitido1" type="text" />
          </td>
          <td align= center style="border:1px solid black">
            <input style="width:2.0cm;"  name="unidades1" id="unidades1" type="text" />
          </td>
          <td align= center style="border:1px solid black">
            <input style="width:49.65pt;"  name="xxxXx1" id="xxxXx1" type="text" />
          </td>
          <td align= center style="border:1px solid black">
            <input style="width:49.65pt;"  name="uExpa1" id="uExpa1" type="text" />
          </td>
          <td align= center style="border:1px solid black">
            <input style="width:49.65pt;"  name="xxxXx11" id="xxxXx11" type="text" />
          </td>
          <td align= center style="border:1px solid black">
            <input style="width:49.65pt;"  name="uExpa11" id="uExpa11" type="text" />
          </td>
          <td align= center style="border:1px solid black">
            <input style="width:49.65pt;"  name="xxxXx111" id="xxxXx111" type="text" />
          </td>
          <td align= center style="border:1px solid black">
            <input style="width:49.65pt;"  name="uExpa111" id="uExpa111" type="text" />
          </td>
          <td style="padding-top:2px; padding-bottom:2px; padding-left: 4px; border-left:solid black 1.5pt; border-right: hidden; border-top: hidden; border-bottom: hidden;">
            <button type="button" style="width: 50px" class="btn btn-danger" onclick="borrarFila2(this, 1)"><i class="fa fa-times"></i></button>
          </td> 
        </tr> ';



        ?>

  </table>
  <input type="hidden" name="idsMuestrasCreadas" id="idsMuestrasCreadas" ></input>
  <input type="hidden" name="idsMuestrasCreadas2" id="idsMuestrasCreadas2" ></input>
  

  <br>
 <div class="col-lg-5">
 </div>
  <div class="col-lg-6">
      <button type="submit" class="btn btn-primary btn-block" >Registrar</button>
    </div>
<div class="col-lg-5">
 </div>

  </form>

    <?php 
        echo form_close();
?>
<br><br><br><br><br>
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
