<?php
session_start();

$sunucu="localhost";
$kullanici_adi="root";
$sifre="";
$veri_tabani="final";

$baglanti= new mysqli($sunucu,$kullanici_adi,$sifre,$veri_tabani,3306);

if ($baglanti->connect_error)
  die("Bağlantı sağlanamadı : ".$baglanti->connect_error);
 ?>
<?php
    if($_SESSION["eposta"]=="" && $_SESSION["sifre"]=="")
    {
      header("Location: 201510409039_1.php");
    }
 ?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>201510409039 - Ceren CÖMERT</title>
  </head>
  <body>
    <form class="" action="" method="post">
      <input type="submit"  class="btn btn-dark"  name="cc_sil_session" value="Çıkış Yap">
    </form>
<?php
if(isset($_POST['cc_sil_session']))
{
$_SESSION['eposta']="";
$_SESSION['sifre']="";
header("Location: 201510409039_1.php");
}
 ?>
<?php
if (isset($_POST["cc_kaydet"])) {

    $sql="INSERT INTO `urun` (`id`, `urun_adi`, `adet`, `fiyat`)
    VALUES (NULL, '".$_POST["cc_urunadi"]."', '".$_POST["cc_adet"]."', '".$_POST["cc_fiyat"]."');";
    $baglanti->query($sql);
}
else if (isset($_POST["cc_guncelle"])) {
  $sql="UPDATE `urun` SET `urun_adi` = '".$_POST["cc_urunadi"]."', `adet` = '".$_POST["cc_adet"]."', `fiyat` = '".$_POST["cc_fiyat"]."'
  WHERE `urun`.`id` = ".$_POST['cc_id'].";";
  $baglanti->query($sql);
}
else if (isset($_POST["cc_sil"])) {
  $sorgu="DELETE FROM `urun` WHERE `urun`.`id` = ".$_POST['cc_id'];
  $baglanti->query($sorgu);
}
else if (isset($_POST["cc_duzenle"])) {
  $sorgu="SELECT* FROM `urun` WHERE `urun`.`id` = ".$_POST['cc_id'];
  $sonuc=$baglanti->query($sorgu);
  $urun=$sonuc->fetch_assoc();
}
?>
<br><br><br>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
<?php
if (!isset($_POST["cc_duzenle"]))
{
  ?>
  <form action="" method="post">
             <div class="card text-center">
             <div class="card-body">
               <svg class="bi bi-cart-fill" width="5em" height="5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                 <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
               </svg>
               <br><br>
                    <div class="form-group row">
                    <label for="ad" class="sr-only">Ürün Adı</label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control"  name="cc_urunadi" placeholder="Ürün Adı" >
                    </div>
                    </div>
                    <br>
                    <div class="form-group row">
                      <label for="ad" class="sr-only">Adet</label>
                      <div class="col-sm-12">
                      <input type="text" class="form-control" name="cc_adet" placeholder="Ürün Adeti" >
                      </div>
                    </div>
                    <br>
                    <div class="form-group row">
                      <label for="ad" class="sr-only">Fiyat</label>
                      <div class="col-sm-12">
                      <input type="text" class="form-control"  name="cc_fiyat" placeholder="Ürün Fiyatı">
                      </div>
                    </div>
                    <br>
                    <div class="form-group-row">
                      <button type="submit" class="btn btn-dark" name="cc_kaydet" value="kaydet">Kaydet</button>
                    </div>
             </div>
      </div>
  </form>
  <?php
}
else {
  ?>
  <form action="" method="post">
             <div class="card text-center">
             <div class="card-body">
               <svg class="bi bi-cone-striped" width="5em" height="5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                 <path fill-rule="evenodd" d="M7.879 11.015a.5.5 0 0 1 .242 0l6 1.5a.5.5 0 0 1 .037.96l-6 2a.499.499 0 0 1-.316 0l-6-2a.5.5 0 0 1 .037-.96l6-1.5z"/>
                 <path d="M11.885 12.538l-.72-2.877C10.303 9.873 9.201 10 8 10s-2.303-.127-3.165-.339l-.72 2.877c-.073.292-.002.6.256.756C4.86 13.589 5.916 14 8 14s3.14-.411 3.63-.706c.257-.155.328-.464.255-.756zM9.97 4.88l.953 3.811C10.159 8.878 9.14 9 8 9c-1.14 0-2.159-.122-2.923-.309L6.03 4.88C6.635 4.957 7.3 5 8 5s1.365-.043 1.97-.12zm-.245-.978L8.97.88C8.718-.13 7.282-.13 7.03.88L6.275 3.9C6.8 3.965 7.382 4 8 4c.618 0 1.2-.036 1.725-.098z"/>
               </svg>
               <br><br>
                    <div class="form-group row">
                    <label for="ad" class="sr-only">Ürün Adı</label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control"name="cc_urunadi" value="<?=$urun["urun_adi"]?>">
                    </div>
                    </div>
                    <br>
                    <div class="form-group row">
                      <label for="ad" class="sr-only">Adet</label>
                      <div class="col-sm-12">
                      <input type="text" class="form-control" name="cc_adet" value="<?=$urun["adet"]?>">
                      </div>
                    </div>
                    <br>
                    <div class="form-group row">
                      <label for="ad" class="sr-only">Fiyat</label>
                      <div class="col-sm-12">
                      <input type="text" class="form-control" name="cc_fiyat" value="<?=$urun["fiyat"]?>">
                      </div>
                    </div>
                    <br>
                    <div class="form-group-row">
                      <input type="hidden" name="cc_id" value="<?=$urun["id"]?>">
                      <button type="submit" class="btn btn-dark" name="cc_guncelle" value="cc_guncelle">Güncelle</button>
                    </div>


             </div>
      </div>
  </form>
  <?php
}
   ?>
       </div>
      </div>
      <br>
       <div class="row">
         <div class="col-md-12">
           <table class="table table-borderless table-hover table-striped table-dark">
            <thead>
              <tr>
                 <th scope="col"></th>
                 <th scope="col">Ürün Adı</th>
                 <th scope="col">Ürün Adedi</th>
                 <th scope="col">Ürün Fiyatı</th>
                 <th scope="col">Düzenle</th>
                <th scope="col">Kaydı Sil</th>
              </tr>
            </thead>
              <tbody>
<?php
$sorgu="SELECT * FROM `urun`";
$sonuc=$baglanti->query($sorgu);
$i=0;
while($urun=$sonuc->fetch_assoc())
{
  $i++;

 ?>

                <tr>
                  <th scope="row"><?=$i?></th>
                  <td><?=$urun["urun_adi"]?></td>
                  <td><?=$urun["adet"]?></td>
                  <td><?=$urun["fiyat"]?></td>
                  <td>
                     <form action="" method="post">
                       <input type="hidden" name="cc_id" value="<?=$urun["id"]?>">
                       <button type="submit" class="btn btn-secondary" name="cc_duzenle" value="cc_duzenle">
                         <svg class="bi bi-pencil-square" width="3em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                      </button>
                     </form>
                  </td>
                  <td>
                     <form action="" method="post">
                    <input type="hidden" name="cc_id" value="<?=$urun["id"]?>">
                    <button type="submit" class="btn btn-secondary" name="cc_sil" value="cc_sil">
                      <svg class="bi bi-trash-fill" width="3em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                    </svg>
                  </button>
                    </form>
                  </td>
                </tr>
                <?php
              }
                 ?>
                </tbody>
            </table>
         </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
