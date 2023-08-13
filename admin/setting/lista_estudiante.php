<?php
require_once('../../backend/db.php');

$sql=("SELECT idestudiante,nombres, apellidos,cedula,fecha_nacimiento,genero FROM estudiante");
$consulta = $conexion->prepare($sql);
$consulta->execute();

$json= array();
while($row=$consulta->fetch(PDO::FETCH_ASSOC)){
$json[]= array(
'id'=> $row['idestudiante'],
'Nombre_Estudiante'=>$row['nombres'],
'Apellido_Estudiante'=>$row['apellidos'],
'Cedula'=>$row['cedula'],
'fecha_nacimiento'=>$row['fecha_nacimiento'],
'genero'=>$row['genero']
);

};$conexion = null;
$jsonString = json_encode($json);
echo $jsonString;
?>