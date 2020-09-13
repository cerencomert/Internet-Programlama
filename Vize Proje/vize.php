<?php
$sunucu="localhost";
$kullanici_adi="root";
$sifre="";
$veri_tabani="ara_sinav";

$baglanti= new mysqli($sunucu,$kullanici_adi,$sifre,$veri_tabani,3306);

if ($baglanti->connect_error) {
  die ("Bağlantı sağlanamadı :".$baglanti->connect_error);
}
 ?>
<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
    if(isset($_POST["cc_duzenle"]))
    {
      $sql = "SELECT * FROM `kullanici` WHERE `kullanici`.`id` = ".$_POST['cc_duzenlenecek']." ";
      $sonuc=$baglanti->query($sql);
      $kayit=$sonuc->fetch_assoc();
     ?>
     <h2  style="">Düzenleme Formu</h2>
     <hr style="width:50%;text-align:left;margin-left:0">
     <form class="" method="POST" enctype="multipart/form-data">
       <input type="hidden" name="cc_duzenlenecek_kayit_id" value="<?=$kayit["id"]?>">
       Kullanıcı Adı: <input type="text" name="cc_kullanici" value="<?=$kayit["kullanici_adi"]?>" autofocus> <br><br>
       Şifre: <input type="password" name="cc_sifre" value="<?=$kayit["sifre"]?>" > <br><br>
       E-posta Adresi: <input type="text" name="cc_eposta" value="<?=$kayit["eposta"]?>" > <br><br>
       <input type="submit" name="cc_duzenle_kaydet" value="Düzenlemeyi Kaydet" style=" border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer; background-color: #4CAF50;">
       <hr style="width:50%;text-align:left;margin-left:0">
     </form>
     <br><br>

         <?php
         }
         else {
          ?>

    <h2>Kayıt Formu</h2>
    <hr style="width:50%;text-align:left;margin-left:0">
    <form class="" method="POST" enctype="multipart/form-data">
      Kullanıcı Adı: <input type="text" name="cc_kullanici" value="" placeholder="Kullanıcı adı giriniz" autofocus> <br><br>
      Şifre: <input type="password" name="cc_sifre" value="" placeholder="Şifre giriniz"> <br><br>
      E-posta Adresi: <input type="text" name="cc_eposta" value="" placeholder="E-posta adresi giriniz"> <br><br>
      <input type="submit" name="cc_kaydet" value="Kaydet" style=" border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer; background-color: #4CAF50;">
      <hr style="width:50%;text-align:left;margin-left:0">
    </form>
    <br><br>

        <?php
        }
        ?>

    <?php

    if(isset($_POST["cc_duzenle_kaydet"]))
    {
      $sorgu= "UPDATE `kullanici` SET `kullanici_adi` = '".$_POST["cc_kullanici"]."', `sifre` = '".$_POST["cc_sifre"]."', `eposta` = '".$_POST["cc_eposta"]."' WHERE `kullanici`.`id` = ".$_POST["cc_duzenlenecek_kayit_id"]."; ";
      $baglanti->query($sorgu);
    }

    if(isset($_POST["cc_kaydet"]))
    {
    $sorgu="INSERT INTO `kullanici` (`id`, `kullanici_adi`, `sifre`, `eposta`) VALUES (NULL, '".$_POST["cc_kullanici"]."', '".$_POST["cc_sifre"]."', '".$_POST["cc_eposta"]."');";

    if ($baglanti->query($sorgu) === TRUE)
    {
      echo "Kayıt başarıyla eklendi. <br>";
    }
    else
    {
      echo "Kayıt eklenirken hata: " . $baglanti->error;
    }

    echo "Kullanıcı adı = ".$_POST["cc_kullanici"]."<br>";
    echo "Şifre = ".$_POST["cc_sifre"]."<br>";
    echo "E-posta adresi = ".$_POST["cc_eposta"]."<br>";
    }
     ?>

     <form method="post" style="width:50%;">
     <table border="2" style="width:100%;">
       <tr>
         <th>Kullanıcı Adı</th>
         <th>Şifre</th>
         <th>E-posta Adresi</th>
         <th>Düzenle</th>
         <th>Sil</th>
       </tr>

       <?php
       if(isset($_POST["cc_sil"]))
       {
         foreach ($_POST['cc_silinecek'] as $silinecek) {
           $sql = "DELETE FROM `kullanici` WHERE `kullanici`.`id` = '".$silinecek."' ";
           $baglanti->query($sql);
         }

       }
       $sql = "SELECT * FROM `kullanici` ";
       $sonuc=$baglanti->query($sql);

       while($satir =$sonuc->fetch_assoc() )
       {
         echo "<tr>";
         echo "<td>".$satir["kullanici_adi"]."</td>";
         echo "<td>".$satir["sifre"]."</td>";
         echo "<td>".$satir["eposta"]."</td>";
         echo "<td align='center'>"."
          <form action='' method='post'>
             <input type='hidden' name='cc_duzenlenecek' value='".$satir["id"]."'>
             <input type='submit' name='cc_duzenle' value='Düzenle'>
           </form>"
         ."</td>";
         echo "<td align='center'>"."
           <input type='checkbox' name='cc_silinecek[]' value='".$satir["id"]."'>
         "."</td>";
         echo "</tr>";
       }
        ?>
     </table>
       <input type='submit' name='cc_sil' value='Seçilenleri Sil'
       style=" border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer; background-color: red; float:right;">
     </form>
  </body>
</html>
