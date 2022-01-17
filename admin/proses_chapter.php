<?php
    include_once '../koneksi.php';
    if(isset($_POST['proses'])){
        $filecount = count($_FILES['gambar']['name']);
        for($i=0;$i<$filecount;$i++){
            $filename = $_FILES['gambar']['name'][$i];
            $sql = "INSERT INTO chapter set
            kd_komik = '$_POST[kd_komik]',
            chapter = '$_POST[chapter]', 
            gambar = '$filename'";

            if($koneksi->query($sql) === TRUE){
                header ("Location:home.php");
            } else {
                echo "Chapter gagal ditambhkan";
            }
            move_uploaded_file($_FILES['gambar']['tmp_name'][$i], '../cdn/'.$filename);
        }

        $folder_baru = $_POST['chapter'];

        $tmp = explode("|", $_POST['kd_komik']);
        $kd_komik = $tmp[0];
        $judul = $tmp[1];

        if(is_dir('../komik/'.$judul.'/Chapter '. $folder_baru) === false){
            mkdir('../komik/'.$judul.'/Chapter '. $folder_baru);
        }
        $fp=fopen('../komik/'.$judul.'/Chapter '. $folder_baru.'/index.php','w');
        fwrite($fp, "<?php include '../../../chapter.php'; ?>");
        fclose($fp);
        }
?>
