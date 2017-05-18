$(document).ready(function(){
	buttonLogin();
	buttonRegistro();
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

