<?php
	$raiz = "C:/xampp/htdocs/dashboard/conflicto_arm/";
	include_once($raiz."Clases/Formularios.class.php");
	include_once($raiz."clases/conflicto_arm.class.php");
	include_once($raiz."vistas/session.php");
	$formularios = new ConflictoArm();
	if(isset($_SESSION['usuario_id']) && $_SESSION['usuario_id'] != ""){
		$formulario = $formularios->obtenerSubtemas($_GET["id"],$_SESSION["usuario_id"]);
	
?>
	<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="../CSS/jugar_preguntas.css" media="screen" />
			<link rel="stylesheet" type="text/css" href="../CSS/principal.css" media="screen" />
			<script type="text/javascript" src="../js/jquery-3.0.0.min.js"></script>
			<script type="text/javascript" src="../js/ajax.js"></script>
			<script type="text/javascript" src="../js/jugar_preguntas.js"></script>
			<script type="text/javascript" src="../js/conflict_arm.js"></script>
		</head>
		<body>
			<?php include_once($raiz."vistas/header.php"); ?>
			<section id="section_preguntas">
				<article id="article_preguntas">
					<?php echo $formulario; ?>
				</article>
			</section>
			<?php include_once($raiz."vistas/footer.php"); ?>
		</body>
	</html>
<?php
	}else{
		header("location:".$raiz."index.php");
	}
?>