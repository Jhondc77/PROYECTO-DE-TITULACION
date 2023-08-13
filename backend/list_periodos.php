<?php
require_once('db.php');
$sql = "SELECT * FROM periodos";
 $result = $conexion->prepare($sql);
$result->execute();

    
$json= array();
while($row=$result->fetch(PDO::FETCH_ASSOC)){
$json[]= array(
'id'=> $row['idperiodos'],
'descripcion'=>$row['descripcion'],
'fecha_inicio'=>$row['Fecha_Inicio'],
'fecha_fin'=>$row['Fecha_Fin'],
'estado'=>$row['estado'],
);

}
$jsonString = json_encode($json);
echo $jsonString;
    ?>