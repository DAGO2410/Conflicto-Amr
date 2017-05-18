var count = 0;
$(document).ready(function(){
	agregarPreguntas();
	guardarSubtema();
});

function agregarPreguntas(){
	$("#button_preguntas").on("click",function(){
		count++;
		html="";
		html+="<h4>pregunta "+count+".</h4><br>";
		html+="Nombre pregunta:<input type='text' id='input_nombre_pregunta_"+count+"' name='nombre_pregunta' /><br>";
		html+="Texto: <textarea id='text_texto_pregunta_"+count+"' name='texto_pregunta'></textarea><br>";
		html+="respuesta 1:<input type='text' name='respuesta_1' /> respuesta 2:<input type='text' name='respuesta_2' /><br>";
		html+="respuesta 3:<input type='text' name='respuesta_3' /> respuesta 4:<input type='text' name='respuesta_4' /><br>";
		$("#div_agregar_pregunta").append(html);
	});
}

function guardarSubtema(){
	$("#button_guardar_subtema").on("click",function(){
		var id = $("#input_id_subtema").val();
		var nombre_subtema = $("#input_nombre_subtema").val();
		var video = $("#input_video_subtema").val();
		var texto = $("#text_texto_subtema").val();
		var tema = $("#input_tema").val();

		if(nombre_subtema == ""){
			alert("Debe ingresar el nombre subtema");
			return false;
		}else if(texto == ""){
			alert("Debe ingresar el tema");
			return false;
		}else{
			ajaxGuardarSubtema(id,nombre_subtema,video,texto,tema);
		}
	});
}

function volver(){
	window.history.back();
}