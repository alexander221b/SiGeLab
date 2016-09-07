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
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $fechaRecepcion = $row->fechaRecepcion;
                      } echo $fechaRecepcion?>
    &nbsp&nbsp&nbsp 
    Código Interno: <?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $codigoInterno = $row->codigoInterno;
                      } echo $codigoInterno?>

  </b>
</div><br><br>

<div style="font-size:12.0pt;"> &nbsp&nbsp&nbsp <b>Dureza Calcica Magnesica: </b></div>

     <table border="1">
              <thead>
                <tr style="background-color: #D9D9D9;">
                  <th><div style="width: 91px;" >Fecha del Ensayo</div></th>
                  <th><div style="width: 91px;">Código de Muestra</div></th>
                  <th><div style="width: 91px;">V (mL) muestra</th>
                  <th><div style="width: 91px;">V (mL) final</th>
                  <th><div style="width: 91px;">Concentración EDTA (M)</th>
                  <th><div style="width: 91px;">V (mL) EDTA</th>
                  <th><div style="width: 91px;">Concentración (mg CaCO3/L) Dureza Cálcica</th>
                  <th><div style="width: 91px;">Concentración (mg CaCO3/L) Dureza Magnésica</th>
                  <th><div style="width: 91px;">Responsable</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $fechaEnsayo = $row->fechaEnsayo;
                      } echo $fechaEnsayo?></td>
                  <td><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $codigoMuestra = $row->codigoMuestra;
                      } echo $codigoMuestra?></td> 
                  <td><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $vMuestraBlanco = $row->vMuestraBlanco;
                      } echo $vMuestraBlanco?></td>
                  <td><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $vFinalBlanco = $row->vFinalBlanco;
                      } echo $vFinalBlanco?></td>
                  <td><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $concentracionEdtaBlanco = $row->concentracionEdtaBlanco;
                      } echo $concentracionEdtaBlanco?></td>
                  <td><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $vEdtaBlanco = $row->vEdtaBlanco;
                      } echo $vEdtaBlanco?></td>
                  <td><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $durezaCalcicaBlanco = $row->durezaCalcicaBlanco;
                      } echo $durezaCalcicaBlanco?></td>
                  <td><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $durezaMagnesicaBlanco = $row->durezaMagnesicaBlanco;
                      } echo $durezaMagnesicaBlanco?></td>                  
                  <td rowspan="4"><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $responsable = $row->responsable;
                      } echo $responsable?></td>
                </tr>
                <tr>
                  <td rowspan="3"> </td>
                  <td><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $codigoMuestra1 = $row->codigoMuestra1;
                      } echo $codigoMuestra1?></td>
                  <td><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $vMuestra1 = $row->vMuestra1;
                      } echo $vMuestra1?></td>
                  <td><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $vFinal1 = $row->vFinal1;
                      } echo $vFinal1?></td>
                  <td><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $concentracionEdta1 = $row->concentracionEdta1;
                      } echo $concentracionEdta1?></td>
                  <td><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $vEdta1 = $row->vEdta1;
                      } echo $vEdta1?></td>
                  <td rowspan="2"><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $durezaCalcica = $row->durezaCalcica;
                      } echo $durezaCalcica?></td>
                  <td rowspan="2"><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $durezaMagnesica = $row->durezaMagnesica;
                      } echo $durezaMagnesica?></td>
                </tr>
                <tr>
                  <td><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $codigoMuestra2 = $row->codigoMuestra2;
                      } echo $codigoMuestra2?></td>
                  <td><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $vMuestra2 = $row->vMuestra2;
                      } echo $vMuestra2?></td>
                  <td><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $vFinal2 = $row->vFinal2;
                      } echo $vFinal2?></td>
                  <td><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $concentracionEdta2 = $row->concentracionEdta2;
                      } echo $concentracionEdta2?></td>
                  <td><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $vEdta2 = $row->vEdta2;
                      } echo $vEdta2?></td>
                </tr>
                <tr>
                  <td >Solución Carta de Control</td>
                  <td><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $vMuestraSolucionCartaControl = $row->vMuestraSolucionCartaControl;
                      } echo $vMuestraSolucionCartaControl?></td>
                  <td><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $vFinalSolucionCartaControl = $row->vFinalSolucionCartaControl;
                      } echo $vFinalSolucionCartaControl?></td>
                  <td><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $concentracionEdtaSolucionCartaControl = $row->concentracionEdtaSolucionCartaControl;
                      } echo $concentracionEdtaSolucionCartaControl?></td>
                  <td><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $vEdtaSolucionCartaControl = $row->vEdtaSolucionCartaControl;
                      } echo $vEdtaSolucionCartaControl?></td>
                  <td><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $durezaCalcicaSolucionCartaControl = $row->durezaCalcicaSolucionCartaControl;
                      } echo $durezaCalcicaSolucionCartaControl?></td>
                  <td><?php
                     foreach($durezaCalcicaMagnesica->result() as $row){
                       $durezaMagnesicaSolucionCartaControl = $row->durezaMagnesicaSolucionCartaControl;
                      } echo $durezaMagnesicaSolucionCartaControl?></td>                  
                </tr>
              </tbody>
            </table>

</div> 
<!-- Fin margen guía -->

</body>
</html>
