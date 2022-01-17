<?php 
session_start(); 
include "../koneksi.php";

if (isset($_POST['uname']) && isset($_POST['upass'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['upass']);

	if (empty($uname)) {
		header("Location: index.php?error=Username harus Diisi");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password harus Diisi");
	    exit();
	}else{
		$sql = "SELECT * FROM admin WHERE username='$uname' AND pass='$pass'";

		$result = mysqli_query($koneksi, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['pass'] === $pass) {
                $_SESSION['login'] = true;
            	header("Location: home.php");
		        exit();
            }else{
				header("Location: index.php?error=Username atau Password salah");
		        exit();
			}
		}else{
			header("Location: index.php?error=Username atau Password salah");
	        exit();
		}
	}
	
}else{
	header("Location: home.php");
	exit();
}