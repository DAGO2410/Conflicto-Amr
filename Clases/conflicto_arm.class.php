<?php
$raiz="C:/xampp/htdocs/dashboard/conflicto_arm/";
include_once($raiz."clases/ConnectDB.class.php");
include_once($raiz."clases/Formularios.class.php");
class ConflictoArm{
	public $connectDB = "";
	public function __construct(){
		$this->connectDB = new ConnectDB();
		$this->connectDB->conexion();
	}

	public function verificarSubtemas($tema){
		$sql_subtemas = "SELECT 
							id,
							nombre_subtema,
							video,
							texto
						FROM 
							subtemas
						WHERE
							activo = 1 and tema = '".$tema."'";
		$ejecucion = $this->connectDB->consultarTabla($sql_subtemas);
		return $ejecucion;
	}

	public function eliminarSubtema($id){
		$sql_update = "UPDATE 
						subtemas 
					SET 
						activo=0 
					WHERE id = ".$id;
		$ejecucion = $this->connectDB->ejecutarQuery($sql_update);
		if($ejecucion){
			return $datos = array("mensaje"=>"ok");
		}else{
			return $datos = array("mensaje"=>"Error");
		}
	}

	public function buscarSubtema($id){
		$sql_subtema = "SELECT 
							nombre_subtema,
							video,
							texto
						FROM
							subtemas
						WHERE id = ".$id." AND activo = 1";
			$ejecucion = $this->connectDB->consultar($sql_subtema);
		if(count($ejecucion) > 0){
			return $ejecucion;
		}
	}

	public function guardarSubtema($id, $nombre_tema, $video, $texto, $tema){
		if($id != ""){
			$sql_update = "UPDATE 
							subtemas 
						SET 
							nombre_subtema = '".$nombre_tema."', video='".$video."', texto='".$texto."'
						WHERE id = ".$id;
			$ejecucion=$this->connectDB->ejecutarQuery($sql_update);
			if($ejecucion){
				return $datos = array("mensaje"=>"ok");
			}else{
				return $datos = array("mensaje"=>"Error");
			}
		}else{
			$sql_select_subtema = "SELECT count(1) as contar FROM subtemas WHERE nombre_subtema = ".$nombre_tema;
			$ejecutar = $this->connectDB->consultar($sql_select_subtema);
			
			if($ejecutar["contar"] == 0){
				$sql_insert = "INSERT INTO subtemas(nombre_subtema, 
												video, 
												texto, 
												tema,
												activo)VALUES(
												'".$nombre_tema."',
												'".$video."',
												'".$texto."',
												'".$tema."',
												'1')";
				$ejecucion = $this->connectDB->ejecutarQuery($sql_insert);
				if($ejecucion){
					return $datos = array("mensaje"=>"ok");
				}else{
					return $datos = array("mensaje"=>"Error");
				}
			}else{
				return $datos = array("mensaje"=>"Existe");
			}
		}
	}

	public function guardarPreguntas($nombre_pregunta, $nombre_subtema,$texto_pregunta, $respuesta_1, $respuesta_2, $respuesta_3, $respuesta_4, $pregunta_correcta){
		$sql_idsubtema="SELECT id FROM subtemas WHERE nombre_subtema = '".$nombre_subtema."'";

		$ejecucion = $this->connectDB->consultarTabla($sql_idsubtema);
        if (count($ejecucion)>0){
        	for($i=0;$i<count($nombre_pregunta);$i++){
				$sql_preguntas="INSERT INTO preguntas (nombre_pregunta, 
				    									texto_pregunta, 
				    									subtema_id,
				    									respuesta_1, 
				    									respuesta_2,
				    									respuesta_3, 
				    									respuesta_4, 
				    									pregunta_correcta)VALUES (
				    									'".$nombre_pregunta[$i]."',
				    									'".$texto_pregunta[$i]."',
				    									".$ejecucion[0]["id"].",
				    									'".$respuesta_1[$i]."',
				    									'".$respuesta_2[$i]."',
				    									'".$respuesta_3[$i]."',
				    									'".$respuesta_4[$i]."',
				    									'".$pregunta_correcta[$i]."'
				    									)";
				$insert = $this->connectDB->ejecutarQuery($sql_preguntas);
			}

			if($insert){
				return $datos=array("mensaje"=>"ok"); 
			}else{
				return $datos=array("mensaje"=>"Error Insert");
			}
        }
		else {
			return $datos=array("mensaje"=>"ERROR");
		}
	}

	public function obtenerSubtemas($id, $usuario_id){
		$formularios = new Formularios();

		$sql_subtemas = "SELECT
							s.id as subtema_id,
							s.video,
							s.texto,
							p.id as pregunta_id,
							p.nombre_pregunta,
							p.texto_pregunta,
							p.respuesta_1,
							p.respuesta_2,
							p.respuesta_3,
							p.respuesta_4,
							p.pregunta_correcta
						FROM 
							subtemas s
						INNER JOIN preguntas p ON s.id=p.subtema_id
						WHERE 
							s.activo = 1 AND s.id= ".$id;

		$ejecucion = $this->connectDB->consultarTabla($sql_subtemas);
		if(count($ejecucion) > 0){
			return $formularios->crearFormJugarPreguntas($ejecucion, $usuario_id);
		}else{
			return "<label>El subtema se creo incorrectamente</label>";
		}
	}

	public function calificacion($usuario_id,$pregunta_id,$respuesta, $nombre_pregunta){
		$sql_respuesta = "SELECT 
							pregunta_correcta
						FROM
							preguntas
						WHERE
							id=".$pregunta_id." AND nombre_pregunta = '".$nombre_pregunta."'";
		$ejecucion = $this->connectDB->consultar($sql_respuesta);
		$puntuacion = 0;
		if($ejecucion["pregunta_correcta"] == $respuesta){
			$puntuacion = 1;
		}

		$sql_insert = "INSERT INTO usuario_respuestas(
													usuario_id,
													pregunta_id,
													respuesta,
													puntuacion
												)VALUES(
													".$usuario_id.",
													".$pregunta_id.",
													'".$respuesta."',
													".$puntuacion."
												)";
		$insert = $this->connectDB->ejecutarQuery($sql_insert);
		if($insert){
			return $datos =array("mensaje"=>"ok","puntuacion"=>$puntuacion);
		}else{
			return $datos = array("mensaje"=>"ERROR");
		}
	}

	public function puntuacionGeneral($usuario_id,$permisos){
		if($permisos == "PLAYER"){
			$sql_puntuacion = "SELECT 
								count(1) as contar, 
								sum(puntuacion) as suma
							FROM usuario_respuestas
							WHERE usuario_id = ".$usuario_id;
			$ejecucion = $this->connectDB->consultar($sql_puntuacion);
			if($ejecucion["contar"] == 0){
				return "Calificacion general: 0";
			}else{
				return "Calificacion general: ".$ejecucion["suma"];
			}
		}
	}
	
	public function obtenerConfiguracion($usuario_id){
		$formularios = new Formularios();
		$sql_config = "SELECT
							nombre,
							apellido,
							nombre_avatar,
							avatar,
							sexo,
							correo_electronico,
							fecha_nacimiento
						FROM
							usuarios
						WHERE
							id = ".$usuario_id;
		
		$ejecucion = $this->connectDB->consultar($sql_config);
		
		if(count($ejecucion) > 0){
			return $formularios->crearFormConfig($ejecucion, $usuario_id);
		}
	}
	
	public function cambiarPassword($usuario_id, $password_actual, $password_nueva,$password_confirmar){
		$sql_password = "SELECT count(1) as contar FROM usuarios WHERE password = '".$password_actual."' AND id = ".$usuario_id;
		$consultar = $this->connectDB->consultar($sql_password);
		if($consultar["contar"] == 0){
			return $datos = array("mensaje"=>"Error password");
		}else{
			$update_password = "UPDATE 
									usuarios 
								SET 
									password = '".$password_nueva."',
									confirmar_password = '".$password_confirmar."'
								WHERE
									id = ".$usuario_id;
			$ejecucion = $this->connectDB->ejecutarQuery($update_password);
			
			if($ejecucion){
				return $datos = array("mensaje"=>"ok");
			}else{
				return $datos = array("mensaje"=>"Error");
			}
		}
	}
	
	public function actualizarInformacion($usuario_id,$password,$nombre_usuario,$apellido_usuario,$sexo,$correo_electronico,$fecha_nacimiento){
		$sql_password = "SELECT count(1) as contar FROM usuarios WHERE id=".$usuario_id." AND password = '".$password."'";
		$consultar = $this->connectDB->consultar($sql_password);
		if($consultar["contar"] == 0){
			return $datos = array("mensaje"=>"Error password");
		}else{
			$update_info = "UPDATE 
								usuarios
							SET
								nombre = '".$nombre_usuario."',
								apellido = '".$apellido_usuario."',
								";
			if($sexo != ""){
				$update_info.="sexo = '".$sexo."',";
			}
			$update_info.= "correo_electronico = '".$correo_electronico."',
							fecha_nacimiento = '".$fecha_nacimiento."'
							WHERE
								id = ".$usuario_id;
			$ejecucion = $this->connectDB->ejecutarQuery($update_info);
			if($ejecucion){
				return $datos = array("mensaje"=>"ok");
			}else{
				return $datos = array("mensaje"=>"Error");
			}
		}
	}
	
	public function cargarRanking(){
		$sql_ranking = "SELECT 
							u.nombre_avatar,
							sum(ur.puntuacion) as suma
						FROM usuario_respuestas ur
						INNER JOIN usuarios u ON u.id = ur.usuario_id
						GROUP BY u.nombre_avatar
						ORDER BY suma desc";
		$consultar = $this->connectDB->consultarTabla($sql_ranking);
		
		if(count($consultar) > 0){
			$count = 0;
			
			$html="<center>";
			$html.="<table>";
			$html.="<tr>";
			$html.="<th>#</th>";
			$html.="<th>Nombre Avatar</th>";
			$html.="<th>Puntuacion</th>";
			$html.="</tr>";
			foreach($consultar as $k=>$v){
				$count++;
				$html.="<tr>";
				$html.="<td>".$count."</td>";
				foreach($v as $key=>$value){
					$html.="<td>".$value."</td>";
				}
				$html.="</tr>";
			}
			$html.="</table>";
			$html.="</center>";
			return $html;
		}else{
			return "Aun no hay calificaciones para el Ranking";
		}
	}
}
?>