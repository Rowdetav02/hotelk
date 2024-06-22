<?php
$host = "localhost";       // Nama host
$username = "root";        // Username database
$password = "";            // Password database
$database = "dbbarang";    // Nama database

// Membuat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>