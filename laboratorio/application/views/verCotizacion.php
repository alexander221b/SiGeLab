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
</style>

<div>
  <table border="1" style="width: 310px; color:black ">
    <tr>
      <th style="border:solid black 1.5pt; padding-top: 0px; padding-bottom: 0px; font-size:10.0pt"><strong> &nbsp Laboratorio:</strong></th>
      <th style="border:solid black 1.5pt; padding-top: 0px; padding-bottom: 0px; font-size:10.0pt"><strong>&nbsp Análisis de Aguas y Alimentos</strong>  </th>
    </tr>
  </table>
</div>

<br> 



<div>
  <table border="1" style="width: 720px; color:black">
    <thead>
      <tr>
        <th colspan="4" style="background-color: #D9D9D9; width: 720px; text-align: center; font-size:10.0pt">SOLICITUD REALIZADA A TRAVÉS DE:</div></th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach($cotizacion->result() as $row){
          $metodoSolicitud = $row->metodoSolicitud;
        }
        if($metodoSolicitud == "telefonico") {
          echo '<td style="width: 180px; font-size:10.0pt">Telefónico: X </td>';
          echo '<td style="width: 180px; font-size:10.0pt">Presencial: </td>';
          echo '<td style="width: 180px; font-size:10.0pt">Email: </td>';
          echo '<td style="width: 180px; font-size:10.0pt">Correspondencia: </td>';
        }
        if($metodoSolicitud == "presencial") {
          echo '<td style="width: 180px; font-size:10.0pt">Telefónico:  </td>';
          echo '<td style="width: 180px; font-size:10.0pt">Presencial: X</td>';
          echo '<td style="width: 180px; font-size:10.0pt">Email: </td>';
          echo '<td style="width: 180px; font-size:10.0pt">Correspondencia: </td>';
        }
        if($metodoSolicitud == "email") {
          echo '<td style="width: 180px; font-size:10.0pt">Telefónico:  </td>';
          echo '<td style="width: 180px; font-size:10.0pt">Presencial: </td>';
          echo '<td style="width: 180px; font-size:10.0pt">Email: X</td>';
          echo '<td style="width: 180px; font-size:10.0pt">Correspondencia: </td>';
        }
        if($metodoSolicitud == "correspondencia") {
          echo '<td style="width: 180px; font-size:10.0pt">Telefónico:  </td>';
          echo '<td style="width: 180px; font-size:10.0pt">Presencial: </td>';
          echo '<td style="width: 180px; font-size:10.0pt">Email: </td>';
          echo '<td style="width: 180px; font-size:10.0pt">Correspondencia: X</td>';
        }
      ?>
    </tbody>
  </table> 
</div>

<br>

<div>
  <table border="1" style="width: 720px; text-align: center;  color:black; font-size:10.0pt; border-right:solid black 1.5pt; border-left:solid black 1.5pt; border-top:solid black 1.5pt;">
    <tr>
      <th colspan="5" style="background-color: #D9D9D9; text-align: center">Fecha</td>
      <th style=" width: 130px; background-color: #D9D9D9; text-align: center"> Cotización No.</td>
      <td style="width: 450px; text-align: right; " rowspan="3" colspan="8"><IMG SRC="\laboratorio\imagenes\onac.png" WIDTH="100" HEIGHT="50" ></td>
    </tr>
    <tr>
      <th style=" width: 70px; background-color: #D9D9D9; text-align: center">Día</td>
      <th colspan="3" style=" width: 40px; background-color: #D9D9D9; text-align: center">Mes</td>
      <th style=" width: 70px; background-color: #D9D9D9; text-align: center">Año</td>
      <?php
        foreach($cotizacion->result() as $row){
          $cotizacionNo = $row->cotizacionNo;
        }
        $cotizacionNoModificado = str_replace("-", "/", $cotizacionNo);
        echo '<th rowspan="2" style="text-align: center">'.$cotizacionNoModificado.'</th>';
      ?>
    </tr>
    <tr>
      <?php
        foreach($cotizacion->result() as $row){
          $fechaSeparada = explode("-", $row->fecha);
        }
        $ano = $fechaSeparada[0];
        $mes = $fechaSeparada[1];
        $dia = $fechaSeparada[2];
        echo '<td style="width: 100px; text-align: center;">'.$dia.'</td>';
        echo '<td colspan="3" style="width: 100px; text-align: center;">'.$mes.'</td>';
        echo '<td style="width: 100px; text-align: center;">'.$ano.'</td>';
      ?>
    </tr>
  </table>

      <table style="width: 720px; text-align: center; color:black; font-size:10.0pt;">
    <tr>
      <th colspan="17" style="padding-top: 8px; padding-bottom: 8px; background-color: #D9D9D9; text-align: center; border-right:solid black 1.5pt; border-left:solid black 1.5pt;">DATOS DE LA EMPRESA</td>
    </tr>
     </table>


   <table border="1" style=" border-left:solid black 1.5pt; border-bottom:solid black 1.5pt; border-right:solid black 1.5pt; width: 720px; text-align: center; color:black; font-size:10.0pt;">
      <tr>
        <td colspan="4" style="text-align: left;">
          Razón Social: 
          <?php
            foreach($cotizacion->result() as $row){
              $razonSocial = $row->razonSocial;
            }  
            echo $razonSocial;
          ?>
        </td>
        <td colspan="6" style="text-align: left; ">    
          Nit o C.C : 
          <?php
            foreach($cotizacion->result() as $row){
              $nitCc = $row->nitCc;
            } 
            echo $nitCc; 
          ?>
        </td>
      </tr>
      <tr>
        <td colspan="4" style="text-align: left">
          Solicitante: 
          <?php
            foreach($cotizacion->result() as $row){
              $solicitante = $row->solicitante;
            } 
            echo $solicitante;   
          ?>        
        </td>
        <td colspan="6" style="text-align: left;">
          Cargo: 
          <?php
            foreach($cotizacion->result() as $row){
              $cargo = $row->cargo;
            } 
            echo $cargo;   
          ?>
        </td>
      </tr>
       <tr>
        <td colspan="4" style="text-align: left">
          Dirección: 
          <?php
            foreach($cotizacion->result() as $row){
              $direccion = $row->direccion;
            } 
            echo $direccion;   
          ?>
        </td>
        <td colspan="6" style=" text-align: left; ">
          Teléfono/Fax: 
          <?php
            foreach($cotizacion->result() as $row){
              $telefonoFax = $row->telefonoFax;
            } 
            echo $telefonoFax;   
          ?>
        </td>
      </tr>
      <tr>
        <td colspan="4" style="text-align: left">
          Municipio/Departamento: 
          <?php
            foreach($cotizacion->result() as $row){
              $municipioDepartamento = $row->municipioDepartamento;
            } 
            echo $municipioDepartamento;   
          ?>
       </td>
        <td colspan="6" style="text-align: left; ">
          Correo electrónico: 
          <?php
            foreach($cotizacion->result() as $row){
              $correoElectronico = $row->correoElectronico;
            } 
            echo $correoElectronico;   
          ?>
        </td>
      </tr>
  </table>
</div>
<br>


<form method="post">  
  <table id="tabla" border="1" style="width: 720px; border-left:solid black 1.5pt; border-right:solid black 1.5pt; border-top:solid black 1.5pt; font-size:10.0pt; color:black">
    <tbody>
      <tr style="background-color: #D9D9D9;">
        <th style="text-align: center;">TIPO DE MUESTRA</th>
        <th style="text-align: center;">PARÁMETRO</th>
        <th style="text-align: center;">MÉTODO</th>
        <th style="text-align: center;">Precio por Muestra</th>
        <th style="text-align: center;">No. de Muestras</th>
        <th style="text-align: center;">VALOR TOTAL</th>
      </tr>
      <?php
        foreach($datosMuestras->result() as $row){
          $tipoMuestra = $row->tipoMuestra;
          $parametro = $row->parametro;
          $metodo = $row->metodo;
          $precioMuestra = $row->precioMuestra;
          $noMuestras = $row->noMuestras;
          $valorTotal = $row->valorTotal;
          echo '<tr>
            <td style="text-align: center;">'.$tipoMuestra.'</td>
            <td style="text-align: center;">'.$parametro.'</td>
            <td style="text-align: center;">'.$metodo.'</td>
            <td style="text-align: center;">'.$precioMuestra.'</td>
            <td style="text-align: center;">'.$noMuestras.'</td>
            <td style="text-align: center;">'.$valorTotal.'</td>
          </tr>';
        }
      ?>
    </tbody>
   </table>

   <table border="1" style="width: 720px; border-top:none; border-left:solid black 1.5pt; border-right:solid black 1.5pt; border-bottom:solid black 1.5pt; font-size:10.0pt; color:black">
     <tr>
       <td style="font-size:10.0pt; " colspan="2">
        <strong>Observaciones: </strong>
        <?php
          foreach($cotizacion->result() as $row){
            $observaciones = $row->observaciones;
          } 
          echo $observaciones; 
        ?>
       </td>
     </tr>
     <tr>
       <td style="font-size:10.0pt; width: 600px; border-top:solid black 1.5pt;"><strong>TOTAL A PAGAR</strong></td>
       <td style="font-size:10.0pt; text-align: center;">
        <?php
          foreach($cotizacion->result() as $row){
            $totalPagar = $row->totalPagar;
          }
          echo " $ ".$totalPagar;
        ?>
       </td>
     </tr>
   </table>

<br><br>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=723
 style='width:19.0cm;border-collapse:collapse;border:none; color:black'>
 <tr>
  <td width=723 valign=top style='width:19.0cm;border:solid black 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:10.0pt;
  line-height:115%;font-family:"Arial","sans-serif"'>Nota. El laboratorio
  cuenta con recurso humano capacitado y con experiencia en la realización de
  Ensayos. Además trabaja con equipo y sustancias certificadas a fin de cumplir
  con las necesidades del cliente bajo los estándares de calidad.  Los
  procedimientos de Ensayo implementados en el laboratorio están basados en
  normas técnicas y en procedimientos debidamente validados. Lo anterior
  asegura la calidad de los resultados de Ensayo obtenidos en el laboratorio.</span></b></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
  justify;line-height:normal'><b><span style='font-size:10.0pt;font-family:
  "Arial","sans-serif"'>El Laboratorio de Análisis de Aguas y Alimentos-UTP está
  Acreditado por el ONAC, bajo la Norma NTC-ISO/IEC 17025:2005</span></b><b><span
  style='font-size:10.0pt;font-family:"Arial","sans-serif"'> <span lang=ES>en
  los siguientes análisis para  Aguas Potables (envasadas y de consumo) y aguas
  crudas: XXXXXXX</span></span></b></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
  justify;line-height:normal'><b><span lang=ES style='font-size:10.0pt;
  font-family:"Arial","sans-serif"'>Análisis para bebidas alcohólicas (ron – aguardiente):
  XXXXXX</span></b></p>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:10.0pt;
  line-height:115%;font-family:"Arial","sans-serif"'>El Laboratorio de Análisis
  de Aguas y Alimentos-UTP está autorizado por el Ministerio de la Protección
  Social para realizar análisis Organolépticos, físicos, químicos y
  microbiológicos al agua potable, mediante la Resolución # xxxx del día-mes-año.</span></b></p>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:10.0pt;
  line-height:115%;font-family:"Arial","sans-serif"'>CONDICIONES</span></b></p>
  <ul style='margin-top:0cm' type=disc>
   <li class=MsoNormal style='text-align:justify;line-height:normal'><span
       style='font-size:10.0pt;font-family:"Arial","sans-serif"'>Los métodos
       utilizados en la ejecución de los ensayos para cada uno de los
       parámetros con algunas excepciones han sido tomados del Standard Methods
       for The Examination of Water and Wastewater  22 ND Edition 2012.</span></li>
   <li class=MsoNormal style='text-align:justify;line-height:normal'><span
       style='font-size:10.0pt;font-family:"Arial","sans-serif"'>A partir de la
       recepción de la muestra existe un tiempo estimado de 12 días hábiles
       para la entrega de los Resultados. <b><i>Este puede aumentar
       dependiendo  del número de muestras y los análisis requeridos</i></b>.
       Luego de la entrega del Informe de Resultados, existe un espacio de tiempo
       máximo de 15 días hábiles para la atención de reclamos.</span></li>
   <li class=MsoNormal style='text-align:justify;line-height:normal'><span
       style='font-size:10.0pt;font-family:"Arial","sans-serif"'>El envío de la
       (s) muestra (s) por parte del cliente implica la aceptación de las
       condiciones legales y comerciales establecidas en la cotización.</span></li>
   <li class=MsoNormal style='text-align:justify;line-height:normal'><span
       style='font-size:10.0pt;font-family:"Arial","sans-serif"'>El laboratorio
       no cubrirá gastos por concepto de recolección de muestras, en caso de
       que no se solicite el servicio, por lo tanto es el cliente quien se
       responsabiliza de su recolección. </span></li>
   <li class=MsoNormal style='text-align:justify;line-height:normal'><span
       style='font-size:10.0pt;font-family:"Arial","sans-serif"'>La Universidad
       Tecnológica de Pereira NO ES RESPONSABLE DEL IMPUESTO AL VALOR AGREGADO
       (I.V.A.),  Ley 30 de 1992, Art. 476 Numeral 6. La Universidad
       Tecnológica de Pereira por ser institución oficial, está exenta de
       retención en la fuente y todo tipo de impuestos, tasas y contribuciones.</span></li>
   <li class=MsoNormal style='text-align:justify;line-height:normal'><span
       style='font-size:10.0pt;font-family:"Arial","sans-serif"'>Para el pago
       del trabajo, cancelar el 100 % al traer la muestra consignando en la caja
       de la Universidad Tecnológica de Pereira en el proyecto <b><i>511 – 22 –
       265 – 06</i></b> o si el pago es a través de TRANSFERENCIA ELECTRÓNICA 
       favor consignar a la Cta. Cte. 0733-650540-3 de BANCOLOMBIA y remitir
       copia del comprobante al Fax 321 57 50.  </span></li>
   <li class=MsoNormal style='text-align:justify;line-height:normal'><span
       style='font-size:10.0pt;font-family:"Arial","sans-serif"'>En caso de ser
       necesario el cliente debe enviar una orden de servicio o de compra de
       acuerdo a la cotización aprobada. </span></li>
   <li class=MsoNormal style='text-align:justify;line-height:normal'><span
       style='font-size:10.0pt;font-family:"Arial","sans-serif"'>Si el cliente
       lo requiere se puede generar un contrato por la prestación del servicio.</span></li>
   <li class=MsoNormal style='text-align:justify;line-height:normal'><span
       style='font-size:10.0pt;font-family:"Arial","sans-serif"'>Para coordinar
       el día y la hora de la recepción y hacer las recomendaciones necesarias
       para el volumen y recolección de las muestras,  por favor comuníquese
       con anticipación con el laboratorio al telefax <b>3215750</b> o al
       correo electrónico: <b>labaguas@utp.edu.co</b></span></li>
  </ul>
  <p class=MsoNormal style='margin-left:36.0pt;text-align:justify;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>Cordialmente,</span></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
  justify;line-height:normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>____________________</span></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
  justify;line-height:normal'><b><span style='font-size:10.0pt;font-family:
  "Arial","sans-serif"'>&nbsp;</span></b></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
  justify;line-height:normal'><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>Responsable
  Técnico</span></p>
  <p class=MsoNormal style='text-align:justify'><span style='font-size:10.0pt;
  line-height:115%;font-family:"Arial","sans-serif"'>&nbsp;</span></p>
  <p class=MsoNormal style='text-align:justify'><span style='font-size:10.0pt;
  line-height:115%;font-family:"Arial","sans-serif"'>Elaboró: </span></p>
  </td>
 </tr>
</table>
   

</body>
</html>
