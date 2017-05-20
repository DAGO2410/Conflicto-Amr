$(document).ready(function(){
	cierreSession();
	inicio();
	nudo();
	desenlace();
});

function cierreSession(){
	$("#button_cierre_session").on("click", function(){
		ajaxCierreSession();
	});
}

function inicio(){
	$("#input_button_inicio").on("click", function(){
		window.location="http://localhost/dashboard/conflicto_arm/vistas/jugar.php?tipo=inicio";
	});
}

function nudo(){
	$("#input_button_nudo").on("click", function(){
		window.location="http://localhost/dashboard/conflicto_arm/vistas/jugar.php?tipo=nudo";
	});
}

function desenlace(){
	$("#input_button_desenlace").on("click", function(){
		window.location="http://localhost/dashboard/conflicto_arm/vistas/jugar.php?tipo=desenlace";
	});
}