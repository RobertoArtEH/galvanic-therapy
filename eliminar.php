<?php
session_start();
require('conexion.php');
	$arreglo=$_SESSION['carrito'];
	for($i=0;$i<count($arreglo);$i++){
		if($arreglo[$i]['productid']!=$_POST['productid']){
			$datosNuevos[]=array(
				'productid'=>$arreglo[$i]['productid'],
				'Productname'=>$arreglo[$i]['Productname'],
				'Price'=>$arreglo[$i]['Price'],
				'Picture'=>$arreglo[$i]['Picture'],
				'Cantidad'=>$arreglo[$i]['Cantidad']
				);
		}
	}
	if(isset($datosNuevos)){
		$_SESSION['carrito']=$datosNuevos;
	}else{
		unset($_SESSION['carrito']);
		echo '0';
	}
?>