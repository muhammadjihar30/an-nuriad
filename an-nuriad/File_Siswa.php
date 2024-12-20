<?php
// Memasukkan file koneksi
include 'koneksi.php';
// Query untuk mengambil data dari tabel pendaftaran_siswa
$sql = "SELECT id, nama_siswa AS nama, tanggal_lahir AS tanggal, status_konfirmasi 
        FROM pendaftaran_siswa 
        WHERE sampah = '0'";
$result = $conn->query($sql);
$sql = "SELECT id, nama_siswa AS nama, tanggal_lahir AS tanggal, status_konfirmasi 
        FROM pendaftaran_siswa 
        WHERE sampah = '0'";
// Ambil data file siswa dengan status_konfirmasi = 'belum'
$queryFile = "SELECT * FROM pendaftaran_siswa WHERE sampah = '0' AND status_konfirmasi = 'belum'";
$resultFile = $conn->query($queryFile);

// Periksa jika query gagal
if (!$result || !$resultFile) {
  die("Query gagal: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File Siswa</title>
  <link rel="stylesheet" href="file_siswa.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://unpkg.com/ionicons@5.5.2/dist/ionicons.css" rel="stylesheet">

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
            <h1>File Siswa</h1>
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
  <a href="javascript:void(0);" onclick="toggleDropdown()"> 
    <span class="icon"><i class="fas fa-cog"></i></span>
  </a>
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
              <th>Status Konfirmasi</th>
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
        <td class="<?= $data['status_konfirmasi'] === 'belum' ? 'status-belum' : 'status-sudah' ?>">
          <?= htmlspecialchars($data['status_konfirmasi']) ?>
        </td>
        <td>
          <div class="dropdown">
            <button class="dropbtn">
              <i class="fas fa-ellipsis-v"></i>
            </button>
            <div class="dropdown-content">
              <?php if ($data['status_konfirmasi'] === 'belum') : ?>
                <a href="#" onclick="konfirmasiData(<?= $data['id'] ?>)">
                  <ion-icon name="checkmark-circle-outline"></ion-icon>
                  Konfirmasi
                </a>
              <?php endif; ?>
              <a href="edit_siswa.php?id=<?= $data['id'] ?>">
                <ion-icon name="create-outline"></ion-icon>
                Edit
              </a>
              <a href="detail_siswa.php?id=<?= $data['id'] ?>">
                <ion-icon name="eye-outline"></ion-icon>
                Lihat Rincian
              </a>
              <a href="#" onclick="deleteData(<?= $data['id'] ?>)">
                <ion-icon name="trash-outline"></ion-icon>
                Hapus
              </a>
            </div>
          </div>
        </td>
      </tr>
    <?php endwhile; ?>
  <?php else : ?>
    <tr>
      <td colspan="5">Tidak ada data.</td>
    </tr>
  <?php endif; ?>
</tbody>

        </table>
        <div class="export-section">
    <form action="export_excel.php" method="post">
        <button type="submit" class="export-button">
            <ion-icon name="download-outline"></ion-icon> Export ke Excel
        </button>
    </form>
</div>

      </section>
    </div>
    <script>
  function toggleDropdown(button) {
  // Tutup semua dropdown lain
  document.querySelectorAll('.dropdown').forEach(dropdown => {
    if (dropdown !== button.parentElement) dropdown.classList.remove('active');
  });

  // Toggle dropdown saat tombol diklik
  button.parentElement.classList.toggle('active');
}

// Tutup dropdown jika klik di luar area dropdown
document.addEventListener('click', function (event) {
  if (!event.target.closest('.dropdown')) {
    document.querySelectorAll('.dropdown').forEach(dropdown => dropdown.classList.remove('active'));
  }
});


function konfirmasiData(id) {
      Swal.fire({
        title: 'Apakah Anda yakin ingin mengonfirmasi?',
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Ya, Konfirmasi',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = `konfirmasi_siswa.php?id=${id}`;
        }
      });
    }

  function deleteData(id) {
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: 'Data ini akan masuk ke sampah',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = `delete_siswa.php?id=${id}`;
        }
      });
    }
  document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.dropbtn').forEach(button => {
    button.addEventListener('click', function (event) {
      console.log('Dropdown button clicked'); // Debugging
      this.parentElement.classList.toggle('active');
    });
  });
});
// Fungsi untuk menampilkan atau menyembunyikan dropdown
function toggleDropdown() {
  const dropdownContent = document.querySelector('.dropdown-content');
  dropdownContent.classList.toggle('show');
}


</script>
</body>

</html>