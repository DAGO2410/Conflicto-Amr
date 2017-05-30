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
	if(isset($consulta) && $consulta == "crearFormCambio"){
		$datos = $formularios->crearFormCambioP($usuario_id);
	}
	
	if(isset($consulta) && $consulta == "cambiarPassword"){
		$password_actual = $_POST["password_actual"];
		$password_nueva = $_POST["password_nueva"];
		$password_confirmar = $_POST["password_confirmar"];
		$datos = $conflictoArm->cambiarPassword($usuario_id, $password_actual, $password_nueva,$password_confirmar);
	}

	echo json_encode($datos);
?>