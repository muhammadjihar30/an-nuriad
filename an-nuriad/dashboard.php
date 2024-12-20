<?php
include 'koneksi.php';

// Query untuk menghitung jumlah file baru, konfirmasi, dan total file
$fileBaru = $conn->query("SELECT COUNT(*) AS count FROM pendaftaran_siswa WHERE status_konfirmasi = 'belum'")->fetch_assoc()['count'];
$konfirmasi = $conn->query("SELECT COUNT(*) AS count FROM pendaftaran_siswa WHERE status_konfirmasi = 'sudah'")->fetch_assoc()['count'];

$totalSiswa = 0;
$totalKonfirmasi = 0;
$totalFile = 0;

try {
    // Query untuk mendapatkan jumlah siswa baru
    $querySiswa = "SELECT COUNT(*) AS total FROM pendaftaran_siswa WHERE sampah = '0'";
    $resultSiswa = $conn->query($querySiswa);
    if ($resultSiswa && $dataSiswa = $resultSiswa->fetch_assoc()) {
        $totalSiswa = (int) $dataSiswa['total'];
    }

    // Query untuk mendapatkan jumlah konfirmasi
    $queryKonfirmasi = "SELECT COUNT(*) AS total FROM pendaftaran_siswa WHERE status_konfirmasi = 'sudah'";
    $resultKonfirmasi = $conn->query($queryKonfirmasi);
    if ($resultKonfirmasi && $dataKonfirmasi = $resultKonfirmasi->fetch_assoc()) {
        $totalKonfirmasi = (int) $dataKonfirmasi['total'];
    }

    // Query untuk mendapatkan jumlah total file
    $queryFile = "SELECT COUNT(*) AS total FROM pendaftaran_siswa";
    $resultFile = $conn->query($queryFile);
    if ($resultFile && $dataFile = $resultFile->fetch_assoc()) {
        $totalFile = (int) $dataFile['total'];
    }
} catch (Exception $e) {
    // Jika terjadi error, tangkap exception
    error_log("Error fetching data: " . $e->getMessage());
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Komputer</title>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="dh.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
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
        <!-- ====== navigation close ===== -->

        <!-- ====== main ===== -->
        <div class="main">
            <div class="topbar">
                <div class="logo-wa">
                <img src="1.png" alt="Logo" class="logo">
                    <div class="nama-paud">
                        <h1>
                            SKY LEARN
                        </h1>
                    </div>
                </div>
                 <div class="PAUD">
                    <h3>Michelle</h3>
                </div> 
                <div class="search">
                    <label>
                        <input type="text" placeholder="Cari Data Saya" /> </b>
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div> 
                <div class="notifikasi">
                    <a href="#">
                        <span class="icon"><i class="fas fa-bell"></i></span>
                    </a>
                </div>
                <div class="help">
                    <a href="#">
                        <span class="icon"><i class="fas fa-question-circle"></i></span>
                    </a>
                </div>
                <div class="pengaturan">
                    <a href="#">
                        <span class="icon"><i class="fas fa-cog"></i></span>
                    </a>
                </div>
                <div class="user">
                    <img src="f16cc7ec7235a12a99bf92505040bfdb.jpg" alt="poto" />
                </div>
            </div>
            <div class="dashboard">
                <div class="dashboard-item">
                    <div class="icon-left">
                        <img src="tiang.png" alt="Icon Kiri">
                    </div>
                    <div class="content" id="file-baru">
                        <h2>File Baru</h2>
                        <span class="count"><?= htmlspecialchars($totalSiswa) ?></span>
                    </div>
                    <div class="icon-right">
                        <ion-icon name="document-outline"></ion-icon>
                    </div>
                </div>

                <div class="dashboard-item" id="konfirmasi">
                    <div class="icon-left">
                        <img src="tiang.png" alt="Icon Kiri">
                    </div>
                    <div class="content">
                        <h2>Konfirmasi</h2>
                        <span class="count" id="konfirmasi-count"><?= htmlspecialchars($totalKonfirmasi) ?></span>
                    </div>
                    <div class="icon-right">
                        <ion-icon name="person"></ion-icon>
                    </div>
                </div>

                <div class="dashboard-item" id="total-file">
                    <div class="icon-left">
                        <img src="tiang.png" alt="Icon Kiri">
                    </div>
                    <div class="content">
                        <h2>Total File</h2>
                        <span class="count" id="total-file-count"><?= htmlspecialchars($totalFile); ?></span>
                    </div>
                    <div class="icon-right">
                        <ion-icon name="folder-open"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="charts">
                <div class="chart-container">
                    <canvas id="barChart"></canvas>
                </div>
                <div class="chart-container">
                    <canvas id="pieChart" width="100" height="200"></canvas>
                </div>
            </div>
            <div class="tombol">

    <button class="daftar" id="toggleButton">Memuat...</button>
            </div>
            <!-- Scripts -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
            <script>
                // Bar Chart Configuration
                const barCtx = document.getElementById('barChart').getContext('2d');
                new Chart(barCtx, {
                    type: 'bar',
                    data: {
                        labels: ['2021', '2022', '2023', '2024', '2025'],
                        datasets: [{
                                label: 'Laki-laki',
                                data: [20, 15, 18, 15, 19],
                                backgroundColor: 'rgba(72, 209, 204, 0.6)',
                                borderColor: 'rgba(72, 209, 204, 1)',
                                borderWidth: 2,
                                barPercentage: 0.6,
                                categoryPercentage: 1.0
                            },
                            {
                                label: 'Perempuan',
                                data: [18, 20, 16, 18, 17],
                                backgroundColor: 'rgba(255, 182, 193, 0.6)',
                                borderColor: 'rgba(255, 182, 193, 1)',
                                borderWidth: 2,
                                barPercentage: 0.6,
                                categoryPercentage: 1.0
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Pie Chart Configuration
                const pieCtx = document.getElementById('pieChart').getContext('2d');
                new Chart(pieCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Data Baru', 'Sudah di Konfirmasi', 'Belum di Konfirmasi'],
                        datasets: [{
                            data: [33, 28, 39],
                            backgroundColor: [
                                'rgba(255, 182, 193, 0.6)',
                                'rgba(72, 209, 204, 0.6)',
                                'rgba(135, 206, 250, 0.6)'
                            ],
                            borderColor: [
                                'rgba(255, 182, 193, 1)',
                                'rgba(72, 209, 204, 1)',
                                'rgba(135, 206, 250, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }
                });
            </script>
            <!-- ====== card close ===== -->
        </div>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </div>
    </div>


    <script>
 document.addEventListener('DOMContentLoaded', () => {
            const button = document.getElementById('toggleButton');

            // Fetch the current status of the button
            fetch('get_tombol_status.php')
                .then(response => response.json())
                .then(data => {
                    if (data.status) {
                        button.textContent = 'Pendaftaran Aktif';
                        button.disabled = false; // Tombol bisa diklik
                    } else {
                        button.textContent = 'Pendaftaran Nonaktif';
                        button.disabled = false; // Tombol tetap bisa diklik meskipun statusnya Nonaktif
                    }
                })
                .catch(error => {
                    console.error('Error fetching status:', error);
                    alert('Gagal mendapatkan status tombol.');
                });

            // Handle button click event
            button.addEventListener('click', function () {
                const isActive = button.textContent === 'Pendaftaran Aktif';

                // Toggle status in the server
                fetch('toggle_tombol.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `status=${isActive ? 'false' : 'true'}` // Mengirimkan status sebagai 'true' atau 'false'
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            if (isActive) {
                                button.textContent = 'Pendaftaran Nonaktif';
                            } else {
                                button.textContent = 'Pendaftaran Aktif';
                            }
                        } else {
                            alert('Gagal mengubah status tombol pendaftaran.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan.');
                    });
            });
        });

</script>


    <script>
        function searchTable() {
            const searchInput = document.querySelector('.search input').value.toLowerCase();
            const tableRows = document.querySelectorAll('#fileTable tbody tr');


            tableRows.forEach(row => {
                const fileName = row.cells[0].textContent.toLowerCase();
                if (fileName.includes(searchInput)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }


        document.querySelector('.search input').addEventListener('input', searchTable);
        // Fungsi edit file
        function editFile(button) {
            const row = button.parentElement.parentElement;
            const fileNameCell = row.cells[0];
            const newFileName = prompt("Edit Nama File:", fileNameCell.textContent);
            if (newFileName) {
                fileNameCell.textContent = newFileName;
            }
        }

        // Fungsi hapus file
        function deleteFile(button) {
            const row = button.parentElement.parentElement;
            const confirmation = confirm("Apakah Anda yakin ingin menghapus file ini?");
            if (confirmation) {
                row.remove();
            }
        }

        function konfirmasiData(button) {
            const row = button.parentElement.parentElement;
            const namaSiswa = row.cells[0].textContent.trim();
            const tanggal = row.cells[1].textContent.trim();

            fetch('konfirmasi_siswa.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        nama: namaSiswa,
                        tanggal: tanggal
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update UI (misalnya, memperbarui jumlah konfirmasi dan file)
                        document.getElementById('konfirmasi-count').textContent = data.totalKonfirmasi;
                        document.getElementById('total-file-count').textContent = data.totalFile;

                        // Remove row from table after successful confirmation
                        row.remove();
                    } else {
                        alert('Gagal mengkonfirmasi data: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                });
        }
    </script>
</body>

</html>