<?php

use Abraham\TwitterOAuth\TwitterOAuth;
require 'twitteroauth/autoload.php';
require 'message.php';

$ck  = 'y4BzxqNJsyMLwDUiu545Z61sm';                            // コンシューマーキー
$cs  = 'WhN11Plbm4FVldzEtC2IWUWH4sOdt8vuEhYuvADLHYyR7TDLav';   // コンシューマーシークレット
$at  = '1260635082630459392-AqBWfefbL2VGEFQCkFvCZ1S8uQinTD';   // アクセストークン
$ats = 'NJXDTD0hJdN0MZtVgaafsWcBUA2pd0tELfp6LpgK4A901';        // アクセストークンシークレット

$twitter = new TwitterOAuth($ck, $cs, $at, $ats);

$TWITTER_STATUS_UPDATE_URL = "http://api.twitter.com/1.1/statuses/update.json";

$method  = 'POST';


// tweet
$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, '~/Web/detect-error-bot/txt/prevcode.txt');
	$prev_status_code = curl_exec($ch);
	curl_close($ch);

printf($prev_status_code);
if (false){
  $response = $twitter->post('statuses/update', array('status' => $message));
  file_put_contents('txt/prevcode.txt', $status_code);
  $tweet = true;
}

// log
$log_message = ' ['.$status_code.'] ('.date('Y/m/d/H:i:s').') '.$status_message."\n";
file_put_contents('txt/log.txt', $log_message, FILE_APPEND);

?>
