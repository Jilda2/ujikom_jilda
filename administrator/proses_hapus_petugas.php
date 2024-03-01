<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data id yang di kirim dari url
$iduser = $_POST['iduser'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from user where iduser='$iduser'");
 
// mengalihkan halaman kembali ke index.php
header("location:data_pengguna.php?pesan=hapus");
 
?>