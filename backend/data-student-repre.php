<?php
require('db.php');

// Datos estudiantes
$nombre1 = $_POST['primer_nom_student'];
$nombre2 = $_POST['segundo_nom_student'];
$apellidoP = $_POST['apellido_p_student'];
$apellidoM = $_POST['apellido_m_student'];
$cedulaE = $_POST['cedula-student'];
$fecha_nacimiento = $_POST['fecha-nacimiento'];
$genero = $_POST['genero_student'];
$tipo_discapacidad = $_POST['tipo_discapacidad'];
$num_carnet = $_POST['carnet-student'];

// Datos representantes
$nombreR = $_POST['nombre-representante'];
$apellidoR = $_POST['apellido-representante'];
$cedulaR = $_POST['cedula-representante'];
$parentesco = $_POST['parentesco'];
$num_telefono = $_POST['nmro-representante'];
$nivel_formacion = $_POST['nivel-formacion'];
$canton_residencia = $_POST['canton-residencia'];
$direccion_domiciliaria = $_POST['direccion-representante'];
$codigo_postal = $_POST['codigo-postal'];

// Insertar representante

$sql = "INSERT INTO representante (nombres, apellidos, cedula, parentesco, num_telefono, nivel_formacion, canton_residencia, direccion_domiciliaria, codigo_postal) 
  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$sentencia1 = $conexion->prepare($sql);
$sentencia1->execute([$nombreR, $apellidoR, $cedulaR, $parentesco, $num_telefono, $nivel_formacion, $canton_residencia, $direccion_domiciliaria, $codigo_postal]);

// Obtener el id del representante insertado
$representanteId = $conexion->lastInsertId();

// Insertar estudiante
$sql1 = "INSERT INTO estudiante (nombres, apellidos, cedula, fecha_nacimiento, genero, tipo_discapacidad, num_carnet, idrepresentante) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$sentencia = $conexion->prepare($sql1);
$sentencia->execute([$nombre1 . ' ' . $nombre2, $apellidoP . ' ' . $apellidoM, $cedulaE, $fecha_nacimiento, $genero,$tipo_discapacidad, $num_carnet, $representanteId]);

if ($sentencia && $sentencia1) {
  echo "success";
} else {
  echo "error";
}





?>
