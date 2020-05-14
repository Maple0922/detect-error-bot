<?php require_once('tweet.php'); ?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Oh-o!Meiji Server Error Bot</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="icon/favicon.svg">
  <link rel="apple-touch-icon" href="icon/favicon.svg">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
  <header class="header">
    <h1 class="header__title">Oh-o!Meiji Server Error Bot</h1>
  </header>
  <main class="main">
    <div class="main__container">
      <p>URL : <a href="<?php echo $target_url ?>" target="_blank"><?php echo $target_url; ?></a></p>
      <p>CODE : <?php echo $status_code; ?></p>
      <p>MESSAGE : <?php echo $status_message; ?></p>
      <p>TIME : <?php echo date('Y/n/d/H:i:s'); ?></p>
      <p>TWEET : <?php if($tweet){echo 'True';}else{echo 'False';} ?></p>
    </div>
  </main>
</body>
</html>
