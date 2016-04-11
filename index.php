<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Learning Technologies</title>
        <link rel="stylesheet" href="assets/css/mainstyle.css" media="screen">
        <link rel="stylesheet" href="assets/css/style.min.css">
    </head>
    <body>
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="index.php" class="navbar-brand">Home</a>
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbar-main">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="students/student_register.php">Student Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="bs-docs-section">
                <div class="row">
                    <div class="col-md-offset-3 col-lg-6">
                        <div class="well bs-component">
                            <form class="form-horizontal" method="post" action="login.php">
                                <fieldset>
                                    <legend>Login to System</legend>
                                    <div class="form-group">
                                        <label for="username" class="col-lg-2 control-label">Username</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-lg-2 control-label">Password</label>
                                        <div class="col-lg-10">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-2">
                                            <button type="submit" class="btn btn-primary">Login</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>


                        </div>
                        <div class="">
                            <p>
                                Welcome to e-learning website to enhance academic level of students. 
                            </p>
                            <p>Cookies must be enabled in your browser</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="assets/js/js.min.js"></script>
        <script src="assets/js/custom.js"></script>
    </body>
</html>
