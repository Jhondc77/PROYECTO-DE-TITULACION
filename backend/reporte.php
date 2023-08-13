<?php
require('../library/fpdf/fpdf.php');
require('../backend/db.php');


$sql2 ="SELECT idmatricula,num_matricula,estudiante.nombres,estudiante.apellidos,nivel_academico.nombre, periodos.descripcion,grado,paralelo
FROM matricula 
JOIN estudiante ON matricula.id_estudiante = estudiante.idestudiante
JOIN periodos ON matricula.id_periodo = periodos.idperiodos
JOIN nivel_academico ON matricula.id_Nivel_Academico = nivel_academico.idNivelAcademico ORDER BY idmatricula;";

$sentencia1= $conexion->prepare($sql2);
$sentencia1->execute();

if(!$sentencia1){
    die("erro de select");
}


$pdf = new FPDF();
$pdf->AddPage();


$img ='../img/logo.png';
$x = 150; // Coordenada X
$y = 10; // Coordenada Y
$ancho = 40; // Ancho de la imagen
$alto = 40; // Altura de la imagen (0 para ajustar proporcionalmente)



$text = 'UNIDAD EDICATIVA "EL LAUREL"';
$text2 = 'REPORTE TOTAL DE ESTUDANTES MATRICULADOS';



$pdf->SetFont('TIMES','B', 14);
$pdf->Image($img, $x, $y, $ancho, $alto);
$pdf->Cell(0.5,20,$text,'C');
$pdf->Cell(0.5,35,$text2,'C');
$pdf->Ln();
// Configurar fuente y tamaño de fuente
$pdf->SetFont('Arial', 'B', 10);

// Definir ancho de columnas y alto de celdas
$columnWidth =30;
$cellHeight = 10;

// Generar encabezados de la tabla
$pdf->Cell(10, 10, 'ID', 1, 0, 'C');
$pdf->Cell($columnWidth, $cellHeight, 'Num Matricula', 1, 0, 'C');
$pdf->Cell(20, 10,'Nombres', 1, 0, 'C');
$pdf->Cell($columnWidth, $cellHeight, 'Apellidos', 1, 0, 'C');
$pdf->Cell($columnWidth, $cellHeight, 'Nivel Academico', 1, 0, 'C');
$pdf->Cell($columnWidth, $cellHeight, 'Periodo', 1, 0, 'C');
$pdf->Cell(25, 10, 'Grado', 1, 0, 'C');
$pdf->Cell(20, 10, 'Paralelo', 1, 1, 'C');

$pdf->SetFont('Arial', '', 8);
// Generar contenido de la tabla
foreach ($sentencia1 as $row) {
    $pdf->Cell(10, 10, $row['idmatricula'], 1, 0, 'C');
    $pdf->Cell($columnWidth, $cellHeight, $row['num_matricula'], 1, 0, 'C');
    $pdf->Cell(20, 10, $row['nombres'], 1, 0, 'C');
    $pdf->Cell($columnWidth, $cellHeight, $row['apellidos'], 1, 0, 'C');
    $pdf->Cell($columnWidth, $cellHeight, $row['nombre'], 1, 0, 'C');
    $pdf->Cell($columnWidth, $cellHeight, $row['descripcion'], 1, 0, 'C');
    $pdf->Cell(25, 10, $row['grado'], 1, 0, 'C');
    $pdf->Cell(20, 10, $row['paralelo'], 1, 1, 'C');
};

// Salida del archivo PDF
$pdf->Output();




?>