<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Title</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="/Modules/Shop/src/styles/main.css">
</head>
<body>
<div class="container">
    <?php require_once 'header.php'?>
    <div class="content_container">
        <?= $content??'' ?>
    </div>

</div>

 <script type="module" src="/Modules/Shop/src/dist/scripts.js"></script>
</body>
</html>
