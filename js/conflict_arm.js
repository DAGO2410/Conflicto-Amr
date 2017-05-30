$(document).ready(function(){
	buttonInicioSession();
	buttonLogin();
	buttonRegistro();
	cierreSession();
});

function buttonLogin(){
	$('#button_login').on("click", function(){
		var usuario = $("#input_usuario").val();
		var password = $("#input_password").val();
		if(usuario == "" ){
			alert("Debe ingresar usuario");
			return false;
		}else if(password == ""){
			alert("Debe ingresar la contraseña");
			return false;
		}else{
			ajaxLogin(usuario, password);
		}
	});
}

function buttonRegistro(){
	$("#button_registro").on('click',function(){
		window.location = 'http://localhost/dashboard/conflicto_arm/Vistas/registro.php';
	});
}

function buttonInicioSession(){
	$("#button_inicio_session").on("click", function(){
		window.location = "http://localhost/dashboard/conflicto_arm/index.php";
	});
}

function cierreSession(){
	$("#button_cierre_session").on("click", function(){
		ajaxCierreSession();
	});
}

