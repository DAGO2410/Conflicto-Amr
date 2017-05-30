<?php 
	$raiz = "C:/xampp/htdocs/dashboard/conflicto_arm/";
	include_once($raiz."Clases/conflicto_arm.class.php");
	include_once($raiz."Clases/Formularios.class.php");
	include_once($raiz."Clases/conflicto_arm.class.php");
	$formularios = new Formularios();
	$conflictoArm = new ConflictoArm();
	if($_POST){
		$consulta = $_POST['consulta'];
		$nombre_pregunta = $_POST['nombre_pregunta'];
		$nombre_subtema = $_POST["nombre_subtema"];
		$texto_pregunta = $_POST["texto_pregunta"];
		$respuesta_1 = $_POST['respuesta_1'];
		$respuesta_2 = $_POST['respuesta_2'];
		$respuesta_3 = $_POST['respuesta_3'];
		$respuesta_4 = $_POST['respuesta_4'];
		$pregunta_correcta = $_POST["pregunta_correcta"];

		
		$datos = array();
		if(isset($consulta) && $consulta == "guardarPreguntas"){
			$datos = $conflictoArm->guardarPreguntas($nombre_pregunta, $nombre_subtema,$texto_pregunta, $respuesta_1, $respuesta_2, $respuesta_3, $respuesta_4, $pregunta_correcta);
		}

		echo json_encode($datos);
	}
?>