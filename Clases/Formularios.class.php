<?php
$raiz = "C:/xampp/htdocs/dashboard/conflicto_arm/";
include_once($raiz."clases/formulario.class.php");
include_once($raiz."clases/conflicto_arm.class.php");
class Formularios extends formulario{
	
	public function crearFormLogin(){
		$html = "";
		$formLogin = "";
		$formLogin.= $this->img("img_login", "img_login", "img", "C:/xampp/htdocs/dashboard/conflicto_arm/img/login.jpg");
		$formLogin = $this->label("label_usuario","label_usuario", "labels", "Usuario: ");
		$formLogin.= $this->input('text', 'input_usuario', 'input_usuario', 'inputs','');
		$formLogin.=$this->br();
		$formLogin.=$this->label("label_password","label_password", "labels", "Password: ");
		$formLogin.= $this->input("password","input_password","input_password","inputs","");
		$formLogin.=$this->br();
		$formLogin.=$this->input("button","button_login","button_login","buttons","Login");
		$formLogin.=$this->input("button","button_registro","button_registro","buttons","Registrarse");
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
		$form.=$this->input("text","input_avatar","input_avatar","inputs","");
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
		$form.=$this->input("button","input_button_registro","input_button_registro","input","Registrase");
		$form.=$this->input("button","input_button_limpiar","input_button_limpiar","input","Limpiar");
		$form.=$this->input("button","input_button_volver","input_button_volver","input","Volver");
		$html = $this->form("form_registro","form_registro","forms","post","",$form);
		return $html;
	}

	public function crearInicio(){
		$html="";
		$form="";
		$form.=$this->input("button","input_button_inicio","input_button_inicio","buttons_inicio","Como inicio el conflicto");
		$form.=$this->br();
		$form.=$this->input("button","input_button_nudo","input_button_nudo","buttons_inicio","Guerra entre grupos armado y fuerza publica");
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
				if($permisos == "ADMIN"){
					$html.="<td><button id='button_modificar_".$v['id']."' onclick='modificarSubtema(".$v['id'].")'>Modificar</button></td>";
					$html.="<td><button id='button_eliminar_".$v['id']."' onclick='eliminarSubtema(".$v['id'].")'>Eliminar</button></td>";
				}else if($permisos == "PLAYER"){
					$html.="<td><button id='button_jugar_".$v['id']."'>Jugar</button></td>";
				}
				$html.="</tr>";
				$html.="<input type='hidden' id='input_tema' value='".$tema."'>";
			}
			$html.="</table><br>";
			if($permisos == "ADMIN")
				$html.="<button id='button_agregar_subtema'>Agregar Subtema</button>";

			$html.="<button id='button_volver'>Volver</button>";
			return $html;
		}else{
			$html.="<label>No hay subtemas creados</label><br>";
			if($permisos == "ADMIN")
				$html.="<button id='button_agregar_subtema'>Agregar Subtema</button>";
			$html.="<button id='button_volver'>Volver</button>";
			return $html;
		}
	}
}
?>