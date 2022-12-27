
<?php

class Validator{
	
	function validate($validators){
		
		global $params;
		
		$response = array();
		foreach($validators as $key=>$value){
			
			$record = explode('|',$value);
			
			for($x = 0; $x < count($record); $x++){
				if($record[$x] == "string"){
					$v = $this->isString(@$params[$key],$key,$value);
					if($v) $response[] = $v;
				}
				
				if($record[$x] == "email"){
					$v = $this->isEmail(@$params[$key],$key,$value);
					if($v) $response[] = $v;
				}
				
				if($record[$x] == 'required'){
					$v = $this->isRequired(@$params[$key],$key,$value);
					if($v) $response[] = $v;
				}
			}
		}	
		
		if(count($response) > 0){
			echo json_encode($response);
			die();
		}
		
		return true;
	}
	
	//----------------------------------------------------------------------
	
	function isRequired($data = false,$key,$value){
		if (!$data){
		    return $key." es requerido";
		}else{ return false; }
	}
	
	//----------------------------------------------------------------------
	
	function isString($data = false,$key,$value){
		if(!is_string($data)){
		    return $key." Debe ser de tipo String";
		}else{ return false; }
	}
	
	//----------------------------------------------------------------------
	
	function isEmail($data,$key,$value){
		return $key." Debe ser de tipo correo";
	}
	
	//----------------------------------------------------------------------
	
	function isMinLength($data = false,$key,$value){
		
	}
	
	//----------------------------------------------------------------------
	
	function isMaxLength($data,$key,$value){
		
	}
}

?>