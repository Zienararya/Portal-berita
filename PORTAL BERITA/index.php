<!DOCTYPE html>
<html>
<head>
<title>Portal Berita Surabaya</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="#">Portal Berita Surabaya</a>
            </div>
        </nav>
    </header>
    <div>
        <br><h1><center>BERITA HARI INI</center></h1></br>
<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['Nomor'])) {
        $nomor=htmlspecialchars($_GET["Nomor"]);

        $sql="delete from berita where Nomor='$nomor' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


     <table class="custom-table">
        <thead>
        <tr>           
            <th>No</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Kategori</th>
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
                <td>
                    <a href="update.php?Nomor=<?php echo htmlspecialchars($data['Nomor']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?Nomor=<?php echo $data['Nomor']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php"><button class="btn">Tambah Berita</button></a>
</div>
</body>
</html>
