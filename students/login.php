<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='utf-8'>
        <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <title>Sample Page</title>
        <!-- Your CSS -->
        <style>

        </style>
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

            <form method="post" action="login.php" id="my_form">
                <fieldset>
                    <legend>Student Login</legend>
                    <ul>
                        <li>
                            <label for="name">Username</label>
                            <input type="text" name="name" id="name" >
                        </li>
                        <li>
                            <label for="name">Password</label>
                            <input type="email" name="email" id="email" >
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
