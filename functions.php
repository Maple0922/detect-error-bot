<?php

// get status code

function get_http_status_code($url) {
	if(($fp=fopen($url,'r',false,stream_context_create(array('http'=>array('ignore_statuss'=>true)))))!==false) {
		fclose($fp);
		$code = preg_match('#^HTTP/\d\.\d (\d+) .+$#',$http_response_header[0],$matches)===1?(int)$matches[1]:false;
		return $code;
	} else {
		return '取得できませんでした。';
	}
}

?>
