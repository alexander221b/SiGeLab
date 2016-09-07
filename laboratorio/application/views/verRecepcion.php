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
  width: 716px; 
}
</style>

<!-- Margen guía -->
<div class="margenGuia"> 
  <!-- Encabezado -->
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8" align=center style="font-size:12.0pt;">
      <font color="grey" face="arial">
        <strong>VICERRECTORÍA DE INVESTIGACIONES, INNOVACIÓN <br> Y EXTENSION<br><br>
        </strong>
      </font>
    </div>
    <div class="col-sm-2" style="padding-top: 20px;">
      <div align=right>
        <table border="1" style="font-size:6.0pt; color:grey; border: grey;">
          <tr>
            <td>Código</td>
            <td>123-LAA-F02</td>
          </tr>
          <tr>
            <td>Versión</td>
            <td>4</td>
          </tr>
          <tr>
            <td>Fecha</td>
            <td>2015-02-06</td>
          </tr>
          <tr>
            <td>Página</td>
            <td>1 de 2</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div align=center style="font-size:12.0pt;">
    <font color="grey" face="arial">
      <strong>RECEPCIÓN DE LAS MUESTRAS DE ENSAYO
      </strong><br><br>
    </font> 
  </div>
  <!-- Fin encabezado -->

  <!-- Cabezera laboratorio -->
  <div>
    <table border="1" style="width: 310px; color:black; font-size:10.0pt; ">
      <tr>
        <th style="padding-top: 0px; padding-bottom: 0px;"><strong> &nbsp Laboratorio:</strong></th>
        <th style="padding-top: 0px; padding-bottom: 0px;"><strong>&nbsp Análisis de Aguas y Alimentos</strong></th>
      </tr>
    </table>
  </div><br>
  <!-- Fin cabezera laboratorio -->

    <!-- Tabla principal -->
    <table border="1" style="width: 716px; color:black; font-size:10.0pt;">
      <tr style="background-color: #D9D9D9;">
        <th colspan="3" style="text-align:center; ">FECHA</th>
        <th style="text-align:center">Cotización <br> aprobada No.</th>
        <th style="text-align:center;">Número de <br> Muestras</th>
        <td rowspan="3" style="text-align:center; background-color:white;"></th>
        <th style="text-align:center">Código interno</th>
      </tr>
      <tr>
        <th style="width: 50px; height: 16px; text-align:center; background-color: #D9D9D9;">Día</th>
        <th style="width: 50px; height: 16px; text-align:center; background-color: #D9D9D9;">Mes</th>
        <th style="width: 50px; height: 16px; text-align:center; background-color: #D9D9D9;">Año</th>
        <td style="width: 100px; text-align:center;" rowspan="2" >
          <?php 
            foreach($recepcion->result() as $row){
              $cotizacionNo = $row->cotizacionNo;
            }  
            echo $cotizacionNo;  
          ?>
        </td>
        <td rowspan="2" style="width: 90px; text-align:center;">
          <?php 
            foreach($recepcion->result() as $row){
              $numeroMuestras = $row->numeroMuestras;
            }  
            echo $numeroMuestras;  
          ?>
        </td>
        <td rowspan="2" style="width: 90px; text-align:center;">
          <?php 
            foreach($recepcion->result() as $row){
              $codigoInterno = $row->codigoInterno;
            }  
            echo $codigoInterno;  
          ?>
        </td>
      </tr>
      <tr>
        <?php
          foreach($recepcion->result() as $row){
            $fechaSeparada = explode("-", $row->fecha);
          }
          $ano = $fechaSeparada[0];
          $mes = $fechaSeparada[1];
          $dia = $fechaSeparada[2];
          echo '<td style="text-align:center">'.$dia.'</td>';
          echo '<td style="text-align:center">'.$mes.'</td>';
          echo '<td style="text-align:center">'.$ano.'</td>';
        ?>
      </tr>
      <tr>
        <th colspan="7" style="text-align:center; background-color: #D9D9D9;">DATOS DE LA (S) MUESTRA (S)</th>
      </tr>
      <tr>
        <td colspan="7"><b>Observaciones del cliente:</b></td>
      </tr>
      <tr>
        <td colspan="7">
          <?php 
            foreach($recepcion->result() as $row){
              $observacionesCliente = $row->observacionesCliente;
            }  
            echo $observacionesCliente;  
          ?>
        </td>
      </tr>
      <tr>
        <td colspan="7"><b>Condiciones de la Muestra en el momento de la recepción: </b></td>
      </tr>
      <tr>
        <td colspan="7">
          <?php 
            foreach($recepcion->result() as $row){
              $condicionesMuestra = $row->condicionesMuestra;
             }  
            echo $condicionesMuestra;  
          ?>
        </td>
      </tr>
      <tr>
        <?php
          foreach($recepcion->result() as $row){
            $refrigerada = $row->refrigerada;
          }  
          if($refrigerada == "si") {
            echo '<td colspan="7"><b>Refrigerada: SI </b></td>';
          } 
          if($refrigerada == "no") {
            echo '<td colspan="7"><b>Refrigerada: NO </b></td>';
          }
        ?>
      </tr>
      <tr>
        <td colspan="7">&nbsp</td>
      </tr>
    </table>
    <!-- Fin tabla principal -->
   
    <!-- Tabla descripción de las muestras -->
    <table id="tabla" border="1" style="border-top:none; width: 716px; color:black; font-size:10.0pt;">
      <tr>
        <th style="text-align:center; background-color: #D9D9D9;">DESCRIPCIÓN DE LA MUESTRA</th>
        <th style="text-align:center; background-color: #D9D9D9;">Consecutivo</th>
        <th style="text-align:center; background-color: #D9D9D9;">Tipo de Muestra</th>
        <th style="text-align:center; background-color: #D9D9D9;">Hora de <br> Toma</th>
      </tr>
      <?php foreach($datosMuestraRecepcion->result() as $row){
        $idsMuestras[] = $row->id;
        echo '<tr>';  
          echo '<td style="width: 450px;">'.$row->descripcionMuestra.'</td>';
          echo '<td style="width: 100px;">'.$row->consecutivo.'</td>';
          echo '<td style="width: 90px;">'.$row->tipoMuestra.'</td>';
          echo '<td style="width: 90px; text-align:center">'.$row->horaToma.'</td>';
      }
      echo '</tr>';
      ?>
    </table> <br>
    <!-- Fin tabla descripción de las muestras -->

    <div><b><font size="2" face="arial" color="black">Nota: Se ingresa el listado de parámetros de acuerdo a la cotización aprobada por el cliente.</font></b></div>
    
    <table id="tabla2" border="1" style="width: 716px; color:black; font-size:10.0pt;"> 
      <tr >
        <th style="text-align:center; background-color: #D9D9D9;" rowpan="2"> PARÁMETRO</th>
        <th style="text-align:center; background-color: #D9D9D9;" colspan="12"> CONSECUTIVO CÓDIGO</th>
      </tr>
      <tr style="background-color: #D9D9D9;">
        <th >&nbsp</th>
        <th >&nbsp</th>
        <th >&nbsp</th>
        <th >&nbsp</th>
        <th >&nbsp</th>
        <th >&nbsp</th>
        <th >&nbsp</th>
        <th >&nbsp</th>
        <th >&nbsp</th>
        <th >&nbsp</th>
        <th >&nbsp</th>
        <th >&nbsp</th>
        <th >&nbsp</th>
      </tr>
      <?php 
        foreach($parametrosRecepcion->result() as $row){
          echo '<tr>';
            echo '<td style="width: 200px;">'.$row->parametro.'</td>';
            echo '<td style="width: 33px;">'.$row->consecutivoA.'</td>';
            echo '<td style="width: 33px;">'.$row->consecutivoB.'</td>';
            echo '<td style="width: 33px;">'.$row->consecutivoC.'</td>';
            echo '<td style="width: 33px;">'.$row->consecutivoD.'</td>';
            echo '<td style="width: 33px;">'.$row->consecutivoE.'</td>';
            echo '<td style="width: 33px;">'.$row->consecutivoF.'</td>';
            echo '<td style="width: 33px;">'.$row->consecutivoG.'</td>';
            echo '<td style="width: 33px;">'.$row->consecutivoH.'</td>';
            echo '<td style="width: 33px;">'.$row->consecutivoI.'</td>';
            echo '<td style="width: 33px;">'.$row->consecutivoJ.'</td>';
            echo '<td style="width: 33px;">'.$row->consecutivoK.'</td>';
            echo '<td style="width: 33px;">'.$row->consecutivoL.'</th>';
          echo '</tr>';
        }
      ?>
    </table><br>

<div style="color:black;">
<!-- Color letra -->

<p class=MsoHeader style='text-align:justify'><b><span lang=ES-MX
style='font-size:9.0pt;font-family:"Arial","sans-serif"'>CONDICIONES BAJO LAS
CUALES SE OTORGA EL SERVICIO</span></b></p>

<p class=MsoNormal style='margin-bottom:.0001pt; text-align:justify;punctuation-wrap:simple;
text-autospace:none;vertical-align:baseline'><b><span lang=ES-MX
style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Cláusula 1:</span></b><span
lang=ES-MX style='font-size:9.0pt;font-family:"Arial","sans-serif"'> </span><span
lang=ES style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Los análisis
son realizados bajo las condiciones ambientales (temperatura y humedad
relativa) del laboratorio. Las muestras se conservan y almacenan de acuerdo al
procedimiento respectivo.</span></p>

<p class=MsoNormal style='margin-bottom:.0001pt; text-align:justify;punctuation-wrap:simple;
text-autospace:none;vertical-align:baseline'><b><span lang=ES-MX
style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Cláusula 2:</span></b><span
lang=ES-MX style='font-size:9.0pt;font-family:"Arial","sans-serif"'> </span><span
lang=ES style='font-size:9.0pt;font-family:"Arial","sans-serif"'>El laboratorio
no se responsabiliza por la representatividad de la muestra cuando ésta no ha
sido tomada bajo su supervisión.</span></p>

<p class=MsoNormal style='margin-bottom:.0001pt; text-align:justify;punctuation-wrap:simple;
text-autospace:none;vertical-align:baseline'><b><span lang=ES-MX
style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Cláusula 3:</span></b><span
lang=ES-MX style='font-size:9.0pt;font-family:"Arial","sans-serif"'> El
Laboratorio de Análisis de Aguas y Alimentos de la Universidad Tecnológica de
Pereira cuenta con el personal, equipos, recursos físicos y tiempo necesarios
para la ejecución del trabajo solicitado.</span></p>

<p class=MsoNormal style='margin-bottom:.0001pt; text-align:justify;punctuation-wrap:simple;
text-autospace:none;vertical-align:baseline'><b><span lang=ES-MX
style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Cláusula 4:</span></b><span
lang=ES-MX style='font-size:9.0pt;font-family:"Arial","sans-serif"'> </span><span
lang=ES style='font-size:9.0pt;font-family:"Arial","sans-serif"'>A partir de la
recepción de la muestra existe un tiempo estimado de 12 días hábiles para la entrega
del informe de resultados.</span><span lang=ES-MX style='font-size:9.0pt;
font-family:"Arial","sans-serif"'> Este puede aumentar dependiendo  del número
de muestras y los análisis requeridos. Luego de la entrega del Informe de
Ensayo, existe un espacio de tiempo máximo de 15 días hábiles para la atención
de reclamos.</span></p>

<p class=MsoNormal style='margin-bottom:.0001pt; text-align:justify;punctuation-wrap:simple;
text-autospace:none;vertical-align:baseline'><b><span lang=ES-MX
style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Cláusula 5:</span></b><span
lang=ES-MX style='font-size:9.0pt;font-family:"Arial","sans-serif"'> El cliente
se responsabiliza a cancelar al laboratorio los costos totales del trabajo
acordado por ambas partes.</span></p>

<p class=MsoNormal style='margin-bottom:.0001pt; text-align:justify;punctuation-wrap:simple;
text-autospace:none;vertical-align:baseline'><b><span lang=ES-MX
style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Cláusula 6: </span></b><span
lang=ES-MX style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Los
resultados de ensayo no conforme son atendidos y controlados según
procedimiento de Trabajo No Conforme.</span></p>

<p class=MsoNormal style='margin-bottom:.0001pt; text-align:justify;punctuation-wrap:simple;
text-autospace:none;vertical-align:baseline'><b><span lang=ES-MX
style='font-size:9.0pt;font-family:"Arial","sans-serif"'>Cláusula 7:</span></b><span
lang=ES-MX style='font-size:9.0pt;font-family:"Arial","sans-serif"'> El
laboratorio se rige por disposiciones legales vigentes y según los estatutos de
la Universidad</span></p>

<p class=MsoBodyText2 style='margin-bottom:.0001pt;
text-align:justify;line-height:normal'><b><span lang=ES-MX style='font-size:
9.0pt;font-family:"Arial","sans-serif"'>Cláusula 8:</span></b><span lang=ES-MX
style='font-size:9.0pt;font-family:"Arial","sans-serif"'> El laboratorio es
responsable frente al cliente del trabajo realizado por el subcontratista,
excepto en el caso que el cliente o una autoridad reglamentaria especifique el
subcontratista a utilizar</span><b><span lang=X-NONE style='font-size:9.0pt;
font-family:"Arial","sans-serif"'> </span></b></p>

<p class=MsoBodyText2 style='margin-bottom:.0001pt;
text-align:justify;line-height:normal'><b><span style='font-size:9.0pt;
font-family:"Arial","sans-serif"'>Cláusula 9: </span></b><span
style='font-size:9.0pt;font-family:"Arial","sans-serif"'>En caso de surgir
cambios en la  cotización aprobada se realiza un acuerdo entre el laboratorio y
el cliente, como esta establecido en el procedimiento de Servicio al Cliente.</span></p>

<p class=MsoBodyText2 style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:justify;line-height:normal'><b><span style='font-size:9.0pt;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p class=MsoBodyText2 style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:justify;line-height:normal'><b><span style='font-size:10.0pt;
font-family:"Arial","sans-serif"'>APROBACIÓN POR PARTE DEL CLIENTE:</span></b></p>

<p class=MsoBodyText2 style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:justify;line-height:normal'><b><span style='font-size:10.0pt;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p class=MsoBodyText2 style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:justify;line-height:normal'><b><span lang=X-NONE style='font-size:
10.0pt;font-family:"Arial","sans-serif"'>COMO SOLICITANTE DEL SERVICIO ACEPTO
LO ESTIPULADO ANTERIORMENTE Y ACUERDO COMPROMISO DE TRABAJO CON EL LABORATORIO
DE ANÁLISIS DE AGUAS Y ALIMENTOS DE LA UNIVERSIDAD TECNOLÓGICA DE PEREIRA</span></b></p>

<p class=MsoBodyText2 style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:justify;line-height:normal'><b><span style='font-size:10.0pt;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p class=MsoBodyText2 style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:justify;line-height:normal'><b><span style='font-size:10.0pt;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p class=MsoBodyText2 style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:justify;line-height:normal'><b><span style='font-size:10.0pt;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p class=MsoBodyText2 style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:justify;line-height:normal'><b><span style='font-size:10.0pt;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p class=MsoBodyText2 style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:justify;line-height:normal'><b><span style='font-size:10.0pt;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p class=MsoBodyText2 style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:justify;line-height:normal'><b><span style='font-size:10.0pt;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p class=MsoBodyText2 style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:justify;line-height:normal'><b><span style='font-size:10.0pt;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p class=MsoBodyText2 style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:justify;line-height:normal'><b><span style='font-size:10.0pt;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p class=MsoBodyText2 style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:justify;line-height:normal'><b><span style='font-size:10.0pt;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<div align=center>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=624
 style='width:467.8pt;margin-left:35.45pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=235 valign=top style='width:176.1pt;border:none;border-top:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoBodyText2 style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:justify;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>NOMBRE DEL CLIENTE</span></b></p>
  <p class=MsoBodyText2 style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:justify;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>C.C.</span></b></p>
  <p class=MsoBodyText2 style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:justify;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
  </td>
  <td width=172 valign=top style='width:128.65pt;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoBodyText2 style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:justify;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
  </td>
  <td width=217 valign=top style='width:163.05pt;border:none;border-top:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoBodyText2 style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:justify;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>NOMBRE DEL ENCARGADO DE REGISTRAR LA
  MUESTRA</span></b></p>
  </td>
 </tr>
</table>

</div>

<p class=MsoBodyText2 style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:justify;line-height:normal'><b><span style='font-size:10.0pt;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

</div>
<!-- Fin color letra -->

</div> 
<!-- Fin margen guía -->

</body>
</html>
