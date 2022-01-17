<?php
session_start();
include_once "../koneksi.php";
if (!isset($_SESSION['login'])){
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<head>
<!--tittle -->
<title>Tang Komik</title>
<!--end of tittle-->
</head>
<link rel="stylesheet" type="text/css" href="../style/home.css">
<link rel="stylesheet" type="text/css" href="../style/media.css">
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
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
		<li><a class="bahasa-id" href="logout.php">Logout</a></li>
		</ul>
	</div>
</div>
</div>
<div class="container-2">
<div class="nav">
	<ul>
		<li><a class="home" href="home.php">Home</a></li>
		<li><a class="manga" href="input_chapter.php">Input Chapter</a></li>
		<li><a class="manhwa" href="input_komik.php">Input Komik</a></li>
	</ul>
</div>
</div>
    <div class="tabel-komik">
        <div class="tabel-int">
            <table class="tabel" cellpadding="10" cellspacing="0">
                <h1>Tabel Komik</h1>
            <tbody class="tabel-body">
                <tr class="tr-judul">
                    <th>kd_komik</th>
                    <th>author</th>
                    <th>genre</th>
                    <th>tipe</th>
                    <th>status</th>
                    <th>gambar</th>
                    <th>kd_kategori</th>
                    <th>Opsi</th>
                </tr>
                <?php 
                $result = mysqli_query($koneksi, "SELECT * FROM komik");

                while($row = mysqli_fetch_array($result))
                {
                ?>
                <td><?=$row['kd_komik']; ?></td>
                <td><?=$row['author']; ?></td>
                <td><?=$row['genre']; ?></td>
                <td><?=$row['tipe']; ?></td>
                <td><?=$row['status']; ?></td>
                <td><img src="../cdn/<?=$row['gambar']; ?>" style="width: 84px; height: 84px;"></td>
                <td><?=$row['kd_kategori']; ?></td>
                <td>
                    <a href="hapus.php?kd_komik=<?=$row['kd_komik'];?>" class="btn-del">Delete</a> |
                    <a href="update_komik.php?kd_komik=<?=$row['kd_komik'];?>" class="btn-edt">Edit</a>
                </td>
                </tr>
            </tbody>
            <?php } ?>
        </table>
    </div>
        <div class="tabel-ext">
            <table class="tabel" cellpadding="10" cellspacing="0">
                <tr>
                    <th>Judul</th>
                    <th>Sinopsis</th>
                    <th>Opsi</th>
                </tr>
                <?php 
                $result = mysqli_query($koneksi, "SELECT * FROM komik");

                while($row = mysqli_fetch_array($result))
                {
                ?>
                <tr>
                    <td><?=$row['judul']; ?></td>
                    <td style="width: 70%; text-align:justify;"><?=$row['sinopsis']; ?></td>
                    <td>
                    <a href="hapus.php?kd_komik=<?=$row['kd_komik'];?>" class="btn-del">Delete</a> |
                    <a href="update_komik.php?kd_komik=<?=$row['kd_komik'];?>" class="btn-edt">Edit</a>
                    </td>
                </tr>
                <?php }?>
                </table>
        </div>
    </div>
    <div class="tabel-chapter">
        <table class="tabel" cellpadding="10" cellspacing="0">
            <h1>Tabel Chapter</h1>
            <tr>
                <th>kd_chapter</th>
                <th>chapter</th>
                <th>gambar</th>
                <th>kd_komik</th>
                <th>Opsi</th>
            </tr>
            <?php 
            $result = mysqli_query($koneksi, "SELECT * FROM chapter");

            while($row = mysqli_fetch_array($result))
            {
            ?>
            <tr>
                <td><?=$row['kd_chapter']; ?></td>
                <td><?=$row['chapter']; ?></td>
                <td><img src ="../cdn/<?=$row['gambar']; ?>" style="width: 84px; height: 84px;"></td>
                <td><?=$row['kd_komik']; ?></td>
                <td>
                    <a href="hapus_chapter.php?chapter=<?=$row['chapter'];?>&kd_komik=<?=$row['kd_komik'];?>" class="btn-del">Delete</a> |
                    <a href="update_chapter.php?chapter=<?=$row['chapter'];?>" class="btn-edt">Edit</a>   
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>