var count = 0;
var count2 = 0;
$(document).ready(function(){
	agregarPreguntas();
	guardarSubtema();
});

function agregarPreguntas(){
	$("#button_preguntas").on("click",function(){
		count2++;
		html="";
		html+="<h4>pregunta "+count2+".</h4><br>";
		html+="Nombre pregunta:<input type='text' id='input_nombre_pregunta_"+count+"' name='nombre_pregunta' /><br>";
		html+="Texto: <textarea id='text_texto_pregunta_"+count+"' name='texto_pregunta'></textarea><br>";
		html+="respuesta 1:<input type='text' name='respuesta_1' id='input_respuesta_1_"+count+"'/> respuesta 2:<input type='text' name='respuesta_2' id='input_respuesta_2_"+count+"'/><br>";
		html+="respuesta 3:<input type='text' name='respuesta_3' id='input_respuesta_3_"+count+"'/> respuesta 4:<input type='text' name='respuesta_4' id='input_respuesta_4_"+count+"'/><br>";
		html+="Pregunta correcta:<input type='text' id='input_pregunta_correcta_"+count+"' name='pregunta_correta' /><br>"
		$("#div_agregar_pregunta").append(html);
		count++;
	});
}

function guardarSubtema(){
	$("#button_guardar_subtema").on("click",function(){
		var nombre_pregunta = Array();
		var texto_pregunta= Array();
		var respuesta_1= Array();
		var respuesta_2= Array();
		var respuesta_3= Array();
		var respuesta_4= Array();
		var pregunta_correcta= Array();
		var id = $("#input_id_subtema").val();
		var nombre_subtema = $("#input_nombre_subtema").val();
		var video = $("#input_video_subtema").val();
		var texto = $("#text_texto_subtema").val();
		var tema = $("#input_tema").val();
		for(var i=0;i<count;i++){
			nombre_pregunta[i] = $("#input_nombre_pregunta_"+i).val();
			texto_pregunta[i]= $("#text_texto_pregunta_"+i).val();
			respuesta_1[i] = $("#input_respuesta_1_"+i).val();
			respuesta_2[i] = $("#input_respuesta_2_"+i).val();
			respuesta_3[i] = $("#input_respuesta_3_"+i).val();
			respuesta_4[i] = $("#input_respuesta_4_"+i).val();
			pregunta_correcta[i] = $("#input_pregunta_correcta_"+i).val();
		}
		if(nombre_subtema == ""){
			alert("Debe ingresar el nombre subtema");
			return false;
		}else if(texto == ""){
			alert("Debe ingresar el texo del subtema");
			return false;
		}else{
			ajaxGuardarSubtema(id,nombre_subtema,video,texto,tema, nombre_pregunta,nombre_subtema,texto_pregunta, respuesta_1, respuesta_2, respuesta_3, respuesta_4,pregunta_correcta);
		}
	});
}

function volver(){
	window.history.back();
}