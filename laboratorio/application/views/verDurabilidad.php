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
                     foreach($durabilidad->result() as $row){
                       $fechaRecepcion = $row->fechaRecepcion;
                      } echo $fechaRecepcion?>
    &nbsp&nbsp&nbsp 
    Código Interno: <?php
                     foreach($durabilidad->result() as $row){
                       $codigoInterno = $row->codigoInterno;
                      } echo $codigoInterno?>

  </b>
</div><br><br>

<div style="font-size:12.0pt;"> &nbsp&nbsp&nbsp <b>Durabilidad: </b></div>

     <table border="1">
              <thead>
                <tr style="background-color: #D9D9D9;">
                  <th><div style="width: 91px;">Fecha del Ensayo</div></th>
                  <th><div style="width: 91px;">Código de Muestra</div></th>
                  <th><div style="width: 91px;">(g) Muestra</th>
                  <th><div style="width: 91px;">Volumen  de H<sub>2</sub>SO<sub>4</sub> ml</th>
                  <th><div style="width: 91px;">N (eq/L) (H<sub>2</sub>SO<sub>4</sub>)</th>
                  <th><div style="width: 91px;">Volumen NaOH (0,02 N)  Consumidos</th>
                  <th><div style="width: 91px;">Resultado (ml de H<sub>2</sub>SO<sub>4</sub>))</th>
                  <th><div style="width: 91px;">Promedio (ml de H<sub>2</sub>SO<sub>4</sub>)</th>
                  <th><div style="width: 91px;">Responsable</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="3"> <?php
                     foreach($durabilidad->result() as $row){
                       $fechaEnsayo = $row->fechaEnsayo;
                      } echo $fechaEnsayo?></td>
                  <td rowspan="2"><?php
                     foreach($durabilidad->result() as $row){
                       $codigoMuestra = $row->codigoMuestra;
                      } echo $codigoMuestra?></td>
                  <td><?php
                     foreach($durabilidad->result() as $row){
                       $gMuestra1 = $row->gMuestra1;
                      } echo $gMuestra1?></td>                
                  <td><?php
                     foreach($durabilidad->result() as $row){
                       $volumenH2SO41 = $row->volumenH2SO41;
                      } echo $volumenH2SO41?></td>
                  <td><?php
                     foreach($durabilidad->result() as $row){
                       $nH2SO41 = $row->nH2SO41;
                      } echo $nH2SO41?></td>
                  <td><?php
                     foreach($durabilidad->result() as $row){
                       $volumenNaOH1 = $row->volumenNaOH1;
                      } echo $volumenNaOH1?></td>
                  <td><?php
                     foreach($durabilidad->result() as $row){
                       $resutadoH2SO41 = $row->resutadoH2SO41;
                      } echo $resutadoH2SO41?></td>
                  <td rowspan="2"><?php
                     foreach($durabilidad->result() as $row){
                       $promedioH2SO4 = $row->promedioH2SO4;
                      } echo $promedioH2SO4?></td>
                  <td rowspan="3"><?php
                     foreach($durabilidad->result() as $row){
                       $responsable = $row->responsable;
                      } echo $responsable?></td>
                </tr>
                <tr>
                  <td><?php
                     foreach($durabilidad->result() as $row){
                       $gMuestra2 = $row->gMuestra2;
                      } echo $gMuestra2?></td>                  
                  <td><?php
                     foreach($durabilidad->result() as $row){
                       $volumenH2SO42 = $row->volumenH2SO42;
                      } echo $volumenH2SO42?></td>
                  <td><?php
                     foreach($durabilidad->result() as $row){
                       $nH2SO42 = $row->nH2SO42;
                      } echo $nH2SO42?></td>
                  <td><?php
                     foreach($durabilidad->result() as $row){
                       $volumenNaOH2 = $row->volumenNaOH2;
                      } echo $volumenNaOH2?></td>
                  <td ><?php
                     foreach($durabilidad->result() as $row){
                       $resutadoH2SO42 = $row->resutadoH2SO42;
                      } echo $resutadoH2SO42?></td>
                </tr>
                <tr>
                  <td >Blanco</td>
                  <td><?php
                     foreach($durabilidad->result() as $row){
                       $gMuestraBlanco = $row->gMuestraBlanco;
                      } echo $gMuestraBlanco?></td>                  
                  <td><?php
                     foreach($durabilidad->result() as $row){
                       $volumenH2SO4Blanco = $row->volumenH2SO4Blanco;
                      } echo $volumenH2SO4Blanco?></td>
                  <td><?php
                     foreach($durabilidad->result() as $row){
                       $nH2SO4Blanco = $row->nH2SO4Blanco;
                      } echo $nH2SO4Blanco?></td>
                  <td><?php
                     foreach($durabilidad->result() as $row){
                       $volumenNaOHBlanco = $row->volumenNaOHBlanco;
                      } echo $volumenNaOHBlanco?></td>
                  <td><?php
                     foreach($durabilidad->result() as $row){
                       $resutadoH2SO4Blanco = $row->resutadoH2SO4Blanco;
                      } echo $resutadoH2SO4Blanco?></td>
                  <td><?php
                     foreach($durabilidad->result() as $row){
                       $promedioH2SO4Blanco = $row->promedioH2SO4Blanco;
                      } echo $promedioH2SO4Blanco?></td>
                </tr>

              </tbody>
            </table>

</div> 
<!-- Fin margen guía -->

</body>
</html>
