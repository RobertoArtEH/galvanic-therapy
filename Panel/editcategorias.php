<?php include 'conexion.php';
$id=$_GET['id'];
$sentencia=$pdo->prepare("SELECT *FROM categories WHERE categoryid='".$id."'");
$sentencia->execute();
while($row=$sentencia->fetch(PDO::FETCH_ASSOC))
{
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar</title>
    <script src="https://kit.fontawesome.com/a2a999c481.js"></script>
    <link rel="stylesheet" href="css/bootstrapstor.min.css">
</head>
<body>
<div class="container border border-primary mt-1 col-6">
<form method="POST" ectype="multipart/form-data">
    <h1>Editar categoria</h1>
    <label for=""class="control-label invisible">ID</label>
    <input type="hidden" class="form-control" id="id" name="id" placeholder="" value="<?php echo $row['categoryid']?>" require="">
    <label for="" class="control-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" require="" value="<?php echo $row['categoryname']?>" >
    <label for="" class="control-label">Descripcion</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="" require="" value="<?php echo $row['descriptions']?>">
    <label for="" class="control-label">Imagen</label>
    <input type="file" class="form-control" id="imagen" name="imagen" placeholder=""require="" value="<?php echo $row['picturecategorie']?>" >    
    <input type="hidden" class="form-control" id="status" name="status" placeholder=""require="" value="<?php echo $row['Status']?>" >    
       </div>   
        <div class="modal-footer mt-1">
        <div class="form-group"> <!-- Submit Button -->
        <button type="submit" name="" class="btn btn-primary">Actualizar</button>
        <a href="index.php"><button type="button" value="Cancelar" name="accion" class="btn btn-danger">Regresar</button></a>
   
    </form>
<?php }?>
<?php
$nombre =(isset($_POST['nombre']))?$_POST['nombre']:"";
$descripcion =(isset($_POST['descripcion']))?$_POST['descripcion']:"";
$imagen =(isset($_POST['imagen']))?$_POST['imagen']:"";
$status =(isset($_POST['status']))?$_POST['status']:"";
if($nombre!=null || $id=null || $descripcion!=null ||
$imagen!=null)
{
    $sentencia=$pdo->prepare ("UPDATE categories SET categoryname='".$nombre."',descriptions='".$descripcion."',
    picturecategorie='".$imagen."',Status='".$status."' WHERE  categoryid='".$id."'");
    $sentencia->execute();
    if($nombre=1)
    {
        $nombre="";
        header("location:categorias.php");
    }
}?>

</div>    
</div>    
</body>
</html>