<?php 
	session_start();
	$raiz = "C:/xampp/htdocs/dashboard/conflicto_arm/";
	include_once($raiz."Clases/Formularios.class.php");
	include_once($raiz."clases/conflicto_arm.class.php");
	$formularios = new ConflictoArm();
	if(isset($_SESSION['usuario_id']) && $_SESSION['usuario_id'] != ""){
	
?>
	<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="../CSS/inicio.css" media="screen" />
			<script type="text/javascript" src="../js/jquery-3.0.0.min.js"></script>
			<script type="text/javascript" src="../js/ajax.js"></script>
			<script type="text/javascript" src="../js/jugar_preguntas.js"></script>
		</head>
		<body>
			<?php echo $formularios->obtenerSubtemas($_GET["id"]); ?>
		</body>
	</html>
<?php
	}else{
		header("location:".$raiz."index.php");
	}
?>