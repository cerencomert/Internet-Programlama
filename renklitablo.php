<?php /*
5 ile 10 aralığında rastgele satır ve sütun sayısına sahip bir tablo oluşturan programı yazınız.
Tablonun her bir hücresinin rengi rastgele üretilsin.
Hücrelerde yazan değerler rastgele 0-100 aralığında olsun ama birbirinin aynı kesinlikle olmasın.

İçinde tek sayı olanların border 2px red solid
        çift sayı ise border 2px dotted black
*/ ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table border="2" cellpadding="10" cellspacing="0">
    <?php
    $sayac=1;
    $a=rand(5,10);
    $c=rand(5,10);
    $randomsayi=(range(0,100));
    shuffle($randomsayi);
    for($i=1;$i<=$a;$i++)
    {
    echo "<tr>";
    for ($j=1;$j<=$c;$j++)
      {
      $renk = "(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
      $r=rand(0,255);
      $g=rand(0,255);
      $b=rand(0,255);
      $border = ($randomsayi[$sayac]%2==0)?"border:2px dotted white":"border:2px solid black";
      echo "<td style='background-color:rgb($r,$g,$b);$border'>";
      echo "$randomsayi[$sayac]";
      $sayac++;
      echo "</td>";
      }
      echo "</tr>";
      }
     ?>
     </table>
  </body>
</html>
