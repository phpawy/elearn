<?php
require('../db.php');
$id = $_GET['id'];
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
                        <h1 id="forms">Add new quiz</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="well bs-component">
                        <form class="form-horizontal" method="post" action="course_add_quiz_action.php?id=<?php echo $id; ?>">
                            
                            <legend>Quiz Time in minutes</legend>
                                <div class="form-group">
                                    <label for="time" class="col-lg-2 control-label">Time</label>
                                    <div class="col-lg-10">
                                        <select name="time" id="time" class="form-control" required >
                                            <?php
                                            for($c=1;$c<=60;$c++) {
                                                echo "<option value=$c>$c</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            
                            <?php
                            for($i=1;$i<=10;$i++) {
                            ?>
                            <fieldset>
                                <legend>Question <?php echo $i?></legend>
                                <div class="form-group">
                                    <label for="course_id" class="col-lg-2 control-label">Question</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="questions[<?php echo $i?>][name]" placeholder="Enter Question" required >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-lg-2 control-label">Answer 1</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="questions[<?php echo $i?>][answers][1]" placeholder="Enter Answer 1" required >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-lg-2 control-label">Answer 2</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="questions[<?php echo $i?>][answers][2]" placeholder="Enter Answer 2" required >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-lg-2 control-label">Answer 3</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="questions[<?php echo $i?>][answers][3]" placeholder="Enter Answer 3" required >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-lg-2 control-label">Correct answer</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="questions[<?php echo $i?>][correct]" required>
                                            <option value="1">Answer 1</option>
                                            <option value="2">Answer 2</option>
                                            <option value="3">Answer 3</option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                            <?php
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
                    </div>
                </div>
            </div>

            <script src="../assets/js/jquery-1.10.2.min.js"></script>
            <script src="../assets/js/js.min.js"></script>
            <script src="../assets/js/custom.js"></script>
            <script src="../assets/js/jquery.MultiFile.js"></script>
</html>