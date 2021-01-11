<?php 
	
	require_once "../../clases/conexion.php";
	require_once "../../clases/crud.php";

	$obj= new crud();

	echo $obj->eliminarContacto($_POST['id']);

 ?>

