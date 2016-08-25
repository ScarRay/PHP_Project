<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>windoZ Dashboard</title>
    <link href="/PHP_Project/css/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <script src="/PHP_Project/js/jquery-1.12.3.js"></script>
    <script src="/PHP_Project/css/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/PHP_Project/css/citizen.css">
    
</head>
<body onload="set_theme()">

    <?php include("../bodysite/entete.php"); ?>
    <?php include("../bodysite/menu.php"); ?>

            <div id="container">
                <h1 class="page-header">Citizen News</h1>
                <?php include("../../controller/citizenController.php"); ?>
            </div>
            <?php include("../bodysite/footer.php"); ?>
            <script type="text/javascript" src="/PHP_Project/js/tabs.js"></script>
</body>
</html>