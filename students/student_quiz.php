
<?php
require('../db.php');
$id = $_GET['quiz_id'];
$get_quiz = $db->query("SELECT `file` AS `questions`, `time` FROM `exams` WHERE `id` = $id");
$quiz = $get_quiz->fetch_array();
$que = $quiz['questions'];
$questions = unserialize($que);
$time = $quiz['time']*60;
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
                        <span id='cd'>Quiz time: <?php echo $time ?></span>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
            function countDown(secs, elem)
            {
                var element = document.getElementById(elem);
                element.innerHTML = "<h2>You have <b>"+secs+"</b> seconds to answer the questions</h2>";
                if(secs < 1) {
                    document.quiz.submit();
                }
                else
                {
                    secs--;
                    setTimeout('countDown('+secs+',"'+elem+'")',1500);
                }
            }

            </script> 
        <script type="text/javascript">countDown(<?php echo $time ?>,"cd");</script>

            <div class="row">
                <div class="col-lg-8">
                    <div class="well bs-component">
                        <?php
                        if (is_array($questions)) {
                            ?>
                            <form class="form-horizontal" method="post" action="student_quiz_action.php?id=<?php echo $id; ?>" name='quiz'>
                                <?php
                                $i = 1;
                                foreach ($questions AS $q) {
                                    ?>
                                    <fieldset>
                                        <legend><?php echo $q['name']; ?></legend>
                                        <?php
                                        $ii = 1;
                                        foreach ($q['answers'] AS $an) {
                                            ?>
                                            <div class="form-group">
                                                <div class="col-lg-10">
                                                    <input type="radio" name="answer[<?php echo $i ?>]" value="<?php echo $ii ?>" />&nbsp;<?php echo $an ?>
                                                </div>
                                            </div>
                                            <?php
                                            $ii++;
                                        }
                                        ?>
                                    </fieldset>
                                    <?php
                                    $i++;
                                }
                                ?>

                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button type="reset" class="btn btn-default">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                </fieldset>
                            </form>
                            <?php
                        }
                        else {
                            echo "There is no quiz";
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