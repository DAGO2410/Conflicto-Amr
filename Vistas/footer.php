<?php
	
?>
<footer>
	<div class="div_principal_footer">
		<div class='copyright'>Conflicto Arm</div>
		<div class="menu-footer">
			<ul>
				<?php if(isset($_SESSION["usuario_id"]) && $_SESSION["usuario_id"] != ""){?>
					<a href="http://localhost/dashboard/conflicto_arm/vistas/jugar.php?tipo=inicio"><li>Como inicio</li></a>
					<a href="http://localhost/dashboard/conflicto_arm/vistas/jugar.php?tipo=nudo"><li>Guerra entre grupos</li></a>
					<a href="http://localhost/dashboard/conflicto_arm/vistas/jugar.php?tipo=desenlace"><li>Proceso de paz</li></a>
				<?php }?>
				<?php if(!isset($_SESSION["usuario_id"]) || $_SESSION["usuario_id"] == ""){?>
					<a href="http://localhost/dashboard/conflicto_arm/vistas/registro.php"><li>Registrarse</li></a>
					<a href="http://localhost/dashboard/conflicto_arm/index.php"><li>Inicio Session</li></a>
				<?php }?>
			</ul>
		</div>
		<div class="version-conflicto">Version 1.0</div>
		<div class="author">CONFLICTO ARM BY DAGO ARIAS</div>
	</div>
</footer>