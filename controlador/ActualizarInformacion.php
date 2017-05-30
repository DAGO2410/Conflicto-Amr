<?php
	session_start();
	$raiz = "C:/xampp/htdocs/dashboard/conflicto_arm/";
	include_once($raiz."Clases/conflicto_arm.class.php");
	include_once($raiz."Clases/Formularios.class.php");
	include_once($raiz."Clases/conflicto_arm.class.php");
	$formularios = new Formularios();
	$conflictoArm = new ConflictoArm();
	$consulta = $_POST['consulta'];
	$usuario_id = $_POST["usuario_id"];
	
	$datos = array();
	if(isset($consulta) && $consulta == "crearFormActualizar"){
		$datos = $formularios->crearFormActualizar($usuario_id);
	}
	
	if(isset($consulta) && $consulta == "actualizarInformacion"){
		$password = $_POST["password"];
		$nombre_usuario = $_POST["nombre_usuario"];
		$apellido_usuario = $_POST["apellido_usuario"];
		$sexo = $_POST["sexo"];
		$correo_electronico = $_POST["correo_electronico"];
		$fecha_nacimiento = $_POST["fecha_nacimiento"];
		$datos = $conflictoArm->actualizarInformacion($usuario_id,$password,$nombre_usuario,$apellido_usuario,$sexo,$correo_electronico,$fecha_nacimiento);
	}

	echo json_encode($datos);
?>