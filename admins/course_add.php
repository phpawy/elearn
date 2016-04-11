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
                            <a href="professor_list.php">Professors</a>
                        </li>
                        <li>
                            <a href="student_list.php">Students</a>
                        </li>
                        <li>
                            <a href="course_list.php">Courses</a>
                        </li>
                        <li>
                            <a href="material_list.php">Materials</a>
                        </li>
                        <li>
                            <a href="comment_list.php">Comments</a>
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
                        <h1 id="tables">Add Course</h1>
                    </div>
                    <div class="bs-component">
                        <form method="post" action="course_add_action.php" id="my_form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="course_id" class="col-lg-2 control-label">Professor</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="professor_id" name="professor_id">
                                        <?php
                                        $get_professors = $db->query('SELECT * FROM `professors`');
                                        while ($professor = $get_professors->fetch_array()) {
                                            echo '<option value="' . $professor['id'] . '">' . $professor['name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
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
                                <div class="col-lg-10">
                                    <input type="submit" name="submit" value="Update" id="submit" >
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
            <script src="../assets/js/js.min.js"></script>
            <script src="../assets/js/custom.js"></script>
            <script src="../assets/js/jquery.MultiFile.js"></script>
</html>