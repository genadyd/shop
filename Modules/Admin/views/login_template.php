<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/Modules/Admin/src/styles/login/login.css">


    <title>Login Template</title>
</head>
<body>
<div class="container">
    <div class="form_container">
        <h2><?php echo  $component_data['FORM_TITLE'] ?></h2>
        <?= $component_data['FORM'] ?>
    </div>
</div>
<script  type="module"  src="/Modules/Admin/src/scripts/Login/index.js"></script>
</body>
</html>
