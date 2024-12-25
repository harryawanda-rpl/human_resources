<?php
// menghubungkan file koneksi dengan index.php
include("../koneksi.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Human Resource</title>
  <style>
    /* membuat styling pada table */
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      padding: 10px;
    }
  </style>
</head>
<body>
  <h2>Data Karyawan</h2>
  <!-- Tampilkan notifikasi dalam session (jika ada) -->
  <?php if (isset($_SESSION['notifikasi'])): ?>
    <p><?php echo $_SESSION['notifikasi'] ?></p>
    <!-- Hapus  notifikasi setelah ditampilkan -->
    <?php unset($_SESSION['notifikasi']); ?>
  <?php endif; ?>

  <table>
    <thead>
      <tr align="center">
        <th>#</th>
        <th>Nama Karyawan</th>
        <th>Nama Departemen</th>
        <th>Posisi</th>
        <th>Gaji</th>
        <th><a href="form-tambah.php">Tambah Data</a></th>
      </tr>
    </thead>
    <tbody>
      <?php
        $no = 1; // membuat penomoran dari nomor 1
        // membuat variiable untuk menjalankan query SQL
        $query = $db->query("SELECT * FROM karyawan");
        // perulangan while akan terus berjalan(menampilkan data)
        // selamaa kondisi $query bernilai true (adanya data
        // pada table karyawan)
        while($karyawan = $query->fetch_assoc()){
          // fungsi fetch_assoc digunakan untuk mengambil data
          // perulangan dalam bentuk array
        ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $karyawan['nama_karyawan']; ?></td>
          <td><?php echo $karyawan['nama_departemen']; ?></td>
          <td><?php echo $karyawan['posisi']; ?></td>
          <td><?php echo $karyawan['gaji']; ?></td>
          <td align="center">
            <!-- URL ke halaman edit data dengan mengngunakan
            parameter id pada kolom tabel  -->
            <a href="form-edit.php?karyawanID=<?php echo $karyawan['karyawan_id'] ?>">Edit</a>
            <!-- URL ke halaman hapus data dengan mengngunakan
            parameter id pada kolom tabel dan alert konfirmasi hapus dataa  -->
            <a href="form-hapus.php?karyawanID=<?php echo $karyawan['karyawan_id'] ?>"
            onclick="return confirm('Tindakan ini tidak bisa dibatalkan!')">Hapus</a>
          </td>
        </tr>
        <?php
        } // Menggakhiri proses perulangan while yang dimulai pada baris 49
        ?>

    </tbody>
  </table>
  <!-- Menghitung jumlah baris yang ada pada table karyawan -->
  <p>Total: <?php echo mysqli_num_rows($query) ?></p>
</body>
</html>