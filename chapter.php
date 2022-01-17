<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  
	<!--Memanggil css eksternal-->
	<link rel="stylesheet" type="text/css" href="../../../style/chapter.css">
	<link rel="stylesheet" type="text/css" href="../../../style/media.css">
	<title>Tang Komik</title>
</head>
<body>
<div class="container-1">
<div class="header">
	<div class="judul-img">
		<img src="../../../judul/logo.png">
	</div>
	<div class="search-engine">
		
	</div>
	<div class="bahasa">
		<ul>
		<li><a class="bahasa-id" href="../../../admin/login.php">Login</a></li>
		</ul>
	</div>
</div>
</div>

<div class="container-2">
<div class="nav">
	<ul>
		<li><a class="home" href="../../../">Home</a></li>
		<li><a class="manga" href="../../../manga/">Manga</a></li>
		<li><a class="manhwa" href="../../../manhwa/">Manhwa</a></li>
		<li><a class="manhua" href="../../../manhua/">Manhua</a></li>
	</ul>	
</div> <!-- akhir div nav -->
</div> <!-- akhir div container-2 -->
<div class="chapter">
	
	<div class="tombol-next">
		<div class="next">
		
		</div>
	</div> 
	<?php
	// memanggil koneksi
	include_once("koneksi.php");
	$chapter = $_GET['chapter'];
    $judul = $_GET['judul'];

	// Fetch semua data dari database
	$result = mysqli_query($koneksi, "SELECT * FROM komik join chapter on chapter.kd_komik = komik.kd_komik 
	WHERE chapter.chapter = '$chapter' AND komik.judul = '$judul'");

	while($row = mysqli_fetch_array($result))
	{
	?>
	<div class="gambar">
		<img src="../../../cdn/<?php echo $row['gambar']; ?>">
	</div>
	<?php } ?>
	<div class="tombol-next">
		<div class="next">
			
		</div>
	</div> 
</div> <!-- akhir div chapter -->
<div class="footer">

</div>
</body>
</html>