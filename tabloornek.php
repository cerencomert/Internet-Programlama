// 7*8'lik bir tablo oluşturan hücre içerisine numarasını yazan php kodu
<!DOCTYPE html>
<html>
<body>
<table border="1" cellpadding="10" cellspacing="0">
<?php
$sayac=0;
for($i=1;$i<=8;$i++)
{
echo "<tr>";
for ($j=1;$j<=7;$j++)
  {
  echo "<td>";
  echo $sayac; $sayac++;
  echo "</td>";
  }
  echo "</tr>";
  }
?>
</table>
</body>
</html>
