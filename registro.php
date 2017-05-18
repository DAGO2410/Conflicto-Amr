<?php
	$raiz = "C:/xampp/htdocs/dashboard/conflicto_arm/";
	include_once($raiz."clases/Formularios.class.php");
	$formularios = new Formularios();
?>
<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="../js/jquery-3.0.0.min.js"></script>
		<script type="text/javascript" src="../js/registro.js"></script>
		<script type="text/javascript" src="../js/ajax.js"></script>
	</head>
	<body>
		<section>
			<article>
				<h2>Registrarse</h2>
				<?php echo $formularios->crearFormRegistro(); ?>
			</article>
		</section>
	</body>
</html>