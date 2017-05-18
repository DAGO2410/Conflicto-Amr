<?php 
	session_start();
	$raiz = "C:/xampp/htdocs/dashboard/conflicto_arm/";
	include_once($raiz."Clases/Formularios.class.php");
	$formularios = new Formularios();
	if(isset($_SESSION['usuario_id']) && $_SESSION['usuario_id'] != ""){
?>
	<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="../CSS/inicio.css" media="screen" />
			<script type="text/javascript" src="../js/jquery-3.0.0.min.js"></script>
			<script type="text/javascript" src="../js/inicio.js"></script>
			<script type="text/javascript" src="../js/ajax.js"></script>
		</head>
		<body>
			<div id='div_usuario'>
				<label id="label_avatar">Bienvenido <?php echo $_SESSION['usuario_nombre_avatar']?></label>
				<button id='button_cierre_session'>Cerrar Session</button>
			</div>
			<?php echo $formularios->crearInicio(); ?>
		</body>
	</html>
<?php		
	}else{
		header("location:".$raiz."index.php");
	}
?>