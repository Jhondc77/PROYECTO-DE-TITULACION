<?php
require_once('db.php');
 $id= $_POST['id'];
 
 $sql = ("SELECT m.idmatricula, m.num_matricula, e.nombres AS nombres_estudiante, 
 e.apellidos AS apellidos_estudiante, r.nombres AS nombres_representante, 
 r.apellidos AS apellidos_representante, r.cedula AS cedula_representante, 
 r.parentesco AS parentesco_representante, r.num_telefono AS numTelefono_representante,
  r.canton_residencia AS canton_representante, r.direccion_domiciliaria AS direccion_representante
 FROM matricula m
 JOIN estudiante e ON m.id_estudiante = e.idestudiante
 JOIN representante r ON e.idrepresentante = r.idrepresentante
 WHERE m.idmatricula = '$id'
 
 ");

// Prepara la consulta
$stmt = $conexion->prepare($sql);
$stmt->execute();

$json = array();

while($resultado = $stmt->fetch(PDO::FETCH_ASSOC)){
$json[] = array(
'idmatricula'=> $resultado['idmatricula'],
'numMatricula'=> $resultado['num_matricula'],
'nombreEstudiante'=>$resultado['nombres_estudiante'],
'apellidosEstudiante' => $resultado['apellidos_estudiante'],
'nombresRepresentante' => $resultado['nombres_representante'],
'apellidosRepresentante' => $resultado['apellidos_representante'],
'cedulaRepresentante' => $resultado['cedula_representante'],
'parentescoRepresentante' => $resultado['parentesco_representante'],
'numTelefonoRepresentante' => $resultado['numTelefono_representante'],
'cantonRepresentante' => $resultado['canton_representante'],
'direccionRepresentante' => $resultado['direccion_representante']


);

};
$jsonString = json_encode($json);
echo $jsonString;


?>