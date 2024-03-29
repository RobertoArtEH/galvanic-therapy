<?php include('conexion.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categorias</title>
    <link rel="stylesheet" href="css/bootstrapstor.min.css"> 
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="js/sweetalert2.all.js"></script>
    <link rel="stylesheet" href="css/sweetalert2.css">

     <!-- Font Awesome -->
</head>
<body>
<?php require_once 'views/layout/header.php' ?>
  <div class="container content-container">
      <h4 class="mb-4 mt-2 text-center">Categorias</h4>
</div>
<div class="row">
    <div class="container">
        <div class="container">
            <div class="row">
            <h3 style="text-align: right;width:10%">
        <button id="agregar" type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">
           <i class="fa fa-plus" height="50px"> </i>Agregar
        </button>
    </h3>

    <ul class="navbar-nav ml-auto">
  <form class="form-inline my-2 my-lg-0">
        <input type="search" id="search" class="form-control mr-sm-2"
        placeholder="Buscar..."
        required
        title="solo letras">
      </form>
  </ul>
            </div>

    <!-- MODAL -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div>
    <div class="modal-content">
    <div class="modal-header justify-content-center">
    <h5 class="modal-title" id="TituloModal">Agregar Categoria</h5>
    </div>
    <div class="container"> 
    <form id="products-form" action="" method="post" enctype="multipart/form-data">
    <label for="" id="lbid" class="control-label">ID</label>
    <input type="text" class="form-control" id="id" name="id"placeholder="" required pattern="[0-9]+" 
    title="solo numeros.">
    <label for="" class="control-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre"placeholder="" 
    required pattern="[A-Za-z]+"
    title="solo letras.">
    <label for="" class="control-label">Descripcion</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion"placeholder=""
    required pattern="[A-Za-z0-9]+">
    <label for="imagen" class="control-label">imagen</label>
    <input type="file" accept="image/*" class="form-control" id="imagen" name="imagen" required="" placeholder="" >    
    </div>
    <div class="modal-footer">
        <div class="form-group"> <!-- Submit Button -->
        <button type="submit" value="btnagregar" id="buttonmodal" name="accion" class="btn btn-primary">Crear</button>
        
        <button type="button" data-dismiss="modal" value="btncancelar" name="accion" class="btn btn-danger">Cancelar</button>
    </form>
         </div>
         </div>
         </div>
         </div>
         </div>

    </div>
<table class="table table table-striped table-bordered table-hover text-center">
            <thead class="thead-dark" >
                <tr>
                <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>                                   
                    <th>status</th>                  
                    <th>Accion</th>
                </tr>              
                </thead>
                <!-- LISTA PRODUCTOS -->
                <tbody id="categories">
                        
                </tbody>
</table>

 <table class="table table table-striped table-bordered table-hover text-center">
            <thead class="thead-dark" >
                <tr>
                <th>Categoria</th>
                    <th>Total Productos</th>
                    </tr>        
                    </thead>
                    <?php
                $sentencia=$pdo ->prepare('CREATE VIEW ProductosXCategorias as select categories.categoryname, count(products.productid) from products inner join
                categories on products.categoryid = categories.categoryid group by categoryname');
                $sentencia ->execute();
                $view = $sentencia ->fetchAll();
                    
                    $sentenciaview=$pdo->prepare('SELECT *FROM ProductosXCategorias');
                $sentenciaview ->execute();
                $view = $sentenciaview ->fetchAll();

                foreach($view as $view){
                ?>
                    <tbody>     
                    <tr>
                    <td><?php echo $view['categoryname'];  ?></td> 
                    <td><?php echo $view['count(products.productid)'];  ?></td>
                    </tbody>
                    <?php
  }
?>         
</table>

</body>
<script src="../resources/jquery-3.4.1/jquery-3.4.1.min.js"></script>
<script src="../resources/popper-1.15.0/popper.min.js"></script>
<script src="../resources/bootstrap-4.3.1/js/bootstrap.min.js"></script>
<script src="js/categorias.js"></script>
</html>    