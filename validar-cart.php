<?php
session_start();

if (isset($_POST)) {
  require('conexion.php');

  $productName = $_POST['productName'];
  $quantity = $_POST['quantity'];

  $stmt = $conexion -> prepare('SELECT productid, productname, picture, price
                                FROM products WHERE productname = :productname 
                                AND unitsinstock >= :quantity');
  $stmt -> execute([':productname'=>$productName, ':quantity'=>$quantity]);
  $stmtResult = $stmt -> fetch();

  if($stmtResult) {
    $stmt = $conexion -> prepare('SELECT * FROM products WHERE productname = :productname');
    $stmt -> execute([':productname'=>$productName]);
    $stmtResult = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    $product = $stmtResult[0];

    // header('Content-type: application/json');
    // echo json_encode($product);

    $productid = $product['productid'];
    $picture = $product['picture'];
    $price = $product['price'];

    if(!isset($_SESSION['CARRITO'])) {
      $producto = array(
        'ID'=>$productid,
        'IMAGEN'=>$picture,
        'NOMBRE'=>$productName,
        'PRECIO'=>$price,
        'CANTIDAD'=>$quantity
      );
      $_SESSION['CARRITO'][0]=$producto;
    } else {
      $found = false;
      for ($k=0; $k < sizeof($_SESSION['CARRITO']) ; $k++) { 
        if ($productid == $_SESSION['CARRITO'][$k]['ID']) {
          $_SESSION['CARRITO'][$k]['CANTIDAD']+= $quantity;
          $found = true;
          break;
        }
      }

      if (!$found) {
        $_SESSION['CARRITO'][sizeof($_SESSION['CARRITO'])] = array 
        (
          'ID'=>$productid,
          'IMAGEN'=>$picture,
          'NOMBRE'=>$productName,
          'PRECIO'=>$price,
          'CANTIDAD'=>$quantity
        );
      } 
    }
  } else {
    echo 'error';
  }
}