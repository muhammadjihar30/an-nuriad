<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "UPDATE pendaftaran_siswa SET sampah = '0' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: sampah.php");
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    header("Location: sampah.php");
}
?>
