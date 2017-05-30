<?php 
	$raiz = "C:/xampp/htdocs/dashboard/conflicto_arm/";
	include_once($raiz."Clases/Formularios.class.php");
	include_once($raiz."Clases/conflicto_arm.class.php");
	include_once($raiz."vistas/session.php");
	$formularios = new Formularios();
	$conflictoArm = new ConflictoArm();
	$id="";
	$nombre_tema = "";
	$video = "";
	$texto = "";
	if(isset($_SESSION['usuario_id']) && $_SESSION['usuario_id'] != ""){
		if($_GET){
			$tema = $_GET['tema'];
			if(isset($_GET["id"]) && $_GET["id"] != ""){
				$id=$_GET["id"];
				$infoSubtema = $conflictoArm->buscarSubtema($id);
				if(count($infoSubtema) > 0){
					$nombre_tema = $infoSubtema["nombre_subtema"];
					$video = $infoSubtema["video"];
					$texto = $infoSubtema["texto"];
				}
			}
		}
?>
	<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="../CSS/agregar_subtema.css" media="screen" />
			<link rel="stylesheet" type="text/css" href="../CSS/principal.css" media="screen" />
			<script type="text/javascript" src="../js/jquery-3.0.0.min.js"></script>
			<script type="text/javascript" src="../js/ajax.js"></script>
			<script type="text/javascript" src="../js/agregar_subtema.js"></script>
			<script type="text/javascript" src="../js/conflict_arm.js"></script>
		</head>
		<body>
			<?php include_once($raiz."vistas/header.php");?>
			<section id="section_agregar">
				<article id="article_agregar">
				<h4>Agregar subtemas</h4>
					<div id="div_agrega_subtema">
						<input type="hidden" id="input_id_subtema" value="<?php echo $id; ?>">
						<label id="label_nombre_subtema">Nombre Subtema:</label>
						<input type="text" id="input_nombre_subtema" name="input_nombre_subtema" class="input" value="<?php echo $nombre_tema; ?>" /><br>
						<label id="label_video_subtema">Video:</label>
						<input type="text" id="input_video_subtema" name="input_video_subtema" class="input" value="<?php echo $video; ?>" /><br>
						<label id="label_texto_subtema">Texto:</label>
						<textarea id="text_texto_subtema" name="text_texto_subtema"><?php echo $texto; ?></textarea><br>
						<input type="hidden" id="input_tema" value="<?php echo $tema; ?>">
						<label id="label_pregunta">Preguntas:</label>
						<button id="button_preguntas" class="buttons_form">Agregar pregunta</button>
					</div><br>
					<div id="div_preguntas_creadas"></div>
					<div id="div_agregar_pregunta"></div><br>
					<div id="div_guardar_subtema">
						<button id="button_guardar_subtema" class="buttons_form">Guardar Subtema</button>
					</div>
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