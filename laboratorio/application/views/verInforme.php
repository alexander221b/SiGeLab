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


  <form method="post">  
    <table style="width: 310px; color:black ">
      <tr>
        <th style="border:solid black 1.5pt; padding-top: 0px; padding-bottom: 0px; font-size:10.0pt"><strong> &nbsp Laboratorio:</strong></th>
        <th style="border:solid black 1.5pt; padding-top: 0px; padding-bottom: 0px; font-size:10.0pt"><strong>&nbsp Analisis de Aguas y Alimentos</strong>  </th>
      </tr>
  </table>

  <br> 

  <table border="1px" style="width:23.0cm; color:black">

    <tr>
      <td colspan=3 style='width:134.65pt;border:1px solid black;background:#D9D9D9'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>Fecha Edicion</span></b></p>
      </td>
      <td colspan=3 style='width:106.2pt;border:1px solid black;background:#D9D9D9'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>COTIZACION No.</span></b></p>
      </td>
      <td width=113 style='width:84.9pt;border:1px solid black;
      background:#D9D9D9'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>No. de Paginas</span></b></p>
      </td>
      <td width=232 colspan=3 style='width:174.3pt;border:none;
      padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal align=center style='text-align:center'><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
      </td>
      <td width=203 colspan=2 style='width:152.0pt;border:none'>
        <p class=MsoNormal align=center style='text-align:center'><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
      </td>
    </tr>

    <tr>
      <td width=50 style='width:37.5pt;border:1px solid black;background:#D9D9D9'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>Dia</span></b></p>
      </td>
      <td width=62 style='width:46.25pt;border:1px solid black;background:#D9D9D9'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>Mes</span></b></p>
      </td>
      <td width=68 style='width:50.9pt;border:1px solid black;background:#D9D9D9'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>Ano</span></b></p>
      </td>
      <td align=center width=142 rowspan=2 colspan=3 style='width:106.2pt;border:1px solid black'>    
        <?php foreach($informe->result() as $row){
         $cotizacionNo = $row->cotizacionNo;
        }  
          echo $cotizacionNo;  
      ?>
      </td>
      <td align=center width=142 rowspan=2 style='width:106.2pt;border:1px solid black'>    
        <?php foreach($informe->result() as $row){
         $noPaginas = $row->noPaginas;
        }  
          echo $noPaginas;  
      ?>
      </td>
      <td width=232 colspan=3 style='width:174.3pt;border:none'>
        <p class=MsoNormal align=center style='text-align:center'><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
      </td>
      <td width=203 colspan=2 style='width:152.0pt;border:none'>
        <p class=MsoNormal align=center style='text-align:center'><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
      </td>
    </tr>

    <tr>  
      <td colspan="3" style="width: 100px;">
        <?php foreach($informe->result() as $row){
         $fecha = $row->fecha;
        }  
          echo $fecha;  
      ?>
      </td>
      <td width=232 colspan=3 style='width:174.3pt;border:none'>
        <p class=MsoNormal align=center style='text-align:center'><span lang=ES
      style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
      </td>
      <td width=203 colspan=2 style='width:152.0pt;border:none'>
        <p class=MsoNormal align=center style='text-align:center'><span lang=ES
      style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
      </td>           
    </tr>

    <tr>
      <td align=center width=869 colspan=12 valign=top style='width:23.0cm;border:1px solid black;background:#D9D9D9'>
        <p class=MsoNormal align=center style='text-align:center'><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>DATOS DE LA
        EMPRESA</span></p>
      </td>
    </tr>

    <tr>      
      <td colspan=6>Razon Social:
        <?php foreach($informe->result() as $row){
         $razonSocial = $row->razonSocial;
        }  
          echo $razonSocial;  
      ?>
      </td>
      <td colspan=6>NIT o CC:
        <?php foreach($informe->result() as $row){
         $nitCc = $row->nitCc;
        }  
          echo $nitCc;  
      ?>
      </td> 
    </tr>

    <tr>      
      <td colspan=6>Solicitante:
        <?php foreach($informe->result() as $row){
         $solicitante = $row->solicitante;
        }  
          echo $solicitante;  
      ?>
      </td>
      <td colspan=6>Cargo:
        <?php foreach($informe->result() as $row){
         $cargo = $row->cargo;
        }  
          echo $cargo;  
      ?>
      </td> 
    </tr>

    <tr>      
      <td colspan=6>Direccion:
        <?php foreach($informe->result() as $row){
         $direccion = $row->direccion;
        }  
          echo $direccion;  
      ?>
      </td>
      <td colspan=6>Telefono/Fax:
        <?php foreach($informe->result() as $row){
         $telefonoFax = $row->telefonoFax;
        }  
          echo $telefonoFax;  
      ?>
      </td> 
    </tr>

    <tr>      
      <td colspan=6>Municipio/Departamento:
        <?php foreach($informe->result() as $row){
         $municipioDpto = $row->municipioDpto;
        }  
          echo $municipioDpto;  
      ?>
      </td>
      <td colspan=6>Correo electronico:
        <?php foreach($informe->result() as $row){
         $correoElectronico = $row->correoElectronico;
        }  
          echo $correoElectronico;  
      ?>
      </td> 
    </tr>

    <tr>      
      <td colspan=6>Lugar de toma de muestra:
        <?php foreach($informe->result() as $row){
         $lugarTomaMuestra = $row->lugarTomaMuestra;
        }  
          echo $lugarTomaMuestra;  
      ?>
      </td>
      <td colspan=6>Fecha de toma de muestra:
        <?php foreach($informe->result() as $row){
         $fechaTomaMuestra = $row->fechaTomaMuestra;
        }  
          echo $fechaTomaMuestra;  
      ?>
      </td> 
    </tr>

      <tr>      
      <td colspan=6>Muestras tomadas por:
        <?php foreach($informe->result() as $row){
         $muestraTomadaPor = $row->muestraTomadaPor;
        }  
          echo $muestraTomadaPor;  
      ?>
      </td>
      <td colspan=6>Fecha de recepcion de las muestras:
        <?php foreach($informe->result() as $row){
         $fechaRecepcionMuestra = $row->fechaRecepcionMuestra;
        }  
          echo $fechaRecepcionMuestra;  
      ?>
      </td> 
    </tr>

    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>

    <br>

    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
  </table>

  <br>

  <table border="1px" style="color:black" id="tabla">

    <tr>
      <td width=858 colspan=6 style='width:643.3pt;border:solid black 1pt'>
        <p class=MsoBodyText2 align=center style='margin-bottom:0cm;margin-bottom:
        .0001pt;text-align:center;line-height:normal'><b><span lang=ES
        style='font-size:14.0pt;font-family:"Calibri","sans-serif"'>CARACTERISTICAS
        DE LA(S) MUESTRA (S):</span></b>
        </p>
        </td>
    </tr>

    <tr style='height:20.0pt'>
      <th width=182 style='width:136.75pt;border:solid black 1px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>DESCRIPCION</span></b></p>
        </th>
      <th width=108 style='width:81.3pt;border:solid black 1px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>TIPO</span></b></p>
        </th>
      <th width=118 style='width:90.8pt;border:solid black 1px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>FECHA Y HORA DE
          TOMA</span></b></p>
      </th>
      <th width=95 style='width:60.9pt;border:solid black 1px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>FECHA DE
          RECEPCION</span></b></p>
      </th>
      <th width=89 style='width:67.1pt;border:solid black 1px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>CODIGO INTERNO</span></b></p>
      </th>
      <th width=250 style='width:6.45cm;border:solid black 1px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:10.0pt;font-family:"Calibri","sans-serif"'>OBSERVACIONES</span></b></p>
      </th>
    </tr>

    
      <?php foreach($informeCaracteristicasMuestra->result() as $row){
      
      echo '<tr><td>'.$row->descripcion.'</td>
      
      <td>
        '.$row->tipo.'
      </td>
      <td>
        '.$row->fechaToma.'
        '.$row->horaToma.'
      </td>
      <td>
        '.$row->fechaHoraRecepcion.'
      </td>
      <td>
        '.$row->codigoInterno.'
      </td>
      <td>
        '.$row->observaciones.'
      </td>
  </tr>';
  }
      ?>

      
     
  </table>

  <br>

  <table  border="1px" style="color:black" id="tabla2">
     <tr style='page-break-inside:avoid;height:22.15pt'>
      <td width=885 colspan=11 style='width:660.2pt;border:solid black 1px'>
        <p class=MsoBodyText2 align=center style='margin-bottom:0cm;margin-bottom:
        .0001pt;text-align:center;line-height:normal'><b><span style='font-size:16.0pt;
        font-family:"Calibri","sans-serif"'>RESULTADOS</span></b>
        </p>
      </td>
    </tr>

    <tr>
      <th width=85 rowspan=2 valign=top style='width:100pt;border:solid black 1px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>FECHA DEL ENSAYO</span></b></p>
      </th>
      <th width=123 rowspan=2 valign=top style='width:92.15pt;border:solid black 1px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>ENSAYO</span></b></p>
      </th>
      <th width=123 rowspan=2 valign=top style='width:92.15pt;border:solid black 1px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>METODO UTILIZADO</span></b></p>
      </th>
      <th width=85 rowspan=2 valign=top style='width:63.75pt;border:solid black 1px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>RANGO PERMITIDO</span></b></p>
      </th>
      <th width=76 rowspan=2 valign=top style='width:2.0cm;border:solid black 1px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>UNIDADES</span></b></p>
      </th>
      <th width=400 colspan=6 valign=top style='width:300pt;border:solid black 2px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>CODIGO INTERNO</span></b></p>
      </th>
    </tr> 

    <tr>
      <th width=66 style='width:49.65pt;border-left:solid black 2px;border-top:solid black 2px;border-bottom:solid black 2px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>XXX-XX</span></b></p>
      </th>
      <th width=66 style='width:49.6pt;border-right:solid black 2px;border-top:solid black 2px;border-bottom:solid black 2px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>U expa</span></b></p>
      </th>
      <th width=66 style='width:49.6pt;border-left:solid black 2px;border-top:solid black 2px;border-bottom:solid black 2px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>XXX-XX</span></b></p>
      </th>
      <th width=66 style='width:49.6pt;border-right:solid black 2px;border-top:solid black 2px;border-bottom:solid black 2px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>U expa</span></b></p>
      </th>
      <th width=66 style='width:49.6pt;border-left:solid black 2px;border-top:solid black 2px;border-bottom:solid black 2px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>XXX-XX</span></b></p>
      </th>
      <th width=66 style='width:49.6pt;border-right:solid black 2px;border-top:solid black 2px;border-bottom:solid black 2px;background:#D9D9D9;'>
        <p class=MsoNormal align=center style='text-align:center'><b><span lang=ES
        style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>U expa</span></b></p>
      </th>
    </tr>

    <tr>
      <?php foreach($informeResultados->result() as $row){
  
      echo'
      <td style="border:1px solid black">
        '.$row->fechaEnsayo.'
      </td>
      <td align= center style="border:1px solid black">
        '.$row->ensayo.'
      </td>
      <td align= center style="border:1px solid black">
        '.$row->metodoUtilizado.'
      </td>
      <td align= center style="border:1px solid black">
        '.$row->rangoPermitido.'
      </td>
      <td align= center style="border:1px solid black">
        '.$row->unidades.'
      </td>
      <td align= center style="border:1px solid black">
        '.$row->xxxXx.'
      </td>
      <td align= center style="border:1px solid black">
        '.$row->uExpa.'
      </td>
      <td align= center style="border:1px solid black">
        '.$row->xxxXx1.'
      </td>
      <td align= center style="border:1px solid black">
        '.$row->uExpa1.'
      </td>
      <td align= center style="border:1px solid black">
        '.$row->xxxXx11.'
      </td>
      <td align= center style="border:1px solid black">
        '.$row->uExpa11.'
      </td>
      </tr> ';
    }
      ?>
    

  </table>

</div>
</div>

	<p>**U expa = Incertidumbre Expandida</p>

	<br>

	<p><STRONG>OBSERVACIONES:</STRONG></p>

	<ul>
		<li>
			<strong>
				El laboratorio NO EMITE OPINIONES NI DECLARACIONES con el cumplimiento o no cumplimiento de los requisitos y/o especificaciones.
			</strong>
		</li>
		<li>
			<strong>
				Los analisis se realizaron basados en procedimientos que se encuentran en el Standard methods for the examination of water and wastewater edicion 22 st. de 2012 y de las Normas tecnicas Colombianas.					
			</strong>
		</li>
		<li>
			Los resultados contenidos en el presente reporte se refieren al momento y condiciones en que se realizaron los ensayos. El laboratorio no se responsabiliza de los perjuicios que puedan derivarse del uso inadecuado de la informacion aqui contenida y de las muestras analizadas.	
		</li>	
		<li>
			Los ensayos fueron realizados en las instalaciones del laboratorio de Analisis de Aguas y Alimentos, bajo sus condiciones ambientales.
		</li>	
		<li>
			Este resultado hace referencia unica y exclusivamente a las muestras analizadas.
		</li>	
		<li>
			Los ensayos microbiologicos son realizados por la Microbiologa (o) con enfasis en alimentos: <strong>NOMBRE</strong>
		</li>
		<li>
			Este reporte expresa fielmente el resultado de los analisis realizados. No podra ser reproducido totalmente, excepto cuando se haya obtenido previamente permiso por escrito del laboratorio. <strong> No se realizan cambios del Informe de Resultados despues de su emision.</strong>
		</li>
	</ul>



</div>