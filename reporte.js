$(document).ready(function() {
    $('#generarPDF').click(function() {
      // Obtén los datos de la tabla y conviértelos en un arreglo
      var datosTabla = [];
  
      $('#tabla-resultados tbody tr').each(function() {
        var id = $(this).find('td:eq(0)').text();
        var columna1 = $(this).find('td:eq(1)').text();
        var columna2 = $(this).find('td:eq(2)').text();
  
        datosTabla.push({
          id: id,
          columna1: columna1,
          columna2: columna2
        });
      });
  
      console.log(datosTabla);
      // Realiza la solicitud AJAX al archivo PHP para generar el PDF
      $.ajax({
        url: '../../backend/reporte_matricula.php',
        type: 'POST',
        responseType: 'arraybuffer',
        data: {
          datos: datosTabla
        },
        success: function(response) {
          // La generación del PDF fue exitosa
          alert('Se ha generado el PDF correctamente.');
          // Aquí puedes realizar alguna acción adicional si es necesario
          var blob = new Blob([response], { type: 'application/pdf' });

          var downloadLink = document.createElement('a');
          downloadLink.href = URL.createObjectURL(blob);
          downloadLink.download = 'archivo.pdf';
          downloadLink.click();
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });
    });
  });