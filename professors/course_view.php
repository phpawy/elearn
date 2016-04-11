<?php
require('../db.php');
$id = $_GET['id'];

$get_course = $db->query("SELECT * FROM `courses` WHERE `id` = $id");
$course = $get_course->fetch_array();
$name = $course['name'];

if (isset($_GET['do']) && $_GET['do'] == 'comment') {
    $course_id = $_GET['id'];
    //$student_id = $_SESSION['id'];
    $comment = $_POST['comment'];
    $db->query("INSERT INTO `comments` (`student_id`, `course_id`, `text`) VALUES ('0', '$course_id', '$comment')");
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
                        <h1 id="forms"><?php echo $name ?></h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="well bs-component">
                        <table>
                            <tr>
                                <th width="397">Course materials</th>
                            </tr>
                            <?php
                            $materials = $db->query("SELECT * FROM `materials` WHERE `course_id` = $id");
                            while ($mat = $materials->fetch_array()) {
                                echo '<tr><td><a href="'.$mat['file'].'" target="_blank">' . $mat['file'] . '</a></td></tr>';
                            }
                            ?>

                        </table>
                        <p>
                        </p>
                        <table cellpadding="10">
                            <tr>
                                <th colspan="2">Course Comments</th>
                            </tr>

                            <?php
                            $comments = $db->query("SELECT * FROM `comments` WHERE `course_id` = $id");
                            while ($com = $comments->fetch_array()) {
                                $get_student = $db->query("SELECT `username` FROM `students` WHERE `id` = {$com['student_id']}");
                                $student = $get_student->fetch_array();
                                echo '<tr><td width="94" bgcolor="#D8D8D8">'.$student['username'].'</td><td>' . $com['text'] . '</td></tr>';
                            }
                            ?>


                            <tr>
                                <td bgcolor="#D8D8D8">&nbsp;</td>
                                <td>
                                    <br />
                                    <br />
                                    <form method="post" action="course_view.php?do=comment&id=<?php echo $id; ?>">
                                        <p>Add your comment</p>
                                        <p>
                                            <label for="textarea">Comment:</label>
                                            <textarea name="comment" cols="35" rows="5" id="comment"></textarea>
                                        </p>

                                        <p>
                                            <input type="submit" name="submit" id="submit" value="Add">
                                        </p>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <script src="../assets/js/jquery-1.10.2.min.js"></script>
            <script src="../assets/js/js.min.js"></script>
            <script src="../assets/js/custom.js"></script>
            <script src="../assets/js/jquery.MultiFile.js"></script>
</html>