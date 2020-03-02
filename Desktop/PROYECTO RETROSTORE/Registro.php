
<?php

include_once('funciones.php');

if($_POST) {
    // 1 - Validar
    $errores = validate($_POST);
    // 2 - Crear Usuario
    if(count($errores) == 0) {
        $usuario = createUser($_POST);
    // 3 - Validacion del avatar
        $erroresAvatar = saveAvatar($usuario);
    // 4 - Merge de errores (uno los arrays de errores)
        $errores = array_merge($errores, $erroresAvatar);
    // 5 - vuelvo a validar $errores
        if(count($errores) == 0) {
    // 6 - Guardo usuario y lo mando a loguearse
            saveUser($usuario);
            header('Location: login.php');
            exit;
        }
    }
}

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=devide-width, user_scalabre=no, initial-scale=1.0, maximum-scale=1.0, minimun-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css">



    <title>Registrate</title>
  </head>
  <body>


    <header>
      <nav class="navbar navbar-inverse navbar-static-top" role="navigation">

        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle= "collapse" data-target= "#navegacion fm" >
              <span class="sr-only"> Desplegar 7Ocultar Menu</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">
              Retro Store
            </a>
          </div>


<!--inicia menu -->

        <div class="collapse navbar-collapse" id="navegacion fm">
        <ul class="nav navbar-nav">
        <li> <a href="RetroStore.php">Home</a> </li>
        <li> <a href="#">Camisetas</a> </li>
        <li> <a href="#">Botines</a> </li>
          <li> <a href="#">Pelotas</a> </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
            Categorias <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Camisetas</a> </li>
            <li><a href="#">Botines</a> </li>
            <li><a href="#">Pelotas</a> </li>
            <li><a href="#">Conjuntos</a> </li>
          </ul>
        </li>
        </ul>



    <form class="navbar-form navbar-right" action="" role="search">
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Buscar">
    </div>
    <button type="submit" class="btn btn-primary" name="button">
      <span class="glyphicon glyphicon-search"></span>
    </button>
<a class="btn btn-primary" href="ayuda.html"><span class="glyphicon glyphicon-question-sign"></span></a>




    </form>


    <div class="collapse navbar-collapse" id="navegacion fm">
      <ul class="nav navbar-nav navbar-right">
        <li> <a href="login.php">Ingreso</a> </li>
        <li class="active"> <a href="Registro.php">Registro</a> </li>
      </ul>

    </div>
     </div>
      </nav>


    </header>

<!--inicia Registro -->


    <?php if(isset($errores)):?>
    <ul>
    <?php foreach($errores as $error):?>
        <li class="alert alert-danger"><?=$error ?></li>
    <?php endforeach;?>
    </ul>
    <?php endif;?>




    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">
                    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                        <fieldset>
                            <legend class="text-center header">Registrate para una mejor experiencia en RetroStore</legend>




            <div class="form-group">
              <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
              <div class="col-md-8">
                  <input id="usuario" name="username" type="text" placeholder="Usuario" class="form-control" value="<?=!isset($errores['username']) ? old('username') : "" ?>">
                </div>
                </div>


            <div class="form-group">
                  <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
              <div class="col-md-8">
                  <input id="name" name="name" type="text" placeholder="Nombre" class="form-control" value="">
              </div>
            </div>


              <div class="form-group">
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                    <div class="col-md-8">
                          <input id="apellido" name="apellido" type="text" placeholder="Apellido" class="form-control" value="">
                    </div>
                </div>

                <div class="form-group">
                  <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                      <div class="col-md-8">
                        <label for="avatar">avatar</label>
                            <input type="file" name="avatar" value="">
                      </div>
                  </div>


                  <div class="form-group">
                      <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                        <div class="col-md-8">
                          <input id="email" name="email" type="email" placeholder="Email" class="form-control" value="">
                            </div>
                        </div>


                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                          <div class="col-md-8">
                          <input id="password" name="password" type="password" placeholder="Contraseña" class="form-control" value=""></div>
                               </div>


                               <div class="form-group">
                               <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                 <div class="col-md-8">
                                   <input id="confirmarpassword" name="confirmarpassword" type="password" placeholder="Confirmar Contraseña" class="form-control"></div>
                               </div>

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="js/jquery.js"></script>

    <script src="js/bootstrap.js"></script>


  </body>
</html>
