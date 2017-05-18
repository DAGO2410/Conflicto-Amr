<?php 
	$raiz = "C:/xampp/htdocs/dashboard/conflicto_arm/";
	include_once($raiz."Clases/session.class.php");
	$session = new Session();
	$consulta = $_POST['consulta'];
		
	$datos = array();
	if(isset($consulta) && $consulta == "logear"){
		$autenticacion = $_POST['usuario'];
		$password = $_POST['password'];
		$datos = $session->verificarUsuarios($autenticacion, $password);
	}

	if(isset($consulta) && $consulta == "cierreSession"){
		$datos = $session->cierreSession();
	}

	echo json_encode($datos);
?>