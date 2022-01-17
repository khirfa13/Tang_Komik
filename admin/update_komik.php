<?php
session_start();
include_once "../koneksi.php";
if (!isset($_SESSION['login'])){
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  
	<!--Memanggil css eksternal-->
	<link rel="stylesheet" type="text/css" href="../style/admin.css">
	<title>Tang Komik</title>
</head>
<body>
<h1 id="title">Update Komik</h1>
<div id="form-outer">
  <?php
		// memanggil koneksi
		include_once("../koneksi.php");

		// Fetch semua data dari database
		$result = mysqli_query($koneksi, "SELECT * FROM komik WHERE kd_komik = '$_GET[kd_komik]'");

		$row = mysqli_fetch_array($result);
		?>
  <form id="survey-form" method="post" action="" enctype="multipart/form-data">
    <div class="rowTab">
      <div class="labels">
        <label id="name-label" for="name">Kode Komik </label>
      </div>
      <div class="rightTab">
        <input autofocus disabled type="text" name="kd_komik" id="name" class="input-field" value="<?=$row['kd_komik'];?>" required>
      </div>
    </div>
    <div class="rowTab">
      <div class="labels">
        <label id="fname-label" for="fname">Judul </label>
      </div>
      <div class="rightTab">
        <input autofocus type="text" name="judul" id="fname" class="input-field" placeholder="Ketik Judul Komik" value="<?=$row['judul'];?>" required>
      </div>
    </div>
    
    <div class="rowTab">
      <div class="labels">
        <label id="mname-label" for="mname">Author </label>
      </div>
      <div class="rightTab">
        <input autofocus type="text" name="author" id="mname" class="input-field" placeholder="Ketik Author Komik" value="<?=$row['author'];?>" required>
      </div>
    </div>
    <div class="rowTab">
      <div class="labels">
        <label id="email-label" for="email">Genre </label>
      </div>
      <div class="rightTab">
        <input type="text" name="genre" id="email" class="input-field" required placeholder="Ketik Genre Komik" value="<?=$row['genre'];?>" >
      </div>
    </div>
    <div class="rowTab">
      <div class="labels">
        <label for="department">Tipe </label>
      </div>
      <div class="rightTab">
        <select id="dropdown" name="tipe" class="dropdown">
        <option value>Pilih Tipe</option>
        <option value="Manga">Manga</option>
        <option value="Manhwa">Manhwa</option>
        <option value="Manhua">Manhua</option>
        </select>
      </div>
    </div>
    <div class="rowTab">
        <div class="labels">
          <label for="department">Status </label>
        </div>
        <div class="rightTab">
          <select id="dropdown" name="status" class="dropdown">
          <option value>Pilih Status</option>
          <option value="On Going">On Going</option>
          <option value="Tamat">Tamat</option>
          <option value="Drop">Drop</option>
          <option value="Hiatus">Hiatus</option>
          </select>
        </div>
    </div>
    <div class="rowTab">
      <div class="labels">
        <label for="address">Sinopsis </label>
      </div>
      <div class="rightTab">
        <textarea id="comments" class="input-field" style="height:50px;resize:vertical;" name="sinopsis" placeholder="<?=$row['sinopsis'];?>" ></textarea>
      </div>
    </div>
    <div class="rowTab">
        <div class="labels">
          <label id="email-label" for="gambar">Gambar </label>
        </div>
        <div class="rightTab">
          <input type="file" name="gambar" id="gambar" class="input-field" required>
        </div>
      </div>
    <button id="submit" type="submit" name="proses">Submit</button>
    <button id="reset" type="reset">Reset</button>
  </form>
</div>
</body>
</html>
<?php include 'proses_update_komik.php'; ?>