<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "UPDATE pendaftaran_siswa SET status_konfirmasi = 'sudah' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: File_Siswa.php");
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    header("Location: File_Siswa.php");
}
?>
