<?php
include 'koneksi.php';

// Query untuk mengambil status tombol pendaftaran
$query = $conn->query("SELECT nilai FROM pengaturan WHERE nama_pengaturan = 'tombol_pendaftaran'");

// Mengambil hasil dari query
$status = $query->fetch_assoc()['nilai'];

// Mengembalikan status tombol dalam bentuk JSON
echo json_encode(['status' => (bool)$status]);
?>
