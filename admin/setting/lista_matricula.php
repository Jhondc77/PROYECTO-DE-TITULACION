<?php
require_once('../../backend/db.php');
$sql2 ="SELECT idmatricula,num_matricula,estudiante.nombres,estudiante.apellidos,nivel_academico.nombre, periodos.descripcion,grado,paralelo
FROM matricula 
JOIN estudiante ON matricula.id_estudiante = estudiante.idestudiante
JOIN periodos ON matricula.id_periodo = periodos.idperiodos
JOIN nivel_academico ON matricula.id_Nivel_Academico = nivel_academico.idNivelAcademico ORDER BY idmatricula  ;";

$sentencia1= $conexion->prepare($sql2);
$sentencia1->execute();

if(!$sentencia1){
    die("erro de select");
}
$json = array();
while($row = $sentencia1->fetch(PDO::FETCH_ASSOC)){

$json[]= array(
    'id_matricula'=> $row['idmatricula'],
    'numero_matricula'=>$row['num_matricula'],
    'nombre_estudiante'=>$row['nombres'],
    'apellido_estudiante'=>$row['apellidos'],
    'nivel_academico'=>$row['nombre'],
    'periodo_academico'=>$row['descripcion'],
    'grado_estudiante'=>$row['grado'],
    'paralalo_estudiante'=>$row['paralelo']

);
}
$jsonString=json_encode($json);
echo $jsonString;






?>