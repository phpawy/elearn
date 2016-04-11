<?php
require('../db.php');

if (isset($_GET['do']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $del = $db->query("DELETE FROM `exam_results` WHERE `id` = $id");
}
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
                        <li>
                            <a href="results_list.php">View Quiz Results</a>
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
                        <h1 id="tables">View Quiz Results</h1>
                    </div>

                    <div class="bs-component">
                        <table class="table table-striped table-hover ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course</th>
                                    <th>Student</th>
                                    <th>Result</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $prof_id = $_SESSION['id'];
                                $courses = $db->query('SELECT * FROM `exam_results` WHERE `professor_id` = ' . $prof_id);
                                while ($course = $courses->fetch_array()) {
                                    $get_course_name = $db->query('SELECT `name` FROM `courses` WHERE `id` = ' . $course['course_id']);
                                    $course_name = $get_course_name->fetch_array();
                                    $course_name = $course_name['name'];

                                    $get_student_name = $db->query('SELECT `fname`, `lname` FROM `students` WHERE `id` = ' . $course['student_id']);
                                    $student_name = $get_student_name->fetch_array();
                                    $student_name = $student_name['fname'] . " " . $student_name['lname'];


                                    $i++;
                                    echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $course_name . '</td>
                    <td>' . $student_name . '</td>
                    <td>' . $course['result'] . '</td>
                    <td><a href="results_list.php?do=delete&id=' . $course['id'] . '">Delete Result</a></td>
                    
                    </tr>';
                                }
                                ?>
                            </tbody>
                        </table> 
                        <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div><!-- /example -->
                </div>
            </div>
        </div>
        <script src="../assets/js/jquery-1.10.2.min.js"></script>
        <script src="../assets/js/js.min.js"></script>
        <script src="../assets/js/custom.js"></script>
</html>