<?php

include_once('funciones.php');

if (isset($_SESSION['email'])) {
  header('location : login.php');
}

if($_POST) {
    // 1 - buscar usuario por mail
    $usuario = buscamePorEmail($_POST['email']);
    if($usuario !== null) {
        if(password_verify($_POST['password'], $usuario['password']) === true) {
            login($usuario);
        }
    }
    // SI mi controlador de login devuelve true, es porque el usuario ingresa con una cookie o con una
    // session ya iniciada en el sistema, no quiero que vea el form de login
    if(loginController()) {
        header('Location: bienvenido.php');
        // Lo derivo a su perfil y corto la ejecucion de codigo.
        exit;
    }
}
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=devide-width, user_scalabre=no, initial-scale=1.0, maximum-scale=1.0, minimun-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css">


    <title>Inicia Sesion</title>
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



    <form class="navbar-form navbar-right" action="" role="search" method="">
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Buscar">
    </div>
    <button type="submit" class="btn btn-primary" name="button">
      <span class="glyphicon glyphicon-search"></span>
    </button>
<a class="btn btn-primary" href="ayuda.html"><span class="glyphicon glyphicon-question-sign"></span></a>


    </form>
    <div class="collapse navbar-collapse" id="navegacion fm" action= "post">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"> <a href="login.php">Ingreso</a> </li>
        <li> <a href="Registro.php">Registro</a> </li>
      </ul>

    </div>
     </div>
      </nav>


    </header>





    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">
                    <form class="form-horizontal" action="" method="post">
                        <fieldset>
                            <legend class="text-center header">Iniciar Sesion</legend>


                            <div class="form-group">

                              <?=isset($errores["email"])?$errores["email"]:""?>
                          <div class="form-group">

                              <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"</i></span>
                              <div class="col-md-8">
                                  <input id="email" name="email" type="email" placeholder="Correo o Nombre de Usuario" class="form-control" value="">
                              </div>
                          </div>

                          <?=isset($errores["password"])?$errores["password"]:""?>
                      <div class="form-group">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                            <input id="password" name="password" type="password" placeholder="Contraseña" class="form-control" value=""></div>
                                 </div>
                                 </div>



                                   <div class="form-group">
                                   <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                     <div class="col-md-8">
                                         <a href="">Olvido su contraseña?</a>
                                     </div>
                                   </div>

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">Ingresar</button>
                                </div>

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
