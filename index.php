<!DOCTYPE html>
<html>
<head>
	<title>SAC | Solicitud de aplicaciones corpotarivas</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./estilos/estilosglobal.css">
    <meta name="Description" content="Sistema de solicitud de aplicaciones coorporativas de CANTV Venezuela">
</head>
<?php 
session_start();
//header de gobierno bolivariano
include ("./componentes/header.php");

if(isset($_GET["error"])){
$error=$_GET["error"];
if ($error==1) {
	echo "error en los datos";
}
}

if(isset($_GET["error"])){
$error=$_GET["error"];
if ($error==2) {
	echo "Usuario inactivo";
}
}

?>


<!-- cabecera pagina de bienvenida -->
<div class="bodyheader">
<div class="logo">
	<img src="./img/Cantv_logo.png">
</div>	

<div class="bodytitulo">
<h1>Solicitud de Aplicaciones Corporativas</h1>	

<button class="botontitulo">Registro</button>
</div>


</div>


<body>
<div class="index">

	<img src="./img/TelefonoFijo.png">

		<div class="ingreso">
	        
			<div class="formularioingreso">

			<div class="titulo"> <br><br><h3>Registro para Administradores</h3> </div>
             <br><br><br><br><br><br>

             	<form action="./controladores/iniciodesesion.php" method="post">
             
             	<input type="text" name="usuario" class="inputindex" placeholder="Usuario">
             	<input type="text" name="clave" class="inputindex" placeholder="Contraseña">
             	<input type="submit" name="enviar" value="Iniciar Sesion" class="envio">
             
            	 </form> 
 
             <!--
			<a href="./controladores/iniciodesesion.php" rel="nofolow">iniciar sesion</a>

			<a href="./controladores/registrousuario.php" rel="nofolow">registro</a>

			<a href="./controladores/actualizarusuario.php">actualizar</a>
			-->
			</div>

		</div>
</div>

<div class="banners">
	<div class="banner">
		<img src="./img/Cantv_logo.png">
        <span> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </span>
      <div class="piebanner">
      	
      	<div class="textopiebanner"> <div id="apuntador"></div> <a href="#"> Más Detalles</a></div>

      </div>
	</div>

	<div class="banner">
		<img src="./img/Cantv_logo.png">
        <span> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </span>
       <div class="piebanner">
       	   <div class="textopiebanner"> <div id="apuntador"></div> <a href="#"> Más Detalles</a></div>
       </div>
	</div>

</div>
</body>
<?php

include ("./componentes/footer.php");

?>
</html>