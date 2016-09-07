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
                     foreach($nitratos->result() as $row){
                       $fechaRecepcion = $row->fechaRecepcion;
                      } echo $fechaRecepcion?>
    &nbsp&nbsp&nbsp 
    Código Interno: <?php
                     foreach($nitratos->result() as $row){
                       $codigoInterno = $row->codigoInterno;
                      } echo $codigoInterno?>

  </b>
</div><br><br>

<div style="font-size:12.0pt;"> &nbsp&nbsp&nbsp <b>Nitratos: </b></div>

  <table border="1" >
              <thead>
                <tr style="background-color: #D9D9D9; width: 720px; text-align: center; font-size:10.0pt">
                  <th><div style="width: 100px;">Fecha del Ensayo</div></th>
                  <th><div style="width: 100px;">Código de Muestra</div></th>
                  <th><div style="width: 100px;">V (mL) Muestra</th>
                  <th><div style="width: 100px;">Abs 220 nm</th>
                  <th><div style="width: 100px;">Abs 275 nm</th>
                  <th><div style="width: 100px;">Concentración (mg NO<sub>3</sub>- / L)</th>
                  <th><div style="width: 100px;">Concentración Promedio (mg NO<sub>3</sub>- / L)</th>
                  <th><div style="width: 100px;">Responsable</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="3"> <?php
                     foreach($nitratos->result() as $row){
                       $fechaEnsayo = $row->fechaEnsayo;
                      } echo $fechaEnsayo; ?>
                  <td rowspan="2"> <?php
                     foreach($nitratos->result() as $row){
                       $codigoMuestra = $row->codigoMuestra;
                      } echo $codigoMuestra;?>
                  </td>
                  <td> <?php
                     foreach($nitratos->result() as $row){
                       $vMuestra1 = $row->vMuestra1;
                      } echo $vMuestra1; ?></td>                
                  <td> <?php
                     foreach($nitratos->result() as $row){
                       $abs2201 = $row->abs2201;
                      } echo $abs2201; ?></td>
                  <td> <?php
                     foreach($nitratos->result() as $row){
                       $abs2751 = $row->abs2751;
                      } echo $abs2751; ?></td>
                  <td> <?php
                     foreach($nitratos->result() as $row){
                       $concentracion1 = $row->concentracion1;
                      } echo $concentracion1; ?></td>
                  <td rowspan="2"><?php
                     foreach($nitratos->result() as $row){
                       $concentracionPromedio = $row->concentracionPromedio;
                      } echo $concentracionPromedio;?></td>
                  <td rowspan="3"><?php
                     foreach($nitratos->result() as $row){
                       $responsable = $row->responsable;
                      } echo $responsable;?></td>
                </tr>
                <tr>
                  <td> <?php
                     foreach($nitratos->result() as $row){
                       $vMuestra2 = $row->vMuestra2;
                      } echo $vMuestra2;?></td>                  
                  <td> <?php
                     foreach($nitratos->result() as $row){
                       $abs2202 = $row->abs2202;
                      } echo $abs2202;?></td>
                  <td> <?php
                     foreach($nitratos->result() as $row){
                       $abs2752 = $row->abs2752;
                      } echo $abs2752;?></td>
                  <td> <?php
                     foreach($nitratos->result() as $row){
                       $concentracion2 = $row->concentracion2;
                      } echo $concentracion2;?></td>
                </tr>
                <tr>
                  <td >Solución Carta de Control</td>
                  <td> <?php
                     foreach($nitratos->result() as $row){
                       $vMuestraSolucionCartaControl = $row->vMuestraSolucionCartaControl;
                      } echo $vMuestraSolucionCartaControl;?></td>                  
                  <td> <?php
                     foreach($nitratos->result() as $row){
                       $abs220SolucionCartaControl = $row->abs220SolucionCartaControl;
                      } echo $abs220SolucionCartaControl;?></td>
                  <td> <?php
                     foreach($nitratos->result() as $row){
                       $abs275SolucionCartaControl = $row->abs275SolucionCartaControl;
                      } echo $abs275SolucionCartaControl;?></td>
                  <td> <?php
                     foreach($nitratos->result() as $row){
                       $concentracionSolucionCartaControl = $row->concentracionSolucionCartaControl;
                      } echo $concentracionSolucionCartaControl;?></td>
                  <td> <?php
                     foreach($nitratos->result() as $row){
                       $concentracionPromedioSolucionCartaControl = $row->concentracionPromedioSolucionCartaControl;
                      } echo $concentracionPromedioSolucionCartaControl;?></td>
                </tr>
              </tbody>
            </table>

</div> 
<!-- Fin margen guía -->

</body>
</html>
