<?php
include 'home.php';


?>
<div class=" col-sm-8 col-md-9 col-lg-10 col-xl-10 mt-5">

      <div id="ntf-periodo"></div>

    <div class="card mt-5" id="tarjeta-periodo">
        <div class="card-header bg-info">
            <h3 class="fw-bold text-center text-white ">Crear periodo Academico</h3>
        </div>
        <div class="card-body">
            <form method="post" id="form-periodo">

            <div class="m-2">
              <label for="" class="form-label">Periodo Academico</label>
              <input type="text" name="descrip-periodo" id="descrip-periodo" class="form-control" placeholder="" aria-describedby="helpId">
             
            </div>

            <div class="m-2">
              <label for="" class="form-label">Inicio del Periodo</label>
              <input type="date" name="inicio-periodo" id="inicio-periodo" class="form-control" placeholder="" aria-describedby="helpId">
              
            </div>

            <div class="m-2">
              <label for="" class="form-label">Fin del Periodo</label>
              <input type="date" name="fin-periodo" id="fin-periodo" class="form-control" placeholder="" aria-describedby="helpId">
             
            </div>

            <div class="m-2">
              <label for="" class="form-label">Estado</label>
              <select class="form-select form-select" name="estado-periodo" id="estado-periodo">
                <option selected>Seleccione</option>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
              </select>
            </div>
            <input type="submit" class="btn btn-success h-75 w-25 mt-4" value="guardar">

            </form>
        </div>




        <div class="table-responsive">
          <table class="table table-default table-sm">
            <thead class="table table-info text-center">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">DESCRIPCION</th>
                <th scope="col">FECHA DE INICIO</th>
                <th scope="col">FECHA DE FIN</th>
                <th scope="col">ESTADO</th>
                <th scope="col">ACCIONES</th>
              </tr>
            </thead>
            <tbody id="periods_table">
              
            </tbody>
          </table>
        </div>
        
    </div>
        <!----Fin del card----->
        
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


    
        <!----Fin del cold----->
</div>
<?php
include 'footer.php';
?>