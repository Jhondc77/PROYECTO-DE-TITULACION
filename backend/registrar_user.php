<?php
require('db.php');
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $nombre = $_POST['nombreu'];
    $apellido= $_POST['apellidou'];
    $rol= $_POST['rolu'];
    $usuario= $_POST['usuariou'];
    $contraseña= $_POST['contraseñau'];
   
}

$sql = "SELECT  *FROM user WHERE usuario ='".$_POST['usuariou']."' OR contraseña = '".$_POST['contraseñau']."'";
$consulta = $conexion->prepare($sql);
$consulta->execute();
if($consulta->fetchColumn() > 0){
    $response = ['status'=> 'error', 'message'=> 'El usuario o la contraseña ya existen '];

}else{
    $sql = "INSERT INTO user(nombres,apellidos,usuario,contraseña,tipo_user) values ('$nombre', '$apellido', '$usuario', '$contraseña',$rol)";

    $consulta = $conexion->prepare($sql);
    $consulta->execute();
    $response = ['status'=> 'success', 'message'=> 'Usuario Registrado Exitosamente'];  
}

header('Content-Type: application/json');
echo json_encode($response);




    


?>