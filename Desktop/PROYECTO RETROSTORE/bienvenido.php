<?php

include_once('funciones.php');

// Generando el perfil dinamicamente!
// SI hay $_SESSION:
if($_SESSION) {
    // 1 - Necesito traer el usuario y asignarlo a una variable, por suerte ya tengo una funcion de antes!
    $usuario = buscamePorEmail($_SESSION["email"]);
    $username = $usuario['email'];
    // 2 - Por como arme la subida del avatar, necesito su ID por separado
    $id = $usuario["id"];
    // 3 - Dentro de la funcion glob() (http://php.net/manual/es/function.glob.php)
    // concateno la carpeta img al nombre que se genera por default con la subida de las imagenes
    // y un * para que de igual la extension
    if (isset(glob("img/perfil$id.*")[0])) {
        //Este if se ejecuta si esta seteado el indice 0. Es la unica manera de no recibir error
        // a la hora de verificar esto.
        $archivo = glob("img/perfil$id.*")[0];
    } else {
        $archivo = null;
    }
    //dd($archivo);
    // como glob() devuelve un array, si no pongo el unico indice que llega,
    // tira error array to string conversion cuando hago el echo de $archivo
}



 ?>





<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
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
        <h4 class="card-title"><?="Bienvenido $username!"?></h4>
      </ul>

    </div>
     </div>
      </nav>


    </header>

<section>

  <h1>Felicitaciones, has iniciado sesion en Retro Store!</h1><h4> <a href="logout.php">Deslogueate</a>
  </h4>

</section>}





<div class="container">


    <?php //SI EL CONTROLLER DE LOGIN DA FALSE, MUESTRO EL SIGUIENTE BLOQUE ?>
    <?php if(!loginController()): ?>
    <div class="alert alert-danger" role="alert">
        No estas autorizado en este sistema <a href="register.php" class="alert-link">Registrate!</a>
    </div>
    <?php endif;
    // SI PASA, NO LO MUESTRO Y POR EL CONTRARIO, LE MUESTRO SU PERFIL!
    ?>
    <div class="row">

        <div class="card col-4">
        <?php if(isset($archivo)):
            // SI hay archivo, mostramelo
        ?>
            <img class="card-img-top" src="<?=$archivo ?>" alt="Card image cap">
        <?php else:
            // else, mostrame la imagen default
            ?>
            <img class="card-img-top" src="img/default.jpg" alt="Card image cap">
        <?php endif; ?>
            <div class="card-body">
                <h4 class="card-title"><?="Bienvenido $username!"?></h4>

            </div>
        </div>

    </div>
</div>




</body>
