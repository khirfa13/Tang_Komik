<?php 
if(isset($_POST['proses'])){
    $temp = explode(".", $_FILES["gambar"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $target_dir = '../cdn/';
    move_uploaded_file($_FILES['gambar']['tmp_name'],$target_dir.$newfilename);

    $kd_komik = $_POST['kd_komik'];

    mysqli_query($koneksi, "INSERT INTO komik set
    kd_komik = '$_POST[kd_komik]', 
    judul = '$_POST[judul]',
    author = '$_POST[author]',
    genre = '$_POST[genre]',
    tipe = '$_POST[tipe]',
    status = '$_POST[status]',
    sinopsis = '$_POST[sinopsis]',
    gambar = '$newfilename',
    kd_kategori = '$_POST[kd_kategori]'") or die(mysqli_error($koneksi));

    echo "<script>alert('Data telah tersimpan')
    document.location.href = 'home.php'
    </script>";

    $folder_baru = $_POST['judul'];
    if(is_dir('../komik/'.$folder_baru) === false){
        mkdir('../komik/'.$folder_baru);
    }
    $fp=fopen('../komik/'.$folder_baru.'/index.php','w');
    fwrite($fp, "<?php include '../../komik.php'; ?>");
    fclose($fp);
}
?>


