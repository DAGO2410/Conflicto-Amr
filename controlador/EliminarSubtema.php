<?php 
	$raiz = "C:/xampp/htdocs/dashboard/conflicto_arm/";
	include_once($raiz."Clases/conflicto_arm.class.php");
	$conlictoArm = new ConflictoArm();
	$consulta = $_POST['consulta'];
	$id = $_POST['id'];

	$datos = array();
	if(isset($consulta) && $consulta == "eliminarSubtema"){
		$datos = $conlictoArm->eliminarSubtema($id);
	}

	echo json_encode($datos);
?>