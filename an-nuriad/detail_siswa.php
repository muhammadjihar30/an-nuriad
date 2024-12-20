<?php
// Memasukkan file koneksi
include 'koneksi.php';

// Cek apakah ada parameter 'id' yang diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil rincian data berdasarkan ID
    $sql = "SELECT * FROM pendaftaran_siswa WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // Binding ID ke parameter
    $stmt->execute();
    $result = $stmt->get_result();

    // Mengecek apakah ada data yang ditemukan
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "ID tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rincian Data Siswa</title>
    <link rel="stylesheet" href="detailsiswa.css">
</head>

<body>
    <div class="container">
        <div class="main">
            <div class="topbar">
                <h1>Rincian Data Siswa</h1>
                <a href="File_Siswa.php"><button>Kembali ke file siswa</button></a>
            </div>

            <section class="detail-section">
                <!-- Bagian Data Siswa -->
                <h2>Data Siswa</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <td><?= htmlspecialchars($data['id']) ?></td>
                    </tr>
                    <tr>
                        <th>Nama Siswa</th>
                        <td><?= htmlspecialchars($data['nama_siswa']) ?></td>
                    </tr>
                    <tr>
                        <th>Nama Panggilan</th>
                        <td><?= htmlspecialchars($data['nama_panggilan']) ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td><?= htmlspecialchars($data['tanggal_lahir']) ?></td>
                    </tr>
                    <tr>
                        <th>Tempat Lahir</th>
                        <td><?= htmlspecialchars($data['tempat_lahir']) ?></td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td><?= htmlspecialchars($data['agama']) ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah Saudara</th>
                        <td><?= htmlspecialchars($data['jumlah_saudara']) ?></td>
                    </tr>
                    <tr>
                        <th>Anak Ke</th>
                        <td><?= htmlspecialchars($data['anak_ke']) ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td><?= htmlspecialchars($data['jk_siswa']) ?></td>
                    </tr>
                    <tr>
                        <th>Alamat Siswa</th>
                        <td><?= htmlspecialchars($data['alamat']) ?></td>
                    </tr>
                    <tr>
                        <th>NIPD Siswa</th>
                        <td><?= htmlspecialchars($data['nipd_siswa']) ?></td>
                    </tr>
                    <tr>
                        <th>NISN Siswa</th>
                        <td><?= htmlspecialchars($data['nisn_siswa']) ?></td>
                    </tr>
                    <tr>
                        <th>NIK Siswa</th>
                        <td><?= htmlspecialchars($data['nik_siswa']) ?></td>
                    </tr>

                </table>

                <hr>

                <!-- Bagian Data Ibu -->
                <h2>Data Ibu</h2>
                <table>
                    <tr>
                        <th>Nama Ibu</th>
                        <td><?= htmlspecialchars($data['nama_ibu']) ?></td>
                    </tr>
                    <tr>
                        <th>Tempat Lahir Ibu</th>
                        <td><?= htmlspecialchars($data['tempat_lahir_ibu']) ?></td>
                    </tr>
                    <tr>
                        <th>Tahun Lahir Ibu</th>
                        <td><?= htmlspecialchars($data['tahun_lahir_ibu']) ?></td>
                    </tr>
                    <tr>
                        <th>Agama Ibu</th>
                        <td><?= htmlspecialchars($data['agama_ibu']) ?></td>
                    </tr>
                    <tr>
                        <th>Telepon Ibu</th>
                        <td><?= htmlspecialchars($data['telepon_ibu']) ?></td>
                    </tr>
                    <tr>
                        <th>Pekerjaan Ibu</th>
                        <td><?= htmlspecialchars($data['pekerjaan_ibu']) ?></td>
                    </tr>
                    <tr>
                        <th>Penghasilan Ibu</th>
                        <td><?= htmlspecialchars($data['penghasilan_ibu']) ?></td>
                    </tr>
                    <tr>
                        <th>Pendidikan Ibu</th>
                        <td><?= htmlspecialchars($data['pendidikan_ibu']) ?></td>
                    </tr>
                    <tr>
                        <th>Alamat Ibu</th>
                        <td><?= htmlspecialchars($data['alamat_ibu']) ?></td>
                    </tr>
                </table>

                <hr>

                <!-- Bagian Data Ayah -->
                <h2>Data Ayah</h2>
                <table>
                    <tr>
                        <th>Nama Ayah</th>
                        <td><?= htmlspecialchars($data['nama_ayah']) ?></td>
                    </tr>
                    <tr>
                        <th>Tempat Lahir Ayah</th>
                        <td><?= htmlspecialchars($data['tempat_lahir_ayah']) ?></td>
                    </tr>
                    <tr>
                        <th>Tahun Lahir Ayah</th>
                        <td><?= htmlspecialchars($data['tahun_lahir_ayah']) ?></td>
                    </tr>
                    <tr>
                        <th>Agama Ayah</th>
                        <td><?= htmlspecialchars($data['agama_ayah']) ?></td>
                    </tr>
                    <tr>
                        <th>Telepon Ayah</th>
                        <td><?= htmlspecialchars($data['telepon_ayah']) ?></td>
                    </tr>
                    <tr>
                        <th>Pekerjaan Ayah</th>
                        <td><?= htmlspecialchars($data['pekerjaan_ayah']) ?></td>
                    </tr>
                    <tr>
                        <th>Penghasilan Ayah</th>
                        <td><?= htmlspecialchars($data['penghasilan_ayah']) ?></td>
                    </tr>
                    <tr>
                        <th>Pendidikan Ayah</th>
                        <td><?= htmlspecialchars($data['pendidikan_ayah']) ?></td>
                    </tr>
                    <tr>
                        <th>Alamat Ayah</th>
                        <td><?= htmlspecialchars($data['alamat_ayah']) ?></td>
                    </tr>
                    <tr>
                        <th>NIK Ayah</th>
                        <td><?= htmlspecialchars($data['nik_ayah']) ?></td>
                    </tr>
                </table>

                <hr>

                <!-- Bagian Data Wali -->
                <h2>Data Wali</h2>
                <table>
                    <tr>
                        <th>Nama Wali</th>
                        <td><?= htmlspecialchars($data['nama_wali']) ?></td>
                    </tr>
                    <tr>
                        <th>Tahun Lahir Wali</th>
                        <td><?= htmlspecialchars($data['tahun_lahir_wali']) ?></td>
                    </tr>
                    <tr>
                        <th>Jenjang Pendidikan Wali</th>
                        <td><?= htmlspecialchars($data['jenjang_pendidikan_wali']) ?></td>
                    </tr>
                    <tr>
                        <th>Pekerjaan Wali</th>
                        <td><?= htmlspecialchars($data['pekerjaan_wali']) ?></td>
                    </tr>
                    <tr>
                        <th>Penghasilan Wali</th>
                        <td><?= htmlspecialchars($data['penghasilan_wali']) ?></td>
                    </tr>
                    <tr>
                        <th>NIK Wali</th>
                        <td><?= htmlspecialchars($data['nik_wali']) ?></td>
                    </tr>
                </table>

                <hr>

                <!-- Bagian Keterangan Lain -->
                <h2>Keterangan Lain</h2>
                <table>
                <tr>
                        <th>RT</th>
                        <td><?= htmlspecialchars($data['rt']) ?></td>
                    </tr>
                    <tr>
                        <th>RW</th>
                        <td><?= htmlspecialchars($data['rw']) ?></td>
                    </tr>

                    <tr>
                        <th>Dusun</th>
                        <td><?= htmlspecialchars($data['dusun']) ?></td>
                    </tr>
                    <tr>
                        <th>Kelurahan</th>
                        <td><?= htmlspecialchars($data['kelurahan']) ?></td>
                    </tr>
                    <tr>
                        <th>Kecamatan</th>
                        <td><?= htmlspecialchars($data['kecamatan']) ?></td>
                    </tr>
                    <tr>
                        <th>Kode Pos</th>
                        <td><?= htmlspecialchars($data['kode_pos']) ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Tinggal</th>
                        <td><?= htmlspecialchars($data['jenis_tinggal']) ?></td>
                    </tr>
                    <tr>
                        <th>Alat Transportasi</th>
                        <td><?= htmlspecialchars($data['alat_transportasi']) ?></td>
                    </tr>
                    <tr>
                        <th>Telepon</th>
                        <td><?= htmlspecialchars($data['telepon']) ?></td>
                    </tr>
                    <tr>
                        <th>Hp</th>
                        <td><?= htmlspecialchars($data['hp']) ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?= htmlspecialchars($data['e_mail']) ?></td>
                    </tr>
                    <tr>
                        <th>Jarak Rumah ke Sekolah</th>
                        <td><?= htmlspecialchars($data['jarak_rumah_ke_sekolah']) ?></td>
                    </tr>
                    <tr>
                        <th>Penerima KPS</th>
                        <td><?= htmlspecialchars($data['penerima_kps']) ?></td>
                    </tr>
                    <tr>
                        <th>Nomor KPS</th>
                        <td><?= htmlspecialchars($data['no_kps']) ?></td>
                    </tr>
                    <tr>
                        <th>SKHUN</th>
                        <td><?= htmlspecialchars($data['skhun']) ?></td>
                    </tr>
                    <tr>
                    <tr>
                        <th>Penerima KIP</th>
                        <td><?= htmlspecialchars($data['penerima_kip']) ?></td>
                    </tr>
                        <th>Nomor KIP</th>
                        <td><?= htmlspecialchars($data['nomor_kip']) ?></td>
                    </tr>
                    <tr>
                        <th>Nama KIP</th>
                        <td><?= htmlspecialchars($data['nama_di_kip']) ?></td>
                    </tr>
                    <tr>
                        <th>Rombel Saat ini</th>
                        <td><?= htmlspecialchars($data['rombel_saat_ini']) ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Peserta UN</th>
                        <td><?= htmlspecialchars($data['no_peserta_ujian_nasional']) ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Seri Ijazah</th>
                        <td><?= htmlspecialchars($data['no_seri_ijazah']) ?></td>
                    </tr>
                    <tr>
                        <th>Nomor KKS</th>
                        <td><?= htmlspecialchars($data['nomor_kks']) ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Registrasi Akta Lahir</th>
                        <td><?= htmlspecialchars($data['no_registrasi_akta_lahir']) ?></td>
                    </tr>
                    <tr>
                        <th>BANK</th>
                        <td><?= htmlspecialchars($data['bank']) ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Rekening BANK</th>
                        <td><?= htmlspecialchars($data['nomor_rekening_bank']) ?></td>
                    </tr>
                    <tr>
                        <th>Rekening atas nama</th>
                        <td><?= htmlspecialchars($data['rekening_atas_nama']) ?></td>
                    </tr>
                    <tr>
                        <th>Layak PIP</th>
                        <td><?= htmlspecialchars($data['layak_pip']) ?></td>
                    </tr>
                    <tr>
                        <th>Alasan Layak PIP</th>
                        <td><?= htmlspecialchars($data['alasan_layak_pip']) ?></td>
                    </tr>
                    <tr>
                        <th>Kebutuhan Khusus</th>
                        <td><?= htmlspecialchars($data['kebutuhan_khusus']) ?></td>
                    </tr>
                    <tr>
                        <th>Sekolah Asal</th>
                        <td><?= htmlspecialchars($data['sekolah_asal']) ?></td>
                    </tr>
                    <tr>
                        <th>Lintang</th>
                        <td><?= htmlspecialchars($data['lintang']) ?></td>
                    </tr>
                    <tr>
                        <th>Bujur</th>
                        <td><?= htmlspecialchars($data['bujur']) ?></td>
                    </tr>
                    <tr>
                        <th>No KK</th>
                        <td><?= htmlspecialchars($data['no_kk']) ?></td>
                    </tr>
                    <tr>
                        <th>Berat Badan</th>
                        <td><?= htmlspecialchars($data['berat_badan']) ?></td>
                    </tr>
                    <tr>
                        <th>Tinggi Badan</th>
                        <td><?= htmlspecialchars($data['tinggi_badan']) ?></td>
                    </tr>
                    <tr>
                        <th>Lingkar Kepala</th>
                        <td><?= htmlspecialchars($data['lingkar_kepala']) ?></td>
                    </tr>
                </table>
            </section>
        </div>
    </div>
</body>

</html>
