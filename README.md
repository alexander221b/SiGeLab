# SiGeLab
PROTOTIPO DE SISTEMA DE REGISTRO DE DATOS Y GENERACIÓN DE INFORMES DEL LABORATORIO DE AGUAS Y ALIMENTOS DE LA UNIVERSIDAD TECNOLÓGICA DE PEREIRA

- Se a hecho uso del entorno de desarrollo WAMPSERVER 5.5.12, el framework php CODEIGNITER y el framework front-end BOOTSTRAP. Como navegador predeterminado se usó GOOGLE CHROME.

- Para el funcionanmiento del envío de contraseña en caso de pérdida se usó Sendmail.
- Copiar la carpeta sendmail dentro del wamp.
- Abrir archivo sendmail.ini y configurar:
  - smtp_server=smtp.gmail.com
  - smtp_port=465
  - auth_username = tu_nombre_de_usuario@gmail.com
  - auth_password = tu_password
- Abrir php.ini y configurar:
  - sendmail_path =”C:\wamp\sendmail\sendmail.exe -t”
- Reiniciar WAMPSERVER.
- Tener en cuenta los permisos de GMAIL de aplicaciones menos seguras.

- La contraseña y nombre de usuario del administrador se debe crear directamente en la base de datos. En la tabla ADMINISTRADOR y USUARIOS.
