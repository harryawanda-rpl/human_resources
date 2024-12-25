<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Human Resources</title>
</head>
<body>
  <h3>Tambah Data Karyawan</h3>
  <form action="proses-tambah.php" method="POST">
    <table>
      <tr>
        <td>Nama Karyawan</td>
        <td><input type="text" name="nama_karyawan" required></td>
      </tr>
      <tr>
        <td>Nama Departemen</td>
        <td>
          <select name="nama_departemen" required>
            <option value="" selected>-- Pilih Salah Satu --</option>
            <option value="Engineer">Engineer</option>
            <option value="Designer">Designer</option>
            <option value="Management">Management</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Posisi</td>
        <td>
          <select name="posisi" required>
            <option value="" selected>-- Pilih Salah Satu --</option>
            <option value="Backend Developer">Backend Developer</option>
            <option value="Frontend Developer">Frontend Developer</option>
            <option value="QA Engingeer">QA Engingeer</option>
            <option value="UI/UX Designer">UI/UX Designer</option>
            <option value="Project Manager">Project Manager</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Gaji</td>
        <td><input type="text" name="gaji" placeholder="currency: IDR"></td>
      </tr>
    </table>
    <button type="submit" name="simpan">Simpan</button>
  </form>
</body>
</html>