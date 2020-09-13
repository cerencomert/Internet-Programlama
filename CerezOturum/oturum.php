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
    $_SESSION["renk"]="yeşil";
    $_SESSION["hayvan"]="pisi";
    echo "Oturum değişkenleri oluşturuldu. <br>";
    echo "Artık bunları aynı sunucudan çalıştırılan <br> diğer sayfalarda da kullanabilirsiniz.";
     ?>
  </body>
</html>
