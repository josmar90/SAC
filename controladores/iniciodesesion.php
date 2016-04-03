<?php
//se incluyen los ficheros de los controladores
 
include("usuarios.php"); 

//recibo los datos del formulario de inicio de sesion
$us="admin";
$con="admin";


//creacion de objeto de la clase Informacionusuario.
$usuario= new InformacionUsuario();

//se valida inicio de sesion y se guardan los datos de usuario en el array en un solo procedimiento
$datosusuario = $usuario->iniciodesesion($us,$con);

if($datosusuario=='error'){
echo "error al iniciar sesion";	
}

else{
print_r($datosusuario);	
}
?>