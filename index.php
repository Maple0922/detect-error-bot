<?php require_once('tweet.php'); ?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>ServerErrorBot</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="icon/favicon.svg">
  <link rel="apple-touch-icon" href="icon/favicon.svg">
</head>
<body>
  <header class="header">
    <h1 class="header__title">Oh-o!Meiji Server Error Bot</h1>
  </header>
  <main class="main">
    <div class="main__container">
      <div class="status">
        <h2>検証結果</h2>
        <table border>
          <tr>
            <th>URL</th>
            <td><a href="<?php echo $target_url ?>" target="_blank"><?php echo $target_url; ?></a></td>
          </tr>
          <tr>
            <th>CODE</th>
            <td><?php echo $status_code; ?></td>
          </tr>
          <tr>
            <th>MESSAGE</th>
            <td><?php echo $status_message; ?></td>
          </tr>
          <tr>
            <th>TIME</th>
            <td><?php echo date('Y/n/d/H:i:s'); ?></td>
          </tr>
          <tr>
            <th>TWEET</th>
            <td><?php echo $tweet? 'true':'false'; ?></td>
          </tr>
        </table>
      </div>
    </div>
    <div class="main__container">
      <div class="description">
        <h2>概要</h2>
        <ul>
          <li>cronで7:00~23:00稼働</li>
          <li>20分ごとにlog.txtにログを残す</li>
          <li>2時間ごとにツイートする</li>
          <li>ステータスコードが変わった際もツイートする</li>
        </ul>
      </div>
    </div>
  </main>
</body>
</html>
