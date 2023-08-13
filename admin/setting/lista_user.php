<?php
require_once('../../backend/db.php');


$sql= ("SELECT u.*, t.descripcion FROM user u JOIN tipo_user t ON u.tipo_user = t.idtipo_user "); 
$consulta= $conexion->prepare($sql);
$consulta->execute();

if(!$consulta){
    die("Error en la consulta");
}
$json = array();

while($row = $consulta->fetch(PDO::FETCH_ASSOC) ){
    $json[] =array(
'id'=> $row['iduser'],
'Nombre'=>$row['nombres'],
'Apellidos'=>$row['apellidos'],
'Usuario'=>$row['usuario'],
'Contraseña'=>$row['contraseña'],
'Tipo_user'=>$row['descripcion']
    ); 

}
$jsonString= json_encode($json);
echo $jsonString;

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql3 ="DELETE FROM user WHERE iduser = '$id'";
    $sentencia3 = $conexion->prepare($sql3);
    $sentencia3->execute();
    if(!$sentencia3){
        die("error de eliminacion");
    } 
    echo"eliminado satisfacoriamente";
};
?>