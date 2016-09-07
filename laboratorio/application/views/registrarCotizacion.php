<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Registrar Cotización</title>
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
  <script src="\laboratorio\js\promedioAnalisisFisicos.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="\laboratorio\js\jquery.js"></script>
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
                     <li class="active">
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
                            Registrar Cotización <small>Formulario de registro</small>
                        </h1>
                        <ol class="breadcrumb">
                           <li>
                                <i class="fa fa-home"></i>  <a href="<?php echo site_url('welcome/inicio'); ?>">Inicio</a>
                            </li>
      
                            <li class="active">
                                <i class="fa fa-pencil-square"></i> Cotización
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<?php
  if (isset($cotizacionRegistrada)){
    echo " 
      <div class='alert alert-info'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        La <strong>Cotización No. ".$cotizacionRegistrada."</strong>
        ha sido registrada en la base de datos.
      </div> 
    "; 
                }
  if (isset($existeCotizacion)){
    echo "
      <div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        La <strong>Cotización No. ".$existeCotizacion."</strong> ya existe en la base de datos.
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
</style>

<div>
  <table border="1" style="width: 310px; color:black ">
    <tr>
      <th style="border:solid black 1.5pt; padding-top: 0px; padding-bottom: 0px; font-size:10.0pt"><strong> &nbsp Laboratorio:</strong></th>
      <th style="border:solid black 1.5pt; padding-top: 0px; padding-bottom: 0px; font-size:10.0pt"><strong>&nbsp Análisis de Aguas y Alimentos</strong>  </th>
    </tr>
  </table>
</div>

<br> 
<?php 
  echo form_open('welcome/registrarCotizacion'); 
?>
<div>
  <table border="1" style="width: 720px; color:black">
    <thead>
      <tr>
        <th colspan="4" style="background-color: #D9D9D9; width: 720px; text-align: center; font-size:10.0pt">SOLICITUD REALIZADA A TRAVÉS DE:</div></th>
      </tr>
    </thead>
    <tbody>
      <td style="width: 180px; font-size:10.0pt"><input type="radio" name="metodoSolicitud" value="telefonico" required> Telefónico</td>
      <td style="width: 180px; font-size:10.0pt"><input type="radio" name="metodoSolicitud" value="presencial" > Presencial</td>
      <td style="width: 180px; font-size:10.0pt"><input type="radio" name="metodoSolicitud" value="email" > Email</td>
      <td style="width: 180px; font-size:10.0pt"><input type="radio" name="metodoSolicitud" value="correspondencia" > Correspondencia</td>
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
     

      <td rowspan="2" style="color:grey;"><input  style="width: 100px; height: 26px" type="text" name="cotizacionNo" value="<?php
        if (isset($numeroCotizaciones)){
    echo $numeroCotizaciones;
  }
   echo "-";
   if (isset($year)){
    echo $year;

  }
  
   ?>" readonly></td>
   <?php
   if (isset($numeroCotizaciones)){
     echo '<input name="id" value="'.$numeroCotizaciones.'" type="hidden">';
  }
  ?>
    </tr>
    <tr>
      <td colspan="5" style="width: 100px;"><input  style="width: 240px; height: 26px"  type="date" name="fecha" </td>
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
          Razón Social: <input type="text" name="razonSocial" style="width: 324px" value="<?php
                     if(isset($solicitud)){foreach($solicitud->result() as $row){
                       $razonSocial = $row->razonSocial;
                      } echo $razonSocial;}?>"   required>
        </td>
        <td colspan="6" style="text-align: left; ">    
          Nit o C.C : <input value="<?php
                     if(isset($solicitud)){foreach($solicitud->result() as $row){
                       $nitCc = $row->nitCc;
                      } echo $nitCc;}?>" type="text" name="nitCc" style="width: 221px;" required></td>
      </tr>
      <tr>
        <td colspan="4" style="text-align: left">
          Solicitante: <input value="<?php
                     if(isset($solicitud)){foreach($solicitud->result() as $row){
                       $solicitante = $row->solicitante;
                      } echo $solicitante;}?>" type="text" name="solicitante" style="width: 341px" required>
        </td>
        <td colspan="6" style="text-align: left;">
          Cargo: <input value="<?php
                     if(isset($solicitud)){foreach($solicitud->result() as $row){
                       $cargo = $row->cargo;
                      } echo $cargo;}?>" type="text" name="cargo" style="width: 246px" required>
        </td>
      </tr>
       <tr>
        <td colspan="4" style="text-align: left">Dirección: <input value="<?php
                     if(isset($solicitud)){foreach($solicitud->result() as $row){
                       $direccion = $row->direccion;
                      } echo $direccion;}?>" type="text" name="direccion" style="width: 347px" required></td>
        <td colspan="6" style=" text-align: left; ">Teléfono/Fax: <input value="<?php
                     if(isset($solicitud)){foreach($solicitud->result() as $row){
                       $telefonoFax = $row->telefonoFax;
                      } echo $telefonoFax;}?>" type="text" name="telefonoFax" style="width: 205px" required></td>
      </tr>
      <tr>
        <td colspan="4" style="text-align: left"> Municipio/Departamento: <input value="<?php
                     if(isset($solicitud)){foreach($solicitud->result() as $row){
                       $municipioDepartamento = $row->municipioDepartamento;
                      } echo $municipioDepartamento;}?>" type="text" name="municipioDepartamento" style="width: 261px" required></td>
        <td colspan="6" style="text-align: left; ">Correo electrónico: <input value="<?php
                     if(isset($solicitud)){foreach($solicitud->result() as $row){
                       $correoElectronico = $row->correoElectronico;
                      } echo $correoElectronico;}?>" type="text" name="correoElectronico" style="width: 175px" required></td>
      </tr>
  </table>
</div>
<br>

<!-- Tabla dinámica -->
<script type="text/javascript">
  /* Número de casillas nuevas agregadas con Javascript. Además sirve para asignar id a cada casilla agregada */
  var contador = 1;
  var idsMuestrasCreadas = [];
  var idsSuma = [];
  var total = 0;


  function sumaTotal(id){
    
   
   var index = idsSuma.indexOf(id);
      if (index > -1) {
        //alert("ya existe");
      idsSuma[id] = id;
    }else{
      //alert("creado");
      idsSuma.push(id);

    }

    var numeroIds = idsSuma.length;

      for(i=0; i<numeroIds; i++){

        total = total + parseInt(document.getElementById(idsSuma[i]).value);
        //alert(total);
      }
       document.getElementById("totalPagar").value = total;
       total=0;
    
  }


    $(document).ready(function(){
    // Agregar fila a la tabla
    $("#agregarFila").click(function(){
      contador++;
      nuevaFila = '<tr id="prueba"><td><input required placeholder="" style="width: 85px;" name="tipoMuestra'+contador+'" id="tipoMuestra" type="text"></td><td><input required style="width: 180px;" name="parametro'+contador+'" id="parametro" type="text"></td><td><input required style="width: 100px;" name="metodo'+contador+'" id="metodo" type="text"></td><td><input required style="width: 100px;" name="precioMuestra'+contador+'" id="precioMuestra" type="text"></td><td><input required style="width: 100px;" name="noMuestras'+contador+'" id="noMuestras" type="text"></td><td><input required style="width: 98px;" name="valorTotal'+contador+'" id="valorTotal'+contador+'" onkeyup="sumaTotal(this.id);" type="text"></td><td style="border-left:solid black 1.5pt; border-right: hidden; border-top: hidden; border-bottom: hidden;"><button style="width: 50px" type="button" class="btn btn-danger" value="X" onclick="borrarFila(this,'+contador+')"><i class="fa fa-times"></i></button></td>';
      $("#tabla").append(nuevaFila);
      idsMuestrasCreadas.push(contador);
      document.getElementById("idsMuestrasCreadas").value = idsMuestrasCreadas;
    });

    


  });

  function borrarFila(fila, id) {
  
  

    var numeroFilas = document.getElementById("tabla").rows.length;
    /* Garantiza que no se puedan borrar todas las muestras de la cotización. 2 por los nombres de la tabla y la muestra que se garantiza.  */
    if(numeroFilas > 2) {
      //restaTotal(document.getElementById("valorTotal"+id).value);
      var i = fila.parentNode.parentNode.rowIndex;
      document.getElementById("tabla").deleteRow(i);
      var index = idsMuestrasCreadas.indexOf(id);
      if (index > -1) {
        idsMuestrasCreadas.splice(index, 1);
      
        
      }
      document.getElementById("idsMuestrasCreadas").value = idsMuestrasCreadas;
    
      index2 = idsSuma.indexOf("valorTotal"+id);
      if (index2 > -1) {
        idsSuma.splice(index2, 1);
        var numeroIds = idsSuma.length;
        var total=0;
        for(i=0; i<numeroIds; i++){
        total = total + parseInt(document.getElementById(idsSuma[i]).value);
      }
       document.getElementById("totalPagar").value = total;
       total=0;
  }


    }
    else {
      alert("Debe existir almenos un elemento.")
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
        <th style="text-align: center;">VALOR TOTAL</th>
        <td style="background-color: white; border-left:solid black 1.5pt; border-right: hidden; border-top: hidden; border-bottom: hidden;"><button type="button" id="agregarFila" style="width: 50px" class="btn btn-info"><i class="fa fa-plus"></i></button></td>
      </tr>
      <tr>
        <td><input required style="width: 85px;"  name="tipoMuestra1" id="tipoMuestra1" type="text" ></td>
        <td><input required style="width: 180px;" name="parametro1" id="parametro1" type="text"></td>
        <td><input required style="width: 100px;" name="metodo1" id="metodo1" type="text"></td>
        <td><input required style="width: 100px;" name="precioMuestra1" id="precioMuestra1" type="text"></td>
        <td><input required style="width: 100px;" name="noMuestras1" id="noMuestras1" type="text"></td>
        <td><input required style="width: 98px;" name="valorTotal1" id="valorTotal1" onkeyup="sumaTotal(this.id);" type="text" >
        <td style="border-left:solid black 1.5pt; border-right: hidden; border-top: hidden; border-bottom: hidden;"><button type="button" style="width: 50px" class="btn btn-danger"  onclick="borrarFila(this, 1)"><i class="fa fa-times"></i></button></td> 
        </td>
      </tr>
    </tbody>
   </table>
   <?php
    echo '<input type="hidden" name="idsMuestrasCreadas" id="idsMuestrasCreadas" ></input>';
?>
   <table border="1" style="width: 720px; border-top:none; border-left:solid black 1.5pt; border-right:solid black 1.5pt; border-bottom:solid black 1.5pt; font-size:10.0pt; color:black">
     <tr>
       <td style="font-size:10.0pt; " colspan="2"><strong>Observaciones: </strong><input value="<?php
                     if(isset($solicitud)){foreach($solicitud->result() as $row){
                       $observaciones = $row->observaciones;
                      } echo $observaciones;}?>"required style="width: 608px;" name="observaciones" id="observaciones" type="text"></td>
     </tr>
     <tr>
       <td style="font-size:10.0pt; width: 700px; border-top:solid black 1.5pt;"><strong>TOTAL A PAGAR</strong></td>
       <td style="font-size:10.0pt;"><strong></strong><input style="width: 100px;" readonly name="totalPagar" id="totalPagar" type="text" required></td>
     </tr>
   </table>

<br>

<div class="col-sm-2">
  </div>
<div class="col-sm-4">
  <button type="submit" class="btn btn-primary btn-block">Registrar</button>
</div>
<div class="col-sm-2">
  </div>

 </form> 

<br><br><br><br><br><br><br><br><br>

<?php 
    echo form_close();
?>
 


 
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
