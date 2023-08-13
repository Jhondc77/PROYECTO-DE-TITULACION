<?php
require_once('home.php');

?>

<div class="col-sm-8 col-md-9 col-lg-9 col-xl-10 mt-5">

    <div id="mensaje" class="alert" role="alert" style="display: none;"></div>

        <div class="card mt-5" id="tarjeta-registro">
            <div id="señal"></div>

            <div class="card-header  bg-info section">
                <h4 class="fw-bold text-center text-white"> Registrar Matricula</h4>
            </div>
          
            <div class="card-body section">

                <form method="post" class="form-matricula" id="matricula-student" >

                <div class="m-2">
                
                        <label for="" class="form-label">Nro Cedula</label>
                        <input type="text" name="cedula_estudiante" id="cedula-estudiante" class="form-control "
                            placeholder="" aria-describedby="helpId" required>
                        <small id="helpId" class="text-muted">Ingrese su cedula</small>
                        <input type="submit" class="btn btn-warning"  value= "buscar" name="submit1">       <!----id="buscar-student"----->               
                        
                    </div>



                    <div class="m-2">
                      <label for="" class="form-label">Fecha de Nacimiento</label>
                      <input type="text" name="fecha-nacimiento" id="fecha-nacimiento" class="form-control" placeholder="" aria-describedby="helpId"readonly>
                    </div>

                    <div class="m-2">
                        <label for="" class="form-label">Nombres </label>
                        <input type="text" name="nombre_student" id="nombre_student" class="form-control"
                            placeholder="" aria-describedby="helpId" readonly>
                    </div>


                    <div class="m-2">
                        <label for="" class="form-label">Apellidos</label>
                        <input type="text" name="apellido_student" id="apellido_student" class="form-control"
                            placeholder="" readonly>
                    </div>


                   

                    </div>

                    <!---------Fin del col----------->

            <!---------Fin del row----------->




                
                <div class="card-header  bg-info">
                        <h4 class="fw-bold text-center text-white">Detalles de la matricula</h4>
                    </div>
                    <div class="card-body form-registro"   id="tarjeta-repre">

                        <div class="m-2">
                            <label for="" class="form-label">Periodo academico</label>
                            <select class="form-select form-select" name="selectPeriodo" id="selectPeriodo">
                                
                            </select>
                        </div>

                    

                       
                    <div class="m-2">
                        <label for="" class="form-label">Seleccione el nivel</label>
                        <select class="form-select form-select" name="tipo_matricula" id="tipo_matricula" onchange="cambiarOpciones()">
                            <option selected>Seleccione</option>
                            <option value="1">Primaria</option>
                            <option value="2">Secundaria</option>
                        </select>
                    </div>

                    <div class="m-2">
                        <label for="" class="form-label">Seleccione el grado</label>
                        <select class="form-select form-select" name="grado_academico" id="nivel_academico">
                            <option selected>Seleccione</option>
                            
                        </select>
                    </div>

                    
                   <div class="m-2">
                    <label for="" class="form-label">Paralelo</label>
                    <select class="form-select form-select" name="paralelo" id="paralelo" required>
                        <option selected>Seleccione</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                   </div>


                    <div class="m-2">
                        <label for="" class="form-label">Tipo de Institucion Proveniente</label>
                        <select class="form-select form-select" name="tipo_instituto" id="tipo_instituto">
                            <option selected>Seleccione</option>
                            <option value="Particular">Particular</option>
                            <option value="Fiscomisional">Fiscomisional</option>
                            <option value="Municipal">Municipal</option>
                        </select>
                    </div>

                    <div class="m-2">
                      <label for="" class="form-label">Nombre de la Institucion de donde proviene</label>
                      <input type="text" name="nombre_instituto" id="" class="form-control" placeholder="" aria-describedby="helpId" >
                      <small id="helpId" class="text-muted">Help text</small>
                    </div>



                    </div>
                                

            <!----Fin del card body--->
            <button type="submit" class="btn btn-success w-25 p-10 m-3" id="matricular" name="matricularse" value="guardar">Guardar</button>
            <!---<input type="submit" class="btn btn-primary w-25 p-10" value="Actializar">-->

            </form>

        </div>



        <!-------Fin del card-------->
        



        <!---------Fin del col----------->
    






<?php
require_once 'footer.php';
?>











