<?php
require('../db.php');
$id = $_GET['id'];

$get_student = $db->query("SELECT * FROM `students` WHERE `id` = $id");
$student = $get_student->fetch_array();
$username = $student['username'];
$password = $student['password'];
$first_name = $student['fname'];
$last_name = $student['lname'];
$mobile = $student['mobile'];
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
                        <h1 id="tables">Edit student</h1>
                    </div>

                    <div class="bs-component">
                        <?php
                        $id = $_GET['id'];
                        $username = $_POST['username'];
                        $password = md5($_POST['password']);
                        $first_name = $_POST['first_name'];
                        $last_name = $_POST['last_name'];
                        $mobile = $_POST['mobile'];

                        $get_old_username = $db->query("SELECT `username` FROM `students` WHERE `id` = $id");
                        $old_username = $get_old_username->fetch_array();
                        $old_username = $old_username['username'];


                        $add = $db->query("UPDATE `students` SET `username` = '$username', `password` = '$password', `fname` = '$first_name', `lname` = '$last_name', `mobile` = '$mobile' "
                                . "WHERE `id` = $id");
                        $add = $db->query("UPDATE `users_roles` SET `username` = '$username' WHERE `username` = '$old_username'");
                        if ($add === TRUE) {
                            echo '<p>Student Updated Successfully!</p>';
                        } else {
                            echo '<p>Error!<br />' . $db->error . '</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
            <script src="../assets/js/js.min.js"></script>
            <script src="../assets/js/custom.js"></script>
</html>