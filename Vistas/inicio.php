<?php
	$raiz = "C:/xampp/htdocs/dashboard/conflicto_arm/";
	include_once($raiz."Clases/Formularios.class.php");
	include_once($raiz."Clases/Conflicto_arm.class.php");
	include_once($raiz."vistas/session.php");
	$formularios = new Formularios();
	$conflictoArm = new ConflictoArm();
	if(isset($_SESSION["usuario_id"]) && $_SESSION["usuario_id"] != ""){
?>
	<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="../CSS/inicio.css" media="screen" />
			<link rel="stylesheet" type="text/css" href="../CSS/principal.css" media="screen" />
			<script type="text/javascript" src="../js/jquery-3.0.0.min.js"></script>
			<script type="text/javascript" src="../js/inicio.js"></script>
			<script type="text/javascript" src="../js/ajax.js"></script>
			<script type="text/javascript" src="../js/conflict_arm.js"></script>
		</head>
		<body>
			<?php include_once($raiz."vistas/header.php"); ?>
			<section id="section_inicio">
				<article id="article_inicio">
					<?php echo $conflictoArm->puntuacionGeneral($_SESSION["usuario_id"], $_SESSION['usuario_permisos']); ?>
					<?php echo $formularios->crearInicio(); ?>
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