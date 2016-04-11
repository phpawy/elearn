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
                        <h1 id="forms">Edit course</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="well bs-component">
                        <?php
                        $id = $_GET['id'];
                        $name = $_POST['name'];
                        $course_id = $_POST['course_id'];

                        $materials = $_FILES['materials'];

                        $target_dir = "../uploads/";

                        for ($i = 0; $i < count($materials['name']); $i++) {
                            $target_file = $target_dir . basename($_FILES["materials"]["name"][$i]);
                            move_uploaded_file($_FILES["materials"]["tmp_name"][$i], $target_file);
                            $mat_to_add[] = $target_file;
                        }

                        foreach ($mat_to_add AS $mat) {
                            $add = $db->query("INSERT INTO `materials` (`course_id`, `name`, `file`) VALUES ('$id', '$mat', '$mat')");
                        }

                        $add = $db->query("UPDATE `courses` SET `name` = '$name', `course_id` = '$course_id' WHERE `id` = $id");
                        if ($add === TRUE) {
                            echo '<p>Course Updated Successfully!</p>';
                        } else {
                            echo '<p>Error!<br />' . $db->error . '</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>

            <script src="../assets/js/jquery-1.10.2.min.js"></script>
            <script src="../assets/js/js.min.js"></script>
            <script src="../assets/js/custom.js"></script>
            <script src="../assets/js/jquery.MultiFile.js"></script>
</html>