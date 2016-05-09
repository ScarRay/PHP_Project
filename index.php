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
    <?php include_once('model/membre/membre.class.php'); ?>
        <?php include("view/bodysite/entete.php"); ?>
            <?php include("view/bodysite/menu.php"); ?>

                <div id="container">
                    <h1 class="page-header">Index</h1>

                    <h4>Minichat</h4>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">30%
                        </div>
                    </div>
                    <h4>Articles</h4>
                    <div class="progress">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                            20%
                        </div>
                    </div>
                    <h4>Séries</h4>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                            50%
                        </div>
                    </div>
                    <h4>CV</h4>
                    <div class="progress">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 3%">1%
                        </div>
                    </div>
                </div>
                <?php include("view/bodysite/footer.php"); ?>
</body>

</html>