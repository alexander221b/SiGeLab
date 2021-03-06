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
  width: 900px; 
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
                     foreach($hidrocarburos->result() as $row){
                       $fechaRecepcion = $row->fechaRecepcion;
                      } echo $fechaRecepcion?>
    &nbsp&nbsp&nbsp 
    Código Interno: <?php
                     foreach($hidrocarburos->result() as $row){
                       $codigoInterno = $row->codigoInterno;
                      } echo $codigoInterno?>

  </b>
</div><br><br>

<div style="font-size:12.0pt;"> &nbsp&nbsp&nbsp <b>Hidrocarburos: </b></div>

      <table border="1">
              <thead>
                <tr style="background-color: #D9D9D9;">
                 <th><div style="width: 100px;">Fecha del Ensayo</div></th>
                  <th><div style="width: 100px;">Código de Muestra</div></th>
                  <th><div style="width: 100px;">V (ml) muestra filtrada</th>
                  <th><div style="width: 100px;">No. de Cápsula</th>
                  <th><div style="width: 100px;">Cápsula vacía</th>
                  <th><div style="width: 100px;">Cápsula + muestra (75ºC)</th>
                  <th><div style="width: 100px;">Resultado (mg/L)</th>
                  <th><div style="width: 100px;">Responsable</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td> <?php
                     foreach($hidrocarburos->result() as $row){
                       $fechaEnsayo = $row->fechaEnsayo;
                      } echo $fechaEnsayo?></td>
                  <td><?php
                     foreach($hidrocarburos->result() as $row){
                       $codigoMuestra = $row->codigoMuestra;
                      } echo $codigoMuestra?></td>
                  <td><?php
                     foreach($hidrocarburos->result() as $row){
                       $vMuestraFiltrada = $row->vMuestraFiltrada;
                      } echo $vMuestraFiltrada?></td>                
                  <td><?php
                     foreach($hidrocarburos->result() as $row){
                       $noCapsula = $row->noCapsula;
                      } echo $noCapsula?></td>
                  <td><?php
                     foreach($hidrocarburos->result() as $row){
                       $capsulaVacia = $row->capsulaVacia;
                      } echo $capsulaVacia?></td>
                  <td><?php
                     foreach($hidrocarburos->result() as $row){
                       $capsulaMuestra = $row->capsulaMuestra;
                      } echo $capsulaMuestra?></td>
                  <td><?php
                     foreach($hidrocarburos->result() as $row){
                       $resultado = $row->resultado;
                      } echo $resultado?></td>
                  <td><?php
                     foreach($hidrocarburos->result() as $row){
                       $responsable = $row->responsable;
                      } echo $responsable?></td>
                </tr>
                
              </tbody>
            </table>
</div> 
<!-- Fin margen guía -->

</body>
</html>
