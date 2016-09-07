<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>&nbsp;</title>
  <!-- Bootstrap Core CSS -->
  <link href="\laboratorio\css\bootstrap.min.css" rel="stylesheet">
  
</head>
<body>
  
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
          <?php
        foreach($solicitud->result() as $row){
          $fechaSeparada = explode("-", $row->fecha);
        }
        $ano = $fechaSeparada[0];
        $mes = $fechaSeparada[1];
        $dia = $fechaSeparada[2];
        echo '<td style="width: 100px; text-align: center;">'.$dia.'</td>';
        echo '<td colspan="3" style="width: 100px; text-align: center;">'.$mes.'</td>';
        echo '<td style="width: 100px; text-align: center;">'.$ano.'</td>';
      ?>
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
          Razón Social: 
          <?php
            foreach($solicitud->result() as $row){
              $razonSocial = $row->razonSocial;
            }  
            echo $razonSocial;
          ?>
        </td>
        <td colspan="6" style="text-align: left; ">    
          Nit o C.C : 
          <?php
            foreach($solicitud->result() as $row){
              $nitCc = $row->nitCc;
            } 
            echo $nitCc; 
          ?>
        </td>
      </tr>
      <tr>
        <td colspan="4" style="text-align: left">
          Solicitante: 
          <?php
            foreach($solicitud->result() as $row){
              $solicitante = $row->solicitante;
            } 
            echo $solicitante;   
          ?>        
        </td>
        <td colspan="6" style="text-align: left;">
          Cargo: 
          <?php
            foreach($solicitud->result() as $row){
              $cargo = $row->cargo;
            } 
            echo $cargo;   
          ?>
        </td>
      </tr>
       <tr>
        <td colspan="4" style="text-align: left">
          Dirección: 
          <?php
            foreach($solicitud->result() as $row){
              $direccion = $row->direccion;
            } 
            echo $direccion;   
          ?>
        </td>
        <td colspan="6" style=" text-align: left; ">
          Teléfono/Fax: 
          <?php
            foreach($solicitud->result() as $row){
              $telefonoFax = $row->telefonoFax;
            } 
            echo $telefonoFax;   
          ?>
        </td>
      </tr>
      <tr>
        <td colspan="4" style="text-align: left">
          Municipio/Departamento: 
          <?php
            foreach($solicitud->result() as $row){
              $municipioDepartamento = $row->municipioDepartamento;
            } 
            echo $municipioDepartamento;   
          ?>
       </td>
        <td colspan="6" style="text-align: left; ">
          Correo electrónico: 
          <?php
            foreach($solicitud->result() as $row){
              $correoElectronico = $row->correoElectronico;
             
            } 
            echo $correoElectronico;   
          ?>
        </td>
      </tr>
    </table>
    <br>
    <form method="post">  
      <table id="tabla" border="1" style="width: 720px; border:solid black 1.5pt; color:black">
       <tr>
        <td>
           No. de Muestras: <?php
            foreach($solicitud->result() as $row){
              $numeroMuestras = $row->numeroMuestras;
            } 
            echo $numeroMuestras;   
          ?>
           Tipo de Muestras: <?php
            foreach($solicitud->result() as $row){
              $tipoMuestras = $row->tipoMuestras;
            } 
            echo $tipoMuestras;   
          ?>
           <br><br>
           Parámetros: <br>
           <?php
            foreach($solicitud->result() as $row){
              $parametros = $row->parametros;
            } 
            echo $parametros;   
          ?>
         </td>
       </tr>  
        <tr>
        <td>
           <b>OBSERVACIONES:</b>
           <?php
            foreach($solicitud->result() as $row){
              $observaciones = $row->observaciones;
            } 
            echo $observaciones;   
          ?>
        </tr>
        </td>
        <tr>
        <td>
           Cotización Elaborada Por: <?php
            foreach($solicitud->result() as $row){
              $cotizacionElaboradaPor = $row->cotizacionElaboradaPor;
            } 
            echo $cotizacionElaboradaPor;   
          ?>
        </td>
       </tr>
   </table>
</div> 
<!-- Fin margen guía -->

</body>
</html>
