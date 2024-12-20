// proses_konfirmasi.php
<?php
include 'koneksi.php';

$inputData = json_decode(file_get_contents('php://input'), true);
$nama = $inputData['nama'];
$tanggal = $inputData['tanggal'];

// Proses konfirmasi data dan update status
// Lakukan update atau perubahan status konfirmasi di database

$response = [
    'success' => true, // atau false jika gagal
    'totalKonfirmasi' => $newTotalKonfirmasi, // nilai total konfirmasi terbaru
    'totalFile' => $newTotalFile // nilai total file terbaru
];

echo json_encode($response);
?>