//Archivo que controla todos los eventos ajax del sistema
function ajaxLogin(usuario, password){
	$.ajax({
		url: "http://localhost/dashboard/conflicto_arm/controlador/logear.php",
		data:{"consulta":"logear","usuario":usuario,"password":password},
		type:"post",
		dataType:"json",
		beforesend:function(){
			alert("Auntenticando...");
		},
		success: function(respuesta){
			if(respuesta.mensaje == "ok"){
				window.location = "http://localhost/dashboard/conflicto_arm/vistas/inicio.php";
			}else if(respuesta.mensaje == "Error"){
				alert("El usuario no existe");
			}
		}
	});
}

function ajaxRegistro(nombre,apellido,nombre_avatar,avatar,sexo,email,fecha_nac,password,confirmar_password,permiso){
	$.ajax({
		url: "http://localhost/dashboard/conflicto_arm/controlador/registro.php",
		data:{"consulta":"registro","nombre":nombre,"apellido":apellido,"nombre_avatar":nombre_avatar,"avatar":avatar,"sexo":sexo,"email":email,"fecha_nac":fecha_nac,"password":password,"confirmar_password":confirmar_password,"permiso":permiso},
		type:"post",
		dataType:"json",
		success: function(respuesta){
			if(respuesta.mensaje == "ok"){
				alert("Se ha registrado correctamente");
				window.location= "http://localhost/dashboard/conflicto_arm/index.php";
			}else{
				alert("Ha ocurrido un error al registrarse envie la solicitud de nuevo");
			}
		}
	});
}

function ajaxCierreSession(){
	$.ajax({
		url:"http://localhost/dashboard/conflicto_arm/controlador/logear.php",
		data:{"consulta":"cierreSession"},
		type:"post",
		dataType:"json",
		success:function(respuesta){
			if(respuesta.mensaje =="ok")
				window.location = "http://localhost/dashboard/conflicto_arm/";
		}
	});
}

function ajaxEliminarSubtema(id){
	$.ajax({
		url: "http://localhost/dashboard/conflicto_arm/controlador/EliminarSubtema.php",
		data:{"consulta":"eliminarSubtema","id":id},
		type:"post",
		dataType:"json",
		success: function(respuesta){
			if(respuesta.mensaje == "ok"){
				alert("El subtema se ha eliminado correctamente");
				window.location="http://localhost/dashboard/conflicto_arm/vistas/jugar.php";
			}else if(respuesta.mensaje="Error"){
				alert("Error al eliminar el subtema envie la solicitud nuevamente");
			}
		}
	});
}

function ajaxGuardarSubtema(id,nombre_subtema,video,texto,tema){
	$.ajax({
		url:"http://localhost/dashboard/conflicto_arm/controlador/GuardarSubtema.php",
		data:{"consulta":"guardarSubtema","id":id,"nombre_subtema":nombre_subtema,"video":video,"texto":texto,"tema":tema},
		type:"post",
		dataType:"json",
		success: function(respuesta){
			if(respuesta.mensaje == "ok"){
				alert("El subtema se ha guardado correctamente");
				//window.location="http://localhost/dashboard/conflicto_arm/vistas/inicio.php";
			}else if(respuesta.mensaje == "Error"){
				alert("El subtema no se ha guardado correctamente envie la solicitud de nuevo");
			}
		}
	});
}

function ajaxGuardarPreguntas(nombre_pregunta, nombre_subtema,texto_pregunta, respuesta_1, respuesta_2, respuesta_3, respuesta_4, pregunta_correcta){
	$.ajax({
		url: "http://localhost/dashboard/conflicto_arm/controlador/GuardarPregunta.php",
		data:{"consulta":"guardarPreguntas","nombre_pregunta":nombre_pregunta,"nombre_subtema":nombre_subtema,"texto_pregunta":texto_pregunta,"respuesta_1":respuesta_1,"respuesta_2":respuesta_2,"respuesta_3":respuesta_3,"respuesta_4":respuesta_4, "pregunta_correcta":pregunta_correcta},
		type: "post",
		dataType: "json",
		success: function(respuesta){
			if(respuesta.mensaje == "ERROR"){
				alert("EL SUB TEMA NO EXISTE EN BASE DE DATOS")
			}
			else if(respuesta.mensaje == "Error Insert"){
				alert("No se han guardado las preguntas correctamente");
			}else{
				alert("Las preguntas han sido creadas correctamente");
				window.location = "http://localhost/dashboard/conflicto_arm/vistas/inicio.php";
			}
		}
	});
}

function ajaxCalificacion(id,respuesta,nombre_pregunta){
	$.ajax({
		url:"http://localhost/dashboard/conflicto_arm/controlador/calificarPregunta.php",
		data:{"consulta":"calificarRespuesta","pregunta_id":id,"respuesta":respuesta,"nombre_pregunta":nombre_pregunta},
		type:"post",
		dataType:"json",
		success: function(respuesta){
			if(respuesta.mensaje == "ERROR"){
				alert("Su calificacion no se creado correctamente");
			}else if(respuesta.mensaje == "ok"){
				$("#calificacion_"+id).html("Calificacion: "+respuesta.puntuacion);
				$("#button_calificar_"+id).css("display","none");
			}
		}
	});
}