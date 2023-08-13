<?php
require('../library/fpdf/fpdf.php');
require('../backend/db.php');

$id = $_POST['id'];
$sql2 = "SELECT m.idmatricula, m.num_matricula, e.nombres, e.apellidos, e.cedula, e.fecha_nacimiento, e.tipo_discapacidad,
na.nombre as nivel_academico, p.descripcion as periodo, m.grado, m.paralelo,
r.nombres as nombre_representante, r.canton_residencia, r.direccion_domiciliaria, r.cedula as cedula_representante, r.num_telefono
FROM matricula m
JOIN estudiante e ON m.id_estudiante = e.idestudiante
JOIN periodos p ON m.id_periodo = p.idperiodos
JOIN nivel_academico na ON m.id_Nivel_Academico = na.idNivelAcademico
LEFT JOIN representante r ON e.idrepresentante = r.idrepresentante
WHERE m.idmatricula = '$id';";

$sentencia = $conexion->prepare($sql2);
$sentencia->execute();

if (!$sentencia) {
    die("error de select");
}

$pdf = new FPDF();
$pdf->AddPage();


// Configurar fuente y tamaño de fuente
$pdf->SetFont('Arial', 'B', 10);

// Definir ancho de columnas y alto de celdas
$columnWidth = 30;
$cellHeight = 10;

$img ='../img/logo.png';
$x = 150; // Coordenada X
$y = 10; // Coordenada Y
$ancho = 40; // Ancho de la imagen
$alto = 40; // Altura de la imagen (0 para ajustar proporcionalmente)

$a= 150;
$b = 5;

$text = 'UNIDAD EDICATIVA "EL LAUREL"';
$text2 = 'NIVEL DE EDUCACION BASICA:';
$text3 = 'GRADO DE EDUCACION BASICA:';
$pdf->SetFont('TIMES','B', 14);
// Generar contenido de la tabla
foreach ($sentencia as $row) {
    //$pdf->Cell(10, 10,'1' /*$row['idmatricula']*/,1,0,'C');
    $pdf->Image($img, $x, $y, $ancho, $alto);
    $pdf->Cell(0.5,20,$text,'C');
    $pdf->Cell(0.5,35,$text2.' '.$row['nivel_academico'],'c');
    $pdf->Cell(0.5,50,$text3.' '.$row['grado'],'c');
    $pdf->Cell(0.5,65,$row['periodo'],'C');

    // Agregar la imagen al PDF
    $pdf->SetFont('TIMES','',12);
//$pdf->Cell($columnWidth, $cellHeight, /*$row['num_matricula']*/);
$pdf->Cell(0.5, 100, 'Numero de Matricula:'.' '.$row['num_matricula'],'C');
$pdf->Cell(0.5, 115, 'Nombre:'.' '.$row['nombres'],'C');
$pdf->Cell(0.5, 130, 'Apellido:'.' '.$row['apellidos'],'C');
$pdf->Cell(0.5, 145, 'Cedula:'.' '.$row['cedula'],'C');
$pdf->Cell(0.5, 160, 'Fecha de nacimiento:'.' '.$row['fecha_nacimiento'],'C');

$pdf->SetFont('TIMES','B', 14);
$pdf->Cell(0.5, 185, 'DATOS DEL REPRESENATE');

$pdf->SetFont('TIMES','',12);
$pdf->Cell(0.5, 200, 'Nombre:'.' '.$row['nombre_representante']);
$pdf->Cell(0.5, 215, 'Cedula:'.' '.$row['cedula_representante']);
$pdf->Cell(0.5, 230, 'Canton:'.' '.$row['canton_residencia']);
$pdf->Cell(0.5, 245, 'Direccion:'.' '.$row['direccion_domiciliaria']);
$pdf->Cell(0.5, 260, 'Telefono:'.' '.$row['num_telefono']);


//$pdf->Cell($columnWidth, $cellHeight, /*$row['descripcion']*/);
//$pdf->Cell(25, 10, 'Secundaria'/*$row['grado']*/);
//$pdf->Cell(20, 10, 'A'/*$row['paralelo']*/);
}

// Salida del archivo PDF
$pdf->Output();
?>











    
    

?>