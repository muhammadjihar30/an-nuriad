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

// Proses Update jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fields = [
        'nama_siswa', 'nama_panggilan', 'tanggal_lahir', 'tempat_lahir', 'agama',
        'jumlah_saudara', 'anak_ke', 'jk_siswa', 'nama_ibu', 'tempat_lahir_ibu',
        'agama_ibu', 'telepon_ibu', 'pekerjaan_ibu', 'pendidikan_ibu', 'alamat_ibu',
        'nama_ayah', 'tempat_lahir_ayah', 'agama_ayah', 'telepon_ayah', 'pekerjaan_ayah',
        'pendidikan_ayah', 'alamat_ayah', 'nipd_siswa', 'nisn_siswa', 'nik_siswa',
        'alamat', 'rt', 'rw', 'dusun', 'kelurahan', 'kecamatan', 'kode_pos', 
        'jenis_tinggal', 'alat_transportasi', 'telepon', 'hp', 'e_mail', 'skhun', 
        'penerima_kps', 'no_kps', 'tahun_lahir_ayah', 'penghasilan_ayah', 'nik_ayah', 
        'tahun_lahir_ibu', 'penghasilan_ibu', 'nik_ibu', 'nama_wali', 'tahun_lahir_wali', 
        'jenjang_pendidikan_wali', 'pekerjaan_wali', 'penghasilan_wali', 'nik_wali', 
        'rombel_saat_ini', 'no_peserta_ujian_nasional', 'no_seri_ijazah', 
        'penerima_kip', 'nomor_kip', 'nama_di_kip', 'nomor_kks', 'no_registrasi_akta_lahir', 
        'bank', 'nomor_rekening_bank', 'rekening_atas_nama', 'layak_pip', 
        'alasan_layak_pip', 'kebutuhan_khusus', 'sekolah_asal', 'lintang', 
        'bujur', 'no_kk', 'berat_badan', 'tinggi_badan', 'lingkar_kepala', 
        'jarak_rumah_ke_sekolah'
    ];

    // Prepare the update statement
    $update_sql = "UPDATE pendaftaran_siswa SET ";
    $setFields = []; // Array to hold fields that will be updated
    foreach ($fields as $field) {
        if (isset($_POST[$field]) && $_POST[$field] !== '') {
            $setFields[] = "$field = ?";
        }
    }

    // Check if there are fields to update
    if (count($setFields) > 0) {
        $update_sql .= implode(", ", $setFields) . " WHERE id = ?";
        
        $stmt = $conn->prepare($update_sql);
        
        // Prepare the parameters
        $params = [];
        foreach ($fields as $field) {
            if (isset($_POST[$field]) && $_POST[$field] !== '') {
                $params[] = $_POST[$field];
            }
        }
        $params[] = $id; // Add the id at the end

        // Create a dynamic bind_param string
        $types = str_repeat("s", count($params) - 1) . "i"; // All fields are strings except for the ID, which is an integer

        // Bind parameters dynamically
        $stmt->bind_param($types, ...$params);

        // Execute the update statement
        if ($stmt->execute()) {
            echo "Data berhasil diperbarui.";
            header("Location: File_Siswa.php"); // Redirect after successful update
            exit;
        } else {
            echo "Terjadi kesalahan saat memperbarui data.";
        }
    } else {
        echo "Tidak ada data yang diperbarui.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <link rel="stylesheet" href="edit.css">
</head>

<body>
    <div class="container">
        <div class="main">
            <div class="topbar">
                <h1>Edit Data Siswa</h1>
                <a href="File_Siswa.php"><button>Kembali ke file siswa</button></a>
            </div>

            <section class="edit-section">
                <form method="POST" action="edit_siswa.php?id=<?php echo $data['id']; ?>">
                <section class="detail-section">
                <!-- Bagian Data Siswa -->
                <h2>Data Siswa</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <td><input type="text" name="id" value="<?= htmlspecialchars($data['id']) ?>"></td>
                    </tr>
                    <tr>
    <th>Nama Siswa</th>
    <td><input type="text" name="nama_siswa" value="<?php echo $data['nama_siswa']; ?>"></td>
</tr>
<tr>
    <th>Nama Panggilan</th>
    <td><input type="text" name="nama_panggilan" value="<?php echo $data['nama_panggilan']; ?>"></td>
</tr>
<tr>
    <th>Tanggal Lahir</th>
    <td><input type="text" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>"></td>
</tr>
<tr>
    <th>Tempat Lahir</th>
    <td><input type="text" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>"></td>
</tr>
<tr>
    <th>Agama</th>
    <td><input type="text" name="agama" value="<?php echo $data['agama']; ?>"></td>
</tr>
<tr>
    <th>Jumlah Saudara</th>
    <td><input type="text" name="jumlah_saudara" value="<?php echo $data['jumlah_saudara']; ?>"></td>
</tr>
<tr>
    <th>Anak Ke</th>
    <td><input type="text" name="anak_ke" value="<?php echo $data['anak_ke']; ?>"></td>
</tr>
<tr>
    <th>Jenis Kelamin</th>
    <td><input type="text" name="jk_siswa" value="<?php echo $data['jk_siswa']; ?>"></td>
</tr>
<tr>
    <th>Alamat Siswa</th>
    <td><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"></td>
</tr>
<tr>
    <th>NIPD Siswa</th>
    <td><input type="text" name="nipd_siswa" value="<?php echo $data['nipd_siswa']; ?>"></td>
</tr>
<tr>
    <th>NISN Siswa</th>
    <td><input type="text" name="nisn_siswa" value="<?php echo $data['nisn_siswa']; ?>"></td>
</tr>
<tr>
    <th>NIK Siswa</th>
    <td><input type="text" name="nik_siswa" value="<?php echo $data['nik_siswa']; ?>"></td>
</tr>

                </table>

                <hr>

                <!-- Bagian Data Ibu -->
                <h2>Data Ibu</h2>
                <table>
                <tr>
    <th>Nama Ibu</th>
    <td><input type="text" name="nama_ibu" value="<?php echo $data['nama_ibu']; ?>"></td>
</tr>
<tr>
    <th>Tempat Lahir Ibu</th>
    <td><input type="text" name="tempat_lahir_ibu" value="<?php echo $data['tempat_lahir_ibu']; ?>"></td>
</tr>
<tr>
    <th>Tahun Lahir Ibu</th>
    <td><input type="number" name="tahun_lahir_ibu" value="<?php echo $data['tahun_lahir_ibu']; ?>"></td>
</tr>
<tr>
    <th>Agama Ibu</th>
    <td><input type="text" name="agama_ibu" value="<?php echo $data['agama_ibu']; ?>"></td>
</tr>
<tr>
    <th>Telepon Ibu</th>
    <td><input type="text" name="telepon_ibu" value="<?php echo $data['telepon_ibu']; ?>"></td>
</tr>
<tr>
    <th>Pekerjaan Ibu</th>
    <td><input type="text" name="pekerjaan_ibu" value="<?php echo $data['pekerjaan_ibu']; ?>"></td>
</tr>
<tr>
    <th>Penghasilan Ibu</th>
    <td>
        <input type="number" name="penghasilan_ibu" value="<?php echo $data['penghasilan_ibu']; ?>">
    </td>
</tr>
<tr>
    <th>Pendidikan Ibu</th>
    <td><input type="text" name="pendidikan_ibu" value="<?php echo $data['pendidikan_ibu']; ?>"></td>
</tr>
<tr>
    <th>Alamat Ibu</th>
    <td><input type="text" name="alamat_ibu" value="<?php echo $data['alamat_ibu']; ?>"></td>
</tr>
                </table>

                <hr>

                <!-- Bagian Data Ayah -->
                <h2>Data Ayah</h2>
                <table>
                <tr>
    <th>Nama Ayah</th>
    <td><input type="text" name="nama_ayah" value="<?php echo $data['nama_ayah']; ?>"></td>
</tr>
<tr>
    <th>Tempat Lahir Ayah</th>
    <td><input type="text" name="tempat_lahir_ayah" value="<?php echo $data['tempat_lahir_ayah']; ?>"></td>
</tr>
<tr>
    <th>Tahun Lahir Ayah</th>
    <td><input type="number" name="tahun_lahir_ayah" value="<?php echo $data['tahun_lahir_ayah']; ?>"></td>
</tr>
<tr>
    <th>Agama Ayah</th>
    <td><input type="text" name="agama_ayah" value="<?php echo $data['agama_ayah']; ?>"></td>
</tr>
<tr>
    <th>Telepon Ayah</th>
    <td><input type="text" name="telepon_ayah" value="<?php echo $data['telepon_ayah']; ?>"></td>
</tr>
<tr>
    <th>Pekerjaan Ayah</th>
    <td><input type="text" name="pekerjaan_ayah" value="<?php echo $data['pekerjaan_ayah']; ?>"></td>
</tr>
<tr>
    <th>Penghasilan Ayah</th>
    <td>
        <input type="number" name="penghasilan_ayah" value="<?php echo $data['penghasilan_ayah']; ?>" >
    </td>
</tr>
<tr>
    <th>Pendidikan Ayah</th>
    <td><input type="text" name="pendidikan_ayah" value="<?php echo $data['pendidikan_ayah']; ?>"></td>
</tr>
<tr>
    <th>Alamat Ayah</th>
    <td><input type="text" name="alamat_ayah" value="<?php echo $data['alamat_ayah']; ?>"></td>
</tr>
<tr>
    <th>NIK Ayah</th>
    <td><input type="text" name="nik_ayah" value="<?php echo $data['nik_ayah']; ?>"></td>
</tr>
                </table>

                <hr>

                <!-- Bagian Data Wali -->
                <h2>Data Wali</h2>
                <table>
                <tr>
    <th>Nama Wali</th>
    <td><input type="text" name="nama_wali" value="<?php echo $data['nama_wali']; ?>"></td>
</tr>
<tr>
    <th>Tahun Lahir Wali</th>
    <td><input type="number" name="tahun_lahir_wali" value="<?php echo $data['tahun_lahir_wali']; ?>"></td>
</tr>
<tr>
    <th>Jenjang Pendidikan Wali</th>
    <td><input type="text" name="jenjang_pendidikan_wali" value="<?php echo $data['jenjang_pendidikan_wali']; ?>"></td>
</tr>
<tr>
    <th>Pekerjaan Wali</th>
    <td><input type="text" name="pekerjaan_wali" value="<?php echo $data['pekerjaan_wali']; ?>"></td>
</tr>
<tr>
    <th>Penghasilan Wali</th>
    <td>
        <input type="number" name="penghasilan_wali" value="<?php echo $data['penghasilan_wali']; ?>">
    </td>
</tr>
<tr>
    <th>NIK Wali</th>
    <td><input type="text" name="nik_wali" value="<?php echo $data['nik_wali']; ?>"></td>
</tr>
                </table>

                <hr>

                <!-- Bagian Keterangan Lain -->
                <h2>Keterangan Lain</h2>
                <table>
                <tr>
    <th>RT</th>
    <td><input type="text" name="rt" value="<?php echo htmlspecialchars($data['rt']); ?>"></td>
</tr>
<tr>
    <th>RW</th>
    <td><input type="text" name="rw" value="<?php echo htmlspecialchars($data['rw']); ?>"></td>
</tr>
<tr>
    <th>Dusun</th>
    <td><input type="text" name="dusun" value="<?php echo htmlspecialchars($data['dusun']); ?>"></td>
</tr>
<tr>
    <th>Kelurahan</th>
    <td><input type="text" name="kelurahan" value="<?php echo htmlspecialchars($data['kelurahan']); ?>"></td>
</tr>
<tr>
    <th>Kecamatan</th>
    <td><input type="text" name="kecamatan" value="<?php echo htmlspecialchars($data['kecamatan']); ?>"></td>
</tr>
<tr>
    <th>Kode Pos</th>
    <td><input type="text" name="kode_pos" value="<?php echo htmlspecialchars($data['kode_pos']); ?>"></td>
</tr>
<tr>
    <th>Jenis Tinggal</th>
    <td><input type="text" name="jenis_tinggal" value="<?php echo htmlspecialchars($data['jenis_tinggal']); ?>"></td>
</tr>
<tr>
    <th>Alat Transportasi</th>
    <td><input type="text" name="alat_transportasi" value="<?php echo htmlspecialchars($data['alat_transportasi']); ?>"></td>
</tr>
<tr>
    <th>Telepon</th>
    <td><input type="number" name="telepon" value="<?php echo htmlspecialchars($data['telepon']); ?>"></td>
</tr>
<tr>
    <th>Hp</th>
    <td><input type="text" name="hp" value="<?php echo htmlspecialchars($data['hp']); ?>"></td>
</tr>
<tr>
    <th>Email</th>
    <td><input type="text" name="e_mail" value="<?php echo htmlspecialchars($data['e_mail']); ?>"></td>
</tr>
<tr>
    <th>Jarak Rumah ke Sekolah</th>
    <td><input type="text" name="jarak_rumah_ke_sekolah" value="<?php echo htmlspecialchars($data['jarak_rumah_ke_sekolah']); ?>"></td>
</tr>
<tr>
    <th>Penerima KPS</th>
    <td>
        <select name="penerima_kps">
        <option value=" " <?= $data['penerima_kps'] == ' ' ? 'selected' : '' ?>></option>
            <option value="Ya" <?= $data['penerima_kps'] == 'Ya' ? 'selected' : '' ?>>Ya</option>
            <option value="Tidak" <?= $data['penerima_kps'] == 'Tidak' ? 'selected' : '' ?>>Tidak</option>
        </select>
    </td>
</tr>
<tr>
    <th>Nomor KPS</th>
    <td><input type="number" name="no_kps" value="<?php echo htmlspecialchars($data['no_kps']); ?>"></td>
</tr>
<tr>
    <th>SKHUN</th>
    <td><input type="number" name="skhun" value="<?php echo htmlspecialchars($data['skhun']); ?>"></td>
</tr>
<tr>
    <th>Penerima KIP</th>
    <td>
        <select name="penerima_kip">
            <option value="Ya" <?= $data['penerima_kip'] == 'Ya' ? 'selected' : '' ?>>Ya</option>
            <option value="Tidak" <?= $data['penerima_kip'] == 'Tidak' ? 'selected' : '' ?>>Tidak</option>
        </select>
    </td>
</tr>
<tr>
    <th>Nomor KIP</th>
    <td><input type="number" name="nomor_kip" value="<?php echo htmlspecialchars($data['nomor_kip']); ?>"></td>
</tr>
<tr>
    <th>Nama KIP</th>
    <td><input type="text" name="nama_di_kip" value="<?php echo htmlspecialchars($data['nama_di_kip']); ?>"></td>
</tr>
<tr>
<tr>
    <th>Rombel Saat ini</th>
    <td><input type="text" name="rombel_saat_ini" value="<?php echo htmlspecialchars($data['rombel_saat_ini']); ?>"></td>
</tr>
<tr>
    <th>Nomor Peserta UN</th>
    <td><input type="number" name="no_peserta_ujian_nasional" value="<?php echo htmlspecialchars($data['no_peserta_ujian_nasional']); ?>"></td>
</tr>
<tr>
    <th>Nomor Seri Ijazah</th>
    <td><input type="number" name="no_seri_ijazah" value="<?php echo htmlspecialchars($data['no_seri_ijazah']); ?>"></td>
</tr>
<tr>
    <th>Nomor KKS</th>
    <td><input type="number" name="nomor_kks" value="<?php echo htmlspecialchars($data['nomor_kks']); ?>"></td>
</tr>
<tr>
    <th>Nomor Registrasi Akta Lahir</th>
    <td><input type="number" name="no_registrasi_akta_lahir" value="<?php echo htmlspecialchars($data['no_registrasi_akta_lahir']); ?>"></td>
</tr>
<tr>
    <th>BANK</th>
    <td><input type="text" name="bank" value="<?php echo htmlspecialchars($data['bank']); ?>"></td>
</tr>
<tr>
    <th>Nomor Rekening BANK</th>
    <td><input type="number" name="nomor_rekening_bank" value="<?php echo htmlspecialchars($data['nomor_rekening_bank']); ?>"></td>
</tr>
<tr>
    <th>Rekening atas nama</th>
    <td><input type="text" name="rekening_atas_nama" value="<?php echo htmlspecialchars($data['rekening_atas_nama']); ?>"></td>
</tr>
<tr>
    <th>Layak PIP</th>
    <td>
        <select name="layak_pip">
            <option value="Ya" <?= $data['layak_pip'] == 'Ya' ? 'selected' : '' ?>>Ya</option>
            <option value="Tidak" <?= $data['layak_pip'] == 'Tidak' ? 'selected' : '' ?>>Tidak</option>
        </select>
    </td>
</tr>
<tr>
    <th>Alasan Layak PIP</th>
    <td><input type="text" name="alasan_layak_pip" value="<?php echo htmlspecialchars($data['alasan_layak_pip']); ?>"></td>
</tr>
<tr>
    <th>Kebutuhan Khusus</th>
    <td><input type="text" name="kebutuhan_khusus" value="<?php echo htmlspecialchars($data['kebutuhan_khusus']); ?>"></td>
</tr>
<tr>
    <th>Sekolah Asal</th>
    <td><input type="text" name="sekolah_asal" value="<?php echo htmlspecialchars($data['sekolah_asal']); ?>"></td>
</tr>
<tr>
    <th>Lintang</th>
    <td><input type="number" name="lintang" value="<?php echo htmlspecialchars($data['lintang']); ?>"></td>
</tr>
<tr>
    <th>Bujur</th>
    <td><input type="number" name="bujur" value="<?php echo htmlspecialchars($data['bujur']); ?>"></td>
</tr>
<tr>
    <th>No KK</th>
    <td><input type="number" name="no_kk" value="<?php echo htmlspecialchars($data['no_kk']); ?>"></td>
</tr>
<tr>
    <th>Berat Badan</th>
    <td><input type="number" name="berat_badan" value="<?php echo htmlspecialchars($data['berat_badan']); ?>"></td>
</tr>
<tr>
    <th>Tinggi Badan</th>
    <td><input type="number" name="tinggi_badan" value="<?php echo htmlspecialchars($data['tinggi_badan']); ?>"></td>
</tr>
<tr>
    <th>Lingkar Kepala</th>
    <td><input type="number" name="lingkar_kepala" value="<?php echo htmlspecialchars($data['lingkar_kepala']); ?>"></td>
</tr>
<tr>
    <td colspan="2"><button type="submit">Update Data</button></td>
</tr>
</table>
                </form>
            </section>
        </div>
    </div>
</body>

</html>
