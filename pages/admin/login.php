<?php
if ($core->loggedin()){
    header("Location: ?p=admin");
}

if (isset($_POST['login'])){
    if (isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = md5($username . $_POST['password'] . $username);

        if ($core->login($username, $password)){
            header("Location: " . $_SERVER['PHP_SELF'] . "?p=admin");
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo SITE_NAME; ?> | Administration Login</title>

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
                        <li><a href="?p=viewarticles">Articles</a></li>
                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <li class="pull-right"><a class="apanel" href="?p=admin">Administration</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">
            <div class="col-md-12 card">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h1 style="text-align: center;">Admin Login</h1>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="username">Username: </label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password: </label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success form-control" name="login" value="Login">
                        </div>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div><!-- /.container -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>