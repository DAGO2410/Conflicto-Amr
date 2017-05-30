<?php
	$raiz= "C:/xampp/htdocs/dashboard/conflicto_arm/";
	include_once($raiz."clases/formularios.class.php");
	$formularios = new Formularios();
?>
<header>
	<a href="http://localhost/dashboard/conflicto_arm/vistas/inicio.php"><div class="title_conflicto"><b>CONFLICTO ARM</b></div></a>
	<nav>
		<ul>
			<?php if(isset($_SESSION["usuario_id"])  && $_SESSION["usuario_id"] != ""){?>
				<a href="http://localhost/dashboard/conflicto_arm/vistas/jugar.php?tipo=inicio"><li>Como inicio</li></a>
				<a href="http://localhost/dashboard/conflicto_arm/vistas/jugar.php?tipo=nudo"><li>Guerra entre grupos</li></a>
				<a href="http://localhost/dashboard/conflicto_arm/vistas/jugar.php?tipo=desenlace"><li>Procesos de Paz</li></a>
				<a href="http://localhost/dashboard/conflicto_arm/vistas/ranking.php"><li>Ranking</li></a>
			<?php } ?>
			<?php if(!isset($_SESSION["usuario_id"]) || $_SESSION["usuario_id"] == ""){?>
				<a href="http://localhost/dashboard/conflicto_arm/vistas/registro.php"><li>Registrarse</li></a>
			<?php } ?>
		</ul>
	</nav>
	<?php if(!isset($_SESSION["usuario_id"]) || $_SESSION["usuario_id"] == ""){?>
		<div class="inicio_session">
			<button id="button_inicio_session" name="button_inicio_session">Iniciar Session</button>
		</div>
	<?php }else{ ?>
		<div  class='inicio_session' id='div_usuario_logeado' name='div_usuario_logeado'>
			<a id="a_usuario" href="http://localhost/dashboard/conflicto_arm/vistas/configuracion.php"><label id='label_nombre_usuario' name='label_nombre_usuario' title="configurar cuenta"><?php echo $_SESSION["usuario_nombre_avatar"]?></label></a>
			<button id='button_cierre_session' name='button_cierre_session'>Cerrar Session</button>
		</div>
	<?php }?>
</header>