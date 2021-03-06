<?php
include 'inc/Article.class.php';

if (!isset($_GET['id'])){
    header("Location: " . $_SERVER['PHP_SELF'] . "?p=viewarticles");
}


$article = $core->getArticle($_GET['id']);
if (!$article){
    header("Location: " . $_SERVER['PHP_SELF'] . "?p=viewarticles");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo SITE_NAME; ?> | Article</title>

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet"> 

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?php echo SITE_NAME; ?></a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="?p=home">Home</a></li>
                        <li class="active"><a href="?p=viewarticles">Articles</a></li>
                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <li class="pull-right"><a class="apanel" href="?p=admin">Administration</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">
            <div class="col-md-12 card">
                <h1><?php echo $article->title; ?></h1>
                <hr id="hr">
                <p class="lead"><?php echo $article->text; ?></p>
                <h3 class="pull-right"><?php echo date("d/m/Y H:i:s", $article->date); ?></h3>
                <h3 class="pull-left">Author: <?php echo $core->getUserByID($article->author_id)->username; ?></h3>
            </div>
        </div><!-- /.container -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>