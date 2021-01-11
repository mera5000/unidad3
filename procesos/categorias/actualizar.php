<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/crud.php";
	$obj= new crud();

	if(!empty($_POST['nombreU']) && !empty($_POST['descripcionU']) && !empty($_POST['fechaU']) && !empty($_POST['id'])){
		$datos=array(
			$_POST['nombreU'],
			$_POST['descripcionU'],
			$_POST['fechaU'],
			$_POST['id']
					);
	
		echo $obj->actualizar($datos);
	}else{
  
		echo null;
	}

	
	

 ?>
