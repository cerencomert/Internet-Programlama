<!DOCTYPE html>
<?php
// cookies have to be handled before any html coding...
 if (!empty($_COOKIE["color"])) {
   $color = $_GET['color'];
// only set cookie if form has been filled out
   if ($color) {
 //this adds about 6 months to current time making a cookie that expires in 6 months
     $timesecs = 6*30*24*3600 + time();
     $color = $_GET['color'];
     setcookie("color", $color, $timesecs);
   }
 }
 ?>
<html lang="en" dir="ltr">
  <head>
    <?php
 // After submitting the form we do not yet have the cookie set, but we can learn desired color from form submission
 if (isset($_COOKIE["color"]) ||isset( $_GET['color']))
 {
	 
	 $bgcolor=isset($_COOKIE["color"]) ? $_COOKIE["color"] : $_GET['color'];
	$timesecs = 6*30*24*3600 + time();
    setcookie("color", $bgcolor, $timesecs);
 }
   
  
 else
   $bgcolor="white";
 echo "<body bgcolor='$bgcolor'>";
?>
    <meta charset="utf-8">
    <title>Set Background Color</title>
  </head>
  <body>
    <?php
     if (!(!empty($_COOKIE["color"]) || isset($_GET['color']))) {
       echo "We noticed you have not selected a background color. Please select from one of the options below.<p>";
       echo "
    <form>
      Background Color<p>

    <input type='radio' name='color' value='pink'><font color='pink'>pink</font><p>
    <input type='radio' name='color' value='lightblue'><font color='lightblue'>light blue</font><p>
    <input type='radio' name='color' value='lightgreen'><font color='lightgreen'>light green</font><p>
    <input type='submit'>
    </form>
      ";
     }
     else {
       echo "Chosen color: $bgcolor<p>";
       echo "This is a <a href='cookie2.php'>link</a> to a regular page which uses the background color cookie.<p>";
       echo "<form action='deletecookie.php'><br>
        Click the button below to delete your cookie and start all over.<br>
        <input type='hidden' name='DeleteCookieFlag' value='true'>
        <input type='submit' value='Remove Cookie'><br>
        ";
     }
    ?>


  </body>
</html>
