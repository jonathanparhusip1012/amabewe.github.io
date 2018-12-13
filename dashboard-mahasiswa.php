<!DOCTYPE html>
<html>
<head>
	<title>Dashboard Mahasiswa</title>
    <link rel="icon" type="image/png" href="gambar/images.png">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<style>
    body{
        margin:0;
        padding:0;
        font-family: sans-serif;
        background: url(gambar/mahasiswa.jpg) no-repeat;
        background-size: cover;
    }
    </style>

</head>
<body>
	<?php 
	session_start();
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}

	?>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
		<a class="navbar-brand" href="#"><img class="img-fluid" src="gambar/logo.png" alt="Chania" width="100" height="50"> </a>
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
		</div>
	</nav>

	<p>Halo <b><?php echo $_SESSION['username']; ?></b> Selamat datang <b><?php echo $_SESSION['level']; ?></b>.</p>
	<a href="logout.php">LOGOUT</a>

	<br/>
	<br/>
</body>
</html>