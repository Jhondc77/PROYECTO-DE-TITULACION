<?php
require_once('../../backend/db.php');
if(isset($_POST['idm'])){
$idm =$_POST['idm'];

$sql =("DELETE FROM matricula WHERE idmatricula = '$idm';");
 $delete = $conexion->prepare($sql);
 $delete->execute();

 if(!$delete){
    die("Error al eliminar los datos");
 }
 echo("Datos eliminados exitosamente");
}
if(isset($_POST['id_delete_student'])) {
   $cedulaEstudiante = $_POST['id_delete_student'];

   // Obtener el idrepresentante relacionado con la cédula del estudiante
   $sqlGetIdRepresentante = "SELECT idrepresentante FROM estudiante WHERE idestudiante = :cedulaEstudiante";
   $consultaIdRepresentante = $conexion->prepare($sqlGetIdRepresentante);
   $consultaIdRepresentante->bindParam(':cedulaEstudiante', $cedulaEstudiante, PDO::PARAM_STR);
   $consultaIdRepresentante->execute();

   // Verificar si se encontró el idrepresentante
   if ($row = $consultaIdRepresentante->fetch(PDO::FETCH_ASSOC)) {
       $idRepresentante = $row['idrepresentante'];
       echo json_encode ($idRepresentante);

       // Eliminar registro en la tabla 'representante' con el idrepresentante especificado
       $sqlDeleteRepresentante = "DELETE FROM representante WHERE idrepresentante = :idRepresentante";
       $deleteRepresentante = $conexion->prepare($sqlDeleteRepresentante);
       $deleteRepresentante->bindParam(':idRepresentante', $idRepresentante, PDO::PARAM_INT);
       $deleteRepresentante->execute();

       // Eliminar registro en la tabla 'estudiante' con la cédula proporcionada
       $sqlDeleteEstudiante = "DELETE FROM estudiante WHERE cedula = :cedulaEstudiante";
       $deleteEstudiante = $conexion->prepare($sqlDeleteEstudiante);
       $deleteEstudiante->bindParam(':cedulaEstudiante', $cedulaEstudiante, PDO::PARAM_STR);
       $deleteEstudiante->execute();

       // Verificar si ocurrieron errores al eliminar registros en ambas tablas
       if (!$deleteEstudiante || !$deleteRepresentante) {
           die("Error al eliminar datos de estudiante y/o representante");
       }

       //echo "Datos de estudiante y representante eliminados satisfactoriamente";
       echo $cedulaEstudiante;
   }
}



/*if(isset($_POST['id_delete_student'])){
   $ide = $_POST['id_delete_student'];
   $sql1 = ("DELETE FROM estudiante WHERE idestudiante = '$ide'");
   $deleteE = $conexion->prepare($sql1);
   $deleteE->execute();
   if(!$deleteE){
      die("Error al eliminar datos de estudnate");

   }
   echo "Datos de estudiante eliminados satisfactoriamente";

}*/
?>