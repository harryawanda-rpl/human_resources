<?php
session_start();
include("../koneksi.php");
// periksa apakah ada ID yang dikirim melalui parameter URL
if(isset($_GET['karyawanID'])){
  $id = $_GET['karyawanID'];
  // buat query untuk menghapus data berdasarkan ID
  $sql = "DELETE FROM karyawan WHERE karyawan_id=$id";
  $query = mysqli_query($db, $sql);
  // simpan pesan notifikasi dalam sesi berdasarkan hasil query
  if($query){
    $_SESSION['notifikasi'] = "Data karyawan berhasil dihapus!";
  } else {
    $_SESSION['notifikasi'] = "Data karyawan gagal dihapus!";
  }
  // Alihkan ke halaman index.php
  header('Location: index.php');
} else {
  die ("Akses ditolak...");
}