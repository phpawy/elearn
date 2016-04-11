<?php
require('../db.php');
$id = $_GET['id'];

$get_course = $db->query("SELECT * FROM `courses` WHERE `id` = $id");
$course = $get_course->fetch_array();
$course_name = $course['name'];
$course_id = $course['id'];
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
                        <h1 id="forms">Current schedule for: <?php echo $course_name; ?></h1>
                    </div>
                </div>
            </div>

            <div class="bs-component">
                <table class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>Time</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        $schs = $db->query('SELECT * FROM `schedule` WHERE `course_id` = ' . $course_id);
                        while ($sch = $schs->fetch_array()) {
                            echo '<tr>
                    <td>' . $sch['day'] . '</td>
                    <td>' . $sch['time'] . '</td>
                    </tr>';
                        }
                        ?>
                    </tbody>
                </table> 
                <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div><!-- /example -->


            <script src="../assets/js/jquery-1.10.2.min.js"></script>
            <script src="../assets/js/js.min.js"></script>
            <script src="../assets/js/custom.js"></script>
            <script src="../assets/js/jquery.MultiFile.js"></script>
</html>