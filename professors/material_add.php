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
          <td width="15%"><a href="course_list.html">View Courses</a></td>
        </tr>
      </tbody>
    </table>
  </header>
  <main>
    <!-- Your HTML -->
    <h2>Add material</h2>
    
    
    <form method="post" action="#" id="my_form">
        <fieldset>
          <legend>Material details</legend>
          <ul>
          <li>Material name
            <input type="text" name="username" id="username" >
            </li>
            <li>
              <label for="name">Course</label>
              <label for="select">Select:</label>
              <select name="select" id="select">
                <option>Course 1</option>
                <option>Course 2</option>
              </select>
            </li>
            <li>
              <label for="name">Material Link</label>
              <input type="text" name="name" id="name" >
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
