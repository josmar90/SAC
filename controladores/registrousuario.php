<?php
//se incluyen los ficheros de los controladores
 
include("usuarios.php"); 



//creacion de objeto de la clase Informacionusuario.
$usuario= new InformacionUsuario();

//se realiza un llamado al procedimiento que carga los datos en la base de datos
$datosusuario = $usuario->registrousuario('Administrador','Administrador','V','1234','codigosap','Administrador@SAC','NULL','NULL',1,2,'NULL','admin','admin',1,'027612231231','0414222222');


?>