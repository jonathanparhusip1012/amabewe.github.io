<?php 
session_start();

include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($koneksi,"select * from dataMahasiswa where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

// cek username dan password
if($cek > 0){

	$data = mysqli_fetch_assoc($login);
	if($data['level']=="admin"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		header("location:dashboard-admin.php");

	// cek jika user login sebagai pegawai
	}else if($data['level']=="dosen"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "dosen";
		// alihkan ke halaman dashboard pegawai
		header("location:dashboard-dosen.php");

	// cek jika user login sebagai pengurus
	}else if($data['level']=="mahasiswa"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "mahasiswa";
		// alihkan ke halaman dashboard pengurus
		header("location:dashboard-mahasiswa.php");

	}else{

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}

?>