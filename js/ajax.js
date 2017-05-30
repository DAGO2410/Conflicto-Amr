//Archivo que controla todos los eventos ajax del sistema
function ajaxLogin(usuario, password){
	$.ajax({
		url: "http://localhost/dashboard/conflicto_arm/controlador/logear.php",
		data:{"consulta":"logear","usuario":usuario,"password":password},
		type:"post",
		dataType:"json",
		beforeSend:function(){
			$("#div_login").append("<br><label class='labels'>Autenticando...</label>");
		},
		success: function(respuesta){
			if(respuesta.mensaje == "ok"){
				window.location = "http://localhost/dashboard/conflicto_arm/vistas/inicio.php";
			}else if(respuesta.mensaje == "Error"){
				alert("El usuario no existe");
				$("#div_login").find("label").remove();
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

function ajaxGuardarSubtema(id,nombre_subtema,video,texto,tema, nombre_pregunta,nombre_subtema,texto_pregunta, respuesta_1, respuesta_2, respuesta_3, respuesta_4,pregunta_correcta){
	$.ajax({
		url:"http://localhost/dashboard/conflicto_arm/controlador/GuardarSubtema.php",
		data:{"consulta":"guardarSubtema","id":id,"nombre_subtema":nombre_subtema,"video":video,"texto":texto,"tema":tema},
		type:"post",
		dataType:"json",
		success: function(respuesta){
			if(respuesta.mensaje == "ok"){
				alert("El subtema se ha guardado correctamente");
				ajaxGuardarPreguntas(nombre_pregunta,nombre_subtema,texto_pregunta, respuesta_1, respuesta_2, respuesta_3, respuesta_4,pregunta_correcta);
			}else if(respuesta.mensaje == "Error"){
				alert("El subtema no se ha guardado correctamente envie la solicitud de nuevo");
			}else if(respuesta.mensaje == "Existe"){
				alert("El subtema ya existe");
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
				alert("EL SUBTEMA NO EXISTE EN BASE DE DATOS")
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

function ajaxCambioPassword(usuario_id){
	$.ajax({
		url: "http://localhost/dashboard/conflicto_arm/controlador/CambioPassword.php",
		data:{"consulta":"crearFormCambio","usuario_id":usuario_id},
		type: "post",
		dataType: "json",
		success: function(respuesta){
			$("#article_configuracion").html(respuesta);
		}
	});
}

function ajaxCambiarPassword(usuario_id,password_actual,password_nueva,password_confirmar){
	$.ajax({
		url: "http://localhost/dashboard/conflicto_arm/controlador/CambioPassword.php",
		data: {"consulta":"cambiarPassword","usuario_id":usuario_id,"password_actual":password_actual,"password_nueva":password_nueva,"password_confirmar":password_confirmar},
		type: "post",
		dataType: "json",
		success: function(respuesta){
			if(respuesta.mensaje == "ok"){
				alert("El password se ha actualizado correctamente");
				window.location = "http://localhost/dashboard/conflicto_arm/vistas/configuracion.php";
			}else if(respuesta.mensaje == "Error password"){
				alert("Password incorrecto");
			}else if(respuesta.mensaje == "Error"){
				alert("El password no se ha actualizado correctamente");
			}
		}
	});
}

function ajaxActualizaInformacion(usuario_id){
	$.ajax({
		url: "http://localhost/dashboard/conflicto_arm/controlador/ActualizarInformacion.php",
		data:{"consulta":"crearFormActualizar","usuario_id":usuario_id},
		type: "post",
		dataType: "json",
		success: function(respuesta){
			$("#article_configuracion").html(respuesta);
		}
	});
}

function ajaxActualizarInfo(usuario_id,password,nombre_usuario,apellido_usuario,sexo,correo_electronico,fecha_nacimiento){
	$.ajax({
		url: "http://localhost/dashboard/conflicto_arm/controlador/ActualizarInformacion.php",
		data:{"consulta":"actualizarInformacion","usuario_id":usuario_id,"password":password,"nombre_usuario":nombre_usuario,"apellido_usuario":apellido_usuario,"sexo":sexo,"correo_electronico":correo_electronico,"fecha_nacimiento":fecha_nacimiento},
		type:"post",
		dataType: "json",
		success: function(respuesta){
			if(respuesta.mensaje == "Error password"){
				alert("Password incorrecto");
			}else if(respuesta.mensaje == "Error"){
				alert("No se ha actualizado la informacion");
			}else if(respuesta.mensaje == "ok"){
				alert("Se ha actualizado la informacion correctamente");
				window.location = "http://localhost/dashboard/conflicto_arm/vistas/configuracion.php";
			}
		}
	});
}