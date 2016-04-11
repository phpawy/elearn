<?php
require('../db.php');
?>
<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='utf-8'>
        <title>Edit Material</title>
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
            <h2>Edit Material</h2>
            <?php
                $id = $_GET['id'];
                $name = $_POST['name'];
                $file = $_POST['file'];
                $course = $_POST['course'];
                
                $update = $db->query("UPDATE `materials` SET `Material_Name` = '$name', `Material_File` = '$file', `Material_Course_ID` = '$course' WHERE `Material_ID` = $id");
                if($update===TRUE) {
                    echo '<p>Material Updated Successfully!</p>';
                } else {
                    echo '<p>Error!<br />'.$db->error.'</p>';
                }

            
            ?>
        </main>
    </body>
</html>