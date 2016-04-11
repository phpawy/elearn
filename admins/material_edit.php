<?php
require('../db.php');
$id = $_GET['id'];

$get_material = $db->query("SELECT * FROM `materials` WHERE `Material_ID` = $id");
$ma = $get_material->fetch_array();
$name = $ma['Material_Name'];
$file = $ma['Material_File'];
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
            <h2>Edit material</h2>
            <form method="post" action="material_edit_action.php?id=<?php echo $id; ?>" id="my_form">
                <fieldset>
                    <legend>Material details</legend>
                    <ul>
                        <li>Material name
                            <input type="text" name="name" id="name" value="<?php echo $name; ?>">
                        </li>
                        <li>
                            <label for="course">Course</label>
                            <label for="course">Select:</label>
                            <select name="course" id="course">
                                <?php
                                $courses = $db->query("SELECT * FROM `courses`");
                                while ($co = $courses->fetch_array()) {
                                    echo "<option value='" . $co['Course_ID'] . "'>" . $co['Course_Name'] . "</option>";
                                }
                                ?>
                            </select>
                        </li>
                        <li>
                            <label for="name">Material Link</label>
                            <input type="text" name="file" id="file" value="<?php echo $file; ?>" >
                        </li>
                        <li>
                            <input type="submit" name="submit" value="Update" id="submit" >
                        </li>
                    </ul>
                </fieldset>
            </form>
        </main>
    </body>
</html>
