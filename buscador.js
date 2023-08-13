document.getElementById('matricula-student').addEventListener('submit', function(e) {
  e.preventDefault(); // Evitar el envío predeterminado del formulario
  
  var dato = document.getElementById('cedula-estudiante').value; // Obtener el valor del input
  
  var submitButton = document.activeElement; // Obtener el botón de envío que se hizo clic
  
  if (submitButton.name === 'submit1') {
   
    enviarDato(dato, '../../backend/obtencion_datos_m.php'); // Llamar a la función para enviar el dato 1 a procesar1.php

    function enviarDato(dato, url) {
      var formData = new FormData();
      formData.append('dato', dato); // Agregar el dato al objeto FormData
      
      fetch(url, {
        method: 'POST',
        body: formData,
        dataType: 'json'
      })
      .then(function(response) {
        if (response.ok) {
          return response.json();
        }
        throw new Error('Error en la solicitud.');
      })
      .then(function(response) {
        // Hacer algo con la respuesta recibida desde el archivo PHP
        
console.log(response);

if (response.error) {
  alert(response.error);
  return;
} else {
  if (response.matriculado) {
    alert("El estudiante ya está matriculado.");
    return;
  } 
}

        const fecha_nacimiento = document.getElementById('fecha-nacimiento');
      fecha_nacimiento.value=response.fecha; // Inserta el dato en el input
  
      const nombres = document.getElementById('nombre_student');
      nombres.value = response.nombre; // Inserta el dato en el input

      const apellido = document.getElementById('apellido_student');
      apellido.value = response.apellido; // Inserta el dato en el input


//-------------------------------------------------------------------------------
      })
      
      .catch(function(error) {
        console.log(error);
      });
    }

    




  } else if (submitButton.name === 'matricularse') {
    var Dataform = new FormData(this);
    //var idstudent = respuesta.id_estudiante;
    enviarDato(Dataform, '../../backend/matricular.php'); // Llamar a la función para enviar el dato 1 a procesar1.php
    

    function enviarDato(Dataform, url) {
      fetch(url, {
        method: 'POST',
        body: Dataform
      })
      .then(function(response) {
        if (response.ok) {
          return response.text();
        }
        throw new Error('Error en la solicitud.');
      })
      .then(function(respuesta) {
        // Hacer algo con la respuesta recibida desde el archivo PHP
        console.log(respuesta);
        alert('Estudiante matriculado exitosamente');
        document.getElementById("matricula-student").reset();
      })
      .catch(function(error) {
        console.log(error);
      });
    }
    


  }
});
