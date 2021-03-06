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
                        <form method="post" action="student_edit_action.php?id=<?php echo $id ?>" id="my_form">
                            <fieldset>
                                <legend>Student details</legend>
                                <ul>
                                    <li>
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" value='<?php echo $username ?>' />
                                    </li>
                                    <li>
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" value='<?php echo $password ?>' >
                                    </li>
                                    <li>
                                        <label for="first_name">First Name</label>
                                        <input type="text" name="first_name" id="first_name" value='<?php echo $first_name ?>' >
                                    </li>
                                    <li>
                                        <label for="last_name">Last Name</label>
                                        <input type="text" name="last_name" id="last_name" value='<?php echo $last_name ?>' >
                                    </li>
                                    <li>
                                        <label for="mobile">Mobile</label>
                                        <input type="text" name="mobile" id="mobile" value='<?php echo $mobile ?>' >
                                    </li>
                                    <li>
                                        <input type="submit" name="submit" value="Update" id="submit" >
                                    </li>
                                </ul>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
            <script src="../assets/js/js.min.js"></script>
            <script src="../assets/js/custom.js"></script>
</html>