<?php 
include '../koneksi.php';
// menyimpan data id kedalam variabel
$kd_komik   = $_GET['kd_komik'];
$chapter   = $_GET['chapter'];
// query SQL untuk insert data
$sql = "DELETE FROM chapter WHERE kd_komik ='$kd_komik' AND chapter = '$chapter'";

mysqli_query($koneksi, $sql);
// mengalihkan ke halaman index.php
header("location:home.php");
?>
