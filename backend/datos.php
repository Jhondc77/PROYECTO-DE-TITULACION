<?php
require_once('db.php');

$queryEstudiantes = $conexion->query("SELECT COUNT(*) FROM estudiante")->fetchColumn();
  $queryMatriculas = $conexion->query("SELECT COUNT(*) FROM matricula")->fetchColumn();
  $queryRepresentantes = $conexion->query("SELECT COUNT(*) FROM representante")->fetchColumn();
  
  header('Content-Type: application/json');
  echo json_encode([
    'estudiantes' => $queryEstudiantes,
    'matriculas' => $queryMatriculas,
    'representantes' => $queryRepresentantes
  ]);
?>