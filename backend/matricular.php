<?php
require_once ('db.php');

$cedula = $_POST['cedula_estudiante']; 
$TipoMatricula = $_POST['tipo_matricula'];
$grado = $_POST['grado_academico'];
$paralelo = $_POST['paralelo'];
$TipoInstitucion = $_POST['tipo_instituto'];
$NombreInstituto = $_POST['nombre_instituto'];
$periodo = $_POST['selectPeriodo'];

$sql1 = "SELECT idestudiante FROM estudiante WHERE cedula = :cedula";
$id = $conexion->prepare($sql1);
$id->bindParam(':cedula', $cedula);
$id->execute();

$row = $id->fetch(PDO::FETCH_ASSOC);
$datoid = $row['idestudiante'];

/*$sql1 = "SELECT idperiodos FROM periodos";
$idp = $conexion->prepare($sql1);
$idp->execute();*/

/*$row2 = $idp->fetch(PDO::FETCH_ASSOC);
$datoidp = $row2['idperiodos'];*/

$prefijo = "UEDL";
$numeroMatricula = $prefijo . uniqid();

$sql = "SELECT * FROM matricula 
        INNER JOIN estudiante ON matricula.id_estudiante = estudiante.idestudiante 
        WHERE estudiante.cedula = :cedula";

$consulta = $conexion->prepare($sql);
$consulta->bindParam(':cedula', $cedula, PDO::PARAM_STR);
$consulta->execute();

if ($consulta->rowCount() > 0) {
    // El estudiante está matriculado
    die();
    echo "Estudiante ya esta matriculado";
} else{
$sql1 = "INSERT INTO matricula (num_matricula, id_estudiante, grado, paralelo, id_periodo, id_Nivel_Academico, Tipo_institucion, Nombre_insti) VALUES (:num_matricula, :id_estudiante, :grado, :paralelo, :id_periodo, :id_Nivel_Academico, :Tipo_institucion, :Nombre_insti)";

$sentencia = $conexion->prepare($sql1);
$sentencia->bindParam(':num_matricula', $numeroMatricula);
$sentencia->bindParam(':id_estudiante', $datoid);
$sentencia->bindParam(':grado', $grado);
$sentencia->bindParam(':paralelo', $paralelo);
$sentencia->bindParam(':id_periodo', $periodo);
$sentencia->bindParam(':id_Nivel_Academico', $TipoMatricula);
$sentencia->bindParam(':Tipo_institucion', $TipoInstitucion);
$sentencia->bindParam(':Nombre_insti', $NombreInstituto);

if ($sentencia->execute()) {
   echo "Estudiante matriculado exitosamente";
} else {
   echo "Error al matricular al estudiante";
}
}

?>