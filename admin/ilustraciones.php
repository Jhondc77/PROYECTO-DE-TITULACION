
<?php
require_once ('admin.php');
?>
<div class="datos">
<div class="row mt-5">
      <div class="col-md-3 mt-5 col-xl-3 col-sm-3 ">
        <div class="card mt-5">
          <div class="card-body">
            <h4 class="card-title"><i class="fas fa-user"></i> Estudiantes</h4>
           <h5> <p class="card-text text-truncate" id="totalEstudiantes">Cargando...</p></h5>
          </div>
        </div>
      </div>
      <div class="col-md-3  col-xl-3 col-sm-3  mt-5">
        <div class="card mt-5">
          <div class="card-body">
            <h4 class="card-title"><i class="fas fa-file-alt"></i> Matrículas</h4>
</h5><p class="card-text text-truncate fw-bold" id="totalMatriculas">Cargando...</p></h5>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-xl-3 col-sm-3  mt-5">
        <div class="card mt-5">
          <div class="card-body">
            <h4 class="card-title"><i class="fas fa-user-friends"></i> Representantes</h4>
            <h5><p class="card-text text-truncate" id="totalRepresentantes">Cargando...</p></h5>
          </div>
        </div>
      </div>
    </div>
</div>

<?php
require_once('footer.php');
?>