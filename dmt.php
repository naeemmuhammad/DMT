<?php
	require_once("dmtservice.php");
?>

<?php
	$dmtservice = new service;
	
	$requestmethod = $_SERVER['REQUEST_METHOD'];
	$requestPath = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
	$requestParameters = $_SERVER['QUERY_STRING'];
	
	//echo $requestmethod;
	//echo "<br>";
	
	switch ($requestmethod) {
	  case 'PUT':
		rest_put($requestPath);  
		break;
	  case 'POST':
		$arrResponse = "Post Request";  
		break;
	  case 'GET':
		$arrResponse = $dmtservice -> getRequest($requestPath , $requestParameters);  
		break;
	  case 'HEAD':
		rest_head($requestPath);  
		break;
	  case 'DELETE':
		rest_delete($requestPath);  
		break;
	  case 'OPTIONS':
		rest_options($requestPath);    
		break;
	  default:
		rest_error($requestPath);  
		break;
	}

	//header('Content-type: application/pdf');	
	echo json_encode ($arrResponse);
	
?>