<?php
session_start();
include('koneksi.php');

// Pastikan koneksi berhasil
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Cek apakah form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dan bersihkan
    $username = trim($_POST['username']);
    $password = trim($_POST['password']); // Pastikan hash yang digunakan sesuai dengan database

    // Gunakan prepared statement untuk menghindari SQL injection
    $stmt = mysqli_prepare($conn, "SELECT * FROM pengguna WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data_user = mysqli_fetch_assoc($result);

    // Cek apakah user ditemukan
    if ($data_user) {
        $_SESSION['user'] = $data_user;

        // Redirect berdasarkan role
        if ($data_user['SBG'] === 'Admin') {
            header('Location: admin.php');
            exit();
        } elseif ($data_user['SBG'] === 'Karyawan') {
            header('Location: ../user/index.php');
            exit();
        } else {
            echo "<script>alert('Pengguna tidak dikenali'); window.location.href='./login.php';</script>";
        }
    } else {
        echo "<script>alert('Username atau password salah'); window.location.href='./login.php';</script>";
    }
} else {
    echo "<script>alert('Metode tidak diizinkan'); window.location.href='./login.php';</script>";
}
?>
