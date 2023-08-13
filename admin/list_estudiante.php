<?php
require_once('admin.php');
?>


<div class=" col-sm-8 col-md-9 col-lg-10 col-xl-10 mt-5">


<div class="mt-5"id="list-estudiante">
<div class="card-header bg-info p-2">
            <h4 class="fw-bold text-center text-white">Lista de Estudiantes</h4>
        </div>
        <div class="card-body">
    <form method="post">
            <div class="m-2">
              <label for="" class="form-label">Cedula</label>
              <input type="text" name="" id="" class="form-control" placeholder="Cedula" aria-describedby="helpId">
            </div>
            <input type="submit" class="btn btn-success w-25 h-50 mt-5" value="Buscar"/>
        </form>
        <a class="btn btn-info w-25 m-2" href="notas.php">Agregar</a>
        
<div class="table-responsive" >
<table class="table table-default table-sm table-striped">
    <thead class="table table-info ">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Cedula</th>
            <th scope="col">Fecha De Nacimiento</th>
            <th scope="col">Genero</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody id="table_estudiante">
      
    </tbody>

</table>
<button class="btn btn-info" id="cargarFilas">Siguiente</button>
</div>
<!---------------FIN DE LISTA ESTUDIANTE----->



<div id="fondo_form">
    <div class="card-body bg-info mt-3" id="formulario_emergente">
    </div>
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
<!------------Fin---->

</div>












<?php
require_once('footer.php');
?>