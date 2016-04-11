
<?php
require('../db.php');
$id = $_GET['id'];
$get_quiz = $db->query("SELECT `file` AS `questions`, `course_id` FROM `exams` WHERE `id` = $id");
$quiz = $get_quiz->fetch_array();
$questions = $quiz['questions'];
$course_id = $quiz['course_id'];
$questions = unserialize($questions);

$answers = @$_POST['answer'];
$score = 0;
if (is_array($answers)) {
    foreach ($answers AS $k => $ans) {
        if ($ans == $questions[$k]['correct']) {
            $score++;
        }
    }
}
$student_id = $_SESSION['id'];

$get_prof_id = $db->query("SELECT `professor_id` FROM `courses` WHERE `id` = $course_id");
$prof_id = $get_prof_id->fetch_array();
$prof_id = $prof_id['professor_id'];


$db->query("INSERT INTO `exam_results` (`professor_id`, `course_id`, `exam_id`, `student_id`, `result`) VALUES ($prof_id, $course_id, $id, $student_id, $score)");
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
                        <h1 id="forms">Take Quiz</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="well bs-component">
                        Congratulations, you got a score of <strong><?php echo $score; ?></strong>
                    </div>
                </div>
            </div>

            <script src="../assets/js/jquery-1.10.2.min.js"></script>
            <script src="../assets/js/js.min.js"></script>
            <script src="../assets/js/custom.js"></script>
            <script src="../assets/js/jquery.MultiFile.js"></script>
</html>