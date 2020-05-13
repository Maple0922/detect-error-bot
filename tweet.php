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

if ($prev_status_code !== $status_code) {
  $response = $twitter->post('statuses/update', array('status' => $message));
  $prev_status_code = $status_code;
}

?>
