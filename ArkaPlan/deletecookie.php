<?php
// user submitted a form to get to this page, but we aren't doing anything meaningful with the form. Perhaps in the future. // set the expiration date to one hour ago - that will delete the cookie
  setcookie("color", "", time() - 3600);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <body bgcolor="lightgreen"><h1>Delete Cookie Page</h1>
<p>Your color cookie has been deleted.</p>
<p>Click <a href="setback.php">here</a> to return to the set background via cookie page.</p>
<p>Click <a href="cookie2.php">here</a> to test what your background is now in a regular web page.</p>
<br>

  </body>
</html>
