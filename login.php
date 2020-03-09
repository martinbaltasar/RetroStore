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
        header('Location: perfil.php');
        // Lo derivo a su perfil y corto la ejecucion de codigo.
        exit;
    }
}
include_once 'head.php';
include_once 'navbar.php';
 ?>

    <div class="container">
    <?php if(isset($errores)):?>
     <?php foreach($errores as $error):?>
       <div class="alert alert-danger"><?=$error ?></div>
     <?php endforeach;?>
   <?php endif;?>
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
                                  <input id="email" name="email" type="email" placeholder="Correo o Nombre de Usuario" class="form-control" value="<?=isset($errores["email"])?$errores["email"]:""?>">
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















    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
