<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="resources/bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="img/brand/icon.png" />
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css"/>
    <!-- Sweetalert CSS -->
    <link rel="stylesheet" href="resources/sweetalert2/sweetalert2.min.css">
    <title>Iniciar sesion</title>
</head>
<body>
  <!-- Header -->
    <header class="container">
      <nav class="navbar navbar-expand-lg">
        <!-- Logo -->
        <a class="navbar-brand mx-lg-auto" href="index.php">
          <img src="img/brand/logo.png" class="logo" alt="Logo"/>
        </a>
        <!-- Header SM -->
        <ul class="nav">
          <li class="nav-item d-flex align-items-center">
            <!-- Buscar -->
            <div class="d-lg-none">
              <img src="img/icons/search.svg" class="icon-sm" alt="Buscar"/>
            </div>
          </li>
          <li class="nav-item d-flex align-items-center">
            <!-- Carrito de compras -->
            <a class="cart d-lg-none" href="cart.php">
              <img src="img/icons/cart.svg" class="icon-sm" alt="Carrito"/>
            </a>
          </li>
          <li class="nav-item">
            <!-- Boton de menu -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse_trg">
              <img src="img/icons/menu.svg" class="icon-sm" alt="Menú"/>
            </button>
          </li>
        </ul>
      </nav>
    </header>
    <!-- Elementos de menú SM -->
    <nav class="navbar container navbar-expand-lg">
      <div class="collapse navbar-collapse" id="collapse_trg">
        <!-- Buscar -->
        <div class="search-bar d-none d-lg-block">
          <input id="searchInput" class="search-input" type="text" placeholder="Buscar...">
          <a id="searchIcon" class="search-icon">
            <img src="img/icons/search.svg" alt="Buscar"/>
          </a>
        </div>
        <!-- Secciones -->
        <ul class="navbar-nav sections mx-lg-auto">
          <li class="nav-item active">
            <a class="nav-link bg-link" href="index.php">Inicio</a>
          </li>
          <!-- Dropdown de Productos -->
          <li class="nav-item dropdown">
            <a class="nav-link bg-link" data-toggle="dropdown" href="#">Productos</a>
            <div class="dropdown-menu">
              <h4 class="dropdown-header">Categorias</h4>
              <?php
              require ('validar-categorias.php');
              foreach($resultado as $producto){
                ?>
              <a class="dropdown-item bg-link" href="catalogo.php?categoryid=<?php echo $producto['categoryid'];?>"><?php echo $producto['categoryname'];?></a>
              <?php
              }
              ?>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-link" href="tendencias.php">Tendencias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-link" href="nuevo.php">Lo nuevo</a>
          </li>
        </ul>
        <!-- Carrito de compras lg -->
        <a class="cart d-none d-lg-block" href="cart.php">
          <img src="img/icons/cart.svg" height="16px" alt="Cart"/>
          <span class="badge badge-dark cart-count-log"><?php echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);  ?></span>  
        </a>
        <!-- Boton de log-in LG -->
        <div class="d-none d-lg-block">
          <a class="btn btn-dark" href="login.php" role="button">Iniciar sesión</a>
        </div>
        <!-- Boton de log-in SM -->
        <ul class="navbar-nav sections mx-lg-auto d-lg-none">
          <li class="nav-item">
            <div class="dropdown-divider"></div>
            <a class="nav-link bg-link" href="login.php">Iniciar sesión</a>
          </li>
        </ul>
      </div>
    </nav>
  <div class="global-container">       
    <article class="formulario-login p-4">
        <section class="card container pt-2 register col-md-8 col-sm-8 col-lg-4">
          <div class="d-flex justify-content-center pt-2">
            <img class="logo-login" src="./img/brand/logo.png">
          </div>
            <form class="content-form needs-validation" action="login.php" method="POST" name="formulario" id="formulario" autocomplete="off">
                <fieldset>
                    <legend class="h4 text-center p-3">
                      Iniciar sesion
                    </legend>
                    <form>
                      <div id="invalid-alert" class="alert alert-danger d-none" role="alert">
                        Usuario o contraseña incorrecta.
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Correo electrónico o usuario</label>
                        <input type="text" id="access" class="form-control form-control-sm" name="email" aria-describedby="emailHelp" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Contraseña</label>
                          <a class="text-link" href="#" style="float:right;font-size:12px;">¿Olvidaste tu contraseña?</a>
                          <input type="password" id="password" class="form-control form-control-sm" name="password" required>
                      </div>
                      <button type="submit" id="login-btn" class="btn btn-dark boton-iniciar btn-block">Iniciar sesión</button>
                      
                      <div class="sign-up p-4 text-center">
                          ¿No tienes una cuenta? <a class="text-link" href="registro.php">Crear una</a>
                      </div>
                  </form>
                </fieldset>
            </form>
        </section>
    </article>
    </div>
    <!-- Footer -->
    <footer>
      <!--FOOTER TEXT-->
      <div class="container-fluid text-center">
        <div class="row justify-content-center">
          <div class="col">
            <img src="img/brand/logo-secundary.png" height="80">
          </div>
          <hr class="clearfix w-100 d-md-none">
          <div class="col col-md-4 mt-3 text-center">
              <h5 class="font-weight-bold">ACERCA DE LA EMPRESA</h5>
              <p>Somos una empresa distribuidora de productos de belleza, abierta para el publico en general.</p>
          </div>
          <hr class="clearfix w-100 d-md-none">
          <div class="col col-md-4 mb-md-0 text-center">
            <h5 class="font-weight-bold text-uppercase">CONTACTANOS</h5>
            <img class="m-2" src="img/icons/facebook-logo.svg" height="30">
            <img class="m-2" src="img/icons/instagram.svg" height="30">
            <img class="m-2" src="img/icons/telefono.svg" height="30">
            <img class="m-2" src="img/icons/mail.svg" height="30">
          </div>
        </div>
      </div>
    </footer>
    <div class="home text-center py-3">
        <a class="text-decoration-none text-white" href="#">Inicio de pagina</a>
      </div>
    <!-- Bootstrap JS -->
    <script src="resources/jquery-3.4.1/jquery-3.4.1.min.js"></script>
    <script src="resources/popper-1.15.0/popper.min.js"></script>
    <script src="resources/bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <!-- Scripts -->
    <script src="js/search.js"></script>
    <script src="js/form.js"></script>
</body>
</html>