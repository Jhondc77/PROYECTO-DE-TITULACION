<?php
require_once('db.php');
sleep(2);
$user = $_POST['login-user'];
$password =$_POST['login-password'];

$sql =("SELECT usuario,tipo_user FROM user
where usuario = '".$_POST['login-user']."'
AND contraseña = '".$_POST['login-password']."'");

$sentencia = $conexion->prepare($sql);
$sentencia->execute();

if($sentencia->rowCount() == 1){
$datos = $sentencia->fetch(PDO::FETCH_ASSOC);
echo json_encode(array ('error' => false, 'tipo' => $datos['tipo_user']));
session_start();
$_SESSION['Usuario']= $_POST['login-user'];
$_SESSION['tipo']= $datos['tipo_user'];


}
else{
    echo json_encode(array('error' => true));
}



?>