

<?php
//conexion a la base de datos con mysqli

$conexion = new mysqli("localhost", "root", "", "mydb");
if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
}

?>