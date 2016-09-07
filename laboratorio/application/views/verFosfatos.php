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
                     foreach($fosfatos->result() as $row){
                       $fechaRecepcion = $row->fechaRecepcion;
                      } echo $fechaRecepcion?>
    &nbsp&nbsp&nbsp 
    Código Interno: <?php
                     foreach($fosfatos->result() as $row){
                       $codigoInterno = $row->codigoInterno;
                      } echo $codigoInterno?>

  </b>
</div><br><br>

<div style="font-size:12.0pt;"> &nbsp&nbsp&nbsp <b>Fosfatos: </b></div>

      <table border="1">
              <thead>
                <tr style="background-color: #D9D9D9;">
                  <th><div style="width: 90px;">Fecha del Ensayo</div></th>
                  <th><div style="width: 90px;">Código de Muestra</div></th>
                  <th><div style="width: 90px;">(g o mL) digestión</th>
                  <th><div style="width: 90px;">V(mL) final digestión</th>
                  <th><div style="width: 90px;">V(mL) Alícuota</th>
                  <th><div style="width: 90px;">V(mL) final</th>
                  <th><div style="width: 90px;">Absorbancia</th>
                  <th><div style="width: 90px;">Concentración (mg P /L)</th>
                  <th><div style="width: 90px;">Concentración (mg PO<sub>4</sub><sup>3-</sup>/L)</th>
                  <th><div style="width: 90px;">Concentración Promedio (mg PO<sub>4</sub><sup>3-</sup>/L)</th>
                  <th><div style="width: 90px;">Responsable</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="3"> <?php
                     foreach($fosfatos->result() as $row){
                       $fechaEnsayo = $row->fechaEnsayo;
                      } echo $fechaEnsayo?></td>
                  <td rowspan="2"><?php
                     foreach($fosfatos->result() as $row){
                       $codigoMuestra = $row->codigoMuestra;
                      } echo $codigoMuestra?></td>
                  <td><?php
                     foreach($fosfatos->result() as $row){
                       $digestion1 = $row->digestion1;
                      } echo $digestion1?></td>
                  <td><?php
                     foreach($fosfatos->result() as $row){
                       $vFinalDigestion1 = $row->vFinalDigestion1;
                      } echo $vFinalDigestion1?></td>
                  <td><?php
                     foreach($fosfatos->result() as $row){
                       $vAlicuota1 = $row->vAlicuota1;
                      } echo $vAlicuota1?></td>
                  <td><?php
                     foreach($fosfatos->result() as $row){
                       $vFinal1 = $row->vFinal1;
                      } echo $vFinal1?></td>
                  <td><?php
                     foreach($fosfatos->result() as $row){
                       $absorbancia1 = $row->absorbancia1;
                      } echo $absorbancia1?></td>
                  <td><?php
                     foreach($fosfatos->result() as $row){
                       $concentracion1 = $row->concentracion1;
                      } echo $concentracion1?></td>
                  <td><?php
                     foreach($fosfatos->result() as $row){
                       $concentracionPo1 = $row->concentracionPo1;
                      } echo $concentracionPo1?></td>
                  <td rowspan="2"><?php
                     foreach($fosfatos->result() as $row){
                       $concentracionPromedio = $row->concentracionPromedio;
                      } echo $concentracionPromedio?></td>
                  <td rowspan="3"><?php
                     foreach($fosfatos->result() as $row){
                       $responsable = $row->responsable;
                      } echo $responsable?></td>
                </tr>
                <tr>
                  <td><?php
                     foreach($fosfatos->result() as $row){
                       $digestion2 = $row->digestion2;
                      } echo $digestion2?></td>
                  <td><?php
                     foreach($fosfatos->result() as $row){
                       $vFinalDigestion2 = $row->vFinalDigestion2;
                      } echo $vFinalDigestion2?></td>
                  <td><?php
                     foreach($fosfatos->result() as $row){
                       $vAlicuota2 = $row->vAlicuota2;
                      } echo $vAlicuota2?></td>
                  <td><?php
                     foreach($fosfatos->result() as $row){
                       $vFinal2 = $row->vFinal2;
                      } echo $vFinal2?></td>
                  <td><?php
                     foreach($fosfatos->result() as $row){
                       $absorbancia2 = $row->absorbancia2;
                      } echo $absorbancia2?></td>
                  <td><?php
                     foreach($fosfatos->result() as $row){
                       $concentracion2 = $row->concentracion2;
                      } echo $concentracion2?></td>
                  <td><?php
                     foreach($fosfatos->result() as $row){
                       $concentracionPo2 = $row->concentracionPo2;
                      } echo $concentracionPo2?></td>
                </tr>
                <tr>
                  <td >Solución Carta de Control</td>
                  <td><?php
                     foreach($fosfatos->result() as $row){
                       $digestionSolucionCartaControl = $row->digestionSolucionCartaControl;
                      } echo $digestionSolucionCartaControl?></td>
                  <td><?php
                     foreach($fosfatos->result() as $row){
                       $vFinalDigestionSolucionCartaControl = $row->vFinalDigestionSolucionCartaControl;
                      } echo $vFinalDigestionSolucionCartaControl?></td>
                  <td><?php
                     foreach($fosfatos->result() as $row){
                       $vAlicuotaSolucionCartaControl = $row->vAlicuotaSolucionCartaControl;
                      } echo $vAlicuotaSolucionCartaControl?></td>
                  <td><?php
                     foreach($fosfatos->result() as $row){
                       $vFinalSolucionCartaControl = $row->vFinalSolucionCartaControl;
                      } echo $vFinalSolucionCartaControl?></td>
                  <td><?php
                     foreach($fosfatos->result() as $row){
                       $absorbanciaSolucionCartaControl = $row->absorbanciaSolucionCartaControl;
                      } echo $absorbanciaSolucionCartaControl?></td>
                  <td><?php
                     foreach($fosfatos->result() as $row){
                       $concentracionSolucionCartaControl = $row->concentracionSolucionCartaControl;
                      } echo $concentracionSolucionCartaControl?></td>
                  <td><?php
                     foreach($fosfatos->result() as $row){
                       $concentracionSolucionCartaControl = $row->concentracionSolucionCartaControl;
                      } echo $concentracionSolucionCartaControl?></td>
                  <td><?php
                     foreach($fosfatos->result() as $row){
                       $concentracionPromedioSolucionCartaControl = $row->concentracionPromedioSolucionCartaControl;
                      } echo $concentracionPromedioSolucionCartaControl?></td>
                </tr>
                
              </tbody>
            </table>
</div> 
<!-- Fin margen guía -->

</body>
</html>
