$(document).ready(function(){
	listo();
});

function calificar(id){
	var respuesta;
	respuesta = $(".checks_"+id+":checked").val();
	var nombre_pregunta = $("#label_nombre_pregunta_"+id).html();
	if(respuesta == undefined){
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