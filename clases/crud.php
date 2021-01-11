<?php

class crud {

    public function agregar($datos) {
        $obj = new conectar();
        $conexion = $obj->conexion();

        $sql = "INSERT into t_categorias (nombre,descripcion,fecha)
									values ('$datos[0]',
											'$datos[1]',
											'$datos[2]')";
        return mysqli_query($conexion, $sql);
    }

    public function agregarContactos($datos) {
        $obj = new conectar();
        $conexion = $obj->conexion();

        $sql = "INSERT into t_agenda values (null,'$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]',CURDATE())";
                                       
        return mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    }

    public function obtenDatos($id) {
        $obj = new conectar();
        $conexion = $obj->conexion();

        $sql = "SELECT * from t_categorias
					where id='$id'";
        $result = mysqli_query($conexion, $sql);
        $ver = mysqli_fetch_row($result);

        $datos = array(
            'id' => $ver[0],
            'nombre' => $ver[1],
            'descripcion' => $ver[2],
            'fecha' => $ver[3]
        );
        return $datos;
    }

    public function obtenDatosContacto($id) {
        $obj = new conectar();
        $conexion = $obj->conexion();
        // $sql="select t_agenda.id,t_agenda.nombre,t_agenda.apellido_paterno, t_agenda.apellido_materno, t_agenda.telefono,t_agenda.email, t_categorias.nombre from t_agenda inner join t_categorias on t_agenda.id_categoria=t_categorias.'$id' ";
 


        $sql = "SELECT * from t_agenda
					where id='$id'";
        $result = mysqli_query($conexion, $sql);
        $ver = mysqli_fetch_row($result);

        $datos = array(
            'id' => $ver[0],
            'id_categoria' => $ver[1],
            'nombre' => $ver[2],
            'apellido_paterno' => $ver[3],
            'apellido_materno' => $ver[4],
            'telefono' => $ver[5],
            'email' => $ver[6],
            'fecha' => $ver[7]
        );
        return $datos;
    }



    public function actualizar($datos) {
        $obj = new conectar();
        $conexion = $obj->conexion();

        $sql = "UPDATE t_categorias set nombre='$datos[0]',
	descripcion='$datos[1]',
        fecha='$datos[2]'
	where id='$datos[3]'";
        return mysqli_query($conexion, $sql);
    }

    public function actualizarContactos($datos) {
        $obj = new conectar();
        $conexion = $obj->conexion();

        $sql = "UPDATE t_agenda set id_categoria='$datos[0]',
	    nombre='$datos[1]',
        apellido_paterno='$datos[2]',
        apellido_materno='$datos[3]',
        telefono='$datos[4]',
        email='$datos[5]'
	where id='$datos[6]'";
        return mysqli_query($conexion, $sql);
    }

    public function eliminar($id) {
        $obj = new conectar();
        $conexion = $obj->conexion();

        $condicion="select count(*) as total from t_categorias where id in(select id_categoria from t_agenda)";
        $result= mysqli_query($conexion, $condicion);
        $datos= mysqli_fetch_array($result);
        if($datos['total']>0){
             
            return null;
        }else{
            $sql = "DELETE from t_categorias where id='$id'";
            return mysqli_query($conexion, $sql);
        }


    
    }

    public function eliminarContacto($id) {
        $obj = new conectar();
        $conexion = $obj->conexion();

        $sql = "DELETE from t_agenda where id='$id'";
        return mysqli_query($conexion, $sql);
    }

}

?>

