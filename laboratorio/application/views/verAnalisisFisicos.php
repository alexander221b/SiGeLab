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
  border: black 1px solid; 
  margin-left: 0px; 
  margin-right: 0px; 
  width: 900px; 
}
</style>

<!-- Margen guía 
<div class="margenGuia"> 

  <div>
  <table border="1" style="width: 310px; color:black ">
    <tr>
      <th style="border:solid black 1.5pt; padding-top: 0px; padding-bottom: 0px; font-size:10.0pt"><strong> &nbsp Laboratorio:</strong></th>
      <th style="border:solid black 1.5pt; padding-top: 0px; padding-bottom: 0px; font-size:10.0pt"><strong>&nbsp Análisis de Aguas y Alimentos</strong>  </th>
    </tr>
  </table>
</div><br><br><br>
-->
<div style="font-size:11.0pt; text-align:center">
  <b>
    Fecha de Recepción:  <?php
                     foreach($analisisFisicos->result() as $row){
                       $fechaRecepcion = $row->fechaRecepcion;
                      } echo $fechaRecepcion?>
    &nbsp&nbsp&nbsp 
    Código Interno: <?php
                     foreach($analisisFisicos->result() as $row){
                       $codigoInterno = $row->codigoInterno;
                      } echo $codigoInterno?>

  </b>
</div><br><br>

<div style="font-size:12.0pt;"> &nbsp&nbsp&nbsp <b>Análisis Físicos: </b></div>

  <table border="1">
              <thead>
                <tr style="background-color: #D9D9D9;">
                  <th><div style="width: 89px;" >Fecha del Ensayo</div></th>
                  <th><div style="width: 89px;">Código de Muestra</div></th>
                  <th><div style="width: 89px;">pH (Unidades)</th>
                  <th><div style="width: 89px;">Temperatura (C°)</th>
                  <th><div style="width: 89px;">Color Aparente (UPC)</th>
                  <th><div style="width: 89px;">Color Verdadero (UPC)</th>
                  <th><div style="width: 89px;">Turbiedad (NTU)</th>
                  <th><div style="width: 89px;">Sustancias Flotantes (UPC)</th>
                  <th><div style="width: 89px;">Olor</th>
                  <th><div style="width: 89px;">Oxígeno Disuelto(mg O<sub>2</sub>/L)</th>
                  <th><div style="width: 89px;">Conductividad (&#181;s/cm)</th>
                  <th><div style="width: 89px;">Temperatura (°C)</th>
                  <th><div style="width: 89px;">Fluoruros (mg F<sup>-</sup>/L)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $fechaEnsayo = $row->fechaEnsayo;
                      } echo $fechaEnsayo?></td>
                  <td  rowspan="2"><?php
                     foreach($analisisFisicos->result() as $row){
                       $codigoMuestra = $row->codigoMuestra;
                      } echo $codigoMuestra?></td> 
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $ph1 = $row->ph1;
                      } echo $ph1?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $temperatura1 = $row->temperatura1;
                      } echo $temperatura1?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $colorAparente1 = $row->colorAparente1;
                      } echo $colorAparente1?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $colorVerdadero1 = $row->colorVerdadero1;
                      } echo $colorVerdadero1?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $turbiedad1 = $row->turbiedad1;
                      } echo $turbiedad1?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $sustanciasFlotantes1 = $row->sustanciasFlotantes1;
                      } echo $sustanciasFlotantes1?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $olor1 = $row->olor1;
                      } echo $olor1?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $oxigenoDisuelto1 = $row->oxigenoDisuelto1;
                      } echo $oxigenoDisuelto1?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $conductividad1 = $row->conductividad1;
                      } echo $conductividad1?></td>
                  <td> <?php
                     foreach($analisisFisicos->result() as $row){
                       $temperaturaSegunda1 = $row->temperaturaSegunda1;
                      } echo $temperaturaSegunda1?></td>
                  <td> <?php
                     foreach($analisisFisicos->result() as $row){
                       $fluoruros1 = $row->fluoruros1;
                      } echo $fluoruros1?></td>
                </tr>
                <tr>
                  <td  rowspan="3"> </td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $ph2 = $row->ph2;
                      } echo $ph2?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $temperatura2 = $row->temperatura2;
                      } echo $temperatura2?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $colorAparente2 = $row->colorAparente2;
                      } echo $colorAparente2?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $colorVerdadero2 = $row->colorVerdadero2;
                      } echo $colorVerdadero2?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $turbiedad2 = $row->turbiedad2;
                      } echo $turbiedad2?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $sustanciasFlotantes2 = $row->sustanciasFlotantes2;
                      } echo $sustanciasFlotantes2?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $olor2 = $row->olor2;
                      } echo $olor2?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $oxigenoDisuelto2 = $row->oxigenoDisuelto2;
                      } echo $oxigenoDisuelto2?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $conductividad2 = $row->conductividad2;
                      } echo $conductividad2?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $temperaturaSegunda2 = $row->temperaturaSegunda2;
                      } echo $temperaturaSegunda2?></td>
                  <td> <?php
                     foreach($analisisFisicos->result() as $row){
                       $fluoruros2 = $row->fluoruros2;
                      } echo $fluoruros2?></td>
                </tr>
                <tr style="background-color: #D9D9D9;">
                  <td>Promedio</td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $phPromedio = $row->phPromedio;
                      } echo $phPromedio?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $temperaturaPromedio = $row->temperaturaPromedio;
                      } echo $temperaturaPromedio?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $colorAparentePromedio = $row->colorAparentePromedio;
                      } echo $colorAparentePromedio?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $colorVerdaderoPromedio = $row->colorVerdaderoPromedio;
                      } echo $colorVerdaderoPromedio?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $turbiedadPromedio = $row->turbiedadPromedio;
                      } echo $turbiedadPromedio?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $sustanciasFlotantesPromedio = $row->sustanciasFlotantesPromedio;
                      } echo $sustanciasFlotantesPromedio?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $olorPromedio = $row->olorPromedio;
                      } echo $olorPromedio?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $oxigenoDisueltoPromedio = $row->oxigenoDisueltoPromedio;
                      } echo $oxigenoDisueltoPromedio?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $conductividadPromedio = $row->conductividadPromedio;
                      } echo $conductividadPromedio?></td>
                  <td> <?php
                     foreach($analisisFisicos->result() as $row){
                       $temperaturaSegundaPromedio = $row->temperaturaSegundaPromedio;
                      } echo $temperaturaSegundaPromedio?></td>
                  <td> <?php
                     foreach($analisisFisicos->result() as $row){
                       $fluorurosPromedio = $row->fluorurosPromedio;
                      } echo $fluorurosPromedio?></td>
                </tr>
                <tr>
                  <td >Solución Carta de Control</td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $phSolucionCartaControl = $row->phSolucionCartaControl;
                      } echo $phSolucionCartaControl?></td>
                  <td class="active"><?php
                     foreach($analisisFisicos->result() as $row){
                       $temperaturaSolucionCartaControl = $row->temperaturaSolucionCartaControl;
                      } echo $temperaturaSolucionCartaControl?></td>
                  <td class="active"><?php
                     foreach($analisisFisicos->result() as $row){
                       $colorAparenteSolucionCartaControl = $row->colorAparenteSolucionCartaControl;
                      } echo $colorAparenteSolucionCartaControl?></td>
                  <td class="active"><?php
                     foreach($analisisFisicos->result() as $row){
                       $colorVerdaderoSolucionCartaControl = $row->colorVerdaderoSolucionCartaControl;
                      } echo $colorVerdaderoSolucionCartaControl?></td>
                  <td class="active"><?php
                     foreach($analisisFisicos->result() as $row){
                       $turbiedadSolucionCartaControl = $row->turbiedadSolucionCartaControl;
                      } echo $turbiedadSolucionCartaControl?></td>
                  <td class="active"><?php
                     foreach($analisisFisicos->result() as $row){
                       $sustanciasFlotantesSolucionCartaControl = $row->sustanciasFlotantesSolucionCartaControl;
                      } echo $sustanciasFlotantesSolucionCartaControl?></td>
                  <td class="active"><?php
                     foreach($analisisFisicos->result() as $row){
                       $olorSolucionCartaControl = $row->olorSolucionCartaControl;
                      } echo $olorSolucionCartaControl?></td>
                  <td class="active"><?php
                     foreach($analisisFisicos->result() as $row){
                       $oxigenoDisueltoSolucionCartaControl = $row->oxigenoDisueltoSolucionCartaControl;
                      } echo $oxigenoDisueltoSolucionCartaControl?></td>
                  <td class="active"><?php
                     foreach($analisisFisicos->result() as $row){
                       $conductividadSolucionCartaControl = $row->conductividadSolucionCartaControl;
                      } echo $conductividadSolucionCartaControl?></td>
                  <td class="active"> <?php
                     foreach($analisisFisicos->result() as $row){
                       $temperaturaSolucionCartaControl = $row->temperaturaSolucionCartaControl;
                      } echo $temperaturaSolucionCartaControl?></td>
                  <td class="active"> <?php
                     foreach($analisisFisicos->result() as $row){
                       $fluorurosSolucionCartaControl = $row->fluorurosSolucionCartaControl;
                      } echo $fluorurosSolucionCartaControl?></td>
                </tr>
                <tr>
                 <td colspan="2" class="active">Responsable</td>
                 <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $phResponsable = $row->phResponsable;
                      } echo $phResponsable?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $temperaturaResponsable = $row->temperaturaResponsable;
                      } echo $temperaturaResponsable?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $colorAparenteResponsable = $row->colorAparenteResponsable;
                      } echo $colorAparenteResponsable?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $colorVerdaderoResponsable = $row->colorVerdaderoResponsable;
                      } echo $colorVerdaderoResponsable?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $turbiedadResponsable = $row->turbiedadResponsable;
                      } echo $turbiedadResponsable?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $sustanciasFlotantesResponsable = $row->sustanciasFlotantesResponsable;
                      } echo $sustanciasFlotantesResponsable?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $olorResponsable = $row->olorResponsable;
                      } echo $olorResponsable?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $oxigenoDisueltoResponsable = $row->oxigenoDisueltoResponsable;
                      } echo $oxigenoDisueltoResponsable?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $conductividadResponsable = $row->conductividadResponsable;
                      } echo $conductividadResponsable?></td>
                  <td> <?php
                     foreach($analisisFisicos->result() as $row){
                       $temperaturaSegundaResponsable = $row->temperaturaSegundaResponsable;
                      } echo $temperaturaSegundaResponsable?></td>
                  <td><?php
                     foreach($analisisFisicos->result() as $row){
                       $fluorurosResponsable = $row->fluorurosResponsable;
                      } echo $fluorurosResponsable?></td>
                </tr>
                
             
              </tbody>
            </table>

</div> 
<!-- Fin margen guía -->

</body>
</html>
