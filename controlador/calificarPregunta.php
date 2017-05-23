<?php
	session_start();
	$raiz = "C:/xampp/htdocs/dashboard/conflicto_arm/";
	include_once($raiz."Clases/conflicto_arm.class.php");
	include_once($raiz."Clases/Formularios.class.php");
	include_once($raiz."Clases/conflicto_arm.class.php");
	$formularios = new Formularios();
	$conflictoArm = new ConflictoArm();
	$consulta = $_POST['consulta'];
	$usuario_id = $_SESSION['usuario_id'];
	$pregunta_id = $_POST["pregunta_id"];
	$respuesta = $_POST["respuesta"];
	$nombre_pregunta = $_POST["nombre_pregunta"];

	
	$datos = array();
	if(isset($consulta) && $consulta == "calificarRespuesta"){
		$datos = $conflictoArm->calificacion($usuario_id,$pregunta_id,$respuesta, $nombre_pregunta);
	}

	echo json_encode($datos);
?>