<?php
session_start();

if (!isset($_SESSION['Usuario'])) {
    header('Location: ../../index.php'); // Redirige al usuario a la página de inicio de sesión si no hay sesión activa
    exit;
}

// Si el usuario está autenticado, puedes mostrar el contenido de la página

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/bootstrap.min.css">
    <link rel="stylesheet" href="../../../style/style.css">
    <link rel="stylesheet" href="../../../style/nav.css">
    <link rel="stylesheet" href="../../../style/admin.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

   

    <!-- Custom styles for this template-->


    <title>Document</title>
</head>
<body>




<nav class="navbar fixed-top navbar-expand-lg bg-primary " data-bs-theme="primary" id="nav2">
  <div class="container-fluid">
    <h3 class="text-white fw-bold "><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Panel de Secretaria</font></font></h3>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Navegación de palanca">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        
       
      </ul>
      <form class="d-flex">
        <button class="btn btn-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fa-regular fa-user p-1"></i><?php echo  $_SESSION['Usuario'];?></font></font></button>
      

      </form>
    </div>
  </div>
</nav>







<div class="container-fluit">
  <div class="row">
  <div class=" d-flex  col-sm-4 col-md-3 col-lg-3 col-xl-2 ">
<div class="sidebar bg-primary">
  
  <ul>
   
    <li><a href="notas.php"><i class="fa-solid fa-users p-1"></i>Registrar Estudiante</a></li>
    <li><a href="Matriculacion.php"><i class="fa-solid fa-address-card p-1"></i>Matricula</a></li>
    <li><a href="list_estudiante.php"><i class="fa-solid fa-list p-1"></i>Lista de Estudiantes</a></li>
    <li><a href="list_representante.php"><i class="fa-solid fa-list p-1"></i>Lista de Representantes</a></li>
    <li><a href="lista-matricula.php"><i class="fa-solid fa-list p-1"></i>Lista de Estudiantes Matriculados</a></li>
    <li><a href="periodos.php">Crear Periodo</a></li>
    <li><a href="../../backend/cerrar_sesion.php">Salir</a></li>
    <li><img src="../../img/logo.jpg" class="img-thumbnail img-fluid rounded float-start" id="logo"></li>
    
  </ul>
</div>
</div>



   


  

  

 