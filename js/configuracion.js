$(document).ready(function(){
	cambioPassword();
	actualizarInformacion();
	cambioAvatar();
});

function cambioPassword(){
	$("#cambio_password").on("click", function(){
		var usuario_id = $("#input_usuario_id").val();
		ajaxCambioPassword(usuario_id);
	});
}

function actualizarInformacion(){
	$("#actualizar_informacion").on("click",function(){
		var usuario_id = $("#input_usuario_id").val();
		ajaxActualizaInformacion(usuario_id);
	});
}

function cambioAvatar(){
	$("#cambio_avatar").on("click", function(){
		var usuario_id = $("#input_usuario_id").val();
		
	});
}

function cambiarPassword(){
	var usuario_id = $("#input_usuario_id").val();
	var password_actual =$("#input_password_actual").val();
	var password_nueva = $("#input_password_nueva").val();
	var password_confirmar = $("#input_password_confirmar").val();
	
	if(password_actual == ""){
		alert("Debe ingresar su password");
		return false;
	}else if(password_nueva == ""){
		alert("Debe ingresar una password nueva");
		return false;
	}else if(password_confirmar == ""){
		alert("Debe confirmar el password nuevo");
		return false;
	}else{
		if(password_nueva != password_confirmar){
			alert("el password no coincide");
		}
	}
	
	ajaxCambiarPassword(usuario_id,password_actual,password_nueva,password_confirmar);
}

function actualizar(){
	var nombre_usuario = $("#input_nombre_usuario").val();
	var apellido_usuario = $("#input_apellido_usuario").val();
	var sexo = $("#combo_sexo").val();
	var correo_electronico = $("#input_correo_usuario").val();
	var fecha_nacimiento = $("#input_fecha_nacimiento").val();
	var password = $("#input_password_usuario").val();
	var usuario_id = $("#input_usuario_id").val();
	
	if(password == ""){
		alert("Debe ingresar el password");
		return false;
	}
	ajaxActualizarInfo(usuario_id,password,nombre_usuario,apellido_usuario,sexo,correo_electronico,fecha_nacimiento);
}

function cancelar(){
	window.location = "http://localhost/dashboard/conflicto_arm/vistas/configuracion.php";
}