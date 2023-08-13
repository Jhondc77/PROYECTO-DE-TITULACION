<?php
require_once('db.php');
// Obtener el estado actual del período académico
if(isset($_POST['idP'])){
    $id = $_POST['idP'];

    $stmt = $conexion->prepare("DELETE FROM periodos WHERE idperiodos = :id");

    // Asociar el valor del ID a la consulta preparada
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error al eliminar el registro.";
    }

}
?>
