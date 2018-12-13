<?php
require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
    $mhs = query("SELECT * FROM dataMahasiswa WHERE id=$id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])){

    // cek apakah data berhasil ditambahkan atau tidak
    if(ubah($_POST)>0){
        echo "   
            <script>
                alert('Data berhasil diubah!')
                document.location.href = '../dashboard-admin.php';
            </script>
        "; 
    }else{
        echo "   
        <script>
            alert('Data gagal diubah!')
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
    <title>Update data mahasiswa</title>
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
                <h1 class="text-center">Update data mahasiswa</h1>
            </div>
        </div><br>

        <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$mhs["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?=$mhs["gambar"]; ?>">

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
            <div class="col-sm-1"><img src="img/<?=$mhs['gambar']; ?>" width="40"></div>
            <div class="w-100"></div>
            <br>
            <div class="col-sm-1"> </div>
            <div class="col-sm-1"><button class="btn btn-primary" type="submit" name="submit">Update data</button></div>
        </div>
        </form>
    </div>
</body>
</html>