<?php
$sunucu="localhost";
$kullanici_adi="root";
$sifre="";
$veri_tabani="form";

$baglanti= new mysqli($sunucu,$kullanici_adi,$sifre,$veri_tabani,3306);
//3306 mysql'in varsayılan port numarası
//sunucuya bağlanırken port numarasına ihtiyaç vardır.

if ($baglanti->connect_error) {
  die ("Bağlantı sağlanamadı :".$baglanti->connect_error);
}
else {
  echo "Bağlantı başarılı";
}


 ?>
