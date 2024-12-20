<?php
session_start();

// Jika tombol logout diklik, hancurkan sesi dan arahkan ke index.php
if (isset($_POST['logout'])) {
    session_destroy();
    // Menggunakan header untuk memastikan pengalihan langsung ke index.php
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css" rel="stylesheet">
    <title>Konfirmasi Logout</title>
</head>
<body>
    <script>
    // SweetAlert untuk konfirmasi logout
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: 'Anda akan keluar dari akun ini.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, keluar!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Kirim form logout jika pengguna mengkonfirmasi
            document.getElementById('logoutForm').submit();
        } else {
            // Jika batal, arahkan kembali ke halaman dashboard
            window.location.href = 'dashboard.php';
        }
    });
    </script>
    
    <!-- Form untuk memproses logout -->
    <form id="logoutForm" method="POST" style="display: none;">
        <input type="hidden" name="logout" value="1">
    </form>
</body>
</html>
