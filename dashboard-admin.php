<?php
require 'fungsi/functions.php';
$mahasiswa = query("SELECT * FROM dataMahasiswa ORDER BY id DESC");

// tombol cari ditekan
if (isset($_POST["cari"])){
    $mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard Admin</title>
    <link rel="icon" type="image/png" href="gambar/images.png">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<style>
    body{
        margin:0;
        padding:0;
        font-family: sans-serif;
        background: url(gambar/admin.jpeg) no-repeat;
        background-size: 100% 125%;
    }
    </style>

</head>
<body>
	<?php 
	session_start();
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
	?>
	<div class="container">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
		<a class="navbar-brand" href=""><img class="img-fluid" src="gambar/logo.png" alt="Chania" width="100" height="50"> </a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="#">About <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Author</a>
			</li>
			</ul>
		</div>
		<p class="text-md-left"><a href="logout.php">Logout</a></p>
	</div>
	</nav>
	<p>Halo <b><?php echo $_SESSION['username']; ?></b> Selamat datang <b><?php echo $_SESSION['level']; ?></b>.</p>
	
	<h1 class="text-white text-center bg-dark">Daftar Mahasiswa</h1>

	<a href="fungsi/tambah.php">Tambah data mahasiswa</a>
	<br><br>

	<form action="" method="post">
		<input type="text" name="keyword" size="40" autofocus placeholder="Masukan keyword pencarian..." autocomplete="off">
		<button type="submit" name="cari">Cari!!</button>
	</form>
	<br>

	<table class="table table-dark">
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Gambar</th>
			<th>NPM</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
		</tr>

		<?php $i=1;?>
		<?php foreach( $mahasiswa as $row ): ?>
		<tr>
			<td><?=$i; ?></td>
			<td>
				<a href="fungsi/ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
				<a href="fungsi/hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah data ingin dihapus?')">hapus</a>
			</td>
			<td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
			<td><?= $row["npm"]; ?></td>
			<td><?= $row["nama"]?></td>
			<td><?= $row["email"]?></td>
			<td><?= $row["jurusan"]?></td>
		</tr>
		<?php $i++; ?>
	<?php endforeach; ?>
	</table>
	</body>
	<br/>
	<br/>
	</div>
</body>
</html>