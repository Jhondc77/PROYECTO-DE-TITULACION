<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/bootstrap.min.css"/>
    <link rel="stylesheet" href="../../style/login.css">

    <title>Login</title>
</head>
<body>
    
 <div class="container-fluit">

 

        <div class="row justify-content-center">
            
            <div class="col-sm-7 col-md-6 col-lg-5 col-xl-4">
                <div id="error"></div>

                <div id="content-img">
<img src="../../img/logo.jpg"  id="logo-login"alt="logo">
</div>



            <div class="card mt-5 ">
                <div class="card-header bg-primary">
                    <h4 class="fw-bold text-center text-white">Iniciar Sesion</h4>
                </div>
                <div class="card-body">
                    
                <form action="home.html" method="post" id="form-login">
                    <div class="mb-3">
                      <label for="" class="form-label">Usuario</label>
                      <input type="text" name="login-user" id="login-user" class="form-control" placeholder="" aria-describedby="helpId" require>
                      <small id="helpId" class="text-muted">Porfavor Ingrese su usuario</small>
                    </div>

                    <div class="mb-3">
                      <label for="" class="form-label">Contraseña</label>
                      <input type="password" name="login-password" id="login-password" class="form-control" placeholder="" aria-describedby="helpId">
                      <small id="helpId" class="text-muted">Porfavor ingrese su contraseña</small>
                    </div>
                    <input type="submit" value="Login" class="btn btn-success w-50" id="botonlg">
                    

                </form>



                </div>
                <!----Fin del card body------>
            </div>
               
            </div>

        </div>

    </div>
</body>


<script src="jquery.js"></script>
<script src="app.js"></script>
</html>
