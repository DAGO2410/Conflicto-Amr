$(document).ready(function(){
	agregarSubtema();
	volver();
});

function modificarSubtema(id){
	var tema = $("#input_tema").val();
	window.location = "http://localhost/dashboard/conflicto_arm/vistas/agregar_subtema.php?tema="+tema+"&id="+id;
}

function eliminarSubtema(id){
	ajaxEliminarSubtema(id);
}

function agregarSubtema(){
	$("#button_agregar_subtema").on("click",function(){
		var tema = $("#input_tema").val();
		window.location = "http://localhost/dashboard/conflicto_arm/vistas/agregar_subtema.php?tema="+tema;
	});
}

function jugar(){
	
}

function volver(){
	$(button_volver).on("click",function(){
		window.history.back();
	});
}