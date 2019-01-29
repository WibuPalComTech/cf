<?php
// memulai session
session_start();

// memasukkan file config-database.php pada login.php untuk koneksi ke database
include "../config-database.php";

// mengambil data username dan password dari index.php
$username = $_POST['username'];
$password = $_POST['password'];

// untuk keamanan dan mencegah dari serangan sql injection
$username = strtolower($username);
$username = $mysqli->escape_string($username);
$password = $mysqli->escape_string($password);
$password = md5($password);

// mengecek username dan password ke database
$result=$mysqli->query("SELECT username, status, password FROM pengguna WHERE username='".$username."'");
$row = $result->fetch_object();

if($result->num_rows==1 && $row->password==$password && $row->status=="aktif"){ //jika berhasil akan bernilai 1
	// membuat data session untuk user yg berhasil login
	// Membuat Session
	$_SESSION['UserID']		= $row->username;
	$_SESSION['Level'] 		= $row->status;
	$_SESSION['login']	 	= true;
	
	// pengguna diarahkan ke home.php
	echo "<script>location.href='home.php'</script>";
} else {
	echo "<script>location.href='index.php?login=fail'</script>";
}
?>