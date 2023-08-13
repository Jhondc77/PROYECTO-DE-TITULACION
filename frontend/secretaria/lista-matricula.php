<?php
include 'home.php';

?>

<div class=" col-sm-8 col-md-9 col-lg-10 col-xl-10 mt-5">
    <div  class="mt-5"id="lista-matricula">
        <div class="card-header bg-info p-2">
            <h4 class="fw-bold text-center text-white">Lista de estudiantes Matriculados</h4>
        </div>
        <div class="card-body">
            <form method="post" class="list_matricula" id="list_matricula">

               <div class="m-2">
                <label for="" class="form-label">Buscar por nivel</label>
                <select class="form-select form-select"  name="tipo_matricula" id="tipo_matricula" onchange="cambiarOpciones()">
                    <option selected>Seleccione</option>
                    <option value="1">Primaria</option>
                    <option value="2">Secundaria</option>
                </select>
               </div>

               
               <div class="m-2">
                <label for="" class="form-label">Buscar por grado</label>
                <select class="form-select form-select"name="grado_academico" id="nivel_academico">
                    <option selected>Seleccione</option>
                    
                </select>
               </div>

               <div class="m-2">
                <label for="" class="form-label">Buscar por paralelo</label>
                <select class="form-select form-select"  name="paralelo" id="paralelo">
                    <option selected>Seleccione</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
               </div>

               <input type="submit" class="btn btn-warning w-25" value="filtrar">
               <button id="generarPDFSECRETARIA" class="btn btn-success w-50"><i class="fa-solid fa-ballot-check"></i>Generar Reporte</button>


            </form>
            
        </div>
        <div class="card-footer">

        <div class="table-responsive">
                <table class="table table-default table-sm" id="tabla-resultados">
                    <thead class="table table-info">
                        <tr>
                            <th scope="col">Id Matricula</th>
                            <th scope="col">Codigo de matricula</th>
                            <th scope="col">Estudiante</th>
                            <th scope="col">Nivel</th>
                            <th scope="col">Grado</th>
                            <th scope="col">Paralelo</th>
                            <th scope="col">Periodo Academico</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="table_matri">
                        
                       
                    </tbody>
                </table>
             </div>
             
             <!----Fin de tabla---->
            
        </div>
        <!---fin del card--->
    
</div>
<!-----------FIN DEL COL-------------------->
</div>
    
    

    
<div class="container">
<div id="fondo_matricula">
    <div class="card-body bg-info mt-3" id="form_matricula">
    </div>
</div>
</div>

<div id="fondo">
    <div id="user-card"> </div>
   
</div>

    


<!---fin del col--->
   
   
    

    
   

<?php
include 'footer.php';


?>