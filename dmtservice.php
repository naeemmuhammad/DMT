<?php
	class service{
		public $MINIMUM_PATH_ITEMS = 4;
		function getRequest($path, $parameters){
			//There should be minimum 4 items in the GET request.
			if (sizeof($path) == $this -> MINIMUM_PATH_ITEMS){
				$strResponse = "";
				$strParameterValue = "";
				$module   = $path[0];
				$provider = $path[1];
				$title    = $path[2];
				$action   = $path[3];
				$str = "module = ".$module."<br>"."provider= ".$provider."<br>"."title= ".$title."<br>"."action= ".$action."<br>" ;
				
				//Retrieve parameter and their corresponding values
				if($parameters){
					$parameterArray = explode("&",$parameters);
					foreach ($parameterArray as $parameter)
					  {
						$array = explode("=",$parameter);
						if($array){
							$param = $array[0];
							$value = $array[1];
							$strParameterValue .= $param." has value ".$value . "<br>";							
						}												
					  }					
				}
				

				return $str."<br>".$strParameterValue;
				
			} else {
				return $invalidMessage = "Invalid URL. <br> Please provide url in '/DataMapping/provider/batch/action?parameters' format.";			
			}
			
			
		}
	}
?>