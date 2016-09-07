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
                     foreach($sulfatos->result() as $row){
                       $fechaRecepcion = $row->fechaRecepcion;
                      } echo $fechaRecepcion?>
    &nbsp&nbsp&nbsp 
    Código Interno: <?php
                     foreach($sulfatos->result() as $row){
                       $codigoInterno = $row->codigoInterno;
                      } echo $codigoInterno?>

  </b>
</div><br><br>

<div style="font-size:12.0pt;"> &nbsp&nbsp&nbsp <b>Sulfatos: </b></div>

  <table border="1">
              <thead>
                <tr style="background-color: #D9D9D9;">
                  <th><div style="width: 100px;">Fecha del Ensayo</div></th>
                  <th><div style="width: 100px;">Código de Muestra</div></th>
                  <th><div style="width: 100px;">V (mL) Muestra</th>
                  <th><div style="width: 100px;">V (mL) Final</th>
                  <th><div style="width: 100px;">Turbiedad (NTU)</th>
                  <th><div style="width: 100px;">T Blanco (NTU)</th>
                  <th><div style="width: 100px;">Concentración (mg SO<sub>4</sub><sup>2-</sup>/L)</th>
                  <th><div style="width: 100px;">Promedio (mg SO<sub>4</sub><sup>2-</sup>/L)</th>
                  <th><div style="width: 100px;">Responsable</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="3"> <?php
                     foreach($sulfatos->result() as $row){
                       $fechaEnsayo = $row->fechaEnsayo;
                      } echo $fechaEnsayo?></td>
                  <td rowspan="2"><?php
                     foreach($sulfatos->result() as $row){
                       $codigoMuestra = $row->codigoMuestra;
                      } echo $codigoMuestra?></td>
                  <td><?php
                     foreach($sulfatos->result() as $row){
                       $vMuestra1 = $row->vMuestra1;
                      } echo $vMuestra1?></td>                
                  <td><?php
                     foreach($sulfatos->result() as $row){
                       $vFinal1 = $row->vFinal1;
                      } echo $vFinal1?></td>
                  <td><?php
                     foreach($sulfatos->result() as $row){
                       $turbiedad1 = $row->turbiedad1;
                      } echo $turbiedad1?></td>
                  <td rowspan="2"><?php
                     foreach($sulfatos->result() as $row){
                       $tBlanco = $row->tBlanco;
                      } echo $tBlanco?></td>
                  <td ><?php
                     foreach($sulfatos->result() as $row){
                       $concentracion1 = $row->concentracion1;
                      } echo $concentracion1?></td>
                  <td rowspan="2"><?php
                     foreach($sulfatos->result() as $row){
                       $promedio = $row->promedio;
                      } echo $promedio?></td>
                  <td rowspan="3"><?php
                     foreach($sulfatos->result() as $row){
                       $responsable = $row->responsable;
                      } echo $responsable?></td>
                </tr>
                <tr>
                  <td><?php
                     foreach($sulfatos->result() as $row){
                       $vMuestra2 = $row->vMuestra2;
                      } echo $vMuestra2?></td>                  
                  <td><?php
                     foreach($sulfatos->result() as $row){
                       $vFinal2 = $row->vFinal2;
                      } echo $vFinal2?></td>
                  <td><?php
                     foreach($sulfatos->result() as $row){
                       $turbiedad2 = $row->turbiedad2;
                      } echo $turbiedad2?></td>
                  <td><?php
                     foreach($sulfatos->result() as $row){
                       $concentracion2 = $row->concentracion2;
                      } echo $concentracion2?></td>
                </tr>
                <tr>
                  <td >Solución Carta de Control</td>
                  <td><?php
                     foreach($sulfatos->result() as $row){
                       $vMuestraSolucionCartaControl = $row->vMuestraSolucionCartaControl;
                      } echo $vMuestraSolucionCartaControl?></td>                  
                  <td><?php
                     foreach($sulfatos->result() as $row){
                       $vFinalSolucionCartaControl = $row->vFinalSolucionCartaControl;
                      } echo $vFinalSolucionCartaControl?></td>
                  <td><?php
                     foreach($sulfatos->result() as $row){
                       $turbiedadSolucionCartaControl = $row->turbiedadSolucionCartaControl;
                      } echo $turbiedadSolucionCartaControl?></td>
                  <td><?php
                     foreach($sulfatos->result() as $row){
                       $tBlancoSolucionCartaControl = $row->tBlancoSolucionCartaControl;
                      } echo $tBlancoSolucionCartaControl?></td>
                  <td><?php
                     foreach($sulfatos->result() as $row){
                       $concentracionSolucionCartaControl = $row->concentracionSolucionCartaControl;
                      } echo $concentracionSolucionCartaControl?></td>
                  <td><?php
                     foreach($sulfatos->result() as $row){
                       $promedioSolucionCartaControl = $row->promedioSolucionCartaControl;
                      } echo $promedioSolucionCartaControl?></td>
                </tr>
              </tbody>
            </table>
</div> 
<!-- Fin margen guía -->

</body>
</html>
