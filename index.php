<?php
	$raiz = "C:/xampp/htdocs/dashboard/conflicto_arm/";
	include_once($raiz.'Clases/ConnectDB.class.php');
	include_once($raiz.'Clases/conflicto_arm.class.php');
	include_once($raiz.'clases/formularios.class.php');
	include_once($raiz."vistas/session.php");
	$BD = new ConnectDB();
	$formularios = new Formularios();
	$crearForm = $formularios->crearFormLogin();
	$conexion = $BD->conexion();
	if($conexion){
		$ConflictoArm = new ConflictoArm();
		if(isset($_SESSION["usuario_id"]) && $_SESSION["usuario_id"] != ""){
			header("location:".$raiz."vistas/inicio.php");
		}else{
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Conflicto armado</title>
		<link rel="stylesheet" type="text/css" href="CSS/principal.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="CSS/estilo.css" media="screen" />
		<script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
		<script type="text/javascript" src="js/conflict_arm.js"></script>
		<script type="text/javascript" src="js/ajax.js"></script>
	</head>
	<body>
		<?php include_once($raiz."vistas/header.php"); ?>
		<section>
			<article>
				<?php echo $crearForm; ?>
			</article>
		</section>
		<?php include_once($raiz."vistas/footer.php"); ?>
	</body>
</html>
<?php
		}
	}else{
		echo "Problemas con la conexion a base de datos ".mysql_error();
	}
?>