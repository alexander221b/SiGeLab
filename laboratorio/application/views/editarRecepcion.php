<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Editar Recepción</title>
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
                            <li class="active">
                                <a href="<?php echo site_url('welcome/cargarRegistrarCotizacion'); ?>" ata-target="#cotizacion">Registrar Cotización</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('welcome/cargarConsultarCotizaciones'); ?>">Consultar Cotizaciones</a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
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
                            Editar Recepción <small>Formulario de Edición</small>
                        </h1>
                        <ol class="breadcrumb">
                           <li>
                                <i class="fa fa-home"></i>  <a href="<?php echo site_url('welcome/inicio'); ?>">Inicio</a>
                            </li>
      
                            <li class="active">
                                <i class="fa fa-fw fa-download"></i> Recepción
                            </li>
                            <li>
                            <?php
                              foreach ($recepcion->result() as $row){
                                $cotizacionNo = $row->cotizacionNo;
                              }
                              $link = '<a href="//localhost/laboratorio/index.php/welcome/verRecepcion/'.$cotizacionNo.'" target="_blank" onClick="window.open(this.href, this.target, width=300, height=400); return false;">'.$cotizacionNo.'</a>';
                              echo $link;
                            ?> 
                          </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

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

<!-- Margen guía -->
<div class="margenGuia"> 
  <!-- Encabezado -->
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8" align=center style="font-size:12.0pt;">
      <font color="grey" face="arial">
        <strong>VICERRECTORÍA DE INVESTIGACIONES, INNOVACIÓN <br> Y EXTENSION<br><br>
        </strong>
      </font>
    </div>
    <div class="col-sm-2" style="padding-top: 20px;">
      <div align=right>
        <table border="1" style="font-size:6.0pt; color:grey; border: grey;">
          <tr>
            <td>Código</td>
            <td>123-LAA-F02</td>
          </tr>
          <tr>
            <td>Versión</td>
            <td>4</td>
          </tr>
          <tr>
            <td>Fecha</td>
            <td>2015-02-06</td>
          </tr>
          <tr>
            <td>Página</td>
            <td>1 de 2</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div align=center style="font-size:12.0pt;">
    <font color="grey" face="arial">
      <strong>RECEPCIÓN DE LAS MUESTRAS DE ENSAYO
      </strong><br><br>
    </font> 
  </div>
  <!-- Fin encabezado -->

  <!-- Cabezera laboratorio -->
  <div>
    <table border="1" style="width: 310px; color:black; font-size:10.0pt; ">
      <tr>
        <th style="padding-top: 0px; padding-bottom: 0px;"><strong> &nbsp Laboratorio:</strong></th>
        <th style="padding-top: 0px; padding-bottom: 0px;"><strong>&nbsp Análisis de Aguas y Alimentos</strong></th>
      </tr>
    </table>
  </div><br>
  <!-- Fin cabezera laboratorio -->

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
        nuevaFila = '<tr id="prueba"><td><textarea required placeholder="" style="width: 388px;" name="descripcionMuestra'+contador+'" id="descripcionMuestra" type="text"></textarea></td><td><input required style="width: 100px;" name="consecutivo'+contador+'" id="consecutivo" type="text"></td><td><input required style="width: 90px;" name="tipoMuestra'+contador+'" id="tipoMuestra" type="text"></td><td><input required style="width: 100px; height:24px;" name="horaToma'+contador+'" id="horaToma" type="time"></td><td style="padding-top:2px; padding-bottom:2px; padding-left: 4px; border-left:solid black 1.5pt; border-right: hidden; border-top: hidden; border-bottom: hidden;"><button type="button" style="width: 50px" class="btn btn-danger" onclick="borrarFila(this, '+contador+','+borrarSoloCasilla+')"><i class="fa fa-times"></i></button></td>';
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
      alert("Debe existir almenos un elemento.")
    }
  }
  </script>
  <!-- Fin tabla dinámica -->
  
  <!-- Tabla dinámica 2 -->
    <script type="text/javascript">
    /* Número de casillas nuevas agregadas con Javascript. Además sirve para asignar id a cada casilla agregada */
    var contador2 = 0;
    var borrarSoloCasilla2 = "borrarSoloCasilla";
    var idsMuestrasCreadas2 = [];
   
    $(document).ready(function(){
      // Agregar fila a la tabla
      $("#agregarFila2").click(function(){
        contador2++;
        nuevaFila2 = '<tr><td><input required placeholder="" style="width: 200px;" name="parametro'+contador2+'" type="text"></td><td><input required style="width: 33px;" name="consecutivoA'+contador2+'" type="text"></td><td><input required style="width: 33px;" name="consecutivoB'+contador2+'" type="text"></td><td><input required style="width: 33px;" name="consecutivoC'+contador2+'" type="text"></td><td><input required style="width: 33px;" name="consecutivoD'+contador2+'" type="text"></td><td><input required style="width: 33px;" name="consecutivoE'+contador2+'" type="text"></td><td><input required style="width: 33px;" name="consecutivoF'+contador2+'" type="text"></td><td><input required style="width: 33px;" name="consecutivoG'+contador2+'" type="text"></td><td><input required style="width: 33px;" name="consecutivoH'+contador2+'" type="text"></td><td><input required style="width: 33px;" name="consecutivoI'+contador2+'" type="text"></td><td><input required style="width: 33px;" name="consecutivoJ'+contador2+'" type="text"></td><td><input required style="width: 33px;" name="consecutivoK'+contador2+'" type="text"></td><td><input required style="width: 33px;" name="consecutivoL'+contador2+'" type="text"></td><td style="padding-top:2px; padding-bottom:2px; padding-left: 4px; border-left:solid black 1.5pt; border-right: hidden; border-top: hidden; border-bottom: hidden;"><button type="button" style="width: 50px" class="btn btn-danger" onclick="borrarFila2(this, '+contador2+', '+borrarSoloCasilla2+')"><i class="fa fa-times"></i></button></td>';
        $("#tabla2").append(nuevaFila2);
        idsMuestrasCreadas2.push(contador2);
        document.getElementById("idsMuestrasCreadas2").value = idsMuestrasCreadas2;
      });
    });

    var idsMuestrasBorradas2 = [];

    function borrarFila2(fila2, id2, operacion2) {
      var numeroFilas2 = document.getElementById("tabla2").rows.length;
      /* Garantiza que no se puedan borrar todas las muestras de la cotización. 2 por los nombres de la tabla y la muestra que se garantiza.  */
      if(numeroFilas2 > 3) {
        var i2 = fila2.parentNode.parentNode.rowIndex;
        document.getElementById("tabla2").deleteRow(i2);
        if (operacion2 == "borrarSoloCasilla") {
          var index2 = idsMuestrasCreadas2.indexOf(id2);
          if (index2 > -1) {
            idsMuestrasCreadas2.splice(index2, 1);
          }
          document.getElementById("idsMuestrasCreadas2").value = idsMuestrasCreadas2;
        }
        else {
          idsMuestrasBorradas2.push(id2);
          document.getElementById("idsMuestrasBorradas2").value = idsMuestrasBorradas2;
        }
      }
      else {
        alert("Debe existir almenos un elemento.")
      }
    }
  </script>
  <!-- Fin tabla dinámica 2 -->

  <?php 
    echo form_open('welcome/actualizarRecepcion'); 
  ?>
  
  <form method="post">  
    <!-- Tabla principal -->
    <table border="1" style="width: 716px; color:black; font-size:10.0pt; border:solid black 1.5pt;">
      <tr style="background-color: #D9D9D9;">
        <th colspan="3" style="text-align:center; ">FECHA</th>
        <th style="text-align:center">Cotización <br> aprobada No.</th>
        <th style="text-align:center;">Número de <br> Muestras</th>
        <td rowspan="3" style="text-align:center; background-color:white;"></th>
        <th style="text-align:center">Código interno</th>
      </tr>
      <tr>
        <th style="width: 50px; height: 16px; text-align:center; background-color: #D9D9D9;">Día</th>
        <th style="width: 50px; height: 16px; text-align:center; background-color: #D9D9D9;">Mes</th>
        <th style="width: 50px; height: 16px; text-align:center; background-color: #D9D9D9;">Año</th>
        <td style="width: 100px;" rowspan="2" style="text-align:center"><input style="width: 100px;" type="text" name="cotizacionNo" required 
          value="<?php foreach($recepcion->result() as $row){
         $cotizacionNo = $row->cotizacionNo;
        }  
          echo $cotizacionNo;  
      ?>" readonly></td>
        <td rowspan="2" style="width: 90px; text-align:center;"><input style="width: 90px;" type="number" name="numeroMuestras" 
          value="<?php foreach($recepcion->result() as $row){
         $numeroMuestras = $row->numeroMuestras;
        }  
          echo $numeroMuestras;  
      ?>" required></td>
        <td rowspan="2" style="width: 90px; text-align:center;"><input style="width: 90px;" type="text" name="codigoInterno" 
          value="<?php foreach($recepcion->result() as $row){
         $codigoInterno = $row->codigoInterno;
        }  
          echo $codigoInterno;  
      ?>" required></td>
      </tr>
      <tr>
        <td colspan="3" style="text-align:center"><input style="width: 150px; height: 23px" type="date" name="fecha" 
          value="<?php foreach($recepcion->result() as $row){
         $fecha = $row->fecha;
        }  
          echo $fecha;  
      ?>" required></td>
      </tr>
      <tr>
        <th colspan="7" style="text-align:center; background-color: #D9D9D9;">DATOS DE LA (S) MUESTRA (S)</th>
      </tr>
      <tr>
        <td colspan="7"><b>Observaciones del cliente:</b></td>
      </tr>
      <tr>
        <td colspan="7"><input style="width: 705px;" name="observacionesCliente" 
          value="<?php foreach($recepcion->result() as $row){
         $observacionesCliente = $row->observacionesCliente;
        }  
          echo $observacionesCliente;  
      ?>" required></td>
      </tr>
      <tr>
        <td colspan="7"><b>Condiciones de la Muestra en el momento de la recepción: </b></td>
      </tr>
      <tr>
        <td colspan="7"><input style="width: 705px;" name="condicionesMuestra" value="<?php foreach($recepcion->result() as $row){
         $condicionesMuestra = $row->condicionesMuestra;
        }  
          echo $condicionesMuestra;  
      ?>" required></td>
      </tr>
      <tr>
        <?php
          foreach($recepcion->result() as $row){
            $refrigerada = $row->refrigerada;
          }  
          if($refrigerada == "si") {
            echo '<td colspan="7"><b>Refrigerada: SI <input type="radio" name="refrigerada" value="si" required checked> NO <input type="radio" name="refrigerada" value="no" required></b></td>';
          } 
          if($refrigerada == "no") {
            echo '<td colspan="7"><b>Refrigerada: SI <input type="radio" name="refrigerada" value="si" required> NO <input type="radio" name="refrigerada" value="no" required checked></b></td>';
          }
        ?>
      </tr>
      <tr>
        <td colspan="7">&nbsp</td>
      </tr>
    </table>
    <!-- Fin tabla principal -->
   
    <!-- Tabla descripción de las muestras -->
    <table id="tabla" border="1" style="border:solid black 1.5pt; border-top:hidden; width: 716px; color:black; font-size:10.0pt;">
      <tr>
        <th style="text-align:center; background-color: #D9D9D9;">DESCRIPCIÓN DE LA MUESTRA</th>
        <th style="text-align:center; background-color: #D9D9D9;">Consecutivo</th>
        <th style="text-align:center; background-color: #D9D9D9;">Tipo de Muestra</th>
        <th style="text-align:center; background-color: #D9D9D9;">Hora de <br> Toma</th>
        <td style="padding-top:2px; padding-bottom:2px; padding-left: 4px; border-left:solid black 1.5pt; border-right: hidden; border-top: hidden; border-bottom: hidden;"><button type="button" id="agregarFila" style="width: 50px" class="btn btn-info"><i class="fa fa-plus"></i></button></td>
      </tr>
      <?php foreach($datosMuestraRecepcion->result() as $row){
        $idsMuestras[] = $row->id;
        echo '<tr>';  
          echo '<td><textarea name="descripcionMuestra'.$row->id.'" style="width: 388px;">'.$row->descripcionMuestra.'</textarea></td>';
          echo '<td style="width: 100px;"><input name="consecutivo'.$row->id.'" style="width: 100px;" value="'.$row->consecutivo.'"></td>';
          echo '<td style="width: 90px;"><input name="tipoMuestra'.$row->id.'" style="width: 90px;" value="'.$row->tipoMuestra.'"></td>';
          echo '<td style="width: 90px;"><input name="horaToma'.$row->id.'" style="width: 100px; height:24px" type="time" value="'.$row->horaToma.'"></td>';
          echo '<td style="padding-top:2px; padding-bottom:2px; padding-left: 4px; border-left:solid black 1.5pt; border-right: hidden; border-top: hidden; border-bottom: hidden;"><button type="button" style="width: 50px" class="btn btn-danger" id="'.$row->id.'" onclick="borrarFila(this, id)"><i class="fa fa-times"></i></button></td>';
      }
      echo '</tr>';
      ?>
    </table> <br>
    <!-- Fin tabla descripción de las muestras -->
    
    <?php
      echo '<input type="hidden" name="idsMuestras" id="idsMuestras" value="'.base64_encode(serialize($idsMuestras)).'"></input>';
      echo '<input type="hidden" name="idsMuestrasBorradas" id="idsMuestrasBorradas" ></input>';
      echo '<input type="hidden" name="idsMuestrasCreadas" id="idsMuestrasCreadas"></input>';
    ?>

    <div><b><font size="2" face="arial" color="black">Nota: Se ingresa el listado de parámetros de acuerdo a la cotización aprobada por el cliente.</font></b></div>
    
    <table id="tabla2" border="1" style="width: 716px; color:black; font-size:10.0pt; border:solid black 1.5pt;"> 
      <tr >
        <th style="text-align:center; background-color: #D9D9D9;" rowpan="2"> PARÁMETRO</th>
        <th style="text-align:center; background-color: #D9D9D9;" colspan="12"> CONSECUTIVO CÓDIGO</th>
        <td style="padding-top:2px; padding-bottom:2px; padding-left: 4px; border-left:solid black 1.5pt; border-right: hidden; border-top: hidden; border-bottom: hidden;"><button type="button" id="agregarFila2" style="width: 50px" class="btn btn-info"><i class="fa fa-plus"></i></button></td>
      </tr>
      <tr style="background-color: #D9D9D9;">
        <th >&nbsp</th>
        <th >&nbsp</th>
        <th >&nbsp</th>
        <th >&nbsp</th>
        <th >&nbsp</th>
        <th >&nbsp</th>
        <th >&nbsp</th>
        <th >&nbsp</th>
        <th >&nbsp</th>
        <th >&nbsp</th>
        <th >&nbsp</th>
        <th >&nbsp</th>
        <th style="border-right:solid black 1.5pt;">&nbsp</th>
      </tr>
      <?php 
        foreach($parametrosRecepcion->result() as $row){
          $idsMuestras2[] = $row->id;
          echo '<tr>';
            echo '<td> <input name="parametro'.$row->id.'" style="width: 200px;" value="'.$row->parametro.'"></td>';
            echo '<td> <input name="consecutivoA'.$row->id.'" style="width: 33px;" value="'.$row->consecutivoA.'"></td>';
            echo '<td> <input name="consecutivoB'.$row->id.'" style="width: 33px;" value="'.$row->consecutivoB.'"></td>';
            echo '<td> <input name="consecutivoC'.$row->id.'" style="width: 33px;" value="'.$row->consecutivoC.'"></td>';
            echo '<td> <input name="consecutivoD'.$row->id.'" style="width: 33px;" value="'.$row->consecutivoD.'"></td>';
            echo '<td> <input name="consecutivoE'.$row->id.'" style="width: 33px;" value="'.$row->consecutivoE.'"></td>';
            echo '<td> <input name="consecutivoF'.$row->id.'" style="width: 33px;" value="'.$row->consecutivoF.'"></td>';
            echo '<td> <input name="consecutivoG'.$row->id.'" style="width: 33px;" value="'.$row->consecutivoG.'"></td>';
            echo '<td> <input name="consecutivoH'.$row->id.'" style="width: 33px;" value="'.$row->consecutivoH.'"></td>';
            echo '<td> <input name="consecutivoI'.$row->id.'" style="width: 33px;" value="'.$row->consecutivoI.'"></td>';
            echo '<td> <input name="consecutivoJ'.$row->id.'" style="width: 33px;" value="'.$row->consecutivoJ.'"></td>';
            echo '<td> <input name="consecutivoK'.$row->id.'" style="width: 33px;" value="'.$row->consecutivoK.'"></td>';
            echo '<td> <input name="consecutivoL'.$row->id.'" style="width: 33px;" value="'.$row->consecutivoL.'"></th>';
            echo '<td style="padding-top:2px; padding-bottom:2px; padding-left: 4px; border-left:solid black 1.5pt; border-right: hidden; border-top: hidden; border-bottom: hidden;"><button type="button" style="width: 50px" class="btn btn-danger" id="'.$row->id.'" onclick="borrarFila2(this, id)"><i class="fa fa-times"></i></button></td>'; 
          echo '</tr>';
        }
      ?>
    </table><br>

    <?php
      echo '<input type="hidden" name="idsMuestras2" id="idsMuestras2" value="'.base64_encode(serialize($idsMuestras2)).'"></input>';
      echo '<input type="hidden" name="idsMuestrasBorradas2" id="idsMuestrasBorradas2" ></input>';
      echo '<input type="hidden" name="idsMuestrasCreadas2" id="idsMuestrasCreadas2"></input>';
    ?>
   
  <!-- Fin form -->
</div> 
<!-- Fin margen guía -->
<div class="col-lg-2">
    </div>
 <div class="col-lg-4">
      <button type="submit" class="btn btn-primary btn-block" >Actualizar</button>
    </div>
    <div class="col-lg-2">
    </div>
  
  </form>

    <?php 
        echo form_close();
?>
<br><br><br><br><br><br><br><br><br>
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
