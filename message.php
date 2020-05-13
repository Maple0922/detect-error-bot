<?php

function get_http_status_code($url) {
  if(($fp=fopen($url,'r',false,stream_context_create(array('http'=>array('ignore_statuss'=>true)))))!==false) {
    fclose($fp);
    $code = preg_match('#^HTTP/\d\.\d (\d+) .+$#',$http_response_header[0],$matches)===1?(int)$matches[1]:false;
    return $code;
  } else {
    return '取得できませんでした。';
  }
}

$target_url = 'https://oh-o2.meiji.ac.jp/';

$status_code = get_http_status_code($target_url);

switch ($status_code) {
  case 200:
  $status_message = 'サーバーは正常です。';
  break;
  case 302:
  $status_code = 200;
  $status_message = 'サーバーは正常です。';
  break;
  case 403:
  $status_message = 'エラーが発生しました。';
  break;
  case 404:
  $status_message = 'エラーが発生しました。';
  break;
  case 500:
  $status_message = 'サーバーが落ちました。';
  break;
  default:
  $status_message = '対応していないコードです。';
  break;
}

ini_set("date.timezone", "Asia/Tokyo");

$message = '【'.$status_code.'】'.$status_message. '('. date('Y/n/j/H:i') .')';

?>
