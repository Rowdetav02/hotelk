<?php
include 'koneksi.php'; // Menghubungkan ke file koneksi database

$username = $_POST['username']; // Mengambil nilai username dari form login
$password = $_POST['password']; // Mengambil nilai password dari form login

// Query dengan prepared statements untuk menghindari SQL Injection
$query = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
$query->bind_param("ss", $username, $password); // Mengikat parameter
$query->execute(); // Eksekusi query
$result = $query->get_result(); // Mendapatkan hasil query

// Periksa apakah query berhasil dieksekusi dan hasilnya sesuai
if ($result && $result->num_rows > 0) {
    // User ditemukan, arahkan ke halaman menu.html
    header('Location: menu.html');
    exit();
} else {
    // Jika user tidak ditemukan, tampilkan pesan error atau lakukan tindakan lain
    echo 'Username atau password salah. Silakan coba lagi.';
}

// Tutup koneksi ke database
$query->close();
$conn->close();
?>
