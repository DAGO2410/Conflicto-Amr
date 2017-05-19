<?php
class ConnectDB{
	public $server = 'localhost';
	public $user = 'root';
	public $pass = '';
	public $DB = "conflicto_arm";
	public $conexion = false;
	
	public function conexion(){
		$conexion = $this->conectarDB();
		if($conexion){
			$seleccionar = $this->seleccionarDB();
			if($seleccionar){
				return true;
			}else{
				return $seleccionar;
			}
		}else{
			return $conexion;
		}
	}
	
	public function conectarDB(){
		$conexion = mysqli_connect($this->server, $this->user, $this->pass);
		if($conexion){
			$this->conexion = $conexion;
			return true;
		}else{
			return false;
		}
	}
	
	public function seleccionarDB(){
		$seleccionar =  mysqli_select_db($this->conexion,$this->DB);
		if($seleccionar){
			return true;
		}else{
			return "No se ha podido seleccionar una base de datos ".mysqli_error();
		}
	}
	
	public function consultar($query){
		$sql = mysqli_query($this->conexion,$query);
		$array= array();
		if($sql){
			$array = mysqli_fetch_assoc($sql);
			return $array;
		}else{
			return false;
		}
	}

	public function consultarTabla($query){
		$sql = mysqli_query($this->conexion,$query);
		$array= array();
		if($sql){
			while($row = mysqli_fetch_assoc($sql)){
				$array[] = $row;
			}
			return $array;
		}else{
			return false;
		}
	}
	
	public function ejecutarQuery($query){
		$sql = mysqli_query($this->conexion,$query);
		if($sql){
			return true;
		}else{
			return false;
		}
	}
}
?>