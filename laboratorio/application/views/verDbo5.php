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
                     foreach($dbo5->result() as $row){
                       $fechaRecepcion = $row->fechaRecepcion;
                      } echo $fechaRecepcion?>
    &nbsp&nbsp&nbsp 
    Código Interno: <?php
                     foreach($dbo5->result() as $row){
                       $codigoInterno = $row->codigoInterno;
                      } echo $codigoInterno?>

  </b>
</div><br><br>

<div style="font-size:12.0pt;"> &nbsp&nbsp&nbsp <b>Dbo5: </b></div>

     <table border="1">
              <thead>
                <tr style="background-color: #D9D9D9;">
                  <th><div style="width: 90px;">Fecha del Ensayo</div></th>
                  <th><div style="width: 90px;">Código de Muestra</div></th>
                  <th><div style="width: 90px;">Winkler No.</div></th>
                  <th><div style="width: 90px;">Factor de Dilución</div></th>
                  <th><div style="width: 90px;">V (ml) muestra</div></th>
                  <th><div style="width: 90px;">O.D. inicial</div></th>
                  <th><div style="width: 90px;">O.D. Final</div></th>
                  <th><div style="width: 90px;">Concentración (mg O<sub>2</sub>/L)</div></th>
                  <th><div style="width: 90px;">Concentración promedio (mg O<sub>2</sub> / L)</div></th>
                  <th><div style="width: 90px;">Responsable</div></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="4"><?php
                     foreach($dbo5->result() as $row){
                       $fechaEnsayo = $row->fechaEnsayo;
                      } echo $fechaEnsayo?></td>
                  <td rowspan="3"><?php
                     foreach($dbo5->result() as $row){
                       $codigoMuestra = $row->codigoMuestra;
                      } echo $codigoMuestra?></td>
                  <td><?php
                     foreach($dbo5->result() as $row){
                       $winklerNo1 = $row->winklerNo1;
                      } echo $winklerNo1?></td>                
                  <td><?php
                     foreach($dbo5->result() as $row){
                       $factorDilucion1 = $row->factorDilucion1;
                      } echo $factorDilucion1?></td>
                  <td><?php
                     foreach($dbo5->result() as $row){
                       $vMuestra1 = $row->vMuestra1;
                      } echo $vMuestra1?></td>
                  <td><?php
                     foreach($dbo5->result() as $row){
                       $odInicial1 = $row->odInicial1;
                      } echo $odInicial1?></td>
                  <td><?php
                     foreach($dbo5->result() as $row){
                       $odInicial1 = $row->odInicial1;
                      } echo $odInicial1?></td>
                  <td><?php
                     foreach($dbo5->result() as $row){
                       $concentracion1 = $row->concentracion1;
                      } echo $concentracion1?></td>
                  <td rowspan="3"><?php
                     foreach($dbo5->result() as $row){
                       $concentracionPromedio = $row->concentracionPromedio;
                      } echo $concentracionPromedio?></td>
                  <td rowspan="4"><?php
                     foreach($dbo5->result() as $row){
                       $responsable = $row->responsable;
                      } echo $responsable?></td>
                </tr>
                 <tr>
                  <td><?php
                     foreach($dbo5->result() as $row){
                       $winklerNo2 = $row->winklerNo2;
                      } echo $winklerNo2?></td>                
                  <td><?php
                     foreach($dbo5->result() as $row){
                       $factorDilucion2 = $row->factorDilucion2;
                      } echo $factorDilucion2?></td>
                  <td><?php
                     foreach($dbo5->result() as $row){
                       $vMuestra2 = $row->vMuestra2;
                      } echo $vMuestra2?></td>
                  <td><?php
                     foreach($dbo5->result() as $row){
                       $odInicial2 = $row->odInicial2;
                      } echo $odInicial2?></td>
                  <td><?php
                     foreach($dbo5->result() as $row){
                       $odFinal2 = $row->odFinal2;
                      } echo $odFinal2?></td>
                  <td><?php
                     foreach($dbo5->result() as $row){
                       $concentracion2 = $row->concentracion2;
                      } echo $concentracion2?></td>
                </tr>
                 <tr>                
                  <td><?php
                     foreach($dbo5->result() as $row){
                       $winklerNo3 = $row->winklerNo3;
                      } echo $winklerNo3?></td>
                  <td><?php
                     foreach($dbo5->result() as $row){
                       $factorDilucion3 = $row->factorDilucion3;
                      } echo $factorDilucion3?></td>
                  <td><?php
                     foreach($dbo5->result() as $row){
                       $vMuestra3 = $row->vMuestra3;
                      } echo $vMuestra3?></td>
                  <td><?php
                     foreach($dbo5->result() as $row){
                       $odInicial3 = $row->odInicial3;
                      } echo $odInicial3?></td>
                  <td><?php
                     foreach($dbo5->result() as $row){
                       $odFinal3 = $row->odFinal3;
                      } echo $odFinal3?></td>
                  <td><?php
                     foreach($dbo5->result() as $row){
                       $concentracion3 = $row->concentracion3;
                      } echo $concentracion3?></td>
                </tr>
                <tr>
                  <td>Solución Carta de Control</td>                  
                  <td ><?php
                     foreach($dbo5->result() as $row){
                       $winklerNoSolucionCartaControl = $row->winklerNoSolucionCartaControl;
                      } echo $winklerNoSolucionCartaControl?></td>
                  <td><?php
                     foreach($dbo5->result() as $row){
                       $factorDilucionSolucionCartaControl = $row->factorDilucionSolucionCartaControl;
                      } echo $factorDilucionSolucionCartaControl?></td>
                  <td><?php
                     foreach($dbo5->result() as $row){
                       $vMuestraSolucionCartaControl = $row->vMuestraSolucionCartaControl;
                      } echo $vMuestraSolucionCartaControl?></td>
                  <td><?php
                     foreach($dbo5->result() as $row){
                       $odInicialSolucionCartaControl = $row->odInicialSolucionCartaControl;
                      } echo $odInicialSolucionCartaControl?></td>
                  <td><?php
                     foreach($dbo5->result() as $row){
                       $odFinalSolucionCartaControl = $row->odFinalSolucionCartaControl;
                      } echo $odFinalSolucionCartaControl?></td>
                  <td><?php
                     foreach($dbo5->result() as $row){
                       $concentracionSolucionCartaControl = $row->concentracionSolucionCartaControl;
                      } echo $concentracionSolucionCartaControl?></td>
                  <td><?php
                     foreach($dbo5->result() as $row){
                       $concentracionPromedioSolucionCartaControl = $row->concentracionPromedioSolucionCartaControl;
                      } echo $concentracionPromedioSolucionCartaControl?></td>
                </tr>
              </tbody>
            </table>

</div> 
<!-- Fin margen guía -->

</body>
</html>
