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
                     foreach($solidosSuspendidosTotales->result() as $row){
                       $fechaRecepcion = $row->fechaRecepcion;
                      } echo $fechaRecepcion?>
    &nbsp&nbsp&nbsp 
    Código Interno: <?php
                     foreach($solidosSuspendidosTotales->result() as $row){
                       $codigoInterno = $row->codigoInterno;
                      } echo $codigoInterno?>

  </b>
</div><br><br>

<div style="font-size:12.0pt;"> &nbsp&nbsp&nbsp <b>Sólidos Suspendidos Totales: </b></div>

  <table border="1">
              <thead>
                <tr style="background-color: #D9D9D9;">
                  <th><div style="width: 100px;">Fecha del Ensayo</div></th>
                  <th><div style="width: 100px;">Código de Muestra</div></th>
                  <th><div style="width: 100px;">V (mL) Muestra Filtrada</th>
                  <th><div style="width: 100px;">No. de crisol</th>
                  <th><div style="width: 100px;">Crisol vacío</th>
                  <th><div style="width: 100px;">Crisol + muestra (105ºC)</th>
                  <th><div style="width: 100px;">Concentración S.S.T (mg/L)</th>
                  <th><div style="width: 100px;">concentración Promedio S.S.T. (mg / L)</th>
                  <th><div style="width: 100px;">Responsable</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="3"> <?php
                     foreach($solidosSuspendidosTotales->result() as $row){
                       $fechaEnsayo = $row->fechaEnsayo;
                      } echo $fechaEnsayo?></td>
                  <td rowspan="2"><?php
                     foreach($solidosSuspendidosTotales->result() as $row){
                       $codigoMuestra = $row->codigoMuestra;
                      } echo $codigoMuestra?></td>
                  <td><?php
                     foreach($solidosSuspendidosTotales->result() as $row){
                       $VmuestraFiltrada1 = $row->VmuestraFiltrada1;
                      } echo $VmuestraFiltrada1?></td>                
                  <td><?php
                     foreach($solidosSuspendidosTotales->result() as $row){
                       $noCrisol1 = $row->noCrisol1;
                      } echo $noCrisol1?></td>
                  <td><?php
                     foreach($solidosSuspendidosTotales->result() as $row){
                       $crisolVacio1 = $row->crisolVacio1;
                      } echo $crisolVacio1?></td>
                  <td><?php
                     foreach($solidosSuspendidosTotales->result() as $row){
                       $crisolMuestra1 = $row->crisolMuestra1;
                      } echo $crisolMuestra1?></td>
                  <td><?php
                     foreach($solidosSuspendidosTotales->result() as $row){
                       $concentracionSst1 = $row->concentracionSst1;
                      } echo $concentracionSst1?></td>
                  <td rowspan="2"><?php
                     foreach($solidosSuspendidosTotales->result() as $row){
                       $concentracionPromedioSst = $row->concentracionPromedioSst;
                      } echo $concentracionPromedioSst?></td>
                  <td rowspan="3"><?php
                     foreach($solidosSuspendidosTotales->result() as $row){
                       $responsable = $row->responsable;
                      } echo $responsable?></td>
                </tr>
                <tr>
                  <td><?php
                     foreach($solidosSuspendidosTotales->result() as $row){
                       $VmuestraFiltrada2 = $row->VmuestraFiltrada2;
                      } echo $VmuestraFiltrada2?></td>                  
                  <td><?php
                     foreach($solidosSuspendidosTotales->result() as $row){
                       $noCrisol2 = $row->noCrisol2;
                      } echo $noCrisol2?></td>
                  <td><?php
                     foreach($solidosSuspendidosTotales->result() as $row){
                       $crisolVacio2 = $row->crisolVacio2;
                      } echo $crisolVacio2?></td>
                  <td><?php
                     foreach($solidosSuspendidosTotales->result() as $row){
                       $crisolMuestra2 = $row->crisolMuestra2;
                      } echo $crisolMuestra2?></td>
                  <td ><?php
                     foreach($solidosSuspendidosTotales->result() as $row){
                       $concentracionSst2 = $row->concentracionSst2;
                      } echo $concentracionSst2?></td>
                </tr>
                <tr>
                  <td >Solución Carta Control</td>
                  <td><?php
                     foreach($solidosSuspendidosTotales->result() as $row){
                       $VmuestraFiltradaSolucionCartaControl = $row->VmuestraFiltradaSolucionCartaControl;
                      } echo $VmuestraFiltradaSolucionCartaControl?></td>                  
                  <td><?php
                     foreach($solidosSuspendidosTotales->result() as $row){
                       $noCrisolSolucionCartaControl = $row->noCrisolSolucionCartaControl;
                      } echo $noCrisolSolucionCartaControl?></td>
                  <td><?php
                     foreach($solidosSuspendidosTotales->result() as $row){
                       $crisolVacioSolucionCartaControl = $row->crisolVacioSolucionCartaControl;
                      } echo $crisolVacioSolucionCartaControl?></td>
                  <td><?php
                     foreach($solidosSuspendidosTotales->result() as $row){
                       $crisolMuestraSolucionCartaControl = $row->crisolMuestraSolucionCartaControl;
                      } echo $crisolMuestraSolucionCartaControl?></td>
                  <td><?php
                     foreach($solidosSuspendidosTotales->result() as $row){
                       $concentracionSstSolucionCartaControl = $row->concentracionSstSolucionCartaControl;
                      } echo $concentracionSstSolucionCartaControl?></td>
                  <td><?php
                     foreach($solidosSuspendidosTotales->result() as $row){
                       $concentracionPromedioSstSolucionCartaControl = $row->concentracionPromedioSstSolucionCartaControl;
                      } echo $concentracionPromedioSstSolucionCartaControl?></td>
                </tr>
                
              </tbody>
            </table>

</div> 
<!-- Fin margen guía -->

</body>
</html>
