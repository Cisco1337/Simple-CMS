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
                        <li class="active pull-right"><a class="apanel" href="?p=admin">Administration</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">
            <div class="col-md-2 card shold">
                <div class="sidebar-wrapper">
                    <div class="sidebar">
                        <li class="active"><a href="?p=admin&v=users">Users</a></li>
                        <li><a href="?p=admin&v=articles">Articles</a></li>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-8 card" style="text-align: center;">
                <div class="col-md-12">
                    <h1>User Administration</h1>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td width="10%">ID</td>
                                    <td>Username</td>
                                    <td width="20%">Registration Date</td>
                                    <td width="20%">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = $db->query("SELECT * FROM users WHERE admin=1");
                                    if ($query->rowCount() > 0){
                                        while($row = $query->fetch(PDO::FETCH_OBJ)){
                                            $date = date("d/m/Y H:i:s");
                                            echo "<tr><td>{$row->id}</td><td>{$row->username}</td><td><small>{$date}</small></td><td><button class=\"btn btn-xs btn-danger\" onclick='ban({$row->id});'>Ban</button> <button class=\"btn btn-xs btn-danger\" onclick='delete({$row->id});'>Delete</button></td></tr>";
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div><!-- /.container -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script>
            function ban(id){
                $.post("ajax/admin.php", {
                    action: "ban",
                    uid: id
                }).done(function(data){
                    alert("User Banned" + data);
                });
            }

        </script>
    </body>
</html>