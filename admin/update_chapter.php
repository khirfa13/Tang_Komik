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
<h1 id="title">Tambah Chapter</h1>
<div id="form-outer">
    <?php
	// memanggil koneksi
	include_once("../koneksi.php");

	// Fetch semua data dari database
	$result = mysqli_query($koneksi, "SELECT * FROM chapter WHERE chapter = '$_GET[chapter]'");

	$row = mysqli_fetch_array($result);
	?>
  <form id="survey-form" method="post" action="" enctype="multipart/form-data">
  <div class="rowTab">
        <div class="labels">
          <label for="department">Judul Komik </label>
        </div>
        <div class="rightTab">
          <select id="dropdown" name="kd_komik" class="dropdown">
          <option value>Pilih Komik</option>
                <?php 
                include "../koneksi.php";
                $query = mysqli_query($koneksi,"SELECT * FROM komik") or die (mysqli_error($mysqli));
                while($data = mysqli_fetch_array($query)){
                    echo "<option value='".$data['kd_komik']."|".$data['judul']."'> $data[judul] </option>";
                }
                ?>
          </select>
        </div>
    </div>
    <div class="rowTab">
      <div class="labels">
        <label id="email-label" for="email">Chapter </label>
      </div>
      <div class="rightTab">
        <input type="text" name="chapter" id="email" class="input-field" required placeholder="Ketik Chapter" value="<?=$row['chapter']; ?>">
      </div>
    </div>
    <div class="rowTab">
        <div class="labels">
          <label id="email-label" for="gambar">Gambar </label>
        </div>
        <div class="rightTab">
          <input type="file" name="gambar[]" id="gambar" class="input-field" multiple required>
        </div>
      </div>
    <button id="submit" type="submit" name="proses">Submit</button>
    <button id="reset" type="reset">Reset</button>
  </form>
</div>
</body>
</html>
<?php
include 'proses_update_chapter.php';
?>