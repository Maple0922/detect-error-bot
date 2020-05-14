<?php

ini_set("date.timezone", "Asia/Tokyo");

// twitter auth
use Abraham\TwitterOAuth\TwitterOAuth;
require 'twitteroauth/autoload.php';

$ck  = 'y4BzxqNJsyMLwDUiu545Z61sm';                            // コンシューマーキー
$cs  = 'WhN11Plbm4FVldzEtC2IWUWH4sOdt8vuEhYuvADLHYyR7TDLav';   // コンシューマーシークレット
$at  = '1260635082630459392-AqBWfefbL2VGEFQCkFvCZ1S8uQinTD';   // アクセストークン
$ats = 'NJXDTD0hJdN0MZtVgaafsWcBUA2pd0tELfp6LpgK4A901';        // アクセストークンシークレット

$twitter = new TwitterOAuth($ck, $cs, $at, $ats);

$TWITTER_STATUS_UPDATE_URL = "http://api.twitter.com/1.1/statuses/update.json";

$method  = 'POST';

// variables
require_once 'functions.php';

$prevcode_file = '/Users/futonakajima/Web/detect-error-bot/txt/prevcode.txt';
$log_file = '/Users/futonakajima/Web/detect-error-bot/txt/log.txt';

$target_url = 'https://oh-o2.meiji.ac.jp/portal/oh-o_meiji/';
$status_code = get_http_status_code($target_url);
$prev_status_code = file_get_contents($prevcode_file);
// $status_code = 500;

$log_time = date('i') == 0;
// $tweet_time = date('H')%2 == 1 && date('i') == 0;
$tweet_time = date('i')%3===0;

$change = $prev_status_code != $status_code;


// message

switch ($status_code) {
	case 302:
	$status_code = 200;
	case 200:
	$status_message = $change ? 'サーバーが正常に戻りました。' : 'サーバーは正常です。';
	break;
	case 500:
	$status_message = $change ? 'サーバーが落ちました。' : 'サーバーが落ちています。';
	break;
	default:
	$status_message = '対応していないコードです。';
	break;
}

// log (regular time)

if($log_time){
	$log_message = ' ['.$status_code.'] ('.date('Y/m/d/H:i:s').') '.$status_message."\n";
	file_put_contents($log_file, $log_message, FILE_APPEND);
}

// log (change)

if($change){
	$change_message = "\n".' ------------ サーバーの稼働状況が変わりました。------------ '."\n\n";
	file_put_contents($log_file, $change_message, FILE_APPEND);
}

// tweet

$message = '【'.$status_code.'】'.$status_message. '('. date('Y/m/d/H:i') .')';

if ($change || $tweet_time){
	$response = $twitter->post('statuses/update', array('status' => $message));
	file_put_contents($prevcode_file, $status_code);
	$tweet = true;
}

?>
