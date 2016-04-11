<?php
//se incluyen los ficheros de los controladores
 
include("usuarios.php"); 

//recibo los datos del formulario de inicio de sesion
$us = $_POST["usuario"];
$con = $_POST["clave"];


//creacion de objeto de la clase Informacionusuario.
$usuario= new InformacionUsuario();

//se valida inicio de sesion y se guardan los datos de usuario en el array en un solo procedimiento
$datosusuario = $usuario->iniciodesesion($us,$con);

//error cuando el usuario no existe en el sistema
if($datosusuario=='error'){
header('location:../index.php?error=1');	
}

//error cuando el usuario existe pero aun no tiene autorizacion para ingresar al sistema
else if($datosusuario=='error2'){
header('location:../index.php?error=2');	
}

//usuario existe y posee autorizacion para ingresar al sistema
else{

$_session["datoslogin"]=$datosusuario;

}
?>