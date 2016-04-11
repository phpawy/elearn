<?php
require('../db.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Learning Technologies</title>
        <link rel="stylesheet" href="../assets/css/mainstyle.css" media="screen">
        <link rel="stylesheet" href="../assets/css/style.min.css">
    </head>
    <body>
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbar-main">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="course_list.php">View Courses</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h1 id="forms">Add new course</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="well bs-component">
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" action="course_add_action.php">
                            <fieldset>
                                <legend>Course details</legend>
                                <div class="form-group">
                                    <label for="course_id" class="col-lg-2 control-label">Course ID</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="course_id" name="course_id" placeholder="Course ID" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-lg-2 control-label">Course Name</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Course Name" >
                                    </div>
                                </div>

                                <legend>Course materials</legend>
                                <div class="form-group">
                                    <label for="materials" class="col-lg-2 control-label">Upload files</label>
                                    <div class="col-lg-10">
                                        <input type="file" class="form-control multi" name="materials[]" id="materials"/>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="64097152" />
                                        <button type="reset" class="btn btn-default">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

            <script src="../assets/js/jquery-1.10.2.min.js"></script>
            <script src="../assets/js/js.min.js"></script>
            <script src="../assets/js/custom.js"></script>
            <script src="../assets/js/jquery.MultiFile.js"></script>
</html>