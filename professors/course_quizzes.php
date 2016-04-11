<?php
require('../db.php');
$course_id = $_GET['id'];

if(isset($_GET['do']) AND isset($_GET['quiz_id'])) {
    $quiz_id = intval($_GET['quiz_id']);
    $db->query('DELETE FROM `exams` WHERE `id` = '.$quiz_id);
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
                        <h1 id="tables">List Quizzes</h1>
                    </div>

                    <div class="bs-component">
                        <table class="table table-striped table-hover ">
                            <thead>
                                <tr>
                                    <th>Quiz ID</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $qzs = $db->query('SELECT * FROM `exams` WHERE `course_id` = ' . $course_id);
                                while ($qz = $qzs->fetch_array()) {
                                    $i++;
                                    echo '<tr>
                    <td>Quiz ' . $i . '</td>
                    <td>
                        <a href="course_quizzes.php?do=delete&quiz_id=' . $qz['id'] . '&id='.$course_id.'">Delete</a>
                    </td>
                    </tr>';
                                }
                                ?>
                            </tbody>
                        </table> 
                        <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div><!-- /example -->
                </div>
            </div>
            <div class="row">
                <p>
                    <a href="course_add_quiz.php?id=<?php echo $course_id ?>">
                        <button>Add new quiz</button>
                    </a>
                </p> 
            </div>

        </div>
        <script src="../assets/js/jquery-1.10.2.min.js"></script>
        <script src="../assets/js/js.min.js"></script>
        <script src="../assets/js/custom.js"></script>
</html>