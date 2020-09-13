<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    echo "Renk: ".$_SESSION["renk"]." <br>";
    echo "Hayvan: ".$_SESSION["hayvan"]." <br><hr>" ;
    $_SESSION["renk"]="beyaz";
    //değişkenlerin hepsini görebilmek için:
    print_r($_SESSION);

    //tüm oturum değişkenlerini siler:
    session_unset();

    //oturumu sonlandırır:
    session_destroy();
    ?>
  </body>
</html>
