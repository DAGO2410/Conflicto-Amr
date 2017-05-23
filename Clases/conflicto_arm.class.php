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

	public function obtenerSubtemas($id){
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
			return $formularios->crearFormJugarPreguntas($ejecucion);	
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
}
?>