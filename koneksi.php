<?php
// Menentukan nama host, biasanya "localhost"
$server = "localhost";
// Nama pengguna MySQL (default: root)
$user = "root";
// Kata sandi untuk penggunna MySql (default password
// kosong untuk root)
$password = "";
// nama database yang akan digunakan
$database = "human_resources";

// mencoba untuk membuat koneksi ke database
$db = mysqli_connect($server, $user, $password, $databbase);
// Memeriksa apakah koneksi berhasil
if (!$db){
  die("Gagal terhubung dengan database: " . mysqli_connect_error());
}