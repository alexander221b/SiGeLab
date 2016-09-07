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
                     foreach($basicidad->result() as $row){
                       $fechaRecepcion = $row->fechaRecepcion;
                      } echo $fechaRecepcion?>
    &nbsp&nbsp&nbsp 
    Código Interno: <?php
                     foreach($basicidad->result() as $row){
                       $codigoInterno = $row->codigoInterno;
                      } echo $codigoInterno?>

  </b>
</div><br><br>

<div style="font-size:12.0pt;"> &nbsp&nbsp&nbsp <b>Basicidad: </b></div>

  <table border="1">
              <thead>
                <tr style="background-color: #D9D9D9;">
                  <th><div style="width: 91px;">Fecha del Ensayo</div></th>
                  <th><div style="width: 91px;">Código de Muestra</div></th>
                  <th><div style="width: 91px;">g o mL de muestra</div></th>
                  <th><div style="width: 91px;">V (mL)  Final</div></th>
                  <th><div style="width: 91px;">N (Eq/L) NaOH</div></th>
                  <th><div style="width: 91px;">V (mL) NaOH</div></th>
                  <th><div style="width: 91px;">Resultado (g ácido predominante/ 100 g)</div></th>
                  <th><div style="width: 91px;">Promedio (g ácido predominante/ 100 g)</div></th>
                  <th><div style="width: 91px;">Responsable</div></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="2"> <?php
                     foreach($basicidad->result() as $row){
                       $fechaEnsayo = $row->fechaEnsayo;
                      } echo $fechaEnsayo?></td>
                  <td rowspan="2"><?php
                     foreach($basicidad->result() as $row){
                       $codigoMuestra = $row->codigoMuestra;
                      } echo $codigoMuestra?></td>
                  <td><?php
                     foreach($basicidad->result() as $row){
                       $gMlMuestra1 = $row->gMlMuestra1;
                      } echo $gMlMuestra1?></td>                
                  <td><?php
                     foreach($basicidad->result() as $row){
                       $vFinal1 = $row->vFinal1;
                      } echo $vFinal1?></td>
                  <td><?php
                     foreach($basicidad->result() as $row){
                       $nNaOH1 = $row->nNaOH1;
                      } echo $nNaOH1?></td>
                  <td><?php
                     foreach($basicidad->result() as $row){
                       $vNaOH1 = $row->vNaOH1;
                      } echo $vNaOH1?></td>
                  <td><?php
                     foreach($basicidad->result() as $row){
                       $resultado1 = $row->resultado1;
                      } echo $resultado1?></td>
                  <td rowspan="2"><?php
                     foreach($basicidad->result() as $row){
                       $promedio = $row->promedio;
                      } echo $promedio?></td>
                  <td rowspan="2"><?php
                     foreach($basicidad->result() as $row){
                       $responsable = $row->responsable;
                      } echo $responsable?></td>
                </tr>
                <tr>
                  <td><?php
                     foreach($basicidad->result() as $row){
                       $gMlMuestra2 = $row->gMlMuestra2;
                      } echo $gMlMuestra2?></td>                  
                  <td ><?php
                     foreach($basicidad->result() as $row){
                       $vFinal2 = $row->vFinal2;
                      } echo $vFinal2?></td>
                  <td><?php
                     foreach($basicidad->result() as $row){
                       $nNaOH2 = $row->nNaOH2;
                      } echo $nNaOH2?></td>
                  <td><?php
                     foreach($basicidad->result() as $row){
                       $vNaOH2 = $row->vNaOH2;
                      } echo $vNaOH2?></td>
                  <td><?php
                     foreach($basicidad->result() as $row){
                       $resultado2 = $row->resultado2;
                      } echo $resultado2?></td>
                </tr>
              </tbody>
            </table>

</div> 
<!-- Fin margen guía -->

</body>
</html>
