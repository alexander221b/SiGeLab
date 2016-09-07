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
                     foreach($aluminio->result() as $row){
                       $fechaRecepcion = $row->fechaRecepcion;
                      } echo $fechaRecepcion?>
    &nbsp&nbsp&nbsp 
    Código Interno: <?php
                     foreach($aluminio->result() as $row){
                       $codigoInterno = $row->codigoInterno;
                      } echo $codigoInterno?>

  </b>
</div><br><br>

<div style="font-size:12.0pt;"> &nbsp&nbsp&nbsp <b>Análisis Físicos: </b></div>

  <table border="1">
              <thead>
                <tr style="background-color: #D9D9D9; width: 720px; text-align: center; font-size:10.0pt">
                  <th><div style="width: 91px;">Fecha del Ensayo</div></th>
                  <th><div style="width: 91px;">Código de Muestra</div></th>
                  <th><div style="width: 91px;">V (mL) Muestra</th>
                  <th><div style="width: 91px;">V(mL) Final</th>
                  <th><div style="width: 91px;">Absorbancia</th>
                  <th><div style="width: 91px;">Concentración mg / L</th>
                  <th><div style="width: 91px;">Concentración Corregida mg Al / L</th>
                  <th><div style="width: 91px;">Concentración Promedio mg Al / L</th>
                  <th><div style="width: 91px;">Responsable</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="3"> <?php
                     foreach($aluminio->result() as $row){
                       $fechaEnsayo = $row->fechaEnsayo;
                      } echo $fechaEnsayo?></td>
                  <td rowspan="2"><?php
                     foreach($aluminio->result() as $row){
                       $codigoMuestra = $row->codigoMuestra;
                      } echo $codigoMuestra?></td>
                  <td><?php
                     foreach($aluminio->result() as $row){
                       $vMuestra1 = $row->vMuestra1;
                      } echo $vMuestra1?></td>                
                  <td><?php
                     foreach($aluminio->result() as $row){
                       $vFinal1 = $row->vFinal1;
                      } echo $vFinal1?></td>
                  <td><?php
                     foreach($aluminio->result() as $row){
                       $absorbancia1 = $row->absorbancia1;
                      } echo $absorbancia1?></td>
                  <td><?php
                     foreach($aluminio->result() as $row){
                       $concentracion1 = $row->concentracion1;
                      } echo $concentracion1?></td>
                  <td><?php
                     foreach($aluminio->result() as $row){
                       $concentracionCorregida1 = $row->concentracionCorregida1;
                      } echo $concentracionCorregida1?></td>
                  <td rowspan="2"><?php
                     foreach($aluminio->result() as $row){
                       $concentracionPromedio = $row->concentracionPromedio;
                      } echo $concentracionPromedio?></td>
                  <td rowspan="3"><?php
                     foreach($aluminio->result() as $row){
                       $responsable = $row->responsable;
                      } echo $responsable?></td>
                </tr>
                <tr>
                  <td><?php
                     foreach($aluminio->result() as $row){
                       $vMuestra2 = $row->vMuestra2;
                      } echo $vMuestra2?></td>                  
                  <td><?php
                     foreach($aluminio->result() as $row){
                       $vFinal2 = $row->vFinal2;
                      } echo $vFinal2?></td>
                  <td><?php
                     foreach($aluminio->result() as $row){
                       $absorbancia2 = $row->absorbancia2;
                      } echo $absorbancia2?></td>
                  <td><?php
                     foreach($aluminio->result() as $row){
                       $concentracion2 = $row->concentracion2;
                      } echo $concentracion2?></td>
                  <td ><?php
                     foreach($aluminio->result() as $row){
                       $concentracionCorregida2 = $row->concentracionCorregida2;
                      } echo $concentracionCorregida2?></td>
                </tr>
                <tr>
                  <td >Solución Carta de Control</td>
                  <td><?php
                     foreach($aluminio->result() as $row){
                       $vMuestraSolucionCartaControl = $row->vMuestraSolucionCartaControl;
                      } echo $vMuestraSolucionCartaControl?></td>                  
                  <td><?php
                     foreach($aluminio->result() as $row){
                       $vFinalSolucionCartaControl = $row->vFinalSolucionCartaControl;
                      } echo $vFinalSolucionCartaControl?></td>
                  <td><?php
                     foreach($aluminio->result() as $row){
                       $absorbanciaSolucionCartaControl = $row->absorbanciaSolucionCartaControl;
                      } echo $absorbanciaSolucionCartaControl?></td>
                  <td><?php
                     foreach($aluminio->result() as $row){
                       $concentracionSolucionCartaControl = $row->concentracionSolucionCartaControl;
                      } echo $concentracionSolucionCartaControl?></td>
                  <td><?php
                     foreach($aluminio->result() as $row){
                       $concentracionCorregidaSolucionCartaControl = $row->concentracionCorregidaSolucionCartaControl;
                      } echo $concentracionCorregidaSolucionCartaControl?></td>
                  <td><?php
                     foreach($aluminio->result() as $row){
                       $concentracionPromedioSolucionCartaControl = $row->concentracionPromedioSolucionCartaControl;
                      } echo $concentracionPromedioSolucionCartaControl?></td>
                </tr>
              </tbody>
            </table>

</div> 
<!-- Fin margen guía -->

</body>
</html>
