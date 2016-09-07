<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
<title>Laboratorio de Aguas y Alimentos UTP</title>

<link href="\laboratorio\css\normalize.css" rel="stylesheet" >
<link href="\laboratorio\css\fuenteSans.css" rel="stylesheet">
<link href="\laboratorio\css\bootstrap.min.css" rel="stylesheet">

<script src="\laboratorio\js\jquery.min.js"></script>
<script src="\laboratorio\js\bootstrap.min.js"></script>
<script src="\laboratorio\js\prefixfree.min.js"></script>
<script src="\laboratorio\js\index.js"></script>

<style>
.btn { display: inline-block; *display: inline; *zoom: 1; padding: 4px 10px 4px; margin-bottom: 0; font-size: 13px; line-height: 18px; color: #333333; text-align: center;text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75); vertical-align: middle; background-color: #f5f5f5; background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6); background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6)); background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6); background-image: -o-linear-gradient(top, #ffffff, #e6e6e6); background-image: linear-gradient(top, #ffffff, #e6e6e6); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0); border-color: #e6e6e6 #e6e6e6 #e6e6e6; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); border: 1px solid #e6e6e6; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); cursor: pointer; *margin-left: .3em; }
.btn:hover, .btn:active, .btn.active, .btn.disabled, .btn[disabled] { background-color: #e6e6e6; }
.btn-large { padding: 9px 14px; font-size: 15px; line-height: normal; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
.btn:hover { color: #333333; text-decoration: none; background-color: #e6e6e6; background-position: 0 -15px; -webkit-transition: background-position 0.1s linear; -moz-transition: background-position 0.1s linear; -ms-transition: background-position 0.1s linear; -o-transition: background-position 0.1s linear; transition: background-position 0.1s linear; }
.btn-primary, .btn-primary:hover { text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); color: #ffffff; }
.btn-primary.active { color: rgba(255, 255, 255, 0.75); }
.btn-primary { background-color: #4a77d4; background-image: -moz-linear-gradient(top, #6eb6de, #4a77d4); background-image: -ms-linear-gradient(top, #6eb6de, #4a77d4); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#6eb6de), to(#4a77d4)); background-image: -webkit-linear-gradient(top, #6eb6de, #4a77d4); background-image: -o-linear-gradient(top, #6eb6de, #4a77d4); background-image: linear-gradient(top, #6eb6de, #4a77d4); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);  border: 1px solid #3762bc; text-shadow: 1px 1px 1px rgba(0,0,0,0.4); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5); }
.btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] { filter: none; background-color: #4a77d4; }
.btn-block { width: 100%; display:block; }

* { -webkit-box-sizing:border-box; -moz-box-sizing:border-box; -ms-box-sizing:border-box; -o-box-sizing:border-box; box-sizing:border-box; }

html { width: 100%; height:100%; overflow:hidden; }

body { 
	width: 100%;
	height:100%;
	font-family: 'Open Sans', sans-serif;
	background: #222222;
}

.login { 
	position: absolute;
	top: 50%;
	left: 50%;
	margin: -150px 0 0 -150px;
	width:300px;
	height:300px;
}

.login h1 { 
  color: #fff; 
  text-shadow: 0 0 10px rgba(0,0,0,0.3); 
  letter-spacing:1px; 
  text-align:center; 
}

input { 
	width: 100%; 
	margin-bottom: 10px; 
	background: rgba(0,0,0,0.3);
	border: none;
	outline: none;
	padding: 10px;
	font-size: 13px;
	color: #fff;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
	border: 1px solid rgba(0,0,0,0.3);
	border-radius: 4px;
	box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
	-webkit-transition: box-shadow .5s ease;
	-moz-transition: box-shadow .5s ease;
	-o-transition: box-shadow .5s ease;
	-ms-transition: box-shadow .5s ease;
	transition: box-shadow .5s ease;
}

input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }

.modal-backdrop {
   background: black;
}

.modal-header, .modal-footer, .modal-body, h4, .close {
    text-align: center;
  /* 
    background-color: #5cb85c;
    color:white !important;
    font-size: 30px; 
  */  
}
</style>
</head>

<body>
<div class="login">
<h1><img src="\laboratorio\imagenes\LogoSiGeLab.png" s></h1><br>

<?php 
  /* Envía los datos del formulario de logueo a la función "autorizarLogueo" en el controlador "welcome.php" */
  echo form_open('welcome/autorizarLogueo'); 
  /* Muestra error si el usuario no está registrado */
  if (isset($noExisteUsuario)){
    echo " <div class='alert alert-danger'>
           <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
           <strong>".$noExisteUsuario."</strong>
           </div> 
          "; 
  }
  if (isset($existeUsuario)){
    echo " <div class='alert alert-info'>
           <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
           <strong>".$existeUsuario."</strong>
           </div> 
         "; 
  }
if (isset($usuarioRegistrado)){
  echo " <div class='alert alert-success'>
         <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
         <strong>".$usuarioRegistrado."</strong>
         </div> 
        "; 
}
if (isset($noExisteAdmin)){
  echo " <div class='alert alert-danger'>
         <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
         <strong>".$noExisteAdmin."</strong>
         </div> 
        "; 
}
if (isset($correoEnviado)){
  echo " <div class='alert alert-success'>
         <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
         <strong>".$correoEnviado."</strong>
          </div> 
        "; 
}
if (isset($correoNoEnviado)){
echo " <div class='alert alert-danger'>
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong>".$correoNoEnviado."</strong>
       </div> 
     "; 
 }
if (isset($correoNoExiste)){
  echo " <div class='alert alert-warning'>
         <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
         <strong>".$correoNoExiste."</strong>
         </div> 
       "; 
}
if (isset($sesionCerrada)){
  echo " <div class='alert alert-danger'>
         <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
         <strong>".$sesionCerrada."</strong>
         </div> 
       "; 
}
?>

<form method="post">
  <input type="email" id="nombre" name="nombre" required="" title="" placeholder="Correo Electrónico" autofocus/>
  <input type="password" id="contrasena" name="contrasena" required="" title="" placeholder="Contraseña" />
  <button type="submit" class="btn btn-primary btn-block btn-large">Iniciar Sesión</button>
   <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-primary btn-block btn-large" data-toggle="modal" data-target="#myModal"> Registrar Usuario</button>
  <!-- Trigger the modal2 with a button -->
  <button type="button" class="btn btn-primary:active btn-block" data-toggle="modal" data-target="#myModal2">Recuperar Contraseña</button>

</form>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registrar Usuario</h4>
      </div>
      <div class="modal-body">
    <?php 
                  echo form_open('welcome/registrarUsuario'); 
                ?>
                <form id="loginForm">
                  <div class="form-group">
                   
                    <input type="email" class="form-control" id="nombreAdmin" name="nombreAdmin" required title="" placeholder="Correo Administrador">
                    <span class="help-block"></span>
                  </div>
                  <div class="form-group">
                    
                    <input type="password" class="form-control" id="contrasenaAdmin" name="contrasenaAdmin" value="" required="" title="" placeholder="Contraseña">
                    <span class="help-block"></span>
                  </div>
                  <div class="form-group">
                   
                    <input type="email" class="form-control" id="nombreUsuario" name="nombreUsuario" value="" required title="" placeholder="Correo Usuario">
                    <span class="help-block"></span>
                  </div>
                  <div class="form-group">
                   
                    <input type="password" 
                    pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required title="La contraseña debe contener una minúscula una mayúscula y mínimo 8 caracteres" class="form-control" id="contrasenaUsuario" name="contrasenaUsuario" value="" required="" title="" placeholder="Contraseña">
                    <span class="help-block"></span>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                </form>
                <?php 
                  echo form_close();
                ?>
      </div>
    </div>
  </div>
</div>


<?php
  echo form_close();
?>

<!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog">
<div class="modal-dialog modal-sm">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 class="modal-title">Recuperar Contraseña</h4>
</div>

<?php
echo form_open('welcome/enviarContrasena'); 
?>
<div class="modal-body">

<div class="form-group">
  <input type="email" class="form-control" id="correo" name="correo" required="" placeholder="Correo Electrónico">
  <span class="help-block"></span>
</div> 

<button type="submit" class="btn btn-primary btn-block">Enviar</button>
<?php 
echo form_close();
?>
</div> <!-- modal-body -->
</div> <!-- modal-header -->
</div> <!-- modal-content -->
</div> <!-- modal-dialog modal-sm -->
</div> <!-- mymodal -->


</body>
</html>
