<!DOCTYPE html>
<html>
<head>
    <title>Input Berita Terbaru</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $judul=input($_POST["Judul"]);
        $deskripsi=input($_POST["Deskripsi"]);
        $kategori=input($_POST["Kategori"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into berita (Judul,Deskripsi,Kategori) values
		('$judul','$deskripsi','$kategori')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h1 class="mb-3">Input Berita</h1>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group mb-2">
            <label>Judul:</label>
            <input type="text" name="Judul" class="form-control" placeholder="Masukan Judul Berita" required />

        </div>
        <div class="form-group mb-2">
            <label>Deskripsi:</label>
            <input type="text" name="Deskripsi" class="form-control"  placeholder="Masukan Deskripsi Berita" required/>
        </div>
       <div class="form-group mb-2">
            <label>Kategori :</label>
            <input type="text" name="Kategori" class="form-control" placeholder="Masukan Kategori Berita" required/>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

    <footer class="bg-primary text-white text-center pb-3 fixed-bottom">
      <p>Created by <i class="bi bi-cc-circle-fill"></i> <a href="https://instagram.com/_whoiszienararya" class="text-white fw-bold">Kenzie Nararya</a></p>
    </footer>

</body>
</html>