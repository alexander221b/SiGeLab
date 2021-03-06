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
  width: 980px; 
}
</style>

<!-- Margen guía -->
<div class="margenGuia"> 

  <div>
  <table border="1" style="width: 310px; color:black ">
    <tr>
      <th style="border:solid black 1.5pt; padding-top: 0px; padding-bottom: 0px; font-size:10.0pt"><strong> &nbsp Laboratorio:</strong></th>
      <th style="border:solid black 1.5pt; padding-top: 0px; padding-bottom: 0px; font-size:10.0pt"><strong>&nbsp Análisis de Aguas y Alimentos</strong>  </th>
    </tr>
  </table>
</div><br><br><br>

<div style="font-size:11.0pt; text-align:center">
  <b>
    Fecha de Recepción:  <?php
                     foreach($solidosInsolubles->result() as $row){
                       $fechaRecepcion = $row->fechaRecepcion;
                      } echo $fechaRecepcion?>
    &nbsp&nbsp&nbsp 
    Código Interno: <?php
                     foreach($solidosInsolubles->result() as $row){
                       $codigoInterno = $row->codigoInterno;
                      } echo $codigoInterno?>

  </b>
</div><br><br>

<div style="font-size:12.0pt;"> &nbsp&nbsp&nbsp <b>Sólidos Insolubles: </b></div>

  <table border="1">
              <thead>
                <tr style="background-color: #D9D9D9;">
                  <th><div style="width: 100px;">Fecha del Ensayo</div></th>
                  <th><div style="width: 100px;">Código de Muestra</div></th>
                  <th><div style="width: 100px;">Cantidad de muestra (g)</div></th>
                  <th><div style="width: 100px;">No. de Crisol</div></th>
                  <th><div style="width: 100px;">Crisol vacío</div></th>
                  <th><div style="width: 100px;">Crisol + muestra (105ºC)</div></th>
                  <th><div style="width: 100px;">Concentración S.I (g/100 g)</div></th>
                  <th><div style="width: 100px;">concentración Promedio S.I (g / 100g)</div></th>
                  <th><div style="width: 100px;">Responsable</div></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="2"> <?php
                     foreach($solidosInsolubles->result() as $row){
                       $fechaEnsayo = $row->fechaEnsayo;
                      } echo $fechaEnsayo?></td>
                  <td rowspan="2"><?php
                     foreach($solidosInsolubles->result() as $row){
                       $codigoMuestra = $row->codigoMuestra;
                      } echo $codigoMuestra?></td>
                  <td><?php
                     foreach($solidosInsolubles->result() as $row){
                       $cantidadMuestra1 = $row->cantidadMuestra1;
                      } echo $cantidadMuestra1?></td>                
                  <td><?php
                     foreach($solidosInsolubles->result() as $row){
                       $noCrisol1 = $row->noCrisol1;
                      } echo $noCrisol1?></td>
                  <td><?php
                     foreach($solidosInsolubles->result() as $row){
                       $crisolVacio1 = $row->crisolVacio1;
                      } echo $crisolVacio1?></td>
                  <td><?php
                     foreach($solidosInsolubles->result() as $row){
                       $crisolMuestra1051 = $row->crisolMuestra1051;
                      } echo $crisolMuestra1051?></td>
                  <td><?php
                     foreach($solidosInsolubles->result() as $row){
                       $conentracionSi1 = $row->conentracionSi1;
                      } echo $conentracionSi1?></td>
                  <td rowspan="2"><?php
                     foreach($solidosInsolubles->result() as $row){
                       $concentracionPromedioSi = $row->concentracionPromedioSi;
                      } echo $concentracionPromedioSi?></td>
                  <td rowspan="2"><?php
                     foreach($solidosInsolubles->result() as $row){
                       $responsable = $row->responsable;
                      } echo $responsable?></td>
                </tr>
                <tr>
                  <td><?php
                     foreach($solidosInsolubles->result() as $row){
                       $cantidadMuestra2 = $row->cantidadMuestra2;
                      } echo $cantidadMuestra2?></td>                  
                  <td ><?php
                     foreach($solidosInsolubles->result() as $row){
                       $noCrisol2 = $row->noCrisol2;
                      } echo $noCrisol2?></td>
                  <td><?php
                     foreach($solidosInsolubles->result() as $row){
                       $crisolVacio2 = $row->crisolVacio2;
                      } echo $crisolVacio2?></td>
                  <td><?php
                     foreach($solidosInsolubles->result() as $row){
                       $crisolMuestra1052 = $row->crisolMuestra1052;
                      } echo $crisolMuestra1052?></td>
                  <td><?php
                     foreach($solidosInsolubles->result() as $row){
                       $conentracionSi2 = $row->conentracionSi2;
                      } echo $conentracionSi2?></td>
                </tr>
                
              </tbody>
            </table>

</div> 
<!-- Fin margen guía -->

</body>
</html>
