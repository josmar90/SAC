

<?php
//conexion a la base de datos con mysqli

$conexion = new mysqli("localhost", "root", "", "sac");
if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
}

//imprime informacion del host de la base de datos.
//echo $conexion->host_info . "\n";
?>