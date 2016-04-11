<?php
require('../db.php');
$id = $_GET['id'];

$get_course = $db->query("SELECT * FROM `courses` WHERE `id` = $id");
$course = $get_course->fetch_array();
$name = $course['name'];
$course_id = $course['course_id'];
$professor_id = $course['professor_id'];
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
                        <h1 id="forms">Edit course</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="well bs-component">
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" action="course_edit_action.php?id=<?php echo $id?>">
                            <fieldset>
                                <legend>Course details</legend>
                                <div class="form-group">
                                <label for="course_id" class="col-lg-2 control-label">Professor</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="professor_id" name="professor_id">
                                        <?php
                                        $get_professors = $db->query('SELECT * FROM `professors`');
                                        while ($professor = $get_professors->fetch_array()) {
                                            if($professor['id']==$professor_id) echo '<option value="' . $professor['id'] . '" selected>' . $professor['name'] . '</option>';
                                            else echo '<option value="' . $professor['id'] . '">' . $professor['name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                                <div class="form-group">
                                    <label for="course_id" class="col-lg-2 control-label">Course ID</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="course_id" name="course_id" placeholder="Course ID" value="<?php echo $course_id?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-lg-2 control-label">Course Name</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Course Name" value="<?php echo $name?>">
                                    </div>
                                </div>

                                <legend>Course materials</legend>
                                <div class="form-group">
                                    <label for="materials" class="col-lg-2 control-label">Upload files</label>
                                    <div class="col-lg-10">
                                        <input type="file" class="form-control multi" name="materials" id="materials"/>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
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
