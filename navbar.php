<?php include_once 'soporte.php';?>
<body>


<header>
  <nav class="navbar navbar-inverse navbar-static-top" role="navigation">

    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle= "collapse" data-target= "#navegacion fm" >
          <span class="sr-only"> Desplegar 7Ocultar Menu</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="index.php" class="navbar-brand">
          RetroStore
        </a>
      </div>
<!--inicia menu -->
    <div class="collapse navbar-collapse" id="navegacion fm">
    <ul class="nav navbar-nav">
    <li class="active"> <a href="index.php">Home</a> </li>
    <li> <a href="#">Camisetas</a> </li>
    <li> <a href="#">Botines</a> </li>
      <li> <a href="#">Pelotas</a> </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
        Categorias <span class="caret"></span>
      </a>
      <ul class="dropdown-menu" role="menu" type=none>
        <li><a href=#camisetas class="inicio">Camisetas</a> </li>
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
  <a class="btn btn-primary" href="ayuda.php"><span class="glyphicon glyphicon-question-sign"></span></a>
</form>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<?php if(!$auth->loginController()): 
            // Aca uso el controller de login para darle dinamica a la navbar.
            // Solo muestro Login y Register a usuarios no autenticados!
        ?>
  <ul class="nav navbar-nav navbar-right">
    <li> <a href="login.php">Ingreso</a> </li>
    <li> <a href="registro.php">Registro</a> </li>
  </ul>
  <?php endif;?>
  <?php if($auth->loginController()):?>
    <ul class="nav navbar-nav navbar-right">
    <li> <a href="perfil.php">Perfil</a> </li>
    <li> <a href="logout.php">Salir</a> </li>
  </ul>
  <?php endif;?>

</div>
 </div>
  </nav>
</header>
