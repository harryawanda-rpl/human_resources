<?php

session_start(); // Mulai sesi
// menghubungkan file ini dengan file konfigurasi database
include("../koneksi.php");
// mengecek apakaj tombol 'simpan' telah ditekan
if(isset($_POST['simpan'])){
  // Mengambil nilai dari form input dan
  // menyimpannya ke dalam variabel
  $nama_karyawan = $_POST['nama_karyawan'];
  $nama_departemen = $_POST['nama_departemen'];
  $posisi = $_POST['posisi'];
  $gaji = $_POST['gaji'];
  // menyusun query SQL untuk menambahkan data
  //  ke tabel karyawan
  $sql = "INSERT INTO karyawan (nama_karyawan, nama_departemen, posisi, gaji)
  VALUES ('$nama_karyawan','$nama_departemen','$posisi','$gaji')";
  // Menjalankan query dan menyimpan hasilnya dalam variabel $query
  $query = mysqli_query($db, $sql);
  // Simpan pesan di sesi
  if($query){
    $_SESSION['notifikasi'] = "Data karyawan berhasil ditambah!";
  } else {
    $_SESSION['notifikasi'] = "Data karyawan gagal ditambah!";
  }
  // Alihkan ke halaman index.php
  header('Location: index.php'); 
} else {
  // jika akses langsung tanpa form, tampil pesan error
  // jika tidak ada tombol dengan name 'simpan', tampil pesan error
  die("Akses ditolak...");
}