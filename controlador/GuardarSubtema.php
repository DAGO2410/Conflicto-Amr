<?php 
	$raiz = "C:/xampp/htdocs/dashboard/conflicto_arm/";
	include_once($raiz."Clases/conflicto_arm.class.php");
	$conlictoArm = new ConflictoArm();
	$consulta = $_POST['consulta'];
	$nombre_subtema = $_POST['nombre_subtema'];
	$id = $_POST["id"];
	$video = $_POST["video"];
	$texto = $_POST["texto"];
	$tema = $_POST['tema'];

	$datos = array();
	if(isset($consulta) && $consulta == "guardarSubtema"){
		$datos = $conlictoArm->guardarSubtema($id, $nombre_subtema,$video,$texto,$tema);
	}

	echo json_encode($datos);
?>