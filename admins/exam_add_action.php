<?php
require('../db.php');
?>
<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='utf-8'>
        <title>Add Exam</title>
    </head>
    <body>
        <header>
            <table width="600" border="0">
                <tbody>
                    <tr>
                        <td width="15%"><a href="professor_list.php">Professors</a></td>
                        <td width="15%"><a href="student_list.php">Students</a></td>
                        <td width="15%"><a href="course_list.php">Courses</a></td>
                        <td width="15%"><a href="exam_list.php">Exams</a></td>
                        <td width="15%"><a href="material_list.php">Materials</a></td>
                        <td width="15%"><a href="comment_list.php">Comments</a></td>
                    </tr>
                </tbody>
            </table>
        </header>
        <main>
            <h2>Add new exam</h2>
            <?php
                $name = $_POST['name'];
                $course = $_POST['course'];

                $add = $db->query("INSERT INTO `exams` VALUES ('', '$course', '$name', '')");
                if($add===TRUE) {
                    echo '<p>Exam Created Successfully!</p>';
                } else {
                    echo '<p>Error!</p>';
                }

            
            ?>
        </main>
    </body>
</html>