# SiGeLab
PROTOTIPO DE SISTEMA DE REGISTRO DE DATOS Y GENERACIÓN DE INFORMES DEL LABORATORIO DE AGUAS Y ALIMENTOS DE LA UNIVERSIDAD TECNOLÓGICA DE PEREIRA

- Se ha hecho uso de WAMPSERVER

- Para el funcionanmiento del envío de contraseña en caso de perdida se usó Sendmail.
- copiar la carpeta sendmail dentro del wamp
- abrir archivo sendmail.ini
  smtp_server=smtp.gmail.com
  smtp_port=465
  auth_username=tu_nombre_de_usuario@gmail.com
  auth_password=tu_password
- abrir php.ini
  sendmail_path =”C:\wamp\sendmail\sendmail.exe -t”
- reiniciamos wamp
- tener en cuenta los permisos de gmail de aplicaciones menos seguras

- La contraseña y nombre de usuario del administrador se debe crear directamente en la base de datos. En la tabla administrador y usuarios.
