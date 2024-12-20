<?php
// Memasukkan file koneksi
include 'koneksi.php';

// Query untuk mengambil data dari tabel pendaftaran_siswa di mana data berada di "sampah"
$sql = "SELECT id, nama_siswa AS nama, tanggal_lahir AS tanggal, status_konfirmasi 
        FROM pendaftaran_siswa 
        WHERE sampah = '1'";
$result = $conn->query($sql);

// Periksa jika query gagal
if (!$result) {
  die("Query gagal: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File Sampah</title>
  <link rel="stylesheet" href="sampah.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
  <!-- ===== navigation ===== -->
  <div class="container">
    <div class="navigation">
      <ul>
      <a href="formadmin.php"><button class="tombol-unggah">Daftar Siswa Baru</button></a>
      <input type="file" id="fileInput" style="display: none;" onchange="uploadFile()" />
        <li>
          <a href="dashboard.php">
            <span class="icon"><i class="fa fa-th-large"></i></span>
            <span class="title"><b>Dashboard</b></span>
          </a>
        </li>
        <li>
          <a href="File_Siswa.php">
            <span class="icon"><i class="fa fa-users"></i></span>
            <span class="title"><b>File Siswa</b></span>
          </a>
        </li>
        <li>
          <a href="uploadkegiatan.php">
            <span class="icon"><i class="fa fa-upload"></i></span>
            <span class="title"><b>Upload Kegiatan</b></span>
          </a>
        </li>
        <li>
          <a href="sampah.php">
            <span class="icon"><i class="fas fa-trash"></i></span>
            <span class="title"><b>Sampah</b></span>
          </a>
        </li>
        <li>
          <a href="logout.php">
            <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
            <span class="title"><b>Log Out</b></span>
          </a>
        </li>
      </ul>
    </div>
    <!-- ====== main ===== -->
    <div class="main">
      <div class="topbar">
        <div class="logo-wa">
        <img src="1.png" alt="Logo" class="logo">
          <div class="nama-paud">
            <h1>File Sampah</h1>
          </div>
        </div>
        <div class="search">
          <label>
            <input type="text" placeholder="Cari Data Saya" />
            <ion-icon name="search-outline"></ion-icon>
          </label>
        </div>
        <div class="notifikasi">
          <a href="#"><span class="icon"><i class="fas fa-bell"></i></span></a>
        </div>
        <div class="help">
          <a href="#"><span class="icon"><i class="fas fa-question-circle"></i></span></a>
        </div>
        <div class="pengaturan">
          <a href="#"><span class="icon"><i class="fas fa-cog"></i></span></a>
        </div>
        <div class="user">
          <img src="f16cc7ec7235a12a99bf92505040bfdb.jpg" alt="poto" />
        </div>
      </div>

      <!-- Section Tabel -->
      <section class="table-section">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($result->num_rows > 0) : ?>
              <?php while ($data = $result->fetch_assoc()) : ?>
                <tr>
                  <td><?= htmlspecialchars($data['id']) ?></td>
                  <td><?= htmlspecialchars($data['nama']) ?></td>
                  <td><?= htmlspecialchars($data['tanggal']) ?></td>
                  <td>
                    <button class="recover" onclick="recoverData(<?= $data['id'] ?>)">Pulihkan</button>
                    <button class="hapus" onclick="deletePermanent(<?= $data['id'] ?>)">Hapus</button>
                  </td>
                </tr>
              <?php endwhile; ?>
            <?php else : ?>
              <tr>
                <td colspan="4">Tidak ada data di sampah.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </section>
    </div>

    <script>
      function recoverData(id) {
      Swal.fire({
        title: 'Apakah Anda yakin ingin memulihkan file ini ?',
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Ya, Pulihkan',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = `recover_siswa.php?id=${id}`;
        }
      });
    }

      function deletePermanent(id) {
        Swal.fire({
        title: 'Apakah Anda yakin ingin menghapus permanen file ini?',
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = `delete_permanent.php?id=${id}`;
        }
      });
    }
    </script>
</body>

</html>
