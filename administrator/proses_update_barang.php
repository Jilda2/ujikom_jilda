<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$ProdukID = $_POST['ProdukID'];
$NamaProduk= $_POST['NamaProduk'];
$Harga = $_POST['Harga'];
$Stok = $_POST['Stok'];
 
// menginput data ke database
mysqli_query($koneksi,"update produk set NamaProduk='$NamaProduk', Harga='$Harga', Stok='$Stok' Where ProdukID='$ProdukID'");
 
// mengalihkan halaman kembali ke index.php
header("location:data_barang.php?pesan=update");
 
?>