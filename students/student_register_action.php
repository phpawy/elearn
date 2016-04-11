<?php
require('../db.php');
?>
<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='utf-8'>
        <title>Register Student</title>
    </head>
    <body>
        <header>
            <table width="600" border="0">
                <tbody>
                    <tr>
                        <td width="7%"><a href="course_list.php">View Courses</a></td>
                        <td width="8%"><a href="student_register.php">Register as Student</a></td>
                    </tr>
                </tbody>
            </table>
        </header>
        <main>
            <h2>Regsiter Student</h2>
            <?php
                $username = $_POST['username'];
                $password = $_POST['password'];
                $repassword = $_POST['repassword'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $mobile = $_POST['mobile'];
                $course = $_POST['course'];

                $add = $db->query("INSERT INTO `students` VALUES ('', '$course', '$username', '$password', '$first_name', '$last_name', '$mobile')");
                if($add===TRUE) {
                    echo '<p>Student Created Successfully!</p>';
                } else {
                    echo '<p>Error!</p>';
                }

            
            ?>
        </main>
    </body>
</html>