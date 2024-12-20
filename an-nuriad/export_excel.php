<?php
// Memasukkan file koneksi
include 'koneksi.php';

// Header untuk file Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Semua_Data_Siswa.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Query untuk mengambil semua data siswa
$sql = "SELECT * FROM pendaftaran_siswa WHERE sampah = '0'"; // Mengambil semua data yang bukan sampah
$result = $conn->query($sql);

// Cek apakah ada data
if ($result->num_rows > 0) {
    // Membuat tabel HTML untuk data yang akan diekspor
    echo "<table border='1'>";
    // Menampilkan header tabel
    echo "<thead>
            <th>ID</th>
      <th>Nama Siswa</th>
      <th>Nama Panggilan</th>
      <th>Tanggal Lahir</th>
      <th>Tempat Lahir</th>
      <th>Agama</th>
      <th>Jumlah Saudara</th>
      <th>Anak Ke</th>
      <th>Jenis Kelamin</th>
      <th>Nama Ibu</th>
      <th>Tempat Lahir Ibu</th>
      <th>Agama Ibu</th>
      <th>Telepon Ibu</th>
      <th>Pekerjaan Ibu</th>
      <th>Pendidikan Ibu</th>
      <th>Alamat Ibu</th>
      <th>Nama Ayah</th>
      <th>Tempat Lahir Ayah</th>
      <th>Agama Ayah</th>
      <th>Telepon Ayah</th>
      <th>Pekerjaan Ayah</th>
      <th>Pendidikan Ayah</th>
      <th>Alamat Ayah</th>
      <th>NIPD Siswa</th>
      <th>NISN Siswa</th>
      <th>NIK Siswa</th>
      <th>Alamat</th>
      <th>RT</th>
      <th>RW</th>
      <th>Dusun</th>
      <th>Kelurahan</th>
      <th>Kecamatan</th>
      <th>Kode Pos</th>
      <th>Jenis Tinggal</th>
      <th>Alat Transportasi</th>
      <th>Telepon</th>
      <th>HP</th>
      <th>Email</th>
      <th>SKHUN</th>
      <th>Penerima KPS</th>
      <th>No. KPS</th>
      <th>Tahun Lahir Ayah</th>
      <th>Penghasilan Ayah</th>
      <th>NIK Ayah</th>
      <th>Tahun Lahir Ibu</th>
      <th>Penghasilan Ibu</th>
      <th>NIK Ibu</th>
      <th>Nama Wali</th>
      <th>Tahun Lahir Wali</th>
      <th>Jenjang Pendidikan Wali</th>
      <th>Pekerjaan Wali</th>
      <th>Penghasilan Wali</th>
      <th>NIK Wali</th>
      <th>Rombel Saat Ini</th>
      <th>No. Peserta Ujian Nasional</th>
      <th>No. Seri Ijazah</th>
      <th>Penerima KIP</th>
      <th>Nomor KIP</th>
      <th>Nama di KIP</th>
      <th>Nomor KKS</th>
      <th>No. Registrasi Akta Lahir</th>
      <th>Bank</th>
      <th>Nomor Rekening Bank</th>
      <th>Rekening Atas Nama</th>
      <th>Layak PIP</th>
      <th>Alasan Layak PIP</th>
      <th>Kebutuhan Khusus</th>
      <th>Sekolah Asal</th>
      <th>Lintang</th>
      <th>Bujur</th>
      <th>No. KK</th>
      <th>Berat Badan</th>
      <th>Tinggi Badan</th>
      <th>Lingkar Kepala</th>
      <th>Jarak Rumah ke Sekolah</th>
    </tr>
          </thead>";
    echo "<tbody>";

    // Menampilkan data dalam baris tabel
    while ($data = $result->fetch_assoc()) {
        echo "<tr>
        <td>". htmlspecialchars($data['id']) . "</td>
      <td>". htmlspecialchars($data['nama_siswa']) ."</td>
      <td>". htmlspecialchars($data['nama_panggilan']) ."</td>
      <td>". htmlspecialchars($data['tanggal_lahir']) ."</td>
      <td>". htmlspecialchars($data['tempat_lahir']) ."</td>
      <td>". htmlspecialchars($data['agama']) ."</td>
      <td>". htmlspecialchars($data['jumlah_saudara']) ."</td>
      <td>". htmlspecialchars($data['anak_ke']) ."</td>
      <td>". htmlspecialchars($data['jk_siswa']) ."</td>
      <td>". htmlspecialchars($data['nama_ibu']) ."</td>
      <td>". htmlspecialchars($data['tempat_lahir_ibu']) ."</td>
      <td>". htmlspecialchars($data['agama_ibu']) ."</td>
      <td>". htmlspecialchars($data['telepon_ibu']) ."</td>
      <td>". htmlspecialchars($data['pekerjaan_ibu']) ."</td>
      <td>". htmlspecialchars($data['pendidikan_ibu']) ."</td>
      <td>". htmlspecialchars($data['alamat_ibu']) ."</td>
      <td>". htmlspecialchars($data['nama_ayah']) ."</td>
      <td>". htmlspecialchars($data['tempat_lahir_ayah']) ."</td>
      <td>". htmlspecialchars($data['agama_ayah']) ."</td>
      <td>". htmlspecialchars($data['telepon_ayah']) ."</td>
      <td>". htmlspecialchars($data['pekerjaan_ayah']) ."</td>
      <td>". htmlspecialchars($data['pendidikan_ayah']) ."</td>
      <td>". htmlspecialchars($data['alamat_ayah']) ."</td>
      <td>". htmlspecialchars($data['nipd_siswa']) ."</td>
      <td>". htmlspecialchars($data['nisn_siswa']) ."</td>
      <td>". htmlspecialchars($data['nik_siswa']) ."</td>
      <td>". htmlspecialchars($data['alamat']) ."</td>
      <td>". htmlspecialchars($data['rt']) ."</td>
      <td>". htmlspecialchars($data['rw']) ."</td>
      <td>". htmlspecialchars($data['dusun']) ."</td>
      <td>". htmlspecialchars($data['kelurahan']) ."</td>
      <td>". htmlspecialchars($data['kecamatan']) ."</td>
      <td>". htmlspecialchars($data['kode_pos']) ."</td>
      <td>". htmlspecialchars($data['jenis_tinggal']) ."</td>
      <td>". htmlspecialchars($data['alat_transportasi']) ."</td>
      <td>". htmlspecialchars($data['telepon']) ."</td>
      <td>". htmlspecialchars($data['hp']) ."</td>
      <td>". htmlspecialchars($data['e_mail']) ."</td>
      <td>". htmlspecialchars($data['skhun']) ."</td>
      <td>". htmlspecialchars($data['penerima_kps']) ."</td>
      <td>". htmlspecialchars($data['no_kps']) ."</td>
      <td>". htmlspecialchars($data['tahun_lahir_ayah']) ."</td>
      <td>". htmlspecialchars($data['penghasilan_ayah']) ."</td>
      <td>". htmlspecialchars($data['nik_ayah']) ."</td>
      <td>". htmlspecialchars($data['tahun_lahir_ibu']) ."</td>
      <td>". htmlspecialchars($data['penghasilan_ibu']) ."</td>
      <td>". htmlspecialchars($data['nik_ibu']) ."</td>
      <td>". htmlspecialchars($data['nama_wali']) ."</td>
      <td>". htmlspecialchars($data['tahun_lahir_wali']) ."</td>
      <td>". htmlspecialchars($data['jenjang_pendidikan_wali']) ."</td>
      <td>". htmlspecialchars($data['pekerjaan_wali']) ."</td>
      <td>". htmlspecialchars($data['penghasilan_wali']) ."</td>
      <td>". htmlspecialchars($data['nik_wali']) ."</td>
      <td>". htmlspecialchars($data['rombel_saat_ini']) ."</td>
      <td>". htmlspecialchars($data['no_peserta_ujian_nasional']) ."</td>
      <td>". htmlspecialchars($data['no_seri_ijazah']) ."</td>
      <td>". htmlspecialchars($data['penerima_kip']) ."</td>
      <td>". htmlspecialchars($data['nomor_kip']) ."</td>
      <td>". htmlspecialchars($data['nama_di_kip']) ."</td>
      <td>". htmlspecialchars($data['nomor_kks']) ."</td>
      <td>". htmlspecialchars($data['no_registrasi_akta_lahir']) ."</td>
      <td>". htmlspecialchars($data['bank']) ."</td>
      <td>". htmlspecialchars($data['nomor_rekening_bank']) ."</td>
      <td>". htmlspecialchars($data['rekening_atas_nama']) ."</td>
      <td>". htmlspecialchars($data['layak_pip']) ."</td>
      <td>". htmlspecialchars($data['alasan_layak_pip']) ."</td>
      <td>". htmlspecialchars($data['kebutuhan_khusus']) ."</td>
      <td>". htmlspecialchars($data['sekolah_asal']) ."</td>
      <td>". htmlspecialchars($data['lintang']) ."</td>
      <td>". htmlspecialchars($data['bujur']) ."</td>
      <td>". htmlspecialchars($data['no_kk']) ."</td>
      <td>". htmlspecialchars($data['berat_badan']) ."</td>
      <td>". htmlspecialchars($data['tinggi_badan']) ."</td>
      <td>". htmlspecialchars($data['lingkar_kepala']) ."</td>
      <td>". htmlspecialchars($data['jarak_rumah_ke_sekolah']) ."</td>

    </tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>Tidak ada data untuk diekspor.</p>";
}

// Tutup koneksi
$conn->close();
?>
