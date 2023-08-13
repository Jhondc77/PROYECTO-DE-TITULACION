<?php
require_once('../../backend/db.php');

if (isset($_POST['id_edit'])) {
    $id = $_POST['id_edit'];
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha = $_POST['fecha'];
    $genero = $_POST['genero'];
    $tipo_discapacidad = $_POST['tipo_discapacidad'];
    $carnet = $_POST['carnet'];

    $sql = "UPDATE estudiante SET nombres = ?, 
        apellidos = ?, cedula = ?, fecha_nacimiento = ?,
        genero = ?, tipo_discapacidad = ?, num_carnet = ?
        WHERE idestudiante = ?";

    $update = $conexion->prepare($sql);
    $update->execute([$nombre, $apellido, $cedula, $fecha, $genero, $tipo_discapacidad, $carnet, $id]);

    if (!$update) {
        die();
        echo "Error al actualizar";
    }

    echo "Actualización Completa";
}

if (isset($_POST['id_edit_repre'])) {
    $id_repre = $_POST['id_edit_repre'];
    $nombre_repre = $_POST['nombre_repre'];
    $apellido_repre = $_POST['apellido_repre'];
    $cedula_repre = $_POST['cedula_repre'];
    $telefono = $_POST['telefono'];
    $parentesco = $_POST['parentesco'];
    $formacion = $_POST['formacion'];
    $direccion = $_POST['direccion'];
    $canton = $_POST['canton'];
    $postal = $_POST['postal'];

    $sql1 = "UPDATE representante SET nombres = ?, 
        apellidos = ?, cedula = ?, parentesco = ?,
        num_telefono = ?, nivel_formacion = ?, canton_residencia = ?,
        direccion_domiciliaria = ?, codigo_postal = ?
        WHERE idrepresentante = ?";

    $update1 = $conexion->prepare($sql1);
    $update1->execute([$nombre_repre, $apellido_repre, $cedula_repre, $parentesco,
        $telefono, $formacion, $canton, $direccion, $postal, $id_repre]);

    if (!$update1) {
        die();
        echo "Error al actualizar";
    }

    echo "Actualización Completa Representante";
}

if (isset($_POST['id_mat'])) {
    $id_mat = $_POST['id_mat'];
    $periodo = $_POST['periodoa'];
    $seccion = $_POST['seccion'];
    $grado = $_POST['gradoa'];
    $nivel = $_POST['nivela'];
    $tipo_intsti = $_POST['tipo'];
    $instituto = $_POST['intituto'];

    // Consulta para obtener el ID de nivel académico
    $sql3 = "SELECT na.idNivelAcademico
             FROM matricula m
             INNER JOIN nivel_academico na ON m.id_Nivel_Academico = na.idNivelAcademico
             WHERE m.idmatricula = :id_mat";

    $consulta = $conexion->prepare($sql3);
    $consulta->bindParam(':id_mat', $id_mat, PDO::PARAM_INT);
    $consulta->execute();

    // Obtener el ID de nivel académico
    $idn = $consulta->fetch(PDO::FETCH_ASSOC)['idNivelAcademico'];

    // Actualizar la tabla matricula
    $sql4 = "UPDATE matricula SET paralelo = :seccion,
             id_Nivel_Academico = :idn, Tipo_institucion = :tipo_intsti, Nombre_insti = :instituto
             WHERE idmatricula = :id_mat";

    $update4 = $conexion->prepare($sql4);
    $update4->bindParam(':seccion', $seccion, PDO::PARAM_STR);
    $update4->bindParam(':idn', $idn, PDO::PARAM_INT);
    $update4->bindParam(':tipo_intsti', $tipo_intsti, PDO::PARAM_STR);
    $update4->bindParam(':instituto', $instituto, PDO::PARAM_STR);
    $update4->bindParam(':id_mat', $id_mat, PDO::PARAM_INT);

    if ($update4->execute()) {
        echo "success";
    } else {
        echo "Error al actualizar";
    }
}






/*if(isset($_POST['id_edit'])){
$id=$_POST['id_edit'];
$cedual= $_POST['cedula'];
$nombre=$_POST['nombre'];
$apellido= $_POST['apellido'];
$fecha= $_POST['fecha'];
$genero= $_POST['genero'];
$tipo_discapacidad=$_POST['tipo_discapacidad'];
$carnet=$_POST['carnet'];

$sql = ("UPDATE estudiante SET nombres='$nombre', 
apellidos='$apellido', cedula='$cedual', fecha_nacimiento='$fecha'
,genero='$genero', tipo_discapacidad='$tipo_discapacidad'
, num_carnet='$carnet' WHERE idestudiante = '$id'");

$update = $conexion->prepare($sql);
$update->execute();
if(!$update){
    die();
    echo "Error al actualizar";

}
echo "Actualizacion Completa";
}
if(isset($_POST['id_edit_repre'])){
    $id_repre = $_POST['id_edit_repre'];
    $nombre_repre = $_POST['nombre_repre'];
    $apellido_repre = $_POST['apellido_repre'];
    $cedula_repre = $_POST['cedula_repre'];
    $telefono = $_POST['telefono'];
    $parentesco = $_POST['parentesco'];
    $formacion = $_POST['formacion'];
    $direccion = $_POST['direccion'];
    $canton = $_POST['canton'];
    $postal = $_POST['postal'];

    


$sql1 = ("UPDATE representante SET nombres='$nombre_repre', 
    apellidos='$apellido_repre', cedula='$cedula_repre', parentesco='$parentesco'
    ,num_telefono='$telefono',nivel_formacion='$formacion', canton_residencia='$canton'
    , direccion_domiciliaria='$direccion',codigo_postal='$postal' WHERE idrepresentante = '$id_repre'");
    
    $update1 = $conexion->prepare($sql1);
    $update1->execute();
    if(!$update1){
        die();
        echo "Error al actualizar";
    
    }
    echo "Actualizacion Completa Representante";


}if(isset($_POST['id_mat'])){
    $id_mat = $_POST['id_mat'];
    $periodo = $_POST['periodoa'];
    $seccion = $_POST['seccion'];
    $grado = $_POST['gradoa'];
    $nivel = $_POST['nivela'];
    $tipo_intsti = $_POST['tipo'];
    $instituto = $_POST['intituto'];

    

    $sql3 =("SELECT na.nombre
    FROM matricula m
    INNER JOIN nivel_academico na ON m.id_Nivel_Academico = na.idNivelAcademico
    WHERE m.idmatricula = '$id_mat';");

    $consulta = $conexion->prepare($sql3);
    $consulta->execute();

    $sql4 = ("UPDATE matricula SET paralelo = '$seccion', id_periodo = '$periodo'
    , id_Nivel_Academico = '$nivel',Tipo_institucion = '$tipo_intsti',Nombre_insti = '$instituto' 
    WHERE idmatricula = '$id_mat'");

    $update4 = $conexion->prepare($sql4);
    $update4->execute();

    if(!$update4){
        die();
        echo "Error al actualizar";
    
    }
    echo "Actualizacion Completa Matricula";


}*/

?>