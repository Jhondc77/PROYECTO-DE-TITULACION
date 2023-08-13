<?php
require_once('../../backend/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nivel = $_POST['Nivel'];
    $grado = $_POST['Grado'];
    $paralelo = $_POST['Paralelo'];

    // Validar que al menos $nivel y $grado estén definidos
    if (isset($nivel) && isset($grado)) {
        // Preparar la consulta con marcadores de posición
        $sql = "SELECT idmatricula,num_matricula,estudiante.nombres,estudiante.apellidos,nivel_academico.nombre, periodos.descripcion,grado,paralelo
        FROM matricula
        JOIN estudiante ON matricula.id_estudiante = estudiante.idestudiante
        JOIN periodos ON matricula.id_periodo = periodos.idperiodos
        JOIN nivel_academico ON matricula.id_Nivel_Academico = nivel_academico.idNivelAcademico
        WHERE matricula.id_Nivel_Academico = :nivel AND matricula.grado = :grado ORDER BY idmatricula ASC";

        // Preparar la consulta y vincular los parámetros
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':nivel', $nivel, PDO::PARAM_INT);
        $consulta->bindParam(':grado', $grado, PDO::PARAM_INT);
        $consulta->execute();

        $json1 = array();

        while ($row1 = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $json1[] = array(
                'id_matricula' => $row1['idmatricula'],
                'numero_matricula' => $row1['num_matricula'],
                'nombre_estudiante' => $row1['nombres'],
                'apellido_estudiante' => $row1['apellidos'],
                'nivel_academico' => $row1['nombre'],
                'periodo_academico' => $row1['descripcion'],
                'grado_estudiante' => $row1['grado'],
                'paralalo_estudiante' => $row1['paralelo']
            );
        }

        $jsonString1 = json_encode($json1);
        echo $jsonString1;
    } elseif (isset($paralelo) && isset($nivel) && isset($grado)) {
        // Preparar la consulta con marcadores de posición
        $sql = "SELECT idmatricula,num_matricula,estudiante.nombres,estudiante.apellidos,nivel_academico.nombre, periodos.descripcion,grado,paralelo
        FROM matricula
        JOIN estudiante ON matricula.id_estudiante = estudiante.idestudiante
        JOIN periodos ON matricula.id_periodo = periodos.idperiodos
        JOIN nivel_academico ON matricula.id_Nivel_Academico = nivel_academico.idNivelAcademico
        WHERE matricula.id_Nivel_Academico = :nivel AND matricula.paralelo = :paralelo AND matricula.grado = :grado ORDER BY idmatricula ASC";

        // Preparar la consulta y vincular los parámetros
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':nivel', $nivel, PDO::PARAM_INT);
        $consulta->bindParam(':grado', $grado, PDO::PARAM_INT);
        $consulta->bindParam(':paralelo', $paralelo, PDO::PARAM_STR);
        $consulta->execute();

        $json1 = array();

        while ($row1 = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $json1[] = array(
                'id_matricula' => $row1['idmatricula'],
                'numero_matricula' => $row1['num_matricula'],
                'nombre_estudiante' => $row1['nombres'],
                'apellido_estudiante' => $row1['apellidos'],
                'nivel_academico' => $row1['nombre'],
                'periodo_academico' => $row1['descripcion'],
                'grado_estudiante' => $row1['grado'],
                'paralalo_estudiante' => $row1['paralelo']
            );
        }

        $jsonString1 = json_encode($json1);
        echo $jsonString1;
    }
}


   ?>