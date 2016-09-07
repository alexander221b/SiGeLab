<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Laboratorio de aguas y alimentos UTP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="\laboratorio\css\bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div id="login-overlay" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="h2" ALIGN="center">Laboratorio de Aguas y Alimentos UTP</div>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-6">
            <p class="lead"><span class="h3">Loguearse</span></p>
              <div class="well">
                <?php 
                  /*Muestra error si el usuario no está registrado*/
                  if (isset($noExisteUsuario)){
                    echo "<label style = color:red>".$noExisteUsuario."</label>";
                  }
                  /*Envía los datos del formulario de logueo a la función "autorizarLogueo" en el controlador "welcome.php"*/
                  echo form_open('welcome/autorizarLogueo'); 
                ?>
                <form class="form-horizontal" novalidate>
                  <div class="control-group">
                    <label for="usuario" class="control-label">Correo Electrónico: </label>
                    <input type="email" class="form-control" id="nombre" name="nombre" required="" title="" placeholder="ejemplo@utp.edu.co" autofocus>
                    <span class="help-block"></span>
                  </div>
                  <div class="form-group">
                    <label for="contrasena" class="control-label">Contraseña: </label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" required="" title="" placeholder="">
                    <span class="help-block"></span>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                </form>
                <?php 
                  echo form_close();
                ?>
              </div> 
              <p class="lead">  <span class="h3">Recuperar Contraseña</span></p>
              <div class="well">
                <?php 
                if (isset($correoEnviado)){
                    echo "<label style = color:green>".$correoEnviado."</label>";
                  }
                if (isset($correoNoEnviado)){
                  echo "<label style = color:red>".$correoNoEnviado."</label>";
                }
                if (isset($correoNoExiste)){
                  echo "<label style = color:red>".$correoNoExiste."</label>";
                }
                /*Se envían los datos del formulario de logueo a la función "autorizarLogueo" en el controlador "welcome.php"*/
                echo form_open('welcome/enviarContrasena'); 
              ?>
                <div class="form-group">
                  <label for="correo" class="control-label">Correo Electrónico:</label>
                  <input type="email" class="form-control" id="correo" name="correo" required="" placeholder="">
                  <span class="help-block"></span>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Enviar</button>
              </div>
              <?php 
                echo form_close();
              ?>
            </div>    
            <div class="col-xs-6">
              <p class="lead">  <span class="h3">Registrar</span></p>
              <div class="well">
                <?php 
                  /*     */
                  if(isset($existeUsuario)){
                    echo "<label style = color:red>".$existeUsuario."</label>";
                  }
                  if (isset($usuarioRegistrado)){
                    echo "<label style = color:green>".$usuarioRegistrado."</label>";
                  }
                  if (isset($noExisteAdmin)){
                    echo "<label style = color:red>".$noExisteAdmin."</label>";
                  }
                ?> 
                <?php 
                  echo form_open('welcome/registrarUsuario'); 
                ?>
                <form id="loginForm">
                  <div class="form-group">
                    <label for="nombreAdmin" class="control-label">Correo del Administrador:</label>
                    <input type="email" class="form-control" id="nombreAdmin" name="nombreAdmin" required title="" placeholder="">
                    <span class="help-block"></span>
                  </div>
                  <div class="form-group">
                    <label for="password" class="control-label">Contraseña:</label>
                    <input type="password" class="form-control" id="contrasenaAdmin" name="contrasenaAdmin" value="" required="" title="" placeholder="">
                    <span class="help-block"></span>
                  </div>
                  <div class="form-group">
                    <label for="username" class="control-label">Correo de Usuario:</label>
                    <input type="email" class="form-control" id="nombreUsuario" name="nombreUsuario" value="" required title="" placeholder="">
                    <span class="help-block"></span>
                  </div>
                  <div class="form-group">
                    <label for="password" class="control-label">Contraseña:</label>
                    <input type="password" class="form-control" id="contrasenaUsuario" name="contrasenaUsuario" value="" required="" title="" placeholder="">
                    <span class="help-block"></span>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                </form>
                <?php 
                  echo form_close();
                ?>
              </div>
              <!--<img src="" align="right" height="60" width="150">-->
          </div>
      </div>
  </div>
</body>
</html>