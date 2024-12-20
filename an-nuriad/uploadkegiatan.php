<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Komputer</title>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="Uploadkegiatan.css" />
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
                            Upload Kegiatan
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
            <!-- ====== main close ===== -->
            <div class="upload-section">
                <h1>Upload Kegiatan <ion-icon name="images-outline" class="ion-images-icon"></ion-icon> </h1>

                <label for="judul-kegiatan">Judul kegiatan</label> <br>
                <input type="text" id="judul-kegiatan" placeholder="Masukkan judul kegiatan">

                <label for="gambar-kegiatan">Gambar Kegiatan</label>
                <div class="upload-box">
                    <!-- Ion Icon for Image Upload -->
                    <div class="gambar"><ion-icon name="cloud-upload-outline" class="header-icon"></ion-icon></div>

                </div>

                <button class="upload-btn" onclick="document.getElementById('fileInput').click();">
                    Upload Kegiatan</button>
                <input type="file" id="fileInput" style="display: none;" onchange="uploadFile()" />
                </button>
            </div>
        </div>
    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </div>
    </div>

    <script>
        // Fungsi untuk menangani pencarian
        function searchTable() {
            const searchInput = document.querySelector('.search input').value.toLowerCase();
            const tableRows = document.querySelectorAll('#fileTable tbody tr');

            // Loop melalui semua baris tabel dan periksa apakah nama file sesuai dengan input pencarian
            tableRows.forEach(row => {
                const fileName = row.cells[0].textContent.toLowerCase();
                if (fileName.includes(searchInput)) {
                    row.style.display = ''; // Tampilkan baris jika cocok
                } else {
                    row.style.display = 'none'; // Sembunyikan baris jika tidak cocok
                }
            });
        }

        // Event listener untuk pencarian
        document.querySelector('.search input').addEventListener('input', searchTable);

        // Fungsi upload file
        function uploadFile() {
            const input = document.getElementById('fileInput');
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const fileName = file.name;
                    const fileSize = (file.size / 1024).toFixed(2) + ' KB';
                    const lastModified = new Date(file.lastModified).toLocaleString();

                    // Cek apakah file adalah gambar
                    const isImage = file.type.startsWith('image/');
                    const status = isImage ? 'Gambar tidak dapat diedit' : 'Dapat diedit';

                    const tableRow = `
                    <tr>
                        <td>${fileName}</td>
                        <td>${lastModified}</td>
                        <td>${fileSize}</td>
                        <td>${status}</td>
                        <td>
                            <button class="button-edit" onclick="editFile(this)" ${isImage ? 'disabled' : ''}>Edit</button>
                            <button class="button-delete" onclick="deleteFile(this)">Hapus</button>
                        </td>
                    </tr>
                `;
                    document.querySelector('#fileTable tbody').insertAdjacentHTML('beforeend', tableRow);
                    input.value = ''; // Clear the input
                };
                reader.readAsDataURL(file); // Read the file as data URL
            }
        }

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
    </script>

</body>

</html>