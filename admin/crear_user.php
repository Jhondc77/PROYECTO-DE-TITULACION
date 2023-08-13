<?php
require_once ('admin.php');
?>

<div class=" col-sm-8 col-md-9 col-lg-10 col-xl-10 mt-5">

<div class="card mt-5 " id="tarjeta-admin-regis">

<div id="ntf-regis">
</div>

  <div class="card-header bg-info">
   <h3 class="fw-bold text-center text-white"> Registrar Usuarios</h3>
  </div>

  <div class="card-body">
    
    
  <form method="post" class="form-registro" id="form-registro">

  <div class="m-2">
    <label for="" class="form-label">Nombres</label>
    <input type="text" name="nombre-user" id="nombre-user" class="form-control" placeholder="" aria-describedby="helpId">
    <small id="helpId" class="text-muted">Ingrese su cedula</small>
  </div>
  
  <div class="m-2">
    <label for="" class="form-label">apellidos</label>
    <input type="text" name="apellido-user" id="apellido-user" class="form-control" placeholder="" aria-describedby="helpId">
    <small id="helpId" class="text-muted">Ingrese su segundo nombre</small>
  </div>
  
  <div class="m-2">
    <label for="" class="form-label">Rol</label>
    <select class="form-select" name="rol-user" id="rol-user">
      <option selected>Seleccionar</option>
      <option value="1">Administrador</option>
      <option value="2">Secretario</option>
    </select>
  </div>
  <div class="m-2">
    <label for="" class="form-label">Usuario</label>
    <input type="text" name="user-usuario" id="usuario-user" class="form-control" placeholder="" aria-describedby="helpId">
    <small id="helpId" class="text-muted">Usuario</small>
  </div>

  <div class="m-2">
    <label for="" class="form-label">Contraseña</label>
    <input type="text" name="user-contraseña" id="contraseña-user" class="form-control" placeholder="" aria-describedby="helpId">
    <small id="helpId" class="text-muted">Contraseña</small>
  </div>


 <input type="submit" class="btn btn-warning w-50 h-50 m-3" value="guardar" id="botong">
 </form>
 <div id="result"></div>
 
<!----Fin del card body--->
  </div>
  <div class=" mt-2" id="crear-user2">


  <div class="card-header">
    <h4>Lista de Usuarios</h4>
  </div>
  <div class="card-body">
  
<form method="post">
  <input type="text" placeholder="Buscar Usuario" class="form-control w-50">
  <input type="submit" class="btn btn-success w-25" value="buscar">

</form>
  <div class="table-responsive">
    <table class="table table-default" id="table-user">
      <thead class="table table-info">
        <tr>
        <th scope="col">Id</th>
          <th scope="col">Nombres</th>
          <th scope="col">Apellidos</th>
          <th scope="col">Usuario</th>
          <th scope="col">Rol</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody id="list-user">
       
      
      </tbody>
    </table>
  </div>
  

  
  <!-------Fin del card-------->
  <div>  

  </div>

  <div id="confirmMessage" class="message hidden">
  <p>¿Estás seguro de que deseas eliminar este Usuario?</p>
  <button id="confirmarEliminarBtn" class="btn btn-danger">Eliminar</button>
  <button id="cancelarEliminarBtn" class="btn btn-secondary">Cancelar</button>
</div>

<!-- Mensaje de eliminación exitosa -->
<div id="successMessage" class="message hidden">
  <p>El dato ha sido eliminado correctamente.</p>
</div>








</div>



</div>




<?php
require_once ('footer.php');
?>


