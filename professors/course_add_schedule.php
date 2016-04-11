<?php
require('../db.php');
$id = $_GET['id'];



if (isset($_GET['do']) && $_GET['do'] == "add") {
    $day = $_POST['day'];
    $time = $_POST['time'];
    $course_id = $_POST['course_id'];
    $professor_id = $_SESSION['id'];

    $add = $db->query("INSERT INTO `schedule` (`professor_id`, `course_id`, `day`, `time`) "
            . "VALUES ('$professor_id', '$course_id', '$day', '$time')");
}
elseif (isset($_GET['do']) && $_GET['do'] == "delete") {
    $id = $_GET['id'];
    $add = $db->query("DELETE FROM `schedule` WHERE `id` = $id");
}
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
                    <td>
                        <a href="course_add_schedule.php?do=delete&id=' . $sch['id'] . '">Delete</a>
                    </td>
                    </tr>';
                        }
                        ?>
                    </tbody>
                </table> 
                <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div><!-- /example -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h1 id="forms">Add schedule</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="well bs-component">
                        <form class="form-horizontal" method="post" action="course_add_schedule.php?do=add&id=<?php echo $course_id; ?>">
                            <fieldset>
                                <div class="form-group">
                                    <label for="day" class="col-lg-2 control-label">Day</label>
                                    <div class="col-lg-10">
                                        <select name="day" class="form-control" required>
                                            <option value="Sunday">Sunday</option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="from" class="col-lg-2 control-label">Time</label>
                                    <div class="col-lg-10">
                                        <select name="time" class="form-control" required>
                                            <option value="09:00 to 10:00">09:00 to 10:00 AM</option>
                                            <option value="10:00 to 11:00 AM">10:00 to 11:00 AM</option>
                                            <option value="11:00 to 12:00 PM">11:00 to 12:00 PM</option>
                                            <option value="12:00 to 01:00 PM">12:00 to 01:00 PM</option>
                                            <option value="01:00 to 02:00 PM">01:00 to 02:00 PM</option>
                                            <option value="02:00 to 03:00 PM">02:00 to 03:00 PM</option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <input type="hidden" name="course_id" value="<?php echo $course_id ?>" />
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