<?php
require_once('admin.php');
?>

<div class=" col-sm-10 col-md-9 col-lg-10 col-xl-10 mt-5">


<div class="mt-5"id="list-representante">
<div class="card-header bg-info p-2">
            <h4 class="fw-bold text-center text-white">Lista de Representantes</h4>
        </div>
        <div class="card-body">
        <form method="post">
                <div class="m-2">
                  <label for="" class="form-label">Cedula</label>
                  <input type="text" name="" id="" class="form-control" placeholder="Cedula" aria-describedby="helpId">
                </div>
                <input type="submit" class="btn btn-success w-25 h-50 mt-4" value="Buscar"/>
            </form>
            
    <div class="table-responsive" >
    <table class="table table-default table-sm">
        <thead class="table table-info text-center">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Cedula</th>
                <th scope="col">Numero de telefono</th>
                <th scope="col">Canton de Residencia</th>
                <th scope="col">Direccion Domiciliaria</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody id="table_representante">
          
        </tbody>

    </table>
    <button class="btn btn-info" id="cargarFilas">Siguiente</button>
</div>
<!-----fin de lista representante-------->


</div>
<!-----fin del col-------->


<div id="fondo_repre">
    <div class="card-body bg-info mt-4"id="form_repre">

    </div>

</div>
<!----------fin del form emeergente-------->





   



<?php
require_once('footer.php');
?>