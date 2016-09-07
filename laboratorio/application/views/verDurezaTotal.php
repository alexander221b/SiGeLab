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
                     foreach($durezaTotal->result() as $row){
                       $fechaRecepcion = $row->fechaRecepcion;
                      } echo $fechaRecepcion?>
    &nbsp&nbsp&nbsp 
    Código Interno: <?php
                     foreach($durezaTotal->result() as $row){
                       $codigoInterno = $row->codigoInterno;
                      } echo $codigoInterno?>

  </b>
</div><br><br>

<div style="font-size:12.0pt;"> &nbsp&nbsp&nbsp <b>Dureza Total: </b></div>

      <table border="1">
              <thead>
                <tr style="background-color: #D9D9D9;">
                  <th><div style="width: 91px;" >Fecha del Ensayo</div></th>
                  <th><div style="width: 91px;">Código de Muestra</div></th>
                  <th><div style="width: 91px;">V (mL) muestra</th>
                  <th><div style="width: 91px;">V (mL) final</th>
                  <th><div style="width: 91px;">Concentración EDTA (M)</th>
                  <th><div style="width: 91px;">V (mL) EDTA</th>
                  <th><div style="width: 91px;">Resultado mg CaCO<sub>3</sub>/L</th>
                  <th><div style="width: 91px;">Promedio mg CaCO<sub>3</sub>/L</th>
                  <th><div style="width: 91px;">Responsable</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php
                     foreach($durezaTotal->result() as $row){
                       $fechaEnsayo = $row->fechaEnsayo;
                      } echo $fechaEnsayo?></td>
                  <td><?php
                     foreach($durezaTotal->result() as $row){
                       $codigoMuestra = $row->codigoMuestra;
                      } echo $codigoMuestra?></td> 
                  <td><?php
                     foreach($durezaTotal->result() as $row){
                       $vMuestraBlanco = $row->vMuestraBlanco;
                      } echo $vMuestraBlanco?></td>
                  <td><?php
                     foreach($durezaTotal->result() as $row){
                       $vFinalBlanco = $row->vFinalBlanco;
                      } echo $vFinalBlanco?></td>
                  <td><?php
                     foreach($durezaTotal->result() as $row){
                       $concentracionEdtaBlanco = $row->concentracionEdtaBlanco;
                      } echo $concentracionEdtaBlanco?></td>
                  <td><?php
                     foreach($durezaTotal->result() as $row){
                       $vEdtaBlanco = $row->vEdtaBlanco;
                      } echo $vEdtaBlanco?></td>
                  <td><?php
                     foreach($durezaTotal->result() as $row){
                       $resultadoBlanco = $row->resultadoBlanco;
                      } echo $resultadoBlanco?></td>
                  <td><?php
                     foreach($durezaTotal->result() as $row){
                       $promedioBlanco = $row->promedioBlanco;
                      } echo $promedioBlanco?></td>                  
                  <td rowspan="4"><?php
                     foreach($durezaTotal->result() as $row){
                       $responsable = $row->responsable;
                      } echo $responsable?></td>
                </tr>
                <tr>
                  <td rowspan="3"> </td>
                  <td rowspan="2"> </td>
                  <td><?php
                     foreach($durezaTotal->result() as $row){
                       $vMuestra1 = $row->vMuestra1;
                      } echo $vMuestra1?></td>
                  <td><?php
                     foreach($durezaTotal->result() as $row){
                       $vFinal1 = $row->vFinal1;
                      } echo $vFinal1?></td>
                  <td><?php
                     foreach($durezaTotal->result() as $row){
                       $concentracionEdta1 = $row->concentracionEdta1;
                      } echo $concentracionEdta1?></td>
                  <td><?php
                     foreach($durezaTotal->result() as $row){
                       $vEdta1 = $row->vEdta1;
                      } echo $vEdta1?></td>
                  <td><?php
                     foreach($durezaTotal->result() as $row){
                       $resultado1 = $row->resultado1;
                      } echo $resultado1?></td>
                  <td rowspan="2"><?php
                     foreach($durezaTotal->result() as $row){
                       $promedio = $row->promedio;
                      } echo $promedio?></td>
                </tr>
                <tr>
                  <td><?php
                     foreach($durezaTotal->result() as $row){
                       $vMuestra2 = $row->vMuestra2;
                      } echo $vMuestra2?></td>
                  <td><?php
                     foreach($durezaTotal->result() as $row){
                       $vFinal2 = $row->vFinal2;
                      } echo $vFinal2?></td>
                  <td><?php
                     foreach($durezaTotal->result() as $row){
                       $concentracionEdta2 = $row->concentracionEdta2;
                      } echo $concentracionEdta2?></td>
                  <td><?php
                     foreach($durezaTotal->result() as $row){
                       $vEdta2 = $row->vEdta2;
                      } echo $vEdta2?></td>
                  <td><?php
                     foreach($durezaTotal->result() as $row){
                       $resultado2 = $row->resultado2;
                      } echo $resultado2?></td>
                </tr>
                <tr>
                  <td >Solución Carta de Control</td>
                  <td><?php
                     foreach($durezaTotal->result() as $row){
                       $vMuestraSolucionCartaControl = $row->vMuestraSolucionCartaControl;
                      } echo $vMuestraSolucionCartaControl?></td>
                  <td><?php
                     foreach($durezaTotal->result() as $row){
                       $vFinalSolucionCartaControl = $row->vFinalSolucionCartaControl;
                      } echo $vFinalSolucionCartaControl?></td>
                  <td><?php
                     foreach($durezaTotal->result() as $row){
                       $concentracionEdtaSolucionCartaControl = $row->concentracionEdtaSolucionCartaControl;
                      } echo $concentracionEdtaSolucionCartaControl?></td>
                  <td><?php
                     foreach($durezaTotal->result() as $row){
                       $vEdtaSolucionCartaControl = $row->vEdtaSolucionCartaControl;
                      } echo $vEdtaSolucionCartaControl?></td>
                  <td><?php
                     foreach($durezaTotal->result() as $row){
                       $resultadoSolucionCartaControl = $row->resultadoSolucionCartaControl;
                      } echo $resultadoSolucionCartaControl?></td>
                  <td><?php
                     foreach($durezaTotal->result() as $row){
                       $promedioSolucionCartaControl = $row->promedioSolucionCartaControl;
                      } echo $promedioSolucionCartaControl?></td>                  
                </tr>
                
              </tbody>
            </table>

</div> 
<!-- Fin margen guía -->

</body>
</html>
