<?php
require('../db.php');
?>
<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='utf-8'>
        <title>Add Material</title>
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
            <h2>Add material</h2>
            <form method="post" action="material_add_action.php" id="my_form">
                <fieldset>
                    <legend>Material details</legend>
                    <ul>
                        <li>Material name
                            <input type="text" name="name" id="name" >
                        </li>
                        <li>
                            <label for="course">Course</label>
                            <label for="course">Select:</label>
                            <select name="course" id="course">
                                <?php
                                $courses = $db->query("SELECT * FROM `courses`");
                                while($co = $courses->fetch_array()) {
                                    echo "<option value='".$co['Course_ID']."'>".$co['Course_Name']."</option>";
                                }
                                ?>
                            </select>
                        </li>
                        <li>
                            <label for="link">Material Link</label>
                            <input type="text" name="link" id="link" >
                        </li>
                        <li>
                            <input type="submit" name="submit" value="Save" id="submit" >
                        </li>
                    </ul>
                </fieldset>
            </form>
        </main>
    </body>
</html>
