<?php
$raiz="C:/xampp/htdocs/dashboard/conflicto_arm/";
include_once($raiz."clases/ConnectDB.class.php");
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
}
?>