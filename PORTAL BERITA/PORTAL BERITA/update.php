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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_peserta
    if (isset($_GET['Nomor'])) {
        $nomor=input($_GET["Nomor"]);

        $sql="select * from berita where Nomor=$nomor";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nomor=htmlspecialchars($_POST["Nomor"]);
        $judul=input($_POST["Judul"]);
        $deskripsi=input($_POST["Deskripsi"]);
        $kategori=input($_POST["Kategori"]);

        //Query update data pada tabel anggota
        $sql="update berita set
			Judul='$judul',
			Deskripsi='$deskripsi',
			Kategori='$kategori'
			where Nomor=$nomor";

        //Mengeksekusi atau menjalankan query diatas
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
    <h1 class="mb-3">Update Berita</h1>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group mb-2">
            <label>Judul:</label>
            <input type="text" name="Judul" class="form-control" placeholder="Masukan Judul Berita" required />

        </div>
        <div class="form-group mb-2">
            <label>Deskripsi:</label>
            <input type="text" name="Deskripsi" class="form-control" placeholder="Masukan Deskripsi Berita" required/>
        </div>
        <div class="form-group ">
            <label>Kategori :</label>
            <input type="text" name="Kategori" class="form-control" placeholder="Masukan Kategori berita" required/>

        <input type="hidden" name="Nomor" value="<?php echo $data['Nomor']; ?>" />
        <button type="submit" name="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>
</body>
</html>