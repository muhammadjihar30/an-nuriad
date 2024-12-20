<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "an_nuriad";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
