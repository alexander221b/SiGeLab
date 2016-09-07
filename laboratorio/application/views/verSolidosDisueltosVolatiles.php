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
                     foreach($solidosDisueltosVolatiles->result() as $row){
                       $fechaRecepcion = $row->fechaRecepcion;
                      } echo $fechaRecepcion?>
    &nbsp&nbsp&nbsp 
    Código Interno: <?php
                     foreach($solidosDisueltosVolatiles->result() as $row){
                       $codigoInterno = $row->codigoInterno;
                      } echo $codigoInterno?>

  </b>
</div><br><br>

<div style="font-size:12.0pt;"> &nbsp&nbsp&nbsp <b>Sólidos Disueltos Volátiles: </b></div>

  <table border="1">
              <thead>
                <tr style="background-color: #D9D9D9;">
                  <th><div style="width: 90px;">Fecha del Ensayo</div></th>
                  <th><div style="width: 90px;">Código de Muestra</div></th>
                  <th><div style="width: 90px;">V (ml)  alícuota de muestra filtrada</th>
                  <th><div style="width: 90px;">No. de Cápsula</th>
                  <th><div style="width: 90px;">Cápsula vacía</th>
                  <th><div style="width: 90px;">Crisol + muestra (105ºC)</th>
                  <th><div style="width: 90px;">Cápsula + muestra (550ºC)</th>
                  <th><div style="width: 90px;">Concentración S.D.V (mg/L)</th>
                  <th><div style="width: 90px;">Concentración Promedio S.D.V (mg/L)</th>
                  <th><div style="width: 90px;">Responsable</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="2"><?php
                     foreach($solidosDisueltosVolatiles->result() as $row){
                       $fechaEnsayo = $row->fechaEnsayo;
                      } echo $fechaEnsayo?></td>
                  <td rowspan="2"><?php
                     foreach($solidosDisueltosVolatiles->result() as $row){
                       $codigoMuestra = $row->codigoMuestra;
                      } echo $codigoMuestra?></td>
                  <td><?php
                     foreach($solidosDisueltosVolatiles->result() as $row){
                       $vAlicuotaMuestraFiltrada1 = $row->vAlicuotaMuestraFiltrada1;
                      } echo $vAlicuotaMuestraFiltrada1?></td>                
                  <td><?php
                     foreach($solidosDisueltosVolatiles->result() as $row){
                       $noCapsula1 = $row->noCapsula1;
                      } echo $noCapsula1?></td>
                  <td><?php
                     foreach($solidosDisueltosVolatiles->result() as $row){
                       $capsulaVacia1 = $row->capsulaVacia1;
                      } echo $capsulaVacia1?></td>
                  <td><?php
                     foreach($solidosDisueltosVolatiles->result() as $row){
                       $crisolMuestra1 = $row->crisolMuestra1;
                      } echo $crisolMuestra1?></td>
                  <td><?php
                     foreach($solidosDisueltosVolatiles->result() as $row){
                       $capsulaMuestra1 = $row->capsulaMuestra1;
                      } echo $capsulaMuestra1?></td>
                  <td><?php
                     foreach($solidosDisueltosVolatiles->result() as $row){
                       $concentracionSdv1 = $row->concentracionSdv1;
                      } echo $concentracionSdv1?></td>
                  <td rowspan="2"><?php
                     foreach($solidosDisueltosVolatiles->result() as $row){
                       $concentracionPromedioSdv = $row->concentracionPromedioSdv;
                      } echo $concentracionPromedioSdv?></td>
                  <td rowspan="2"><?php
                     foreach($solidosDisueltosVolatiles->result() as $row){
                       $responsable = $row->responsable;
                      } echo $responsable?></td>
                </tr>
                <tr>
                  <td><?php
                     foreach($solidosDisueltosVolatiles->result() as $row){
                       $vAlicuotaMuestraFiltrada2 = $row->vAlicuotaMuestraFiltrada2;
                      } echo $vAlicuotaMuestraFiltrada2?></td>                  
                  <td ><?php
                     foreach($solidosDisueltosVolatiles->result() as $row){
                       $noCapsula2 = $row->noCapsula2;
                      } echo $noCapsula2?></td>
                  <td><?php
                     foreach($solidosDisueltosVolatiles->result() as $row){
                       $capsulaVacia2 = $row->capsulaVacia2;
                      } echo $capsulaVacia2?></td>
                  <td><?php
                     foreach($solidosDisueltosVolatiles->result() as $row){
                       $crisolMuestra2 = $row->crisolMuestra2;
                      } echo $crisolMuestra2?></td>
                  <td><?php
                     foreach($solidosDisueltosVolatiles->result() as $row){
                       $capsulaMuestra2 = $row->capsulaMuestra2;
                      } echo $capsulaMuestra2?></td>
                  <td><?php
                     foreach($solidosDisueltosVolatiles->result() as $row){
                       $concentracionSdv2 = $row->concentracionSdv2;
                      } echo $concentracionSdv2?></td>
                </tr>
                
              </tbody>
            </table>

</div> 
<!-- Fin margen guía -->

</body>
</html>
