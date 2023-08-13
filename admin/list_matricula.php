<?php
require_once('admin.php');
?>


<div class=" col-sm-8 col-md-9 col-lg-10 col-xl-10 mt-5">

<!--------------TARJETA DE LISTA DE MATRICULA--------------->
        <div class="mt-5" id="list-matricula">
        <div class="card-header bg-info p-2">
            <h4 class="fw-bold text-center text-white">Lista de estudiantes Matriculados</h4>
        </div>
        <div class="card-body">
      
        <form method="post" class="list_matricula" id="listm_admin">

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
<button id="generarPDF" class="btn btn-success w-50"><i class="fa-solid fa-ballot-check"></i>Generar Reporte</button>
</form>
<a class="btn btn-info w-25 m-2" href="Matriculacion.php"><i class="fa-solid fa-plus p-1"></i>Agregar</a>
            
    <div class="table-responsive" >
    <table class="table table-default table-sm table-striped" id="tabla-matriculas" >
        <thead class="table table-info text-center">
            <tr>
                             <th scope="col">Id Matricula</th>
                            <th scope="col">Codigo de matricula</th>
                            <th scope="col">Estudiante</th>
                            <th scope="col">Nivel</th>
                            <th scope="col">Grado</th>
                            <th scope="col">Paralelo</th>
                            <th scope="col">Periodo Academico</th>
                            <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody id="table_matricula">
          
        </tbody>

    </table>
    <button class="btn btn-info" id="cargarFilas">Siguiente</button>
</div>
<!-----------Fin del lista matricula---------------->

<div id="fondo">
    <div id="user-card"> </div>
   
</div>


</div>
<!------------Fin del col------------------->

<div id="fondo_matricula">
    <div id="form_matricula" class="bg-info"></div>
</div>



<!-- Mensaje de confirmación -->
<div id="confirmMessage" class="message hidden">
  <p>¿Estás seguro de que deseas eliminar este dato?</p>
  <button id="confirmarEliminarBtn" class="btn btn-danger">Eliminar</button>
  <button id="cancelarEliminarBtn" class="btn btn-secondary">Cancelar</button>
</div>

<!-- Mensaje de eliminación exitosa -->
<div id="successMessage" class="message hidden">
  <p>El dato ha sido eliminado correctamente.</p>
</div>












   

<?php
require_once('footer.php');
?>