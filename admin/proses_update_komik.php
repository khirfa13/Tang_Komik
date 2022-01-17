<?php
include '../koneksi.php';

if(isset($_POST['proses'])){
    $temp = explode(".", $_FILES["gambar"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $target_dir = '../cdn/';
    move_uploaded_file($_FILES['gambar']['tmp_name'],$target_dir.$newfilename);

    $judul = $_POST['judul'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $tipe = $_POST['tipe'];
    $status = $_POST['status'];
    $sinopsis = $_POST['sinopsis'];
    $gambar = $newfilename;

    mysqli_query($koneksi,"UPDATE komik set 
    judul = '$judul',
    author = '$author', 
    genre = '$genre', 
    tipe = '$tipe', 
    status = '$status',  
    sinopsis = '$sinopsis',
    gambar =  '$gambar'
    WHERE kd_komik='$_GET[kd_komik]'") or die(mysqli_error($koneksi));

    echo "<script>alert('Data telah berhasil diubah')
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