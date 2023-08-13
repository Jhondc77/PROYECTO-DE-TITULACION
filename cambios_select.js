

function cambiarOpciones() {

    var select1 = document.getElementById("tipo_matricula");
    var select2 = document.getElementById("nivel_academico");
    
    // Obtener el valor seleccionado en el select1
    var seleccion = select1.value;
   
    // Limpiar las opciones actuales del select2
    select2.innerHTML = "";
    
    // Agregar las nuevas opciones según la selección en select1
    if (seleccion === "2") {
      var opcion1 = document.createElement("option");
      opcion1.value = "1ro Bachillerato";
      opcion1.text = "1ro Bachillerato";
      var opcion2 = document.createElement("option");
      opcion2.value = "2ro Bachillerato";
      opcion2.text = "2ro Bachillerato";
      var opcion3 = document.createElement("option");
      opcion3.value = "3ro Bachillerato";
      opcion3.text = "3ro Bachillerato";
      select2.add(opcion1);
      select2.add(opcion2);
      select2.add(opcion3);
    } else if (seleccion === "1") {
      var opcion4 = document.createElement("option");
      opcion4.value = "1ro Grado";
      opcion4.text = "1ro";

      var opcion5 = document.createElement("option");
      opcion5.value = "2do Grado";
      opcion5.text = "2do";

      var opcion6 = document.createElement("option");
      opcion6.value = "3ro Grado";
      opcion6.text = "3ro";

      var opcion7 = document.createElement("option");
      opcion7.value = "4to Grado";
      opcion7.text = "4to";

      var opcion8 = document.createElement("option");
      opcion8.value = "5to Grado";
      opcion8.text = "5to";

      var opcion9 = document.createElement("option");
      opcion9.value = "6to Grado";
      opcion9.text = "6to";

      var opcion10 = document.createElement("option");
      opcion10.value = "7mo Grado";
      opcion10.text = "7mo";

      var opcion11 = document.createElement("option");
      opcion11.value = "8vo Grado";
      opcion11.text = "8vo";

      var opcion12 = document.createElement("option");
      opcion12.value = "9no Grado";
      opcion12.text = "9no";

      var opcion13 = document.createElement("option");
      opcion13.value = "10mo Grado";
      opcion13.text = "10mo";
      select2.add(opcion4);
      select2.add(opcion5);
      select2.add(opcion6);
      select2.add(opcion7);
      select2.add(opcion8);
      select2.add(opcion9);
      select2.add(opcion10);
      select2.add(opcion11);
      select2.add(opcion12);
      select2.add(opcion13);

    }
  }

