<?php
$raiz = "C:/xampp/htdocs/dashboard/conflicto_arm/";
include_once($raiz.'Clases/ConnectDB.class.php');
class Session{
	public $conectar = "";
	public function __construct(){
		$this->conectar = new ConnectDB();
		$conexion = $this->conectar->conexion();
	}

	public function iniciarSession($nombre_avatar, $password){
		$sql = "SELECT u.id, 
					u.nombre, 
					u.apellido,
					u.nombre_avatar,
					u.avatar,
					u.fecha_nacimiento,
					u.sexo,
					u.correo_electronico,
					p.codigo_permiso
				FROM usuarios u
				INNER JOIN permisos p ON p.id = u.permisos_id
				WHERE nombre_avatar = '".$nombre_avatar."' OR correo_electronico = '".$nombre_avatar."' AND password = '".$password."'";
			$ejecucion = $this->conectar->consultar($sql);
			if(count($ejecucion) > 0){
				session_start();
				$_SESSION['usuario_id'] = $ejecucion["id"];
			    $_SESSION['usuario_nombre'] = $ejecucion["nombre"];
			    $_SESSION['usuario_apellido'] = $ejecucion["apellido"];
			    $_SESSION['usuario_nombre_avatar'] = $ejecucion["nombre_avatar"];
			    $_SESSION['usuario_avatar'] = $ejecucion["avatar"];
			    $_SESSION['usuario_fecha_nacimiento'] = $ejecucion["fecha_nacimiento"];
			    $_SESSION['usuario_sexo'] = $ejecucion["sexo"];
			    $_SESSION['usuario_correo'] = $ejecucion["correo_electronico"];
			    $_SESSION['usuario_permisos'] = $ejecucion["codigo_permiso"];

			    return $datos = array("mensaje"=>"ok");
			}
	}
	
	public function registroSession($nombre, $apellido, $nombre_avatar, $avatar="", $sexo, $email, $fecha_nac,$password, $confirmar_password, $permiso){
		$sql_insert = "INSERT INTO usuarios (nombre,
											apellido,
											nombre_avatar,
											avatar,
											sexo,
											correo_electronico,
											fecha_nacimiento,
											password,
											confirmar_password,
											permisos_id
											)VALUES('".$nombre."',
											'".$apellido."',
											'".$nombre_avatar."',
											'".$avatar."',
											'".$sexo."',
											'".$email."',
											'".$fecha_nac."',
											'".$password."',
											'".$confirmar_password."',
											'".$permiso."')";
		$ejecucion = $this->conectar->ejecutarQuery($sql_insert);
		if($ejecucion){
			return $datos = array("mensaje"=>"ok");
		}else{
			return $datos = array("mensaje"=>"error");
		}
	}
	
	public function verificarUsuarios($autenticacion, $password){
		$sql = "SELECT 
					count(1) as contar 
				FROM 
					usuarios 
				WHERE
					nombre_avatar = '".$autenticacion."' OR correo_electronico = '".$autenticacion."' AND password = '".$password."'";
		$ejecucion = $this->conectar->consultar($sql);
		if($ejecucion["contar"]>0){
			$iniciarSession = $this->iniciarSession($autenticacion, $password);
			return $iniciarSession;
		}else{
			return $datos = array("mensaje"=>"Error");
		}
	}

	public function cierreSession(){
		session_start();
		if(isset($_SESSION['usuario_id']) && $_SESSION['usuario_id'] != ""){
			$_SESSION['usuario_id'] = "";
		    $_SESSION['usuario_nombre'] = "";
		    $_SESSION['usuario_apellido'] = "";
		    $_SESSION['usuario_nombre_avatar'] = "";
		    $_SESSION['usuario_avatar'] = "";
		    $_SESSION['usuario_fecha_nacimiento'] = "";
		    $_SESSION['usuario_sexo'] = "";
		    $_SESSION['usuario_correo'] = "";
		    $_SESSION['usuario_permisos'] = "";
		}
	    session_destroy();

	    return $datos = array("mensaje"=>"ok");
	}
}
?>