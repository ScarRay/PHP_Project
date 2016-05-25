<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Mon super site</title>


    <link rel="stylesheet" type="text/css" href="/PHP_Project/css/main.css">
    <link href="/PHP_Project/css/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <script src="/PHP_Project/js/jquery-1.12.3.js"></script>
    <script src="/PHP_Project/css/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include_once('model/membre/membre.class.php'); ?>
        <?php include("view/bodysite/entete.php"); ?>
            <?php include("view/bodysite/menu.php"); ?>

                <div id="container">
                    <h1 class="page-header">Index</h1>
                    
                    <?php include("roadmap.php");?>
                    <?php include("progression.php"); ?>
                </div>
                <?php include("view/bodysite/footer.php"); ?>
</body>

</html>