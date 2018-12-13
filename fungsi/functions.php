<?php
//koneksi database
$conn = mysqli_connect("localhost", "root", "", "amabewe") or die ("Gagal, database tidak ditemukan");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows=[];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;

    $npm = htmlspecialchars($data["npm"]);
    $nama= htmlspecialchars($data["nama"]);
    $email=htmlspecialchars($data["email"]);
    $jurusan=htmlspecialchars($data["jurusan"]);
    // $gambar =htmlspecialchars($data["gambar"]);

    // upload gambar
    $gambar = upload();
    if (!$gambar){
        return false;
    }

    // query insert data
    $query = "INSERT INTO dataMahasiswa
                VALUES
                ('', '$nama', '$npm', '$email', '$jurusan', '$gambar', '$password', '$level', '$username')
                ";
    mysqli_query($conn, $query); 

    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //  cek apakah tidak ada gambar yang diupload
    if($error === 4){
        echo"<script>
            alert('Pilih gambar terlebih dahulu!');
            </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script>
            alert('yang diupload bukan gambar!');
            </script>
            ";
            return false;
    }

    // cek jika ukuran gambar terlalu besar 
    if($ukuranFile> 1000000){
        echo "<script>
            alert('ukuran gambar terlalu besar!');
            </script>
            ";
            return false;
    }
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    // lolos pengecekan, gambar siap diupload
     move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
     return $namaFile;
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM dataMahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);  
}

function ubah($data){
    global $conn;

    $id = $data["id"];
    $npm = htmlspecialchars($data["npm"]);
    $nama= htmlspecialchars($data["nama"]);
    $email=htmlspecialchars($data["email"]);
    $jurusan=htmlspecialchars($data["jurusan"]);
    $gambarLama=htmlspecialchars($data["gambarLama"]);
    $password = ($data["password"]);
    $level = ($data["level"]);
    $username = ($data["username"]);

    // cek apakah dataMahasiswa pilih gambar baru atau tidak 
    if($_FILES['gambar']['error']===4){
        $gambar=$gambarLama;
    }else{
        $gambar = upload();
    }
    

    // query insert data
    $query = "UPDATE dataMahasiswa SET
                npm  = '$npm',
                nama = '$nama',
                email= '$email',
                jurusan='$jurusan',
                gambar='$gambar'
                WHERE id = $id   
            ";
    mysqli_query($conn, $query); 

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM mahasiswa
                WHERE
                nama LIKE '%$keyword%' OR
                npm LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'
                ";
    return query($query);
}

?>
