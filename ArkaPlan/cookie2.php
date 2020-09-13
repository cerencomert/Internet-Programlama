<!DOCTYPE html>
 <?php include("bgcolor.php"); ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Regular Web Page</title>
  </head>


  <body>
    <?php
     $color = isset($_COOKIE["color"]) ? isset($_COOKIE["color"]) : "none";
     echo "Chosen color: $color<p>";
     if (isset($_COOKIE["color"]))
       echo '<p>Click <a href="deletecookie.php">here</a> to delete your background color cookie.</p>';
     else
       echo '<p>Click <a href="deletecookie.php">here</a> to set your background color.</p>';
    ?>
  </body>
</html>
