<?php

//clase que contiene toda la información de usuario
class InformacionUsuario 
{
	private $id,$nombres,$apellidos,$nacionalidad,$cedula,$usuariosap, $correo, $contratista, $duracion,$cargo,$telefono
	,$coordinacion,$supervisor,$usuario,$clave,$estado;
	
	function __construct()
	{
	}

//metodo para iniciar sesion en el sistema (carga los datos de usuario en variables de sesion para su uso en todo el sistema)
public function iniciodesesion($usuario,$contraseña){

//incluimos la conexion a la base de datos mysql
include ("conexion.php");
//query para obtener si el usuario existe en la base de datos (se encuentra registrado)
$queryusuarios="SELECT u.idusuario as id,u.nombres as nombres, u.apellidos as apellidos, u.nacionalidad as nacionalidad,
                u.cedula as cedula, u.usuariosap as usariosap, u.correo as correo, u.contratista as contratista, 
                u.duracion as dcontrato, c.nombre as cargo, cr.nombre as coordinacion, u.usuario_idusuario as supervisor,
                 u.usuario as usuario, u.clave as clave, con.nombre as condicion 
                       FROM usuario u join telefono f on(u.idusuario=f.usuario_idusuario)
                                      join cargo c on(u.cargo_idcargo=c.idcargo) 
                                      join condicion con on(u.Condicion_idCondicion=con.idCondicion)
                                      join coordinacion cr on(u.coordinacion_idcoordinacion=cr.idcoordinacion)
                                      Where usuario='".$usuario."' and clave='".$contraseña."'";

//llamada de consulta a la base de datos a la tabla usuario.
$resultado=$conexion->query($queryusuarios);


//validacion de que el usuario existe en la base de datos  
//si la cantidad de filas devueltas en la consulta es 0 el usuario no exite
if($resultado->num_rows == 0){

$infousuario="error";
return $infousuario;
}

//en caso de que exista
else{

//echo de prueba para la validacion 	


 while($infousuario = $resultado->fetch_object()){ 
      //retorno toda la informacion del usuario en un array solo si se encuentra 
      //activado el inicio de sesion
      
      if($infousuario->condicion=='Activo'){
      return $infousuario;}
      else{
      	$infousuario="error";
        return $infousuario;
      }
        } 


     
}

//cerramos la conexion a la base de datos
$conexion->close();

}//fin metodo de inicio de sesion.


}

?>