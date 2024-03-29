<?php include('conexion.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
    <link rel="stylesheet" href="css/bootstrapstor.min.css"> 
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../img/brand/icon.png" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="js/sweetalert2.all.js"></script>
    <link rel="stylesheet" href="css/sweetalert2.css">

     <!-- Font Awesome -->
</head>
<body>
<?php require_once 'views/layout/header.php' ?>
<div class="container content-container">
      <h4 class="mb-4 mt-2 text-center">Usuarios</h4>
   <div>
   </div>
</div>
  <div class="row">
    <div class="container">
        <div class="container">
            <div class="row">        
      <ul class="navbar-nav ml-auto"  >
  <form class="form-inline my-2 my-lg-0">
        <input type="search" id="search" class="form-control mr-sm-2"
        placeholder="Buscar...">
      </form>
  </ul>
<div > 
      <a href="pdfs/Inventariousers.php" target="_blank"><button class="btn btn-danger mb-2"> Reporte <i class="fas fa-file-pdf fa-lg"style="color:white"></i></button></a>         
        </div>
        <table class="table table table-striped table-bordered table-hover text-center">
            <thead class="thead-dark" >
                <tr>
                <th>Usuarios</th>
                <?php
                $sentencia=$pdo ->prepare("CREATE VIEW UsuariosRegistrados as select count(users.id) from users where users.role = 'user'");
                $sentencia ->execute();
                $view = $sentencia ->fetchAll();
                    
                    $sentenciaview=$pdo->prepare('SELECT *FROM UsuariosRegistrados');
                $sentenciaview ->execute();
                $view = $sentenciaview ->fetchAll();

                foreach($view as $view){
                ?>
                    <td><?php echo $view['count(users.id)'];?></td>
                    <?php
                        }
                        ?>
                    </tr>        
                    </thead>
                    </table>    
<table class="table table table-striped table-bordered table-hover text-center">
            <thead class="thead-dark" >
                <tr>
                <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Imagen</th>                                   
                    <th>Usuario</th>                  
                    <th>Role</th>
                    <th>Status</th>
                    <th>Accion</th>
                </tr>              
                </thead>
                <!-- LISTA PRODUCTOS -->
                <tbody id="Usuarios">
                        
                </tbody>
</table>
</div>
</div>
</div>
</body>
<script src="../resources/jquery-3.4.1/jquery-3.4.1.min.js"></script>
<script src="../resources/popper-1.15.0/popper.min.js"></script>
<script src="../resources/bootstrap-4.3.1/js/bootstrap.min.js"></script>
<script src="js/users.js"></script>
</html>    