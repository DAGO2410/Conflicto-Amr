<?php
$raiz = "C:/xampp/htdocs/dashboard/conflicto_arm/";
include_once($raiz."clases/ConnectDB.class.php");
include_once($raiz."clases/formulario.class.php");
include_once($raiz."clases/conflicto_arm.class.php");
class Formularios extends formulario{
	
	public function crearFormLogin(){
		$html = "";
		$formLogin = "";
		$inputUsuario = "";
		$labelUsuario = "";
		$labelPassword = "";
		$inputPassword = "";
		$formLogin.= $this->img("img_login", "img_login", "img", "C:/xampp/htdocs/dashboard/conflicto_arm/img/login.jpg");
		$labelUsuario.= $this->label("label_usuario","label_usuario", "labels", "Usuario: ");
		$formLogin.= $this->div("div_label_usuario","div_label_usuario","divs",$labelUsuario);
		$inputUsuario.= $this->input('text', 'input_usuario', 'input_usuario', 'inputs','');
		$formLogin.=$this->div("div_usuario","div_usuario","divs",$inputUsuario);
		$formLogin.=$this->br();
		$labelPassword.=$this->label("label_password","label_password", "labels", "Password: ");
		$formLogin.=$this->div("div_label_password","div_label_password","divs",$labelPassword);
		$inputPassword.= $this->input("password","input_password","input_password","inputs","");
		$formLogin.=$this->div("div_input_password","div_input_password","divs",$inputPassword);
		$formLogin.=$this->br();
		$formLogin.=$this->input("button","button_login","button_login","buttons_form","Login");
		$formLogin.=" ";
		$formLogin.=$this->input("button","button_registro","button_registro","buttons_form","Registrarse");
		$html = $this->div("div_login", "div_login", "divs", $formLogin);
		return $html;
	}
	
	public function crearFormRegistro(){
		$html="";
		$form = "";
		$form.=$this->label("label_nombre","label_nombre","labels","Nombre:");
		$form.=$this->input("text","input_nombre","input_nombre","input","");
		$form.=$this->br();
		$form.=$this->label("label_apellido","label_apellido","labels","Apellido:");
		$form.=$this->input("text","input_apellido","input_apellido","input","");
		$form.=$this->br();
		$form.=$this->label("label_nombre_avatar","label_nombre_avatar","labels","Nombre avatar:");
		$form.=$this->input("text","input_nombre_avatar","input_nombre_avatar","input","");
		$form.=$this->br();
		$form.=$this->label("label_avatar","label_avatar","labels","Avatar:");
		$form.=$this->input("text","input_avatar","input_avatar","input","");
		$form.=$this->br();
		$form.=$this->label("label_Sexo","label_Sexo","labels","Sexo:");
		$content = array("1"=>"M","2"=>"F");
		$form.=$this->comboBox("combo_sexo", "combo_sexo", "combox", $content);
		$form.=$this->br();
		$form.=$this->label("label_correo_electronico","label_correo_electronico","labels","Correo electronico:");
		$form.=$this->input("text","input_correo_electronico","input_correo_electronico","input","");
		$form.=$this->br();
		$form.=$this->label("label_fecha_nacimiento","label_fecha_nacimiento","labels","Fecha Nacimiento:");
		$form.=$this->input("date","input_fecha_nacimiento","input_fecha_nacimiento","input","");
		$form.=$this->br();
		$form.=$this->label("label_password","label_password","labels","Password:");
		$form.=$this->input("password","input_password","input_password","input","");
		$form.=$this->br();
		$form.=$this->label("label_confirmar_password","label_confirmar_password","labels","Confirmar password:");
		$form.=$this->input("password","input_confirmar_password","input_confirmar_password","input","");
		$form.=$this->br();
		$combo = array("1"=>"ADMIN","2"=>"PLAYER");
		$form.=$this->label("label_tipo_usuario","label_tipo_usuario","labels","Tipo usuarios:");
		$form.=$this->comboBox("combo_tipo_usuario", "combo_tipo_usuario", "combox", $combo);
		$form.=$this->br();
		$form.=$this->br();
		$form.=$this->input("button","input_button_registro","input_button_registro","buttons_form","Registrase");
		$form.=" ";
		$form.=$this->input("button","input_button_limpiar","input_button_limpiar","buttons_form","Limpiar");
		$form.=" ";
		$form.=$this->input("button","input_button_volver","input_button_volver","buttons_form","Volver");
		$html = $this->form("form_registro","form_registro","forms","post","",$form);
		return $html;
	}

	public function crearInicio(){
		$html="";
		$form="";
		$form.=$this->input("button","input_button_inicio","input_button_inicio","buttons_inicio","Como inicio el conflicto");
		$form.=$this->br();
		$form.=$this->br();
		$form.=$this->input("button","input_button_nudo","input_button_nudo","buttons_inicio","Guerra entre grupos armado y fuerza publica");
		$form.=$this->br();
		$form.=$this->br();
		$form.=$this->input("button","input_button_desenlace","input_button_desenlace","buttons_inicio","Procesos de Paz");
		$html.=$this->div("div_inicio","div_inicio","divs",$form);
		return $html;
	}

	public function crearFormJugar($permisos,$tema){
		$conflictoArm = new ConflictoArm();
		$html = "";
		$subtemas = $conflictoArm->verificarSubtemas($tema);
		if(count($subtemas) > 0){
			$html.="<table>";
			$html.="<tr>";
			$html.="<th>SUBTEMA</th>";
			$html.="<th>VIDEO</th>";
			$html.="<th>TEXTO</th>";
			if($permisos == "ADMIN"){
				$html.="<th>MODIFICAR</th>";
				$html.="<th>ELIMINAR</th>";
			}else if($permisos == "PLAYER"){
				$html.="<th>JUGAR</th>";
			}
			$html.="</tr>";
			foreach($subtemas as $k=>$v){
				$html.="<tr>";
				$html.="<td>".$v['nombre_subtema']."</td>";
				$html.="<td><a href='".$v["video"]."'>".$v["video"]."</a></td>";
				$html.="<td>".$v["texto"]."</td>";
				if($permisos == "ADMIN"){
					$html.="<td><button class='buttons_form' id='button_modificar_".$v['id']."' onclick='modificarSubtema(".$v['id'].")'>Modificar</button></td>";
					$html.="<td><button class='buttons_form' id='button_eliminar_".$v['id']."' onclick='eliminarSubtema(".$v['id'].")'>Eliminar</button></td>";
				}else if($permisos == "PLAYER"){
					$html.="<td><button class='buttons_form' id='button_jugar_".$v['id']."' onclick='jugar(".$v['id'].")'>Jugar</button></td>";
				}
				$html.="</tr>";
				$html.="<input type='hidden' id='input_tema' value='".$tema."'>";
			}
			$html.="</table><br>";
			if($permisos == "ADMIN")
				$html.="<button class='buttons_form' id='button_agregar_subtema'>Agregar Subtema</button>";

			$html.="<button class='buttons_form' id='button_volver'>Volver</button>";
			return $html;
		}else{
			$html.="<label>No hay subtemas creados</label><br>";
			if($permisos == "ADMIN")
				$html.="<button class='buttons_form' id='button_agregar_subtema'>Agregar Subtema</button>  ";
			$html.="<button class='buttons_form' id='button_volver'>Volver</button>";
			return $html;
		}
	}

	public function crearFormJugarPreguntas($resultado, $usuario_id){
		$conexion = new ConnectDB();
		$conexion->conexion();
		$html="";
		$content="";
		foreach($resultado as $k=>$v){
			$sql_respuestas = "SELECT count(1) as contar, puntuacion FROM usuario_respuestas WHERE usuario_id = ".$usuario_id." AND pregunta_id = ".$v["pregunta_id"];
			$ejecucion = $conexion->consultar($sql_respuestas);
			$contar = $ejecucion["contar"];
			$puntuacion = $ejecucion["puntuacion"];
			$content.=$this->label("label_nombre_pregunta_".$v['pregunta_id'],"label_nombre","labels",$v["nombre_pregunta"]);
			$content.=$this->br();
			$content.=$this->label("label_texto_pregunta_".$v["pregunta_id"], "label_texto_pregunta","labels",$v["texto_pregunta"]);
			$content.=$this->br();
			$content.="<input type='checkbox' id='check_respuesta_1_".$v["pregunta_id"]."' name='check_respuesta_".$v['pregunta_id']."' class='checks_".$v["pregunta_id"]."' value='".$v["respuesta_1"]."'>".$v["respuesta_1"];
			$content.=$this->br();
			$content.="<input type='checkbox' id='check_respuesta_2_".$v["pregunta_id"]."' name='check_respuesta_".$v['pregunta_id']."' class='checks_".$v["pregunta_id"]."' value='".$v["respuesta_2"]."'>".$v["respuesta_2"];
			$content.=$this->br();
			$content.="<input type='checkbox' id='check_respuesta_3_".$v["pregunta_id"]."' name='check_respuesta_".$v['pregunta_id']."' class='checks_".$v["pregunta_id"]."' value='".$v["respuesta_3"]."'>".$v["respuesta_3"];
			$content.=$this->br();
			$content.="<input type='checkbox' id='check_respuesta_4_".$v["pregunta_id"]."' name='check_respuesta_".$v['pregunta_id']."' class='checks_".$v["pregunta_id"]."' value='".$v["respuesta_4"]."'>".$v["respuesta_4"];
			$content.=$this->br();
			$content.=$this->input("hidden","input_puntuacion_".$v["pregunta_id"],"input_puntuacion","inputs");
			if($contar == 0 ){
				$content.=$this->input("button","button_calificar_".$v["pregunta_id"],"button_calificar","buttons","Calificar","calificar(".$v["pregunta_id"].")");	
			}
			$content.=$this->br();
			if($contar == 0){
				$content.="<label id='calificacion_".$v["pregunta_id"]."'></label>";	
			}else{
				$content.="<label id='calificacion_".$v["pregunta_id"]."'>Calificacion: ".$puntuacion."</label>";	
			}
			$content.=$this->br();
			$content.=$this->br();
		}
		$content.=$this->input("button","button_listo","button_listo","buttons","Listo");
		$html = $this->form("form_registro","form_registro","forms","post","",$content);

		return $html;
	}
	
	public function crearFormConfig($datos, $usuario_id){
		$html="";
		$content="";
		$content.="<b>";
		$content.=$this->label("label_nombre","label_nombre","labels","Nombre:");
		$content.="</b>";
		$content.=$this->label("label_nombre_usuario","label_nombre_usuario","labels",$datos["nombre"]);
		$content.=$this->br();
		$content.="<b>";
		$content.=$this->label("label_apellido","label_apellido","labels","Apellido:");
		$content.="</b>";
		$content.=$this->label("label_apellido_usuario","label_apellido_ususrio","labels",$datos["apellido"]);
		$content.=$this->br();
		$content.="<b>";
		$content.=$this->label("label_nombre_avatar","label_nombre_avatar","labels","Nombre Avatar:");
		$content.="</b>";
		$content.=$this->label("label_nombre_avatar_usuario","label_nombre_avatar_usuario","labels",$datos["nombre_avatar"]);
		$content.=$this->br();
		$content.="<b>";
		$content.=$this->label("label_sexo","label_sexo","labels","Sexo:");
		$content.="</b>";
		$content.=$this->label("label_sexo_usuario","label_sexo_usuario","labels",$datos["sexo"]);
		$content.=$this->br();
		$content.="<b>";
		$content.=$this->label("label_correo","label_correo","labels","Correo Electronico:");
		$content.="</b>";
		$content.=$this->label("label_correo_usuario","label_correo_usuario","labels",$datos["correo_electronico"]);
		$content.=$this->br();
		$content.="<b>";
		$content.=$this->label("label_fecha","label_fecha","labels","Fecha Nacimiento:");
		$content.="</b>";
		$content.=$this->label("label_fecha_usuario","label_fecha_usuario","labels",$datos["fecha_nacimiento"]);
		$content.=$this->br();
		$content.=$this->input("hidden","input_usuario_id","input_usuario","input",$usuario_id);
		$html.=$this->div("div_config","div_config","divs",$content);
		
		return $html;
	}
	
	public function crearFormCambioP($usuario_id){
		$html="";
		$content="";
		$content.="<h4>Cambio Password</h4>";
		$content.=$this->br();
		$content.=$this->label("label_password_actual","label_password","labels","Password Actual:");
		$content.=$this->input("password","input_password_actual","input_password_actual","input");
		$content.=$this->br();
		$content.=$this->label("label_password_nueva","label_password_nueva","labels","Password Nueva:");
		$content.=$this->input("password","input_password_nueva","input_password_nueva","input");
		$content.=$this->br();
		$content.=$this->label("label_password_confirmar","label_password_confirmar","labels","Confirmar Password Nueva:");
		$content.=$this->input("password","input_password_confirmar","input_password_confirmar","input");
		$content.=$this->br();
		$content.=$this->input("hidden","input_usuario_id","input_usuario_id","input",$usuario_id);
		$content.=$this->br();
		$content.=$this->input("button","button_cambio_password","button_cambio_password","buttons_form","Cambiar","cambiarPassword()");
		$content.=" ";
		$content.=$this->input("button","button_cancelar","button_cancelar","buttons_form","Cancelar","cancelar()");
		$html.=$this->div("div_cambio_password","div_cambio_password","divs",$content);
		
		return $html;
	}
	
	public function crearFormActualizar($usuario_id){
		$conectar = new ConnectDB();
		$conectar->conexion();
		$sql_info = "SELECT
						nombre,
						apellido,
						sexo,
						correo_electronico,
						fecha_nacimiento
					FROM 
						usuarios
					WHERE
						id = ".$usuario_id;
		$consultar = $conectar->consultar($sql_info);
		$html="";
		$content="";
		$genero = array("1"=>"M","2"=>"F");
		$content.="<h4>Actualizar Informacion</h4>";
		$content.=$this->label("label_nombre_usuario","label_nombre_usuario","labels","Nombre:");
		$content.=$this->input("text","input_nombre_usuario","input_nombre_usuario","input",$consultar["nombre"]);
		$content.=$this->br();
		$content.=$this->label("label_apellido_usuario","label_apellido_usuario","labels","Apellido:");
		$content.=$this->input("text","input_apellido_usuario","input_apellido_usuario","input",$consultar["apellido"]);
		$content.=$this->br();
		$content.=$this->label("label_sexo_usuario","label_sexo_usuario","labels","Sexo:");
		$content.=$this->comboBox("combo_sexo","combo_sexo","combos",$genero);
		$content.=$this->br();
		$content.=$this->label("label_correo_usuario","label_correo_usuario","labels","Correo Electronico:");
		$content.=$this->input("text","input_correo_usuario","input_correo_usuario","input",$consultar["correo_electronico"]);
		$content.=$this->br();
		$content.=$this->label("label_fecha_nacimiento","label_fecha_nacimiento","labels","Fecha Nacimiento:");
		$content.=$this->input("date","input_fecha_nacimiento","input_fecha_nacimiento","input",$consultar["fecha_nacimiento"]);
		$content.=$this->br();
		$content.=$this->br();
		$content.=$this->label("label_password","label_password","labels","Password:");
		$content.=$this->input("password","input_password_usuario","input_password_usuario","input");
		$content.=$this->br();
		$content.=$this->input("hidden","input_usuario_id","input_usuario_id","input",$usuario_id);
		$content.=$this->input("button","button_actualizar","button_actualizar","buttons_form","Actualizar","actualizar()");
		$content.=" ";
		$content.=$this->input("button","button_cancelar","button_cancelar","buttons_form","Cancelar","cancelar()");
		$html.=$this->div("div_actualiza_informacion","div_actualiza_informacion","divs",$content);
		
		return $html;
	}
}
?>