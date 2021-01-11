<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/crud.php";
	$obj= new crud();

	if(!empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_POST['fecha'])){
	$datos=array(
		$_POST['nombre'],
		$_POST['descripcion'],
		$_POST['fecha']
				);

	echo $obj->agregar($datos);

			}else{
				echo null;
			}

 ?>
