<?php

$host="localhost";
$user="root";
$password="";
$db="portal_berita";

$kon = mysqli_connect($host,$user,$password,$db);
if (!$kon){
        die("Koneksi Gagal:".mysqli_connect_error());
        
}
?>