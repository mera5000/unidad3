<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require_once "scripts.php";  ?>
	
	<?php 

require_once "../../clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT * from t_categorias";

$result=mysqli_query($conexion,$sql);
$result2=mysqli_query($conexion,$sql);
?>
</head>
<body>
    <?php require_once 'menu.php';?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header">
						Contactos
					</div>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
							Agregar nuevo <span class="fa fa-plus-circle"></span>
						</span>
						<hr>
						<div id="tablaDatatable2"></div>
					</div>
					<div class="card-footer text-muted">
						Arriba la esperanza abuelita 
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agrega nuevos contacos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevo2">
						<select class="form-control" id="cate" name="cate">
							<option disabled="">Selecciona una categoria</option>
							<?php while ($mostrar=mysqli_fetch_row($result)) { ?>
								
							<option value="<?php echo $mostrar[0];?>"> <?php echo $mostrar[1]; ?> </option>
							<?php } ?>
						</select>
						
					    <!-- <label>Categoria</label>
						<input type="text" class="form-control input-sm" id="cate" name="cate"> -->
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre">
						<label>Apellido Paterno</label>
						<input type="text" class="form-control input-sm" id="paterno" name="paterno">
						<label>Apellido Materno</label>
						<input type="text" class="form-control input-sm" id="materno" name="materno">
						<label>telefono</label>
						<input type="text" class="form-control input-sm" id="telefono" name="telefono">
						<label>e-mail</label>
						<input type="text" class="form-control input-sm" id="email" name="email">
					
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnAgregarnuevo2" class="btn btn-primary">Agregar nuevo</button>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar contacto</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU2">
						<input type="text" hidden="" id="id" name="id">

                        <select class="form-control input-sm" id="cateU" name="cateU">
					
							<?php while ($ver=mysqli_fetch_row($result2)) { ?>
								<option value="<?php echo $ver[0];?>"> <?php echo $ver[1]; ?> </option>
								<?php } ?>
						</select>
						
						<!-- <label>Categoria</label>
						<input type="text" class="form-control input-sm" id="cateU" name="cateU"> -->
                         
                    

						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
						<label>Apellido Paterno</label>
						<input type="text" class="form-control input-sm" id="paternoU" name="paternoU">
						<label>Apellido Materno</label>
						<input type="text" class="form-control input-sm" id="maternoU" name="maternoU">
						<label>telefono</label>
						<input type="text" class="form-control input-sm" id="telefonoU" name="telefonoU">
						<label>e-mail</label>
						<input type="text" class="form-control input-sm" id="emailU" name="emailU">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning" id="btnActualizar2">Actualizar</button>
				</div>
			</div>
		</div>
	</div>


</body>
</html>


<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgregarnuevo2').click(function(){
			datos=$('#frmnuevo2').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"../../procesos/contactos/agregar.php",
				success:function(r){
					if(r==1){
						$('#frmnuevo2')[0].reset();
						$('#tablaDatatable2').load('tabla.php');
						alertify.success("agregado con exito :D");
					}else{
						alertify.error("Fallo al agregar :(");
					}
				}
			});
		});

		$('#btnActualizar2').click(function(){
			datos=$('#frmnuevoU2').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"../../procesos/contactos/actualizar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable2').load('tabla.php');
						alertify.success("Actualizado con exito :D");
					}else{
						alertify.error("Fallo al actualizar :(");
					}
				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable2').load('tabla.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(id){
		$.ajax({
			type:"POST",
			data:"id=" + id,
			url:"../../procesos/contactos/obtenerDatos.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#id').val(datos['id']);
				$('#cateU').val(datos['id_categoria']);
				$('#nombreU').val(datos['nombre']);
				$('#paternoU').val(datos['apellido_paterno']);
				$('#maternoU').val(datos['apellido_materno']);
				$('#telefonoU').val(datos['telefono']);
				$('#emailU').val(datos['email']);			
			}
		});
	}

	function eliminarDatos(id){
		alertify.confirm('Eliminar contacto', '¿Seguro de eliminar este contacto :(?', function(){ 

			$.ajax({
				type:"POST",
				data:"id=" + id,
				url:"../../procesos/contactos/eliminar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable2').load('tabla.php');
						alertify.success("Eliminado con exito !");
					}else{
						alertify.error("No se pudo eliminar...");
					}
				}
			});

		}
		, function(){

		});
	}
</script>
