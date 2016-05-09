<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Mon super site</title>
    
    
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link href="/css/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <script src="/js/jquery-1.12.3.js"></script>
    <script src="/css/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>

    <?php include("../bodysite/entete.php"); ?>
    <?php include("../bodysite/menu.php"); ?>

            <div id="container">
                <h1 class="page-header">Séries</h1>
                <?php include("../../controller/serieController.php"); ?>
            </div>
            <?php include("../bodysite/footer.php"); ?>
</body>
</html>