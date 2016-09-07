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
                     foreach($extractoSecoTotal->result() as $row){
                       $fechaRecepcion = $row->fechaRecepcion;
                      } echo $fechaRecepcion?>
    &nbsp&nbsp&nbsp 
    Código Interno: <?php
                     foreach($extractoSecoTotal->result() as $row){
                       $codigoInterno = $row->codigoInterno;
                      } echo $codigoInterno?>

  </b>
</div><br><br>

<div style="font-size:12.0pt;"> &nbsp&nbsp&nbsp <b>Extracto Seco Total: </b></div>

      <table border="1" >
              <thead>
                <tr style="background-color: #D9D9D9;">
                  <th><div style="width: 90;">Fecha del Ensayo</div></th>
                  <th><div style="width: 90;">Código de Muestra</div></th>
                  <th><div style="width: 90;">No. de cápsula</th>
                  <th><div style="width: 90;">M cápsula vacía (g)</th>
                  <th><div style="width: 90;">Cantidad muestra (g)</th>
                  <th><div style="width: 90;">M después del secado 1 (g)</th>
                  <th><div style="width: 90;">M después del secado 2 (g)</th>
                  <th><div style="width: 90;">Extracto Seco Total (g/100g)</th>
                  <th><div style="width: 90;">Promedio E.S.T  (g/100g)</th>
                  <th><div style="width: 90;">Responsable</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="2"> <?php
                     foreach($extractoSecoTotal->result() as $row){
                       $fechaEnsayo = $row->fechaEnsayo;
                      } echo $fechaEnsayo?></td>
                  <td rowspan="2"><?php
                     foreach($extractoSecoTotal->result() as $row){
                       $codigoMuestra = $row->codigoMuestra;
                      } echo $codigoMuestra?></td>
                  <td><?php
                     foreach($extractoSecoTotal->result() as $row){
                       $NoCapsula1 = $row->NoCapsula1;
                      } echo $NoCapsula1?></td>                
                  <td><?php
                     foreach($extractoSecoTotal->result() as $row){
                       $McapsulaVacia1 = $row->McapsulaVacia1;
                      } echo $McapsulaVacia1?></td>
                  <td><?php
                     foreach($extractoSecoTotal->result() as $row){
                       $cantidadMuestra1 = $row->cantidadMuestra1;
                      } echo $cantidadMuestra1?></td>
                  <td><?php
                     foreach($extractoSecoTotal->result() as $row){
                       $mDespuesSecado11 = $row->mDespuesSecado11;
                      } echo $mDespuesSecado11?></td>
                  <td><?php
                     foreach($extractoSecoTotal->result() as $row){
                       $mdespuesSecado21 = $row->mdespuesSecado21;
                      } echo $mdespuesSecado21?></td>
                  <td><?php
                     foreach($extractoSecoTotal->result() as $row){
                       $extractoSecoTotal1 = $row->extractoSecoTotal1;
                      } echo $extractoSecoTotal1?></td>
                  <td rowspan="2"><?php
                     foreach($extractoSecoTotal->result() as $row){
                       $promedioEst = $row->promedioEst;
                      } echo $promedioEst?></td>
                  <td rowspan="2"><?php
                     foreach($extractoSecoTotal->result() as $row){
                       $responsable = $row->responsable;
                      } echo $responsable?></td>
                </tr>
                <tr>
                  <td><?php
                     foreach($extractoSecoTotal->result() as $row){
                       $NoCapsula2 = $row->NoCapsula2;
                      } echo $NoCapsula2?></td>                  
                  <td ><?php
                     foreach($extractoSecoTotal->result() as $row){
                       $McapsulaVacia2 = $row->McapsulaVacia2;
                      } echo $McapsulaVacia2?></td>
                  <td><?php
                     foreach($extractoSecoTotal->result() as $row){
                       $cantidadMuestra2 = $row->cantidadMuestra2;
                      } echo $cantidadMuestra2?></td>
                  <td><?php
                     foreach($extractoSecoTotal->result() as $row){
                       $mDespuesSecado12 = $row->mDespuesSecado12;
                      } echo $mDespuesSecado12?></td>
                  <td><?php
                     foreach($extractoSecoTotal->result() as $row){
                       $mdespuesSecado22 = $row->mdespuesSecado22;
                      } echo $mdespuesSecado22?></td>
                  <td><?php
                     foreach($extractoSecoTotal->result() as $row){
                       $extractoSecoTotal2 = $row->extractoSecoTotal2;
                      } echo $extractoSecoTotal2?></td>
                </tr>
                
              </tbody>
            </table>
</div> 
<!-- Fin margen guía -->

</body>
</html>
