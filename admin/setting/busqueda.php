<?php
require_once('../../backend/db.php');
if(isset($_POST['id_edit'])){
    $id = $_POST['id_edit'];

    $sql=("SELECT * FROM estudiante WHERE idestudiante = '$id'");
    
    $consulta = $conexion->prepare($sql);
    $consulta->execute();
    
    if(!$consulta){
        die();
        echo "Error de consulta";
    }
    $json = array();
    while($row= $consulta->fetch(PDO::FETCH_ASSOC)){
        $json[]= array(
            'id'=> $row['idestudiante'],
            'nombre'=>$row['nombres'],
            'apellido'=>$row['apellidos'],
            'cedula'=>$row['cedula'],
            'fecha_nacimiento'=>$row['fecha_nacimiento'],
            'genero'=>$row['genero'],
            'tipo_discapacidad'=>$row['tipo_discapacidad'],
            'num_carnet'=>$row['num_carnet']
    
        );
    
    
    }
    $jsonString = json_encode($json[0]);
    echo $jsonString;
}
if(isset($_POST['id_edit_repre'])){

    $id_repre = $_POST['id_edit_repre'];
    $sql1=("SELECT * FROM representante WHERE idrepresentante = '$id_repre'");
    
    $consulta1 = $conexion->prepare($sql1);
    $consulta1->execute();
    
    if(!$consulta1){
        die();
        echo "Error de consulta";
    }
    $json1 = array();
    while($row1= $consulta1->fetch(PDO::FETCH_ASSOC)){
        $json1[]= array(
            'id'=> $row1['idrepresentante'],
            'nombre'=>$row1['nombres'],
            'apellido'=>$row1['apellidos'],
            'cedula'=>$row1['cedula'],
            'parentesco'=>$row1['parentesco'],
            'telefono'=>$row1['num_telefono'],
            'formacion'=>$row1['nivel_formacion'],
            'canton'=>$row1['canton_residencia'],
            'direccion'=>$row1['direccion_domiciliaria'],
            'codigo'=>$row1['codigo_postal']
    
        );
    
    
    }
    $jsonString1 = json_encode($json1[0]);
    echo $jsonString1;
}if(isset($_POST['id_mat'])){
    $id_mat= $_POST['id_mat'];
    
    $sql3 = "SELECT idmatricula,num_matricula,Tipo_institucion,Nombre_insti,estudiante.nombres,estudiante.apellidos,nivel_academico.nombre, periodos.descripcion,grado,paralelo
    FROM matricula 
    JOIN estudiante ON matricula.id_estudiante = estudiante.idestudiante
    JOIN periodos ON matricula.id_periodo = periodos.idperiodos
    JOIN nivel_academico ON matricula.id_Nivel_Academico = nivel_academico.idNivelAcademico WHERE idmatricula = '$id_mat' ";
    $consulta3 = $conexion->prepare($sql3);
    $consulta3->execute();

    if(!$consulta3){
        die();
        echo "Error de consulta";
    }
    $json3 = array();
    while($row3= $consulta3->fetch(PDO::FETCH_ASSOC)){
        $json3[]= array(
            'nivel_academico'=>$row3['nombre'],
            'periodo_academico'=>$row3['descripcion'],
            'grado_estudiante'=>$row3['grado'],
             'paralelo_estudiante'=>$row3['paralelo'],
             'tipo_insti'=>$row3['Tipo_institucion'],
             'nombre_instituto'=>$row3['Nombre_insti']
    
        );

};
$jsonString3 = json_encode($json3[0]);
 echo $jsonString3;

}

?>