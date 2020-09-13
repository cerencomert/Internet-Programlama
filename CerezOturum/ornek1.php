<!Doctype html>
<html>
	<head>

	</head>
	<body>
		<?php
			if (!empty($_POST["unut"]))
			{
				setcookie("kullanici_adi","",time());
			}
			if (!empty($_POST["kaydet"]))
			{
				$cerez_adi = "kullanici_adi";
				$cerez_deger = $_POST["ad"];
				setcookie($cerez_adi, $cerez_deger, time() + 86400);
			}

			if (empty($_COOKIE["kullanici_adi"]))
			{
		?>
		<form action="" method="post">
			Sizi unutmamam için adınızı kaydedin...
			<hr>
			Ad<input type="text" name="ad">
			<input type="submit" name="kaydet" value="Kaydet">
		</form>
		<?php
			}
			else
			{
				echo "OOOO Hoşgeldin ".$_COOKIE["kullanici_adi"];
				?>
				<form action="" method="post">
			<input type="submit" name="unut" value="Beni Unut">
				</form>
				<?php
			}
		?>


	</body>
</html>
