$(document).ready(function () {
  // Obtener los datos a través de AJAX
  $.ajax({
    url: 'setting/principal.php',
    dataType: 'json',
    success: function (data) {
     
      $('#totalEstudiantes').text(data.estudiante);
      $('#totalMatriculas').text(data.matricula);
      $('#totalRepresentantes').text(data.representante);
    },
    error: function () {
      console.log('Error al cargar los datos.');
    }
  });
});

  $(document).ready(function () {
    // Obtener los datos a través d
    

    $('#form-registro').submit(function (e) { 
      //  e.preventDefault();
    
        
        var nombreu = $('#nombre-user').val();
        var apellidou = $('#apellido-user').val();
        var usuariou = $('#usuario-user').val();
        var contraseñau = $('#contraseña-user').val();
        var rolu = $('#rol-user').val();
        

       if(nombreu === '' || apellidou === '' || usuariou === '' || contraseñau === '' || rolu === ''){
        alert('Por favor complete los campos');
        return;

       }

       $.ajax({
        method: "POST",
        url: "../../backend/registrar_user.php",
        data: {
            nombreu:nombreu,
            apellidou: apellidou,
            rolu: rolu,
            usuariou: usuariou,
            contraseñau:contraseñau
        },
        success: function (response) {
            console.log(response)
           var template = '';
            
            
            if(response.status === 'success'){

               // template += `<div class="alert alert-danger">Usuarios y Contraseñas iguales Porfavor volver a registrar</div>`
                //$('#ntf-regis').html(template);
                alert("Usuario registrado");
                location.reload();

            }else{
                //template += `<div class="alert alert-info">Usuario Registrado</div>`
                //$('#ntf-regis').html(template);
                alert("Usuario y contraseñas iguales porfavor volver a registrar");
                return;
            }
           
            $('#form-registro')[0].reset();
        }
    });

       
    });
    
    //fin



  });


//Lista de usuarios
  $(document).ready(function() {
    $.ajax({
      url: 'setting/lista_user.php',
      method: 'GET',
      dataType: 'json',
      success: function(data) {
        // En este punto, 'data' contiene los resultados del SELECT
        
        mostrarResultados(data);
      },
      error: function() {
        // Manejo de errores
      }
    });


  function mostrarResultados(data) {
    let template = '';
    let lists = (data);
    lists.forEach(list=>{
    template +=`<tr userId= "${list.id}">
    <td>${list.id}</td>
    <td>${list.Nombre}</td>
    <td>${list.Apellidos}</td>
    <td>${list.Usuario}</td>
    <td>${list.Tipo_user}</td>
    <td>
    
    <button class="eliminar_user btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i>
  </button>
  <button class="eliminar_user btn btn-warning"><i class="fa-sharp fa-regular fa-pen-to-square"></i>
  </button>
    </td>
    </tr>`
  });
  $('#list-user').html(template);
  
  
  };
 

  });

  $(document).on('click','.eliminar_user', function(){
    var elemet = $(this)[0].parentElement.parentElement;
   var id=  $(elemet).attr('userId')
   $('#confirmMessage').removeClass('hidden');

   $('#confirmarEliminarBtn').on('click',function() {
    $.ajax({
      url: 'setting/lista_user.php',
      method: 'POST',
    //  dataType: 'json',
      data: { id: id},
      success: function(response) {
        $('#confirmMessage').addClass('hidden');
          
        // Mostrar el mensaje de eliminación exitosa
        $('#successMessage').removeClass('hidden');

        setTimeout(function (){
          $('#successMessage').hide('hidden');
          location.reload();
        },2000);
    },
    error: function(xhr, status, error) {
      // Mostrar mensaje de error en caso de que falle la petición Ajax
      alert('Error al eliminar el dato: ' + error);
      }

  
  
    });
  
});

$('#cancelarEliminarBtn').on('click', function() {
  // Ocultar el mensaje de confirmación
  setTimeout(function (){
    $('#confirmMessage').addClass('hidden','visible');
  
  },300);
  
 });
});




//Lista de estudiantes

$(document).ready(function(e) {
  $.ajax({
    url: 'setting/lista_estudiante.php',
    method: 'GET',
    dataType: 'json',
    success: function(data) {
      // En este punto, 'data' contiene los resultados del SELECT
      mostrarLista(data);
    },
    error: function() {
      // Manejo de errores
    }
  });


function mostrarLista(data) {
  
  let template = '';
  let lists = (data);
 lists.forEach(list=>{
  template +=`<tr estudianteId= "${list.id}">
  <td>${list.id}</td>
  <td>${list.Nombre_Estudiante}</td>
  <td>${list.Apellido_Estudiante}</td>
  <td>${list.Cedula}</td>
  <td>${list.fecha_nacimiento}</td>
  <td>${list.genero}</td>
  <td>
  
  <button class="eliminar_estudiante btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i>
</button>
<button class="editar_estudiante btn btn-warning"><i class="fa-sharp fa-regular fa-pen-to-square"></i>
</button>
  </td>
  </tr>`
});
$('#table_estudiante').html(template);


};


$(document).on('click','.eliminar_estudiante', function(){
  var elemet = $(this)[0].parentElement.parentElement;
 var id_delete_student=  $(elemet).attr('estudianteId');
 $('#confirmMessage').removeClass('hidden');

 $('#confirmarEliminarBtn').on('click',function() {
 $.ajax({
  url: 'setting/eliminar.php',
  method: 'POST',
  //dataType: "json",
  data: { id_delete_student: id_delete_student},
  success: function(response) {
    
    $('#confirmMessage').addClass('hidden');
        
    // Mostrar el mensaje de eliminación exitosa
    $('#successMessage').removeClass('hidden');
      
setTimeout(function (){
  $('#successMessage').hide('hidden');
  location.reload();
},2000);
  },
  error: function(xhr, status, error) {
    // Mostrar mensaje de error en caso de que falle la petición Ajax
    alert('Error al eliminar el dato: ' + error);
    }


});
});

$('#cancelarEliminarBtn').on('click', function() {
  // Ocultar el mensaje de confirmación
  setTimeout(function (){
    $('#confirmMessage').addClass('hidden','visible');
  
  },300);
  
 });

});

$(document).on('click','.editar_estudiante',function(e){
  e.stopPropagation();
 var elemet = $(this)[0].parentElement.parentElement;
  var id_edit=  $(elemet).attr('estudianteId');
  console.log(id_edit);
  var tarjeta = $('#formulario_emergente');
  var fondo = $('#fondo_form');
  $('#fondo_form').show('visible');
  $('#formulario_emergente').show('visible');

  var formulario = `
  <div id="ntfe"></div>
  <div id="titulo-form">
      <h3>Datos del Estudiante</h3>
      </div>
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
      <label for="" class="form-label"> Nombres </label>
      <input type="text" name="primer_nom_student" id="primer_nom_student" class="form-control"
          placeholder="" aria-describedby="helpId" required>
      <small id="helpId" class="text-muted">Ingrese su primer nombre</small>
  </div>


  
  <div class="m-1">
      <label for="" class="form-label">Apellidos</label>
      <input type="text" name="apellido_p_student" id="apellido_p_student" class="form-control"
          placeholder="" aria-describedby="helpId" required>
      <small id="helpId" class="text-muted">Ingrese su apellido paterno</small>
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
          <option value="Nimguna">NIMGUNA</option>
      </select>
  </div>


  <div class="m-1">
      <label for="" class="form-label">Nro.Carnet</label>
      <input type="text" name="carnet-student" id="carnet-student" class="form-control" placeholder=""
          aria-describedby="helpId" required>
      <small id="helpId" class="text-muted">Numero Carnet</small>
  </div>
  <button type="submit" class="btn btn-success h-50 mt-4" id="actualizar-student">Actualizar</button>
  </form>

`;
tarjeta.html(formulario);

  $.ajax({
    url: 'setting/busqueda.php',
    method: 'POST',
    data: { id_edit: id_edit},
    success: function(response) {
      const data = JSON.parse(response);
      $('#primer_nom_student').val(data.nombre);
      $('#apellido_p_student').val(data.apellido);
      $('#cedula-student').val(data.cedula);
      $('#fecha-nacimiento').val(data.fecha_nacimiento);
      $('#genero_student').val(data.genero);
      $('#discapacidad_student').val(data.discapacidad);
      $('#tipo_discapacidad').val(data.tipo_discapacidad);
      $('#carnet-student').val(data.num_carnet);
    }
  
  
  });

  $(document).on('click', function(event) {
    var targetElement = event.target; // Elemento en el que se hizo clic

    // Comprueba si el clic se realizó fuera de la tarjeta y del botón abrir
    if (!tarjeta.is(targetElement) && tarjeta.has(targetElement).length === 0 &&
        !$('.editar_estudiante').is(targetElement)) {
          fondo.hide('visible');
      tarjeta.hide('visible');
      location.reload();

    }
  });

  $(document).on('click','#actualizar-student',function(e){
    e.preventDefault();
    var mensje= "";
    var nombre=$('#primer_nom_student').val();
    var apellido=$('#apellido_p_student').val();
    var cedula=$('#cedula-student').val();
    var fecha=$('#fecha-nacimiento').val();
    var genero=$('#genero_student').val();
    var discapacidad=$('#discapacidad_student').val();
    var tipo_discapacidad= $('#tipo_discapacidad').val();
    var carnet= $('#carnet-student').val();

    $.ajax({
      type: "POST",
      url: "setting/edit.php",
      data: {id_edit,nombre,apellido,cedula,fecha,genero,discapacidad,tipo_discapacidad,carnet},
      success: function (response) {
        mensje += `<div class="alert alert-success"> Actualizacion completa</div>`;
        $('#ntfe').html(mensje);
      //mostrarLista();

       // console.log(response);
       
      }
    });

  });
  


  
});



});


//lista representante


$(document).ready(function() {
  
  $.ajax({
    url: 'setting/lista_representante.php',
    method: 'GET',
    dataType: 'json',
    success: function(data) {
      // En este punto, 'data' contiene los resultados del SELECT
      mostrarListaR(data);
    },
    error: function() {
      // Manejo de errores
    }
  });


function mostrarListaR(data) {
  
  let template = '';
  let lists = (data);
 lists.forEach(list=>{
  template +=`<tr repreId= "${list.idRepresentante}">
  <td>${list.idRepresentante}</td>
  <td>${list.nombre_representante}</td>
  <td>${list.apellido_representante}</td>
  <td>${list.cedula_representante}</td>
  <td>${list.telefono_representante}</td>
  <td>${list.canton_residencia}</td>
  <td>${list.direccion_domiciliaria}</td>
  <td>
  
 
<button class="editar_representante btn btn-warning"><i class="fa-sharp fa-regular fa-pen-to-square"></i>
  
</button>
  </td>
  </tr>`
});
$('#table_representante').html(template);

};



$(document).on('click','.editar_representante',function(e){
  e.stopPropagation();
  var elemet = $(this)[0].parentElement.parentElement;
   var id_edit_repre=  $(elemet).attr('repreId');
   var tarjeta = $('#form_repre');
   var fondo = $('#fondo_repre');
   $('#fondo_repre').show('visible');
   $('#form_repre').show('visible');
 
   var formulario = `
   <div id="ntf"></div>
   <div id="titulo-form-repre">
      <h3>Datos del Representante</h3>
      </div>
   <form method="post" class="form-registro" id="form-data-repre">
 
 
   <div class="m-1">
                            <label for="" class="form-label">Nro Cedula</label>
                            <input type="text" name="cedula-representante" id="cedula-representante"
                                class="form-control" placeholder="" aria-describedby="helpId" required>
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
   <button type="submit" class="btn btn-info h-100 bg-success" id="actualizar_repre">Actualizar</button>
   </form>
 
 `;
 tarjeta.html(formulario);
 
   $.ajax({
     url: 'setting/busqueda.php',
     method: 'POST',
     data: { id_edit_repre: id_edit_repre},
     success: function(response) {
       const data = JSON.parse(response);
       console.log(data)
       $('#nombre-representante').val(data.nombre);
       $('#apellido-representante').val(data.apellido);
       $('#cedula-representante').val(data.cedula);
       $('#parentesco').val(data.parentesco);
       $('#nmro-representante').val(data.telefono);
       $('#nivel-formacion').val(data.formacion);
       $('#canton-residencia').val(data.canton);
       $('#direccion-representante').val(data.direccion);
       $('#codigo-postal').val(data.codigo);
     }
   
   
   });
 
   $(document).on('click', function(event) {
     var targetElement = event.target; // Elemento en el que se hizo clic
 
     // Comprueba si el clic se realizó fuera de la tarjeta y del botón abrir
     if (!tarjeta.is(targetElement) && tarjeta.has(targetElement).length === 0 &&
         !$('.editar_representante').is(targetElement)) {
           fondo.hide('visible');
       tarjeta.hide('visible');
       location.reload();
     }
   });
 
   $(document).on('click','#actualizar_repre',function(e){
     e.preventDefault();
     var mensj= "";
 var nombre_repre = $('#nombre-representante').val()
 var apellido_repre = $('#apellido-representante').val();
 var cedula_repre = $('#cedula-representante').val();
 var parentesco = $('#parentesco').val();
 var telefono = $('#nmro-representante').val();
 var formacion = $('#nivel-formacion').val();
 var canton = $('#canton-residencia').val();
 var direccion = $('#direccion-representante').val();
 var postal = $('#codigo-postal').val();
 
     $.ajax({
       type: "POST",
       url: "setting/edit.php",
       data: {id_edit_repre,nombre_repre,apellido_repre,cedula_repre,parentesco,telefono,formacion,canton,direccion,postal},
       success: function (response) {
         mensj += `<div class="alert alert-info"> Actualizacion completa</div>`;
         $('#ntf').html(mensj);
         //console.log(response);
        
       }
     });
 
   });
   
 
 
   
 });
 
 
 
 });


///Lista Matricula


$(document).ready(function(e) {
  $.ajax({
    url: 'setting/lista_matricula.php',
    method: 'GET',
    dataType: 'json',
    success: function(data) {
      // En este punto, 'data' contiene los resultados del SELECT
      mostrarListaM(data);
      // e.preventDefault();
    },
    error: function() {
      // Manejo de errores
    }
  });


  function mostrarListaM(data) {
    let template = '';
    let lists = (data);
    lists.forEach(list => {
      template += `<tr matriculaID="${list.id_matricula}">
        <td>${list.id_matricula}</td>
        <td>${list.numero_matricula}</td>
        <td><a href="#" class="ver_matricula">${list.nombre_estudiante} ${list.apellido_estudiante}</a></td>
        <td>${list.nivel_academico}</td>
        <td>${list.grado_estudiante}</td>
        <td>${list.paralalo_estudiante}</td>
        <td>${list.periodo_academico}</td>
        <td>
          <button class="eliminar_matricula btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></button>
          <button class="ficha btn btn-primary"><i class="fa-solid fa-file-zipper"></i>

          <button class="actualizar btn btn-warning"><i class="fa-sharp fa-regular fa-pen-to-square"></i></i></button>
        </td>
      </tr>`;
    });
    $('#table_matricula').html(template);
  }

  $('#listm_admin').submit(function(e){
   
    e.preventDefault();
        var Nivel=   $('#tipo_matricula').val();
        var Grado= $('#nivel_academico').val();
        var Paralelo=  $('#paralelo').val();
    
    $.ajax({
        type: "POST",
        url: 'setting/search_info.php',
        data: {Nivel:Nivel, 
            Grado:Grado,
            Paralelo:Paralelo},
        dataType: "json",
        success: function (dato) {
         // console.log(dato);
          dato.sort(function(a, b) {
            return b.id_matricula - a.id_matricula;
        });
           mostarConsulta(dato); 
       
        }
    });


});


//fin del document.ready
function mostarConsulta(dato){
  let template1 = '';
  let lists = (dato);
  lists.forEach(list=>{
  template1 +=`<tr matriculaID= "${list.id_matricula}">
  <td>${list.id_matricula}</td>
  <td>${list.numero_matricula}</td>
  <td><a href="#" class="ver_matricula">${list.nombre_estudiante} ${list.apellido_estudiante}</a></td>
  <td>${list.nivel_academico}</td>
  <td>${list.grado_estudiante}</td>
  <td>${list.paralalo_estudiante}</td>
  <td>${list.periodo_academico }</td>
  <td>
  
  <button class="eliminar_matricula btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i>
</button>
<button class="ficha btn btn-primary"><i class="fa-solid fa-file-zipper"></i>

<button class="actualizar btn btn-warning"><i class="fa-sharp fa-regular fa-pen-to-square"></i></i>

</button>
  </td>
  </tr>`
});
$('#table_matricula').html(template1);



};


$(document).on('click','.actualizar',function(e){
  e.stopPropagation();
  var elemet = $(this)[0].parentElement.parentElement;
  var id_mat=  $(elemet).attr('matriculaID');
 // console.log(id_mat);
  var tarjetas = $('#form_matricula');
  var fondos = $('#fondo_matricula');
  $('#fondo_matricula').show('visible');
  $('#form_matricula').show('visible');

  var formulariom = `
  <div id="ntfe"></div>
  <div id="titulo-form">
      <h3>Datos de la Matricula</h3>
      </div>
  <form method="post" class="form-registro" id="form-data-student">


  <div class="m-2">
  <label for="" class="form-label">Periodo academico</label>
  <select class="form-select form-select"  id="selectPeriodos">
  <option value="PERIODO 2023-2024">PERIODO 2023-2024</option>
      
  </select>
</div>

<div class="m-2">
<label for="" class="form-label">Seleccione el nivel</label>
<select class="form-select form-select" id="tipo_matriculas">
  <option selected>Seleccione</option>
  <option value="Primaria">Primaria</option>
  <option value="Secundaria">Secundaria</option>
</select>
</div>

<div class="m-2">
<label for="" class="form-label">Grado </label>
<input type="text" n id="nivel_academicos" class="form-control" placeholder="" aria-describedby="helpId" >

</div>


<div class="m-2">
<label for="" class="form-label">Paralelo</label>
<select class="form-select form-select" name="paralelo" id="paralelos" required>
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
<label for="" class="form-label">Nombre de la Institucion</label>
<input type="text" name="nombre_instituto" id="nombre_instituto" class="form-control" placeholder="" aria-describedby="helpId" >

</div>



</div>
      

<!----Fin del card body--->
<button type="submit" class="btn btn-success w-50 p-10 m-3" id="matricular" name="matricularse" value="guardar">Guardar</button>


  </form>

`;
tarjetas.html(formulariom);

$.ajax({
  url: 'setting/busqueda.php',
  method: 'POST',
  data: { id_mat: id_mat},
  //dataType: 'json',
  success: function(response) {
    const data = JSON.parse(response);
    console.log(response);
    $('#tipo_matriculas').val(data.nivel_academico);
    $('#paralelos').val(data.paralelo_estudiante);
    $('#nivel_academicos').val(data.grado_estudiante);
    $('#selectPeriodos').val(data.periodo_academico);
    $('#tipo_instituto').val(data.tipo_insti);
    $('#nombre_instituto').val(data.nombre_instituto);
  }


});

$(document).on('click', function(event) {
  var targetElement = event.target; // Elemento en el que se hizo clic

  // Comprueba si el clic se realizó fuera de la tarjeta y del botón abrir
  if (!tarjetas.is(targetElement) && tarjetas.has(targetElement).length === 0 &&
      !$('.editar_matricula').is(targetElement)) {
        fondos.hide('visible');
    tarjetas.hide('visible');
    

  }
});



});




$(document).on('click','.ficha',function(){
  var elemet = $(this)[0].parentElement.parentElement;
 var id=  $(elemet).attr('matriculaID');
 
  $.ajax({
    url: '../../backend/fichas.php',
    type: 'POST',
    data:{id:id},
    xhrFields: {
      responseType: 'blob'
    },
    success: function(response) {
      
      // Se ha generado el PDF correctamente
     // alert('El PDF se ha generado correctamente.');
  var blob = new Blob([response], { type: 'application/pdf' });
  var url = URL.createObjectURL(blob);
  var link = document.createElement('a');
  link.href = url;
  link.download = 'Ficha_de_matricula.pdf';

  // Simular un clic en el enlace para iniciar la descarga
  link.click();

  // Liberar el objeto URL creado
  URL.revokeObjectURL(url);
  
    },
    error: function(xhr, status, error) {
      // Error en la generación del PDF
      alert('Error al generar el PDF.');
    }
  });

});
    



});








  
//VER MATRICULA
$(document).on('click','.ver_matricula',function() { 
  var elemet = $(this)[0].parentElement.parentElement;
  var id=  $(elemet).attr('matriculaID');
   //console.log(id);
   var tarjeta = $('#user-card');
   var fondo = $('#fondo');
  $('#fondo').show('visible');
  $('#user-card').show('visible');


   $.ajax({
    url: '../../backend/mostrar.php',
    method: 'POST',
    dataType: 'json',
    data: { id: id},
    success: function(response) {
    template = '';
    var lista = (response);

    lista.forEach(Lista=>{
      template+= `
      <div id="titulo">
      <h3 class="fw-bold">Datos del Matriculado</h3>
      </div>
      <div id="container">
      <div class="m-1"><label class="form-label fw-bold">Id Matricula</label><p>${Lista.idmatricula}</p></div>
      <div class="m-1"><label class="form-label fw-bold">Numero de Matricula</label><p>${Lista.numMatricula}</p></div>
      <div class="m-1"><label class="form-label fw-bold">Nombre del estudiante</label><p>${Lista.nombreEstudiante}</p></div>
      <div class="m-1"><label class="form-label fw-bold">Apellido del estudiante</label><p>${Lista.apellidosEstudiante}</p></div>
      <div class="m-1"><label class="form-label fw-bold">Nombre del representante</label><p>${Lista.nombresRepresentante}</p></div>
      <div class="m-1"><label class="form-label fw-bold">Apellido del representante</label><p>${Lista.apellidosRepresentante}</p></div>
      <div class="m-1"><label class="form-label fw-bold">Cedula del representante</label><p>${Lista.cedulaRepresentante}</p></div>
      <div class="m-1"><label class="form-label fw-bold">Parentesco con el estudiante</label><p>${Lista.parentescoRepresentante}</p></div>
      <div class="m-1"><label class="form-label fw-bold">Telefono</label><p>${Lista.numTelefonoRepresentante}</p></div>
      <div class="m-1"><label class="form-label fw-bold">Canton de residencia</label><p>${Lista.cantonRepresentante}</p></div>
      <div class="m-1"><label class="form-label fw-bold">Direccion</label><p>${Lista.direccionRepresentante}</p></div>

      </div>
      `
    });
    $(tarjeta).html(template);
   
    }


  });

  $(document).on('click', function(event) {
    var targetElement = event.target; // Elemento en el que se hizo clic

    // Comprueba si el clic se realizó fuera de la tarjeta y del botón abrir
    if (!tarjeta.is(targetElement) && tarjeta.has(targetElement).length === 0 &&
        !$('.ver_matricula').is(targetElement)) {
          fondo.hide('visible');
      tarjeta.hide('visible');
    }
  });


});

  /////////////////
 

//ELIMINAR MATRICULA

$(document).on('click','.eliminar_matricula', function(){
  var elemet = $(this)[0].parentElement.parentElement;
 var idm=  $(elemet).attr('matriculaID');

 $('#confirmMessage').removeClass('hidden');

 $('#confirmarEliminarBtn').on('click',function() {
 $.ajax({
  url: 'setting/eliminar.php',
  method: 'POST',
  //dataType: 'json',
  data: { idm: idm},
  success: function(response) {
    // Ocultar el mensaje de confirmación
    $('#confirmMessage').addClass('hidden');
        
    // Mostrar el mensaje de eliminación exitosa
    $('#successMessage').removeClass('hidden');
  
setTimeout(function (){
  $('#successMessage').hide('hidden');
  location.reload();
},2000);

         },
       error: function(xhr, status, error) {
      // Mostrar mensaje de error en caso de que falle la petición Ajax
      alert('Error al eliminar el dato: ' + error);
      }


    });
   
});
 // Capturar el evento de clic en el botón de cancelar eliminación
 $('#cancelarEliminarBtn').on('click', function() {
  // Ocultar el mensaje de confirmación
  setTimeout(function (){
    $('#confirmMessage').addClass('hidden','visible');
  
  },300);
  
 });

 
});

 
 

 $(document).on('click', '#buscar_cedula', function(e) {
  e.preventDefault();

  var dato = $('#cedula-estudiante').val();

  $.ajax({
      method: "POST",
      url: "../../backend/obtencion_datos_m.php",
      data: { dato: dato },
      success: function(response) {
          const datos = JSON.parse(response);
          console.log(datos);
          $('#fecha-nacimiento').val(datos.fecha);
          $('#nombre_student').val(datos.nombre);
          $('#apellido_student').val(datos.apellido);
      }
  });
});




////matricular


$(document).on('click', '#Registrom_E', function(e) {
  e.preventDefault();

  var cedula_estudiante = $('#cedula-estudiante').val();
  var tipo_matricula = $('#tipo_matricula').val();
  var grado_academico = $('#nivel_academico').val();
  var paralelo = $('#paralelo').val();
  var tipo_instituto = $('#tipo_instituto').val();
  var nombre_instituto = $('#nombre_insti').val();
  $.ajax({
      method: "POST",
      url: "../../backend/matricular.php",
      data: { cedula_estudiante: cedula_estudiante,
      tipo_matricula:tipo_matricula,
      grado_academico,grado_academico,
      paralelo:paralelo,
      tipo_instituto:tipo_instituto,
      nombre_instituto:nombre_instituto },
      success: function(response) {
         //console.log(response);
      }
  });
});

$(document).ready(function() {
  $(document).on('click', '#generarPDF', function(e) {
    e.preventDefault();
    
    // Obtener los datos de la tabla
    //console.log(datosTabla);
    // Enviar los datos al archivo PHP mediante Ajax
    $.ajax({
      url: '../../backend/reporte.php',
      type: 'GET',
      xhrFields: {
        responseType: 'blob'
      },
      success: function(response) {
      //  console.log(response);
        // Se ha generado el PDF correctamente
       // alert('El PDF se ha generado correctamente.');
    var blob = new Blob([response], { type: 'application/pdf' });
    var url = URL.createObjectURL(blob);
    var link = document.createElement('a');
    link.href = url;
    link.download = 'Reporte_De_Matriculas.pdf';

    // Simular un clic en el enlace para iniciar la descarga
    link.click();

    // Liberar el objeto URL creado
    URL.revokeObjectURL(url);
    
      },
      error: function(xhr, status, error) {
        // Error en la generación del PDF
        alert('Error al generar el PDF.');
      }
    });
  });

});



   
 