<?php
require_once('db.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $descrip_periodo = $_POST['descripcion_periodo'];
    $inicio_periodo = $_POST['inicio_periodo'];
    $fin_periodp = $_POST['fin_periodo'];
    $estado_periodo= $_POST['estado_periodo'];
}
$sql = "INSERT INTO periodos (descripcion,Fecha_Inicio,Fecha_Fin,estado) VALUES ('$descrip_periodo','$inicio_periodo','$fin_periodp','$estado_periodo')";
$sentencia = $conexion->prepare($sql);
$sentencia->execute();

echo"Periodo Guardado Correctamente";



?>