<?php 
	$raiz = "C:/xampp/htdocs/dashboard/conflicto_arm/";
	include_once($raiz."Clases/session.class.php");
	$session = new Session();
	$consulta = $_POST['consulta'];
	$nombre = $_POST['nombre'];
	$apellido= $_POST['apellido'];
	$nombre_avatar= $_POST['nombre_avatar'];
	$avatar= $_POST['avatar'];
	$sexo= $_POST['sexo'];
	$email= $_POST['email'];
	$fecha_nac= $_POST['fecha_nac'];
	$password= $_POST['password'];
	$confirmar_password= $_POST['confirmar_password'];
	$permiso = $_POST['permiso'];

	$datos = array();
	if(isset($consulta) && $consulta == "registro"){
		$datos = $session->registroSession($nombre, $apellido, $nombre_avatar, $avatar, $sexo, $email, $fecha_nac, $password, $confirmar_password, $permiso);
	}

	echo json_encode($datos);
?>