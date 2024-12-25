<?php
// hubungkan koneksi database dengan form edit.php
include("../koneksi.php");
// mengambil id karyawan dari parameter URL
$id = $_GET['karyawanID'];
// mengambil data karyawan dari database berdasarkan
// ID parameter
$query = $db->query("SELECT * FROM karyawan WHERE karyawan_id = '$id'");
$karyawan = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Karyawan | HR</title>
</head>
<body>
  <h3>Edit Data Karyawan</h3>
  <form action="proses-edit.php" method="POST">
    <!-- Menyiapkan ID untuk proses selanjutnya -->
    <input type="hidden" name="karyawan_id" value="<?php echo $karyawan['karyawan_id']; ?>">
    <table>
      <tr>
        <td>Nama Karyawan</td>
        <td><input type="text" name="nama_karyawan" value="<?php echo $karyawan['nama_karyawan']; ?>" required></td>
      </tr>
      <tr>
        <td>Nama Departemen</td>
        <td>
          <select name="nama_departemen" required>
            <option value="" selected>-- Pilih Salah Satu --</option>
            <option value="Engineer" <?php echo ($karyawan['nama_departemen'] == 'Engineer') ? 'selected' : ''; ?>>Engineer</option>
            <option value="Designer" <?php echo ($karyawan['nama_departemen'] == 'Designer') ? 'selected' : ''; ?>>Designer</option>
            <option value="Management" <?php echo ($karyawan['nama_departemen'] == 'Management') ? 'selected' : ''; ?>>Management</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Posisi</td>
        <td>
          <select name="posisi" required>
            <option value="" selected>-- Pilih Salah Satu --</option>
            <option value="Backend Developer" <?php echo ($karyawan['posisi'] == 'Backend Developer') ? 'selected' : ''; ?>>Backend Developer</option>
            <option value="Frontend Developer" <?php echo ($karyawan['posisi'] == 'Frontend Developer') ? 'selected' : ''; ?>>Frontend Developer</option>
            <option value="QA Engingeer" <?php echo ($karyawan['posisi'] == 'QA Engineer') ? 'selected' : ''; ?>>QA Engingeer</option>
            <option value="UI/UX Designer" <?php echo ($karyawan['posisi'] == 'UI/UX Designer') ? 'selected' : ''; ?>>UI/UX Designer</option>
            <option value="Project Manager" <?php echo ($karyawan['posisi'] == 'Project Manager') ? 'selected' : ''; ?>>Project Manager</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Gaji</td>
        <td><input type="text" name="gaji" value="<?php echo $karyawan['gaji']; ?>"></td>
      </tr>
    </table>
    <button type="submit" name="update">Simpan</button>
  </form>
</body>
</html>