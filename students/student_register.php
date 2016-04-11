<?php
require('../db.php');
?>
<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='utf-8'>
        <title>Student Register</title>
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
            <form method="post" action="student_register_action.php" id="my_form">
                <fieldset>
                    <legend>Student Register</legend>
                    <ul>
                        <li>
                            <label for="course">Select Course:</label>
                            <select name="course" id="course">
                                <?php
                                $courses = $db->query("SELECT Course_ID, Course_Name FROM `courses`");
                                while($co = $courses->fetch_array()) {
                                    echo "<option value='".$co['Course_ID']."'>".$co['Course_Name']."</option>";
                                }
                                ?>
                            </select>
                        </li>
                        
                        <li>
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" >
                        </li>
                        <li>
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" >
                        </li>
                        <li>
                            <label for="repassword">Repeat password</label>
                            <input type="password" name="repassword" id="repassword" >
                        </li>
                        <li>
                            <label for="first_name">First name:</label>
                            <input type="text" name="first_name" id="first_name">
                        </li>
                        <li>
                            <label for="last_name">Last name:</label>
                            <input type="text" name="last_name" id="last_name">
                        </li>
                        <li>
                            <label for="mobile">Mobile:</label>
                            <input type="text" name="mobile" id="mobile">
                        </li>
                        
                        <li>
                            <input type="submit" name="submit" value="submit" id="submit" >
                        </li>
                        </ol>
                </fieldset>
            </form>
        </main>
    </body>
</html>
