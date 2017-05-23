<?php
class formulario{
	
	public function form($id="",$name="",$class="",$method="",$action="", $content=""){
		$html="";
		$html.="<form id='".$id."' $name='".$name."' class='".$class."' method='".$method."' action='".$action."'>";
		$html.=$content;
		$html.="</form>";
		return $html;
	}
	
	public function div($id="", $name="", $class="", $content=""){
		$html="";
		$html.="<div id='".$id."' name='".$name."' class='".$class."'>";
		$html.=$content;
		$html.="</div>";
		return $html;
	}
	
	public function fieldset($id='', $name='', $class='', $legend='', $content=''){
		$html="";
		$html.="<fieldset id='".$id."' name='".$name."' class='".$class."'>";
		$html.="<legend>".$legend."</legend>";
		$html.=$content;
		$html.="</fieldset>";
		return $html;
	}
	
	public function br(){
		$html="<br>";
		return $html;
	}
	
	public function label($id="",$name="", $class="", $value=""){
		$html="";
		$html.="<label id='".$id."' name='".$name."' class='".$class."'>".$value."</label>";
		return $html;
	}
	
	public function input($type='', $id='', $name='', $class='',$value='',$onclick=""){
		$html="";
		$html.="<input type='".$type."' id='".$id."' name='".$name."' class='".$class."' value='".$value."' onclick='".$onclick."'/>";
		return $html;
	}

	public function img($id="", $name="", $class="", $src=""){
		$html = "";
		$html.="<img id='".$id."' name='".$name." class='".$class."' scr='".$src."' />";
		return $html;
	}

	public function comboBox($id="", $name="", $class="", $content=array()){
		$html="";
		$html.="<select id='".$id."' name='".$name."' class='".$class."'>";
		$html.="<option value=''>--</option>";
		if(count($content)>0){
			foreach($content as $k=>$v){
				$html.="<option value='".$v."'>".$v."</option>";	
			}
		}
		$html.="</select>";

		return $html;
	}
}
?>