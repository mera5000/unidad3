<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/crud.php";
	$obj= new crud();
	if(!empty($_POST['cate']) && !empty($_POST['nombre']) && !empty($_POST['paterno']) && !empty($_POST['materno']) && !empty($_POST['telefono']) && !empty($_POST['email'])){
	$datos=array(
		$_POST['cate'],
		$_POST['nombre'],
		$_POST['paterno'],
		$_POST['materno'],
		$_POST['telefono'],
		$_POST['email']
				);


	echo $obj->agregarContactos($datos);
   
			}else{
				echo null;
			}
 ?>
