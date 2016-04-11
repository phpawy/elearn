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
                        <?php
                        $course_id = $_POST['course_id'];
                        $professor_id = $_SESSION['id'];
                        $name = $_POST['name'];
                        $materials = $_FILES['materials'];

                        $target_dir = "../uploads/";

                        for ($i = 0; $i < count($materials['name']); $i++) {
                            $target_file = $target_dir . basename($_FILES["materials"]["name"][$i]);
                            move_uploaded_file($_FILES["materials"]["tmp_name"][$i], $target_file);
                            $mat_to_add[] = $target_file;
                        }


                        $add = $db->query("INSERT INTO `courses` (`course_id`, `professor_id`, `name`)VALUES ('$course_id', '$professor_id', '$name')");
                        if ($add === TRUE) {
                            echo '<p>Course Created Successfully!</p>';
                            $course_id = $db->insert_id;
                            foreach ($mat_to_add AS $mat) {
                                $add = $db->query("INSERT INTO `materials` (`course_id`, `name`, `file`) VALUES ('$course_id', '$mat', '$mat')");
                            }
                        } else {
                            print $db->error;

                            echo '<p>Error!</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
            <script src="../assets/js/js.min.js"></script>
            <script src="../assets/js/custom.js"></script>
            <script src="../assets/js/jquery.MultiFile.js"></script>
</html>