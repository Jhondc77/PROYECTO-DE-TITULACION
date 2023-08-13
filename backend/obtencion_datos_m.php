<?php
require_once('db.php');

if (isset($_POST['dato'])) {
   $campo1 = $_POST['dato'];

   // Procesar los datos 1 y generar una respuesta

    $sql = ("SELECT idestudiante,nombres,apellidos,fecha_nacimiento from estudiante where cedula = '$campo1'");
    $consulta = $conexion->prepare($sql);
    $consulta->execute();

    $json = array(); // Declara el array fuera del if para que exista incluso si no hay resultados

    if($consulta->rowCount() > 0){ // Usa rowCount() en lugar de fetchRow
      while($row = $consulta->fetch(PDO::FETCH_ASSOC)){
        $json[] = array(
          'id_estudiante' => $row['idestudiante'],
          'nombre' => $row['nombres'],
          'apellido' =>  $row['apellidos'],
          'fecha' => $row['fecha_nacimiento']
        );
      }

      // Check if the student is enrolled in the 'matricula' table
      $idEstudiante = $json[0]['id_estudiante'];
      $sqlMatricula = ("SELECT * from matricula where id_estudiante = '$idEstudiante'");
      $consultaMatricula = $conexion->prepare($sqlMatricula);
      $consultaMatricula->execute();

      $jsonMatricula = array();
      if($consultaMatricula->rowCount() > 0){
        $jsonMatricula[] = array('matriculado' => true);
      } else {
        $jsonMatricula[] = array('matriculado' => false);
      }

      // Merge the data from 'estudiante' and 'matricula' tables
      $jsonResult = array_merge($json[0], $jsonMatricula[0]);
      $jsonString = json_encode($jsonResult); // Encode the merged array
      echo $jsonString;
    } else {
      echo json_encode(array('error' => 'Estudiante no encontrado'));
    }
}



/*require_once('db.php');

if (isset($_POST['dato'])) {
   $campo1 = $_POST['dato'];
   
   // Procesar los datos 1 y generar una respuesta
 

    $sql = ("SELECT idestudiante,nombres,apellidos,fecha_nacimiento from estudiante where cedula = '$campo1'");
     $consulta = $conexion->prepare($sql);
     $consulta->execute();

     if($consulta->fetchRow >0){
      $json = array(); 
     
     while($row = $consulta->fetch(PDO::FETCH_ASSOC)){
       $json[] = array(
        'id_estudiante' => $row['idestudiante'],
         'nombre' => $row['nombres'],
        'apellido' =>  $row['apellidos'],
        'fecha' => $row['fecha_nacimiento']
       );
        
     };
        
     }
     
     
     $jsonString =json_encode($json[0]);
     echo $jsonString;

     };*/
     
     


 
?>