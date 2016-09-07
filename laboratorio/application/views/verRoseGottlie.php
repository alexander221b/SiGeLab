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
                     foreach($roseGottlie->result() as $row){
                       $fechaRecepcion = $row->fechaRecepcion;
                      } echo $fechaRecepcion?>
    &nbsp&nbsp&nbsp 
    Código Interno: <?php
                     foreach($roseGottlie->result() as $row){
                       $codigoInterno = $row->codigoInterno;
                      } echo $codigoInterno?>

  </b>
</div><br><br>

<div style="font-size:12.0pt;"> &nbsp&nbsp&nbsp <b>Rose Gottlie: </b></div>

  <table border="1">
              <thead>
                <tr style="background-color: #D9D9D9;">
                  <th><div style="width: 100px;">Fecha del Ensayo</div></th>
                  <th><div style="width: 100px;">Código de Muestra</div></th>
                  <th><div style="width: 100px;">Cantidad de muestra (g. o ml.)</div></th>
                  <th><div style="width: 100px;">No. beaker</div></th>
                  <th><div style="width: 100px;">Peso beaker Vacio</div></th>
                  <th><div style="width: 100px;">Peso beaker + muestra (105ºC)</div></th>
                  <th><div style="width: 100px;">Resultado (%)</div></th>
                  <th><div style="width: 100px;">Responsable</div></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="2"> <?php
                     foreach($roseGottlie->result() as $row){
                       $fechaEnsayo = $row->fechaEnsayo;
                      } echo $fechaEnsayo?></td>
                  <td rowspan="2"><?php
                     foreach($roseGottlie->result() as $row){
                       $codigoMuestra = $row->codigoMuestra;
                      } echo $codigoMuestra?></td>
                  <td><?php
                     foreach($roseGottlie->result() as $row){
                       $cantidadMuestra1 = $row->cantidadMuestra1;
                      } echo $cantidadMuestra1?></td>                
                  <td><?php
                     foreach($roseGottlie->result() as $row){
                       $noBeaker1 = $row->noBeaker1;
                      } echo $noBeaker1?></td>
                  <td><?php
                     foreach($roseGottlie->result() as $row){
                       $pesoBeakerVacio1 = $row->pesoBeakerVacio1;
                      } echo $pesoBeakerVacio1?></td>
                  <td><?php
                     foreach($roseGottlie->result() as $row){
                       $pesoBeakerMuestra1 = $row->pesoBeakerMuestra1;
                      } echo $pesoBeakerMuestra1?></td>
                  <td><?php
                     foreach($roseGottlie->result() as $row){
                       $resultado1 = $row->resultado1;
                      } echo $resultado1?></td>
                  <td rowspan="2"><?php
                     foreach($roseGottlie->result() as $row){
                       $responsable = $row->responsable;
                      } echo $responsable?></td>
                </tr>
                <tr>
                  <td><?php
                     foreach($roseGottlie->result() as $row){
                       $cantidadMuestra2 = $row->cantidadMuestra2;
                      } echo $cantidadMuestra2?></td>                  
                  <td ><?php
                     foreach($roseGottlie->result() as $row){
                       $noBeaker2 = $row->noBeaker2;
                      } echo $noBeaker2?></td>
                  <td><?php
                     foreach($roseGottlie->result() as $row){
                       $pesoBeakerVacio2 = $row->pesoBeakerVacio2;
                      } echo $pesoBeakerVacio2?></td>
                  <td><?php
                     foreach($roseGottlie->result() as $row){
                       $pesoBeakerMuestra2 = $row->pesoBeakerMuestra2;
                      } echo $pesoBeakerMuestra2?></td>
                  <td><?php
                     foreach($roseGottlie->result() as $row){
                       $resultado2 = $row->resultado2;
                      } echo $resultado2?></td>
                </tr>
              
              </tbody>
            </table>

</div> 
<!-- Fin margen guía -->

</body>
</html>
