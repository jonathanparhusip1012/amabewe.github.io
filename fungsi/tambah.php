<?php

require 'functions.php';
// cek apakah tombol submit sudah ditekan atau belum

if(isset($_POST["submit"])){

    // cek apakah data berhasil ditambahkan atau tidak
    if(tambah($_POST)>0){
        echo "   
            <script>
                alert('Data berhasil ditambahkan!')
                document.location.href = '../dashboard-admin.php';
            </script>
        "; 
    }else{
        echo "   
        <script>
            alert('Data gagal ditambahkan!')
            document.location.href = '../dashboard-admin.php';
        </script>
        ";
    }
    
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tambah data mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        body{
            background: lightblue;
        }
    </style>
</head>
<body>
    <div class="container">
    <a class="navbar-brand" href=""><img class="img-fluid" src="/belajar/progress/gambar/logo.png" alt="Chania" width="100" height="50"> </a>
        <div class = "row">
            <div class="col-sm-12">
                <h1 class="text-center">Tambah data mahasiswa</h1>
            </div>
        </div><br>

        <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-1"><label for="npm">NPM </label></div>
            <div class="col-sm-1">:</div>
            <div class="col-sm-1"><input type="text" name="npm" id="npm" required></div>
            <div class="w-100"></div>
            <div class="col-sm-1"><label for="nama">Nama </label></div>
            <div class="col-sm-1">:</div>
            <div class="col-sm-1"><input type="text" name="nama" id="nama"></div>
            <div class="w-100"></div>
            <div class="col-sm-1"><label for="email">Email </label></div>
            <div class="col-sm-1">:</div>
            <div class="col-sm-1"><input type="email" name="email" id="email"></div>
            <div class="w-100"></div>
            <div class="col-sm-1"><label for="jurusan">Jurusan </label></div>
            <div class="col-sm-1">:</div>
            <div class="col-sm-1"><input type="text" name="jurusan" id="jurusan"></div>
            <div class="w-100"></div>
            <div class="col-sm-1"><label for="gambar">Gambar </label></div>
            <div class="col-sm-1">:</div>
            <div class="col-sm-1"><input type="file" name="gambar" id="gambar"></div>
            <div class="w-100"></div>
            <br>
            <div class="col-sm-1"> </div>
            <div class="col-sm-1"><button class="btn btn-primary" type="submit" name="submit">Tambah data</button></div>
        </div>
        </form>
    </div>
</body>
</html>