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
                     foreach($dqo->result() as $row){
                       $fechaRecepcion = $row->fechaRecepcion;
                      } echo $fechaRecepcion?>
    &nbsp&nbsp&nbsp 
    Código Interno: <?php
                     foreach($dqo->result() as $row){
                       $codigoInterno = $row->codigoInterno;
                      } echo $codigoInterno?>

  </b>
</div><br><br>

<div style="font-size:12.0pt;"> &nbsp&nbsp&nbsp <b>dqo: </b></div>

    <table border="1" >
               <thead>
                <tr style="background-color: #D9D9D9;">
                  <th class="active"><div style="width: 90px;"></div></th>
                  <th class="active"><div style="width: 90px;">V (ml) alícuota K<sub>2</sub>Cr<sub>2</sub>O<sub>7</sub> 0,1 N</div></th>
                  <th class="active"><div style="width: 90px;">V (ml.) FAS</div></th>
                  <th class="active"><div style="width: 90px;">Normalidad FAS 0,05 N calculada</div></th>
                  <th class="active"><div style="width: 90px;">Normalidad Promedio FAS 0,05 N</div></th>
                  <th class="active"><div style="width: 90px;">V (mL) Consumido Blanco</div></th>
                </tr>
              </thead>
              <tr>
                  <th rowspan="3" class="active"><strong>Estandarización</strong></td>
                  <td><?php
                     foreach($dqo->result() as $row){
                       $vAlicuota1 = $row->vAlicuota1;
                      } echo $vAlicuota1?></td>
                  <td><?php
                     foreach($dqo->result() as $row){
                       $vFas11 = $row->vFas11;
                      } echo $vFas11?></td>                
                  <td><?php
                     foreach($dqo->result() as $row){
                       $normalidadFas1 = $row->normalidadFas1;
                      } echo $normalidadFas1?></td>
                  <td rowspan="2"><?php
                     foreach($dqo->result() as $row){
                       $normalidadPromedioFas = $row->normalidadPromedioFas;
                      } echo $normalidadPromedioFas?></td>
                  <td><?php
                     foreach($dqo->result() as $row){
                       $vConsumidoBlanco1 = $row->vConsumidoBlanco1;
                      } echo $vConsumidoBlanco1?></td>
                </tr>
                <tr>
                  <td><?php
                     foreach($dqo->result() as $row){
                       $vAlicuota2 = $row->vAlicuota2;
                      } echo $vAlicuota2?></td>                  
                  <td ><?php
                     foreach($dqo->result() as $row){
                       $vFas12 = $row->vFas12;
                      } echo $vFas12?></td>
                  <td><?php
                     foreach($dqo->result() as $row){
                       $normalidadFas2 = $row->normalidadFas2;
                      } echo $normalidadFas2?></td>
                  <td><?php
                     foreach($dqo->result() as $row){
                       $vConsumidoBlanco2 = $row->vConsumidoBlanco2;
                      } echo $vConsumidoBlanco2?></td>
                </tr>
              <thead>
                <tr style="background-color: #D9D9D9;">
                  <th class="active"><div style="width: 90px;">Fecha de Análisis</div></th>
                  <th class="active"><div style="width: 90px;">Código de Muestra</div></th>
                  <th class="active"><div style="width: 90px;">V (mL) muestra</div></th>
                  <th class="active"><div style="width: 90px;">Factor de Dilución</div></th>
                  <th class="active"><div style="width: 90px;">V (mL) FAS</div></th>
                  <th class="active"><div style="width: 90px;">Concentración (mg O2/ L)</div></th>
                  <th class="active"><div style="width: 90px;">Concentración Promedio (mg O2/ L)</div></th>
                  <th class="active"><div style="width: 90px;">Responsable</div></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="4"><?php
                     foreach($dqo->result() as $row){
                       $fechaAnalisis = $row->fechaAnalisis;
                      } echo $fechaAnalisis?></td>
                  <td rowspan="3"><?php
                     foreach($dqo->result() as $row){
                       $codigoMuestra = $row->codigoMuestra;
                      } echo $codigoMuestra?></td>
                  <td rowspan="3"><?php
                     foreach($dqo->result() as $row){
                       $vMuestra = $row->vMuestra;
                      } echo $vMuestra?></td>                
                  <td><?php
                     foreach($dqo->result() as $row){
                       $factorDilucion1 = $row->factorDilucion1;
                      } echo $factorDilucion1?></td>
                  <td><?php
                     foreach($dqo->result() as $row){
                       $vFas21 = $row->vFas21;
                      } echo $vFas21?></td>
                  <td><?php
                     foreach($dqo->result() as $row){
                       $concentracion1 = $row->concentracion1;
                      } echo $concentracion1?></td>
                  <td rowspan="3"><?php
                     foreach($dqo->result() as $row){
                       $concentracionPromedio = $row->concentracionPromedio;
                      } echo $concentracionPromedio?></td>
                  <td rowspan="4"><?php
                     foreach($dqo->result() as $row){
                       $responsable = $row->responsable;
                      } echo $responsable?></td>
                </tr>
                 <tr>
                  <td><?php
                     foreach($dqo->result() as $row){
                       $factorDilucion2 = $row->factorDilucion2;
                      } echo $factorDilucion2?></td>                
                  <td><?php
                     foreach($dqo->result() as $row){
                       $vFas22 = $row->vFas22;
                      } echo $vFas22?></td>
                  <td><?php
                     foreach($dqo->result() as $row){
                       $concentracion2 = $row->concentracion2;
                      } echo $concentracion2?></td>
                </tr>
                 <tr>                
                  <td><?php
                     foreach($dqo->result() as $row){
                       $factorDilucion3 = $row->factorDilucion3;
                      } echo $factorDilucion3?></td>
                  <td><?php
                     foreach($dqo->result() as $row){
                       $vFas23 = $row->vFas23;
                      } echo $vFas23?></td>
                  <td><?php
                     foreach($dqo->result() as $row){
                       $concentracion3 = $row->concentracion3;
                      } echo $concentracion3?></td>
                </tr>
                <tr>
                  <td>Solución Carta de Control</td>                  
                  <td ><?php
                     foreach($dqo->result() as $row){
                       $vMuestraSolucionCartaControl = $row->vMuestraSolucionCartaControl;
                      } echo $vMuestraSolucionCartaControl?></td>
                  <td><?php
                     foreach($dqo->result() as $row){
                       $factorDilucionSolucionCartaControl = $row->factorDilucionSolucionCartaControl;
                      } echo $factorDilucionSolucionCartaControl?></td>
                  <td><?php
                     foreach($dqo->result() as $row){
                       $vFas2SolucionCartaControl = $row->vFas2SolucionCartaControl;
                      } echo $vFas2SolucionCartaControl?></td>
                  <td><?php
                     foreach($dqo->result() as $row){
                       $concentracionSolucionCartaControl = $row->concentracionSolucionCartaControl;
                      } echo $concentracionSolucionCartaControl?></td>
                  <td><?php
                     foreach($dqo->result() as $row){
                       $concentracionPromedioSolucionCartaControl = $row->concentracionPromedioSolucionCartaControl;
                      } echo $concentracionPromedioSolucionCartaControl?></td>
                </tr>
                
              </tbody>
            </table>

</div> 
<!-- Fin margen guía -->

</body>
</html>
