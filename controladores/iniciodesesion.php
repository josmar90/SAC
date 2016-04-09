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

//error cuando el usuario no existe en el sistema
if($datosusuario=='error'){
echo "error al iniciar sesion";	
}

//error cuando el usuario existe pero aun no tiene autorizacion para ingresar al sistema
else if($datosusuario=='error2'){
echo "error usuario sin acceso valido";	
}

//usuario existe y posee autorizacion para ingresar al sistema
else{
print_r($datosusuario);	

}
?>