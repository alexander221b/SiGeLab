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
                     foreach($cloruros->result() as $row){
                       $fechaRecepcion = $row->fechaRecepcion;
                      } echo $fechaRecepcion?>
    &nbsp&nbsp&nbsp 
    Código Interno: <?php
                     foreach($cloruros->result() as $row){
                       $codigoInterno = $row->codigoInterno;
                      } echo $codigoInterno?>

  </b>
</div><br><br>

<div style="font-size:12.0pt;"> &nbsp&nbsp&nbsp <b>Cloruros: </b></div>

     <table border="1">
              <thead>
                <tr style="background-color: #D9D9D9;">
                  <th><div style="width: 90px;" >Fecha del Ensayo</div></th>
                  <th><div style="width: 90px;">Código de Muestra</div></th>
                  <th><div style="width: 90px;">V (mL) muestra</th>
                  <th><div style="width: 90px;">V (mL) final</th>
                  <th><div style="width: 90px;">N(eq/L) AgNO<sub>3</sub></th>
                  <th><div style="width: 90px;">V (mL) AgNO<sub>3</sub></th>
                  <th><div style="width: 90px;">Concentración (mg Cl-/L)</th>
                  <th><div style="width: 90px;">Concentración Promedio (mg Cl-/L)</th>
                  <th><div style="width: 90px;">Responsable</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $fechaEnsayo = $row->fechaEnsayo;
                      } echo $fechaEnsayo?></td>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $codigoMuestra = $row->codigoMuestra;
                      } echo $codigoMuestra?></td> 
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $vMuestraBlanco = $row->vMuestraBlanco;
                      } echo $vMuestraBlanco?></td>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $vFinalBlanco = $row->vFinalBlanco;
                      } echo $vFinalBlanco?></td>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $nAgno3Blanco = $row->nAgno3Blanco;
                      } echo $nAgno3Blanco?></td>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $vAgno3Blanco = $row->vAgno3Blanco;
                      } echo $vAgno3Blanco?></td>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $concentracionBlanco = $row->concentracionBlanco;
                      } echo $concentracionBlanco?></td>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $concentracionPromedioBlanco = $row->concentracionPromedioBlanco;
                      } echo $concentracionPromedioBlanco?></td>                  
                  <td rowspan="4"><?php
                     foreach($cloruros->result() as $row){
                       $responsable = $row->responsable;
                      } echo $responsable?></td>
                </tr>
                <tr>
                  <td rowspan="3"> </td>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $codigoMuestra1 = $row->codigoMuestra1;
                      } echo $codigoMuestra1?></td>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $vMuestra1 = $row->vMuestra1;
                      } echo $vMuestra1?></td>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $vFinal1 = $row->vFinal1;
                      } echo $vFinal1?></td>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $nAgno31 = $row->nAgno31;
                      } echo $nAgno31?></td>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $vAgno31 = $row->vAgno31;
                      } echo $vAgno31?></td>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $concentracion1 = $row->concentracion1;
                      } echo $concentracion1?></td>                  
                  <td rowspan="2"><?php
                     foreach($cloruros->result() as $row){
                       $concentracionPromedio = $row->concentracionPromedio;
                      } echo $concentracionPromedio?></td>
                </tr>
                <tr>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $codigoMuestra2 = $row->codigoMuestra2;
                      } echo $codigoMuestra2?></td>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $vMuestra2 = $row->vMuestra2;
                      } echo $vMuestra2?></td>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $vFinal2 = $row->vFinal2;
                      } echo $vFinal2?></td>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $nAgno32 = $row->nAgno32;
                      } echo $nAgno32?></td>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $vAgno32 = $row->vAgno32;
                      } echo $vAgno32?></td>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $concentracion2 = $row->concentracion2;
                      } echo $concentracion2?></td>
                </tr>
                <tr>
                  <td >Solución Carta de Control</td>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $vMuestraSolucionCartaControl = $row->vMuestraSolucionCartaControl;
                      } echo $vMuestraSolucionCartaControl?></td>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $vFinalSolucionCartaControl = $row->vFinalSolucionCartaControl;
                      } echo $vFinalSolucionCartaControl?></td>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $nAgno3SolucionCartaControl = $row->nAgno3SolucionCartaControl;
                      } echo $nAgno3SolucionCartaControl?></td>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $vAgno3SolucionCartaControl = $row->vAgno3SolucionCartaControl;
                      } echo $vAgno3SolucionCartaControl?></td>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $concentracionSolucionCartaControl = $row->concentracionSolucionCartaControl;
                      } echo $concentracionSolucionCartaControl?></td>
                  <td><?php
                     foreach($cloruros->result() as $row){
                       $concentracionPromedioSolucionCartaControl = $row->concentracionPromedioSolucionCartaControl;
                      } echo $concentracionPromedioSolucionCartaControl?></td>                  
                </tr>
        
              </tbody>
            </table>

</div> 
<!-- Fin margen guía -->

</body>
</html>
