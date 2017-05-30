$(document).ready(function(){
	listo();
});

function calificar(id){
	var respuesta;
	count=1;
	respuesta = $(".checks_"+id+":checked").val();
	var nombre_pregunta = $("#label_nombre_pregunta_"+id).html();
	if($(".checks_"+id+":checked").length > 1){
		alert("Debe seleccionar una sola respuesta");
		return false;
	}else if(respuesta == undefined){
		alert("Debe seleccionar una respuesta");
		return false;
	}
	ajaxCalificacion(id, respuesta, nombre_pregunta);
}

function listo(){
	$("#button_listo").on("click", function(){
		window.location = "http://localhost/dashboard/conflicto_arm/vistas/inicio.php";
	});
}