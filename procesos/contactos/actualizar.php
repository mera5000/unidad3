<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/crud.php";
	$obj= new crud();
	if(!empty($_POST['cateU']) && !empty($_POST['nombreU']) && !empty($_POST['paternoU']) && !empty($_POST['maternoU']) && !empty($_POST['telefonoU']) && !empty($_POST['emailU']) && !empty($_POST['id'])){
	$datos=array(
		$_POST['cateU'],
		$_POST['nombreU'],
		$_POST['paternoU'],
		$_POST['maternoU'],
		$_POST['telefonoU'],
		$_POST['emailU'],
		$_POST['id']
				);

	echo $obj->actualizarContactos($datos);
	
			}else{
echo null;
			}
			

 ?>
