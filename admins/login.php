<?php

var_dump($_POST);
?>

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
    <!-- Your HTML -->
    <form method="post" action="login.php" id="my_form">
        <fieldset>
          <legend>Admin Login</legend>
          <ul>
            <li>
              <label for="name">Username</label>
              <input type="text" name="name" id="name" >
            </li>
            <li>
              <label for="name">Password</label>
              <input type="password" name="password" id="email" >
            </li>
            <li>
              <input type="submit" name="submit" value="submit" id="submit" >
            </li>
          </ol>
        </fieldset>
      </form>
    <!-- Your dependent libraries -->
    <!-- Your scripts -->
    <script>
      
    </script>
  </body>
</html>
