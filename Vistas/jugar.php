<?php 
	$raiz = "C:/xampp/htdocs/dashboard/conflicto_arm/";
	include_once($raiz."Clases/Formularios.class.php");
	include_once($raiz."vistas/session.php");
	$formularios = new Formularios();
	if(isset($_SESSION['usuario_id']) && $_SESSION['usuario_id'] != ""){
		if($_GET){
			$tipo = $_GET['tipo'];
?>
	<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="../CSS/principal.css" media="screen" />
			<link rel="stylesheet" type="text/css" href="../CSS/jugar.css" media="screen" />
			<script type="text/javascript" src="../js/jquery-3.0.0.min.js"></script>
			<script type="text/javascript" src="../js/ajax.js"></script>
			<script type="text/javascript" src="../js/jugar.js"></script>
			<script type="text/javascript" src="../js/conflict_arm.js"></script>
		</head>
		<body>
			<?php include_once($raiz."vistas/header.php"); ?>
			<section id="section_jugar">
				<article id="article_jugar">
					<h4><?php if($tipo == "inicio"){
						echo "Como inicio la guerra";
					}else if($tipo == "nudo"){
						echo "Guerra entre grupo armados y fuerza publica";
					}else if($tipo == "desenlace"){
						echo "Procesos de Paz";
					}
					?></h4>
					<div id="div_jugar">
						<?php echo $formularios->crearFormJugar($_SESSION['usuario_permisos'],$tipo); ?>
					</div>
					<input type="hidden" id="input_tema" value="<?php echo $tipo; ?>"/>
				</article>
			</section>
			<?php include_once($raiz."vistas/footer.php"); ?>
		</body>
	</html>
<?php
		}else{
			header("location:".$raiz."vistas/inicio.php");
		}
	}else{
		header("location:".$raiz."index.php");
	}
?>