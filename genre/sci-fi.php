<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&display=swap" rel="stylesheet">   
	<!--Memanggil css eksternal-->
	<link rel="stylesheet" type="text/css" href="../style/main.css">
	<link rel="stylesheet" type="text/css" href="../style/media.css">
	<title>Tang Komik</title>
</head>
<body>
<div class="container-1">
<div class="header">
	<div class="judul-img">
		<img src="../judul/logo.png">
	</div>
	<div class="search-engine">
		
	</div>
	<div class="bahasa">
		<ul>
		<li><a class="bahasa-id" href="../admin/home.php">Login</a></li>
		</ul>
	</div>
</div>
</div>

<div class="container-2">
<div class="nav">
	<ul>
		<li><a class="home" href="../">Home</a></li>
		<li><a class="manga" href="../manga/">Manga</a></li>
		<li><a class="manhwa" href="../manhwa/">Manhwa</a></li>
		<li><a class="manhua" href="../manhua/">Manhua</a></li>
	</ul>
</div>
</div>	

<div class="row">
	<div class="left-col">
		<div class="head">
			<h4>Genre "Sci-Fi"</h4>
		</div>
		<div class="cards">
		<?php
			// memanggil koneksi
			include_once("../koneksi.php");
 
			// Fetch semua data dari database
			$result = mysqli_query($koneksi, "SELECT * FROM komik WHERE genre LIKE '%sci-fi%' OR genre LIKE '%scifi%'");

			while($row = mysqli_fetch_array($result))
			{	
			?>			
			<div class="card">
				<a href="../komik/<?= $row['judul'] ?>/index.php?kd_komik=<?= $row['kd_komik'];?>" >
				<picture class="header-img">
				<img src="../cdn/<?php echo $row['gambar']; ?>">
				</picture>
				<div class="content">
					<p><?php echo $row['judul']?></p>
				</div>
				</a>
			</div>
			<?php } ?>
        </div>
	</div>
	<div class="right-col">
		<div class="head">
			<h4>Genre</h4>
		</div>
		<div class="cards-2">
		<?php include 'genres.php' ?>
		</div>	
	</div>
</div>

<div class="footer">
		
</div>

</body>
</html>