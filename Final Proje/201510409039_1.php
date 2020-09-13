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
 if (isset($_POST["cc_giris"])) {
   $username= mysqli_real_escape_string($baglanti,$_POST["cc_eposta"]);
   $password= mysqli_real_escape_string($baglanti,$_POST["cc_sifre"]);

   if($username!="" && $password!="")
   {
     $sql=  "SELECT * FROM  kullanici WHERE eposta='$username' AND sifre='$password'";
     $result=mysqli_query($baglanti,$sql);
     $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

     $count=mysqli_num_rows($result);
     if($count==1)
     {
       $_SESSION["eposta"]=$username;
       $_SESSION["sifre"]=$password;

       header("Location: 201510409039_2.php");
     }
     else {
       ?>
       <div class="alert alert-danger alert-dismissible fade show" role="alert">
   <strong>Hatalı giriş!</strong> Eposta veya şifre hatalı, lütfen tekrar deneyiniz.
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>
   <?php
     }
   }
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
    <br><br><br><br><br>
    <div class="container">
      <div class="row"  align="center">
        <div class="col-md-12">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <svg class="bi bi-house-fill" width="10em" height="10em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
              </svg>
              <form class="form-signin" method="POST">
              <br><br>
              <label for="inputEmail" class="sr-only">Email adresi</label>
              <input type="email" name="cc_eposta"  class="form-control" placeholder="Email adresi" required="" autofocus=""><br>
              <label for="inputPassword" class="sr-only">Şifre</label>
              <input type="password"  name="cc_sifre" class="form-control" placeholder="Şifre" required=""><br>
              <button class="btn btn-lg btn-dark btn-block" type="submit" name="cc_giris">Giriş</button>
              <p class="mt-5 mb-3 text-muted">Ceren Cömert <br> 201510409039</p>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
