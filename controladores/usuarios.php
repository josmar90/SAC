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
                 u.usuario as usuario, u.clave as clave, con.idCondicion as condicion, f.fijo as fijo, f.movil as movil  
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
      if($infousuario->condicion==1){
      //si el usuario se encuentra activado (con autorizacion para ingresar a sistema)
      return $infousuario;}
      else{
      //mensaje de error  si no se encuentra activo el usuario 
      	$infousuario="error2";
        return $infousuario;
      }
        } 
     
}

//cerramos la conexion a la base de datos
$conexion->close();

}//fin metodo de inicio de sesion.


//metodo registro de nuevo usuario
public function registrousuario($varnombres,$varapellidos,$varnacionalidad,$varcedula,$varusuariosap,$varcorreo,$varcontratista,$varduracion,$idcargo,$idcoordinacion,$idsupervisor,$varloginusuario,$varclavelogin,$varcondicion,$vartelefonofijo,$vartelefonomovil){
//incluimos la conexion a la base de datos mysql
include ("conexion.php");

$llamadaregistro= 'CALL REGISTROUSUARIO("'.$varnombres.'","'.$varapellidos.'","'.$varnacionalidad.'","'.$varcedula.'","'.$varusuariosap.'","'.$varcorreo.'","'.$varcontratista.'","'.$varduracion.'",'.$idcargo.','.$idcoordinacion.','.$idsupervisor.',"'.$varloginusuario.'","'.$varclavelogin.'",'.$varcondicion.','.$vartelefonofijo.','.$vartelefonomovil.')';



$conexion->query($llamadaregistro) or die ("error al ingresar nuevo usuario");

$conexion->close();
} //fin metodo registro de usuario. 


//metodo de actualizar datos
function actualizarusuario($id,$nombres,$apellidos,$nacionalidad,$cedula,$usuariosap, $correo, $contratista, $duracion,$cargo
  ,$coordinacion,$supervisor,$usuario,$clave,$estado)
{
   include ("conexion.php");

  $actualizar='CALL ACTUALIZARDATOS('.$id.',"'.$nombres.'","'.$apellidos.'","'.$nacionalidad.'","'.$cedula.'","'.$usuariosap.'","'.$correo.'","'.$contratista.'","'.$duracion.'",'.$cargo.','.$coordinacion.','.$supervisor.',"'.$usuario.'","'.$clave.'",'.$estado.')';
  echo $actualizar; 

  $conexion->query($actualizar) or die("<br>error al actualizar datos");

$conexion->close();
 
}//fin metodo de actualizar usuario



}//fin clase InformacionUsuario

?>