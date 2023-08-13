<?php
require_once('../../backend/db.php');


if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql3 ="DELETE FROM user WHERE idtuser = '$id'";
    $sentencia3 = $conexion->prepare($sql3);
    $sentencia3->execute();
    if(!$sentencia3){
        die("error de eliminacion");
    } 
    echo"eliminado satisfacoriamente";
}

?>