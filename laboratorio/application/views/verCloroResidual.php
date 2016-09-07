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
                     foreach($cloroResidual->result() as $row){
                       $fechaRecepcion = $row->fechaRecepcion;
                      } echo $fechaRecepcion?>
    &nbsp&nbsp&nbsp 
    Código Interno: <?php
                     foreach($cloroResidual->result() as $row){
                       $codigoInterno = $row->codigoInterno;
                      } echo $codigoInterno?>

  </b>
</div><br><br>

<div style="font-size:12.0pt;"> &nbsp&nbsp&nbsp <b>Cloro Residual: </b></div>

     <table border="1">
              <thead>
                <tr style="background-color: #D9D9D9;">
                  <th><div style="width: 95px;">Fecha del Ensayo</div></th>
                  <th><div style="width: 95px;">Código de Muestra</div></th>
                  <th><div style="width: 95px;">V (mL) Muestra</th>
                  <th><div style="width: 95px;">V(mL). FAS</th>
                  <th><div style="width: 95px;">N (eq/L) FAS</th>
                  <th><div style="width: 95px;">Resultado (mg Cl<sub>2</sub>/L)</th>
                  <th><div style="width: 95px;">Promedio (mg Cl<sub>2</sub>/L)</th>
                  <th><div style="width: 95px;">Responsables</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="3"> <?php
                     foreach($cloroResidual->result() as $row){
                       $fechaEnsayo = $row->fechaEnsayo;
                      } echo $fechaEnsayo?></td>
                  <td><?php
                     foreach($cloroResidual->result() as $row){
                       $codigoMuestra1 = $row->codigoMuestra1;
                      } echo $codigoMuestra1?></td>
                  <td><?php
                     foreach($cloroResidual->result() as $row){
                       $vMuestra1 = $row->vMuestra1;
                      } echo $vMuestra1?></td>                
                  <td><?php
                     foreach($cloroResidual->result() as $row){
                       $vFas1 = $row->vFas1;
                      } echo $vFas1?></td>
                  <td><?php
                     foreach($cloroResidual->result() as $row){
                       $nFas1 = $row->nFas1;
                      } echo $nFas1?></td>
                  <td><?php
                     foreach($cloroResidual->result() as $row){
                       $resultado1 = $row->resultado1;
                      } echo $resultado1?></td>
                  <td rowspan="2"><?php
                     foreach($cloroResidual->result() as $row){
                       $promedio = $row->promedio;
                      } echo $promedio?></td>
                  <td ><?php
                     foreach($cloroResidual->result() as $row){
                       $responsable1 = $row->responsable1;
                      } echo $responsable1?></td>
                </tr>
                <tr>
                  <td><?php
                     foreach($cloroResidual->result() as $row){
                       $codigoMuestra2 = $row->codigoMuestra2;
                      } echo $codigoMuestra2?></td>
                  <td><?php
                     foreach($cloroResidual->result() as $row){
                       $vMuestra2 = $row->vMuestra2;
                      } echo $vMuestra2?></td>                  
                  <td><?php
                     foreach($cloroResidual->result() as $row){
                       $vFas2 = $row->vFas2;
                      } echo $vFas2?></td>
                  <td><?php
                     foreach($cloroResidual->result() as $row){
                       $nFas2 = $row->nFas2;
                      } echo $nFas2?></td>
                  <td><?php
                     foreach($cloroResidual->result() as $row){
                       $resultado2 = $row->resultado2;
                      } echo $resultado2?></td>
                  <td rowspan="2"><?php
                     foreach($cloroResidual->result() as $row){
                       $responsable2 = $row->responsable2;
                      } echo $responsable2?></td>
                </tr>
                <tr>
                  <td >Solución Carta de Control</td>
                  <td><?php
                     foreach($cloroResidual->result() as $row){
                       $vMuestraSolucionCartaControl = $row->vMuestraSolucionCartaControl;
                      } echo $vMuestraSolucionCartaControl?></td>                  
                  <td><?php
                     foreach($cloroResidual->result() as $row){
                       $vFasSolucionCartaControl = $row->vFasSolucionCartaControl;
                      } echo $vFasSolucionCartaControl?></td>
                  <td><?php
                     foreach($cloroResidual->result() as $row){
                       $nFasSolucionCartaControl = $row->nFasSolucionCartaControl;
                      } echo $nFasSolucionCartaControl?></td>
                  <td><?php
                     foreach($cloroResidual->result() as $row){
                       $resultadoSolucionCartaControl = $row->resultadoSolucionCartaControl;
                      } echo $resultadoSolucionCartaControl?></td>
                  <td><?php
                     foreach($cloroResidual->result() as $row){
                       $promedioSolucionCartaControl = $row->promedioSolucionCartaControl;
                      } echo $promedioSolucionCartaControl?></td>
                </tr>
                
              </tbody>
            </table>

</div> 
<!-- Fin margen guía -->

</body>
</html>
