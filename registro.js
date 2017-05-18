$(document).ready(function(){
	registrarse();
	volver();
	limpiar();
});


function limpiar(){
	$("#input_button_limpiar").on("click", function(){
		$('#input_nombre').val("");
		$("#input_apellido").val("");
		$("#input_nombre_avatar").val("");
		$("#input_avatar").val("");
		$("#combo_sexo").val("");
		$("#input_correo_electronico").val("");
		$("#input_fecha_nacimiento").val("");
		$("#input_password").val("");
		$("#input_confirmar_password").val("");
		$("#combo_tipo_usuario").val("");
	});
}

function volver(){
	$("#input_button_volver").on("click", function(){
		window.history.back();
	});
}

function registrarse(){
	$("#input_button_registro").on("click", function(){
		var permiso = 0;
		var nombre = $('#input_nombre').val();
		var apellido = $("#input_apellido").val();
		var nombre_avatar = $("#input_nombre_avatar").val();
		var avatar = $("#input_avatar").val();
		var sexo = $("#combo_sexo").val();
		var email = $("#input_correo_electronico").val();
		var fecha_nac = $("#input_fecha_nacimiento").val();
		var password = $("#input_password").val();
		var confirmar_password = $("#input_confirmar_password").val();
		var tipo_usuario = $("#combo_tipo_usuario").val();

		if(nombre == ""){
			alert("Deb ingresar un nombre");
			return false	
		}else if(apellido == ""){
			alert("Deb ingresar un apellido");
			return false
		}else if(nombre_avatar == ""){
			alert("Deb ingresar un nombre de avatar");
			return false
		}else if(sexo == ""){
			alert("Deb ingresar un sexo");
			return false
		}else if(email == ""){
			alert("Deb ingresar un correo electronico");
			return false
		}else if(fecha_nac == ""){
			alert("Debe ingresar una fecha de nacimiento");
			return false
		}else if(password == ""){
			alert("Debe ingresar una contraseña");
			return false
		}else if(confirmar_password == ""){
			alert("Debe confirmar la contraseña");
			return false
		}else if(tipo_usuario == ""){
			alert("Debe seleccionar el tipo de usuario");
			return false
		}else{
			if(password == confirmar_password){
				if(tipo_usuario == "ADMIN"){
					permiso = 1;
				}else if(tipo_usuario == "PLAYER"){
					permiso = 2;
				}
				ajaxRegistro(nombre,apellido,nombre_avatar,avatar,sexo,email,fecha_nac,password,confirmar_password, permiso);
			}else{
				alert("La contraseña no coincide");
				return false;
			}
		}
	});
}