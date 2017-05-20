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
				window.location="http://localhost/dashboard/conflicto_arm/vistas/inicio.php";
			}else if(respuesta.mensaje == "Error"){
				alert("El subtema no se ha guardado correctamente envie la solicitud de nuevo");
			}
		}
	});
}