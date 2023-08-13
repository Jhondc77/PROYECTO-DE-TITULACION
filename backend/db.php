<?php
$servidor= "localhost";
$user = "root";
$password= "4321";
$db= "uel-matricula";

try{

    $conexion= new pdo("mysql:host=$servidor; dbname=$db", $user,$password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $error){
    echo"error de conexion".$error;

}
?>