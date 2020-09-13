<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body

<?php
if (!empty($_POST["sec"]))
{
  $cerez_adi = "arkaplan";
  $cerez_deger = $_POST["secim"];
  setcookie($cerez_adi, $cerez_deger, time() +60, '/');
  }
  if (isset($_COOKIE["arkaplan"]))
  {
    echo "bgcolor=$cerez_deger";
  }
 ?>

  >
    <h2 >Arkaplan Değiştirme</h2>
    <hr>
    <form class="" action="" method="post">
      Arkaplan rengi seçiniz: <select name="secim">
  						<option value="#5F9EA0">Mavi</option>
  						<option value="#556B2F">Yeşil</option>
  						<option value="#FFB6C1">Pembe</option>
              <option value="#de5454">Kırmızı</option>
  					</select><br><br>
            <input type="submit" value="Seç" name="sec">
    </form>
  </body>
</html>
