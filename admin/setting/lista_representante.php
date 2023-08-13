<?php
require_once('../../backend/db.php');

$sql = ("SELECT idrepresentante, nombres, apellidos, cedula, num_telefono, canton_residencia, direccion_domiciliaria FROM representante ");

$consulta = $conexion->prepare($sql);
$consulta->execute();

$json = array();

while($row = $consulta->fetch(PDO::FETCH_ASSOC)){
$json []= array(
'idRepresentante' => $row['idrepresentante'],
'nombre_representante'=>$row['nombres'],
'apellido_representante'=>$row['apellidos'],
'cedula_representante'=>$row ['cedula'],
'telefono_representante'=>$row ['num_telefono'],
'canton_residencia'=>$row ['canton_residencia'],
'direccion_domiciliaria'=>$row ['direccion_domiciliaria']

);
};
$conexion = null;
$jsonString = json_encode($json);
echo $jsonString;

?>