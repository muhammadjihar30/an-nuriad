<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "UPDATE pendaftaran_siswa SET sampah = '1' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: File_Siswa.php");
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    header("Location: File_Siswa.php");
}
?>
