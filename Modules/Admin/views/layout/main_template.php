<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="/Modules/Admin/src/styles/main.css">
    <?php if(isset($style_url)): ?>
    <link rel="stylesheet" href="<?= $style_url; ?>">
    <?php endif;?>
    <?php if(isset($_SESSION['LOGIN_CRYPT'])): ?>
    <meta name="adml" content="<?=$_SESSION['LOGIN_CRYPT']?>">
    <?php endif; ?>
    <title>shop admin</title>
</head>
<body>
<div class="container">
   <?php require_once './Modules/Admin/views/layout/header.php'?>
   <?php require_once './Modules/Admin/views/layout/float_menu.php' ?>
    <div class="content_container">
        <?php if(isset($content))echo $content ?>
    </div>

</div>
<script type="module" src="/Modules/Admin/src/scripts/index.js"></script>
</body>
</html>
