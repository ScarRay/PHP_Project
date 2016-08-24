<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Mon super site</title>
    <link href="/PHP_Project/css/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <script src="/PHP_Project/js/jquery-1.12.3.js"></script>
    <script src="/PHP_Project/css/bootstrap/js/bootstrap.min.js"></script>
</head>

<body onload="set_theme()">

    <?php include("../bodysite/entete.php"); ?>
    <?php include("../bodysite/menu.php"); ?>

    <div id="container">
        <h1 class="page-header">Minichat <small>10 derniers messages</small></h1>
        <?php include("../../controller/chatroom.php"); ?>
    </div>
    <?php include("../bodysite/footer.php"); ?>
    
</body>
</html>