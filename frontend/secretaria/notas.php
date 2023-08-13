<?php
require_once('home.php');

?>

    <div class="col-sm-8 col-md-9 col-lg-10 col-xl-10 mt-5">
        <div class="card mt-5" id="tarjeta-registro">
            
            <div class="card-header bg-info text-white section">
                <h4 class="fw-bold text-center"> Datos del Estudiantes</h4>
            </div>

            <div class="card-body section">

                <form method="post" class="form-registro" id="form-data-student">


                    <div class="m-1 ">
                        <label for="" class="form-label">Nro Cedula</label>
                        <input type="text" name="cedula-student" id="cedula-student" class="form-control "
                            placeholder="" aria-describedby="helpId" maxlenght="10" required>
                        <small id="helpId" class="text-muted">Ingrese su cedula</small>
                    </div>


                    <div class="m-1">
                        <label for="" class="form-label">Fecha de nacimiento</label>
                        <input type="date" name="fecha-nacimiento" id="fecha-nacimiento" class="form-control"
                            placeholder="" aria-describedby="helpId" required>
                        <small id="helpId" class="text-muted">Ingrese su fecha de nacimiento</small>
                    </div>


                    <div class="m-1">
                        <label for="" class="form-label">primer Nombre </label>
                        <input type="text" name="primer_nom_student" id="primer_nom_student" class="form-control"
                            placeholder="" aria-describedby="helpId" required>
                        <small id="helpId" class="text-muted">Ingrese su primer nombre</small>
                    </div>


                    <div class="m-1">
                        <label for="" class="form-label">Segundo Nombre</label>
                        <input type="text" name="segundo_nom_student" id="segundo_nom_student" class="form-control"
                            placeholder="" aria-describedby="helpId" required>
                        <small id="helpId" class="text-muted">Ingrese su segundo nombre</small>
                    </div>


                    <div class="m-1">
                        <label for="" class="form-label">Apellido Paterno</label>
                        <input type="text" name="apellido_p_student" id="apellido_p_student" class="form-control"
                            placeholder="" aria-describedby="helpId" required>
                        <small id="helpId" class="text-muted">Ingrese su apellido paterno</small>
                    </div>


                    <div class="m-1">
                        <label for="" class="form-label">Apellido Materno</label>
                        <input type="text" name="apellido_m_student" id="apellido_m_student" class="form-control"
                            placeholder="" aria-describedby="helpId" required>
                        <small id="helpId" class="text-muted">Ingrese su apellido materno</small>
                    </div>


                    <div class="m-1">
                        <label for="" class="form-label">Genero</label>
                        <select class="form-select form-select" name="genero_student" id="genero_student">
                            <option selected>Seleccione</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>


                    <div class="m-1">
                        <label for="" class="form-label">Tipo de Discapacidad</label>
                        <select class="form-select form-select" name="tipo_discapacidad" id="tipo_discapacidad">
                            <option selected>Seleccione</option>
                            <option value="Discapacidad Visual">DISCAPACIDAD VISULA</option>
                            <option value="Discapacidad Auditiva">DISCAPACIDAD AUDITIVA</option>
                            <option value="Discapacidad Fisica">DISCAPACIDAD FISICA</option>
                            <option value="Discapacidad Mental">DISCAPACIDAD MENTAL</option>
                            <option value="Otra">OTRA</option>
                            <option value="Ninguna">NINGUNA</option>
                        </select>
                    </div>


                    <div class="m-1">
                        <label for="" class="form-label">Nro.Carnet</label>
                        <input type="text" name="carnet-student" id="carnet-student" class="form-control" placeholder=""
                            aria-describedby="helpId" required>
                        <small id="helpId" class="text-muted">Help text</small>
                    </div>




                    <!---------Fin del col----------->

            </div>
            <!---------Fin del row----------->

            <div class="col">


                <div class="mt-2 " id="tarjeta-registro">

                    <div class="card-header bg-info text-white">
                        <h4 class="fw-bold text-center">Datos del Representante</h4>
                    </div>
                    <div class="card-body form-registro" id="tarjeta-repre">
                        <div class="m-1">
                            <label for="" class="form-label">Nro Cedula</label>
                            <input type="text" name="cedula-representante" id="cedula-representante"
                                class="form-control " placeholder="" aria-describedby="helpId" required>
                            <small id="helpId" class="text-muted">Ingrese Numero Cedula</small>
                        </div>

                        <div class="m-1">
                            <label for="" class="form-label">Parentesco</label>
                            <input type="text" name="parentesco" id="parentesco" class="form-control" placeholder=""
                                aria-describedby="helpId" required>
                            <small id="helpId" class="text-muted">Ingrese Parentesco</small>
                        </div>

                        <div class="m-1">
                            <label for="" class="form-label">Nombres</label>
                            <input type="text" name="nombre-representante" id="nombre-representante"
                                class="form-control" placeholder="" aria-describedby="helpId" required>
                            <small id="helpId" class="text-muted">Ingrese Nombre</small>
                        </div>

                        <div class="m-1">
                            <label for="" class="form-label">Apellidos</label>
                            <input type="text" name="apellido-representante" id="apellido-representante"
                                class="form-control" placeholder="" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Ingrese Apellido</small>
                        </div>

                        <div class="m-1">
                            <label for="" class="form-label">Nro Telefono</label>
                            <input type="text" name="nmro-representante" id="nmro-representante" class="form-control"
                                placeholder="" aria-describedby="helpId" maxlenght="10" required>
                            <small id="helpId" class="text-muted">Ingrese Numero Telefonico</small>
                        </div>

                        <div class="m-1">
                            <label for="" class="form-label">Nivel de Formacion</label>
                            <select class="form-select form-select" name="nivel-formacion" id="nivel-formacion"
                                >
                                <option selected>Seleccione</option>
                                <option value="Primaria">Primaria</option>
                                <option value="Secundaria">Secundaria</option>
                                <option value="Educacion Inicial">Educacion Inicial</option>
                            </select>
                        </div>

                        <div class="m-1">
                            <label for="" class="form-label">Canton de Residencia</label>
                            <input type="text" name="canton-residencia" id="canton-residencia" class="form-control"
                                placeholder="" aria-describedby="helpId" required>
                            <small id="helpId" class="text-muted">Ingrese Canton</small>
                        </div>

                        <div class="m-1">
                            <label for="" class="form-label">Direccion domiciliaria</label>
                            <input type="text" name="direccion-representante" id="direccion-representante"
                                class="form-control" placeholder="" aria-describedby="helpId" required>
                            <small id="helpId" class="text-muted">Ingrese Direccion</small>
                        </div>

                        <div class="m-1">
                            <label for="" class="form-label">Codigo Postal</label>
                            <input type="text" name="codigo-postal" id="codigo-postal" class="form-control"
                                placeholder="" aria-describedby="helpId" required>
                            <small id="helpId" class="text-muted">Ingrese Codigo Postal</small>
                        </div>
                    </div>

                </div>


                <!------------------->
            </div>

            <!----Fin del card body--->
            <input type="submit" class="btn btn-success w-25 p-10 m-3" value="Guardar" id="boton-data">
            <!---<input type="submit" class="btn btn-primary w-25 p-10" value="Actializar">-->

            </form>

        </div>



        <!-------Fin del card-------->
        <div>

        </div>



        <!---------Fin del col----------->
    
        




<?php
include 'footer.php';
?>