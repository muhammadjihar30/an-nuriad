<?php
include 'koneksi.php';

if (isset($_POST['kirim'])) {
    $fields = [
        'nama_siswa',
        'nama_panggilan',
        'tanggal_lahir',
        'tempat_lahir',
        'agama',
        'jumlah_saudara',
        'anak_ke',
        'jk_siswa',
        'nama_ibu',
        'tempat_lahir_ibu',
        'agama_ibu',
        'telepon_ibu',
        'pekerjaan_ibu',
        'pendidikan_ibu',
        'alamat_ibu',
        'nama_ayah',
        'tempat_lahir_ayah',
        'agama_ayah',
        'telepon_ayah',
        'pekerjaan_ayah',
        'pendidikan_ayah',
        'alamat_ayah'
    ];

    $missingFields = [];
    foreach ($fields as $field) {
        if (empty($_POST[$field])) {
            $missingFields[] = $field;
        }
    }

    // Membersihkan input dari pengguna
    $nama_siswa =  $_POST['nama_siswa'];
    $nama_panggilan =  $_POST['nama_panggilan'];
    $tanggal_lahir =  $_POST['tanggal_lahir'];
    $tempat_lahir =  $_POST['tempat_lahir'];
    $agama =  $_POST['agama'];
    $jumlah_saudara =  $_POST['jumlah_saudara'];
    $anak_ke =  $_POST['anak_ke'];
    $JK_siswa =  $_POST['jk_siswa'];

    // Data ibu
    $nama_ibu =  $_POST['nama_ibu'];
    $tempat_lahir_ibu =  $_POST['tempat_lahir_ibu'];
    $agama_ibu =  $_POST['agama_ibu'];
    $telepon_ibu =  $_POST['telepon_ibu'];
    $pekerjaan_ibu =  $_POST['pekerjaan_ibu'];
    $pendidikan_ibu =  $_POST['pendidikan_ibu'];
    $alamat_ibu =  $_POST['alamat_ibu'];

    // Data ayah
    $nama_ayah =  $_POST['nama_ayah'];
    $tempat_lahir_ayah =  $_POST['tempat_lahir_ayah'];
    $agama_ayah =  $_POST['agama_ayah'];
    $telepon_ayah =  $_POST['telepon_ayah'];
    $pekerjaan_ayah =  $_POST['pekerjaan_ayah'];
    $pendidikan_ayah =  $_POST['pendidikan_ayah'];
    $alamat_ayah =  $_POST['alamat_ayah'];

    // Query Insert Data
    $sqlInsert = "
        INSERT INTO pendaftaran_siswa 
        (nama_siswa, nama_panggilan, tanggal_lahir, tempat_lahir, agama, jumlah_saudara, anak_ke, jk_siswa, 
        nama_ibu, tempat_lahir_ibu, agama_ibu, telepon_ibu, pekerjaan_ibu, pendidikan_ibu, alamat_ibu, 
        nama_ayah, tempat_lahir_ayah, agama_ayah, telepon_ayah, pekerjaan_ayah, pendidikan_ayah, alamat_ayah) 
        VALUES 
        ('$nama_siswa', '$nama_panggilan', '$tanggal_lahir', '$tempat_lahir', '$agama', '$jumlah_saudara', '$anak_ke', '$JK_siswa',
        '$nama_ibu', '$tempat_lahir_ibu', '$agama_ibu', '$telepon_ibu', '$pekerjaan_ibu', '$pendidikan_ibu', '$alamat_ibu',
        '$nama_ayah', '$tempat_lahir_ayah', '$agama_ayah', '$telepon_ayah', '$pekerjaan_ayah', '$pendidikan_ayah', '$alamat_ayah')";

        if (mysqli_query($conn, $sqlInsert)) {
            // Buat folder berdasarkan nama siswa dan tanggal lahir
            $folderName = "siswa/" . str_replace(' ', '_', $nama_siswa) . "_" . str_replace('-', '', $tanggal_lahir);
        
            if (!file_exists($folderName)) {
                mkdir($folderName, 0777, true); // Membuat folder dengan izin penuh
            }
        
            // Menambahkan file placeholder (opsional)
            file_put_contents("$folderName/readme.txt", "Data siswa $nama_siswa telah disimpan di folder ini.");
        
            echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data berhasil disimpan dan folder telah dibuat.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'index.php';
                        }
                    });
                </script>
            ";
        } else {
            echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Gagal menyimpan data: " . mysqli_error($conn) . "',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                </script>
            ";
        }
        
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link rel="stylesheet" href="form.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
       function validateForm(event) {
    const inputs = document.querySelectorAll('input, textarea, select');
    let isValid = true;
    let firstInvalid = null;

    inputs.forEach(input => {
        if (!input.value.trim() || input.value === "pilih") { // Memeriksa juga opsi default select
            isValid = false;
            input.classList.add('error');
            if (!firstInvalid) {
                firstInvalid = input;
            }
        } else {
            input.classList.remove('error');
        }
    });

    if (!isValid) {
        event.preventDefault(); // Mencegah form dikirim
        Swal.fire({
            title: 'Form Tidak Lengkap!',
            text: 'Semua data wajib diisi. Periksa kembali form Anda.',
            icon: 'warning',
            confirmButtonText: 'OK'
        }).then(() => {
            if (firstInvalid) {
                firstInvalid.focus(); // Fokus pada input pertama yang kosong
            }
        });
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    form.addEventListener('submit', validateForm);
});
    </script>
</head>

<body>
    <div class="form-container">
        <h1>FORM PENDAFTARAN</h1>
        <form action="" method="post">
            <div class="form-grid">
                <!-- Input Data Diri Siswa -->
                <div class="form-section">
                    <h2>Data Diri Siswa</h2>
                    <label for="nama-siswa">Nama Lengkap</label>
                    <input type="text" name="nama_siswa" id="nama-siswa" placeholder="Masukkan nama lengkap">

                    <label for="nama-panggilan">Nama Panggilan</label> 
                    <input type="text" name="nama_panggilan" id="nama-panggilan" placeholder="Masukkan nama panggilan">

                    <label for="agama-siswa">Agama siswa</label>
                    <select class="form-section" name="agama" id="agama-siswa">
                        <option value="pilih">Pilih</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Kristen Katolik">Kristen Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghuchu">Konghuchu</option>
                    </select>
                    <label for="tanggal-lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal-lahir">

                    <label for="tempat-lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat-lahir" placeholder="Masukkan tempat lahir">
                    <label for="jumlah-saudara">Jumlah Saudara</label>
                    <input type="number" name="jumlah_saudara" id="jumlah-saudara" placeholder="Masukkan jumlah saudara">

                    <label for="anak-ke">Anak ke-</label>
                    <input type="number" name="anak_ke" id="anak-ke" placeholder="Anak ke-berapa">

                    <p>Jenis Kelamin</p>
                    <div class="gender-options">
                        <select class="form-section" name="JK_siswa" id="JK_siswa">
                            <option name="jk_siswa" value="Pilih">Pilih</option>
                            <option name="jk_siswa" value="laki-laki">Laki-laki</option>
                            <option name="jk_siswa" value="perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>

                <!-- Data Diri Lengkap Ibu -->
                <div class="form-section">
                    <h2>Data Ibu</h2>
                    <label for="nama-ibu">Nama Lengkap</label>
                    <input type="text" name="nama_ibu" id="nama-ibu" placeholder="Masukkan nama lengkap ibu">

                    <label for="tempat-lahir-ibu">Tempat/Tgl Lahir</label>
                    <input type="text" name="tempat_lahir_ibu" id="tempat-lahir-ibu" placeholder="Masukkan tempat/tgl lahir">

                    <label for="agama-ibu">Agama ibu</label>
                    <select class="form-section" name="agama_ibu" id="agama-ibu">
                        <option value="pilih">Pilih</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Kristen Katolik">Kristen Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghuchu">Konghuchu</option>
                    </select>
                    <label for="telepon-ibu">No. Telp</label>
                    <input type="text" name="telepon_ibu" id="telepon-ibu" placeholder="Masukkan no telp ibu">

                    <label for="pekerjaan-ibu">Pekerjaan</label>
                    <input type="text" name="pekerjaan_ibu" id="pekerjaan-ibu" placeholder="Masukkan pekerjaan ibu">

                    <label for="pendidikan-ibu">Pendidikan</label>
                    <select class="form-section" name="pendidikan_ibu" id="pendidikan-ibu">
                        <option value="pilih">Pilih</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="SMK">SMK</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Sarjana">Sarjana</option>
                        <option value="Magister">Magister</option>
                        <option value="Doktoral">Doktoral</option>
                    </select>
                    <label for="alamat-ibu">Alamat</label>
                    <textarea name="alamat_ibu" id="alamat-ibu" placeholder="Masukkan alamat ibu"></textarea>
                </div>

                <!-- Data Diri Lengkap Ayah -->
                <div class="form-section">
                    <h2>Data Ayah</h2>
                    <label for="nama-ayah">Nama Lengkap</label>
                    <input type="text" name="nama_ayah" id="nama-ayah" placeholder="Masukkan nama lengkap ayah">

                    <label for="tempat-lahir-ayah">Tempat/Tgl Lahir</label>
                    <input type="text" name="tempat_lahir_ayah" id="tempat-lahir-ayah" placeholder="Masukkan tempat/tgl lahir">

                    <label for="agama-ayah">Agama ayah</label>
                    <select class="form-section" name="agama_ayah" id="agama-ayah">
                        <option value="pilih">Pilih</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Kristen Katolik">Kristen Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghuchu">Konghuchu</option>
                    </select>
                    <label for="telepon-ayah">No. Telp</label>
                    <input type="text" name="telepon_ayah" id="telepon-ayah" placeholder="Masukkan no telp ayah">

                    <label for="pekerjaan-ayah">Pekerjaan</label>
                    <input type="text" name="pekerjaan_ayah" id="pekerjaan-ayah" placeholder="Masukkan pekerjaan ayah">

                    <label for="pendidikan-ayah">Pendidikan</label>
                    <select class="form-section" name="pendidikan_ayah" id="pendidikan-ayah">
                        <option value="pilih">Pilih</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="SMK">SMK</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Sarjana">Sarjana</option>
                        <option value="Magister">Magister</option>
                        <option value="Doktoral">Doktoral</option>
                    </select>
                    <label for="alamat-ayah">Alamat</label>
                    <textarea name="alamat_ayah" id="alamat-ayah" placeholder="Masukkan alamat ayah"></textarea>
                </div>
            </div>
            <button type="submit" name="kirim" class="submit-button">Kirim</button>
        </form>
    </div>
</body>

</html>