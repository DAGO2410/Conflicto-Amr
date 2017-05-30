<?php
	$raiz = "C:/xampp/htdocs/dashboard/conflicto_arm/";
	include_once($raiz."clases/Formularios.class.php");
	include_once($raiz."vistas/session.php");
	$formularios = new Formularios();
	if(!isset($_SESSION["usuario_id"]) || $_SESSION["usuario_id"] == ""){
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../CSS/principal.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../CSS/registro.css" media="screen" />
		<script type="text/javascript" src="../js/jquery-3.0.0.min.js"></script>
		<script type="text/javascript" src="../js/registro.js"></script>
		<script type="text/javascript" src="../js/ajax.js"></script>
	</head>
	<body>
		<?php include_once($raiz."vistas/header.php");?>
		<section id="section_registro">
			<article id="article_registro">
				<h4>Registrarse</h4>
				<?php echo $formularios->crearFormRegistro(); ?>
			</article>
		</section>
		<?php include_once($raiz."vistas/footer.php"); ?>
	</body>
</html>
<?php
	}else{
		header("location:".$raiz."vistas/inicio.php");
	}
?>