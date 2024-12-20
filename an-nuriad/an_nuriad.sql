-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2024 pada 03.43
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `an_nuriad`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(3, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE `data_siswa` (
  `Id_anak` int(11) NOT NULL,
  `nama_anak` varchar(100) DEFAULT NULL,
  `nipd_anak` varchar(50) DEFAULT NULL,
  `jk_anak` enum('laki-laki','perempuan') DEFAULT NULL,
  `nisn_anak` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nik_anak` varchar(50) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `rt` varchar(10) DEFAULT NULL,
  `rw` varchar(10) DEFAULT NULL,
  `dusun` varchar(100) DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `jenis_tinggal` varchar(50) DEFAULT NULL,
  `alat_transportasi` varchar(50) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `e_mail` varchar(100) DEFAULT NULL,
  `skhun` varchar(50) DEFAULT NULL,
  `penerima_kps` enum('ya','tidak') DEFAULT NULL,
  `no_kps` varchar(50) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `tahun_lahir_ayah` int(11) DEFAULT NULL,
  `jenjang_pendidikan_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ayah` varchar(100) DEFAULT NULL,
  `penghasilan_ayah` decimal(15,2) DEFAULT NULL,
  `nik_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `tahun_lahir_ibu` int(11) DEFAULT NULL,
  `jenjang_pendidikan_ibu` varchar(50) DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) DEFAULT NULL,
  `penghasilan_ibu` decimal(15,2) DEFAULT NULL,
  `nik_ibu` varchar(50) DEFAULT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `tahun_lahir_wali` int(11) DEFAULT NULL,
  `jenjang_pendidikan_wali` varchar(50) DEFAULT NULL,
  `pekerjaan_wali` varchar(100) DEFAULT NULL,
  `penghasilan_wali` decimal(15,2) DEFAULT NULL,
  `nik_wali` varchar(50) DEFAULT NULL,
  `rombel_saat_ini` varchar(50) DEFAULT NULL,
  `no_peserta_ujian_nasional` varchar(50) DEFAULT NULL,
  `no_seri_ijazah` varchar(50) DEFAULT NULL,
  `penerima_kip` enum('ya','tidak') DEFAULT NULL,
  `nomor_kip` varchar(50) DEFAULT NULL,
  `nama_di_kip` varchar(100) DEFAULT NULL,
  `nomor_kks` varchar(50) DEFAULT NULL,
  `no_registrasi_akta_lahir` varchar(50) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `nomor_rekening_bank` varchar(50) DEFAULT NULL,
  `rekening_atas_nama` varchar(100) DEFAULT NULL,
  `layak_pip` enum('ya','tidak') DEFAULT NULL,
  `alasan_layak_pip` text DEFAULT NULL,
  `kebutuhan_khusus` varchar(100) DEFAULT NULL,
  `sekolah_asal` varchar(100) DEFAULT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `lintang` decimal(9,6) DEFAULT NULL,
  `bujur` decimal(9,6) DEFAULT NULL,
  `no_kk` varchar(50) DEFAULT NULL,
  `berat_badan` decimal(5,2) DEFAULT NULL,
  `tinggi_badan` decimal(5,2) DEFAULT NULL,
  `lingkar_kepala` decimal(5,2) DEFAULT NULL,
  `jml_saudara_kandung` int(11) DEFAULT NULL,
  `jarak_rumah_ke_sekolah` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_data`
--

CREATE TABLE `file_data` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `file_data`
--

INSERT INTO `file_data` (`id`, `name`, `email`, `date_created`, `deleted_at`) VALUES
(1, 'Raihan Yaskur', 'raihanyaskur@gmail.com', '2024-11-21 00:40:23', NULL),
(2, 'Filia Debora Sharon', 'filiadeborasharon@gmail.com', '2024-11-21 00:40:23', NULL),
(3, 'Fuja Gelistiana', 'fujagelistiana@gmail.com', '2024-11-21 00:40:23', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran_siswa`
--

CREATE TABLE `pendaftaran_siswa` (
  `id` int(11) NOT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `nama_panggilan` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `jumlah_saudara` int(11) DEFAULT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `jk_siswa` enum('laki-laki','perempuan') DEFAULT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `tempat_lahir_ibu` varchar(255) DEFAULT NULL,
  `agama_ibu` varchar(50) DEFAULT NULL,
  `telepon_ibu` varchar(15) DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) DEFAULT NULL,
  `pendidikan_ibu` varchar(50) DEFAULT NULL,
  `alamat_ibu` text DEFAULT NULL,
  `nama_ayah` varchar(255) DEFAULT NULL,
  `tempat_lahir_ayah` varchar(255) DEFAULT NULL,
  `agama_ayah` varchar(50) DEFAULT NULL,
  `telepon_ayah` varchar(15) DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) DEFAULT NULL,
  `pendidikan_ayah` varchar(50) DEFAULT NULL,
  `alamat_ayah` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'belum_terkonfirmasi',
  `status_konfirmasi` enum('belum','sudah') NOT NULL DEFAULT 'belum',
  `nipd_siswa` varchar(50) DEFAULT NULL,
  `nisn_siswa` varchar(50) DEFAULT NULL,
  `nik_siswa` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `rt` varchar(10) DEFAULT NULL,
  `rw` varchar(10) DEFAULT NULL,
  `dusun` varchar(100) DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `jenis_tinggal` varchar(50) DEFAULT NULL,
  `alat_transportasi` varchar(50) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `e_mail` varchar(100) DEFAULT NULL,
  `skhun` varchar(50) DEFAULT NULL,
  `penerima_kps` enum('ya','tidak') DEFAULT NULL,
  `no_kps` varchar(50) DEFAULT NULL,
  `tahun_lahir_ayah` int(11) DEFAULT NULL,
  `penghasilan_ayah` decimal(15,2) DEFAULT NULL,
  `nik_ayah` varchar(50) DEFAULT NULL,
  `tahun_lahir_ibu` int(11) DEFAULT NULL,
  `penghasilan_ibu` decimal(15,2) DEFAULT NULL,
  `nik_ibu` varchar(50) DEFAULT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `tahun_lahir_wali` int(11) DEFAULT NULL,
  `jenjang_pendidikan_wali` varchar(50) DEFAULT NULL,
  `pekerjaan_wali` varchar(100) DEFAULT NULL,
  `penghasilan_wali` decimal(15,2) DEFAULT NULL,
  `nik_wali` varchar(50) DEFAULT NULL,
  `rombel_saat_ini` varchar(50) DEFAULT NULL,
  `no_peserta_ujian_nasional` varchar(50) DEFAULT NULL,
  `no_seri_ijazah` varchar(50) DEFAULT NULL,
  `penerima_kip` enum('ya','tidak') DEFAULT NULL,
  `nomor_kip` varchar(50) DEFAULT NULL,
  `nama_di_kip` varchar(100) DEFAULT NULL,
  `nomor_kks` varchar(50) DEFAULT NULL,
  `no_registrasi_akta_lahir` varchar(50) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `nomor_rekening_bank` varchar(50) DEFAULT NULL,
  `rekening_atas_nama` varchar(100) DEFAULT NULL,
  `layak_pip` enum('ya','tidak') DEFAULT NULL,
  `alasan_layak_pip` text DEFAULT NULL,
  `kebutuhan_khusus` varchar(100) DEFAULT NULL,
  `sekolah_asal` varchar(100) DEFAULT NULL,
  `lintang` decimal(9,6) DEFAULT NULL,
  `bujur` decimal(9,6) DEFAULT NULL,
  `no_kk` varchar(50) DEFAULT NULL,
  `berat_badan` decimal(5,2) DEFAULT NULL,
  `tinggi_badan` decimal(5,2) DEFAULT NULL,
  `lingkar_kepala` decimal(5,2) DEFAULT NULL,
  `jml_saudara_kandung` int(11) DEFAULT NULL,
  `jarak_rumah_ke_sekolah` decimal(5,2) DEFAULT NULL,
  `sampah` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendaftaran_siswa`
--

INSERT INTO `pendaftaran_siswa` (`id`, `nama_siswa`, `nama_panggilan`, `tanggal_lahir`, `tempat_lahir`, `agama`, `jumlah_saudara`, `anak_ke`, `jk_siswa`, `nama_ibu`, `tempat_lahir_ibu`, `agama_ibu`, `telepon_ibu`, `pekerjaan_ibu`, `pendidikan_ibu`, `alamat_ibu`, `nama_ayah`, `tempat_lahir_ayah`, `agama_ayah`, `telepon_ayah`, `pekerjaan_ayah`, `pendidikan_ayah`, `alamat_ayah`, `status`, `status_konfirmasi`, `nipd_siswa`, `nisn_siswa`, `nik_siswa`, `alamat`, `rt`, `rw`, `dusun`, `kelurahan`, `kecamatan`, `kode_pos`, `jenis_tinggal`, `alat_transportasi`, `telepon`, `hp`, `e_mail`, `skhun`, `penerima_kps`, `no_kps`, `tahun_lahir_ayah`, `penghasilan_ayah`, `nik_ayah`, `tahun_lahir_ibu`, `penghasilan_ibu`, `nik_ibu`, `nama_wali`, `tahun_lahir_wali`, `jenjang_pendidikan_wali`, `pekerjaan_wali`, `penghasilan_wali`, `nik_wali`, `rombel_saat_ini`, `no_peserta_ujian_nasional`, `no_seri_ijazah`, `penerima_kip`, `nomor_kip`, `nama_di_kip`, `nomor_kks`, `no_registrasi_akta_lahir`, `bank`, `nomor_rekening_bank`, `rekening_atas_nama`, `layak_pip`, `alasan_layak_pip`, `kebutuhan_khusus`, `sekolah_asal`, `lintang`, `bujur`, `no_kk`, `berat_badan`, `tinggi_badan`, `lingkar_kepala`, `jml_saudara_kandung`, `jarak_rumah_ke_sekolah`, `sampah`) VALUES
(1, 'Riski Ramadhan', 'Riski', '2005-10-17', 'Subang', 'Islam', 1, 1, '', 'Anisah', '02-02-1987', 'Islam', '0895396836264', 'IRT', 'SMA', 'Jln Pilang Satu 1 Pamanukan', 'Yayat Supriatna', '01-01-1987', 'Islam', '0895396836264', 'Buruh', 'SMP', 'Jln Pilang Satu 1 Pamanukan', 'belum_terkonfirmasi', 'sudah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 1986, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `nama_pengaturan` varchar(50) NOT NULL,
  `nilai` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama_pengaturan`, `nilai`) VALUES
(1, 'tombol_pendaftaran', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sampah_siswa`
--

CREATE TABLE `sampah_siswa` (
  `id` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `jumlah_saudara` int(11) DEFAULT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `jk_anak` varchar(10) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `tempat_lahir_ibu` varchar(100) DEFAULT NULL,
  `agama_ibu` varchar(50) DEFAULT NULL,
  `telepon_ibu` varchar(20) DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) DEFAULT NULL,
  `pendidikan_ibu` varchar(100) DEFAULT NULL,
  `alamat_ibu` text DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `tempat_lahir_ayah` varchar(100) DEFAULT NULL,
  `agama_ayah` varchar(50) DEFAULT NULL,
  `telepon_ayah` varchar(20) DEFAULT NULL,
  `pekerjaan_ayah` varchar(100) DEFAULT NULL,
  `pendidikan_ayah` varchar(100) DEFAULT NULL,
  `alamat_ayah` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `nama_panggilan` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `agama_siswa` varchar(50) DEFAULT NULL,
  `jumlah_saudara` int(11) DEFAULT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `tempat_lahir_ibu` varchar(100) DEFAULT NULL,
  `agama_ibu` varchar(50) DEFAULT NULL,
  `telepon_ibu` varchar(20) DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL,
  `pendidikan_ibu` varchar(50) DEFAULT NULL,
  `alamat_ibu` text DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `tempat_lahir_ayah` varchar(100) DEFAULT NULL,
  `agama_ayah` varchar(50) DEFAULT NULL,
  `telepon_ayah` varchar(20) DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `pendidikan_ayah` varchar(50) DEFAULT NULL,
  `alamat_ayah` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`Id_anak`);

--
-- Indeks untuk tabel `file_data`
--
ALTER TABLE `file_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftaran_siswa`
--
ALTER TABLE `pendaftaran_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sampah_siswa`
--
ALTER TABLE `sampah_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `Id_anak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `file_data`
--
ALTER TABLE `file_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran_siswa`
--
ALTER TABLE `pendaftaran_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sampah_siswa`
--
ALTER TABLE `sampah_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
