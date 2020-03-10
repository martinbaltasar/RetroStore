
<?php

/*include_once('funciones.php');

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
}*/
include_once 'soporte.php';
if($auth->loginController()) {
    header("location: index.php");
            exit;
}
$name="";
$last_name="";
$username="";
$email="";
if($_POST){
    $errores = $validador->validarInformacion($_POST);
    $name = $_POST['name'];
    $username=$_POST['username'];
    $email=$_POST['email'];
if(count($errores) == 0) {
    $usuario = new Usuario(NULL,$_POST['name'],$_POST['username'], $_POST['email'], $_POST['password']);

    $usuario->guardarImagen();

    $db->guardarUsuario($usuario);

    header("location: login.php");
    
    exit;
 }
}
include_once 'head.php';
include_once 'navbar.php';
 ?>

<!--inicia Registro -->

 <div class="container">
   <?php if(isset($errores)):?>
     <?php foreach($errores as $error):?>
       <div class="alert alert-danger"><?=$error ?></div>
     <?php endforeach;?>
   <?php endif;?>
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">
                    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                        <fieldset>
                            <legend class="text-center header">Registrate para una mejor experiencia en RetroStore</legend>




            <div class="form-group">
              <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
              <div class="col-md-8">
                  <input id="usuario" name="username" type="text" placeholder="Usuario" class="form-control" value="<?=$username?>">
                </div>
                </div>


            <div class="form-group">
                  <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
              <div class="col-md-8">
                  <input id="name" name="name" type="text" placeholder="Nombre" class="form-control" value="<?=$name?>">
              </div>
            </div>


              <div class="form-group">
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                    <div class="col-md-8">
                          <input id="apellido" name="apellido" type="text" placeholder="Apellido" class="form-control" value="<?=$last_name?>">
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
                          <input id="email" name="email" type="email" placeholder="Email" class="form-control" value="<?=$email?>">
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
                                   <input id="cpassword" name="cpassword" type="password" placeholder="Confirmar Contraseña" class="form-control"></div>
                               </div>
                               <div class="form-group">
                               <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                 <div class="col-md-8">
                                 <input class="form-check-input" type="checkbox"   name="confirm" id="defaultCheck1" value="">
                  
                    <label class="form-check-label" for="defaultCheck1">
                     Acepto los terminos de uso y politicas de seguridad
                    </label>
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


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


  </body>
</html>
