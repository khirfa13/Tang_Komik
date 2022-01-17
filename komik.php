<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  
	<!--Memanggil css eksternal-->
	<link rel="stylesheet" type="text/css" href="../../style/komik.css">
	<link rel="stylesheet" type="text/css" href="../../style/media.css">
	<link rel="stylesheet" type="text/css" href="../../style/media_komik.css">
	<title>Tang Komik</title>
</head>
<body>
<div class="container-1">
<div class="header">
	<div class="judul-img">
		<img src="../../judul/logo.png">
	</div>
	<div class="search-engine">
		
	</div>
	<div class="bahasa">
		<ul>
		<li><a class="bahasa-id" href="../../admin/login.php">Login</a></li>
		</ul>
	</div>
</div>
</div>

<div class="container-2">
<div class="nav">
	<ul>
		<li><a class="home" href="../../">Home</a></li>
		<li><a class="manga" href="../../manga/">Manga</a></li>
		<li><a class="manhwa" href="../../manhwa/">Manhwa</a></li>
		<li><a class="manhua" href="../../manhua/">Manhua</a></li>
	</ul>	
</div>
</div>

<div class="row">
	<div class="left-col">
		<div class="cards">
		<?php
		// memanggil koneksi
		include_once("../../koneksi.php");

		$kd_komiks = $_GET['kd_komik'];

		// Fetch semua data dari database
		$result = mysqli_query($koneksi, "SELECT * FROM komik WHERE kd_komik = '$kd_komiks'");

		while($row = mysqli_fetch_array($result))
		{
		?>
			<div class="card-1">
				<picture><img src="../../cdn/<?php echo $row['gambar']; ?>"></picture>
			</div>
			<div class="card-2">
				<h1><?php echo $row['judul']?></h1>
				<p>Author : <?php echo $row['author']?></p>
				<p>Genre : <?php echo $row['genre']?></p>
				<p>Tipe : <?php echo $row['tipe']?></p>
				<p>Status : <?php echo $row['status']?></p>
				<p style="text-align:justify;">Sinopsis : <?php echo $row['sinopsis']?></p>
			</div>
		</div> <!-- akhir div cards -->
		<?php } ?>
	</div> <!-- akhir div left-col -->

	<div class="right-col">
		<h4>Daftar Chapter</h4>
		<?php
		// memanggil koneksi
		include_once("../../koneksi.php");

		$kd_komiks = $_GET['kd_komik'];
		// Fetch semua data dari database
		$result = mysqli_query($koneksi, "SELECT DISTINCT chapter, judul from chapter join komik on 
		chapter.kd_komik = komik.kd_komik WHERE komik.kd_komik = '$kd_komiks' order by chapter DESC ");

		while($row = mysqli_fetch_array($result))
		{
		?>
		<ul>
			<li><a href="../../komik/<?=$row['judul']?>/Chapter <?=$row['chapter']; ?>/index.php?chapter=
			<?=$row['chapter'];?>&judul=<?=$row['judul'];?>">Chapter <?=$row['chapter'];?></a>
		</li>
		</ul>
		<?php } ?>
	</div> <!-- akhir div right-col -->
</div> <!-- akhir div row -->

<div class="footer">
	
</div>
</body>
</html>