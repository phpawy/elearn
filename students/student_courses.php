<?php
require('../db.php');
if(isset($_GET['do']) && $_GET['do']=='register') {
    $student_id = $_SESSION['id'];
    $course_id = $_GET['course_id'];
    $db->query("INSERT INTO `students_courses` (`student_id`,`course_id`) VALUES ($student_id, $course_id)");
}
elseif(isset($_GET['do']) && $_GET['do']=='unregister') {
    $student_id = $_SESSION['id'];
    $course_id = $_GET['course_id'];
    $db->query("DELETE FROM `students_courses` WHERE `student_id`=$student_id AND `course_id`=$course_id");
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
                            <a href="student_register.php">Register a Course</a>
                        </li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../index.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h1 id="tables">Course Registration</h1>
                    </div>

                    <div class="bs-component">

                        <table class="table table-striped table-hover ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course ID</th>
                                    <th>Course Name</th>
                                    <th>Professor Name</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $courses = $db->query('SELECT * FROM `courses`');
                                while ($course = $courses->fetch_array()) {
                                    $check_is_registered = $db->query('SELECT `id` FROM `students_courses` WHERE `course_id` = '.$course['id'].' AND `student_id` = '. $_SESSION['id']);
                                    $is_registered = $check_is_registered->fetch_array();
                                    $is_registered = $is_registered['id'];
                                    
                                    $get_professor = $db->query('SELECT `name` FROM `professors` WHERE `id` = '.$course['professor_id']);
                                    $professor = $get_professor->fetch_array();
                                    $professor_name = $professor['name'];
                                            
                                    $i++;
                                    echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $course['course_id'] . '</td>
                    <td>' . $course['name'] . '</td>
                    <td>' . $professor_name . '</td>
                    <td>' . ($is_registered>0 ? "Registered" : "Not Registered") . '</td>
                    <td>' . ($is_registered>0 ? "<a href='student_courses.php?do=unregister&course_id={$course['id']}&student_id={$_SESSION['id']}'>Unregister</a>" : "<a href='student_courses.php?do=register&course_id={$course['id']}&student_id={$_SESSION['id']}'>Register</a>") . '
                    </td>
                    </tr>';
                                }
                                ?>
                            </tbody>
                        </table> 


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../assets/js/js.min.js"></script>
    <script src="../assets/js/custom.js"></script>
</html>