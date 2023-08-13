<?php
require_once('../../backend/db.php');

$queryEstudiantes = $conexion->query("SELECT COUNT(*) FROM estudiante")->fetchColumn();
  $queryMatriculas = $conexion->query("SELECT COUNT(*) FROM matricula")->fetchColumn();
  $queryRepresentantes = $conexion->query("SELECT COUNT(*) FROM representante")->fetchColumn();

  echo json_encode([
    'estudiante' => $queryEstudiantes,
    'matricula' => $queryMatriculas,
    'representante' => $queryRepresentantes
  ]);
?>