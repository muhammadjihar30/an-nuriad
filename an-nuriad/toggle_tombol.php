<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Mengambil status yang dikirimkan dari POST
        $status = $_POST['status'] === 'true' ? 1 : 0;

        // Query untuk memperbarui status tombol
        $query = "UPDATE pengaturan SET nilai = ? WHERE nama_pengaturan = 'tombol_pendaftaran'";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $status);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Gagal memperbarui status tombol.']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}
?>
