<?php
include("baglan.php");
 ?>
<!Doctype html>
<html>
	<head>
	</head>
	<body>
    <?php

    if(isset($_POST["duzenle"]))
    {
      $sql = "SELECT * FROM `tablo` WHERE `tablo`.`id` = ".$_POST['duzenlenecek']." ";
      $sonuc=$baglanti->query($sql);
      $kayit=$sonuc->fetch_assoc();
     ?>


     <h2>Düzenleme Formu</h2>
     <form action="" method="POST" enctype="multipart/form-data">
       <input type="hidden" name="duzenlenecek_kayit_id" value="<?=$kayit["id"]?>">
     Metin Alanı <input type="text" name="fe_metin" value="<?=$kayit["metin"]?>"><br>
     Gizli Alan <input type="hidden" name="fe_hidden" value="<?=$kayit["gizli"]?>"><br>
     Şifre <input type="password" name="fe_sifre" value="<?=$kayit["sifre"]?>"><br>
     Tik Kutusu <input type="checkbox" name="fe_tik" value="asd" <?=($kayit["tik"])?"checked":"" ?> ><br>
     Radio Düğme <input type="radio" name="fe_radyo" value="A" <?=($kayit["radyo"]=="A")?"checked":"" ?>>
          <input type="radio" name="fe_radyo" value="B" <?=($kayit["radyo"]=="B")?"checked":"" ?>><br>
     Seçim Kutusu<select name="fe_secim">
            <option value="10" <?=($kayit["secim"]=="10")?"selected":"" ?> >Balıkesir</option>
            <option value="34" <?=($kayit["secim"]=="34")?"selected":"" ?> >İstanbul</option>
            <option value="16" <?=($kayit["secim"]=="16")?"selected":"" ?> >Bursa</option>
          </select>
          <br>
          <?php $secililer=explode("," ,$kayit["coklu"]) ; ?>
     Çoklu Seçim<select name="fe_coklu_secim[]" size="5" multiple>
            <option <?=(in_array("Balıkesir",$secililer))?"selected":""?> >Balıkesir</option>
            <option <?=(in_array("İstanbul",$secililer))?"selected":""?> >İstanbul</option>
            <option <?=(in_array("Bursa",$secililer))?"selected":""?> >Bursa</option>
            <option <?=(in_array("İzmir",$secililer))?"selected":""?> >İzmir</option>
            <option <?=(in_array("Manisa",$secililer))?"selected":""?> >Manisa</option>
          </select>
          <br>
     Metin Kutusu <textarea name="fe_metin_kutusu"> <?=$kayit["metinkutusu"]?> </textarea><br>
     Dosya Seç <input type="file" name="fe_dosya"><br>
     <hr>
     <input type="submit" value="Düzenlemeyi Kaydet" name="duzenle_kaydet">
     </form>

    <?php
    }
    else {
     ?>


     <form action="" method="POST" enctype="multipart/form-data">
 		Metin Alanı <input type="text" name="fe_metin" value="metin"><br>
 		Gizli Alan <input type="hidden" name="fe_hidden" value="gizli metin"><br>
 		Şifre <input type="password" name="fe_sifre" value="123456"><br>
 		Tik Kutusu <input type="checkbox" name="fe_tik" value="asd"><br>
 		Radio Düğme <input type="radio" name="fe_radyo" value="A">
 					<input type="radio" name="fe_radyo" value="B"><br>
 		Seçim Kutusu<select name="fe_secim">
 						<option value="10">Balıkesir</option>
 						<option value="34">İstanbul</option>
 						<option value="16">Bursa</option>
 					</select><br>
 		Çoklu Seçim<select name="fe_coklu_secim[]" size="5" multiple>
 						<option>Balıkesir</option>
 						<option>İstanbul</option>
 						<option>Bursa</option>
 						<option>İzmir</option>
 						<option>Manisa</option>
 					</select><br>
 		Metin Kutusu <textarea name="fe_metin_kutusu">
 						asdf
 						asdfasdf
 						asdf
 					</textarea><br>
 		Dosya Seç <input type="file" name="fe_dosya"><br>

 		<hr>
 		<input type="submit" value="Gönder" name="gonder">
 		</form>


    <?php
    }
    ?>

		<hr>

		<?php

    if(isset($_POST["duzenle_kaydet"]))
    {
      $secilenler= "";
      if (isset($_POST["fe_coklu_secim"]))
      {
        foreach($_POST["fe_coklu_secim"] as $secim):
          echo $secilenler .=$secim.",";
        endforeach;
      }

    $sorgu= "UPDATE `tablo` SET `metin` = '".$_POST["fe_metin"]."',
     `gizli` = '".$_POST["fe_hidden"]."',
      `sifre` = '".$_POST["fe_sifre"]."',
       `tik` = '".((isset($_POST["fe_tik"]))?1:0)."',
        `radyo` = '".((isset($_POST["fe_radyo"]))?$_POST["fe_radyo"]:' ')."',
         `secim` = ".$_POST["fe_secim"].",
          `coklu` = '".$secilenler."',
           `metinkutusu` = '".$_POST["fe_metin_kutusu"]."'

              WHERE `tablo`.`id` = ".$_POST["duzenlenecek_kayit_id"]."; ";
      $baglanti->query($sorgu);
    }


			if(isset($_POST["gonder"]))
			{
				$secilenler= "";
				if (isset($_POST["fe_coklu_secim"]))
				{
					foreach($_POST["fe_coklu_secim"] as $secim):
						echo $secilenler .=$secim.",";
					endforeach;
				}


			$sorgu = "INSERT INTO `tablo` (`id`, `metin`, `gizli`, `sifre`, `tik`, `radyo`, `secim`, `coklu`, `metinkutusu`, `dosya`)
			VALUES (NULL,
			'".$_POST["fe_metin"]."',
			'".$_POST["fe_hidden"]."',
			'".$_POST["fe_sifre"]."',

				/*tik kutusu*/
			".((isset($_POST["fe_tik"]))?1:0).",

			/* radyo butonu varchar kaydedeceği için çift tırnak dışlarına tek tırnak koymayı unutma! */
			'".((isset($_POST["fe_radyo"]))?$_POST["fe_radyo"]:' ')."',

			/*secim kutusunda tek tırnak kullanmaya gerek yok çünkü türü sayısal*/
			".$_POST["fe_secim"].",

			/* coklu secim de varchar kaydedeceği için çift tırnak dışlarına tek tırnak koymayı unutma! */
			'".$secilenler."',
			 '".$_POST["fe_metin_kutusu"]."',
			 '".((isset($_FILES["fe_dosya"]["tmp_name"]))?$_FILES["fe_dosya"]["tmp_name"]:"")."'
      );";

				//query sorgusu isset'in altında olmalıdır!


				if ($baglanti->query($sorgu) === TRUE)
				{
					echo "Kayıt başarıyla eklendi. <br>";
				}
				else
				{
					echo "Kayıt eklenirken hata: " . $baglanti->error;
				}

				echo "Metin alanı = ".$_POST["fe_metin"]."<br>";
				echo "Gizli alanı = ".$_POST["fe_hidden"]."<br>";
				echo "Şifre alanı = ".$_POST["fe_sifre"]."<br>";
				if (isset($_POST["fe_tik"]))
					echo "Tik Kutusu = ".$_POST["fe_tik"]."<br>";
				else
					echo "Tik kutusu seçilmedi...<br>";
				if (isset($_POST["fe_radyo"]))
					echo "Radyo Seçilen = ".$_POST["fe_radyo"]."<br>";
				echo "Seçim Kutusunda Seçilen = ".$_POST["fe_secim"]."<br>";
				if (isset($_POST["fe_coklu_secim"]))
				{
					echo "Seçilenler = ";
					foreach($_POST["fe_coklu_secim"] as $secim):
						echo $secim.",";
					endforeach;
				}
				echo "<br>Metin Kutusu = ".$_POST["fe_metin_kutusu"]."<br>";
				if (isset($_FILES["fe_dosya"]["tmp_name"]))
				{

          $path = "uploads/";
          $path = $path . basename( $_FILES['fe_dosya']['name']);
          move_uploaded_file($_FILES['fe_dosya']['tmp_name'], $path);
				}
				else
					echo "Dosya seçmediniz...<br>";
			}
		?>

    <hr>

  <form action='' method='post'>
    <table border="2">
      <tr>
        <th>id</th>
        <th>Metin</th>
        <th>Gizli</th>
        <th>Şifre</th>
        <th>Tik Kutusu</th>
        <th>Radyo Düğmesi</th>
        <th>Seçim Kutusu</th>
        <th>Çoklu Seçim</th>
        <th>Metin Kutusu</th>
        <th>Dosya</th>
        <th>Düzenle</th>
        <th>Sil Kutusu</th>
      </tr>

      <?php

      	if(isset($_POST["sil"]))
        {
          foreach ($_POST['silinecek'] as $silinecek) {
            $sql = "DELETE FROM `tablo` WHERE `tablo`.`id` = '".$silinecek."' ";
            $baglanti->query($sql);
          }

          /*$sql = "DELETE FROM `tablo` WHERE `tablo`.`id` = ".$_POST['silinecek']." ";
          $baglanti->query($sql);*/
        }


      $sql = "SELECT * FROM `tablo` ";
      $sonuc=$baglanti->query($sql);

      while($satir =$sonuc->fetch_assoc() )
      {
        echo "<tr>";
        echo "<td>".$satir["id"]."</td>";
        echo "<td>".$satir["metin"]."</td>";
        echo "<td>".$satir["gizli"]."</td>";
        echo "<td>".$satir["sifre"]."</td>";
        echo "<td>".$satir["tik"]."</td>";
        echo "<td>".$satir["radyo"]."</td>";
        echo "<td>".$satir["secim"]."</td>";
        echo "<td>".$satir["coklu"]."</td>";
        echo "<td>".$satir["metinkutusu"]."</td>";
        echo "<td>".$satir["dosya"]."</td>";
        echo "<td>"."
         <form action='' method='post'>
            <input type='hidden' name='duzenlenecek' value='".$satir["id"]."'>
            <input type='submit' name='duzenle' value='Düzenle'>
          </form>"
        ."</td>";
        echo "<td>"."
          <input type='checkbox' name='silinecek[]' value='".$satir["id"]."'>
        "."</td>";
        echo "</tr>";
      }
       ?>
        </table>
      <input type='submit' name='sil' value='Seçilenleri Sil'>
    </form>
	</body>
</html>
