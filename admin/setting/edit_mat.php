<?php
require_once('../../backend/db.php');


    $id_mat = $_POST['id_mat'];
    $periodo = $_POST['periodoa'];
    $seccion = $_POST['seccion'];
    $grado = $_POST['gradoa'];
    $nivel = $_POST['nivela'];
    $tipo_intsti = $_POST['tipo'];
    $instituto = $_POST['intituto'];

    echo $id_mat, $periodo;
    /*$sql4 = "UPDATE matricula SET paralelo = ?, id_periodo = ?, 
        id_Nivel_Academico = ?, Tipo_institucion = ?, Nombre_insti = ?
        WHERE idmatricula = ?";

    $update4 = $conexion->prepare($sql4);
    $update4->execute([$seccion, $periodo, $nivel, $tipo_intsti, $instituto, $id_mat]);

    if (!$update4) {
        die();
        echo "Error al actualizar";
    }

    echo "success";*/

?>