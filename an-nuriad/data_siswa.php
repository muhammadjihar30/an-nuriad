<?php
include 'koneksi.php';


$sql = "SELECT id, nama_siswa AS nama, tanggal_lahir AS tanggal FROM pendaftaran_siswa";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="sampah.css">
</head>

<body>
    <div class="data-container">
        <h1>Daftar Data Siswa</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Folder</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = mysqli_fetch_assoc($result)) :

                    $folderName = "siswa/" . str_replace(' ', '_', $data['nama']) . "_" . str_replace('-', '', $data['tanggal']);
                ?>
                    <tr>
                        <td><?= htmlspecialchars($data['id']) ?></td>
                        <td><?= htmlspecialchars($data['nama']) ?></td>
                        <td><?= htmlspecialchars($data['tanggal']) ?></td>
                        <td>
                            <?php if (file_exists($folderName)) : ?>
                                <a href="<?= htmlspecialchars($folderName) ?>" target="_blank">Buka Folder</a>
                            <?php else : ?>
                                <span>Folder tidak ditemukan</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>