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
                        <li>
                            <a href="student_courses.php">Register a course</a>
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
                        <h1 id="tables">List Courses</h1>
                    </div>

                    <div class="bs-component">
                        <table class="table table-striped table-hover ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course ID</th>
                                    <th>Course Name</th>
                                    <th>Professor Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $student_id = $_SESSION['id'];
                                $courses = $db->query('SELECT * FROM `courses` WHERE `id` IN (SELECT `course_id` FROM `students_courses` WHERE `student_id` = '.$student_id.')');
                                print $db->error;
                                while ($course = $courses->fetch_array()) {
                                    
                                    $get_professor = $db->query('SELECT `name` FROM `professors` WHERE `id` = '.$course['professor_id']);
                                    $professor = $get_professor->fetch_array();
                                    $professor_name = $professor['name'];
                                    
                                    $i++;
                                    echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $course['course_id'] . '</td>
                    <td>' . $course['name'] . '</td>
                    <td>' . $professor_name . '</td>
                    <td>
                    <a href="course_view.php?id=' . $course['id'] . '">View</a> -
                    <a href="schedule_view.php?id=' . $course['id'] . '">Show schedule</a>
                    </td>
                    </tr>';
                                }
                                ?>
                            </tbody>
                        </table> 
                        <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div><!-- /example -->
                </div>
            </div>

        </div>
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="../assets/js/js.min.js"></script>
        <script src="../assets/js/custom.js"></script>
</html>