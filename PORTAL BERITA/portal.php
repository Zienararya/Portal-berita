<!DOCTYPE html>
<html>
<head>
<title>Portal Berita Surabaya</title>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|Viga|News+Cycle">
</head>
<body>
    <nav class="navbar navbar-dark bg-primary shadow sticky-top">
            <span class="navbar-brand mb-0 h1 ms-4 logo">Portal Berita Surabaya</span>
        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>BERITA HARI INI</center></h4>
<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['Nomor'])) {
        $nomor=htmlspecialchars($_GET["Nomor"]);

        $sql="delete from berita where Nomor='$nomor' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:portal.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>

<a href="create.php" class="btn btn-primary" role="button">Tambah Berita</a>
     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered mb-5">
            <tr class="table-primary">         
            <th>No</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Kategori</th>
            <th>Foto Kegiatan</th>
            <th colspan='2'>Aksi</th>
        </tr>
        </thead>

        <?php
        include "koneksi.php";
        $sql="select * from berita order by Nomor desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["Judul"]; ?></td>
                <td><?php echo $data["Deskripsi"];   ?></td>
                <td><?php echo $data["Kategori"];   ?></td>
                <td><?php echo $data["Foto"];       ?></td>
                <td>
                    <a href="update.php?Nomor=<?php echo htmlspecialchars($data['Nomor']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?Nomor=<?php echo $data['Nomor']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus berita ini.?')" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
</div>
<!-- Footer -->
<div class="my-5 flex-wrapper">
  <footer class="text-center text-lg-start text-white bg-primary fixed-bottom">
    <div class="text-center p-3">
      © 2023 Created by:
      <a class="text-white" href="https://mdbootstrap.com/">Kenzie Nararya</a>
    </div>
  </footer>
  <!-- Footer -->

</div>
<!-- End of .container -->
</body>
</html>
