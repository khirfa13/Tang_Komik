<?php 
include '../koneksi.php';
// menyimpan data id kedalam variabel
$kd_komik   = $_GET['kd_komik'];
// query SQL untuk insert data
$sql = "DELETE a.*, b.* 
FROM chapter a 
LEFT JOIN komik b 
ON b.kd_komik = a.kd_komik 
WHERE a.kd_komik = '$kd_komik'";

mysqli_query($koneksi, $sql);
// mengalihkan ke halaman index.php
header("location:home.php");
?>

