<?php 
	function json_response($mensaje = null, $code = 200 ){
		header_remove();
		http_response_code($code);
		header("Cache-Control: no transform,public,max-age=300,s-maxage=900");
		header('Content-Type: application/jsaon');
		$status = array(
			200 => '200 OK',
			400 => '400 Bad request',
			403 => 'Acceso Denegado',
			422 => 'Unprocessable Entity',
			500 => '500 Internal Server Error'
		);
		header('Status: '.$status[$code]);
		return json_encode(array(
			'status' => $code < 300,
			'message' => $mensaje
			));		
	}
?>