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
                     foreach($metales->result() as $row){
                       $fechaRecepcion = $row->fechaRecepcion;
                      } echo $fechaRecepcion?>
    &nbsp&nbsp&nbsp 
    Código Interno: <?php
                     foreach($metales->result() as $row){
                       $codigoInterno = $row->codigoInterno;
                      } echo $codigoInterno?>

  </b>
</div><br><br>

<div style="font-size:12.0pt;"> &nbsp&nbsp&nbsp <b>Metales: </b></div>

      <table border="1">
              <thead>
                <tr style="background-color: #D9D9D9;">
                 <th><div style="width: 100px;">Fecha del Ensayo</div></th>
                  <th><div style="width: 100px;">Código de Muestra</div></th>
                  <th><div style="width: 100px;">Metal</th>
                  <th><div style="width: 100px;">Técnica</th>
                  <th><div style="width: 100px;">Cantidad de muestra (g. o ml.)</th>
                  <th><div style="width: 100px;">V (mL) Final</th>
                  <th><div style="width: 100px;">Factor de Dilución</th>
                  <th><div style="width: 100px;">Absorbancia</th>
                  <th><div style="width: 100px;">Concentración leída</th>
                  <th><div style="width: 100px;">Unidades(mg/L ó &#181;g/L)</th>
                  <th><div style="width: 100px;">Concentración corregida</th>
                  <th><div style="width: 100px;">Unidades</th>
                  <th><div style="width: 100px;">Responsable</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="2"> <?php
                     foreach($metales->result() as $row){
                       $fechaEnsayo = $row->fechaEnsayo;
                      } echo $fechaEnsayo?></td>
                  <td><?php
                     foreach($metales->result() as $row){
                       $codigoMuestra = $row->codigoMuestra;
                      } echo $codigoMuestra?></td>
                  <td><?php
                     foreach($metales->result() as $row){
                       $metal = $row->metal;
                      } echo $metal?></td>
                  <td><?php
                     foreach($metales->result() as $row){
                       $tecnica = $row->tecnica;
                      } echo $tecnica?></td>
                  <td><?php
                     foreach($metales->result() as $row){
                       $cantidadMuestra = $row->cantidadMuestra;
                      } echo $cantidadMuestra?></td>
                  <td><?php
                     foreach($metales->result() as $row){
                       $vFinal = $row->vFinal;
                      } echo $vFinal?></td>
                  <td><?php
                     foreach($metales->result() as $row){
                       $factorDilucion = $row->factorDilucion;
                      } echo $factorDilucion?></td>
                  <td><?php
                     foreach($metales->result() as $row){
                       $absorbancia = $row->absorbancia;
                      } echo $absorbancia?></td>
                  <td><?php
                     foreach($metales->result() as $row){
                       $concentracionLeida = $row->concentracionLeida;
                      } echo $concentracionLeida?></td>
                  <td><?php
                     foreach($metales->result() as $row){
                       $concentracionMgUg = $row->concentracionMgUg;
                      } echo $concentracionMgUg?></td>
                  <td><?php
                     foreach($metales->result() as $row){
                       $concentracionCorregida = $row->concentracionCorregida;
                      } echo $concentracionCorregida?></td>
                  <td><?php
                     foreach($metales->result() as $row){
                       $unidades = $row->unidades;
                      } echo $unidades?></td>
                  <td rowspan="2"><?php
                     foreach($metales->result() as $row){
                       $responsable = $row->responsable;
                      } echo $responsable?></td>
                </tr>
                <tr>
                  <td >Solución Carta de Control**</td>
                  <td><?php
                     foreach($metales->result() as $row){
                       $metalSolucionCartaControl = $row->metalSolucionCartaControl;
                      } echo $metalSolucionCartaControl?></td>
                  <td><?php
                     foreach($metales->result() as $row){
                       $tecnicaSolucionCartaControl = $row->tecnicaSolucionCartaControl;
                      } echo $tecnicaSolucionCartaControl?></td>
                  <td><?php
                     foreach($metales->result() as $row){
                       $cantidadMuestraSolucionCartaControl = $row->cantidadMuestraSolucionCartaControl;
                      } echo $cantidadMuestraSolucionCartaControl?></td>
                  <td><?php
                     foreach($metales->result() as $row){
                       $vFinalSolucionCartaControl = $row->vFinalSolucionCartaControl;
                      } echo $vFinalSolucionCartaControl?></td>
                  <td><?php
                     foreach($metales->result() as $row){
                       $factorDilucionSolucionCartaControl = $row->factorDilucionSolucionCartaControl;
                      } echo $factorDilucionSolucionCartaControl?></td>
                  <td><?php
                     foreach($metales->result() as $row){
                       $absorbanciaSolucionCartaControl = $row->absorbanciaSolucionCartaControl;
                      } echo $absorbanciaSolucionCartaControl?></td>
                  <td><?php
                     foreach($metales->result() as $row){
                       $concentracionLeidaSolucionCartaControl = $row->concentracionLeidaSolucionCartaControl;
                      } echo $concentracionLeidaSolucionCartaControl?></td>
                  <td><?php
                     foreach($metales->result() as $row){
                       $concentracionMgUgSolucionCartaControl = $row->concentracionMgUgSolucionCartaControl;
                      } echo $concentracionMgUgSolucionCartaControl?></td>
                  <td><?php
                     foreach($metales->result() as $row){
                       $concentracionCorregidaSolucionCartaControl = $row->concentracionCorregidaSolucionCartaControl;
                      } echo $concentracionCorregidaSolucionCartaControl?></td>
                  <td><?php
                     foreach($metales->result() as $row){
                       $unidadesSolucionCartaControl = $row->unidadesSolucionCartaControl;
                      } echo $unidadesSolucionCartaControl?></td>
                </tr>
              
              </tbody>
            </table>
            <div class="h4">** La solución para la Carta de control aplica para el análisis de Hierro</div>
         
</div> 
<!-- Fin margen guía -->

</body>
</html>
